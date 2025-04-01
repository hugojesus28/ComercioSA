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
        Alterando Cliente: {{ $cliente->nomeCliente}} 
        </div>
    </div>
    <div class="col-12 p-3">


            <form method="POST" action="{{route('clientes.update', $cliente->id)  }}" id="form-alterar"   class="form-control d-flex justify-content-center align-items-center col-12  border-0" style="flex-direction: column">

                @csrf
                @method('PUT')
                
                <div class="col-12 d-flex">
                <div class="col-6 d-flex align-items-center" style="flex-direction: column">
                <div class="grupo-input col-10 my-1">
                <label for="" class="" >Nome do Cliente</label>
                <input type="text" class="input-cadastro " name="nomeCliente" value="{{  old('nomeCliente', $cliente->nomeCliente)}}">
                @error('nomeCliente')

                <div class="text-danger">{{ $message}}</div>
                @enderror
            </div>

            <div class="grupo-input col-10 my-1 ">
                <label for="" class="">CPF do Cliente</label>
                <input type="text" class="input-cadastro " name="cpfCliente" id="cpfCliente" data-mask="000.000.000-00" value="{{old( 'cpfCliente', $cliente->cpfCliente)}}">
                @error('cpfCliente')

                <div class="text-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="grupo-input col-10 my-1 ">
                <label for="" class="">Data Nascimento  </label>
                <input type="date" class="input-cadastro " name="dataNascimentoCliente" value="{{old( 'dataNascimentoCliente', $cliente->dataNascimentoCliente->format('Y-m-d')) }}">
                @error('dataNascimentoCliente')

                <div class="text-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="grupo-input col-10 my-1 ">
                <label for="" class="">CEP</label>
                <input type="text" class="input-cadastro " name="cepCliente" id="cepCliente" data-mask="00000-000" oninput="verificarInput()" value="{{old( 'cepCliente', $cliente->cepCliente)}}">
                @error('cepCliente')
                <div class="text-danger">{{ $message}}</div>
                @enderror
            </div>
            <div class="grupo-input col-10 my-1 ">
                <label for="" class="">Rua</label>
                <input type="text" class="input-cadastro " name="logradouroCliente" id="logradouroApi" value="{{old( 'logradouroCliente', $cliente->logradouroCliente)}}">
                @error('logradouroCliente')
                <div class="text-danger">{{ $message}}</div>
                @enderror
            </div>

        </div>

        <div class="col-6  d-flex align-items-center" style="flex-direction: column">
            <div class="grupo-input col-10 my-1">
            <label for="" class="">Numero da Casa</label>
            <input type="text" class="input-cadastro " name="numLogradouroCliente" value="{{old('numLogradouroCliente', $cliente->numLogradouroCliente)}}">
            @error('numLogradouroCliente')
                <div class="text-danger">{{ $message}}</div>
                @enderror
            </div>
        <div class="grupo-input col-10 my-1 ">
            <label for="" class="">UF</label>
            <select name="ufCliente" id="ufApi" class="input-cadastro">
                <option value="" selected disabled>Selecione um estado</option> 
                @foreach(['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'] as $uf)
                    <option value="{{ $uf }}" {{ old('ufCliente', $cliente->ufCliente) == $uf ? 'selected' : '' }}>{{ $uf }}</option>
                @endforeach
            </select>
            @error('ufCliente')
                <div class="text-danger">{{ $message}}</div>
                @enderror
        </div>
        <div class="grupo-input col-10 my-1 ">
            <label for="" class="">Cidade</label>
            <input type="text" class="input-cadastro " name="cidadeCliente" id="cidadeApi" value="{{old('cidadeCliente', $cliente->cidadeCliente)}}">
            @error('cidadeCliente')
                <div class="text-danger">{{ $message}}</div>
                @enderror
        </div>
        <div class="grupo-input col-10 my-1 ">
            <label for="" class="">Bairro   </label>
            <input type="text" class="input-cadastro " name="bairroCliente" id="bairroApi" value="{{old('bairroCliente', $cliente->bairroCliente)}}">
            @error('bairroCliente')
                <div class="text-danger">{{ $message}}</div>
                @enderror
        </div>
        <div class="grupo-input col-10 my-1 ">
            <label for="" class="">Complemento</label>
            <input type="text" class="input-cadastro " name="complementoCliente" value="{{old('complementoCliente', $cliente->complementoCliente)}}">
            @error('complementoCliente')
                <div class="text-danger">{{ $message}}</div>
            @enderror
        </div>

    </div>
        
    </div>
            <div class="grupo-input col-11 my-1 ">
                <input type="submit" class="botao-cadastro" value="Alterar Cliente">
            </div>
            
            
            </form>

        
    </div>
</div>

<div id="carregamento" class="fundo-carregamento">
    <div class="estilo-carregamento"></div>
  </div>

</div>

@endsection