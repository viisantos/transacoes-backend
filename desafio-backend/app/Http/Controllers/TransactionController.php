<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Interfaces\TransactionRepositoryInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


class TransactionController extends Controller
{
    private TransactionRepositoryInterface $transactionRepositoryInterface;

    public function __construct(TransactionRepositoryInterface $transactionRepositoryInterface_){
        $this->transactionRepositoryInterface = $transactionRepositoryInterface_;
    }
    public function index(){
        try{
            $result = $this->transactionRepositoryInterface->index();
        }catch(\Exception $exception){
            Log::error('Erro ao recuperar a listagem de transações: '.$exception->getMessage(), [
                'exception' => $exception
            ]);
            return  response()->json(['message' => 'Não foi possível verificar a listagem']);
        }
        return response()->json($result);
    }

    public function show($transactionId){
       try{
            $transaction = $this->transactionRepositoryInterface->show($transactionId);
            return response()->json($transaction);
       }catch(\Exception $exception){
            Log::error('Erro ao verificar o registro de transação: '.$exception->getMessage(), [
                'exception' => $exception
            ]);
            return  response()->json(['message' => 'Não foi possível verificar o registro de transação']);
        }
    }

    public function store(StoreTransactionRequest $request){
        $data = [
            'transaction_type'        => $request->transaction_type,
            'transaction_description' => $request->transaction_description,
            'transaction_value'       => $request->transaction_value,
            'transaction_date'        => $request->transaction_date
        ];

        try{
            DB::beginTransaction();
            $this->transactionRepositoryInterface->store($data);
            DB::commit();
            return response()->json(['message' => 'Transação criada com sucesso']);
        }catch(\Exception $exception){
            Log::error('Erro ao cadastrar: '.$exception->getMessage(), [
                'exception' => $exception
            ]);
            //return response()->json(['error' => 'Erro ao registrar transação: '.$exception->getMessage()], 500);
        }
        catch (ValidationException $e) {
            // Captura e retorna os erros de validação
            return response()->json([
                'message' => 'Os dados fornecidos são inválidos.',
                'errors' => $e->getMessage(),
            ], 422);

        }

    }

    public function update(UpdateTransactionRequest $request, $transactionId){
        $data = [
            'transaction_type'        => $request->transaction_type,
            'transaction_description' => $request->transaction_description,
            'transaction_value'       => $request->transaction_value,
            'transaction_date'        => $request->transaction_date
        ];

        try{
            DB::beginTransaction();
            $this->transactionRepositoryInterface->update($data, $transactionId);
            DB::commit();
            return response()->json(['message' => 'Transação atualizada com sucesso!']);
        }catch(\Exception $exception){
            Log::error('Erro ao atualizar: '.$exception->getMessage(), [
                'exception' => $exception
            ]);
            //ApiResponse::rollback($exception);
            return response()->json(['error' => 'Erro ao atualizar transação: '.$exception->getMessage()], 500);
        }
        catch (ValidationException $e) {
            // Captura e retorna os erros de validação
            return response()->json([
                'message' => 'Os dados fornecidos são inválidos.',
                'errors' => $e->getMessage(),
            ], 422);

        }
    }

    public function destroy($transactionId){
        try{
            $this->transactionRepositoryInterface->delete($transactionId);
        }catch(\Exception $exception){
            Log::error('Erro ao deletar a transação: '.$exception->getMessage(), [
                'exception' => $exception
            ]);
            //ApiResponse::rollback($exception);
            return response()->json(['exception' => $exception, 'message' => 'Não foi possível deletar a transação']);
        }
        return response()->json(['message' => 'Transação deletada com sucesso!']);
    }

    public function getSummary(){
        try{
            $summary = $this->transactionRepositoryInterface->getSumamry();
            return response()->json($summary);
        }catch(\Exception $exception){
            Log::error('Erro ao verificar o resumo das transações: '.$exception->getMessage(), [
                'exception' => $exception
            ]);
            return response()->json(['exception' => $exception, 'message' => 'Não foi possível verificar o resumo das transações']);
        }
    }
}
