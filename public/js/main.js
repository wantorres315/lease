/* =================================
------------------------------------
	Game Warrior Template
	Version: 1.0
 ------------------------------------ 
 ====================================*/


'use strict';


$(window).on('load', function() {
	/*------------------
		Preloder
	--------------------*/
	$(".loader").fadeOut(); 
	$("#preloder").delay(400).fadeOut("slow");

});

(function($) {

	/*------------------
		Navigation
	--------------------*/
	$('.nav-switch').on('click', function(event) {
		$('.main-menu').slideToggle(400);
		event.preventDefault();
	});

	
	/*------------------
		Background Set
	--------------------*/
	$('.set-bg').each(function() {
		var bg = $(this).data('setbg');
		$(this).css('background-image', 'url(' + bg + ')');
	});


	/*------------------
		Hero Slider
	--------------------*/
	$('.hero-slider').owlCarousel({
		loop: true,
		nav: false,
		dots: true,
		mouseDrag: false,
		animateOut: 'fadeOut',
    	animateIn: 'fadeIn',
		items: 1,
		autoplay: true
	});
	var dot = $('.hero-slider .owl-dot');
	dot.each(function() {
		var index = $(this).index() + 1;
		if(index < 10){
			$(this).html('0').append(index);
			$(this).append('<span>.</span>');
		}else{
			$(this).html(index);
			$(this).append('<span>.</span>');
		}
	});


	/*------------------
		News Ticker
	--------------------*/
	$('.news-ticker').marquee({
	    duration: 10000,
	    //gap in pixels between the tickers
	    //gap: 200,
	    delayBeforeStart: 0,
	    direction: 'left',
	    duplicated: true
	});
	/*------------------
		Create a new Robot
	--------------------*/
	$('.save_robot').on('click', function(event) {
		var url = "/create_robot";
		$("#form_robot_create").hide();
		$(".waitClass").show();
		$.ajax({
			type: "POST",
			url: url,
			data: $("#form_robot_create").serialize(),
			success: function(response){
				console.log(response);
        $(".waitClass").hide();
				var html = '<p><div>Your Robot '+response.robot.name+' was created. <br>Now you can put him/her on the teams below</div><img src = "'+response.robot.avatar+'"></p>';
				$(".robotFinal").html(html);	
				$(".robotFinal").show();
				setTimeout(function() {
					window.location.reload();
				}, 3000); 
    	}
			
		});
	});
	/*------------------
		Create a new Team
	--------------------*/
	$('.save_team').on('click', function(event) {
		var url = "/create_team";
		$("#form_team_create").hide();
		$(".waitClassTeam").show();
		$.ajax({
			type: "POST",
			url: url,
			data: $("#form_team_create").serialize(),
			success: function(response){
				console.log(response);
        $(".waitClassTeam").hide();
				var html = '<p><div>Your team '+response.return.name+' was created. <br>Now you put robots in a team</div><img src = "'+response.return.avatar+'"></p>';
				$(".teamFinal").html(html);	
				$(".teamFinal").show();
				setTimeout(function() {
					window.location.reload();
				}, 3000); 
    	}
		});
	});
	/*------------------
			Join Robot in a team
		--------------------*/
	$('.join_team').on('click', function(event) {
		$("#team_robot").val($(this).data('id'));
	});
	$(".save_join_robot_team").on('click',function(event){
		var url = "/join_team";
		$("#form_team_robot_join").hide();
		$(".waitClassJoin").show();
		$.ajax({
			type: "POST",
			url: url,
			data: $("#form_team_robot_join").serialize(),
			success: function(response){
				console.log(response);
        $(".waitClassJoin").hide();
				var html = '<p><div><h1>Welcome to our team</h1></div><img src = "img/welcome.gif"></p>';
				$(".teamJoinFinal").html(html);	
				$(".teamJoinFinal").show();
				setTimeout(function() {
					window.location.reload();
				}, 3000); 
    	}
		});
	});
	/*------------------
		Create a danceoff
	--------------------*/
	$(".save_danceoff").on('click',function(event){
		var url = "/create_danceoff";
		$("#form_danceoff").hide();
		$(".waitClassDanceOff").show();
		$.ajax({
			type: "POST",
			url: url,
			data: $("#form_danceoff").serialize(),
			success: function(response){
				$(".waitClassDanceOff").hide();
				if(response.success == false){
					var html = '<p><div><h1>'+response.message+'</h1></div></p>';
				}else{
					var html = '<p><div><h1>Your DanceOff created with successfull</h1></div><img src = "img/lets.gif"></p>';
				}
				$(".danceoffFinal").html(html);	
				$(".danceoffFinal").show();
				setTimeout(function() {
					window.location.reload();
				}, 3000); 
    	}
		});
	});
/*------------------
		Exec a danceoff
	--------------------*/
	$(".fight_danceoff").on('click',function(event){
		var url = "/exec_danceoff/"+$(this).data('id');
		$.ajax({
			type: "POST",
			url: url,
			success: function(response){
				window.location.reload();
			}
		});
		
	});

	/*------------------
		Create a Battle
	--------------------*/
	$(".save_battle").on('click',function(event){
		var url = "/create_battle";
		$("#form_battle").hide();
		$(".waitBattle").show();
		$.ajax({
			type: "POST",
			url: url,
			data: $("#form_battle").serialize(),
			success: function(response){
				$(".waitBattle").hide();
				if(response.success == false){
					var html = '<p><div><h1>'+response.message+'</h1></div></p>';
				}else{
					var html = '<p><div><h1>Your DanceOff created with successfull</h1></div><img src = "img/lets.gif"></p>';
				}
				$(".battleFinal").html(html);	
				$(".battleFinal").show();
				setTimeout(function() {
					window.location.reload();
				}, 3000); 
    	}
		});
	});

/*------------------
		Exec a battle
	--------------------*/
	$(".fight_battle").on('click',function(event){
		var url = "/exec_battle/"+$(this).data('id');
		$.ajax({
			type: "GET",
			url: url,
			success: function(response){
				window.location.reload();
			}
		});
		
	});
})(jQuery);

