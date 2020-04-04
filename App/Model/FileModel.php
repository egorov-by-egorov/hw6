<?php


namespace App\Model;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Eloquent\Model;

class FileModel extends Model
{
    public $db;
    public $users;
    public $upload;
    public $information = [];
    public $id;

    public function userdata()
    {
        return $this->belongsTo('User', 'user_id', 'id');
    }

    public function selectUsers()
    {
        return $users = Capsule::table('users')
            ->orderBy("id", "asc")
            ->get();
    }

    public function selectUpload()
    {
        return $users = Capsule::table('uploads')
            ->where("user_id", "=", "$this->id")
            ->get();
    }

    public function ssortUsers()
    {
        return $users = Capsule::table('users')
            ->orderBy("birth", "asc")
            ->get();
    }

    public function msortUsers()
    {
        return $users = Capsule::table('users')
            ->orderBy("birth", "desc")
            ->get();
    }
}