<?php
use PHPUnit\Framework\TestCase;

require_once("../src/Deck.php");


/**
 * Class DeckTest
 *
 * Integration tests. In order for it to become unit - we need to Mock Card classes
 */

class DeckTest extends TestCase
{
    /**
     * @var \Cards\Deck
     */
    protected $newDeck;

    protected $deckSize = 52;

    public function setUp(): void
    {
        $this->newDeck = new \Cards\Deck();
    }
    public function tearDown(): void
    {
        $this->newDeck = new \Cards\Deck();
    }

    // default deck in order
    public function testDeckCreation()
    {
        $cards = [];
        for ($i = 0; $i < 3; $i++) {
            $cards[] = $this->newDeck->dealOne();
        }

        $card = $cards[0];
        // should be 2C
        $this->assertTrue($card->getRankOrder() === 2, "Card should be 2 of Clubs, failed Value");
        $this->assertTrue($card->getSuitOrder() === 0,"Card should be 2 of Clubs, failed Suit");

        $card = $cards[1];
        // should be 3C
        $this->assertTrue($card->getRankOrder() === 3, "Card should be 3 of Clubs, failed Value");
        $this->assertTrue($card->getSuitOrder() === 0,"Card should be 3 of Clubs, failed Suit");

        $card = $cards[2];
        // should be 4C
        $this->assertTrue($card->getRankOrder() === 4, "Card should be 4 of Clubs, failed Value");
        $this->assertTrue($card->getSuitOrder() === 0,"Card should be 4 of Clubs, failed Suit");

    }

    public function testDeckDealOne()
    {
        $nd = $this->newDeck->getNotDealt();
        $d = $this->newDeck->getDealt();

        $this->assertTrue(count($nd) === $this->deckSize, "New deck ND shoudl be 52");
        $this->assertTrue(count($d) === 0,"New deck D shoudl be 0");

        $this->newDeck->dealOne();
        $nd = $this->newDeck->getNotDealt();
        $d = $this->newDeck->getDealt();

        $this->assertTrue(count($nd) === $this->deckSize - 1, "After dealing one ND shoudl be 51");
        $this->assertTrue(count($d) === 1,"After dealing one D shoudl be 1");
    }

    public function testCardsLeft()
    {
        $number = rand(1,$this->deckSize);
        for ($i = 0; $i < $number; $i++) {
            $this->newDeck->dealOne();
        }
        $left = $this->newDeck->cardsLeft();
        $this->assertTrue($left === $this->deckSize - $number, "Incorrect remainder $left after dealing $number cards");

    }

    public function testDealOver()
    {
        // deal 53 cards
        for ($i = 0; $i < $this->deckSize + 1; $i++) {
            $card = $this->newDeck->dealOne();
        }

        $this->assertTrue($card === null, "Overdrawn card should be null");
    }
}