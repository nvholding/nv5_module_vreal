<!-- BEGIN: main -->
<div id="{BLOCKID}" class="widget widget_houzez_featured_properties">
	<div class="widget-top">
	<h3 class="widget-title">
	<a title="{REAL_BLOCK}" href="{REAL_BLOCK_LINK}">{REAL_BLOCK}</a>
	</h3>
	</div>                                  
<div class="widget-body" style="padding-bottom:15px">
	<div class="property-widget-slider slide-animated carousel-{BLOCKID} owl-carousel owl-theme owl-loaded owl-drag" style="opacity: 1;overflow:hidden">
	<!-- BEGIN: loop -->
		<div class="owl-item" style="width:300px;">
		<div class="item">
		<div class="figure-block">
			<figure class="item-thumb">
			<span class="label-featured label label-success"><a style="color:#fff" href="{CATLINK}" title="{CAT}">{CAT}</a></span>
			<div class="label-wrap label-right">
				<span class="label-status label label-default"><a title="{REAL_TYPE}" href="{REAL_TYPE_LINK}">{REAL_TYPE}</a></span>
			</div>

		<a class="hover-effect" href="{ROW.link}" title="{ROW.title}">
			<img src="{ROW.thumb}" alt="{ROW.title}" width="385" height="235">
		</a>
		<figcaption class="thumb-caption">
			<div class="cap-price pull-left"> 
				<!-- BEGIN: price -->{product_price} {money_unit}<!-- END: price -->
				<!-- BEGIN: contact -->{LANG.price_contact}<!-- END: contact -->				
			</div>
			<ul class="list-unstyled actions pull-right">	
				<a style="margin-right:5px" href="{ROW.link}"><li><span class="add_fav" data-placement="top" data-toggle="tooltip" data-container="body" data-original-title="{LANG.detail_product}"><i class="fa fa-link"></i></span></li></a>
				<a style="color:#fff" href="#" data-toggle="modal" data-target="#large-image-modal" class="popup-photo-link-{i}">
				<li><span class="compare-property" data-placement="top" data-toggle="tooltip" data-container="body" data-original-title="{LANG.detail_view_lage_img}">
				<i class="fa fa-photo"></i></span></li>
				</a>						
				<script type="text/javascript" data-show="after">
					$('.popup-photo-link-{i}').click(function(e){
						e.preventDefault();
						$('#large-image-modal .modal-body').html( '<img width="100%" src="{ROW.thumb_large}" alt="{ROW.title}" class="img-responsive" />' );
					});
				</script>	
			</ul>
		</figcaption>
			</figure>
		</div>
		</div>
		</div>
	<!-- END: loop -->
	</div>
		<div class="owl-controls"><div class="owl-dots"></div></div> 
</div>
</div>
<style>
@media (max-width: 1010px) {
#{BLOCKID} .widget-body .owl-item,#{BLOCKID} .widget-body .item,#{BLOCKID} .widget-body .item-thumb img{width:335px;}
}
@media (max-width: 800px) {
#{BLOCKID} .widget-body .owl-item,#{BLOCKID} .widget-body .item,#{BLOCKID} .widget-body .item-thumb img{width:425px;}
}
@media (max-width: 500px) {
#{BLOCKID} .widget-body .item,#{BLOCKID} .widget-body .item-thumb img{height:200px}
}
</style>
<script src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/owl.carousel.min.js"></script>
<script>
$('.carousel-{BLOCKID}').owlCarousel({
		nav: true,
		navText: [ '', '' ],
		dotsContainer: '.owl-dots',			
	loop: false,
	margin:10,
	dots: true,	
	autoplay: true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
});	
</script>
<!-- END: main -->

