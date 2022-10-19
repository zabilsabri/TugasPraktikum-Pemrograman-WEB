var money = 5000;
var total;
var inputBet;
var card = [];
var test = document.getElementsByClassName("yourCard")[0];
console.log(test);


function startGame() {
    inputBet = document.getElementById("bet").value;
    console.log(inputBet);
    if (inputBet == ""){
        alert("Set Your Bet First");
    } else if (inputBet <= money && inputBet > 0) {
        money = money - inputBet;
        document.getElementById('yourMoney').innerHTML = money;
        console.log(money);

        if (card.length != 2){
            for (var i = 0; i < 2; i++){
                var randNum = Math.floor(Math.random() * 11) + 1;
                card.push(randNum);
                console.log(card);
            }

            for (var j = 0; j < card.length; j++){
                let cards = `${card[j]} `;
                test.append(cards);
            }

        }
    } else {
        alert("Input Your Correct Amount of Money!");
    }
}

function takeCard() {  
    var newcard =  Math.floor(Math.random() * 11) + 1;
    card.push(newcard);
    
    for (var j = 0; j < card.length; j++){
        let cards = `${card[j]} `;
        test.append(cards);
    }
    console.log(card);
}
function reset(){
    document.getElementById("yourMoney").innerHTML = "5000";
}