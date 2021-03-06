<?php
namespace Cards;

include_once ('Deck.php');
include_once ('Hand.php');

$number = $argv[1] ?? 2;
$handSize = $argv[2] ?? 5;

if ($number * $handSize > 52) {
    echo "\n incorrect amount of cards to deal - greater than a deck size \n";
    return;
}

$deck = new Deck();

/**
 * @var Hand[]
 */
$hands = [];
for ($i = 0; $i < $number; $i++) {
    $hands[] = new Hand();
}

while ($handSize != 0) {
    foreach ($hands as $hand) {
        $hand->addCard($deck->dealOne());
    }
    $handSize--;
}


foreach ($hands as $hand) {
    $hand->display();
    echo "\n";
}
