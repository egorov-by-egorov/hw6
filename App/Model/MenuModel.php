<?php


namespace App\Model;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Support\Facades\Config;

class MenuModel
{
    public $errors;
    public $successful;
    public $db;
    public $image;
    public $login;
    public $avatar;
    public $birth;
    public $date;
    public $description;
    public $dateDescription;
    public $id;
    public $file;

    public function updateImage()
    {
        $users = Capsule::table('users')
            ->where('name', "=", $this->login)
            ->update(['image' => $this->image]);
    }

    public function selectImage()
    {
        return $users = Capsule::table('users')
            ->select('image')
            ->where("name", "=", $this->login)
            ->get();
    }

    public function updateDescription()
    {
        $users = Capsule::table('users')
            ->where('name', "=", $this->login)
            ->update(
                ['birth' => $this->birth, 'description' => $this->description]
            );
    }

    public function selectDescription()
    {
        return $users = Capsule::table('users')
            ->select('birth', 'description')
            ->where("name", "=", $this->login)
            ->get();
    }

    public function uploadImage()
    {
        $users = Capsule::table('uploads')
            ->insert(
                ['user_id' => $this->id, 'file' => $this->file]
            );
    }

    public function selectId()
    {
        return $users = Capsule::table('users')
            ->select('id')
            ->where("name", "=", $this->login)
            ->get();
    }

    public function selectLink()
    {
        return $users = Capsule::table('uploads')
            ->select('file')
            ->where("user_id", "=", $this->id)
            ->get();
    }
}