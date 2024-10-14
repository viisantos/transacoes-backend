<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Transaction_model extends Model
{
    use HasFactory;


    //protected $keyType = 'string';

    protected $fillable = [
        'transaction_type',
        'transaction_description',
        'transaction_value',
        'transaction_date'
    ];

    protected $hidden = [
        'updated_at',
        'created_at',
    ];

    protected $table = 'tab_transactions';

    public static function getSummary(){
        $summary['total_inputs'] = [];
        $summary['total_outs']   = [];

        $summary['balance']      = [];

        $summary['total_inputs'] = Transaction_model::where('transaction_type','Entrada')->sum('transaction_value');
        $summary['total_outs']   = Transaction_model::where('transaction_type','Saída')->sum('transaction_value');

        $summary['balance'] = $summary['total_inputs'] - $summary['total_outs'];

        return $summary;
    }
}
