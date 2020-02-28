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

    public function __toString(): string
    {
        $result = $sp = '';
        foreach ($this->hand as $card) {
            $result .= $sp . $card;
            $sp = ' ';
        }

        return $result;
    }

    /**
     * sorts the cards by suit (see intro for suit order), and then by value (see intro for value order)
     */
    public function sortBySuit()
    {
        usort($this->hand, function (Card $a, Card $b)
        {
            if ($a->getSuitOrder() == $b->getSuitOrder()) {
                if ($a->getRankOrder() < $b->getRankOrder()) {
                    return -1;
                } else {
                    return 1;
                }
            }

            if ($a->getSuitOrder() < $b->getSuitOrder()) {
                return -1;
            } else {
                return 1;
            }
        });
    }

    /**
     *
     */
    public function sortByValue()
    {
        usort($this->hand, function (Card $a, Card $b)
        {
            if ($a->getRankOrder() == $b->getRankOrder()) {
                if ($a->getSuitOrder() < $b->getSuitOrder()) {
                    return -1;
                } else {
                    return 1;
                }
            }

            if ($a->getRankOrder() < $b->getRankOrder()) {
                return -1;
            } else {
                return 1;
            }
        });

    }

    /**
     * @param $len
     * @param bool $isSameSuit
     * @return bool
     */
    public function hasStraight($len, $isSameSuit = false): bool
    {
        if ($isSameSuit) {
            $this->sortBySuit();
        } else {
            $this->sortByValue();
        }

        for ($i = 0; $i < $len-1; $i++ ) {
            if ($this->hand[$i]->getRankOrder() + 1 != $this->hand[$i+1]->getRankOrder()) {
                return false;
            } elseif ($isSameSuit) {
                if ($this->hand[$i]->getSuitOrder() != $this->hand[$i+1]->getSuitOrder()) {
                    return false;
                }
            }
        }

        return true;
    }
}
