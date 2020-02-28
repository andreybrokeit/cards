<?php
namespace Cards;


include_once ('Card.php');

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

    // hashes for quick lookup/validation
    public static $ranks = ["2" => 2, "3" => 3, "4" => 4, "5" => 5, "6" => 6, "7" => 7, "8" => 8, "9" => 9, "10" => 10, "J" => 11, "Q" => 12, "K" => 13, "A" => 14];

    public static $suits = ['C' => 0, 'D' => 1, 'H' => 2, 'S' => 3];

    /**
     * dealt cards
     * @var Card[]
     */
    protected $d = []; // we could implement CardCollections class but for the sake of simplicity use array

    /**
     * not yet dealt cards
     * @var Card[]
     */
    protected $nd = [];

    public function __construct()
    {
        foreach (self::$suits as $suit => $s) {
            foreach (self::$ranks as $rank => $r) {
                $this->nd[] = new Card($suit, $rank);
            }
        }
    }

    /**
     * Moves the top card from NotDealt to Dealt and returns the card
     * @return Card|null
     *
     */
    public function dealOne(): ?Card
    {
        $card = array_shift($this->nd);
        $this->d[] = $card;

        return $card; // just return null, I don't think we should throw errors on empty deck.
    }

    /**
     * Shows the number of remaining cads
     * @return int
     */
    public function cardsLeft(): int
    {
        return count($this->nd);
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
        $deckLen = count($this->nd); // 52
        for($i = $deckLen - 1; $i >= 0; $i--) {
            $j = rand(0, $i+1);

            [$this->nd[$i], $this->nd[$j]] = [$this->nd[$j], $this->nd[$i]];
        }
    }
}