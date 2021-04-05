<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        $dados = User::all();
        return view('usuario.listar', compact('dados'));
    }

    public function create()
    {
        //
        return view('usuario.inserir');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'nome'     => 'required|min:3',
            'email'    => 'required',
            'password' => 'required'
        ]);
        $dados = new User([
            'name'     => $request->get('nome'),
            'email'    => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);
        $dados->save();

        return redirect('/usuarios/create')->with('success', 'Dados cadastrado com sucesso!');
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $dados = User::find($id);
        return view('usuario.editar', compact('dados'));
    }


    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nome'     => 'required|min:3',
            'email'    => 'required',
            'password' => 'required'
        ]);

        $dados = User::find($id);
        $dados->name     = $request->get('nome');
        $dados->email    = $request->get('email');
        $dados->password = ($dados->password == $request->get('password')) ? $dados->password : Hash::make($request->get('password'));
        $dados->save();

        return redirect('/usuarios')->with('success', 'Dados atualizados com sucesso!');
    }

    public function destroy($id)
    {
        //
        $dados = User::find($id);
        $dados->delete();
        return redirect('/usuarios')->with('success', 'Dados excluídos com sucesso!');
    }
}
