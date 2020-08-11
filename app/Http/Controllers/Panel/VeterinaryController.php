<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Veterinary;
use App\Http\Requests\VeterinaryUpdateFormRequest;

class VeterinaryController extends Controller
{
    private $veterinary;
    private $totalPage = 10;

    public function __construct(Veterinary $veterinary)
    {
        $this->veterinary = $veterinary;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Veterinário';

        $veterinarys = $this->veterinary->paginate($this->totalPage);

        return view('panel.veterinary.index', compact('title', 'veterinarys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Gestão de Veterinário';
        
        return view('panel.veterinary.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VeterinaryUpdateFormRequest $request)
    {
        $dataForm = $request->all();

        $insert = $this->veterinary->create($dataForm);
        if ($insert)
            return redirect()
                        ->route('veterinary.index')
                        ->with('success', 'Cadastro realizado com sucesso!');
        else
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao cadastrar!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $veterinary = $this->veterinary->find($id);
        if(!$veterinary)
            return redirect()->back();

        $title = "Detalhes do Veterinário: {$veterinary->name}";

        return view('panel.veterinary.show', compact('veterinary', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $veterinary = $this->veterinary->find($id);

        if (!$veterinary)
            return redirect()->back();

        $title = 'Gestão de Veterinário';

        return view('panel.veterinary.create-edit', compact('title', 'veterinary'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VeterinaryUpdateFormRequest $request, $id)
    {
        $veterinary = $this->veterinary->find($id);
        if(!$veterinary)
            return redirect()->back();

        $update = $veterinary->update($request->all());

        if($update)
            return redirect()
                        ->route('veterinary.index')
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
        $veterinary = $this->veterinary->find($id);
        if(!$veterinary)
            return redicrect()->back();

        if($veterinary->delete())
            return redirect()
                        ->route('veterinary.index')
                        ->with('success', 'Deletado com sucesso!');
        else
            return redirect()
                        ->back()
                        ->with('error', 'Erro ao deletar!');
        
        return view('panel.veterinary.index', compact('animal'));
    }
    
    public function search(Request $request)
    {
       //Recupera a palavra digitada
        $keySearch = $request->get('key_search');
        
        //Filtra os dados de acordo com a palavra de pesquisa
        $veterinarys = $this->veterinary
                            ->where('name', 'LIKE', "%$keySearch%")
                            ->orWhere('crv', 'LIKE', "%$keySearch%")
                            ->paginate(10);
        
        return view('panel.veterinary.index', compact('veterinarys'));
    }
}
