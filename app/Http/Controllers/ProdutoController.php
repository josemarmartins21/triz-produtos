<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidOrderException;
use App\Http\Requests\ProdutoFormRequest;
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
    private $imagem = [];

    public function __construct()
    {
        $this->imagem = ['imagem', 'imagem_2'];
    }

    public function index()
    {
        $busca = request('search');
        /* Produto::query()->where('id',">", 15)->chunkById(2, function($produtos) {
            $produtos->each(function($produto) {
                $produto->preco = 3500;
                $produto->save();
                echo "<br>";
            });

            echo "<br> <br>";
        }); */
        /* throw new InvalidOrderException();
        
        dd(); */
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
        
        for ($i=0; $i < 2; $i++) { 
            $img = $this->validarImagem($request, $this->imagem[$i]);

            if ($img && $i == 0) {
                $produto->imagem = $img;

            } else if ($img && $i > 0) {
                $produto->imagem_2 = $img;

            }
        }
    
        $produto->save(); /* Salva os dados no banco! */

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
        $produto = Produto::findOrFail($id);
        
        return view('produtos.edit', ['produto' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dados = $request->validate([
           'nome' => 'required|string|min:4',
           'preco' => 'required|numeric',
           'descricao' => 'required|min:50'
        ]);
        
        $this->validarImagem($request, $this->imagem);

        Produto::findOrFail(($id))->update($dados);

        return redirect('/dashboard')->with('msg', 'Produto atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produto::findOrFail($id)->delete();

        return redirect('/dashboard')->with('msg', "Produto eliminado com sucesso");
    }

    public function dashboard()
    {
        $produtos = Produto::all();

        $total_de_produtos = Produto::all()->count();

        return view('produtos.dashboard', ['produtos' => $produtos, 'total_de_produtos' =>$total_de_produtos]);
    }

    /**
     * Função que tem como função validar imagem antes de entrar no banco
     * 
     *
     * @param UserStoreRequest $request
     * @param [type] $imagem
     * @return void
     */
    public function validarImagem($request, $imagem) : bool | string
    {
        if ($request->hasFile($imagem) && $request->file($imagem)->isValid()) {
            $file = $request->file($imagem);

            $extension = $file->extension();

            $fileName = md5($file->getClientOriginalName() . strtotime('now')) . "." . $extension;

            $file->move(public_path('/img/uploads'), $fileName);

            return $fileName;
        }

        return false;
    }
}
