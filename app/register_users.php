<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Schema;
use Hash;

class register_users extends Model
{

   protected  $table ="register_users";


public static function formstore($data){

    $username=Input::get('name');
    $email=Input::get('email');
    $password=Hash::make(Input::get('password'));



    $users=new register_users();

    $users->name=$username;
    $users->email=$email;
    $users->password=$password;

    $users->save();
}

    public function down()
    {
        Schema::dropIfExists('register_users');
    }

}
