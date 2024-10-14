<?php

namespace App\Interfaces;

interface TransactionRepositoryInterface
{
    public function index();
    public function show($transactionId);
    public function store(array $transactionData);
    public function update(array $transactionData, $transactionId);
    public function delete($transactionId);
    public function getSumamry();
}
