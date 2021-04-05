<?php

namespace App\Http\Controllers;

use App\Models\Medicos;
use Illuminate\Http\Request;

class MedicosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        $dados = Medicos::all();
        return view('medico.listar', compact('dados'));
    }

    public function create()
    {
        //
        return view('medico.inserir');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'nome'            => 'required|min:3',
            'idade'           => 'required',
            'data_nascimento' => 'required',
            'sexo'            => 'required',
            'registro'        => 'required',
            'celular'         => 'required',
        ]);
        $dados = new Medicos([
            'nome'            => $request->get('nome'),
            'idade'           => $request->get('idade'),
            'data_nascimento' => $request->get('data_nascimento'),
            'sexo'            => $request->get('sexo'),
            'registro'        => $request->get('registro'),
            'celular'         => $request->get('celular'),
        ]);
        $dados->save();

        return redirect('/medicos/create')->with('success', 'Dados cadastrado com sucesso!');
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $dados = Medicos::find($id);
        return view('medico.editar', compact('dados'));
    }


    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nome'            => 'required|min:3',
            'idade'           => 'required',
            'data_nascimento' => 'required',
            'sexo'            => 'required',
            'registro'        => 'required',
            'celular'         => 'required',
        ]);

        $dados = Medicos::find($id);
        $dados->nome            = $request->get('nome');
        $dados->idade           = $request->get('idade');
        $dados->data_nascimento = $request->get('data_nascimento');
        $dados->sexo            = $request->get('sexo');
        $dados->registro        = $request->get('registro');
        $dados->celular         = $request->get('celular');
        $dados->save();

        return redirect('/medicos')->with('success', 'Dados atualizados com sucesso!');
    }

    public function destroy($id)
    {
        //
        $dados = Medicos::find($id);
        $dados->delete();
        return redirect('/medicos')->with('success', 'Dados excluídos com sucesso!');
    }
}
