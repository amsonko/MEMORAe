$(document).ready(function(){

 var options = {
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

        var jssor_slider1 = new $JssorSlider$('carousel', options);
         $("body").floatingShare({

            buttons: ["facebook","twitter","google-plus","linkedin","pinterest","envelope"],
            popup_width: 200,
            popup_height: 100
        });

            $("ul#footer").sidebar();
            $("#footer").sidebar({
                position:"bottom", // Position of the sidebar menu
                open:"click" // Open method. Default to mouse hover
                /*callback:{
                    item : {
                        enter : function(){
                            $(this).find("a").animate({color:"red"}, 250);
                        },

                        leave : function(){

                            $(this).find("a").animate({color:"white"}, 250);

                        }

                    }

                }
                */

            });
});



