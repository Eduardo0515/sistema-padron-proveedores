<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Proveedor\TipoPersona;
use App\Proveedor;
use App\Providers\RouteServiceProvider;
use App\User;
use App\UserProveedor;
use App\UserSolicitud;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
        $tipo_personas = TipoPersona::all();
        return view('proveedors.register', ['url' => 'proveedor', 'tipo_personas' => $tipo_personas]);
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
            "rfc.unique" => 'Este RFC ya existe',
            "password.required" => "Contraseña Obligatoria",
            "password.min" => "La contraseña debe tener al menos 6 caracteres",
            "razon_social.required" => "La razón social es obligatoria",
        ];
        $rules = [
            'rfc' => ['required', 'string', 'max:13', 'unique:user_proveedors'],
            'correo' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'tipo_persona' => ['required', 'max:255'],
        ];

        if ($request['tipo_persona'] == 2) {
            $rules = Arr::add($rules, 'razon_social', ['required', 'max:255']);
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            UserProveedor::create([
                'rfc' => $request['rfc'],
                'correo' => $request['correo'],
                'password' => bcrypt($request['password']),
                'tipo_persona' => $request['tipo_persona'],
                'razon_social' => $request['razon_social'],
            ]);
            return redirect()->route('proveedor.showLogin');
        }
    }
}
