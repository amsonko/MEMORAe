$(document).ready(function(){
    helpFunction.lanceAllPlugin();
    var $contener=$("#QMemorae");
    var $objet=$(".wim");
    helpFunction.gestionActiveMenu($objet,$contener,"menu");
    
    $('#wimAccordion').Accordion({
        
        // close the panel if you click somewhere outside of the accordion
        outsideClose:false,

        // // close the panel if you click on open panel
        selfClose:true
    });
});