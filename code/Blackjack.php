<?php

declare(strict_types=1);

class Blackjack
{
    private object $player;
    private object $dealer;
    private object $deck;

    /**
     * @return object
     */
    public function getPlayer(): object
    {
        return $this->player;
    }

    /**
     * @return object
     */
    public function getDealer(): object
    {
        return $this->dealer;
    }

    /**
     * @return object
     */
    public function getDeck(): object
    {
        return $this->deck;
    }
}