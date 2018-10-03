<?php

class Card {
   public $cardValue;
   public $cardFace;
}

function displayCards() {

    $suits = array("clubs","spades","hearts","diamonds");
    
    $deck = array();
    
    for ($i=0; $i<=3; $i++) {
        for ($j=1; $j<=13; $j++) {
            $card = new Card;
            $card->cardSuit = $suits[$i];
            $card->cardValue = $j;
            $deck[] = $card;
        }
    }
    
    shuffle($deck);
    
    foreach ($deck as $card) {
        
        echo $card->cardValue . "  " . $card->cardSuit . "<br />";
        
    }
    
}//endFunction
  
  
   function getHand($deck){//working on gethand function (ivonne)
        $i = 0;
        $sum = 0;
         do{ 
             $tempCard = array_splice($deck,0,1);
            $tempSuit = $tempCard[0]["suit"];
            $tempNum = $tempCard[0]["num"];
            $sum += $tempNum;
            $hand[$i] = array("suit"=>$tempSuit,"num"=>$tempNum);
               $i++;
        } while($sum<36);
        return array("hand"=>$hand, "sum"=>$sum, "deck"=>$deck);
    } //end function        
    
    
?>