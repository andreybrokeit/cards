<?php

namespace Cards;

require_once("Card.php");


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
     *
     * Manual Sort implementation:
     *
     * usort uses Quicksort
     *
     * We are going implement Insertion sort: it is n^2 just like selection sort
     * but since it is a stable sort it keeps correct cards in the oriignal spot without moving
     * and it performs better since it loops throug "left" sorted array instead of not sorted "right part
     * Implementing anything esle more efficient makes no difference because "hand" size is minuscule
     *
     */

    /**
     * Helper Function to compare cards
     * @param Card $a
     * @param Card $b
     * @return bool
     */
    private function bySuit(Card $a, Card $b): bool
    {
        if ($a->getSuitOrder() == $b->getSuitOrder()) {
            if ($a->getRankOrder() < $b->getRankOrder()) {
                return false;
            } else {
                return true;
            }
        }

        if ($a->getSuitOrder() < $b->getSuitOrder()) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Helper Function to compare cards
     * @param Card $a
     * @param Card $b
     * @return bool
     */
    private function byRank(Card $a, Card $b): bool
    {
        if ($a->getRankOrder() == $b->getRankOrder()) {
            if ($a->getSuitOrder() < $b->getSuitOrder()) {
                return false;
            } else {
                return true;
            }
        }

        if ($a->getRankOrder() < $b->getRankOrder()) {
            return false;
        } else {
            return true;
        }
    }

    private function insertionSort($sortBy)
    {
        if (!in_array($sortBy, ['bySuit', 'byRank'])) {
            throw new \InvalidArgumentException('Unsoported sort type');
        }

        for ($i = 1; $i < count($this->hand); $i++) {
            $card = $this->hand[$i];
            $j = $i-1;

            while ($j >= 0 && $this->$sortBy($this->hand[$j], $card)) {
                $this->hand[$j + 1] = $this->hand[$j];
                $j = $j - 1;
            }

            $this->hand[$j + 1] = $card;
        }
    }

    public function sortByValue()
    {
        $this->insertionSort('bySuit');
    }

    public function sortBySuit()
    {
        $this->insertionSort('byRank');
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
