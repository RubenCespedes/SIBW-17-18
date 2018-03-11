var currentFormPage = 0;
var amountsOfFormPages = $(".form-slider .form-slider-container .form-slider-page").length;
var inTransition = false;

$(document).ready(function(){
	bindEvents();
	initializePage();
});

function bindEvents(){
	$(".form-slider .buttons .prev-button").click(changeFormPage);
	$(".form-slider .buttons .next-button").click(changeFormPage);
	$(".slider .next-button").click(changePhoto);
	$(".slider .prev-button").click(changePhoto);
	$(".form-slider .form-slider-container .form-slider-page .row-form .input .icons-container svg").click(changeColor);
	$(".payment-page .form-slider .buttons .confirm-button").click(irAIndex);
	$(".flag-container").mouseenter(showLenguages);
	$(".flag-container").mouseleave(hideLenguages);
}

function showLenguages(){
	console.log($(this));
	TweenLite.to(
		$(this).closest(".lenguage-container"),
		1,
		{
			"left":"0px",
			ease: Power2.easeOut
		}
	);

}

function hideLenguages(){
	TweenLite.to(
		$(this).closest(".lenguage-container"),
		1,
		{
			"left":"79px",
			ease: Power2.easeIn
		}
	);

}

function changePhoto(){
	var parent = $(this).closest(".slider");
	var slides = parent.find(".slider-container .slide");
	var amountOfSlides = parent.find(".slider-container .slide").length;
	var indexOfActive = parent.find(".slider-container .slide.active").index();
	slides.removeClass("active");
	if($($(this)[0]).hasClass("prev-button")){
		if(indexOfActive == 0){
			$(slides[amountOfSlides-1]).addClass("active");
		}else{
			$(slides[indexOfActive-1]).addClass("active");
		}
	}else if($($(this)[0]).hasClass("next-button")){
		if(indexOfActive == amountOfSlides-1){
			$(slides[0]).addClass("active");	
		}else{
			$(slides[indexOfActive+1]).addClass("active");
		}
	}
}

function initializePage(){

	if($(".page-content").hasClass("index-page")){
		$("header .bread-crumb").css("display","none");
	}else{
		$("header .bread-crumb").css("display","block");
	}

	if($(".page-content").hasClass("aboutus-page")){
		$("header .bread-crumb").find("p").append("Sobre nosotros");
	}else if($(".page-content").hasClass("rooms-page")){
		$("header .bread-crumb").find("p").append("Habitaciones");
	}else if($(".page-content").hasClass("main-services-page")){
		$("header .bread-crumb").find("p").append("Servicios");
	}else if($(".page-content").hasClass("faq-page")){
		$("header .bread-crumb").find("p").append("F.A.Q.");
	}else if($(".page-content").hasClass("valuations-page")){
		$("header .bread-crumb").find("p").append("Valoraciones");
	}else if($(".page-content").hasClass("opinion-page")){
		$("header .bread-crumb").find("p").append("<a href='valuations.php'>Valoraciones</a> > Mi Valoración");
	}else if($(".page-content").hasClass("select-room-page")){
		$("header .bread-crumb").find("p").append("Elegir habitación");
	}else if($(".page-content").hasClass("facilities-page")){
		$("header .bread-crumb").find("p").append("<a href='main-services.php'>Servicios</a> > Instalaciones");
	}else if($(".page-content").hasClass("activities-page")){
		$("header .bread-crumb").find("p").append("<a href='main-services.php'>Servicios</a> > Actividades");
	}else if($(".page-content").hasClass("booking-page")){
		$("header .bread-crumb").find("p").append("<a href='rooms.php'>Habitaciones</a> > Realizar reserva");
	}else if($(".page-content").hasClass("payment-page")){
		$("header .bread-crumb").find("p").append("<a href='rooms.php'>Habitaciones</a> > <a href='booking.php'>Realizar reserva</a> > Realizar pago");
	}else if($(".page-content").hasClass("contact-page")){
		$("header .bread-crumb").find("p").append("<a href='aboutus.php'>Sobre nosotros</a> > Envíanos un mensaje");
	}else if($(".page-content").hasClass("offers-page")){
		$("header .bread-crumb").find("p").append("Ofertas");
	} else if($(".page-content").hasClass("single-room-page")){
		$("header .bread-crumb").find("p").append("<a href='rooms.php'>Habitaciones</a> > Habitación");
	} 



	if($(".contact-page").index() != -1){
		initializeForm($(".contact-page .form-slider"));
	}else if($(".opinion-page").index() != -1){
		initializeForm($(".opinion-page .form-slider"));
	}else if($(".payment-page").index() != -1){
		initializeForm($(".payment-page .form-slider"));
	}else if($(".booking-page").index() != -1){
		initializeForm($(".booking-page .form-slider"));
	}
}

