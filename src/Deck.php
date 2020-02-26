<?php
namespace Cards;

/**
 *  The Deck class represents a standard 52-card deck; Ace high
 */
class Deck
{
/*
 * Each card is in one of two states -- dealt (D) and not-yet-dealt (ND) - Cards are ordered.
 * The D and ND cards each have their own order - When created, all 52 cards are ND, and are in order, by suit
 * (clubs 2 through A, diamonds 2 through A, hearts 2 through A, spades 2 through A)
 */

    /**
     * Moves the top card from NotDealt to Dealt and returns the card
     */
    public function dealOne()
    {

    }

    /**
     * Prints non-dealt cards and dealt-cards (in order, as separate lists)
     */
    public function display()
    {

    }
    /**
     * Shuffles the deck randomly
     */
    public function shuffle()
    {

    }
}