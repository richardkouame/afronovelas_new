jQuery(document).ready($=>{

	var win = $(window);
	var mainMenu = $("header");
    var sections = $("section");
    var social_media = $("#social-media-section");    

    if(win.scrollTop() > 600){
        sections.addClass('section-animation')
    }

	// au click sur le bouton anchor
	// retourner au haut de la page
	$("#anchor-top").on("click",function(e){
		$("html, body").animate({"scrollTop":0},500)
		e.preventDefault();
	})

	// navigation rapide vers des sections
	$(".anchor").on({
        click:function(e){
            let obj = $(this);
            let id = obj.attr("href");

            if(~id.indexOf("?")){
            	id = "#anchor-"+id.split("=")[1];
            }

            id = $(id);

            if(id.length){
            	e.preventDefault();
            	$("html, body").animate({ scrollTop: $(id).offset().top - 50}, 1000);
            	$("html, body").trigger("scroll");
            	$("#header-mobile-menu").trigger("click");
            }
        }
    });


    $(window).on({
        scroll:function(e){
            let pos = $(this).scrollTop();            
            if(pos >= 300){
                mainMenu.addClass('active');
            }
            else if(pos <= 120){
                mainMenu.removeClass('active');
            }

            if(social_media.length){

                var sm_offset = social_media.offset();

                console.log(sm_offset.top+"/"+pos)
                
                if(pos >= sm_offset.top){
                    social_media.addClass('active');
                }
                else if(pos < sm_offset.top){
                    social_media.removeClass('active');
                }
            }

            sections.each(function(i,el){
                let obj = $(el);
                let top = obj.offset().top;
                let delta = top - pos;
                if(delta <= 600 && !obj.hasClass('section-animation')){
                    obj.addClass('section-animation');
                    //console.log(`section ${i}: top: ${top}, scrollTop: ${pos}`)
                }
            });

        }
    });

    var anchor = $("body").attr("data-anchor");
    if(anchor){
    	$("html, body").animate({ scrollTop: $("#anchor-"+anchor).offset().top - 50}, 1000);
    	$("html, body").trigger("scroll");
    }
})