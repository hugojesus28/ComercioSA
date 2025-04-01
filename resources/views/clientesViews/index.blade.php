        @extends('master')
        @section('conteudo')
            

        <nav class="nav col-12 d-flex justify-content-between px-4 mb-5">
            <div class="col-2">
                <span style="font-size: 1.2rem; font-weight: 500; color: white">Comercio S.A</span>
            </div>
            <div class="col-8 text-center">
            <a href="{{ route('clientes.index') }}" style="text-decoration: none;"><span style="font-size: 1.7rem; font-weight: 500; color: white">Clientes</span></a>
        </div>
            <div class="d-flex justify-content-end   col-2">
                <span style="font-size: 1.2rem; font-weight: 500; color: white">Agenda de Clientes</span>
                

            </div>

        </nav>

            <div class="container">
            <div class="container-fluid">

                <div class="col-12  d-flex justify-content-between mb-5">

                    <div class="col-6 d-flex justify-content-around  " >
                        <div class="col-5    p-2 div-cont" style="border-radius: 20px">
                        <div class="col-12 text-center">
                            <h3 style="opacity: 0.5">Total Clientes:</h3>
                        </div>

                        <div class="mt-3 text-center">
                            <p style="font-size: 2rem; color: var(--azul);">{{  $countClientes }}</p>
                        </div>
                    </div>
                    <div class="col-5 p-2 div-cont" style="border-radius: 20px">
                        <div class="col-12 text-center">
                            <h3 style="opacity: 0.5">Total Contatos:</h3>
                        </div>

                        <div class="mt-3 text-center">
                            <p style="font-size: 2rem; color: var(--azul);">{{  $countContatos }}</p>
                        </div>
                    </div>
                    </div>

                    <div class="col-6 d-flex justify-content-around  " >
                        <div class="col-5    p-2 div-cont" style="border-radius: 20px">
                        <div class="col-12 text-center">
                            <h3 style="opacity: 0.5">Ultimo Inserido:</h3>
                        </div>

                        <div class="mt-3 text-center">
                            <p style="font-size: 2rem; color: var(--azul);">{{  $ultimoCriado }}</p>
                        </div>
                    </div>
                    <div class="col-5 p-2 div-cont" style="border-radius: 20px">
                        <div class="col-12 text-center">
                            <h3 style="opacity: 0.5">Ultimo Atualizado:</h3>
                        </div>

                        <div class="mt-3 text-center">
                            <p style="font-size: 2rem; color: var(--azul);">{{  $ultimoAtualizado }}</p>
                        </div>
                    </div>
                    </div>

                </div>

                <div class="col-12 d-flex mb-2">
                    <h1 >Bem vindo Comercio <span style="color:var(--azul)">S.A</span>, abaixo estão seus clientes! </h1>
                </div>
                <div class="col-12">
                    <div class="row nav-box-clientes ">
                                
                        <div class="col">
                            <span>ID</span>
                        </div>
                        <div class="col">
                            <span>Nome</span>
                        </div>
                        <div class="col">
                            <span>CPF</span>
                        </div>
                        <div class="col">
                            <span>Data Nascimento</span>
                        </div>
                
                        <div class="col-6  ">
                            <div class="col-12 d-flex justify-content-between align-items-center" style="flex-direction: row">
                                <div class="  position-relative   col-9" >
                                <form action="{{ route('clientes.index') }}" method="get" id="search-form" class="w-100 d-flex align-items-center">
                                    <input type="text" class="input-pesquisar" name="search" value="{{ $search }}" id="search">
                                    <button class="botao-pesquisa"   type="submit"><i class=" bi bi-search" ></i></button>
                                </form>
                                

                                </div>
                            <a href="{{ route('clientes.create') }}" class="botao-cadastrar-cliente">Cadastrar</a>
                
                        </div>
                
                        </div>
                    </div>
                                <div class="box-conteudo-clientes row ">
                    @foreach ($clientes as $cli)
                <div class="d-flex col-12  m-3 ">
                    <div class="col d-flex align-items-center">
                        <span id="idCliente">{{ $cli->id }}</span>
                    </div>
                    <div class="col d-flex align-items-center">
                        <span>{{ $cli->nomeCliente }}</span>
                    </div>
                    <div class="col d-flex align-items-center">
                        <span id="cpfCliente">{{ $cli->cpfCliente }}</span>
                    </div>
                    <div class="col d-flex align-items-center">
                        <span>{{ $cli->dataNascimentoCliente->format('d/m/Y') }}</span>
                    </div>
            
                    <div class="col-6 d-flex">
                        <div class="col-3 div-icone-cliente d-flex align-items-center justify-content-center">
                           <button onclick="abrirModal({{ $cli -> id }})">
                            <i class="icones-box bi bi-info-circle"></i>
                        </button>
                        </div>
                        <div class="col-3 div-icone-cliente d-flex align-items-center justify-content-center">
                            <form action="{{ route('clientes.edit', $cli->id) }}" method="get">
                                <button type="submit"><i class="icones-box bi bi-person-gear"></button></i>
                            </form>
                        </div>
                        <div class="col-3 div-icone-cliente d-flex align-items-center justify-content-center">
                            <button onclick="abrirModalExclusaoCli({{ $cli->id }})"><i class=" icones-box bi bi-person-dash"></i></button>
                        </div>
                        <div class="col-3 div-icone-cliente d-flex align-items-center justify-content-center">
                             <a href="{{ route('contatos.index', $cli->id) }}"><i class="icones-box bi bi-people"></i> </a>
                        </div>
            
                    </div>
                </div>
                @endforeach
            </div>
            </div>
            </div>
        </div>
            
            
            <div id="carregamentoModalCli" class="fundo-carregamento">
                <div class="estilo-carregamento"></div>
              </div>
              @if(request()->has('msgCadastro'))
              <script src="{{ url('js/alertCadastro.js') }}"></script>
              <div class="alert-criacao" >
                <span>Cliente Cadastrado Com Sucesso!!</span>
                <span><i class="bi bi-check2-circle"></i></span>
            </div>
          @endif
          <div class="container-fluid container-modal-exclusao ocultar-modal" onclick="fecharModalExclusao(event)" id="containerModalExclusao">

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
                    <button id="botaoModalExclusao" onclick="fecharModalExclusao(event)">Não</button>
                </div>
                </div>
            </div>
        </div>
        @endsection
    