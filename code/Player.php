<?php

declare(strict_types=1);

class Player
{
    private array $cards;
    private bool $lost = false;

    public function __construct(Deck $deck)
    {
        for ($i=0; $i<2; $i++) {
            $this->cards[] = $deck->drawCard();
        }
    }

    public function hit() {

    }

    public function surrender() {

    }

    public function getScore() {

    }

    public function hasLost() {

    }


}