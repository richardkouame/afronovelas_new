
const Plugin = videojs.getPlugin('plugin');
var Component = videojs.getComponent("Component")

class AazPlugin extends Plugin{

	constructor(player,options){

		super(player,options)

		let player_options = {
			"header":"yes",
		};


		let querystring = window.location.href.split("?");
		if(querystring.length > 1)
			querystring = querystring[querystring.length - 1];
		else{
			querystring = '';
		}

		this.setState({
			"initialized":false,
			"source":options.source,
			"poster":options.poster,
			"querystring":querystring,
			"options":{
				"logo":"yes",
			}
		});

		if(this.state.querystring){

			for (let item of this.state.querystring.split("&")){
				let i = item.split("=");
				let key = i[0];
				let entry = {};
				this.state.options[key.toLowerCase()] = false;
				if(i.length > 1){
					this.state.options[key.toLowerCase()] = i[1].toLowerCase();
				}
			}
		}


		// player logo component
		var logoCmp = new Component(player,{"name":"PlayerLogo"});
		logoCmp.addClass("player-logo");
		player.controlBar.addChild(logoCmp,null,0);

		

		// player Buttons center play component
		var playerBtnControls = new Component(player,{"name":"PlayerBtnControls"});
		playerBtnControls.addClass("player-btn-controls");
		player.addChild(playerBtnControls);
		player["PlayerBtnControls"] = playerBtnControls;
		$(".player-btn-controls").html(`
			<div class="player-play">
				<i class="video-icon video-popup-control"></i>
			</div>
		`);
	}

	
	

	init(){

		if(this.state.initialized == true) return;
		
		var btnControls = $(".player-btn-controls");
		var btnPlay = btnControls.find(".player-play");
		let playerCmp = $(".video-js");
		let player = this.player;


		$(window).on({
			resize:function(e){
				btnControls.css({
					"left":(playerCmp.innerWidth()/2) - (btnControls.innerWidth()/2),
					"top":(playerCmp.innerHeight()/2) - (btnControls.innerHeight()/2),
				})
			}
		})

		playerCmp.addClass("has-player-id");
		playerCmp.removeClass("has-player-error");
		this.launchStreaming();

		player.on("useractive",(e)=>{

		});

		player.on("userinactive",(e)=>{

		});


		player.on("ready",(e)=>{

		});

		player.on("timeupdate",(e)=>{

		});

		player.on("ended",(e)=>{

			window.postMessage({"name":"trailer-ended","status":true},`${window.location.protocol}//${window.location.host}`);
		});

		btnPlay.on("click",(e)=>{
			e.preventDefault();
			if(player.paused()){
				player.play();
			}
			else{
				player.pause();
			}
		});

		$(window).resize();
		this.setState({"initialized":true})
	}

	

	launchStreaming(){
		this.player.src({
			src: this.state.source,
		  	type: 'application/x-mpegURL',
		  	withCredentials: true
		});
	}
}

videojs.registerPlugin('aazPlugin', AazPlugin);