<?php

namespace App\Http\Controllers;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    private UserRepositoryInterface $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface_){
        $this->userRepositoryInterface = $userRepositoryInterface_;
    }
    public function index(){
        try{
            $result = $this->userRepositoryInterface->index();
            return response()->json($result);
        }catch(\Exception $exception){
            Log::error('Erro ao recuperar a listagem de usuários: '.$exception->getMessage(), [
                'exception' => $exception
            ]);
        }
    }

}
