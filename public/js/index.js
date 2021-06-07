jQuery(document).ready($=>{

    var win = $(window);
    var body = $("body");
    var modal = $("#modal-movie");
    let player_container = $('#player-container');
    let $iframe = $('#player');
    var iframe = $iframe.get()[0];
    var player = null;
    var sound_ctrl = $("#sound-ctrl");

	// activer le carousel sur les elements
	// qui en font la demande
    $(".has-carousel").each(function(i,el){
        let obj = $(el);
        let owl = obj.find(".owl-carousel");

        obj.find(".slide-nav.nav-n, .slide-nav.nav-p").on({
            click:function(e){
                e.preventDefault();
                if($(this).hasClass('nav-n')){
                    owl.trigger('next.owl.carousel');
                }
                else{
                    owl.trigger('prev.owl.carousel');
                }
            }
        });

        let opts = {
            loop:true,
            margin:20,
            autoControls:true,
            autoplayHoverPause:true,
        };

        if(obj.attr('id') == "anchor-bouquets"){
            opts.items = 4;

            opts.responsive = {
                0: {
                    items: 1,
                },
                500: {
                    items: 2,
                },
                700: {
                    items: 2,
                },
                800: {
                    items: 2,
                },
                900: {
                    items: 3,
                },
                1000: {
                    items: 4,
                }
            };

            //opts.margin = 4;
        }
        else if(~["anchor-novelas","anchor-vod"].indexOf(obj.attr('id'))){
            opts.items = 5;
            opts.margin = 10;
            opts.autoplay = true;
            opts.autoplayTimeout = 10000;
            opts.responsive = {
                0: {
                    items: 1,
                },
                500: {
                    items: 2,
                },
                700: {
                    items: 2,
                },
                800: {
                    items: 2,
                },
                900: {
                    items: 2,
                },
                1000: {
                    items: 5,
                }
            };
            //opts.loop = false;
        }
        else{
            opts.items = 1;
        }

        owl.owlCarousel(opts);
    });

    /* 09. VENOBOX JS 
    $('.venobox').venobox({
        numeratio: true,
        titleattr: 'data-title',
        titlePosition: 'top',
        titleColor:"#ffffff",
        spinner: 'wandering-cubes',
        spinColor: '#007bff',
        autoplay:true
    });*/


    $('#bxslider-baner').bxSlider({
        autoHover:true,
        mode: 'fade',
        controls:false,
        keyboardEnabled:true,
        captions: false,
        auto:true,
        stopAutoOnClick:true,
        easing:'ease-in-out',
        touchEnabled:false
    });


    $('.venobox').venobox({
        numeratio: true,
        titleattr: 'data-title',
        titlePosition: 'top',
        titleColor:"#ffffff",
        spinner: 'wandering-cubes',
        spinColor: '#007bff',
        autoplay:true
    });


    $(".modal-trigger").on("click",(e)=>{
        e.preventDefault();

        var el = $(e.target);
        var parent = el.parents(".movie-item");
        var name = parent.attr("data-name");
        var original_name = parent.attr("data-originalname");
        var synopsis = parent.attr("data-synopsis");

        modal.find(".selected-movie-image").attr("src",parent.find("img").attr("src"));
        modal.find(".selected-movie-title").html(name);
        modal.find(".selected-movie-subtitle").html(original_name);
        modal.find(".selected-movie-desc").html(synopsis);

        modal.modal({
            backdrop:'static',
            show:true
        });
    });


    if($iframe.length){

        $(window).on("resize",function(e){
            let el =  $iframe;

            if(el.length){

                let parent = el.parent();
                let coef = 16/9;
                let width = (parent.outerWidth() * 98)/100;
                let height = width/coef;

                el.css({
                    "width":parent.outerWidth(),
                    "height":height,
                    "visibility":"visible",
                })
            }
        });

    }

    var timerid = null;
    sound_ctrl.on("click",function(e){
        e.preventDefault();
        if(player){

            player.getMuted().then(function(muted) {
                
                player.setMuted(!muted).then(function(muted) {
                    sound_ctrl.toggleClass("muted")
                }).catch(function(error) {
                    // an error occurred
                });
            }).catch(function(error) {
                // an error occurred
            });


        }
    });

    $("#anchor-novelas .movie-item").on({
        mouseenter:function(e){
            var el = $(e.currentTarget);

            /*if(el.hasClass("watching")) return;
            el.addClass("watching");*/
            //var parent = el.parents(".movie-item");

            if(el.attr("data-hastrailer") == 0)
                return;

            var old_scrolltop = $("html, body").scrollTop();

            timerid = setTimeout(()=>{
                var vimeo_url = el.attr("data-id");

                var options = {
                    url:vimeo_url,
                    autoplay:true,
                    muted:true,
                    controls:false,
                    responsive:true,
                };

                
                if(!player){
                    console.log("lecture 1ere")
                    player = new Vimeo.Player($iframe,options);

                    player.on('loaded', function() {

                        console.log('loaded the video!');

                        player_container.addClass("active");

                        setTimeout(()=>{
                            $(window).resize();
                        },300);

                        $("html, body").animate({ scrollTop: player_container.offset().top-30}, 1000);
                    });

                    player.on('play', function() {
                        console.log('played the video!');
                    });

                    player.on('ended', function() {
                        player_container.removeClass("active");
                        $("html, body").animate({ scrollTop: old_scrolltop}, 1000);
                    });
                }
                else{
                    player_container.addClass("active");

                    player.loadVideo(options)
                    .then((e)=> {
                        sound_ctrl.addClass("muted");

                
                    }).catch(function(error) {

                        switch (error.name) {
                            case 'TypeError':
                                // the id was not a number
                                break;

                            case 'PasswordError':
                                // the video is password-protected and the viewer needs to enter the
                                // password first
                                break;

                            case 'PrivacyError':
                                // the video is password-protected or private
                                break;

                            default:
                                // some other error occurred
                                break;
                        }
                    });

                }
                
            },3000);
        },

        mouseleave:function(e){
            if(timerid){
                clearTimeout(timerid);
            }
        }
    });
});