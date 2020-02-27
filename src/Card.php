<?php 

namespace Cards;


/**
 * The Card class represents a single card
 */
class Card
{
    protected $suit;

    protected $rank;
    
    public function __construct($suit, $rank)
    {
        // assume that validation happens during deck generation or in some helper for simplicity
        $this->suit = $suit;
        $this->rank = $rank;
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
}
