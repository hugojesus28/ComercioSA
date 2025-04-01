@extends('master')



@section('conteudo')

<nav class="nav col-12 d-flex justify-content-between px-4 mb-5">
    <div class="col-2">
        <span style="font-size: 1.2rem; font-weight: 500; color: white">Comercio S.A</span>
    </div>
    <div class="col-8 text-center">
    <a href="{{ route('clientes.index') }}" style="text-decoration: none;"><span style="font-size: 1.7rem; font-weight: 500; color: white">Voltar Para Clientes</span></a>
</div>
    <div class="d-flex justify-content-end col-2">
        <span style="font-size: 1.2rem; font-weight: 500; color: white">Agenda de Clientes</span>
        

    </div>

</nav>


    <div class="container">
<div class=" box-cadastro row ">
    <div class="d-flex align-items-center justify-content-center">
    <div class="col-11 mt-4   nav-box-cadastro">
    Cadastro
    </div>
</div>
    <div class="col-12 p-3">


            <form  action="{{ route('clientes.store') }}" method="post" class="form-control d-flex justify-content-center align-items-center col-12 border-0" style="flex-direction: column; " >

                @csrf

                <div class="col-12 d-flex">
                <div class="col-6 d-flex align-items-center" style="flex-direction: column">
                <div class="grupo-input col-10 my-1">
                <label for="" class="" >Nome do Cliente</label>
                <input type="text" class="input-cadastro " name="nome" value="{{ old('nome')}}">
                @error('nome')

                <div class="text-danger">{{ $message}}</div>
                @enderror
            </div>

            <div class="grupo-input col-10 my-1 ">
                <label for="" class="">CPF do Cliente</label>
                <input type="text" class="input-cadastro" name="cpf" data-mask="000.000.000-00" maxlength="14" id="cpfCliente" value="{{ old('cpf')}}" >
                @error('cpf')
                <div class="text-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="grupo-input col-10 my-1 ">
                <label for="" class="">Data Nascimento  </label>
                <input type="date" class="input-cadastro " name="data" value="{{ old('data')}}">
                @error('data')
                <div class="text-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="grupo-input col-10 my-1 ">
                <label for="" class="">CEP</label>
                <input type="text" class="input-cadastro " name="cep" data-mask="00000-000" oninput="verificarInput()" maxlength="9" id="cepCliente" value="{{ old('cep')}}">
                @error('cep')
                <div class="text-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="grupo-input col-10 my-1 ">
                <label for="" class="">Rua</label>
                <input type="text" class="input-cadastro " name="logradouro" id="logradouroApi" value="{{ old('logradouro')}}">
                @error('logradouro')
                <div class="text-danger">{{ $message}}</div>
                @enderror
            </div>

        </div>

        <div class="col-6  d-flex align-items-center" style="flex-direction: column">
            <div class="grupo-input col-10 my-1">
            <label for="" class="">Numero da Casa</label>
            <input type="text" class="input-cadastro " name="numeroLogradouro" id="numLogradouro" value="{{ old('numeroLogradouro')}}">
            @error('numeroLogradouro')
                <div class="text-danger">{{ $message}}</div>
                @enderror
            </div>
        <div class="grupo-input col-10 my-1 ">
            <label for="" class="">UF</label>
            <select name="uf" id="ufApi" class="input-cadastro" value="{{ old('uf')}}">
                <option value="" selected disabled>Selecione um estado</option>
                <option value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AP">AP</option>
                <option value="AM">AM</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MT">MT</option>
                <option value="MS">MS</option>
                <option value="MG">MG</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="PR">PR</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="RJ">RJ</option>
                <option value="RN">RN</option>
                <option value="RS">RS</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="SC">SC</option>
                <option value="SP">SP</option>
                <option value="SE">SE</option>
                <option value="TO">TO</option>
            </select>
            @error('uf')
                <div class="text-danger">{{ $message}}</div>
                @enderror
        </div>
        <div class="grupo-input col-10 my-1 ">
            <label for="" class="">Cidade</label>
            <input type="text" class="input-cadastro " name="cidade" id="cidadeApi" value="{{ old('cidade')}}">
            @error('cidade')
                <div class="text-danger">{{ $message}}</div>
                @enderror
        </div>
        <div class="grupo-input col-10 my-1 ">
            <label for="" class="">Bairro   </label>
            <input type="text" class="input-cadastro " name="bairro" id="bairroApi" value="{{ old('bairro')}}">
            @error('bairro')
                <div class="text-danger">{{ $message}}</div>
                @enderror
        </div>
        <div class="grupo-input col-10 my-1 ">
            <label for="" class="">Complemento</label>
            <input type="text" class="input-cadastro " name="complemento" id="complemento" value="{{ old('complemento')}}">
            @error('complemento')
                <div class="text-danger">{{ $message}}</div>
                @enderror
        </div>

    </div>
        
    </div>
            <div class="grupo-input col-11 my-1 ">
                <input type="submit" class="botao-cadastro" value="Cadastrar Cliente">
            </div>
            
            
            </form>

        
    </div>
</div>

<div id="carregamento" class="fundo-carregamento">
    <div class="estilo-carregamento"></div>
  </div>
</div>
  
@endsection