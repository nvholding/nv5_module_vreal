<!-- BEGIN: main -->
<script src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/owl.carousel.min.js"></script>
<div class="row row-fluid {BLOCKID}"><div class="col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div style="padding-top:0px;" id="carousel-module-4" class="houzez-module carousel-thumbs-grid caption-above carousel-module">
		<div class="module-title-nav clearfix" style="margin-bottom:10px;">
			<h2><a href="{CATLINK}" title="{CAT}">{CAT}</a></h2>
		</div>
		<div style="margin-top:-50px;" class="module-nav-{BLOCKID}"></div>
		<div class="box-carousel-{BLOCKID} owl-carousel">
		<!-- BEGIN: loop -->
		<div id="properties-carousel" class="carousel carousel-column-3 slide-animated owl-carousel owl-theme owl-loaded owl-drag" style="opacity:1;overflow:hidden">
					<div class="owl-item cloned">
						<div class="item">
							<div class="figure-block">
								<figure class="item-thumb">
									<div class="label-wrap label-right hide-on-list">
										<!-- BEGIN: real_block -->
										<span class="label-status label label-default"><a href="{REAL_BLOCK_LINK}" title="{REAL_BLOCK}">{REAL_BLOCK}</a></span>		
										<!-- END: real_block -->
									</div>
									<a class="hover-effect" href="{ROW.link}" title="{ROW.title}">
										<img src="{ROW.thumb}" alt="{ROW.title}" width="385" height="258">											
									</a>
									<ul class="actions">
									<li><span class="add_fav" data-placement="top" data-toggle="tooltip" data-container="body" data-original-title="{ROW.title}"><a href="{ROW.link}"><i class="fa fa-link"></i></a></span></li>
									<li><span class="compare-property" data-placement="top" data-original-title="Xem ảnh lớn">
										<a style="color:#fff" href="#" class="popup-photo-link1-{i}"><i class="fa fa-photo"></i></a>
									</span></li>
									</ul>
									<script type="text/javascript" data-show="after">
										$('.popup-photo-link1-{i}').click(function(e){
										e.preventDefault();
										$('.popup-photo-left').html( '<img width="100%" src="{ROW.thumb}" alt="{ROW.title}" />' );
										});
									</script>										
										<figcaption class="thumb-caption">
											<div class="cap-price pull-left">
												<!-- BEGIN: price -->
												{product_price} {money_unit}										
												<!-- END: price -->

												<!-- BEGIN: contact -->
												{LANG.price_contact}
												<!-- END: contact -->				
											</div>
											<ul class="actions">
												<li><span class="add_fav" data-placement="top" data-toggle="tooltip" data-container="body" data-original-title="{ROW.title}"><a href="{ROW.link}"><i class="fa fa-link"></i></a></span></li>
												<li><span class="compare-property" data-placement="top" data-original-title="Xem ảnh lớn">
													<a style="color:#fff" href="#" class="popup-photo-link1-{i}"><i class="fa fa-photo"></i></a>
												</span></li>											
											</ul>								
										</figcaption>
										<figcaption class="detail-above detail">
											<div class="fig-title clearfix">
												<h3 class="pull-left"><a href="{ROW.link}" title="{ROW.title}">{ROW.title}</a></h3>
											</div>
											<ul class="list-inline" style="float:left">
												<!-- BEGIN: price1 -->
												<li class="cap-price">{product_price} {money_unit}</li>												
												<!-- END: price1 -->

												<!-- BEGIN: contact1 -->
												<li class="cap-price">{LANG.price_contact}</li>
												<!-- END: contact1 -->									
											</ul>
										</figcaption>
								</figure>
								<div class="detail-bottom detail">
									<h3><a href="{ROW.link}" title="{ROW.title}">{ROW.title}</a></h3>
									<ul class="list-inline">										
									</ul>
								</div>
							</div>
						</div>
					</div>
		</div>	
		<!-- END: loop -->
		</div>
	</div>
</div></div></div></div>
<script>
$('.box-carousel-{BLOCKID}').owlCarousel({
		nav: true,
		navText: [ '', '' ],
		navContainer: '.module-nav-{BLOCKID}',
		navClass: [ 'owl-prev-{BLOCKID}', 'owl-next-{BLOCKID}' ],	
	loop: false,
	margin:10,
	dots: false,	
	autoplay: false,
    responsiveClass:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});	
</script>
<!-- END: main -->
