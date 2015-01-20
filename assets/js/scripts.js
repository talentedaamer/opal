jQuery(document).ready(function($) {

	// ADD SLIDEDOWN ANIMATION TO DROPDOWN //
	$('.dropdown').on('show.bs.dropdown', function(e){
	$(this).find('.dropdown-menu').first().stop(true, true).slideDown();
	});

	// ADD SLIDEUP ANIMATION TO DROPDOWN //
	$('.dropdown').on('hide.bs.dropdown', function(e){
	$(this).find('.dropdown-menu').first().stop(true, true).slideUp();
	});

	// masonry integration
	var container = document.querySelector('.recent-posts-wrap');
	var msnry = new Masonry( container, {
	  // options
	  columnWidth: '.item-wrap',
	  itemSelector: '.item-wrap'
	});

	// masonry integration
	var container = document.querySelector('.gallery');
	var msnry = new Masonry( container, {
	  // options
	  columnWidth: '.gallery-item',
	  itemSelector: '.gallery-item'
	});

	$(".item-wrap .item").hover(
		function(){
		  $(this).find(".overlay").slideDown();
		},
		function(){
		  $(this).find(".overlay").slideUp();
		}
	);

	$(".gallery-item, .wp-caption").hover(
		function(){
		  $(this).find(".gallery-caption, .wp-caption-text").slideDown();
		},
		function(){
		  $(this).find(".gallery-caption, .wp-caption-text").slideUp();
		}
	);

	$(".dropdown-menu > li > a.trigger").on("click",function(e){
        var current=$(this).next();
        var grandparent=$(this).parent().parent();
        if($(this).hasClass('left-caret')||$(this).hasClass('right-caret'))
            $(this).toggleClass('right-caret left-caret');
        grandparent.find('.left-caret').not(this).toggleClass('right-caret left-caret');
        grandparent.find(".sub-menu:visible").not(current).hide();
        current.toggle();
        e.stopPropagation();
    });
    $(".dropdown-menu > li > a:not(.trigger)").on("click",function(){
        var root=$(this).closest('.dropdown');
        root.find('.left-caret').toggleClass('right-caret left-caret');
        root.find('.sub-menu:visible').hide();
    });
    
});