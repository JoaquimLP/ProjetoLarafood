<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProdutoRequest;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    private $dadosProduto;

    public function __construct(Produto $produto)
    {
        $this->dadosProduto = $produto;
        $this->middleware('can:Produtos');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = $this->dadosProduto->paginate();
        return view('admin.produto.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.produto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateProdutoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProdutoRequest $request)
    {
        $empresa = auth()->user()->empresa;
        $data = $request->all();
        if($request->hasFile('image') && $request->image->isValid()){
            $data['image'] = $request->image->store("empresas/{$empresa->uuid}/produtos");
        }
        $this->dadosProduto->create($data);
        return redirect()->route('produto.index')->with('success', 'Produto cadastrada com sucesso..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = $this->dadosProduto->find($id);

        if(!$produto){
            return redirect()->back();
        }


        return view('admin.produto.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = $this->dadosProduto->find($id);

        if(!$produto){
            return redirect()->back();
        }

        return view('admin.produto.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateProdutoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProdutoRequest $request, $id)
    {
        $produto = $this->dadosProduto->find($id);

        if(!$produto){
            return redirect()->back();
        }
        $empresa = auth()->user()->empresa;
        $data = $request->all();
        if($request->hasFile('image') && $request->image->isValid()){
            if(Storage::exists($produto->image)){
                Storage::delete($produto->image);
            }
            $data['image'] = $request->image->store("empresas/{$empresa->uuid}/produtos");
        }
        $produto->update($data);
        return redirect()->route('produto.index')->with('success', 'Dados atualizado com sucesso..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->dadosProduto->find($id);

        if(empty($produto)){
            return redirect()
            ->back()
            ->with('error', 'Existe Produtos vinculado a essa produto, portando não pode deletar');
        }
        if(Storage::exists($produto->image)){
            Storage::delete($produto->image);
        }
        $produto->delete();
        return redirect()
            ->route('produto.index')
            ->with('message', 'Resgistro deletado com sucesso');
    }

    public function search(Request $request){
        $filtros = $request->only('filtrar');

        $produtos = $this->dadosProduto
            ->where(function($query) use($request){
                if($request){
                    $query->orWhere('titulo', 'LIKE', "%{$request->filtrar}%")
                    ->orWhere('descricao', 'LIKE', "%{$request->filtrar}%");
                }
            })->paginate();


        return view('admin.produto.index', compact('produtos', 'filtros'));
    }
}
