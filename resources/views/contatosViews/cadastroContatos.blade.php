@extends('master')



@section('conteudo')

<nav class="nav col-12 d-flex justify-content-between px-4 mb-5">
    <div class="col-2">
        <span style="font-size: 1.2rem; font-weight: 500; color: white">Comercio S.A</span>
    </div>
    <div class="col-8 text-center">
        <a href="{{ route('clientes.index') }}" style="text-decoration: none;"><span style="font-size: 1.7rem; font-weight: 500; color: white">Clientes |</span></a>
        <a href="{{ route('contatos.index' , $idCliente)}}" style="text-decoration: none;"><span style="font-size: 1.7rem; font-weight: 500; color: white"> Contatos</span></a></div>
    <div class="d-flex justify-content-end col-2">
        <span style="font-size: 1.2rem; font-weight: 500; color: white">Agenda de Clientes</span>
        

    </div>

</nav>

    <div class="container">
<div class=" box-cadastro row " style="height: auto;">
    <div class="d-flex align-items-center justify-content-center">
    <div class="col-11 mt-4   nav-box-cadastro">
    Cadastro
    </div>
</div>
    <div class="col-12 p-3">


            <form  action="{{ route('contatos.store', $idCliente ) }}" method="post" class="d-flex  form-group justify-content-center align-items-center col-12  " style="flex-direction: column">
                @csrf

                <div class="col-12 d-flex">
                <div class="col-6 d-flex align-items-center" style="flex-direction: column">
                <div class="grupo-input col-10 my-1">
                <label for="" class="" >Tipo Contato</label>
                <select name="tipoContato" id="" class="input-cadastro">
                    <option value="E-mail">E-mail</option>
                    <option value="Telefone">Telefone</option>
                    <option value="WhatsApp">WhatsApp</option>

                </select>
                @error('tipoContato')
                <div class="text-danger">{{ $message}}</div>
                @enderror
            </div>
        </div>

        <div class="col-6  d-flex align-items-center" style="flex-direction: column">
            <div class="grupo-input col-10 my-1">
            <label for="" class="">Valor Contato</label>
            <input type="text" class="input-cadastro " name="valorContato" id="valorContato" value="{{ old('valorContato')}}">
            @error('valorContato')
            <div class="text-danger">{{ $message}}</div>
            @enderror
            </div>

        </div>
        
    </div>

    <div class="col-11  d-flex align-items-center" style="flex-direction: column">
        <div class="grupo-input col-12 my-2 mb-5 h-50" >
        <label for="" class="">Observação</label>
        <textarea  class="input-cadastro " cols="50" name="observacaoContato" maxlength="255" style="height: 100px">{{ old('observacaoContato')}}</textarea>
        @error('descricaoContato')
        <div class="text-danger">{{ $message}}</div>
        @enderror
        </div>
    </div>
            <div class="grupo-input col-11 my-1 ">
                <input type="submit" class="botao-cadastro" value="Cadastrar Contato">
            </div>
            
            
            </form>

        
    </div>
</div>
</div>
@endsection