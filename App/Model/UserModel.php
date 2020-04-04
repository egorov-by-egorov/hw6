<?php

namespace App\Model;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{

    public $db;
    public $name;
    public $password;
    public $loginName;
    public $loginPassword;
    public $errors = [];
    public $successful;
    public $email;

    public function uploads()
    {
        return $this->hasMany('uploads', 'user_id', 'id');
    }


    public function saveData()
    {
        $users = Capsule::table('users')
            ->insert(
                ['name' => $this->name, 'password' => $this->password,'email'=>$this->email]
            );
    }

    public function selectUser()
    {
        return $users = Capsule::table('users')
            ->select('name')
            ->where("name", "=", $this->loginName)
            ->get();
    }

    public function selectUserForRegistration()
    {
        return $users = Capsule::table('users')
            ->where("name", "=", $this->name)
            ->get();
    }
    public function selectEmailForRegistration()
    {
        return $users = Capsule::table('users')
            ->where("email", "=", $this->email)
            ->get();
    }

    public function selectPasswordForRegistration()
    {
        return $users = Capsule::table('users')
            ->select('password')
            ->where("name", "=", $this->loginName)
            ->get();
    }
}