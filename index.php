<?php

declare(strict_types=1);

/*If you don't write this line can't use $_Session global variable*/
session_start();

// Require all the files with the classes
require 'code/Blackjack.php';
require 'code/Card.php';
require 'code/Deck.php';
require 'code/Player.php';
require 'code/Suit.php';

// Create a new `Blackjack` object.
// Put the `Blackjack` object in the session
// Initializing a session variable
$blackjack = new Blackjack();
$_SESSION['blackjack'] = $blackjack;
?>