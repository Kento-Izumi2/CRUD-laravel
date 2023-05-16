<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Agendamento;


class AgendamentoController extends Controller
{
    function create(Request $request){
        $request->validate([
            'Nome'=>'required',
            'Telefone'=>'required',
            'Origem'=>'required',
            'DataContato'=>'required',
            'Obervacao'=>'required'
        ]);
        $query = DB::table('servico')->insert([
            'Nome'=>$request->input('Nome'),
            'Telefone'=>$request->input('Telefone'),
            'Origem'=>$request->input('Origem'),
            'DataContato'=>$request->input('DataContato'),
            'Obervacao'=>$request->input('Obervacao')
        ]);
        return redirect()->to('/');
        
    }
    public function listar()
    {
        $data = array(
            'listar' =>DB::table('servico')->get()

        );
        return view('consultar', $data);
    }
    function excluir($id){
        $query = DB::table('servico')
        ->where('id', $id)
        ->delete();
        if ($query) {
            return back()->with('success', 'Dados deletados com sucesso!');
        } else {
            return back()->with('fail', 'Algo deu errado!');
        }
    }

    function atualizar(Request $request){
        $request->validate([
            'Nome' => 'required',
            'Telefone' => 'required',
            'Origem' => 'required',
            'DataContato' => 'required',
            'Obervacao' => 'required',
        ]);
        $query = DB::table('servico')
        ->where('id', $request->input('cid'))
        ->update([
            'Nome' => $request->input('Nome'),
            'Telefone' => $request->input('Telefone'),
            'Origem' => $request->input('Origem'),
            'DataContato' => $request->input('DataContato'),
            'Obervacao' => $request->input('Obervacao'),
        ]);
        return redirect()->to('consultar');

        if ($query) {
            return back()->with('success', 'Dados atualizados com sucesso!');
        } else {
            return back()->with('fail', 'Algo deu errado!');
          
        }

       
    }
    function editar($id){
        $row = DB::table('servico')
        ->where('id', $id)
        ->first();
        $data = [
            'info' => $row,
            'Title'=>'Editanto'
            
        ];
        return view('editar', $data);

    }
}