(function($) {

	'use strict';

  $('.site-menu-toggle').click(function(){
    var $this = $(this);
    if ( $('body').hasClass('menu-open') ) {
      $this.removeClass('open');
      $('.js-site-navbar').fadeOut(400);
      $('body').removeClass('menu-open');
    } else {
      $this.addClass('open');
      $('.js-site-navbar').fadeIn(400);
      $('body').addClass('menu-open');
    }
  });

	
	$('nav .dropdown').hover(function(){
		var $this = $(this);
		$this.addClass('show');
		$this.find('> a').attr('aria-expanded', true);
		$this.find('.dropdown-menu').addClass('show');
	}, function(){
		var $this = $(this);
			$this.removeClass('show');
			$this.find('> a').attr('aria-expanded', false);
			$this.find('.dropdown-menu').removeClass('show');
	});



	$('#dropdown04').on('show.bs.dropdown', function () {
	  console.log('show');
	});

  // aos
  AOS.init({
    duration: 1000
  });

	// home slider
	$('.home-slider').owlCarousel({
    loop:true,
    autoplay: true,
    margin:10,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    nav:true,
    autoplayHoverPause: true,
    items: 1,
    autoheight: true,
    navText : ["<span class='ion-chevron-left'></span>","<span class='ion-chevron-right'></span>"],
    responsive:{
      0:{
        items:1,
        nav:false
      },
      600:{
        items:1,
        nav:false
      },
      1000:{
        items:1,
        nav:true
      }
    }
	});

	// owl carousel
	var majorCarousel = $('.js-carousel-1');
	majorCarousel.owlCarousel({
    loop:true,
    autoplay: true,
    stagePadding: 7,
    margin: 20,
    animateOut: 'fadeOut',
    animateIn: 'fadeIn',
    nav: true,
    autoplayHoverPause: true,
    items: 3,
    navText : ["<span class='ion-chevron-left'></span>","<span class='ion-chevron-right'></span>"],
    responsive:{
      0:{
        items:1,
        nav:false
      },
      600:{
        items:2,
        nav:false
      },
      1000:{
        items:3,
        nav:true,
        loop:false
      }
  	}
	});

	// owl carousel
	var major2Carousel = $('.js-carousel-2');
	major2Carousel.owlCarousel({
    loop:true,
    autoplay: true,
    stagePadding: 7,
    margin: 20,
    // animateOut: 'fadeOut',
    // animateIn: 'fadeIn',
    nav: true,
    autoplayHoverPause: true,
    autoHeight: true,
    items: 3,
    navText : ["<span class='ion-chevron-left'></span>","<span class='ion-chevron-right'></span>"],
    responsive:{
      0:{
        items:1,
        nav:false
      },
      600:{
        items:2,
        nav:false
      },
      1000:{
        items:3,
        dots: true,
        nav:true,
        loop:false
      }
  	}
	});

  var siteStellar = function() {
    $(window).stellar({
      responsive: false,
      parallaxBackgrounds: true,
      parallaxElements: true,
      horizontalScrolling: false,
      hideDistantElements: false,
      scrollProperty: 'scroll'
    });
  }
  siteStellar();

  var smoothScroll = function() {
    var $root = $('html, body');

    $('a.smoothscroll[href^="#"]').click(function () {
      $root.animate({
        scrollTop: $( $.attr(this, 'href') ).offset().top
      }, 500);
      return false;
    });
  }
  smoothScroll();

  var dateAndTime = function() {
    $('#m_date').datepicker({
      'format': 'd/m/yyyy',
      'autoclose': true
    });
    $('#checkin_date, #checkout_date').datepicker({
      'format': 'd MM, yyyy',
      'autoclose': true
    });
    $('#m_time').timepicker();
  };
  dateAndTime();


  var windowScroll = function() {

    $(window).scroll(function(){
      var $win = $(window);
      if ($win.scrollTop() > 200) {
        $('.js-site-header').addClass('scrolled');
      } else {
        $('.js-site-header').removeClass('scrolled');
      }

    });

  };
  windowScroll();


  var goToTop = function() {

    $('.js-gotop').on('click', function(event){
      
      event.preventDefault();

      $('html, body').animate({
        scrollTop: $('html').offset().top
      }, 500, 'easeInOutExpo');
      
      return false;
    });

    $(window).scroll(function(){

      var $win = $(window);
      if ($win.scrollTop() > 200) {
        $('.js-top').addClass('active');
      } else {
        $('.js-top').removeClass('active');
      }

    });
  
  };


})(jQuery);