function changeColor(){
	var allIcons = $(this).closest(".icons-container").find("svg");
	console.log(allIcons);
	for (var i = 0; i < allIcons.length; i++) {
		if($(this).index() == i){
			$(allIcons[i]).css("fill","red");
		}else{
			$(allIcons[i]).css("fill","black");
		}
	}
}

function initializeForm(form){
	var pages = form.find(".form-slider-container .form-slider-page");
	$(pages[0]).css({"display":"block","opacity":"1"});
}

function changeFormPage(){
	console.log(!$(".page-content").hasClass(".payment-page"));
	if(!inTransition && !$(".page-content").hasClass(".payment-page")){
		inTransition = true;
		var slider = $(this).closest(".form-slider");
		if($(this).hasClass("prev-button")){
			if(currentFormPage == 1){
				disableButton(slider.find(".buttons .prev-button"));
			}
			$(this).parent().find(".next-button").find("p").text("Siguiente");
			$(".conditions-container").css("display","none");
			makeAnimationToRightOfForm(currentFormPage - 1);
		}else if($(this).hasClass("next-button")){
			if(currentFormPage == amountsOfFormPages -1){
				if($(".page-content").hasClass("booking-page")){
					window.location.href = "payment.php";
				}else if($(".page-content").hasClass("opinion-page")){
					alert("¡Valoración enviada! Muchas gracias por su opinión");
					window.location.href = "index.php";
				}
			}
			enableButton(slider.find(".buttons .prev-button"));
			//cambiar texto
			if(currentFormPage >= amountsOfFormPages -2){
				if($(".page-content").hasClass("opinion-page")){
					$(this).find("p").text("Enviar");	
				}else if($(".page-content").hasClass("booking-page")){
					$(this).find("p").text("Realizar pago");
				}
			}
			if($(".page-content").hasClass(".contact-page")){
				$(".conditions-container").css("display","block");
			}
			//deshabilitar el boton
			if(currentFormPage < amountsOfFormPages -1){
				makeAnimationToLeftOfForm(currentFormPage + 1);
			}else{
				inTransition = false;
			}
		}
	}
}

function irAIndex(){
	alert("Pago realizado, disfrute de sus vacaciones.");
	window.location.href = "index.php";
}

function makeAnimationToLeftOfForm(indexOfNext){
	var pages = $(".form-slider .form-slider-container .form-slider-page");
	var tl = new TimelineMax();
	$(pages[indexOfNext]).css("display","block");
	tl.to($(pages[indexOfNext]), 0, {x: 20},0)
	.to( $(pages[currentFormPage]), 0.5, {opacity: 0, x: -20, onComplete: function(){ $(pages[currentFormPage]).css("display","none"); }},0)
	.to($(pages[indexOfNext]), 0.5, {opacity: 1,x: 0, onComplete: function(){
		currentFormPage = currentFormPage + 1;
		inTransition = false;
	}}, 0.5);
}

function makeAnimationToRightOfForm(indexOfNext){
	var pages = $(".form-slider .form-slider-container .form-slider-page");
	var tl = new TimelineMax();
	$(pages[indexOfNext]).css("display","block");
	tl.to($(pages[indexOfNext]), 0, {x: -20},0)
	.to( $(pages[currentFormPage]), 0.5, {opacity: 0, x: 20, onComplete: function(){ $(pages[currentFormPage]).css("display","none"); }},0)
	.to($(pages[indexOfNext]), 0.5, {opacity: 1,x: 0, onComplete: function(){
		currentFormPage = currentFormPage -1;
		inTransition = false;	
	}}, 0.5);
}

function enableButton(target){
	target.css("display","block");
}
function disableButton(target){
	target.css("display","none");
}