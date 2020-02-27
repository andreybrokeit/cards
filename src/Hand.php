<?php

namespace Cards;

include_once("Card.php");

/**
 * The Hand class represents a set of cards
 */
class Hand
{
    /**
     * @var Card[]
     */
    protected $hand = [];

    /**
     * Adds a card to the hand
     * @param Card $card
     */
    public function addCard(Card $card)
    {
        // outside app should decide based on game rules if added Card is within bounds
        $this->hand[] = $card;
    }

    /**
     * Prints the hand (in order)
     */
    public function display()
    {
        foreach ($this->hand as $card) {
            $card->display();
            echo ' ';
        }
    }

    /**
     * sorts the cards by suit (see intro for suit order), and then by value (see intro for value order)
     */
    public function sortBySuit()
    {

    }

    /**
     *
     */
    public function sortByValue()
    {

    }

    /**
     * @param $len
     * @param bool $isSameSuit
     */
    public function hasStraight($len, $isSameSuit = false)
    {

    }
}
