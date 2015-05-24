/* global retun */

$(document).ready(function(){
     var ID="ligneCourante";
    var $menu=helpFunction.createMenuAction();
    var $edit=helpFunction.createEditAction();
    var $panel=$(".pageBlock");
    var $infoError=$("#infoError");
    
    function actionEditOrDelete($link,message,action){
       
       var $info=$("#"+ID).find("td.cle");
         var idSelectLine=$info.text() || 0;
        
         var type=$info.attr("typeBlock");
         var link;
         
         if (idSelectLine){
                link=type+"/"+idSelectLine+"/"+action;
                   $link.attr("href",link);
                   
               }
               else{
                   // there is a mistake 
                  $link.attr("href","#");
                   $infoError.append(helpFunction.createDivError(message));
               }
    }
   
    
    $(".redText").html(function(index,oldText){
    
       var paragraph= oldText.split("\n");
       var text=paragraph[0].replace(/<[\/]*p>/g,'');
        return text+'...';
        
    });
   /* selection d'une  ligne d'un tableau
    * 
    */   
   $("tbody tr").each(function(cle, element){
      var $line=$(element);
      $line.on("click",function(e){

         helpFunction.selectLine($(this),ID);
         $(".disabled").removeClass("disabled");
          
      });
 
   });
    $panel.each(function(cle,element){
       var $this=$(element);
      //$menu= cle==0 ? $edit :$menu;
      
       $this.on({
           "mouseenter":function(){
               
              $this.find(".panel-heading").append(cle==0? $edit:$menu);
           },
           "mouseleave":function(){

                $this.find(".panel-heading").find(".actionAdmin").remove();
                $("#"+ID).removeAttr("id");
           } 
       });
        
    });
   
   $panel.on("click",'button',function(e){
      var link;
       var $this=$(this);
       var action=$this.attr("action").trim();
       switch (action){
           case "create":
              var link=$this.parents(".pageBlock").find("table").attr("link");
            
               $this.parent("a").attr("href",link);
            
               break;
           case "edit":
         
                var message="there is nothing to edit please select an element and try again";
               actionEditOrDelete($this.parent("a"),message,action);
              
             break;
           case "delete":
            
              var message="there is nothing to remove please select an element and try again";
               actionEditOrDelete($this.parent("a"),message,action);
             break;
         default:
             break;
       }

   });
   
});


