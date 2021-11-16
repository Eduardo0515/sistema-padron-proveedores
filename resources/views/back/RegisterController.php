<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Proveedor;
use App\Providers\RouteServiceProvider;
use App\User;
use App\UserProveedor;
use App\UserSolicitud;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:proveedor');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function showProveedorRegisterForm()
    {
        return view('proveedors.register', ['url' => 'proveedor']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function createProveedor(Request $request)
    {
        $messages = [
            "rfc.required" => "RFC Obligatorio",
            "password.required" => "Contraseña Obligatoria",
            "password.min" => "La contraseña debe tener al menos 6 caracteres"
        ];
        $validator = Validator::make($request->all(), [
            'rfc' => ['required', 'string', 'max:13', 'unique:user_solicituds'],
            'correo' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'telefono' => ['required', 'max:45'],
            'extension' => ['max:45'],
            'tipo_persona' => ['required', 'max:25'],
            'nombres' => ['required', 'max:255'],
            'apellidos' => ['required', 'max:255'],
            'razon_social' => ['max:255'],
            'capital_contable' => ['required', 'max:255'],
            'domicilio' => ['required', 'max:255'],
            'num_exterior' => ['required', 'max:45'],
            'num_interior' => ['max:45'],
            'colonia' => ['required', 'max:255'],
            'localidad' => ['required', 'max:255'],
            'ciudad' => ['required', 'max:255'],
            'entidad' => ['required', 'max:255'],
            'pais' => ['required', 'max:255'],
            'codigo_postal' => ['required', 'max:45'],
            'latitud' => ['required'],
            'longitud' => ['required'],
        ], $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            UserProveedor::create([
                'rfc' => $request['rfc'],
                'correo' => $request['correo'],
                'password' => bcrypt($request['password']),
                'telefono' => $request['telefono'],
                'extension' => $request['extension'],
                'tipo_persona' => $request['tipo_persona'],
                'nombres' => $request['nombres'],
                'apellidos' => $request['apellidos'],
                'razon_social' => $request['razon_social'],
                'capital_contable' => $request['capital_contable'],
                'domicilio' => $request['domicilio'],
                'num_exterior' => $request['num_exterior'],
                'num_interior' => $request['num_interior'],
                'colonia' => $request['colonia'],
                'localidad' => $request['localidad'],
                'ciudad' => $request['ciudad'],
                'entidad' => $request['entidad'],
                'pais' => $request['pais'],
                'codigo_postal' => $request['codigo_postal'],
                'latitud' => $request['latitud'],
                'longitud' => $request['longitud'],
            ]);
            return redirect()->intended('login/proveedor');
        }
    }
}
