/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function($) {
        jQuery(document).find('.blog-lists .row').masonry('reloadItems'); 
        jQuery(document).find('.blog-lists .row').masonry({
          itemSelector: '.item',
          columnWidth: '.grid-sizer'
        });
       
    $('.mainmenu li:has(ul)').addClass('parent'); 
 
    $('a.menulinks').click(function() {
        $(this).next('ul').slideToggle(250);
        $('body').toggleClass('mobile-open'); 
        $('.mainmenu li.parent ul').slideUp(250);
        $('a.child-triggerm').removeClass('child-open');
        return false;
     });     
     
    $('.mainmenu li.parent > a').after('<a class="child-triggerm"><span></span></a>');
    
    $('.mainmenu a.child-triggerm').click(function() {
        $(this).parent().siblings('li').find('a.child-triggerm').removeClass('child-open');
        $(this).parent().siblings('li').find('ul').slideUp(250);
        $(this).next('ul').slideToggle(250);
        $(this).toggleClass('child-open');
        return false;
    });
    
    //testimonials jquery
    $('.testimonials').slick({
      dots: false,
      arrows: false,
      infinite: true,
      speed: 500,
      fade: true,
      autoplay: true,
      cssEase: 'linear'
    });

    //Sessions Close
    $(".sessions-single-desc .close").click(function(){
      $(".sessions-single-desc.astro-session").hide();
    });

    //
    // $("#astro-sessions").click(function(){
    //   $(".sessions-single-desc.astro-session").toggle();
    // });

    //Tabs jquery
    $('.js-tabs-title').on('click', function() {
      var openTab = $(this).data('tab'),
          linePosition = $(this).position().left;
      
      $('.js-tabs-title').removeClass('active');
      $(this).addClass('active');
      $('.js-tabs-content').removeClass('active');
      $(openTab).addClass('active');
    });

    // Gallery image hover
    if (jQuery(window).width() > 1199) {
      $( ".img-wrapper" ).hover(
        function() {
          $(this).find(".img-overlay").animate({opacity: 1}, 600);
        }, function() {
          $(this).find(".img-overlay").animate({opacity: 0}, 600);
        }
      );
    }

    // Lightbox
    var $overlay = $('<div id="overlay"></div>');
    var $image = $("<img>");
    var $prevButton = $('<div id="prevButton"><i class="fa fa-chevron-left">prev</i></div>');
    var $nextButton = $('<div id="nextButton"><i class="fa fa-chevron-right">next</i></div>');
    var $exitButton = $('<div id="exitButton"><i class="fa fa-times">close</i></div>');

    // Add overlay
    $overlay.append($image).prepend($prevButton).append($nextButton).append($exitButton);
    $("#our-gallery").append($overlay);

    // Hide overlay on default
    $overlay.hide();

    // When an image is clicked
    $(".img-overlay").click(function(event) {
      // Prevents default behavior
      event.preventDefault();
      // Adds href attribute to variable
      var imageLocation = $(this).prev().attr("href");
      // Add the image src to $image
      $image.attr("src", imageLocation);
      // Fade in the overlay
      $overlay.fadeIn("slow");
    });

    // When the overlay is clicked
    $overlay.click(function() {
      // Fade out the overlay
      $(this).fadeOut("slow");
    });

    // When next button is clicked
    $nextButton.click(function(event) {
      // Hide the current image
      $("#overlay img").hide();
      // Overlay image location
      var $currentImgSrc = $("#overlay img").attr("src");
      // Image with matching location of the overlay image
      var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
      // Finds the next image
      var $nextImg = $($currentImg.closest(".image").next().find("img"));
      // All of the images in the gallery
      var $images = $("#image-gallery img");
      // If there is a next image
      if ($nextImg.length > 0) { 
        // Fade in the next image
        $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
      } else {
        // Otherwise fade in the first image
        $("#overlay img").attr("src", $($images[0]).attr("src")).fadeIn(800);
      }
      // Prevents overlay from being hidden
      event.stopPropagation();
    });

    // When previous button is clicked
    $prevButton.click(function(event) {
      // Hide the current image
      $("#overlay img").hide();
      // Overlay image location
      var $currentImgSrc = $("#overlay img").attr("src");
      // Image with matching location of the overlay image
      var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
      // Finds the next image
      var $nextImg = $($currentImg.closest(".image").prev().find("img"));
      // Fade in the next image
      $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
      // Prevents overlay from being hidden
      event.stopPropagation();
    });

    // When the exit button is clicked
    $exitButton.click(function() {
      // Fade out the overlay
      $("#overlay").fadeOut("slow");
    });    

   jQuery(document).on('click', '.loadmore-post', function (e) {
        e.preventDefault();
        jQuery(document).find('.loader-mask').fadeIn('slow');
        var $this = jQuery(this);
        var pandorabox_paged = jQuery(this).attr('data-pandorabox_paged');
        jQuery.ajax({
            type: "POST",
            url: PANDORABOXFRONTEND.ajaxurl,
            data: {
                action: "pandorabox_load_more_posts",
                pandorabox_paged: pandorabox_paged,
                pandorabox_post_per_pages: PANDORABOXFRONTEND.pandorabox_post_per_pages,
            },
            success: function (results) {
                var obj = jQuery.parseJSON(results);
                if (obj.max_num_pages <= pandorabox_paged) {
                    jQuery(document).find('.loadmore-post').hide();
                } else {
                    jQuery(document).find('.loadmore-post').show();
                    $this.attr('data-pandorabox_paged', parseInt(pandorabox_paged) + 1);
                }
                jQuery(document).find('.blog-lists .row').append(obj.html);
                jQuery(document).find('.loader-mask').delay(350).fadeOut('slow');
                var $container = jQuery('.blog-lists .row');
                      jQuery(document).find('.blog-lists .row').masonry('reloadItems');
                      jQuery(document).find('.blog-lists .row').masonry({
                          itemSelector: '.item',
                          columnWidth: '.grid-sizer'
                        });
                
               
            },
            error: function (results) {

            }
        });
    });

    jQuery(document).on('click', '.blog-categories ul li', function (e) {
    e.preventDefault();
    var term_ids = jQuery(this).attr('data-term_ids');
    jQuery(document).find('.loader-mask').fadeIn('slow');
    pandorabox_paged = 1;
    var $this = jQuery(this);
    jQuery.ajax({
        type: "POST",
        url: PANDORABOXFRONTEND.ajaxurl,
        data: {
            action: "pandorabox_load_more_posts",
            pandorabox_paged: 1,
            pandorabox_post_per_pages: PANDORABOXFRONTEND.pandorabox_post_per_pages,
            pandorabox_term_ids : term_ids
        },
        success: function (results) {
            var obj = jQuery.parseJSON(results);
            if (obj.max_num_pages <= pandorabox_paged) {
                jQuery(document).find('.loadmore-post').hide();
            } else {
                jQuery(document).find('.loadmore-post').show();
                $this.attr('data-pandorabox_paged', parseInt(pandorabox_paged) + 1);
            }
            jQuery(document).find('.blog-lists .row').html('<div class="grid-sizer"></div>' + obj.html);
            jQuery(document).find('.loader-mask').delay(350).fadeOut('slow');
            var $container = jQuery('.blog-lists .row');
                  jQuery(document).find('.blog-lists .row').masonry('reloadItems');
                  jQuery(document).find('.blog-lists .row').masonry({
                      itemSelector: '.item',
                      columnWidth: '.grid-sizer'
                    });
            
           
        },
        error: function (results) {

        }
    });

});

});//document.ready end here

jQuery(window).resize(function($) {
  if (jQuery(window).width() > 1199) {
    jQuery( ".img-wrapper" ).hover(
      function() {
        jQuery(this).find(".img-overlay").animate({opacity: 1}, 600);
      }, function() {
        jQuery(this).find(".img-overlay").animate({opacity: 0}, 600);
      }
    );
  }
});