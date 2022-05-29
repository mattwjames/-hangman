var canvas = document.getElementById("canvas");
context = canvas.getContext("2d"); 

function draw(num) {
   
    if(num == 0){
        //base
        context.clearRect(0, 0, window.innerWidth, window.innerHeight);
        context.rect(0, 380, 200, 20);
        context.fill();
    }
    if(num == 1){
        //pole
        context.rect(100,0,20,400);
        context.fill();
    }
    if(num == 2){
        //top of pole
        context.rect(100,0,100,20);
        context.fill();
    }
    if(num == 3){
        //down part of pole
        context.rect(190,0,20,40);
        context.fill();
    }
    if(num == 4){
    //head
        context.strokeStyle = 'blue';
        context.beginPath();
        context.lineWidth = 6;
        context.arc(200, 80, 30, 0, Math.PI * 2, true);
        context.stroke(); 
    }
    if(num == 5){
        //mouth and eyes
        context.beginPath();
        context.lineWidth = 2;
        context.arc(190, 75, 5, 0, Math.PI * 2, true);
        context.stroke();
        context.beginPath();
        context.arc(210, 75, 5, 0, Math.PI * 2, true);
        context.stroke() 
        context.beginPath();
        context.arc(200, 95, 8, 0, Math.PI, true);
        context.stroke(); 
    }
    if(num == 6){
        //body
        context.lineWidth = 6;
        context.beginPath();
        context.moveTo(200, 110);
        context.lineTo(200, 180);
        context.stroke();
    }
    if(num == 7){
        //arm
        context.beginPath();
        //left up
        context.moveTo(200, 140);
        context.lineTo(150, 130);
    }
    if(num == 8){
    // arm right up
    context.moveTo(200, 140);
    context.lineTo(250, 130);
    }
    context.stroke();
    //left leg
    if(num == 9){
        context.beginPath();
        context.moveTo(200, 180);
        context.lineTo(150, 280);
    }
    //rigth leg
    if(num == 10){
        context.moveTo(200, 180);
        context.lineTo(250, 280);
    }
    //shift everything down and add rope
    context.stroke();
    if(num == 11){
       //rope
       context.clearRect(0, 0, window.innerWidth, window.innerHeight);
       context.strokeStyle='black';
       context.clearRect(0, 0, window.innerWidth, window.innerHeight);
       context.rect(0, 380, 200, 20);
       context.fill();
       //pole
       context.rect(100,0,20,400);
       context.fill();
       //top of pole
       context.rect(100,0,100,20);
       context.fill();
       context.lineWidth = 3;
       context.beginPath();
       context.moveTo(200, 0);
       context.lineTo(200, 100);
       context.stroke();
       //down part of pole
       context.rect(190,0,20,40);
       context.fill();
       //head
       context.beginPath();
       context.arc(200, 120, 30, 0, Math.PI * 2, true);
       context.fill(); 
       //body
       context.lineWidth = 6;
       context.beginPath();
       context.moveTo(200, 150);
       context.lineTo(200, 220);
       context.stroke();
 
       //arm
       context.beginPath();
       //left down
       context.moveTo(200, 180);
       context.lineTo(150, 200);
  
       // arm down
       context.moveTo(200, 180);
       context.lineTo(250, 130);

       context.stroke();
       //left leg
  
       context.beginPath();
       context.moveTo(200, 180);
       context.lineTo(190, 280);
         
       //rigth leg
  
       context.moveTo(200, 180);
       context.lineTo(210, 280);
       context.stroke();
       document.getElementById('gOver').innerHTML = "GAME OVER!"
    }
   
}