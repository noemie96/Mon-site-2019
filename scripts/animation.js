var canvas = document.getElementById('canvas'),
        ctx = canvas.getContext('2d'),
        winW = window.innerWidth,
        winH = window.innerHeight,
        fadeColor = "rgba(20,20,20,.2)";


var words_str = 'créative, née le 27 septembre 1996, apprend vite, consciencieuse, courageuse, déterminée, ';

var accent = 'yes, youth, if, trust, future';

var separator = ', ';

var words = (words_str + separator +  accent).split(separator);

canvas.width = winW;
canvas.height = winH;

ctx.fillStyle = 'rgba(20,20,20,1)';
ctx.fillRect(0,0,winW,winH);   

var fsize = {min: 17, max: 30};
if(winW < 650){
    fsize.min /= 2
    fsize.max /= 2
}

var intervalID;
function animationManager(flag, animate) {
   if(flag === 'run')
     intervalID =  setInterval(animate, 200);
   else if(flag === 'stop'){
     clearInterval(intervalID);
   }
}

animate = function(){
  if(_.random(0,15)){
    text(words[_.random(0,words.length-1)]);    
  }else{
    text(words[_.random(0,words.length-1)] + ' ' + words[_.random(0,words.length-1)]);  
  }
  ctx.fillStyle = fadeColor;
  ctx.fillRect(0,0,winW,winH);
};


animationManager('run', animate);

    
function text(word, x, y){
  var size = _.random(fsize.min,fsize.max);

  if(accent.match(word) && _.random(0,1)){
    ctx.fillStyle = 'white';
    size = _.random(fsize.min*4,fsize.max*5);
  }else{
    ctx.fillStyle = "#6d6d6d";
  }

  ctx.font = "bold " + size + "px Helvetica";

  if (arguments.length > 1){
    ctx.fillText(word, x, y);
  }else{
    ctx.fillText(word, _.random(10,winW-10), _.random(10,winH-20));
  }
}


canvas.addEventListener("click", function(evt){
       var x = evt.offsetX;
       var y = evt.offsetY;
       text(words[_.random(0,words.length-1)], x, y);  
    });


$( "#pause" ).toggle(function() {
    animationManager('stop');
    $(this).text('Start');
}, function() {
    animationManager('run', animate);
    $(this).text('Pause');
});