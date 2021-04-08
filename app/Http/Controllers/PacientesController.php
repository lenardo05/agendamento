<?php

namespace App\Http\Controllers;

use App\Models\Pacientes;
use App\Models\Agendamentos;
use Illuminate\Http\Request;

class PacientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        $dados = Pacientes::all();
        return view('paciente.listar', compact('dados'));
    }

    public function create()
    {
        //
        return view('paciente.inserir');
    }

    public function store(Request $request)
    {
        //
        $request->validate([
            'nome'            => 'required|min:3',
            'idade'           => 'required',
            'data_nascimento' => 'required',
            'sexo'            => 'required',
            'celular'         => 'required',
            'endereco'        => 'required',
        ]);
        $dados = new Pacientes([
            'nome'            => $request->get('nome'),
            'idade'           => $request->get('idade'),
            'data_nascimento' => $request->get('data_nascimento'),
            'sexo'            => $request->get('sexo'),
            'celular'         => $request->get('celular'),
            'endereco'        => $request->get('endereco'),
        ]);
        $dados->save();

        return redirect('/pacientes/create')->with('success', 'Dados cadastrado com sucesso!');
        
    }

    public function show($id)
    {
        //
        $dados = Pacientes::find($id);
        $dados_agendamentos = Agendamentos::where('id_paciente', '=', $id)->get();
        return view('paciente.perfil', compact('dados', 'dados_agendamentos'));
    }

    public function edit($id)
    {
        //
        $dados = Pacientes::find($id);
        return view('paciente.editar', compact('dados'));
    }


    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nome'            => 'required|min:3',
            'idade'           => 'required',
            'data_nascimento' => 'required',
            'sexo'            => 'required',
            'celular'         => 'required',
            'endereco'        => 'required',
        ]);

        $dados = Pacientes::find($id);
        $dados->nome            = $request->get('nome');
        $dados->idade           = $request->get('idade');
        $dados->data_nascimento = $request->get('data_nascimento');
        $dados->sexo            = $request->get('sexo');
        $dados->celular         = $request->get('celular');
        $dados->endereco        = $request->get('endereco');
        $dados->save();

        return redirect('/pacientes')->with('success', 'Dados atualizados com sucesso!');
    }

    public function destroy($id)
    {
        //
        $dados = Pacientes::find($id);

        $consulta = Agendamentos::where('id_paciente', '=', $id)->get()->first();

        if($consulta){
            return back()->with(
                [
                    "mensagem" => "Deseja excluir o(a) paciente {$dados->nome}? A exlusão impactará nos agendamentos!",
                    "rota" => "pacientes.delete.confirma",
                    "id" => $dados->id,
                ]
            );
        };

        $dados->delete();
        return redirect('/pacientes')->with('success', 'Dados excluídos com sucesso!');
    }

    public function confirma($id)
    {
        //
        $dados = Pacientes::find($id);
        $dados->delete();
        return redirect('/pacientes')->with('success', 'Dados excluídos com sucesso!');

    }
}
