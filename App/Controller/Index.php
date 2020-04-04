<?php

namespace App\Controller;

use App\Model\UserModel;

class Index
{
    public $view;
    public $data; //Чтобы передать данные в шаблон,записывать обьект UserModel в эту переменную
    public $login;
    public $name;
    public $email;
    public $password;

    public function indexAction()
    {
        echo "<h1>Приветствую</h1>";
    }

    public function registrationAction()
    {
        $this->data = new UserModel();
        $name = htmlspecialchars(trim($_POST['name']));
        $pass = htmlspecialchars(trim($_POST['password']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = sha1($pass);
        if (isset($_POST['submit'])) {
            if (strlen($pass) < 4) {
                $this->data->errors = "Пароль не должен быть меньше 4ех символов";
            }
            if (strlen($name) < 4) {
                $this->data->errors = "Имя не должно быть меньше 4ех символов";
            }
            if (empty($this->data->errors)) {
                $this->data->name = $name;
                $this->data->email = $email;
                $this->name = $this->data->selectUserForRegistration();
                $this->email = $this->data->selectEmailForRegistration();
                if (!empty($this->name)) {
                    $this->data->errors = "Пользователь с именем " . $this->data->name . " уже существует";
                }elseif (!empty($this->email)){
                    $this->data->errors = "Пользователь с email " . $this->data->email . " уже существует";
                }else {
                    $this->data->password = $password;
                    $this->data->saveData();
                    $this->data->successful = "Регистрация прошла успешно <a href='login'>Войти</a>";
                }
            }
        }
    }

    public function loginAction()
    {
        $this->data = new UserModel();
        $this->data->loginName = htmlspecialchars(trim($_POST['loginName']));
        $this->data->loginPassword = htmlspecialchars(trim($_POST['loginPassword']));
        $this->data->name = $this->data->selectUser();
        if (isset($_POST['loginSubmit'])) {
            if ($this->data->loginPassword == "") {
                $this->data->errors = "Введите пароль";
            }
            if ($this->data->loginName == "") {
                $this->data->errors = "Введите логин";
            } elseif (empty($this->data->name)) {
                $this->data->errors = "Пользователь с именем " . $this->data->loginName . " не найден";
            }
            if (empty($this->data->errors)) {
                $this->password = $this->data->selectPasswordForRegistration();
                if (sha1($this->data->loginPassword) == $this->password["0"]->password) {
                    $this->data->successful = "Успешно зашел";
                    session_start();
                    $_SESSION['logged_user'] = $this->data->name[0]->name;
                    header("Location: ../user/user");
                } else {
                    $this->data->errors = "Пароли не совпадают";
                }
            }
        }
    }
}