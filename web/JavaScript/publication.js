$(document).ready(function(){
    
   helpFunction.lanceAllPlugin();
    var $contener=$("#recherche");
    var $objet=$(".publication");
   helpFunction.gestionActiveMenu($objet,$contener,"menu");
   
  alert("je suis dans publication");
});
