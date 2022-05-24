var count = 0;
var guess = 0;
var score = 0; // you get 1000 pts for each correct guess -200 for each wrong guess

function btnClicked(id) {

    //determine if button clicked is in word 
    for (let index = 0; index < 100; index++) {
        if(document.getElementById(id + index) != null) {
            document.getElementById(id + index).value = id;
            count++;
            score += 1000;
        }
    }
    //disable but after selected
    var button = document.getElementById(id);
    button.disabled = true;
    if(guess != count){
        button.style.borderColor = 'green';
        guess = count;
    }
    else{
        button.style.borderColor = 'red';
        score -= 200;
    }    
    
    //update score 
    document.getElementById('points').innerHTML = "Score: " + score +" points"; 
    
    var wordLength = parseInt(document.getElementById('wordLength').innerHTML);

    //game is over
    if(count == wordLength){
       //disable all buttons
       char ='a';
       for (let index = 0; index < 25; index++) {
          var id = String.fromCharCode(char.charCodeAt(0) + index);
          var btn = document.getElementById(id);
          btn.disabled = true;
       }
       //put high score in form 
        document.getElementById('highscore').value = score;

        document.getElementById('ln').value = wordLength;

        //show play again button
        var form = document.getElementById('form');
        form.hidden = false;


    }
    
}  