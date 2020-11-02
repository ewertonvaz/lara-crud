<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipamento;
use App\Http\Requests\EquipamentoFormRequest;

class EquipamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $equipamentos = Equipamento::paginate(10);
        return view('equipamentos.index', compact('equipamentos') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!session()->has('redirect_to'))
        {
           session(['redirect_to' => url()->previous()]);
        }
        return view('equipamentos.create', ['action'=>route('equipamento.store'), 'method'=>'post']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EquipamentoFormRequest $request)
    {
        //
        //dd($request);
        if (! $request->has('cancel') ){
            $msg = session()->pull('message');
            $dados = $request->all();
            Equipamento::create($dados);
            $request->session()->flash('message', 'Equipamento cadastrado com sucesso');
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
    public function update(Equipamento $equipamento, EquipamentoFormRequest $request)
        {   
        if (! $request->has('cancel') ){
            $equipamento->tipo = $request->input('tipo');
            $equipamento->modelo = $request->input('modelo');
            $equipamento->fabricante = $request->input('fabricante');
            $equipamento->update();
            $request->session()->flash('message', 'Equipamento atualizado com sucesso !');
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
    public function destroy(Equipamento $equipamento, Request $request)
    {
        if (! $request->has('cancel') ){
            $strEqp = $equipamento->tipo . 'Modelo: ' . $equipamento->modelo . ' , Fabricante:' . $equipamento->fabricante;
            $equipamento->delete();
            session()->flash('message', 'Equipamento :' . $strEqp . ' excluído com sucesso !');
        }
        else
        { 
            $request->session()->flash('message', 'Operação cancelada pelo usuário'); 
        }
        return redirect()->to(session()->get('redirect_to'));
    }
}
