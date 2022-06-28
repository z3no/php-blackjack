<?php

declare(strict_types=1);

/*If you don't write this line can't use $_Session global variable*/
session_start();

// Require all the files with the classes
require './code/Blackjack.php';
require './code/Card.php';
require './code/Deck.php';
require './code/Player.php';
require './code/Suit.php';

// Create a new `Blackjack` object.
// Put the `Blackjack` object in the session
// Initializing a session variable
$blackjack = new Blackjack();
$_SESSION['blackjack'] = $blackjack;
//echo $_SESSION['blackjack'];

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

    <div class="row gx-5">
        <!-- PLAYER -->
        <div class="col">
            <h2>PLAYER</h2>
            <?php
                foreach($_SESSION['blackjack']->getPlayer()->getCards() AS $card) {
                    echo '<span style="font-size: 8rem">' . $card->getUnicodeCharacter(true) . '</span>';
                }
            ?>
        </div>

        <!-- DEALER -->
        <div class="col">
            <h2>DEALER</h2>
            <?php
            foreach($_SESSION['blackjack']->getDealer()->getCards() AS $card) {
                echo '<span style="font-size: 8rem">' . $card->getUnicodeCharacter(true) . '</span>';
            }
            ?>
        </div>
    </div>

    <form method="post">
        <h2>What will be your next move?</h2>
        <button type="submit" name="hit" value="hit">Hit</button>
        <button type="submit" name="stand" value="stand">Stand</button>
        <button type="submit" name="surrender" value="surrender">Surrender</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>