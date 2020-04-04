<?php

namespace App\Controller;

use App\Model\MenuModel;
use DateTime;


class User
{
    public $successful;
    public $data; //Чтобы передать данные в шаблон,записывать обьект UserModel в эту переменную
    public $file;
    public $id;
    public $link;

    public function userAction()
    {
        $this->data = new MenuModel();
        $this->data->login = $_SESSION['logged_user'];
        $this->data->image = $this->data->selectImage();
        $this->data->avatar = str_replace('/domains/vp_02020202/www', "", $this->data->image[0]->image);
        $this->data->dateDescription = $this->data->selectDescription();
        $this->data->birth = $this->data->dateDescription[0]->birth;
        $this->data->description = $this->data->dateDescription[0]->description;
        if (isset($_POST['exit'])) {
            unset($_SESSION['logged_user']);
            header("Location:/index/index");
        }
    }

    public function editAction()
    {
        if (isset($_POST['editSubmit'])) {
            $this->data = new MenuModel();
            $this->data->birth = htmlspecialchars(trim($_POST['birth']));
            $this->data->description = htmlspecialchars(trim($_POST['description']));
            if (!empty($this->data->birth) && !empty($this->data->description)) {
                $this->data->date = DateTime::createFromFormat('Y-m-d', $this->data->birth);
                $this->data->birth = $this->data->date->format('Y-m-d');
                $this->data->login = $_SESSION['logged_user'];
                $this->data->updateDescription();
                $this->data->successful = "Данные успешно сохранены";
            } else {
                $this->data->errors = "Заполните дату и описание";
            }
        }
    }


    public function imageAction()
    {
        if (isset($_POST['upload'])) {
            $this->data = new MenuModel();
            $uploaddir = 'image';
            $uploadfile = $uploaddir . "/" . $_SESSION['logged_user'] . "/" . basename($_FILES['image']['name']);
            $getMime = explode('.', $_FILES['image']['name']);
            $mime = strtolower(end($getMime));
            $types = ['jpg', 'png', 'gif', 'bmp', 'jpeg'];
            if (!in_array($mime, $types))
                $this->data->errors = 'Недопустимый тип файла.';
            if ($_FILES['image']['name'] == '') {
                $this->data->errors = "Вы не выбрали файл";
            }
            if (empty($this->data->errors)) {
                @mkdir("image/" . $_SESSION['logged_user'], 0700);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    $this->data->successful = "Файл корректен и был успешно загружен.";
                    $this->data->image = $uploadfile;
                    $this->data->login = $_SESSION['logged_user'];
                    $this->data->updateImage();
                } else {
                    $this->data->errors = "Файл не загружен!";
                }
            }

        }
    }

    public function uploadsAction()
    {
        if (isset($_POST['submitUpload'])) {
            $this->data = new MenuModel();

            $uploaddir = 'image';
            $uploadfile = $uploaddir . "/" . $_SESSION['logged_user'] . "/upload/" . basename($_FILES['image']['name']);
            $this->data->login = $_SESSION['logged_user'];
            $this->id = $this->data->selectId();
            $this->data->id = $this->id[0]->id;
            $this->link = $this->data->selectLink();
            $getMime = explode('.', $_FILES['image']['name']);
            $mime = strtolower(end($getMime));
            $types = ['jpg', 'png', 'gif', 'bmp', 'jpeg'];
            if (!in_array($mime, $types))
                $this->data->errors = 'Недопустимый тип файла.';
            if ($_FILES['image']['name'] == '') {
                $this->data->errors = "Вы не выбрали файл";
            }
            foreach ($this->link as $value) {
                foreach ($value as $item) {
                    if ($item == $uploadfile) {
                        $this->data->errors = "Такой файл существует";
                    }
                }
            }
            if (empty($this->data->errors)) {
                @mkdir("image/" . $_SESSION['logged_user'] . "/upload", 0700);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    $this->data->successful = "Файл корректен и был успешно загружен.";
                    $this->data->file = $uploadfile;
                    $this->data->uploadImage();
                } else {
                    $this->data->errors = "Файл не загружен!";
                }
            }

        }
    }
}