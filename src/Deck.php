<?php
namespace Cards;


include ('Card.php');

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
    
    // I feel like deck is a collection of cards and should decide on values, card i sjust a holder of those values, flexible
    protected $ranks = ["2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A"];
    protected $suits = ['C', 'D', 'H', 'S'];

    // dealt cards
    protected $d = [];

    protected $nd = [];

    public function __construct()
    {
        foreach ($this->suits as $suit) {
            foreach ($this->ranks as $rank) {
                $this->nd[] = new Card($suit, $rank);
            }
        }
    } 

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
        echo 'Not Dealt: ';
        foreach ($this->nd as $card) {
            echo $card->display() . ' ';
        }
        echo "\n";
        echo 'Dealt: ';
        foreach ($this->d as $card) {
            echo $card->display() . ' ';
        }
        echo "\n";
    }
    /**
     * Shuffles the deck randomly
     */
    public function shuffle()
    {
        
    }
}