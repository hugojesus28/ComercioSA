<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use App\Models\Cliente;


class ControllerContato extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idCliente)
    {
        $search = request('search');

        if($search){
            $contatos = Contato::where('tipoContato', 'like', "%$search%")->orWhere('valorContato', 'like', "%$search%")->where('idCliente', $idCliente)->get();

        }else{
        $contatos = Contato::where('idCliente', $idCliente)->get();
        }

        $cliente = Cliente::findOrFail($idCliente);
        $contatosCount = Contato::where('idCliente', $idCliente)->count();
        $countEmails = Contato::where('tipoContato', 'E-mail')->where('idCliente', $idCliente)->count();
        $countTelefones = Contato::where('tipoContato', 'Telefone')->where('idCliente', $idCliente)->count();
        $countWhats = Contato::where('tipoContato', 'WhatsApp')->where('idCliente', $idCliente)->count();
        return view('contatosViews.index', ['contatos' => $contatos ,
                                            'cliente' => $cliente, 
                                            'search' => $search, 
                                            'totalContatos' => $contatosCount,
                                            'totalEmails' => $countEmails,
                                            'totalTelefones' => $countTelefones,
                                            'totalWhats' => $countWhats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idCliente)
    {
        return view('contatosViews.cadastroContatos', ['idCliente' => $idCliente]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'tipoContato' => 'required|max:50',
            'valorContato' => 'required|max:100',
            'descricaoContato' => 'nullable|max:255'


        ],['tipoContato.required' => 'Digite o Tipo do Contato!', 
        'tipoContato.max' => 'Você Inseriu muitos Caracteres, o Máximo é 50!', 
        'valorContato.required' => 'Digite o valor do Contato!', 
        'valorContato.max' => 'Você Inseriu muitos Caracteres, o Máximo é 100!',
        'descricaoContato.max' => 'Você Inseriu muitos Caracteres, o Máximo é 255!']);

        Contato::create([
            'idCliente' => $id,
            'valorContato' => $request->valorContato,
            'tipoContato' => $request->tipoContato,
            'observacaoContato' =>$request->observacaoContato
        ]);

        return redirect(route('contatos.index', ['idCliente'=> $id]));

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contato = Contato::findOrFail($id);

        return response()->json($contato);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $idCliente)
    {
        $contato = Contato::findOrFail($id);

            return view('contatosViews.alterarContatos' , ['contato' => $contato, 'idCliente' => $idCliente]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idCliente, $id)
    {
        $contato = Contato::findOrFail($id);
        
        $request->validate([
            'tipoContato' => 'required|max:50',
            'valorContato' => 'required|max:100',
            'descricaoContato' => 'nullable|max:255'


        ],['tipoContato.required' => 'Digite o Tipo do Contato!', 'tipoContato.max' => 'Você Inseriu muitos Caracteres, o Máximo é 50!', 
        'valorContato.required' => 'Digite o valor do Contato!', 'valorContato.max' => 'Você Inseriu muitos Caracteres, o Máximo é 100!',
        'descricaoContato.max' => 'Você Inseriu muitos Caracteres, o Máximo é 255!']);

        $contato->update([
            'tipoContato' => request('tipoContato'),
            'valorContato' => request('valorContato'),
            'observacaoContato' => request('observacaoContato'),
        ]);
    
        return redirect(route('contatos.index', $idCliente));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idCliente, $id)
    {
        Contato::findOrFail($id)->delete();
        

        return redirect(route('contatos.index', $idCliente))->with('msg', 'contato excluido com sucesso');
    }
}
