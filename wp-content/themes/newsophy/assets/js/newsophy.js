jQuery(document).ready(function($) {

  "use strict";

  $.fn.clickToggle = function(a,b) {
    function cb(){
      [b,a][this._tog^=1].call(this);
    }
    return this.on("click", cb);
  };
  
// Search
  $('#top-search a').on('click', function (e) {
      e.preventDefault();
      $('body').addClass('open-search-form');
      setTimeout(function(){
          $('.searchform .search-field').focus();
      }, 600);
  });
  $('.btn-close-search').on('click', function (e) {
      e.preventDefault();
      $('body').removeClass('open-search-form');
  });


// Header

var header = $('#header-content');
  if(header.length){
    headerHeight = header.outerHeight();
  };
  $('.fixed-header .site-wrapper').css("padding-top", headerHeight);

  if ( $( ".site" ).is( ".fixed-header" ) ) {
    $('.sidebar.sticky').css('top', headerHeight+50);
  }  


// Mobile Menu
  $('#menu-toggle').on( 'click', function(e) {
    e.preventDefault();
    $('.site-wrapper').toggleClass('nav-open');
    $('.nav-panel').toggleClass('nav-open');
  });

  $('.close-menu').on('click', function (e) {
    e.preventDefault();
    $('.nav-panel').removeClass('nav-open');
    $('.open-menu').removeClass('active');
  });

  // Sidebar Nav
  var $navMenu = $('.nav-menu-wrap .mobile-menu');

  if( $navMenu.length ) {
    $navMenu.children('li').addClass('menu-item-parent');
    
    $navMenu.find('.menu-item-has-children > span').on('click', function(e){
      e.preventDefault();
      var itemSub = $(this).next('.sub-menu'),
        parentSubs = $(this).closest('.menu-item-parent').find('.sub-menu');
        $navMenu.find('.sub-menu').not(parentSubs).slideUp(250);
      itemSub.slideToggle(250);
    }); 
  } 

// Side Menu
  var $sidebar_inner =  $('.sidebar');
  $('.widget_nav_menu, .widget_pages', $sidebar_inner).addClass('menu').closest('.widget').addClass('sidebar-menu');
  $('.widget_categories, .widget_product_categories', $sidebar_inner).closest('.widget').addClass('categ-menu');
  $('.children').closest('.cat-item').addClass('has-sub');

  $('.menu li > ul, .categ-menu li > ul').each(function(){
      var $ul = $(this);
      $ul.before('<span class="narrow"><i></i></span>');
  });

  $('.sidebar-menu li.menu-item-has-children > a, .menu li.mm-item-has-sub > a, .menu li > .narrow, .has-sub > .narrow').on('click', function(e){
      e.preventDefault();
      var $parent = $(this).parent();
      if ($parent.hasClass('open')) {
          $parent.removeClass('open');
          $parent.find('>ul').stop().slideUp();
      } else {
          $parent.addClass('open');
          $parent.find('>ul').stop().slideDown();
          $parent.siblings().removeClass('open').find('>ul').stop().slideUp();
      }

  });

  // Detect Adminbar

  if ($('#wpadminbar').length && $('#wpadminbar').is(':visible')) {
    var toppos = $('#wpadminbar').height();
  }
  else {
    toppos = 0;
  }

  $('.btn-close-search').css('top', toppos + 20);

 // Hidden Sidebar

  $('.widgets-side').css('top', toppos);

  $('.hidden-sidebar-button a').click(function(){
    return false;
  });
  $('.hidden-sidebar-button a').clickToggle(
    function(){
      $(this).addClass('active');
      $('#hidden-sidebar').addClass('active');
      return false;
    },function(){
      $(this).removeClass('active');
      $('#hidden-sidebar').removeClass('active');
      return false;
   }
  );
  $('#hidden-sidebar a.close-button').click(function(){
    $(this).parent('#hidden-sidebar').removeClass('active');
    $('.hidden-sidebar-button a').click();
    return false;
  }); 

// WooCommerce
  $( document ).on( 'click', '.plus-btn, .minus-btn', function() {
    var $qty    = $( this ).closest( '.quantity' ).find( '.qty' ),
      currentVal  = parseFloat( $qty.val() ),
      max     = parseFloat( $qty.attr( 'max' ) ),
      min     = parseFloat( $qty.attr( 'min' ) ),
      step    = $qty.attr( 'step' );

    if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
    if ( max === '' || max === 'NaN' ) max = '';
    if ( min === '' || min === 'NaN' ) min = 0;
    if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

    if ( $( this ).is( '.plus-btn' ) ) {
      if ( max && ( max == currentVal || currentVal > max ) ) {
        $qty.val( max );
      } else {
        $qty.val( currentVal + parseFloat( step ) );
      }
    } else {
      if ( min && ( min == currentVal || currentVal < min ) ) {
        $qty.val( min );
      } else if ( currentVal > 0 ) {
        $qty.val( currentVal - parseFloat( step ) );
      }
    }
    $qty.trigger( 'change' );
  });   


  // Fitvids
  $(document).ready(function(){
    // Target your .container, .wrapper, .post, etc.
    $(".site-wrapper").fitVids();
 });


  //Fix Footer Position
  var header        = $('#header');
  var menuheader    = $('#menuheader');
  var footer        = $('#footer');
  var headerHeight  = 0;
  var menuHeight    = 0;
  var footerHeight  = 0;
  if(header.length){
    headerHeight = header.outerHeight();
  }
  if(menuheader.length){
    menuHeight  = menuheader.outerHeight();
  }
  if(footer.length){
    footerHeight = footer.outerHeight();
  }

  $('.content-wrapper').css({minHeight: ($(window).height() - headerHeight - menuHeight - footerHeight ) + 'px'});
 

   //Widget Title
  $('.wp-block-group__inner-container > h1,.wp-block-group > h1,.wp-block-group__inner-container > h2,wp-block-group > h2.wp-block-group__inner-container > h3,.wp-block-group__inner-container > h4,.wp-block-group__inner-container > h5,.wp-block-group__inner-container > h6').each(function(){
    var e = $(this);
    e.after('<h4 class="widget-title">'+e.text()+'</h4>');
    e.remove();
  });

  //Category Widget Last Element
  $('.sidebar .catwid:last').css("margin-bottom","35px");

  // IE, Edge image fit
  var userAgent, ieReg, ie, msedge;
  userAgent = window.navigator.userAgent;
  ieReg = /msie|Trident.*rv[ :]*11\./gi;
  ie = ieReg.test(userAgent);
  msedge = /Edge\/\d./i.test(navigator.userAgent);
  if(ie || msedge) {
    $(".entry-image, .related-image, .latest-posts-image").each(function () {
      var $container = $(this),
          imgUrl = $container.find("img").prop("src");
      if (imgUrl) {
        $container.css("backgroundImage", 'url(' + imgUrl + ')').addClass("custom-object-fit");
      }
    });
  } 

  $('.loadmore-container .button').on( 'click', function(e) {
    (window.Interlace);
  });

})