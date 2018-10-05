<?php

function play(){
        // generate deck
        $sortedDeck = genDeck();
        
        // shuffle deck
        $deck = deckShuffle($sortedDeck);
        echo "<div class='cardsTitle'>";
        echo "<p>Player 1:</p>";
        echo "<p>Player 2:</p>";
        echo "<p>Player 3:</p>";
        echo "<p>Player 4:</p>";
        echo "</div>";
       
        // deal player 1
        $dealp1= getHand($deck);
        $deck = $dealp1["deck"];
        $p1 = $dealp1["hand"];
        $p1Sum = $dealp1["sum"];
        echo "<div class = 'cards1'>";
        displayHand("1",$p1);
        echo "</div>";
            
        // deal player 2
        $dealp2= getHand($deck);
        $deck = $dealp2["deck"];
        $p2 = $dealp2["hand"];
        $p2Sum = $dealp2["sum"];
        echo "<div class = 'cards2'>";
        displayHand("2",$p2);
        echo "</div>";
            
        // deal player 3
        $dealp3= getHand($deck);
        $deck = $dealp3["deck"];
        $p3 = $dealp3["hand"];
        $p3Sum = $dealp3["sum"];
        echo "<div class = 'cards3'>";
        displayHand("3",$p3);
        echo "</div>";
        
        // deal player 4
        $dealp4 = getHand($deck);
        $deck = $dealp4["deck"];
        $p4 = $dealp4["hand"];
        $p4Sum = $dealp4["sum"];
        echo "<div class = 'cards4'>";
        displayHand("4",$p4);
        echo "</div>";
        
        // call getWinner with an array of each players hand sum
        $players = array($p1Sum,$p2Sum,$p3Sum,$p4Sum);
        $results = getWinner($players);
        $winner = $results["winner"];
        $winnerPoints = $results["total"];
        displayWinner($winner,$winnerPoints);
        
        // display points 
        echo "<div class='cardPoints'>";
        echo "<p>$p1Sum</p>";
        echo "<p>$p2Sum</p>";
        echo "<p>$p3Sum</p>";
        echo "<p>$p4Sum</p>";
        echo "</div>";
    }
    function displayWinner($winner,$points){
        echo "<div class = 'winner'> PLAYER $winner WINS $points!!!</div>";
    }
    function displayHand($player, $hand){
        $i = 1;
        foreach ($hand as $card) {
            $suit = $card["suit"];
            $num = $card["num"];
            echo "<img src='cards/$suit/$num.png' class= 'player$player card$i '></img>";
            $i++;
        }
    }
    function getWinner($players){
        $totalPoints = array_sum($players);
        $max = 0;
        for($i = 0; $i < 4; $i++){
            if ($players[$i]> 42){
                $replace = array($i=>0);
                $players = array_replace($players,$replace);
            }
        }
        $max = max($players);    
        switch(true){
            case $players[0] == $max:
                return array("total"=>$totalPoints, "winner"=>"1");
            case $players[1] == $max:
                return array("total"=>$totalPoints, "winner"=>"2");
            case $players[2] == $max:
                return array("total"=>$totalPoints, "winner"=>"3");
            case $players[3]== $max:
                return array("total"=>$totalPoints, "winner"=>"4");
        }
    }    
    function deckShuffle($deck){
        $k = 51;
        for($i = 0; $i<52;$i++){
            $x = rand(0,$k);
            $tempCard =  array_splice($deck,$x,1);
            $tempSuit = $tempCard[0]["suit"];
            $tempNum = $tempCard[0]["num"];
            $shuffled[$i] = array("suit"=>$tempSuit, "num"=>$tempNum);
            $k--;
        }
        return $shuffled;
    }
    function genDeck(){
        $k = 1;
        for($i=0;$i<52;$i++){
            if($k == 14){
                $k = 1;
            }
            if($i<=12){
                $suit = "clubs";
            } elseif ($i<=25) {
                $suit = "diamonds";
            } elseif ($i<=38){
                $suit = "hearts";
            } else {
                $suit = "spades";
            }
            $deck[$i] = array("suit" => $suit, "num" => $k);
            $k++;
        }
        return $deck;
    }
    function getHand($deck){
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
    }        
?>