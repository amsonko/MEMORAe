
var helpFunction={
    
        getOption:function(){
            return {
                $AutoPlay: true,                                   //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $SlideDuration: 800,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 10,                                  //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 10,                                  //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                }
            };
        },
        pluginSlider:function(){
             var jssor_slider1 = new $JssorSlider$('carousel',helpFunction.getOption());
        },
        pluginFloatingShare:function(){
            $("body").floatingShare({
            buttons: ["facebook","twitter","google-plus","linkedin","pinterest","envelope"],
            popup_width: 200,
            popup_height: 100
            }); 
            
        },
        pluginSideBar:function(){
            $("footer").sidebar({
                position:"bottom", // Position of the sidebar menu
                open:"click", // Open method. Default to mouse hover
            });
        },
        
        pluginResizeVideos:function() {

	// Find all YouTube videos
	var $allVideos = $("iframe[src^='http://www.youtube.com']"),

	    // The element that is fluid width
	    $fluidEl = $("#videos");
	// Figure out and save aspect ratio for each video
	$allVideos.each(function() {

		$(this)
			.data('aspectRatio', this.height / this.width)
			
			// and remove the hard coded width/height
			.removeAttr('height')
			.removeAttr('width');

	});

	// When the window is resized
	// (You'll probably want to debounce this)
	$(window).resize(function() {

		var newWidth = $fluidEl.width();
		
		// Resize all videos according to their own aspect ratio
		$allVideos.each(function() {

			var $el = $(this);
			$el
				.width(newWidth)
				.height(newWidth * $el.data('aspectRatio'));

		});

	// Kick off one resize to fix all videos on page load
	}).resize();

        },
        lanceAllPlugin:function(){
            helpFunction.pluginFloatingShare();
            helpFunction.pluginSideBar();
            helpFunction.pluginSlider();
            helpFunction.pluginResizeVideos();
           // helpFunction.choixLangue();
        },
        gestionActiveMenu:function($objet,$bind,parentClass){
            $("."+parentClass).find(".active").each(function(){
                $(this).removeClass("active");
            });
            
            $objet.addClass("active");
            $bind.addClass("active");     
        },
         substringMatcher :function(tableau) {
                return function findMatches(q, cb) {
                  var matches, substrRegex;

                  // an array that will be populated with substring matches
                  matches = [];

                  // regex used to determine if a string contains the substring `q`
                  substrRegex = new RegExp(q, 'i');

                  // iterate through the pool of strings and for any string that
                  // contains the substring `q`, add it to the `matches` array
                  $.each(tableau, function(i, str) {
                    if (substrRegex.test(str)) {
                      // the typeahead jQuery plugin expects suggestions to a
                      // JavaScript object, refer to typeahead docs for more info
                      matches.push({ value: str });
                    }
                  });

                  cb(matches);
                };
        },
        choixLangue:function(){
         
            $('.langue').find('img').each(function(cle,element){
               
                var $this=$(element);
               
              $this.on("click",function(e){
                // var $img=$("this");
              //  alert("ok");
                    e.preventDefault();
               $(".langueActive").removeClass("langueActive");
               
               $(this).addClass("langueActive");
              });  
            });
        },
           
        expandAndCollapse:function ($parent,nbPToDisplay){
        
         var $paragraph=$parent.find("p");  
      
    
            if ($paragraph.length > nbPToDisplay){

                // hide paragraph > nbPToDisplay
                $paragraph.each(function(cle,element){
                       if (cle > nbPToDisplay){
                           var $this=$(element);
                            $this.hide();
                           }
                });
        
            // creation du button et ajout 
         var $divButton=$('<div >\
                <button class="moreText btn btn-info"><span class="glyphicon glyphicon-plus"></span></button>\
            </div>');
        $parent.append($divButton);  
    
     
          var a=false;
        $divButton.find("button").on("click",function(e){
             e.preventDefault();
            var $moreText=$(this);
            a=a? false:true;

            $paragraph.each(function(cle,element){
                if (cle >nbPToDisplay){
                    var $this=$(element);
                     $this.slideToggle("400","linear",function(){

                        if (a){
                            $moreText.html('<span class="glyphicon glyphicon-minus"></span>');

                        }
                        else{
                             $moreText.html('<span class="glyphicon glyphicon-plus"></span>');

                        }


                     });
                }
            });   
         });
      }
    }
};

     
          
        
          
            
   
      
