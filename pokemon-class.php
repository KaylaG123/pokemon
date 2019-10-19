<?php

class Pokemon
{
    public $name;
    public $health; // total $health
    protected $hp; //current $health
    public $attacks;

    function __construct($pokemon) {
        $this->name = $pokemon['name'];
        $this->health = $pokemon['health'];
        $this->attacks = $pokemon['attacks'];

        $this->hp = $this->health; //set the hitpoints equal to total health to start
    }

    public function attack($target, $attack) {
        $target->takeDamage($attack['damage']);

    }

    public function takeDamage($amount) {
        $newHP = $this->hp - $amount;

        // check to see if the Pokemon dies
        if($newHP <= 0) {
            //you ded buddy
            echo $this->name . ' has been defeated! ';
            echo '<a href="index.php?reset=1" class="btn btn-primary"> New Game</a>';
            die;
        }

        $this->hp = $newHP;
    }

    public function getHP() {
        return $this->hp;
    }

    public function getHealthPercentage() {
        return  ($this->hp / $this -> health) * 100;
    }
}

 ?>
