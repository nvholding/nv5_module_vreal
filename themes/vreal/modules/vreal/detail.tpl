<!-- BEGIN: main -->
				   <div class="table-list">
							<div class="table-cell"><h1 style="line-height:40px;margin-bottom:15px">{TITLE}</h1></div>
							<div class="table-cell hidden-sm hidden-xs">
								<span class="label-wrap">
									<!-- BEGIN: real_block -->
									<!-- BEGIN: loop -->
									<span class="label-status label label-default">
										<a title="{REAL_BLOCK}" href="{REAL_BLOCK_LINK}">{REAL_BLOCK}</a>
									</span>  
									<!-- END: loop -->
									<!-- END: real_block -->									
								</span>
							</div>
					</div>
						<address class="property-address hidden-xs"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;{DATE_UP}&nbsp;-&nbsp;<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;{ADDRESS}&nbsp;-&nbsp;<i class="fa fa-send-o" aria-hidden="true"></i>&nbsp;Lượt xem:&nbsp;{NUM_VIEW}</address>   
				</div>

				<div class="header-right">
					<ul class="actions">
					<li class="share-btn">					
					<div class="share_tooltip tooltip_left fade">
						<a style="color:#fff" href="http://www.facebook.com/sharer.php?u={SELFURL}" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><i class="fa fa-facebook"></i></a>
						
						<a style="color:#fff" href="https://twitter.com/intent/tweet?text={TITLE}&amp;url={SELFURL}&amp;via=tinhcavn" onclick="if(!document.getElementById('td_social_networks_buttons')){window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;}"><i class="fa fa-twitter"></i></a>

						<a style="color:#fff" href="http://plus.google.com/share?url={SELFURL}" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><i class="fa fa-google-plus"></i></a>
									
						<!-- BEGIN: author2 -->		
						<a style="color:#fff" href="mailto:{author_email}?subject={SELFURL}&amp;body={SELFURL}"><i class="fa fa-envelope"></i></a>
						<!-- END: author2 -->
					</div>
						<span data-placement="left" data-toggle="tooltip" data-original-title="{LANG.detail_share}"><i class="fa fa-share-alt"></i></span>            
					</li>
					<li class="print-btn">
						<span data-toggle="tooltip" data-placement="right" data-original-title="{LANG.print}">
							<i id="houzez-print" class="fa fa-print" title="{LANG.print}" onclick="nv_open_browse('{LINK_PRINT}','{TITLE}',840,500,'resizable=yes,scrollbars=yes,toolbar=no,location=no,status=no');return false"></i>
						</span>
					</li>				
					</ul>
					
					<!-- BEGIN: price --><span class="item-price">{product_price} {pro_unit}</span><!-- END: price -->
					<!-- BEGIN: contact --><span class="item-price">{LANG.price_contact}</span><!-- END: contact -->					
				</div>
				</div>
                                							
				<div class="detail-media">
                    <div class="tab-content">
					
					<div id="gallery" class="tab-pane fade in active" style="background-image: url({SRC_PRO_LAGE})">
						<span class="label-wrap visible-sm visible-xs">										
							<!-- BEGIN: real_block1 -->
							<!-- BEGIN: loop1 -->
							<span class="label label-primary">
								<a title="{REAL_BLOCK}" href="{REAL_BLOCK_LINK}">{REAL_BLOCK}</a>
							</span>  
							<!-- END: loop1 -->
							<!-- END: real_block1 -->												
						</span>
						<a href="#" class="popup-trigger"></a>
							
						<div class="form-small form-media" style="width:310px">		
							<!-- BEGIN: propatt -->						
							<ul class="houzez-extra-icon">
							<!-- BEGIN: prop_area --><li><span class="icon-houzez-area"></span>{LANG.area}: {prop_area}m²</li><!-- END: prop_area -->
							<!-- BEGIN: prop_bedr --><li><span class="icon-houzez-bed"></span>{LANG.bed}: {prop_bedr}</li><!-- END: prop_bedr -->
							<!-- BEGIN: prop_wc --><li><span class="icon-houzez-bath"></span>{LANG.bath}: {prop_wc}</li><!-- END: prop_wc -->
							<!-- BEGIN: prop_floor --><li><span class="icon-houzez-floors"></span>{LANG.floors}: {prop_floor}</li><!-- END: prop_floor -->
							<!-- BEGIN: prop_front --><li><span class="icon-houzez-front"></span>{LANG.front}: {prop_front}m</li><!-- END: prop_front -->
							<!-- BEGIN: prop_dir --><li><span class="icon-houzez-direction"></span>{LANG.direction}: {prop_dir}</li><!-- END: prop_dir -->
							</ul>	
							<!-- END: propatt -->							
							<!-- BEGIN: author -->																
							<div class="houzez-seller"> 
								<p>{LANG.price_contact}</p> 
								<a href="javascript:void(0)" style="cursor:default"><img src="{author_photo}" /></a>
								<div>
									<a href="javascript:void(0)" style="cursor:default">{author}</a>
									<a href="tel:{author_number}"><p>{author_number}</p></a>
								</div>
							</div>	
							<!-- END: author -->						
						</div>                         
					</div>
					
						<!-- BEGIN: gmap -->	
						<div id="singlePropertyMap" class="tab-pane fade" style="min-height: 600px; position: relative; overflow: hidden;">
							<div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
								<div id="map_view" class="col-sm-24" style="width:100%;height:100%"></div>
							</div>
						</div>
						<!-- END: gmap -->	
						
						<!-- BEGIN: street_view -->							
						<div id="street-map" class="tab-pane fade" style="min-height: 600px; position: relative; overflow: hidden;">
							<div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
							    <div id="street-view" class="col-sm-24" style="height:100%"></div>
								<script>
								  var panorama;
								  function initialize() {
									panorama = new google.maps.StreetViewPanorama(
										document.getElementById('street-view'),
										{
										  position: {lat: {STREET_CL}, lng: {STREET_CN}},
										  pov: {heading: 165, pitch: 0},
										  zoom: 1
										});
								  }
								</script>	
							</div>
						</div>
						<!-- END: street_view -->
							
                    </div>
					
                    <div class="media-tabs">
						<ul class="media-tabs-list">					
							<li class="popup-trigger" data-placement="bottom" data-toggle="tooltip" data-original-title="{LANG.content_image}">
								<a href="#gallery" data-toggle="tab">
									<i class="fa fa-camera"></i>
								</a>
							</li>
							
							<!-- BEGIN: gmap1 -->	
							<li data-placement="bottom" data-toggle="tooltip" data-original-title="{LANG.content_map}">
								<a href="#singlePropertyMap" data-toggle="tab"><i class="fa fa-map"></i></a>
							</li>
							<!-- END: gmap1 -->
							
							<!-- BEGIN: street_view1 -->	
							<li data-placement="bottom" data-toggle="tooltip" data-original-title="{LANG.streetview}">
								<a href="#street-map" data-toggle="tab"><i class="fa fa-street-view"></i></a>
							</li>	
							<!-- END: street_view1 -->
						</ul>

						<ul class="actions">
							<li class="share-btn">          
								<div class="share_tooltip tooltip_left fade">
									<a style="color:#fff" href="http://www.facebook.com/sharer.php?u={SELFURL}" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><i class="fa fa-facebook"></i></a>
								
									<a style="color:#fff" href="https://twitter.com/intent/tweet?text={TITLE}&amp;url={SELFURL}&amp;via=tinhcavn" onclick="if(!document.getElementById('td_social_networks_buttons')){window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;}"><i class="fa fa-twitter"></i></a>

									<a style="color:#fff" href="http://plus.google.com/share?url={SELFURL}" onclick="window.open(this.href, 'mywin','left=50,top=50,width=600,height=350,toolbar=0'); return false;"><i class="fa fa-google-plus"></i></a>
									
									<!-- BEGIN: author1 -->
									<a style="color:#fff" href="mailto:{author_email}?subject={SELFURL}&amp;body={SELFURL}"><i class="fa fa-envelope"></i></a>
									<!-- END: author1 -->
								</div>
								<span title="" data-placement="top" data-toggle="tooltip" data-original-title="share"><i class="fa fa-share-alt"></i></span>        
							</li>
							<li class="print-btn">
								<span data-toggle="tooltip" data-placement="right" data-original-title="{LANG.print}">
									<i id="houzez-print" class="fa fa-print" title="{LANG.print}" onclick="nv_open_browse('{LINK_PRINT}','{TITLE}',840,500,'resizable=yes,scrollbars=yes,toolbar=no,location=no,status=no');return false"></i>
								</span>
							</li>								
						</ul>						
						
						
