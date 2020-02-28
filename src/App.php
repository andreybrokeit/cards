<?php

namespace Cards;

include_once ('Deck.php');
include_once ('Hand.php');


/**** Implements the classes above and creates and shuffles a deck and then deals two or more 5- card hands from the deck. ****/

$deck = new Deck();

$deck->display();

$deck->shuffle();

$deck->display();


$handsNumber = 3;

/**
 * @var Hand[]
 */
$hands = [];
for ($i = 0; $i < $handsNumber; $i++) {
    $hands[] = new Hand();
}

$handSize = 5;
while ($handSize != 0) {
    foreach ($hands as $hand) {
        $hand->addCard($deck->dealOne());
    }
    $handSize--;
}

$deck->display();

echo "\n";
echo "Hands:";
echo "\n";

foreach ($hands as $hand) {
    $hand->display();
    echo "\n";
}

/*** test sorting ***/
echo "\n";
echo 'Sort by suit';
echo "\n";

foreach ($hands as $hand) {
    $hand->sortBySuit();
    $hand->display();
    echo "\n";
}

echo "\n";
echo 'Sort by Value';
echo "\n";

foreach ($hands as $hand) {
    $hand->sortByValue();
    $hand->display();
    echo "\n";
}

/***************/



// Test flush
echo "\n";

$hand = new Hand();

$handSize = 5;
while ($handSize != 0) {
    $hand->addCard($deck->dealOne());
    $handSize--;
}

echo "Random hand: \n";
$hand->display();

echo "\n";
echo "Has Straight Suit?  ";
echo (int)$hand->hasStraight(5, true);
echo "\n";


// Test flush

$hand = new Hand();
$hand->addCard(new Card('C', '2'));
$hand->addCard(new Card('C', '3'));
$hand->addCard(new Card('D', '4'));
$hand->addCard(new Card('S', '5'));
$hand->addCard(new Card('C', '6'));


echo "\n";
$hand->display();
echo "\n";
echo "Has Straight Suit?  ";
echo (int)$hand->hasStraight(5, true);
echo "\n";
echo "Has Straight?  ";
echo (int)$hand->hasStraight(5, false);
echo "\n";

$hand = new Hand();
$hand->addCard(new Card('C', '2'));
$hand->addCard(new Card('C', '3'));
$hand->addCard(new Card('C', '4'));
$hand->addCard(new Card('C', '5'));
$hand->addCard(new Card('C', '6'));

echo "\n";
$hand->display();
echo "\n";
echo "Has Straight Suit?  ";
echo (int)$hand->hasStraight(5, true);
echo "\n";
echo "Has Straight?  ";
echo (int)$hand->hasStraight(5, false);
echo "\n";