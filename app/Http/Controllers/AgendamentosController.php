<?php

namespace App\Http\Controllers;

use App\Models\Agendamentos;
use App\Models\Pacientes;
use App\Models\Medicos;
use Illuminate\Http\Request;

class AgendamentosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        $dados = Agendamentos::all();
        return view('agendamento.listar', compact('dados'));
    }

    public function create()
    {
        //
        $dados_medicos = Medicos::all();
        $dados_pacientes = Pacientes::all();
        return view('agendamento.inserir', compact('dados_medicos','dados_pacientes'));
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'id_paciente' => 'required',
            'id_medico'   => 'required',
            'descricao'   => 'required',
            'datahora'    => 'required',
        ]);
        $dados = new Agendamentos([
            'id_paciente' => $request->get('id_paciente'),
            'id_medico'   => $request->get('id_medico'),
            'descricao'   => $request->get('descricao'),
            'datahora'    => $request->get('datahora'),
        ]);
        $dados->save();

        return redirect('/agendamentos/create')->with('success', 'Dados cadastrado com sucesso!');
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $dados = Agendamentos::find($id);
        $dados_medicos = Medicos::all();
        $dados_pacientes = Pacientes::all();
        return view('agendamento.editar', compact('dados','dados_medicos','dados_pacientes'));
    }


    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'id_paciente' => 'required',
            'id_medico'   => 'required',
            'descricao'   => 'required',
            'datahora'    => 'required',
        ]);

        $dados = Agendamentos::find($id);
        $dados->id_paciente = $request->get('id_paciente');
        $dados->id_medico   = $request->get('id_medico');
        $dados->descricao   = $request->get('descricao');
        $dados->datahora    = $request->get('datahora');
        $dados->save();

        return redirect('/agendamentos')->with('success', 'Dados atualizados com sucesso!');
    }

    public function destroy($id)
    {
        //
        $dados = Agendamentos::find($id);
        $dados->delete();
        return redirect('/agendamentos')->with('success', 'Dados excluídos com sucesso!');
    }

}
