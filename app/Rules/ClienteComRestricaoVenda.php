<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ClienteComRestricaoVenda implements Rule
{
    // protected $table;
    // protected $columns;

    // public function __construct($table, $columns)
    // {
    //     $this->table = $table;
    //     $this->columns = $columns;
    // }

    public function __construct($table, $columns) {}

    public function passes($attribute, $value)
    {
        $cliente_id = $value;

        // Fazer a verificação se o cliente tem restrição
        //dd($attribute, $value);
        // $count = DB::table($this->table)
        //     ->where($this->columns[0], $value[0])
        //     ->where($this->columns[1], $value[1])
        //     ->count();

        return true;
    }

    public function message()
    {
        return 'O cliente tem restrição. A venda não poderá ser registrada.';
    }
}
