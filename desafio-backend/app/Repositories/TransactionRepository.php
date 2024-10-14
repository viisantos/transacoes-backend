<?php

namespace App\Repositories;
use App\Models\Transaction_model;
use App\Interfaces\TransactionRepositoryInterface;


class TransactionRepository implements TransactionRepositoryInterface
{
    public function index(){
        $result =  Transaction_model::orderBy('id','desc')->get();
        return $result;
    }

    public function show($transactionId){
       return Transaction_model::findOrFail($transactionId);
    }

    public function store(Array $data){
            $transaction = new Transaction_model();
            $transaction->transaction_type = $data["transaction_type"];
            $transaction->transaction_description = $data["transaction_description"];
            $transaction->transaction_value = $data["transaction_value"];
            $transaction->transaction_date  = $data["transaction_date"];
            $transaction->save();
    }

    public function update($updated_data,$transactionId){
        $transaction = Transaction_model::findOrFail($transactionId);
        $transaction->update($updated_data);
}

    public function delete($transactionId){
        $transaction = Transaction_model::findOrFail($transactionId);
        $transaction->delete();
    }

    public function getSumamry(){
        $summary = Transaction_model::getSummary();
        return $summary;
    }
}
