<?php

declare(strict_types=1);

// Require all the files with the classes
require 'code/Blackjack.php';
require 'code/Card.php';
require 'code/Deck.php';
require 'code/Player.php';
require 'code/Suit.php';

/*If you don't write this line can't use $_Session global variable*/
session_start();

// Create a new `Blackjack` object.
// Put the `Blackjack` object in the session
// Initializing a session variable
/*$blackjack = new Blackjack();
$_SESSION['blackjack'] = $blackjack;
echo $_SESSION['blackjack'];*/

if (!isset($_SESSION['blackjack']))
{
    // instantiate new blackjack object
    $blackjack = new Blackjack();
    // putting blackjack in the session
    $_SESSION['blackjack'] = $blackjack;
} elseif (isset($_SESSION['blackjack'])) {
    $blackjack = $_SESSION['blackjack'];
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blackjack the PHP way</title>
</head>
<body>

<div>
    <form method="post">
        <h2>What will be your next move?</h2>
        <button type="submit" name="hit" value="hit">Hit</button>
        <button type="submit" name="stand" value="stand">Stand</button>
        <button type="submit" name="surrender" value="surrender">Surrender</button>
    </form>
</div>

</body>
</html>