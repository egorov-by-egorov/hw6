<?php


namespace App\Controller;

use App\Model\FileModel;
use App\Model\User;


class File
{
    public $data;
    public $name;
    public $id;

    public function fileAction()
    {

        $this->data = new FileModel();
        $this->data->users = $this->data->selectUsers();
        if (isset($_POST['ssort'])) {
            $this->data->users = $this->data->ssortUsers();
        } elseif (isset($_POST['msort'])) {
            $this->data->users = $this->data->msortUsers();
        } else {
            $this->data->users = $this->data->selectUsers();
        }
        foreach ($this->data->users as $value) {
            $user = [];
            $age = $value->birth;
            $age = date("Y") - mb_strimwidth($age, 0, 4);
            if ($age >= 18) {
                $adult = "Совершеннолетний";
            } else {
                $adult = "Несовершеннолетний";
            }
            array_push($user, $value->id);
            array_push($user, $value->name);
            array_push($user, $age);
            array_push($user, $adult);
            array_push($this->data->information, $user);
        }
        $this->data->id = $_POST['idFile'];
        if (isset($_POST['submit'])) {
            $this->data->id = $_POST['idFile'];
            $this->data->upload = $this->data->selectUpload();
        }
    }
}