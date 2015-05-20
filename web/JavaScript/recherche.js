$(document).ready(function(){
    
   helpFunction.lanceAllPlugin();
   var $contener=$("#recherche");
    var $objet=$(".rd");
   helpFunction.gestionActiveMenu($objet,$contener,"menu");
   
    var deps = ['Regionals','industriels','Académiques'];
   $('#filterRecherche input').typeahead({
	hint:false,
	minLength: 1,
	order:"asc"
	},
	{
	 name: 'tag',
	// data source
	source:helpFunction.substringMatcher(deps)
	});
});
