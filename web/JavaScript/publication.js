$(document).ready(function(){
    
   helpFunction.lanceAllPlugin();
    var $contener=$("#publication");
    var $objet=$(".publication");
   helpFunction.gestionActiveMenu($objet,$contener,"menu");
   $(".blockImageTexte").each(function(){
       var $this=$(this);
  
        helpFunction.expandAndCollapse($this,1);
     });
  
});
