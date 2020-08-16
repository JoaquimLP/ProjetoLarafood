<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class CategoriaProdutoController extends Controller
{
    protected $dadosProduto, $dadosCategoria;

    public function __construct(Produto $produto, Categoria $categoria)
    {
        $this->dadosCategoria = $categoria;
        $this->dadosProduto = $produto;
    }

    public function listaCategoria($id)
    {
        $produto = $this->dadosProduto->find($id);

        if (!$produto) {
            return redirect()->back();
        }

        $categorias = $produto->categorias()->paginate();
        return view('admin.produto.categoriaProduto.index', compact('produto', 'categorias'));
    }

    public function createCategoria($id)
    {
        $produto = $this->dadosProduto->find($id);

        if (!$produto) {

            return redirect()->back();
        }

        $categorias = $produto->createCategoria();
        //dd($categorias);
        return view('admin.produto.categoriaProduto.create', compact('produto', 'categorias'));
    }

    public function storeCategoria(Request $request, $id){
        $produto = $this->dadosProduto->find($id);

        if(empty($produto)){
            return redirect()->back();
        }

        if(!empty($request->categoria)){
            $produto->categorias()->attach($request->categoria);
            return redirect()
                ->route('produto.categoria', $produto->id)
                ->with('success', 'Categoria adicionada com sucesso');
        }else{
            return redirect()->back()->with('error', 'Deve selecionar pelo uma categoria');;
        }

    }


    public function searchCategoria(Request $request, $id){
        $produto = $this->dadosProduto->find($id);

        $categorias = $produto->searchCategoria($request->filtrar);
        $filtros = $request->except('_token');
     
        return view('admin.produto.categoriaProduto.create', compact('produto', 'categorias', 'filtros'));
    }

    public function detachCategoria($idProduto, $idCategoria){
        $produto = $this->dadosProduto->find($idProduto);
        $categoria = $this->dadosCategoria->find($idCategoria);

        if(empty($produto) || empty($categoria)){
            return redirect()->back();
        }
     
        $produto->categorias()->detach($categoria);
        return redirect()
                ->route('produto.categoria', $produto->id)
                ->with('message', 'Categoria removida com sucesso');
    }
}
