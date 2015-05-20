$(document).ready(function() {
    // On récupère la balise <div> en question qui contient les médias
    var $container = $('div#memorae_textbundle_sectionentity_medias');
    ajouterMedia($container);
    // La fonction qui ajoute un formulaire Media
    function ajouterMedia($container) {
        var $media = $( "<div id='memorae_textbundle_sectionentity_medias_0'/>" );
        var $name = $("<input type='text' id='memorae_textbundle_sectionentity_medias_0_name'\n\
        name='memorae_textbundle_sectionentity[medias][0][name]'/>");
        $media.append($name);
        var $path = $("<input type='text' id='memorae_textbundle_sectionentity_medias_0_path'\n\
        name='memorae_textbundle_sectionentity[medias][0][path]'/>");
        $media.append($path);
        var $content = $("<textarea id='memorae_textbundle_sectionentity_medias_0_content' name='memorae_textbundle_sectionentity[medias][0][content]'></textarea>");
        $media.append($content);
        $container.append($media);
        var CKEDITOR_BASEPATH = "/bundles/ivoryckeditor/";
        CKEDITOR.replace("memorae_textbundle_sectionentity_medias_0_content", []);
    }
});