</div></div>
			</div>
        </div>
    </div>
</section>    
<!--end detail top-->
<!--start detail content-->
<section class="section-detail-content" style="transform: none;">  
	<div class="container" style="transform: none;">
		<div class="row" style="transform: none;">
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 container-contentbar">
				<div class="detail-bar">
<!--start detail content tabber-->
<div class="detail-content-tabber">
    <!--start detail tabs-->
    <ul class="detail-tabs">
        <li class="active">{LANG.content_intro}</li><li>{LANG.detail_product}</li><li>{LANG.content_image}</li><li>{LANG.content_map}</li><li>{LANG.price_contact}</li>
    </ul>
    <!--end detail tabs-->

    <!--start tab-content-->
    <div class="tab-content">
        <div class="tab-pane fade active in">
			<div id="description" class="property-description detail-block target-block">
				<div class="detail-title">
					<h2 class="title-left">{LANG.content_intro}</h2>
				</div>
				<!-- BEGIN: hometext -->{hometext}<div class="clearfix"></div><!-- END: hometext -->
			</div>
		</div>

		<div class="tab-pane fade">
			<div id="address" class="detail-address detail-block target-block">
				<div class="detail-title">
					<h2 class="title-left">{LANG.detail_product}</h2>
				</div>
				{DETAIL}
			</div>
		</div>

		<div class="tab-pane fade">
			<div id="detail" class="detail-list detail-block target-block" style="min-height:600px">
				<div class="detail-title">
					<h2 class="title-left">{LANG.content_image}</h2>    
				</div>
				
				<div id="slideshow">
				<!-- BEGIN: othersimg -->
				<!-- BEGIN: loop -->
				<a data-widget="image" href="{IMG_SRC_OTHER}"><img alt="" border="0" src="{IMG_SRC_OTHER}" /></a>
				<!-- END: loop -->				
				<!-- END: othersimg -->			
				</div>						
			</div>
		</div>
		
		<!-- BEGIN: gmap_view -->
		<div class="tab-pane fade">
			<div id="detail" class="detail-list detail-block target-block" style="min-height:600px">
				<div class="detail-title">
					<h2 class="title-left">{LANG.content_map}</h2>
				</div>
				
				<div id="map" class="col-sm-12" style="height:350px"></div>
				<script>
					function googleinit() {
						initMap();
						initialize();	
					}
					function initMap() {
					var uluru = {lat: {GMAP_CL}, lng: {GMAP_CN}};
					var map = new google.maps.Map(document.getElementById('map'), {
					  zoom: {GMAP_Z},
					  center: uluru
					});
					var marker = new google.maps.Marker({
					  position: uluru,
					  map: map
					});
					
					var uluru1 = {lat: {GMAP_CL}, lng: {GMAP_CN}};
					var map_view = new google.maps.Map(document.getElementById('map_view'), {
					  zoom: {GMAP_Z},
					  center: uluru1
					});
					var marker = new google.maps.Marker({
					  position: uluru,
					  map: map_view
					});				
				  }
				</script>
				<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC8ODAzZ75hsAufVBSffnwvKfTOT6TnnNQ&amp;callback=googleinit"></script>		
			</div>
		</div>	
		<!-- END: gmap_view -->
		
		<div class="tab-pane fade">
			<div id="features" class="detail-features detail-block target-block">
				<div class="detail-title">
					<h2 class="title-left">{LANG.price_contact}</h2>
				</div>
				<!-- BEGIN: support -->{support}<!-- END: support -->	
			</div>
		</div>				
    </div>
    <!--end tab-content-->
