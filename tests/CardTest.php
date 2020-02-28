<?php
use PHPUnit\Framework\TestCase;

require_once "../src/Card.php";


/**
 * Class CardTest
 */
class CardTest extends TestCase
{
    public function testCardCreation()
    {
        $card = new \Cards\Card('C', 2);

        $this->assertTrue($card->getRankOrder() === 2, "Card should be 2 of Clubs, failed Value");
        $this->assertTrue($card->getSuitOrder() === 0, "Card should be 2 of Clubs, failed Suit");
    }


    public function testInvalidCard()
    {
        $this->expectException(InvalidArgumentException::class);

        $card = new \Cards\Card('Invalid Suit', 'Invalid Rank');
    }
}