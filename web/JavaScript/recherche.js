$(document).ready(function(){
    
   helpFunction.lanceAllPlugin();
   var $contener=$("#recherche");
    var $objet=$(".rd");
   helpFunction.gestionActiveMenu($objet,$contener,"menu");
   $(".blockImageTexte").each(function(){
       var $this=$(this);
  
        helpFunction.expandAndCollapse($this,3);
     });
   
//    var deps = ['Regionals','industriels','Académiques'];
//   $('#filterRecherche input').typeahead({
//	hint:false,
//	minLength: 1,
//	order:"asc"
//	},
//	{
//	 name: 'tag',
//	// data source
//	source:helpFunction.substringMatcher(deps)
//	});
});
