/*------------------------ 
common javascript
------------------------*/
$(document).ready(function(){
    $("button").click(function(){
      var div = $("#slider-section");  
      div.animate({left: '100px'}, "slow");
      div.animate({fontSize: '3em'}, "slow");
    });
  });