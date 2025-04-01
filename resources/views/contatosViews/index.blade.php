@extends('master')
@section('conteudo')
    

<nav class="nav col-12 d-flex justify-content-between px-4 mb-5">
    <div class="col-2">
        <span style="font-size: 1.2rem; font-weight: 500; color: white">Comercio S.A</span>
    </div>
    <div class="col-8 text-center">
    <a href="{{ route('clientes.index') }}" style="text-decoration: none;"><span style="font-size: 1.7rem; font-weight: 500; color: white">Clientes |</span></a>
    <a href="{{ route('contatos.index' , $cliente->id)}}" style="text-decoration: none;"><span style="font-size: 1.7rem; font-weight: 500; color: white"> Contatos</span></a>
</div>
    <div class="d-flex justify-content-end col-2">
        <span style="font-size: 1.2rem; font-weight: 500; color: white">Agenda de Clientes</span>
        

    </div>

</nav>

    <div class="container">
    <div class="container-fluid">

        <div class="col-12  d-flex justify-content-between mb-5">

            <div class="col-6 d-flex justify-content-around  " >
                <div class="col-5    p-2 div-cont" style="border-radius: 20px">
                <div class="col-12 text-center">
                    <h3 style="opacity: 0.5">Total Contatos:</h3>
                </div>

                <div class="mt-3 text-center">
                    <p style="font-size: 2rem; color: var(--azul);">{{  $totalContatos }}</p>
                </div>
            </div>
            <div class="col-5 p-2 div-cont" style="border-radius: 20px">
                <div class="col-12 text-center">
                    <h3 style="opacity: 0.5">Tipo Email:</h3>
                </div>

                <div class="mt-3 text-center">
                    <p style="font-size: 2rem; color: var(--azul);">{{  $totalEmails }}</p>
                </div>
            </div>
            </div>

            <div class="col-6 d-flex justify-content-around  " >
                <div class="col-5    p-2 div-cont" style="border-radius: 20px">
                <div class="col-12 text-center">
                    <h3 style="opacity: 0.5">Tipo Telefone:</h3>
                </div>

                <div class="mt-3 text-center">
                    <p style="font-size: 2rem; color: var(--azul);">{{  $totalTelefones }}</p>
                </div>
            </div>
            <div class="col-5 p-2 div-cont" style="border-radius: 20px">
                <div class="col-12 text-center">
                    <h3 style="opacity: 0.5">Tipo WhatsApp:</h3>
                </div>

                <div class="mt-3 text-center">
                    <p style="font-size: 2rem; color: var(--azul);">{{  $totalWhats }}</p>
                </div>
            </div>
            </div>

        </div>


        <div class="col-12 d-flex mb-2">
            <h1 >Contatos de: <span style="color:var(--azul)">{{ $cliente->nomeCliente}}</span></h1>
        </div>

        <div class="col-12">
            <div class="row nav-box-clientes ">
                        
                <div class="col">
                    <span>ID Contato</span>
                </div>
                <div class="col">
                    <span>Tipo Contato</span>
                </div>
                <div class="col">
                    <span>Valor</span>
                </div>
                <div class="col">
                    <span>Observação</span>
                </div>
        
                <div class="col-6  ">
                    <div class="col-12 d-flex justify-content-between align-items-center" style="flex-direction: row">
                        <div class="  position-relative   col-9" >
                            <form action="{{ route('contatos.index',$cliente->id) }}" method="get" id="search-form" class="w-100 d-flex align-items-center">
                                <input type="text" class="input-pesquisar" name="search" value="{{ $search }}" id="search">
                                <button class="botao-pesquisa"   type="submit"><i class=" bi bi-search" ></i></button>
                            </form>
                            

                            </div>
                       
        
                    <a href="{{ route('contatos.create', $cliente->id) }}" class="botao-cadastrar-cliente">Cadastrar</a>
                </div>
        
                </div>
            </div>
                        <div class="box-conteudo-clientes row ">

                            @if ($contatos->isEmpty())
                            <div class="col-12 d-flex justify-content-center align-items-center m-4">
                                 <p style="font-size: 1.5rem; font-weight: 500">Não Há Contatos Cadastrados Para este Cliente!</p>
                                </div>
                            @else
                                
                           
            @foreach ($contatos as $con)
        <div class="d-flex col-12  m-3 ">
            <div class="col d-flex align-items-center">
                <span id="idCliente">{{ $con->id }}</span>
            </div>
            <div class="col d-flex align-items-center">
                <span>{{ $con->tipoContato }}</span>
            </div>
            <div class="col d-flex align-items-center">
                <span id="valorContato">{{ $con->valorContato }}</span>
            </div>
            <div class="col d-flex align-items-center">
                <span>{{ $con->observacaoContato }}</span>
            </div>
            <div class="col-6 d-flex">
                <div class="col-3 div-icone-cliente d-flex align-items-center justify-content-center">
                    <span><button onclick="abrirModalContato({{ $con->id }})"><i class="icones-box bi bi-info-circle"></i></button></span>
                </div>
                <div class="col-3 div-icone-cliente  ">
                        <form action="{{ route('contatos.edit', [$con->id, $cliente->id]) }}" class=" d-flex align-items-center justify-content-center pt-3 " method="get">
                    <span >
                        <button type="submit"><i class="icones-box bi bi-person-gear"></button></i>
                    </span>
                </form>
                </div>
                <div class="col-3 div-icone-cliente d-flex align-items-center justify-content-center">
                    <button onclick="abrirModalExclusaoCont({{  $cliente->id}}, {{ $con->id}} )"><i class=" icones-box bi bi-person-dash"></i></button>
                </div>
                
    
            </div>
        </div>


        @endforeach
         @endif
    </div>
    </div>
    </div>
