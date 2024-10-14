<?php

namespace App\Repositories;
use App\Models\User;
use App\Interfaces\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    public function index(){
        $result =  User::orderBy('id','desc')->get();
        return $result;
    }
}
