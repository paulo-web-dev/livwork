<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidades;
use App\Models\Salas;
use App\Models\ConfiguracoesSalas;
use App\Models\HorariosFuncionamento;
use App\Models\FotosSala;
use App\Models\Facilidades;
class SalasAdmController extends Controller
{
    public function form(){
     
        $unidades = Unidades::all();
        return view('adm.salas.form', [
            'unidades' => $unidades,
        ]);
    }


    public function cad(Request $request){


  
        $sala = new Salas();
        $sala->nome = $request->nome;
        $sala->valor = $request->valor;
        $sala->id_unidade = $request->id_unidade;
        $sala->save();

            
        $arquivos = $request->file('file');
        if(isset($arquivos)){
        foreach ($arquivos as $arquivo) {
            $photoname = $arquivo->getClientOriginalName();
            $destinationPath = public_path('fotos/salas/');
            $foto =  new FotosSala ();
            $foto->id_sala = $sala->id;
            $foto->path = $photoname;
            $arquivo->move($destinationPath, $photoname);
            $foto->save();  

        }
    }


        $configuracoes = new ConfiguracoesSalas();
        $configuracoes->id_sala = $sala->id;
        $configuracoes->cor = $request->cor;
        $configuracoes->quantidade_max_pessoas = $request->quantidade_max_pessoas;
        $configuracoes->agendamento_fracionado = $request->agendamento_fracionado;
        $configuracoes->agendamento_apenas_diaria = $request->agendamento_apenas_diaria;
        $configuracoes->vizualizacao_cliente = $request->vizualizacao_cliente;
        $configuracoes->save(); 

        $horarios = new HorariosFuncionamento();
        $horarios->id_sala = $sala->id;
        $horarios->inicio_padrao = $request->horario_inicio_padrao;
        $horarios->fim_padrao = $request->horario_fim_padrao;
        $horarios->inicio_almoco = $request->horario_inicio_almoco;
        $horarios->fim_almoco = $request->horario_inicio_almoco;
        $horarios->inicio_sabado = $request->horario_sabado;
        $horarios->fim_sabado = $request->horario_sabado;
        $horarios->inicio_domingo = $request->horario_domingo;
        $horarios->fim_domingo = $request->horario_domingo;
        $horarios->save();

        
        foreach ($request->comodidades as $key => $comodidade) {
            $facilidade = new Facilidades();
            $facilidade->id_sala = $sala->id;
            $facilidade->facilidade = $comodidade;
            $facilidade->save();
         }
        return redirect()->route('adm-info-salas', ['id' => $sala->id]);
    }

    public function info($id){
        $sala = Salas::where('id', $id)
        ->with('unidades')
        ->with('fotos')
        ->with('facilidades')
        ->with('configuracao')
        ->with('horarios')
        ->first();
        $unidades = Unidades::all();
        return view('adm.salas.info',[
            'sala' => $sala,
            'unidades' => $unidades,
        ]);
    }

    public function upd(Request $request){


  
        $sala = Salas::where('id', $request->id_sala)->first();
        $sala->nome = $request->nome;
        $sala->valor = $request->valor;
        $sala->id_unidade = $request->id_unidade;
        $sala->save();

            
   


        $configuracoes =  ConfiguracoesSalas::where('id_sala', $sala->id)->first();
        $configuracoes->id_sala = $sala->id;
        $configuracoes->cor = $request->cor;
        $configuracoes->quantidade_max_pessoas = $request->quantidade_max_pessoas;
        $configuracoes->agendamento_fracionado = $request->agendamento_fracionado;
        $configuracoes->agendamento_apenas_diaria = $request->agendamento_apenas_diaria;
        $configuracoes->vizualizacao_cliente = $request->vizualizacao_cliente;
        $configuracoes->save(); 

        $horarios =  HorariosFuncionamento::where('id_sala', $sala->id)->first();
        $horarios->id_sala = $sala->id;
        $horarios->inicio_padrao = $request->horario_inicio_padrao;
        $horarios->fim_padrao = $request->horario_fim_padrao;
        $horarios->inicio_almoco = $request->horario_inicio_almoco;
        $horarios->fim_almoco = $request->horario_inicio_almoco;
        $horarios->inicio_sabado = $request->horario_sabado;
        $horarios->fim_sabado = $request->horario_sabado;
        $horarios->inicio_domingo = $request->horario_domingo;
        $horarios->fim_domingo = $request->horario_domingo;
        $horarios->save();

        
        Facilidades::where('id_sala', $request->id_sala)->delete();

        
        foreach ($request->comodidades as $key => $comodidade) {
            $facilidade = new Facilidades();
            $facilidade->id_sala = $sala->id;
            $facilidade->facilidade = $comodidade;
            $facilidade->save();
         }
        return redirect()->route('adm-info-salas', ['id' => $sala->id]);
    }
}
