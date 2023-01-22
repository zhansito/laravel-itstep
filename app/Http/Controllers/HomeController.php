<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class HomeController extends Controller
{
    public function get_user(int $id = 0){
        
        // input
        // logic
        
        
        // if($id > 0){
        //     return "<h1>User: ".$id."</h1>";
        // } else {
        //     return "<h1>User: unknown</h1>";
        // }

        $users = [
            'Altynbek',
            'Almas',
            'Aliya'
        ];
                
        // var_dump(compact('str'));
        // exit;
                
        return view('user', compact('id', 'users'));
    }

    public function get_all_users(){
        //$users = User::with('items')->get();
        $users = User::all();
        return view('pages.user.list', compact('users'));
    }

    public function user_store(){
        $user = new User;
        $user->name = 'Alt';
        //$user->last_name = 'Zh';
        $user->email = 'al@al.com';
        $user->password = 'password';
        $user->save();
        
        return redirect()->to('/users/all');
    }

    public function plus(int $a, int $b)
    {
        $c = $a + $b;
        echo $c;
    }

    public function multiply(int $a, int $b)
    {
        $c = $a * $b;
        echo $c;
    }

    public function multiplyDefault(int $a)
    {
        $c = $a * 10;
        echo $c;
    }
}
