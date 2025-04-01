<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comercio SA</title>
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.6/dist/inputmask.min.js"></script>

</head>
<body>

    
        @yield('conteudo')

    <div class="container-fluid ocultar-modal container-modal" onclick="fecharModal(event)">

        <div class="box-modal-info " id="boxModal">
            <div class="col-12 header-modal-info">
                <h1 >Informações Cliente</h1>
                <hr class="linha-modal" >
            </div>
            <div class="d-flex">
            <div class="informacoes-cliente justify-content-start" >
                <ul>
                    <li>ID: <span id="id-cliente"></span></li>
                    <li>Nome Cliente: <span id="nome-cliente"></span></li>
                    <li>CPF Cliente: <span id="cpf" class="cpf-cliente"></span></li>
                    <li>Data Nascimento: <span id="data-cliente"></span></li>
                    <li>Rua: <span id="rua-cliente"></span></li>
                </ul>
            </div>
            <div class="informacoes-cliente justify-content-start" >
                <ul>
                    <li>Cep: <span id="cep" class="cep-cliente"></span></li>
                    <li>UF: <span id="uf-cliente"></span></li>
                    <li>Cidade: <span id="cidade-cliente"></span></li>
                    <li>Bairro: <span id="bairro-cliente"></span></li>
                    <li>Complemento: <span id="complemento-cliente"></span></li>
                </ul>
            </div>
            
            
            

        </div>
        <div class="informacoes-cliente">
            <div class="col-12 d-flex justify-content-center">

                <div class="informacoes-cliente justify-content-start" >
                    <ul>
                        <li>Numero Residencia: <span id="numero-cliente"></span></li>

                        <li>Criado Em: <span id="criacao-cliente"></span></li>

                <li>Atualizado Em: <span id="atualizacao-cliente"></span></li>
                    </ul>
                </div>
                
        </div>
        </div>

        <div class="col-12 d-flex justify-content-center">
            <button class="botao-modal" id="botao-fechar-modal">fechar</button>
        </div>

    </div>
    

    
    
    

    

    <script src="{{url('js/mascaras.js')}}"></script>
    <script src="{{url('js/modal.js')}}"></script>
    <script src="{{url('js/modalExclusao.js')}}"></script>
    <script src="{{url('js/modalContato.js')}}"></script>
    <script src="{{url('js/consultarApiCep.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>