<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Animal;
use App\Http\Requests\AnimalUpdateFormRequest;

class AnimalController extends Controller
{
    private $animal;
    private $totalPage = 10;

    public function __construct(Animal $animal)
    {
        $this->animal = $animal;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = $this->animal->paginate($this->totalPage);

        $title = 'Animais';

        return view('panel.animal.index', compact('animals', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Gestão de Animais';

        return view('panel.animal.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnimalUpdateFormRequest $request)
    {
        $nameFile = '';
        
        if ($request->hasFile('image') && $request->file('image')->isValid())
        {   
            $nameFile = uniqid(date('HisYmd')).'.'.$request->image->extension();

            if(!$request->image->storeAs('animais', $nameFile))
                return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload!');
        }
        
        $insert = $this->animal->newAnimal($request, $nameFile);
        
        if ($insert)
            return redirect()
                        ->route('animal.index')
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
        $animal = $this->animal->find($id);
        if(!$animal)
            return redirect()->back();

        $title = "Detalhes do Animal: {$animal->name}";

        return view('panel.animal.show', compact('animal', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = $this->animal->find($id);

        if(!$animal)
            return redirect()->back();

        $title = 'Gestão de Animais';

        return view('panel.animal.create-edit', compact('title', 'animal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnimalUpdateFormRequest $request, $id)
    {
        $animal = $this->animal->find($id);
        if(!$animal)
            return redirect()->back();

        $nameFile = $animal->image;
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            
            if($animal->image)
                $nameFile = $animal->image;
            else
                $nameFile = uniqid(date('HisYmd')).'.'.$request->image->extension();

            if (!$request->image->storeAs('animais', $nameFile))
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();
        }

        if ( $animal->updateAnimal($request, $nameFile) )
            return redirect()
                            ->route('animal.index')
                            ->with('success', 'Atualizado com sucesso!');
            else
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao atualizar!')
                            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $animal = $this->animal->find($id);
        if(!$animal)
            return redicrect()->back();

        if($animal->delete())
            return redirect()
                        ->route('animal.index')
                        ->with('success', 'Deletado com sucesso!');
        else
            return redirect()
                        ->back()
                        ->with('error', 'Erro ao deletar!');
        
        return view('panel.animal.index', compact('animal')); 
        
    }

    public function search(Request $request)
    {
       //Recupera a palavra digitada
        $keySearch = $request->get('key_search');
        
        //Filtra os dados de acordo com a palavra de pesquisa
        $animals = $this->animal
                            ->where('name', 'LIKE', "%$keySearch%")
                            ->orWhere('blood', 'LIKE', "%$keySearch%")
                            ->paginate(10);
        
        return view('panel.animal.index', compact('animals'));
    }
}
