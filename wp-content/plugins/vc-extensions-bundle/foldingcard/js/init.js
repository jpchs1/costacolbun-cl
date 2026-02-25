jQuery(document).ready(function($) {
	"use strict";
	$(".cq-foldingcard").each(function(index) {
		var _this = $(this);
		var _iconcolor = $(this).data('iconcolor');
		var _iconbg = $(this).data('iconbg');
		var _bgcolor = $(this).data('bgcolor');
		var _barbgcolor = $(this).data('barbgcolor');
		var _bghovercolor = $(this).data('bghovercolor');
		var _barhoverbg = $(this).data('barhoverbg');
		var _height = Math.max($('.cq-foldingcard-cardfront', _this).outerHeight(), $('.cq-foldingcard-caption', _this).outerHeight());

		$('.cq-foldingcard-cardfront', _this).css('height', _height);
		$('.cq-foldingcard-card', _this).css('height', _height);
		$('.cq-foldingcard-flipcard', _this).css('height', _height);
		$('.cq-foldingcard-cardback', _this).css('height', _height);
		$('.cq-foldingcard-caption', _this).css('height', _height);
		$('.cq-foldingcard-cardfront', _this).css('min-height', _height);
		$('.cq-foldingcard-card', _this).css('min-height', _height);
		$('.cq-foldingcard-flipcard', _this).css('min-height', _height);
		$('.cq-foldingcard-cardback', _this).css('min-height', _height);
		$('.cq-foldingcard-caption', _this).css('min-height', _height);



		var _lightboxmargin = $(this).data('lightboxmargin') == "" ? 20 : parseInt($(this).data('lightboxmargin'))
        $("a.cq-foldingcard-prettyphoto", _this).prettyPhoto({});
        $('.cq-foldingcard-lightbox', _this).each(function(index, el) {
            var _videowidth = $(this).data('videowidth') == "" ? 640 : parseInt($(this).data('videowidth'));
            var _linktype = $(this).data('linktype');
            var _lightboxmode = $(this).data('lightboxmode');
            var _isgallery = $(this).data('isgallery') == "yes" ? true : false;

            if(_linktype=="lightbox"){
                if(_lightboxmode=="prettyphoto"){
                }else{
                    $(this).boxer({
                        margin: _lightboxmargin,
                        fixed : true
                    });
                }
            }else if(_linktype=="lightbox_custom"){
                var _lightboxURL = $(this).attr('href');
                if(_lightboxURL.indexOf('youtube')>-1||_lightboxURL.indexOf('vimeo')>-1){
                    $(this).lightbox({
                        "viewportFill": 1,
                        "fixed": true,
                        "margin": 10,
                        "videoWidth": _videowidth,
                        "retina": true,
                        "minWidth": 320
                    });
                }else{
                    $(this).boxer({
                        margin: _lightboxmargin,
                        fixed : true
                    });
                }

            }

        });




	})

});
