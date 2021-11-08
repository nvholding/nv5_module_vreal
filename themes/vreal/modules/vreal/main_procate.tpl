<!-- BEGIN: main -->
<script src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/owl.carousel.min.js"></script>
<!-- BEGIN: catalogs -->
<div class="row row-fluid viewgrid"><div class="col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div style="padding-top:0px;" id="carousel-module-4" class="houzez-module carousel-thumbs-grid caption-above carousel-module">
		<div class="module-title-nav clearfix" style="margin-bottom:10px;">
			<h2><a href="{LINK_CATALOG}" title="{TITLE_CATALOG}">{TITLE_CATALOG}</a></h2>
		</div>
		<div style="margin-top:-50px;" class="module-nav-viewgrid-{CATID}"></div>
		<div class="box-carousel-viewgrid-{CATID} owl-carousel">
		<!-- BEGIN: items -->
		<div class="item">
			<div class="figure-block">
				<figure class="item-thumb">
					<div class="label-wrap label-right hide-on-list">
						<!-- BEGIN: real_block -->
						<span class="label-status label label-default"><a href="{REAL_BLOCK_LINK}" title="{REAL_BLOCK}">{REAL_BLOCK}</a></span>		
						<!-- END: real_block -->
					</div>
					<a class="hover-effect" href="{LINK}" title="{TITLE}">
						<img src="{IMG_SRC}" alt="{TITLE}" class="img-responsive">											
					</a>
					<ul class="actions">
					<a style="margin-right:5px" href="{LINK}"><li><span class="add_fav" data-placement="top" data-toggle="tooltip" data-container="body" data-original-title="{LANG.detail_product}"><i class="fa fa-link"></i></span></li></a>
					<a style="color:#fff" href="#" data-toggle="modal" data-target="#large-image-modal" class="popup-photo-link1-{ID}"><li><span class="compare-property" data-placement="top" data-toggle="tooltip" data-container="body" data-original-title="{LANG.detail_view_lage_img}">
						<i class="fa fa-photo"></i>
					</span></li></a>
					</ul>
					<script type="text/javascript" data-show="after">
						$('.popup-photo-link1-{ID}').click(function(e){
						e.preventDefault();
						$('#large-image-modal .modal-body').html( '<img width="100%" src="{IMG_SRC_LARGE}" alt="{TITLE}" />' );
						});
					</script>										
						<figcaption class="thumb-caption">
							<div class="cap-price pull-left" style="font-size:14px;font-weight:400">
								<!-- BEGIN: price -->{product_price}<!-- END: price -->

								<!-- BEGIN: contact -->{LANG.price_contact}<!-- END: contact -->				
							</div>
							<ul class="actions">
								<li><span class="add_fav" data-placement="top" data-toggle="tooltip" data-container="body" data-original-title="{LANG.detail_product}"><a href="{LINK}"><i class="fa fa-link"></i></a></span></li>
								<li><span class="compare-property" data-placement="top" data-toggle="tooltip" data-container="body" data-original-title="{LANG.detail_view_lage_img}">
									<a style="color:#fff" href="#" data-toggle="modal" data-target="#large-image-modal" class="popup-photo-link1-{ID}"><i class="fa fa-photo"></i></a>
								</span></li>											
							</ul>								
						</figcaption>
						<figcaption class="detail-above detail">
							<div class="fig-title clearfix">
								<h3 class="pull-left"><a style="color:#fff" onMouseOver="this.style.color='#f90'" onMouseOut="this.style.color='#fff'" href="{LINK}" title="{TITLE}">{TITLE0}</a></h3>
							</div>
							<ul class="list-inline" style="float:left">
								<li class="cap-price" style="font-size:14px;font-weight:400">
								<!-- BEGIN: price1 -->{product_price}<!-- END: price1 -->

								<!-- BEGIN: contact1 -->{LANG.price_contact}<!-- END: contact1 -->
								</li>
							</ul>
						</figcaption>
				</figure>
				<div class="detail-bottom detail">
					<h3><a style="color:#fff" onMouseOver="this.style.color='#f90'" onMouseOut="this.style.color='#fff'" href="{LINK}" title="{TITLE}">{TITLE0}</a></h3>
					<ul class="list-inline">										
					</ul>
				</div>
			</div>
		</div>
		<!-- END: items -->
		</div>
	</div>
</div></div></div></div>
<script>
$('.box-carousel-viewgrid-{CATID}').owlCarousel({
	nav: true,
	navText: [ '', '' ],
	navContainer: '.module-nav-viewgrid-{CATID}',
	navClass: [ 'owl-prev-viewgrid-{CATID}', 'owl-next-viewgrid-{CATID}' ],	
	loop: false,
	margin:10,
	dots: false,	
	autoplay: true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1
        },	
        500:{
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
<!-- END: catalogs -->
<div class="msgshow" id="msgshow">&nbsp;</div>
<!-- END: main -->
