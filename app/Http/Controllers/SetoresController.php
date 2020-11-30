<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setor;
use App\Http\Requests\SetorFormRequest;

class SetoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $setores = Setor::paginate(10);
        return view('setores.index', compact('setores') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(!session()->has('redirect_to'))
        {
           session(['redirect_to' => url()->previous()]);
        }
        return view('setores.create', ['action'=>route('setor.store'), 'method'=>'post']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SetorFormRequest $request)
    {
        //
        if (! $request->has('cancel') ){
            $dados = $request->all();
            Setor::create($dados);
            $request->session()->flash('message', 'Setor cadastrado com sucesso');
        }
        else
        { 
            $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
        }
        return redirect()->to(session()->pull('redirect_to'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Setor $setor, SetorFormRequest $request)
    {
        if (! $request->has('cancel') ){
            $setor->sigla = $request->input('sigla');
            $setor->descricao = $request->input('descricao');
            $setor->secao = $request->input('secao');
            $setor->subsecao = $request->input('subsecao');
            $setor->update();
            $request->session()->flash('message', 'Setor atualizado com sucesso !');
        }
        else
        { 
            $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
        }
        return redirect()->to(session()->pull('redirect_to'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setor $setor, Request $request)
    {
        //
        if (! $request->has('cancel') ){
            $strSetor = $setor->silga . ', Descrição: ' . $setor->descricao;
            $setor->delete();
            $request->session()->flash('message', 'Setor: ' , $strSetor . ' excluído com sucesso !');
        }
        else
        { 
            $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
        }
        return redirect()->to(session()->pull('redirect_to')); 
    }
}
