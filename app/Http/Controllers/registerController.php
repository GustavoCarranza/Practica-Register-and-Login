<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class registerController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    //Creando metodo para capturar los datos para la creacion de usuario
    public function store(Request $request)
    {

        $request->request->add(['username' => Str::slug($request->username)]);

        $this->validate($request,[
            'name' => 'required|min:4|max:10',
            'username' => 'required|unique:users|min:5|max:12',
            'email' => 'required|unique:users|email|max:30',
            'password' =>'required|confirmed|min:8'

        ]);

    //Vamos a crear el usuario para ser almacenado en la base de datos, para ello vamos a utlizar el modelo User que tenemos en la carpeta de modelos
        User::create([
            //Empezaremos a almacenar los names de lo inputs dentro del arreglo de create 
            'name' => $request->name,
            'username' => Str::slug($request->username),
            'email' => $request->email,
            'password' => $request->password
        ]);

        //con ayuda del helper auth y attempt vamos a autenticar al usuario una vez creado
        auth()->attempt([
            'username' => $request->username,
            'password' => $request->password
        ]);

        return redirect()->route('principal.welcome');
    }

}
