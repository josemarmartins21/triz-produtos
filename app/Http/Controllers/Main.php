<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class Main extends Controller
{
    // =======================================================
    public function formulario() {
        return view('formulario');
    }

    // =======================================================
    public function subimissao(Request $request)
    {
        // validação
        $request->validate(
            // Regras de validação
            [
                'text_produto' => 'required|max:10|min:3',
                'text_marca' => 'required|max:10',

                
            ], 
            // Mensagens de erro
            [
                'text_produto.required' => 'O :attribute é de preenchimento obrigatório',
                'text_produto.min' => 'O :attribute tem que ter mais de :min letras',
                'text_produto.max' => 'O :attribute não pode ter mais de :max letras'
                
            ]
        );

        $produto = $request->input('text_produto');
        $marca = $request->input('marca');
        echo "ok";


/* 
        echo '<pre>';
        $produto = $request->input('text_produto');
        $marca = $request->input('text_marca');
        echo "O produto é $produto e a marca é $marca"; 
*/
    }

    // =======================================================
    // upload de ficheiros
    public function upload()
    {
        // formulario de upload
        return view('upload');

    }

    // =======================================================

    public function upload_submissao(Request $request)
    {
        // validação
        /* $validacao = $request->validate([
            'ficheiro' => 'required|image|mimes:jpg,png,webp|max:500|min:100|dimensions:min_widt'
        ],

        ['ficheiro.required' => ':attribute é obrigatorio',
        'ficheiro.image' => ':attribute tem que ser uma img'
        ]); */
        // upload para o storage
        // upload do ficheiro - storage
        //$request->file('ficheiro')->store('public/pdfs');
        /* $request->file('ficheiro')->storeAs('public/pdfs', 'josemar01.pdf');

        Storage::putFile('public/pdfs', $request->file('ficheiro'), 'documentoxpt.pdf'); */

        /**------------------------------------------------------------------------------- */

        // Guardar em outra pasta publica
        $request->file('ficheiro')->storeAs('','josemar.pdf', ['disk' => 'files']);
 

        
        // echo 'ok';
    }






















    // =======================================================
    public function sessao(Request $request)
    {
       


        /* session()->put('usurio', 'Antonio');

        if (session()->has('usurio')) {
            echo "Ola " . session()->get('usurio'); 
        }

        session()->forget('usuario'); */

        /* session()->flash('usuario', 'joão'); */

        session()->forget('usurio');

    }

    // =======================================================
    public function verSessao(Request $request)
    {
        // ver os dados da sessao
        echo '<pre>';
        /* print_r($request->session()); */
        print_r($request->session()->all());
    }
}
