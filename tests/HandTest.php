<?php
use PHPUnit\Framework\TestCase;


/**
 * Class HandTest
 */
class HandTest extends TestCase
{
    /**
     * @var \Cards\Hand
     */
    protected $hand;

    public function setUp(): void
    {
        $this->hand = new \Cards\Hand();
    }

    public function testHandSortValue()
    {
        $this->hand->addCard(new \Cards\Card('C', 10));
        $this->hand->addCard(new \Cards\Card('C', 7));
        $this->hand->addCard(new \Cards\Card('C', 2));
        $this->hand->addCard(new \Cards\Card('C', 5));
        $this->hand->addCard(new \Cards\Card('C', 3));
        
        $this->hand->sortByValue();

        $this->assertTrue($this->hand == '2C 3C 5C 7C 10C', "Sorted Hand '$this->hand' didn't match");
    }


    public function testHandSortRank()
    {
        $this->hand->addCard(new \Cards\Card('D', 10));
        $this->hand->addCard(new \Cards\Card('D', 7));
        $this->hand->addCard(new \Cards\Card('C', 2));
        $this->hand->addCard(new \Cards\Card('C', 5));
        $this->hand->addCard(new \Cards\Card('C', 3));

        $this->hand->sortByValue();

        $this->assertTrue($this->hand == '2C 3C 5C 7D 10D', "Sorted Hand '$this->hand' didn't match");
    }
}