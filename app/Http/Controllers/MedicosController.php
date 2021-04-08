<?php

namespace App\Http\Controllers;

use App\Models\Medicos;
use App\Models\Agendamentos;
use App\Models\Especialidades;
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
        $dados = Medicos::with('especialidade')->get();
        return view('medico.listar', compact('dados'));
    }

    public function create()
    {
        //
        $dados_especialidades = Especialidades::all();
        return view('medico.inserir', compact('dados_especialidades'));
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
            'especialidade'   => 'required',
        ]);
        $dados = new Medicos([
            'nome'             => $request->get('nome'),
            'idade'            => $request->get('idade'),
            'data_nascimento'  => $request->get('data_nascimento'),
            'sexo'             => $request->get('sexo'),
            'registro'         => $request->get('registro'),
            'celular'          => $request->get('celular'),
            'id_especialidade' => $request->get('especialidade'),
        ]);

        $dados->save();
        return redirect('/medicos/create')->with('success', 'Dados cadastrado com sucesso!');
        
    }

    public function show($id)
    {
        //
        $dados = Medicos::find($id);
        $dados_agendamentos = Agendamentos::where('id_medico', '=', $id)->get();
        return view('medico.perfil', compact('dados', 'dados_agendamentos'));
    }

    public function edit($id)
    {
        //
        $dados = Medicos::find($id);
        $dados_especialidades = Especialidades::all();
        return view('medico.editar', compact('dados', 'dados_especialidades'));
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
            'especialidade'   => 'required',
        ]);

        $dados = Medicos::find($id);
        $dados->nome             = $request->get('nome');
        $dados->idade            = $request->get('idade');
        $dados->data_nascimento  = $request->get('data_nascimento');
        $dados->sexo             = $request->get('sexo');
        $dados->registro         = $request->get('registro');
        $dados->celular          = $request->get('celular');
        $dados->id_especialidade = $request->get('especialidade');
        $dados->save();

        return redirect('/medicos')->with('success', 'Dados atualizados com sucesso!');
    }

    public function destroy($id)
    {
        //
        $dados = Medicos::find($id);

        $consulta = Agendamentos::where('id_medico', '=', $id)->get()->first();

        if($consulta){
            return back()->with(
                [
                    "mensagem" => "Deseja excluir o(a) médico(a) {$dados->nome}? A exlusão impactará nos agendamentos!",
                    "rota" => "medicos.delete.confirma",
                    "id" => $dados->id
                ]
            );
        };
        $dados->delete();
        return redirect('/medicos')->with('success', 'Dados excluídos com sucesso!');
    }

    public function confirma($id)
    {
        //
        $dados = Medicos::find($id);
        $dados->delete();
        return redirect('/medicos')->with('success', 'Dados excluídos com sucesso!');

    }
}
