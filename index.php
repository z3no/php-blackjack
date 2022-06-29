<?php

declare(strict_types=1);

// Require all the files with the classes
require './code/Blackjack.php';
require './code/Card.php';
require './code/Deck.php';
require './code/Player.php';
require './code/Suit.php';

// SET THE GAME

/*If you don't write this line can't use $_Session global variable*/
session_start();

// Create a new `Blackjack` object.
// Put the `Blackjack` object in the session
// Initializing a session variable
//$blackjack = new Blackjack();
//$_SESSION['blackjack'] = $blackjack;
//echo $_SESSION['blackjack'];

if (!isset($_SESSION['blackjack'])){
    $_SESSION['blackjack'] = new Blackjack();
}

$blackJack = $_SESSION['blackjack'];

$player = $blackJack->getPlayer();
$dealer = $blackJack->getDealer();
$deck = $blackJack->getDeck();

$message = "";

//Make those buttons work

if (isset($_POST['action'])) {

    // HIT BUTTON
    if ($_POST['action'] === 'hit'){
        $player->hit($deck);
        if ($player->hasLost()){
            $message = '<div class="alert alert-danger" role="alert">You lose! Reset to try again!</div>';
        }
    }

    // STAND BUTTON
    elseif ($_POST['action'] === 'stand'){
        $dealer->hit($deck);
        if (!$dealer->hasLost()) {
            if ($player->getScore() < $dealer->getScore()) {
                $message = '<div class="alert alert-danger" role="alert">The dealer wins! Reset for payback!</div>';
            } elseif ($player->getScore() == $dealer->getScore()) {
                $message = '<div class="alert alert-danger" role="alert">It is a tie! Too bad the House wins! Press reset to try again!</div>';
            } else {
                $message = '<div class="alert alert-success" role="alert">You are the winner! Reset the cards for another round!</div>';
            }
        } else {
            $message = '<div class="alert alert-success" role="alert">You are the winner! Reset the cards for another round!</div>';
        }
    }

    // SURRENDER BUTTON
    elseif ($_POST['action'] === 'surrender'){
        $message = '<div class="alert alert-danger" role="alert">You surrendered! Sometimes it is the better option. Please reset the cards.</div>';
    }

    // RESET GAME
    elseif ($_POST['action'] === 'reset'){
        //Unset Session
        unset($_SESSION['blackjack']);
        $_SESSION['blackjack'] = new Blackjack();

        $blackJack = $_SESSION['blackjack'];

        $player = $blackJack->getPlayer();
        $dealer = $blackJack->getDealer();
        $deck = $blackJack->getDeck();
    }
}



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Blackjack the PHP OOP way</title>
</head>
<body>
<div class="container px-4">

    <div class="row">
        <p><?php echo $message ?></p>
    </div>

    <div class="row gx-5">
        <!-- PLAYER -->
        <div class="col">
            <h2>PLAYER</h2>
            <h5>Total: <?php echo $player->getScore()?></h5>
            <?php
                foreach($player->getCards() AS $card) {
                    echo '<span style="font-size: 8rem">' . $card->getUnicodeCharacter(true) . '</span>';
                }
            ?>
        </div>

        <!-- DEALER -->
        <div class="col">
            <h2>DEALER</h2>
            <h5>Total: <?php echo $dealer->getScore()?></h5>
            <?php
            foreach($dealer->getCards() AS $card) {
                echo '<span style="font-size: 8rem">' . $card->getUnicodeCharacter(true) . '</span>';
            }
            ?>
        </div>
    </div>

    <form method="post">
        <h2>What will be your next move?</h2>
        <button type="submit" name="action" value="hit" class="btn btn-dark">Hit</button>
        <button type="submit" name="action" value="stand" class="btn btn-success">Stand</button>
        <button type="submit" name="action" value="surrender" class="btn btn-danger">Surrender</button>
        <button type="submit" name="action" value="reset" class="btn btn-danger">Reset</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>