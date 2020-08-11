<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserUpdateFormRequest;
use App\Http\Requests\UserFormRequest;

class UserController extends Controller
{
    private $user;
    private $totalPage = 10;
    
    public function __construc(User $user)
    {
        $this->user = $user;
    }
    
    public function index()
    {
        
        $users = User::paginate($this->totalPage);
        
        $title = 'Usuário';

        return view('panel.user.index', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Gestão de Usuários';

        return view('panel.user.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $dataForm = $request->all();
        $password = $dataForm['password'];
        $dataForm['password'] = bcrypt($dataForm['password']);

        $insert = User::create($dataForm);
        if ($insert)
            return redirect()
                        ->route('user.index')
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
        $user = User::find($id);
        if(!$user)
            return redirect()->back();

        $title = "Detalhes do Usuário: {$user->name}";

        return view('panel.user.show', compact('user', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        if(!$user)
            return redirect()->back();

        $title = 'Gestão de Usuários';

        return view('panel.user.create-edit', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateFormRequest $request, $id)
    {
        $user = User::find(auth()->user()->id);
        
        if(!$user)
            return redirect()->back();
        
        $dataForm = $request->all();
        
        if( $dataForm['password'] != '' )
            $dataForm['password'] = bcrypt($dataForm['password']);
        else
            unset($dataForm['password']);

        $update = $user->update($dataForm);

        if($update)
            return redirect()
                        ->route('user.index')
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
        $user = User::find($id);
        if(!$user)
            return redicrect()->back();

        if($user->delete())
            return redirect()
                        ->route('user.index')
                        ->with('success', 'Deletado com sucesso!');
        else
            return redirect()
                        ->back()
                        ->with('error', 'Erro ao deletar!');
        
        return view('panel.user.index', compact('user'));
    }
    
    public function search(Request $request)
    {
       //Recupera a palavra digitada
        $keySearch = $request->get('key_search');
        
        //Filtra os dados de acordo com a palavra de pesquisa
        $users = User::where('name', 'LIKE', "%$keySearch%")->paginate(10);
        
        return view('panel.user.index', compact('users'));
    }
}
