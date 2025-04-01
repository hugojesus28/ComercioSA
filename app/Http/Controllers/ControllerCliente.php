<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;
use App\Models\Contato;

class ControllerCliente extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


   

    public function index()
    {
        $search = request('search');

        if($search){

            $clientes = Cliente::where('nomeCliente', 'like', "%$search%")->orWhere('cpfCliente', 'like', "%$search%")->get();
                

        }else{
            $clientes = Cliente::all();

        }
        $contContatos = Contato::count();
        $countClientes = Cliente::count();
        $ultimoClienteInserido = Cliente::orderBy('created_at', 'desc')->first()->nomeCliente;
        $ultimoClienteAtualizado = Cliente::orderBy('updated_at', 'desc')->first()->nomeCliente;

        return view('clientesViews.index', ['clientes' => $clientes,
                                            'search' => $search, 
                                            'countContatos'=> $contContatos, 
                                            'countClientes'=> $countClientes,
                                            'ultimoCriado' => $ultimoClienteInserido,
                                            'ultimoAtualizado' => $ultimoClienteAtualizado]);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientesViews.cadastroCliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
                                'nome' => 'required|string|max:255',
                                'cpf' => 'required|max:255|unique:tb_cliente,cpfCliente', 
                                'data' => 'before:today|date',
                                'logradouro' => 'required|max:150',
                                'numeroLogradouro' => 'required|max:10',
                                'cep' => 'required|max:10',
                                'bairro' => 'required|max:100',
                                'cidade' => 'required|max:100',
                                'uf' => 'required',
                                'complemento' => 'max:255'
                                ], 
                                [
                                    'nome.required' =>'Por favor insira o nome do cliente!',
                                    'cpf.required'=>'Por Favor insira o CPF do cliente',
                                    'cpf.unique'=> 'Já existe o CPF digitado em nossa Base de dados', 
                                    'data.before'=>'A data de nascimento deve ser Valida!', 
                                    'data.date'=>'insira uma data Válida!',
                                    'logradouro.required'=>'Insira a Rua do Cliente',
                                    'logradouro.max' => 'Máximo de Caracteres: 150',
                                    'numeroLogradouro.required' => 'Digite o Numero da residência do sliente',
                                    'numeroLogradouro.max' => 'Máximo de Caracteres: 10',
                                    'cep.required' => 'Digite o Cep do cliente',
                                    'cep.max' => 'Máximo de Caracteres: 9',
                                    'bairro.required' => 'Digite o bairro do cliente',
                                    'bairro.max' => 'Máximo de Caracteres: 100',
                                    'cidade.required' => 'Digite a Cidade do Cliente',
                                    'cidade.max' => 'Máximo de caracteres:100',
                                    'uf.required' => 'Insira o UF',
                                    'complemento.max' => 'Máximo de caracteres:255']);
        $cliente = new Cliente();

        $cliente->nomeCliente = $request->nome;
        $cliente->cpfCliente = $request->cpf;
        $cliente->dataNascimentoCliente = $request->data;
        $cliente->logradouroCliente = $request->logradouro;
        $cliente->numLogradouroCliente = $request->numeroLogradouro;
        $cliente->cepCliente = $request->cep;
        $cliente->ufCliente = $request->uf;
        $cliente->cidadeCliente = $request->cidade;
        $cliente->bairroCliente = $request->bairro;
        $cliente->complementoCliente = $request->complemento;

        $cliente->save();

        return redirect(route('clientes.index', ['msgCadastro'=> 'cadastroRealizado']));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);

        return response()->json($cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $cliente = Cliente::findOrFail($id);

       return view('clientesViews.alterarCliente' , ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $request->validate([
                                'nomeCliente' => 'required|string|max:255',
                                'cpfCliente' => 'required|max:255|unique:tb_cliente,cpfCliente,' . $id, 
                                'dataNascimentoCliente' => 'before:today|date',
                                'logradouroCliente' => 'required|max:150',
                                'numLogradouroCliente' => 'required|max:10',
                                'cepCliente' => 'required|max:10',
                                'bairroCliente' => 'required|max:100',
                                'cidadeCliente' => 'required|max:100',
                                'ufCliente' => 'required',
                                'complementoCliente' => 'max:255'
                                ], 
                                [
                                    'nomeCliente.required' =>'Por favor insira o nome do cliente!',
                                    'cpfCliente.required'=>'Por Favor insira o CPF do cliente',
                                    'cpfCliente.unique'=> 'Já existe o CPF digitado em nossa Base de dados', 
                                    'dataNascimentoCliente.before'=>'A data de nascimento deve ser Valida!', 
                                    'dataNascimentoCliente.date'=>'insira uma data Valida!',
                                    'logradouroCliente.required'=>'Insira a Rua do Cliente',
                                    'logradouroCliente.max' => 'Máximo de Caracteres: 150',
                                    'numLogradouroCliente.required' => 'Digite o Numero da residência do sliente',
                                    'numLogradouro.max' => 'Máximo de Caracteres: 10',
                                    'cepCliente.required' => 'Digite o Cep do cliente',
                                    'cep.max' => 'Máximo de Caracteres: 9',
                                    'bairroCliente.required' => 'Digite o bairro do cliente',
                                    'bairroCliente.max' => 'Máximo de Caracteres: 100',
                                    'cidadeCliente.required' => 'Digite a Cidade do Cliente',
                                    'cidadeCliente.max' => 'Máximo de caracteres:100',
                                    'uf.required' => 'Insira o UF',
                                    'complementoCliente.max' => 'Máximo de caracteres:255']);

            $cliente = Cliente::findOrFail($id);
            $cliente->update($request->all());

            return redirect(route('clientes.index'))->with('msg', 'cliente alterado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contato::where('idCliente', $id)->delete();
        Cliente::findOrFail($id)->delete();

        return redirect(route('clientes.index'))->with('msg', "Cliente Excluído com Sucesso");
    }
}
