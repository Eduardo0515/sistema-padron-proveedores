<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proveedor\Padron;
use Illuminate\Http\Request;

class AdminPadronController extends Controller
{
    public function index()
    {
        $padrons = Padron::paginate();

        return view('admin.padron', compact('padrons'));
    }

    public function show(Padron $padron)
    {
        return view('admin.show_padron', compact(['padron']));
    }
}