</div>
<!--end detail content tabber-->

					<div id="agent_bottom" class="detail-contact detail-block target-block">
							<!-- BEGIN: author3 -->	
							<div class="detail-title" style="margin-bottom:0;padding-bottom:30px">
								<h2 class="title-left">{LANG.content_author}</h2>
							</div>    
							
							<div class="media agent-media">									
								<div class="media-left">
									<a href="#"><img src="{author_photo}" style="height:82px"></a>
								</div>
								<div class="media-body">
									<dl>
										<dd><i class="fa fa-user"></i>{author}</dd>
										<dd><span><i class="fa fa-phone"></i>{author_number}</dd>
										<dd>
										<!-- BEGIN: facebook -->
										<a style="margin-right:10px" class="btn-facebook" target="_blank" href="{facebook}"><i class="fa fa-facebook-square"></i> <span>Facebook</span></a>
										<!-- END: facebook -->
										
										<!-- BEGIN: twitter -->
										<span><a class="btn-twitter" target="_blank" href="{twitter}"><i class="fa fa-twitter-square"></i> <span>Twitter</span></a></span>
										<!-- END: facebook -->
										
										<!-- BEGIN: google_plus -->
										<span><a class="btn-google-plus target="_blank" href="{google_plus}"><i class="fa fa-google-plus-square"></i> <span>Google Plus</span></a></span>
										<!-- END: google_plus -->
										
										<!-- BEGIN: youtube -->
										<span><a class="btn-youtube" target="_blank" href="{youtube}"><i class="fa fa-youtube-square"></i> <span>Youtube</span></a></span>
										<!-- END: youtube -->
										</dd>
									</dl>							
								</div>												
								
							</div>   
								
							<div class="detail-title-inner" style="margin-top:0">

							</div>
							<!-- END: author3 -->	
							[VREAL_CONTACT]
					</div> 
			
					<!-- BEGIN: other -->	
					<div class="property-similer">
								<div class="detail-title" style="padding-bottom:15px">
									<h2 class="title-left">{LANG.content_similar}</h2>
								</div>
								<div class="property-listing grid-view">
									<div class="row">
										{OTHER}
									</div>
								</div>
								<hr>
					</div>						
					<!-- END: other -->
					
					<!-- BEGIN: review -->
					<div class="property-reviews detail-block">
						{REVIEW}
					</div>		
					<!-- END: review -->					
					
					<!-- BEGIN: comment -->	
						{COMMENT}
					<!-- END: comment -->	
					
					
				</div>      
			</div>

			<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-0 col-sm-offset-3 container-sidebar houzez_sticky" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
				<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; top: 62px; left: 1046.5px;">
					<aside id="sidebar" class="sidebar-white">[VREAL_RIGHT]</aside>		
				</div>
			</div>
        </div>
	</div>
</section>
<!--end detail content-->
									
<div class="msgshow" id="msgshow"></div>
<link href="{NV_BASE_SITEURL}themes/{TEMPLATE}/css/vreal2-magnific-popup.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/vreal2-magnific-popup.js"></script>	
<script type="text/javascript">
// Magnific gallery
	jQuery(function($){
	$("#slideshow").magnificPopup({
		fixedContentPos: false,			
		delegate: "a",
		type: "image",
		mainClass: "mfp-no-margins mfp-with-zoom",
		gallery:{
			enabled:true
		},
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300
		}
	});
				})
				jQuery(function($) {
	SqueezeBox.initialize({});
	SqueezeBox.assign($('a.modal').get(), {
		parse: 'rel'
	});
				});

				window.jModalClose = function () {
	SqueezeBox.close();
	};
</script>	
<!-- END: main -->