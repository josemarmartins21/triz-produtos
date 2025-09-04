@extends('layouts.main')

@section('content')
    <section id="home">
        <div id="hero">
            <div id="preta">
                <h1>Busque por um produto</h1>    
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="search" id="search" placeholder="Busque por um produto" required>
                    </div>
                </form>
            </div>
        </div>  
        
        <div id="produtos">
            <h3>Produto</h3>

            <div id="container">
                <div class="card">
                    <img src="/img/lasanha.jpg" alt="">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam beatae quibusdam consequuntur, harum magnam ullam sequi eaque odio aperiam accusamus a alias dolor quasi! Distinctio fuga consequatur dolorem cumque eligendi.
                    </p>
                    <span>200.00R$</span>
                </div>
                <div class="card">
                    <img src="/img/lasanha.jpg" alt="">
                    <h3>Produto</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam beatae quibusdam consequuntur, harum magnam ullam sequi eaque odio aperiam accusamus a alias dolor quasi! Distinctio fuga consequatur dolorem cumque eligendi.
                    </p>
                    <span>200.00R$</span>
                </div>
                    <div class="card">
                        <img src="/img/lasanha.jpg" alt="">
                        <h3>Produto</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam beatae quibusdam consequuntur, harum magnam ullam sequi eaque odio aperiam accusamus a alias dolor quasi! Distinctio fuga consequatur dolorem cumque eligendi.
                        </p>
                        <span>200.00R$</span>
                    </div>
                
                
                    <div class="card">
                        <img src="/img/lasanha.jpg" alt="">
                        <h3>Produto</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam beatae quibusdam consequuntur, harum magnam ullam sequi eaque odio aperiam accusamus a alias dolor quasi! Distinctio fuga consequatur dolorem cumque eligendi.
                        </p>
                        <span>200.00R$</span>
                    </div>
                
            </div>     
            </div>
            
    </section>        
@endsection