function getWURL(){
  var url=window.location.pathname.split("/");
  return window.location.origin+"/"+url[1];
}
function addToCart(id,name){
  var ckin=document.getElementById("ck-in").value;
  var ckout=document.getElementById("ck-out").value;
  var person=document.getElementById("person").value;

if(ckin==""){
document.getElementById("err-ck-in").setAttribute("style","display:block");
}
else{
  document.getElementById("err-ck-in").setAttribute("style","");
}

if(ckout==""){document.getElementById("err-ck-out").setAttribute("style","display:block");}
else{document.getElementById("err-ck-out").setAttribute("style","");}

if(person==""){document.getElementById("err-person").setAttribute("style","display:block");}
else{document.getElementById("err-person").setAttribute("style","");}

if(ckin!=="" & ckout!=="" & person!==""){
  
   jQuery.post(getWURL()+"/includes/cart/addToCart.php",{
    'id':id,
    'check-in':ckin,
    'check-out':ckout,
    'person':person
  })
  .done(function(data){
    
     updateCart()
     location.href=getWURL()+"/pages/cart/index.php"
  })
}


 
}

function delCartItem(arr_id){
 jQuery.post(getWURL()+"/includes/cart/delCartItem.php",{
    'arr_id':arr_id
  })
  .done(function(data){
     updateCart()
     try {
      updateMainCart()
     } catch (error) {
      
     }
  })
}

function emptyCart(){
   jQuery.post(getWURL()+"/includes/cart/emptyCart.php")
  .done(function(data){
    updateCart()
       try {
      updateMainCart()
     } catch (error) {
      
     }
  })
}

function updateCart(){
   jQuery.post(getWURL()+"/includes/cart/getCart.php?t=mini-cart")
  .done(function(res){
    var data={content:"",count:0}
    try {
      data=JSON.parse(res)
    } catch (error) {
      
    }
 jQuery("#mcart-body").empty().append(data.content)
  jQuery("#cart-count").empty().append(data.count)
  if(data.count!=="0" & data.count!==0){
    jQuery("#btn-cart-empty").attr("style","")
  }

  })
}

function updateMainCart(){
   jQuery.post(getWURL()+"/includes/cart/getCart.php?t=main")
  .done(function(res){
    var data={content:"",count:0}
    try {
      data=JSON.parse(res)
    } catch (error) {
      
    }
 jQuery("#cart-body").empty().append(data.content)
  jQuery("#cart-count").empty().append(data.count)
  if(data.count!=="0" & data.count!==0){
    jQuery("#btn-cart-empty").attr("style","")
  }

  })
}

function roomCalPick(){

  
 
    jQuery('#ck-in, #ck-out').datepicker({
      'format': 'd/mm/yyyy',
      'autoclose': true,
       
        startDate: new Date()

    });
   
}

function cartAlertSucc(name){
  var html='<div class="alert alert-warning alert-dismissible fade show cart-alert-succ" role="alert">'+
  name+' aggiunto al carrello con successo!'+
  '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
    '<span aria-hidden="true">&times;</span>'+
  '</button>'+
'</div>';
  jQuery("body").append(html)
}

function goToCart(){
  location.href=getWURL()+"/pages/cart/"
}

function goCheckout(){
  location.href=getWURL()+"/pages/checkout/"
}