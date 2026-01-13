<?php

class person
{
    public $name;
    public $age;

    public function breate()
    {
        echo $this->name . 'is breathing';
    }
}
    $person = new person();

    $person->name = 'Jim';
    $person->age = 20;

    echo $person->breate();


}

require("views/index.view.php");
