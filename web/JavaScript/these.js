$(document).ready(function(){
    
   helpFunction.lanceAllPlugin();
   var $contener=$("#these");
    var $objet=$(".rd");
   helpFunction.gestionActiveMenu($objet,$contener,"menu");
   
   $('#theseAccordion').Accordion({
        
        // close the panel if you click somewhere outside of the accordion
        outsideClose:false,

        // // close the panel if you click on open panel
        selfClose:true
    });
});