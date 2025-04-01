<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $table = 'tb_contato';

    protected $fillable = ['id', 'idCliente', 'tipoContato', 
                            'valorContato', 'observacaoContato', 
                            'created_at', 'updated_at'];
    public $timestamps = true; 

    public function cliente(){
       return $this->belongsTo('App\Models\Cliente');
    }
}

