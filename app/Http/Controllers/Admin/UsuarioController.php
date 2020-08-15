<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateUsuarioRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    private $dadosUser;
    public function __construct(User $user)
    {
        $this->dadosUser = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$usuario = auth()->user()->empresa_id;
        $usuarios = $this->dadosUser->empresaUsuario()->paginate();

        return view('admin.usuario.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateUsuarioRequest $request)
    {
        $usuario = auth()->user()->empresa_id;
        $data = $request->all();
        $data['empresa_id'] = $usuario;

        $this->dadosUser->create([
            'empresa_id' => $data['empresa_id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        return redirect()->route('usuario.index')->with('success', 'Usuário cadastrado com sucesso');
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
        $usuario = $this->dadosUser->empresaUsuario()->find($id);
        return view('admin.usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateUsuarioRequest $request, $id)
    {
        $usuario = $this->dadosUser->empresaUsuario()->find($id);

        $data = $request->only(['name', 'email']);
      
        
        if (!empty($request->password)) {
            $data['password'] = bcrypt($request->password);
        } 
        $usuario->update($data);
    
        return redirect()->route('usuario.index')->with('success', 'Dados alterados com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
