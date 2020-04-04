<?php


namespace App\Controller;

use Base\DB;
use Faker\Factory;

class Faker
{
    public $data = [];
    public $file;

    public function dataAction()
    {
        $db = new DB();
        $faker = Factory::create('ru_RU');

        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 5; $j++) {
                $this->data[$i][0] = $faker->firstName;
                $this->data[$i][1] = $faker->password;
                $this->data[$i][2] = $faker->email;
                $this->data[$i][3] = $faker->date();
                $this->data[$i][4] = $faker->text;
                $this->data[$i][5] = $faker->url;
            }
        }

        foreach ($this->data as $value) {
            $db->insert("INSERT INTO `users` (`name`, `password`,`email`, `birth`, `description`, `image`)
                 VALUES (?, ?, ?, ?, ?,?);",
                [$value[0], $value[1], $value[2], $value[3], $value[4],$value[5]]);
        }

        for ($i = 0; $i < 30; $i++) {
            for ($j = 0; $j < 1; $j++) {
                $this->file[$i][0] = rand(1, 10);
                $this->file[$i][1] = "image/" . $faker->word . "/" . $faker->word . "/" . $faker->word . ".jpg";
            }
        }
        foreach ($this->file as $value) {
            $db->insert("INSERT INTO `uploads` (`user_id`, `file`)
                 VALUES (?, ?);",
                [$value[0], $value[1]]);
        }
    }
}