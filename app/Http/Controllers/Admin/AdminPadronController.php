<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PadronsExport;
use App\Http\Controllers\Controller;
use App\Models\Proveedor\Giro;
use App\Models\Proveedor\Padron;
use App\Models\Proveedor\PadronRequisito;
use App\Models\Proveedor\SolicitudRequisito;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Excel;
use Illuminate\Support\Arr;

class AdminPadronController extends Controller
{
    public function index()
    {
        $padrons = Padron::orderBy('created_at', 'desc')->paginate();

        return view('admin.padron', compact('padrons'));
    }

    public function show(Padron $padron)
    {
        $giros = Giro::all();
        return view('admin.show_padron', compact('padron', 'giros'));
    }

    public function vistaPrevia(Padron $padron)
    {
        $infoCredencial = null;
        $textGiros = null;
        return view('admin.credencial.credencial', compact('padron', 'infoCredencial', 'textGiros'));
    }

    public function generarCredencial(Request $request, Padron $padron)
    {
        $rules = [
            'num_proveedor' => 'required',
            'vigencia' => 'required'
        ];

        $messages = [
            'num_proveedor.required' => 'Número de proveedor obligatorio',
            'vigencia.required' => 'Ingrese la vigencia de la credencial',
        ];

        $request->validate($rules, $messages);

        $textGiros = '';
        foreach ($padron->giros as $item => $giro) {
            if ($item == 0) {
                $textGiros = $giro->codigo;
            } else {
                $textGiros = $textGiros . '-' . $giro->codigo;
            }
        }
        $infoCredencial = $request->all();
        // Se envían a la vista los datos del [padron] y datos complementarios contenidos en [infoCredencial]
        $pdf = PDF::loadView('admin.credencial.credencial_pdf', compact('padron', 'infoCredencial', 'textGiros'));
        // Se muestra el pdf en el navegador
        return $pdf->stream('credencial.pdf');
    }

    public function openDocument($id)
    {
        $padronRequisito = PadronRequisito::find($id);
        $storage = Storage::path($padronRequisito->ruta);

        return response()->file($storage);
    }

    public function cambiarGiros(Request $request, Padron $padron)
    {
        $rules = [
            'giros' => 'required',
        ];

        $messages = [
            "giros.required" => "Seleccione al menos una opción",
        ];

        $request->validate($rules, $messages);

        $padron->giros()->sync($request->giros);
        return redirect()->route('admin.verpadron', $padron->id);
    }

    public function filtrar(Request $request)
    {
        $condiciones = $this->getConditions(
            $request->datos['rfc'],
            $request->datos['dateFrom'],
            $request->datos['dateTo'],
            $request->datos['persona_fisica'],
            $request->datos['persona_moral']
        );
        $padronResults = Padron::where($condiciones)->paginate();
        return view('admin.padron_search', compact('padronResults'));
    }

    public function getConditions($rfc, $dateFrom, $dateTo, $persona_fisica, $persona_moral)
    {
        $condiciones = [];
        if ($rfc != '') {
            $condiciones[] = ['rfc', $rfc];
        }
        if ($dateFrom != '') {
            $condiciones[] = ['created_at', '>=', $dateFrom];
        }
        if ($dateTo != '') {
            $condiciones[] = ['created_at', '<=', $dateTo];
        }
        if (
            $persona_fisica == 'true' & $persona_moral == 'false'
            | $persona_fisica != null & $persona_moral == null
        ) {
            $condiciones[] = ['tipo_persona', 'Persona física'];
        }
        if (
            $persona_fisica == 'false' & $persona_moral == 'true' |
            $persona_fisica == null & $persona_moral != null
        ) {
            $condiciones[] = ['tipo_persona', 'Persona moral'];
        }
        return $condiciones;
    }

    public function export(Request $request)
    {
        $conditions = $this->getConditions(
            $request['rfc'],
            $request['dateFrom'],
            $request['dateTo'],
            $request['persona_fisica'],
            $request['persona_moral']
        );

        return Excel::download(new PadronsExport($conditions), 'padron.xlsx');
    }
}
