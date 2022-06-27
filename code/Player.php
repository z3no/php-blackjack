<?php

declare(strict_types=1);

class Player
{
    private array $cards;
    private bool $lost = false;

    public function __construct(Deck $deck)
    {
        // Starting hand for the player
        for ($i=0; $i<2; $i++) {
            $this->cards[] = $deck->drawCard();
        }
    }

    public function hit(Deck $deck) : void {
        // `hit` should add a card to the player.
        $this->cards[] += $deck->drawCard();
        // If this brings him above 21, set the `lost` property to `true`.
        // To count his score use the method `getScore` you wrote earlier.
        // This method should expect the `$deck` variable as an argument from outside, to draw the card.
        if ($this->getScore($this->cards) > 21){
            $this->lost = true;
        }
    }

    public function surrender() : bool {
        // This sets the property `lost` in the `player` instance to true.
        return $this->lost = true;
    }

    public function getScore(array $cards) : int {
        // Loop over the cards and return the total value of that player
        $score = 0;
        foreach ($this->cards as $card){
            $score += $card->getValue();
        }
        return $score;
    }

    public function hasLost() : bool {
        // Return the bool of the lost property
        return $this->lost;
    }


}