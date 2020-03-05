# Cards

## Deck
- The Deck class represents a standard 52-card deck; Ace high
- Each card is in one of two states: dealt (D) and not-yet-dealt (ND)
- Cards are ordered. The D and ND cards each have their own order
- When created, all 52 cards are ND, and are in order, by suit (clubs 2 through A, diamonds 2 through A, hearts 2 through A, spades 2 through A)

### Methods:

**dealOne()** - moves the top card from ND to D and returns the card

**display()** - prints non-dealt cards and dealt-cards (in order, as separate lists) 

**shuffle()** - shuffles the deck randomly

*Make your own shuffle algorithm. Be prepared to explain how it works*

## Card
- The Card class represents a single card

### Methods:

**display()** - prints the type of card

## Hand
- The Hand class represents a set of cards. From 0 to 52 cards, total
- Cards are always in a definite order

### Methods:

**display()** - prints the hand (in order)

**addCard(card)** - adds a card to the hand

**sortBySuit()** - sorts the cards by suit (see intro for suit order), and then by value (see intro for value order)

**sortByValue()** - sorts by value, then by suit

---

Write your own custom sort algorithm. Be prepared to explain how it works.

**hasStraight(len, sameSuit)** - returns true if hand contains a straight of the given length.
If sameSuit is true, counts only straights with cards in the same suit (flushes);
If sameSuit if not true, any straight is counted


### Tests
to run tests simply run unitest command  `./vendor/bin/phpunit ./tests/`

to run a specific test - add it at the end of the command above
