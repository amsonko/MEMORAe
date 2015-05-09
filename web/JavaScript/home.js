$(document).ready(function(){
    
      helpFunction.lanceAllPlugin();
     
    $("#acceuil").find(".acceuilTextContent p").each(function(cle,element){
        if (cle >1){
            var $this=$(element);
             $this.hide();
            }
           


    });
     var a=false;
    $(".moreText").on("click",function(e){
         e.preventDefault();
        var $moreText=$(this);
        a=a? false:true;
     
        $("#acceuil").find(".acceuilTextContent p").each(function(cle,element){
            if (cle >1){
                var $this=$(element);
                 $this.slideToggle("600","linear",function(){
                   
                    if (a){
                        $moreText.html('see less &nbsp;<span class="glyphicon glyphicon-minus"></span>');
                       
                    }
                    else{
                         $moreText.html('see more &nbsp;<span class="glyphicon glyphicon-plus"></span>');
                       
                    }
                    

                 });
            }
        });   
    });
   
});



