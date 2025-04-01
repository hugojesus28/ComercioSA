<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'tb_cliente';

    protected $casts = [
        'dataNascimentoCliente' => 'date:d/m/Y',
    ];

    protected $fillable = ['id', 'nomeCliente', 'cpfCliente', 
                        'dataNascimentoCliente', 'logradouroCliente', 
                        'numLogradouroCliente', 'cepCliente', 
                        'ufCliente', 'cidadeCliente', 
                        'bairroCliente', 'enderecoCliente', 
                        'complementoCliente', 'created_at', 'updated_at'];

    public $timestamps = true;

    public function contatos(){
        return $this->hasmany('App\Models\Contato');
    }
}

