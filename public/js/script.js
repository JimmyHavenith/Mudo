(function($)
{

  $(document).ready(function()
  {

      // CONTENT NO JS
      $('.menu-with-js').css('display', 'block');
      $('.banner-no-js').css('display', 'block');
      $('.banner-img').css('width', 'auto');
      $('.rating').css('display', "block");
      $('.movie-galery').css('display', 'block');
      $('.movie-galery-button').css('display', 'block');
      $('.page-discover .form-js').css('display', 'block');

      // SLIDER HOMEPAGE

      var windowWidth = $(window).width();
      var nombre = parseInt($('.banner-img img').length);
      var imgL = parseInt($('.banner-img img').width());
      var blocL = parseInt(nombre) * parseInt(windowWidth);
      var slider = parseInt(1 * imgL);
      var limit = parseInt(-(blocL - windowWidth));
      var limit = limit;

      $('.banner-img img').width(windowWidth);
      $('.banner').width(blocL);

  	  $('.prev').addClass('disabled');
  	  if(nombre > 1)
  	  {
  	  	$('.next').addClass('enabled');
  	  }
  	  else
  	  {
  	  	$('.next').addClass('disabled');
  	  }

      $( ".banner-img").mouseover(function() {
        $('.banner-click').css('opacity', '1');
      });
      $( ".banner-click").mouseover(function() {
        $('.banner-click').css('opacity', '1');
      });
      $( ".banner-img" ).mouseout(function() {
        $('.banner-click').css('opacity', '0');
      });


  	  $('.prev').click(function()
  	  {
  	  	var newright = parseInt($('.banner-img img').css('left')) + windowWidth;
  	  	if($(this).hasClass('enabled'))
  	  	{
  	  		$('.next').removeClass('disabled');
  	  		$('.next').addClass('enabled');
  	  		$('.next').css('background-position', '50px 0');
  	  		$('.banner-img img').animate({left: newright},300);
  	  	}
  	  	if(newright >= 0)
  	  	{
  	  		$(this).removeClass('enabled');
  	  		$(this).addClass('disabled');
  	  		$('.prev').css('background-position', '-50px 0');
  	  	}
        return false;
  	  });

  	  $('.next').click(function()
  	  {
  	  	var newleft = parseInt($('.banner-img img').css('left')) - windowWidth;
    		if($(this).hasClass('enabled'))
    		{
    			$('.prev').removeClass('disabled');
    			$('.prev').addClass('enabled');
    			$('.prev').css('background-position', '0 0');
    			$('.banner-img img').animate({left: newleft},300);
    		}
    		if(newleft <= limit)
    		{
    			$(this).removeClass('enabled');
    			$(this).addClass('disabled');
    			$('.next').css('background-position', '-100px 0');
    		}
        return false;
  	  });


      // SLIDER FICHE TECHNIQUE FILM

      var movieNombre = parseInt($('.galery-img img').length);
      var movieLargeurImage = parseInt($('.galery-img img').width());
      var moviePadding = 13 * movieNombre;
      var movieDeplacement = movieLargeurImage + 13;
      var movieLargeurBloc = parseInt(movieNombre) * parseInt(movieLargeurImage);
      var movieSlider = parseInt(2 * movieLargeurImage);
      var movieLimit = parseInt(-(movieLargeurBloc - movieLargeurImage));
      var movieLimit = movieLimit;

      $('.galery-img img').width(movieLargeurImage);
      $('.movie-galery-container').width(movieLargeurBloc + moviePadding);

  	  $('.galery-prev').addClass('disabled');
  	  if(movieNombre > 2)
  	  {
  	  	$('.galery-next').addClass('enabled');
  	  }
  	  else
  	  {
  	  	$('.galery-next').addClass('disabled');
  	  }

  	  $('.galery-prev').click(function()
  	  {
  	  	var movieNewright = parseInt($('.galery-img img').css('left')) + 413;
  	  	if($(this).hasClass('enabled'))
  	  	{
  	  		$('.galery-next').removeClass('disabled');
  	  		$('.galery-next').addClass('enabled');
  	  		$('.galery-next').css('background-position', '35px 0');
  	  		$('.galery-img img').animate({left: movieNewright},200);
  	  	}
  	  	if(movieNewright >= 0)
  	  	{
  	  		$(this).removeClass('enabled');
  	  		$(this).addClass('disabled');
  	  		$('.galery-prev').css('background-position', '-35px 0');
  	  	}
        return false;
  	  });

  	  $('.galery-next').click(function()
  	  {
  	  	var movieNewleft = parseInt($('.galery-img img').css('left')) - 413;
    		if($(this).hasClass('enabled'))
    		{
    			$('.galery-prev').removeClass('disabled');
    			$('.galery-prev').addClass('enabled');
    			$('.galery-prev').css('background-position', '0 0');
    			$('.galery-img img').animate({left: movieNewleft},200);
    		}
    		if(movieNewleft <= movieLimit)
    		{
    			$(this).removeClass('enabled');
    			$(this).addClass('disabled');
    			$('.galery-next').css('background-position', '-70px 0');
    		}
        return false;
  	  });


      /* MOVIE TO SEE */

      var nbFilms = parseInt($('.favorites li').length);
      var nbFilmsView = parseInt($('.favorites li').length);

      if(nbFilms <= 1){
        $(".nb-films-wl").text(nbFilms + " film à voir");
      }else{
        $(".nb-films-wl").text(nbFilms + " films à voir");
      }

      if(nbFilmsView <= 1){
        $(".nb-films-view").text(nbFilms + " film vu");
      }else{
        $(".nb-films-view").text(nbFilms + " films vus");
      }


      /* VIDEO TRAILER */

      var windowHeight = $(window).height();
      var videoWidth = $('.movie-trailer-popup').width();
      var videoHeight = $('.movie-trailer-popup').height();
      var topVideo = (windowHeight - videoHeight) / 2;
      var leftVideo = (windowWidth - videoWidth) / 2;
      $('.movie-trailer-popup').css('left', leftVideo);
      $('.movie-trailer-popup').css('top', topVideo);
      $('#body-black').css('width', windowWidth);
      $('#body-black').css('height', windowHeight);

      $('.see-trailer a').click(function(e)
      {
        $('.movie-trailer-popup').fadeIn(600);
        $('#body-black').css('display', "block");
        $('#body-black').fadin;
        return false;
      });

      $('.video-right a').click(function(e)
      {
        $('.movie-trailer-popup').fadeOut(100);
        $('#body-black').css('display', "none");
        $('iframe').attr('src', $('iframe').attr('src'));
        return false;
      });

      $('#body-black').click(function(e) {
        var form = $('.movie-trailer-popup');
          if(!$(e.target).is(form)&&!$.contains(form[0],e.target)) {
              $('.movie-trailer-popup').fadeOut(100);
              $('#body-black').css('display', "none");
              $('iframe').attr('src', $('iframe').attr('src'));
          }
      });
      var colonne = $('.cast tbody tr');
      var nbMax = parseInt(colonne.length);
      var nbLimit = 5;

      $('.cast tbody').each(function(){
        $('tr:gt(4)', this).hide();
        $('.less').css('display', 'none');
      });
      if(nbMax < 5){
        $(".more").css('display', 'none');
        $(".less").css('display', 'none');
      }
      $(".more").click(function() {
        if(nbMax > 5){
          colonne.show(400);
          $(".more").css('display', 'none');
          $('.less').css('display', 'block');
        }
        return false;
      });
      $(".less").click(function() {
        $(".more").css('display', 'block');
        $(".less").css('display', 'none');
        $('tr:gt(4)').hide(400);
        return false;
      });


      // PAGE 404

      var windowHeight = $(window).height();
      var sectionHeight = $('.page-error').height();
      var hauteurPixel = windowHeight + 'px';
      $('.page-error').css('height', hauteurPixel);


      var windowWidth = $(window).width();

      var errorWidth = $('.div-page-error').width();
      var errorHeight = $('.div-page-error').height();
      var topError = (windowHeight - errorHeight) / 2;
      var leftError = (windowWidth - errorWidth) / 2;
      $('.div-page-error').css('left', leftError);
      $('.div-page-error').css('top', topError);


      // PAGE CONNEXION / INSCRIPTION

      if ( $(window).width() > 768 ) {
        $('.form-background').css('height', windowHeight);
        $('.form-background').css('width', windowWidth);

        var formWidth = $('.formulaire').width();
        var formHeight = $('.formulaire').height();
        var formTop = (windowHeight - formHeight ) / 2;
        var formLeft = (windowWidth - formWidth ) / 2;
        $('.formulaire').css('left', formLeft);
        $('.formulaire').css('top', formTop);
      }


      // RATING MOVIE STAR

      var vote_average = $('.rating-vote-note').text();
      var vote_cinq = parseFloat(vote_average /2);
      $('.rating-vote-note').replaceWith(vote_cinq);
      console.log(vote_cinq);
      var vote_pourcent = vote_average * 10;
      vote_pourcent = vote_pourcent + '%';

      $('.rating-background-yellow').css('width', vote_pourcent);


      // MENU HAMBURGER
      $('#body-black').css('margin-top', "50px");
      var heightWithoutMenu = windowHeight - 50;
      $('#hamburger-menu').css('height', heightWithoutMenu);

      $('.navbar-toggle').click(function(e){
        if(parseInt($('#hamburger-menu').css('right')) == 0){
          e.preventDefault();
          $('#hamburger-menu').css('right', '-70%');
          $('#hamburger-menu').css('transition', 'all 0.5s');
          $('html').css('overflow-y', 'scroll');
          $('#body-black').css('display', "none");
        } else {
          e.preventDefault();
          $('#hamburger-menu').css('right', '0');
          $('#hamburger-menu').css('transition', 'all 0.5s');
          $('html').css('overflow-y', 'hidden');
          $('#body-black').css('display', "block");
        }
      });

  });
})(jQuery);
