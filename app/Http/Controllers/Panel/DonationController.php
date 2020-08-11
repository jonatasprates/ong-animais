<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Http\Requests\DonationUpdateFormRequest;
use App\Http\Requests\DonationFormRequest;

class DonationController extends Controller
{
    private $donation;
    private $totalPage = 10;

    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donations = $this->donation->paginate($this->totalPage);

        $title = 'Doações';

        return view('panel.donation.index', compact('donations', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Gestão de Doações';

        return view('panel.donation.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DonationFormRequest $request)
    {
        $dataForm = $request->all();
        
        $insert = $this->donation->create($dataForm);
        if ($insert)
            return redirect()
                        ->route('donation.index')
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
        $donation = $this->donation->find($id);
        if(!$donation)
            return redirect()->back();

        $title = "Detalhes do Doador: {$donation->name}";

        return view('panel.donation.show', compact('donation', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donation = $this->donation->find($id);

        if(!$donation)
            return redirect()->back();

        $title = 'Gestão de Doações';

        return view('panel.donation.create-edit', compact('title', 'donation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DonationUpdateFormRequest $request, $id)
    {
        $dontation = $this->donation->find($id);
        if(!$dontation)
            return redirect()->back();

        $update = $dontation->update($request->all());

        if($update)
            return redirect()
                        ->route('donation.index')
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
        $dontation = $this->donation->find($id);
        if(!$dontation)
            return redicrect()->back();

        if($dontation->delete())
            return redirect()
                        ->route('donation.index')
                        ->with('success', 'Deletado com sucesso!');
        else
            return redirect()
                        ->back()
                        ->with('error', 'Erro ao deletar!');
        
        return view('panel.donation.index', compact('dontation'));
    }
    
    public function search(Request $request)
    {
       //Recupera a palavra digitada
        $keySearch = $request->get('key_search');
        
        //Filtra os dados de acordo com a palavra de pesquisa
        $donations = $this->donation
                            ->where('name', 'LIKE', "%$keySearch%")
                            ->orWhere('type', 'LIKE', "%$keySearch%")
                            ->paginate(10);
        
        return view('panel.donation.index', compact('donations'));
    }
}
