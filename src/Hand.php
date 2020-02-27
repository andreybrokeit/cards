<?php
namespace Cards;
include("Card.php");

/**
 * The Hand class represents a set of cards
 */
class Hand
{
    /**
     * Size of the hand, could be changed or add another const
     * Or make it a dynamic variable based on the type of the game with getter/setter
     */
    const HAND_SIZE = 5;

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
      }
    }

}
