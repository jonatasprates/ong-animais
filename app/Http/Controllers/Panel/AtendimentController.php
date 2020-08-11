<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Animal;
use App\Models\Veterinary;
use App\Http\Requests\HistoryUpdateFormRequest;

class AtendimentController extends Controller
{
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $atendiments = History::with(['animal', 'veterinary'])->paginate(10);
        
        return view('panel.atendiment.index', compact('atendiments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Gestão de Históricos de Atendimentos';
        
        $animals = Animal::pluck('name', 'id');
        $veterinays = Veterinary::pluck('name', 'id');

        return view('panel.atendiment.create-edit', compact('title', 'animals', 'veterinays'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HistoryUpdateFormRequest $request)
    {
        $dataForm = $request->all();
        
        $insert = History::create($dataForm);
        if ($insert)
            return redirect()
                        ->route('atendiment.index')
                        ->with('success', 'Cadastro realizado com sucesso!');
        else
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao cadastrar!')
                        ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $atendiment = History::find($id);
        if(!$atendiment)
            return redirect()->back();

        $title = "Detalhes do Histórico";

        return view('panel.atendiment.show', compact('atendiment', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atendiment = History::find($id);

        if(!$atendiment)
            return redirect()->back();
        
        $animals = Animal::pluck('name', 'id');
        $veterinays = Veterinary::pluck('name', 'id');

        $title = 'Gestão de Histórico';

        return view('panel.atendiment.create-edit', compact('title', 'atendiment', 'animals', 'veterinays'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HistoryUpdateFormRequest $request, $id)
    {
        $atendiment = History::find($id);
        if(!$atendiment)
            return redirect()->back();

        $update = $atendiment->update($request->all());

        if($update)
            return redirect()
                        ->route('atendiment.index')
                        ->with('success', 'Atualizado com sucesso!');
        else
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao atualizar!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $atendiment = History::find($id);
        if(!$atendiment)
            return redicrect()->back();

        if($atendiment->delete())
            return redirect()
                        ->route('atendiment.index')
                        ->with('success', 'Deletado com sucesso!');
        else
            return redirect()
                        ->back()
                        ->with('error', 'Erro ao deletar!');
        
        return view('panel.atendiment.index', compact('atendiment'));
    }
    
    public function search(Request $request)
    {
       //Recupera a palavra digitada
        $keySearch = $request->get('key_search');
        
        //Filtra os dados de acordo com a palavra de pesquisa
        $atendiments = History::where('id', 'LIKE', "%$keySearch%")
                            ->paginate(10);
        
        return view('panel.atendiment.index', compact('atendiments'));
    }
}
