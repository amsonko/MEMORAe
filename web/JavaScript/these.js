$(document).ready(function(){
    
   helpFunction.lanceAllPlugin();
   var $contener=$("#these");
    var $objet=$(".rd");
   helpFunction.gestionActiveMenu($objet,$contener,"menu");
   
   $('#theseAccordion').Accordion({
        outsideClose:false,
        selfClose:true
    });
});