</div>
    

    <div class="container-fluid   container-modal-contato" onclick="fecharModalContato(event)">

        <div class="box-modal-info " id="boxModalContato">
            <div class="col-12 header-modal-info">
                <h1 >Informações Contato</h1>
                <hr class="linha-modal" >
            </div>
            <div class="d-flex">
            <div class="informacoes-cliente col-12 align-items-start ps-5 justify-content-start" >
                <ul>
                    <li>ID: <span id="id-contato"></span></li>
                    <li>Valor Contato: <span id="valor-contato"></span></li>
                    <li>Data de Criação: <span id="data-criacao-contato" class="criacao-contato"></span></li>
                    <li>Data de Atualização: <span id="data-atualizacao-contato"></span></li>
                    <li>Tipo Contato: <span id="tipo-contato"></span></li>
    
                </ul>
            </div>
            
            
            
            
    
        </div>
        <div class="informacoes-cliente">
            <div class="col-9 d-flex justify-content-center">
    
                <div class="col-12 justify-content-start" >
                    
                    <span class="span-descricao m-2">Observação:</span>
                    <div class="col-12 div-descricao-contato" style="border: 2px solid var(--azul)">
                        <span id="descricao-contato"></span>
                    </div>
    
                </div>
                
        </div>
        </div>
    
        <div class="col-12 d-flex justify-content-center">
            <button class="botao-modal" id="botao-fechar-modal-contato">fechar</button>
        </div>
    
    </div>
</div>
    
    

<div class="container-fluid container-modal-exclusao ocultar-modal" onclick="fecharModalExclusaoContato(event)" id="containerModalExclusaoContato">

    <div class="box-modal-exclusao" id="boxModalExclusao">
        <div class="header-modal-exclusao">
            <h3>Você Realmente Deseja Excluir?</h3>
            <hr class="linha-modal m-1 ">
        </div>
        <div class="body-alerta-exclusao">

            <p  class="text-center" style="color: rgba(0, 0, 0, 0.466); font-size: 1.3rem;">Ao excluir você perde todos os dados permanentemente!</p>
            <div class="col-12 d-flex justify-content-between">
            <form action="" method="post" id="form-delete">
                @csrf
                @method('DELETE')
            <button style="background-color:var(--vermelho); border: none; color: var(--branco); ">Sim</button>
            </form>
            <button id="botaoModalExclusao" onclick="fecharModalExclusaoContato(event)">Não</button>
        </div>
        </div>
    </div>
</div>

@endsection


<div id="carregamento" class="fundo-carregamento">
    <div class="estilo-carregamento"></div>
  </div>

  





