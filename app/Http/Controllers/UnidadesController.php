<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Unidades;
class UnidadesController extends Controller
{
    public function form(){
     

        return view('adm.unidades.form');
    }

    public function cad(Request $request){
        $unidade = new Unidades();
        $unidade->nome = $request->nome;
        $unidade->email = $request->email;
        $unidade->telefone = $request->telefone;
        $unidade->rua = $request->rua;
        $unidade->cidade = $request->cidade;
        $unidade->bairro = $request->bairro;
        $unidade->uf = $request->uf;
        $unidade->complemento = $request->complemento;
        $unidade->save();

        return redirect()->route('adm-info-unidades', ['id' => $unidade->id]);
    }

    public function  info($id){
        $unidade = Unidades::where('id', $id)->first();

        return view('adm.unidades.info', [
            'unidade' => $unidade,
        ]);
    }

    public function upd(Request $request){
       
        $unidade = Unidades::where('id', $request->id)->first();
        $unidade->nome = $request->nome;
        $unidade->email = $request->email;
        $unidade->telefone = $request->telefone;
        $unidade->rua = $request->rua;
        $unidade->cidade = $request->cidade;
        $unidade->bairro = $request->bairro;
        $unidade->uf = $request->uf;
        $unidade->complemento = $request->complemento;
        $unidade->save();

        return redirect()->route('adm-info-unidades', ['id' => $unidade->id]);
    }
}
