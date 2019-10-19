<?php

include('pokemon-class.php');
include('pokedex.php');

//init session
session_start();

function pre($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}

function newGame() {
    global $pokedex; // make $pokedex available inside of this function

    session_unset(); // wipe out existing session
    session_destroy();

    session_start(); // start a new session

// assign pokemon objects for the player and the cpu to the $_SESSION
$_SESSION['player'] = new Pokemon($pokedex[mt_rand(0, count($pokedex)-1)]);
$_SESSION['cpu'] = new Pokemon($pokedex[mt_rand(0, count($pokedex)-1)]);

}

// reset game?
if(isset($_GET['reset']) || !isset($_SESSION['player'])) {
    newGame();
}

// create easy references to player and cpu session
$player = &$_SESSION['player'];
$cpu = &$_SESSION['cpu'];
$battlelog = [];

// check if the attack url parameter is set
if(isset($_GET['attack'])) {

    // do attack
    // player attacks cpu
    $id = $_GET['attack'];
    $player->attack($cpu, $player->attacks[$id]);
    $battlelog[] = $player->name . ' attacks using ' . $player->attacks[$id]['name'] . ' for ' . $player->attacks[$id]['damage'] . ' damage ';

    // cpu attacks the player
    $id = mt_rand(0, count($cpu->attacks)-1); // genrates the attacks randomly // the -1 is entered because the array is set up that squirtle has 3 attacks. So every three attacks, it popped up an error.
    $cpu->attack($player, $cpu->attacks[ $id ]);
    $battlelog[] = $player->name . ' attacks using ' . $cpu->attacks[$id]['name'] . ' for ' . $cpu->attacks[$id]['damage'] . ' damage ';

    pre($battlelog);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Pokemon Battle</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
        <link rel="stylesheet" href="css/styles.css"/>

    </head>
    <body>
        <div class="container">

            <div class="row">
                <div class="col">
                    <div class="health-bar">
                            <div class="current-health" style="width: <?php echo $player->getHealthPercentage(); ?>%">
                        <?php echo $player->getHP() . '/' . $player->health; ?>
                        </div>
                    </div>
                    <div  class="animated tada">
                        <h5><?php echo $player->name; ?></h5>
                        <img src="<?php echo 'images/' . strtolower($player->name) . '.jpeg' ?>" alt="<?php echo $player->name; ?>" class="pokemon-image" />
                    </div>
                    <div>
                        <?php foreach($player->attacks as $key=>$attack) {
                            echo '<a href="index.php?attack=' . $key . '" class="btn btn-dark">' . $attack['name'] . '</a>';
                        } ?>
                    </div>
                </div>
                <div class="col">
                        <a href= "index.php?reset=1" class="btn btn-danger">RESET</a>
                </div>
                <div class="col">
                    <div class="health-bar">
                        <div class="current-health" style="width: <?php echo $cpu->getHealthPercentage(); ?>%">
                        <?php echo $cpu->getHP() . '/' . $cpu->health; ?>
                    </div>
                </div>
                    <div class="animated tada">
                        <h5><?php echo $cpu->name; ?></h5>
                        <img src="<?php echo 'images/' . strtolower($cpu->name) . '.jpeg';?>" alt="<?php echo $cpu->name; ?>" class="pokemon-image"/>
                    </div>
                    <div>
                        <?php foreach($cpu->attacks as $key=>$attack) {
                            echo '<a href="index.php?attack=' . $key . '"class="btn btn-dark disabled">' . $attack['name'] . '</a>';
                        } ?>

                    </div>
                </div>
            </div><!-- /.row -->
            <hr />
            <pre class="battlelog">
                <?php foreach($battlelog as $item) {
                    echo '<p>' . $item . '</p>';
                } ?>
</pre>
</div><!-- /.container-->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
