<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes;
use App\Models\MeioDeFaturamento;
use App\Models\InformacoesComplementares;
use App\Models\User;
use Hash;
class ClientesController extends Controller
{
    public function form(){
        $meiosdefaturamento = MeioDeFaturamento::all();

        return view('adm.clientes.form',[
            'meiosdefaturamento' => $meiosdefaturamento
        ]);
    }

    public function cad(Request $request){

        $user = new User();
        $user->name = $request->nome;
        $user->email = $request->email;
        $user->power = 0;
        $user->password = Hash::make($request->documento);

        if($user->save()){

        $cliente = new Clientes();
        $cliente->id_user = $user->id;
        $cliente->nome = $request->nome;
        $cliente->cpf = $request->documento;
        $cliente->rg = $request->rg;
        $cliente->profissao = $request->profissao;
        $cliente->ramo = $request->ramo;
        $cliente->data_nascimento = $request->data_nascimento;
        $cliente->celular = $request->celular;
        $cliente->telefone = $request->telefone;
        $cliente->cep = $request->cep;
        $cliente->uf = $request->uf;
        $cliente->cidade = $request->cidade;
        $cliente->endereco = $request->endereco;
        $cliente->email = $request->email;
        $cliente->senha = Hash::make($request->documento);
        $cliente->id_meio_de_faturamento  = $request->meio_faturamento;

        if($cliente->save()){
          
            $info = new InformacoesComplementares();
            $info->id_cliente = $cliente->id;
            if(isset($request->file)){
                $photoname = $request->file->getClientOriginalName();
                $info->foto = $photoname;
                $image = $request->file('file');
                $destinationPath = public_path('fotos-clientes/');
                $image->move($destinationPath, $photoname);
               }
           
            $info->nascimento_fundacao = $request->data_nascimento;
            $info->inscricao_municipal = $request->inscricao_municipal;
            $info->inscricao_estadual = $request->inscricao_estadual;
            $info->ramo = $request->ramo;
            $info->obs = $request->obs;
            $info->save();
                }
    }

    
    return redirect()->route('adm-info-clientes', ['id' => $cliente->id]);     
       
    }

    public function info($id){
        $cliente = Clientes::where('id', $id)->with('informacoes')->first();
        
        return view('adm.clientes.info',[
            'cliente' => $cliente,
        ]);
    }

    public function edit($id){

        $meiosdefaturamento = MeioDeFaturamento::all();
        $cliente = Clientes::where('id', $id)->with('informacoes')->first();
        
        return view('adm.clientes.edit',[
            'cliente' => $cliente,
            'meiosdefaturamento' => $meiosdefaturamento,
        ]);
    }

    public function upd(Request $request){

        
        $cliente = Clientes::where('id', $request->id)->with('informacoes')->first();
        $user = User::where('id', $cliente->id_user)->first();

        $user->name = $request->nome;
        $user->email = $request->email;
        $user->password = Hash::make($request->documento);

        if($user->save()){

        $cliente->id_user = $user->id;
        $cliente->nome = $request->nome;
        $cliente->cpf = $request->documento;
        $cliente->rg = $request->rg;
        $cliente->profissao = $request->profissao;
        $cliente->ramo = $request->ramo;
        $cliente->data_nascimento = $request->data_nascimento;
        $cliente->celular = $request->celular;
        $cliente->telefone = $request->telefone;
        $cliente->cep = $request->cep;
        $cliente->uf = $request->uf;
        $cliente->cidade = $request->cidade;
        $cliente->endereco = $request->endereco;
        $cliente->email = $request->email;
        $cliente->senha = Hash::make($request->documento);
        $cliente->id_meio_de_faturamento  = $request->meio_faturamento;

        if($cliente->save()){
          
            $info = InformacoesComplementares::where('id_cliente', $cliente->id)->first();
            $info->id_cliente = $cliente->id;
            if(isset($request->file)){
                $photoname = $request->file->getClientOriginalName();
                $info->foto = $photoname;
                $image = $request->file('file');
                $destinationPath = public_path('fotos-clientes/');
                $image->move($destinationPath, $photoname);
               }
           
            $info->nascimento_fundacao = $request->data_nascimento;
            $info->inscricao_municipal = $request->inscricao_municipal;
            $info->inscricao_estadual = $request->inscricao_estadual;
            $info->ramo = $request->ramo;
            $info->obs = $request->obs;
            $info->save();
                }
    }
        return redirect()->route('adm-info-clientes', ['id' => $cliente->id]);      
    }
}
