<!-- BEGIN: main -->	
<div class="page-title">
	<div class="row">
		<div class="col-sm-12">		
			<div class="page-title-left">
				<h2>{CAT_NAME}</h2>
			</div>
			<div class="page-title-right">			
				<!-- BEGIN: displays -->
				<div class="view">
					<div class="sort-tab table-cell">{LANG.displays_product}   		
					<select id="sort" name="sort" class="selectpicker bs-select-hidden" onchange="nv_chang_price();">
						<!-- BEGIN: sorts --><option value="{key}" {se}>{value}</option><!-- END: sorts -->
					</select>					
					</div>
					
					<div class="table-cell hidden-xs">			
						<span type="button" class="view-btn btn-list active" title="{LANG.view_list}"><i class="fa fa-th-list"></i></span>
						<span type="button" class="view-btn btn-grid" title="{LANG.view_grid}"><i class="fa fa-th-large"></i></span>	
					</div>
				</div>
								
				<!-- END: displays -->
			</div>
		</div>
	</div>
</div>

<div class="row" style="transform: none;">
	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 list-grid-area container-contentbar">
		<div id="content-area">
			<div class="property-listing list-view">
			<div class="row">
			<!-- BEGIN: row --> 
			<div class="item-wrap infobox_trigger item-luxury-family-home">
				<div class="property-item table-list">
					<div class="table-cell">
						<div class="figure-block">
							<figure class="item-thumb">		
								<div class="label-wrap label-right hide-on-list">
									<!-- BEGIN: real_block --> <span class="label-status label label-default"><a href="{REAL_BLOCK_LINK}" title="{REAL_BLOCK}">{REAL_BLOCK}</a></span><!-- END: real_block --> 	 						
								</div>							
								<div class="price hide-on-list">
								<span class="item-price">
								<!-- BEGIN: price -->{product_price}<!-- END: price -->
								<!-- BEGIN: contact -->{LANG.price_contact}<!-- END: contact -->									
								</span>
								</div>
								<a class="hover-effect" title="{title_pro}" href="{link_pro}">
									<img src="{img_pro}" alt="{title_pro}" width="385" height="258">               
								</a>
								<ul class="actions">
									<li><span class="add_fav" data-placement="top" data-toggle="tooltip" data-container="body" data-original-title="{LANG.detail_product}"><a href="{link_pro}"><i class="fa fa-link"></i></a></span></li>
									<a style="color:#fff" href="#" data-toggle="modal" data-target="#large-image-modal" class="popup-photo-link1-{id}">
									<li><span class="compare-property" data-placement="top" data-toggle="tooltip" data-container="body" data-original-title="{LANG.detail_view_lage_img}">
										<i class="fa fa-photo"></i></span>
									</li>
									</a>
								</ul>
								<script type="text/javascript" data-show="after">
									$('.popup-photo-link1-{id}').click(function(e){
									e.preventDefault();
									$('#large-image-modal .modal-body').html( '<img width="100%" src="{img_pro_large}" alt="{title_pro}" />' );
									});
								</script>	
							</figure>
						</div>
					</div>
					<div class="item-body table-cell">
						<div class="body-left table-cell">
							<div class="info-row">	
								<h2 class="property-title" style="margin:5px 0 10px 0"><a title="{title_pro}" href="{link_pro}">{title_pro}</a></h2>					
								<address style="margin-top:-5px" class="property-address"><!-- BEGIN: real_type --><a title="{REAL_TYPE}" href="{REAL_TYPE_LINK}">{REAL_TYPE}</a><!-- END: real_type --></address>                
								</div>
							<div class="info-row amenities hide-on-grid">					
								<!-- BEGIN: product_code --><address class="property-address">{LANG.productcode}: {product_code}</address><!-- END: product_code -->
								<address style="margin-top:12px" class="property-address">Xem: {hitstotal}</address>					
							</div>
							<div class="info-row date hide-on-grid">
								<!-- BEGIN: author --><p class="prop-user-agent"><i class="fa fa-user"></i> {author}</p><!-- END: author -->
								<p><i class="fa fa-calendar"></i>{publtime}</p>
							</div>
							
						</div>
						<div class="body-right table-cell hidden-gird-cell">

							<div class="info-row price">
								<span class="item-price">
								<!-- BEGIN: price1 -->{product_price}<!-- END: price1 -->
								<!-- BEGIN: contact1 -->{LANG.price_contact}<!-- END: contact1 -->									
								</span>
							</div>
							<div class="info-row phone text-right">
								<a title="{title_pro}" href="{link_pro}" class="btn btn-primary">{LANG.detail_product} <i class="fa fa-angle-right fa-right"></i></a>
							</div>
						</div>

						<div class="table-list full-width hide-on-list">
							<div class="cell">
								<div class="info-row amenities">
								<!-- BEGIN: product_code1 --><p><span>{LANG.productcode}: {product_code}</span></p><!-- END: product_code1 -->
								<p><span>Xem: {hitstotal}</span></p>
								</div>
							</div>
							<div class="cell">
								<div class="phone">
									<a title="{title_pro}" href="{link_pro}" class="btn btn-primary"> {LANG.detail_product} <i class="fa fa-angle-right fa-right"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="item-foot date hide-on-list">
					<div class="item-foot-left">
						<!-- BEGIN: author1 --><p class="prop-user-agent"><i class="fa fa-user"></i> {author}</p><!-- END: author1 -->
					</div>
					<div class="item-foot-right">
						<p class="prop-date"><i class="fa fa-calendar"></i>{publtime}</p>
					</div>
				</div> 
			</div>
			<!-- END: row -->
			</div>
			</div>

			<hr>
			{pages}
			
		</div>
	</div>	
	
	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-md-offset-0 col-sm-offset-3 container-sidebar houzez_sticky" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px"> 
		<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static;">
			<aside id="sidebar" class="sidebar-white">	
				[VREAL_LEFT]
			</aside>			
		</div>
	</div> 
</div> 		 
<div class="msgshow" id="msgshow"></div>
<!-- END: main -->
