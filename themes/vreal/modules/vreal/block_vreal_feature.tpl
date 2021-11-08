<!-- BEGIN: main -->
<div class="row row-fluid {BLOCKID}">
<div class="col-sm-12">
<div class="vc_column-inner">
<div class="wpb_wrapper">		
	<div class="houzez-modules module-title section-title-module text-center">
		<h2><a title="{LANG.feature_product_block}" href="{REAL_BLOCK_LINK}">{LANG.feature_product_block}</a></h2>
		<h3 class="sub-heading"><i>{LANG.feature_product_sub}</i></h3>
	</div>
	<div style="padding-top:10px;" id="properties_module_section" class="houzez-module property-item-module">
		<div id="properties_module_container">
			<div id="module_properties" class="property-listing grid-view grid-view-3-col">	
	<!-- BEGIN: loop -->	
	<div class="item-wrap infobox_trigger item-guaranteed-modern-home">
		<div class="property-item table-list">
			<div class="table-cell">
				<div class="figure-block">
					<figure class="item-thumb">
							<span class="label-featured label label-success"><a style="color:#fff" title="{LANG.feature_product_block}" href="{REAL_BLOCK_LINK}">{LANG.feature_product}</a></span>
						<div class="label-wrap label-right hide-on-list">
							<span class="label-status label label-default"><a href="{CATLINK}" title="{CAT}">{CAT}</a></span>                    
						</div>
						<div class="price hide-on-list">
							<!-- BEGIN: price -->
							<span class="item-price">{product_price}</span>
							<!-- END: price -->

							<!-- BEGIN: contact -->
							<span class="item-price">{LANG.price_contact}</span>
							<!-- END: contact -->								
						</div>
						<a class="hover-effect" href="{ROW.link}" title="{ROW.title}">
							<img src="{ROW.thumb}" class="" alt="{ROW.title}" width="385" height="235">                    
						</a>
						
						<ul class="actions">
						<a style="margin-right:5px" href="{ROW.link}"><li><span class="add_fav" data-placement="top" data-toggle="tooltip" data-container="body" data-original-title="{LANG.detail_product}"><i class="fa fa-link"></i></span></li></a>
						<a style="color:#fff" href="#" data-toggle="modal" data-target="#large-image-modal" class="popup-photo-link-{i}">
						<li><span class="compare-property" data-placement="top" data-toggle="tooltip" data-container="body" data-original-title="{LANG.detail_view_lage_img}">
						<i class="fa fa-photo"></i></span></li>
						</a>
						</ul>
					</figure>
				</div>
			</div>
			<script type="text/javascript" data-show="after">
				$('.popup-photo-link-{i}').click(function(e){
					e.preventDefault();
					$('#large-image-modal .modal-body').html( '<img width="100%" src="{ROW.thumb_large}" alt="{ROW.title}" class="img-responsive" />' );
				});
			</script>	
		
			<div class="item-body table-cell">

				<div class="body-left table-cell">
					<div class="info-row">
						<div class="label-wrap hide-on-grid">     
							<span class="label-status label label-default"><a href="{CATLINK}" title="{CAT}">{CAT}</a></span>     							
						</div>
						<h2 class="property-title"><a href="{ROW.link}" title="{ROW.title}">{ROW.title}</a></h2>   
						<address class="property-address"><a title="{REAL_TYPE}" href="{REAL_TYPE_LINK}">{REAL_TYPE}</a></address>						
					</div>
					<div class="info-row amenities hide-on-grid">
						<p><span>{LANG.product_code}: {ROW.product_code}</span></p>
						<p><span>{LANG.detail_num_view}: {ROW.hitstotal}</span></p>
					</div>

					<div class="info-row date hide-on-grid">
						<p class="prop-user-agent"><i class="fa fa-user"></i>
						<!-- BEGIN: author -->
							{author}
						<!-- END: author -->
						</p>
						<p><i class="fa fa-calendar"></i>{ROW.publtime}</p>
					</div>
					
				</div>
				<div class="body-right table-cell hidden-gird-cell">
					<div class="info-row price">
							<!-- BEGIN: price1 -->
							<span class="item-price">{product_price}</span>
							<!-- END: price1 -->

							<!-- BEGIN: contact1 -->
							<span class="item-price">{LANG.price_contact}</span>
							<!-- END: contact1 -->	
					</div>

					<div class="info-row phone text-right">
						<a class="btn btn-primary" href="{ROW.link}" title="{ROW.title}">{LANG.detail_product}<i class="fa fa-angle-right fa-right"></i></a>
					</div>
				</div>

				<div class="table-list full-width hide-on-list">
					<div class="cell">
						<div class="info-row amenities">
						<p><span>{LANG.product_code}: {ROW.product_code}</span></p>
						<p><span>{LANG.detail_num_view}: {ROW.hitstotal}</span></p>
						</div>
					</div>
					<div class="cell">
						<div class="phone">
							<a class="btn btn-primary" href="{ROW.link}" title="{ROW.title}">{LANG.detail_product}<i class="fa fa-angle-right fa-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="item-foot date hide-on-list">
			<div class="item-foot-left">
				<p class="prop-user-agent"><i class="fa fa-user"></i>
				<!-- BEGIN: author1 -->
					{author}
				<!-- END: author1 -->
				</p>
			</div>
			<div class="item-foot-right">
				<p class="prop-date"><i class="fa fa-calendar"></i>{ROW.publtime}</p>
			</div>
		</div>	
	</div>
	<!-- END: loop -->	
			</div>
		</div>
		<div class="clearfix"></div>
	</div>

</div>
</div>
</div>
</div>
<!-- END: main -->	