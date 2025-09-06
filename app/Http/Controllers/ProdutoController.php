<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoStoreRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $busca = request('search');

        if ($busca) {
            $produtos = Produto::where([
                ['nome', 'like', "%" . $busca . "%"]

            ])->get();
            
        } else {
            $produtos = DB::select("SELECT * FROM produtos ORDER BY id desc ");

        }
      
       
        return view('produtos.index', ['produtos' => $produtos, 'busca' => $busca]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $request->validated();

        $produto = new Produto();

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->descricao = $request->descricao;
        
        $img = $this->validarImagem($request, $produto);

        if (is_string($img)){
          $produto->imagem = $img;
        }
        
           
    
        $produto->save();

        return redirect('/');

        

    }

  /*   public function storeUser(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'preco' => 'required',
            'descricao' => 'required'
        ]);

        dd($request->all());
    } */

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produto = Produto::findOrFail($id);

        return view('produtos.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function validarImagem(UserStoreRequest $request, Produto $produto) : bool | string
    {
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $file = $request->imagem;

            $extension = $file->extension();

            $fileName = md5($file->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $file->move(public_path('/img/uploads'), $fileName);

            return $fileName;
        }

        return false;
    }
}
