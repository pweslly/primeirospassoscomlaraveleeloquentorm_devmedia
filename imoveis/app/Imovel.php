<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imovel extends Model
{
    //
    protected $fillable = [
        "descricao", "logradouroEndereco", "bairroEndereco", "numeroEndereco", "cepEndereco", "cidadeEndereco"
    ];

    protected $table = "imoveis";
}
