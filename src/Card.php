<?php 

namespace Cards;

require_once("Deck.php");


/**
 * The Card class represents a single card
 */
class Card
{
    protected $suit;

    protected $rank;
    
    public function __construct($suit, $rank)
    {
        if (!$this->isValidSuit($suit) || !$this->isValidRank($rank)) {
            throw new \InvalidArgumentException('Invalid card values');
        }

        $this->suit = $suit;
        $this->rank = $rank;

    }

    protected function isValidSuit($suit): bool
    {
        return isset(Deck::$suits[$suit]);
    }

    protected function isValidRank($rank): bool
    {
        return isset(Deck::$ranks[$rank]);
    }

    /**
     * Prints the type of card
     */
    public function display()
    {
        echo $this->rank . $this->suit;
    }

    public function __toString()
    {
        return $this->rank . $this->suit;
    }

    /**
     * @return mixed
     */
    public function getSuitOrder()
    {
        return Deck::$suits[$this->suit];
    }

    /**
     * @return mixed
     */
    public function getRankOrder()
    {
        return Deck::$ranks[$this->rank];
    }
}
