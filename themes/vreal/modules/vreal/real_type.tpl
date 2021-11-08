<!-- BEGIN: main -->
<!-- BEGIN: real_type -->
	<div class="page-title">
		<div class="row">
			<div class="col-sm-12">		
				<div class="page-title-left">
					<h2>{REAL_TYPE_TITLE}</h2>
				</div>
			</div>
		</div>
	</div>
	
<div class="row" style="transform: none;">
	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 list-grid-area container-contentbar">
		<div id="content-area">
			<!-- BEGIN: row -->
			<div class="news_column panel panel-default">
				<div class="panel-body">
					<!-- BEGIN: image -->
					<a href="{REAL_TYPE.link}" title="{REAL_TYPE.title}"><img alt="{REAL_TYPE.title}" src="{REAL_TYPE.thumb}" width="180" class="img-thumbnail pull-left imghome" /></a>
					<!-- END: image -->
					<h3><a href="{REAL_TYPE.link}" title="{REAL_TYPE.title}">{REAL_TYPE.title}</a> <span style="font-weight:normal;font-size:14px">({NUMROW} {LANG.title_products})</span></h3> 
					<p style="margin-top:8px"><i class="fa fa-clock-o"></i> {DATE}</p>
				</div>
			</div>
			<!-- END: row -->
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
<!-- END: real_type -->

<!-- BEGIN: row -->
	<div class="page-title">
		<div class="row">
			<div class="col-sm-12">		
				<div class="page-title-left">
					<h2>{real_type_TITLE}</h2>
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
		<!-- BEGIN: loop -->
		<div class="item-wrap infobox_trigger item-luxury-family-home">
			<div class="property-item table-list">
				<div class="table-cell">
					<div class="figure-block">
						<figure class="item-thumb"> 						
							<div class="label-wrap label-right hide-on-list"></div>				
							<div class="price hide-on-list">
							<span class="item-price">
							<!-- BEGIN: price -->{product_price}<!-- END: price -->
							<!-- BEGIN: contact -->{LANG.price_contact}<!-- END: contact -->									
							</span>
							</div>
							<a class="hover-effect" title="{ROW.title}" href="{ROW.link}">
								<img src="{ROW.thumb}" alt="{ROW.title}" width="385" height="258">               
							</a>
							<ul class="actions">
								<a style="margin-right:5px" href="{ROW.link}"><li><span class="add_fav" data-placement="top" data-toggle="tooltip" data-container="body" data-original-title="{LANG.detail_product}"><i class="fa fa-link"></i></span></li></a>
								<a style="color:#fff" href="#" data-toggle="modal" data-target="#large-image-modal" class="popup-photo-link1-{ROW.id}">
								<li><span class="compare-property" data-placement="top" data-toggle="tooltip" data-container="body" data-original-title="{LANG.detail_view_lage_img}">
									<i class="fa fa-photo"></i></span>
								</li>	
								</a>								
							</ul>
							<script type="text/javascript" data-show="after">
								$('.popup-photo-link1-{ROW.id}').click(function(e){
								e.preventDefault();
								$('#large-image-modal .modal-body').html( '<img width="100%" src="{ROW.thumb_large}" alt="{title_pro}" />' );
								});
							</script>								
						</figure>
					</div>
				</div>
				<div class="item-body table-cell">
					<div class="body-left table-cell">
						<div class="info-row">
							<div class="label-wrap hide-on-grid">			
							</div>		
							<h2 class="property-title" style="margin:5px 0 10px 0"><a title="{ROW.title}" href="{ROW.link}">{ROW.title}</a></h2>					
							<address class="property-address"><a title="{CAT}" href="{CATLINK}">{CAT}</a></address>                
							</div>
						<div class="info-row amenities hide-on-grid">					
							<!-- BEGIN: product_code --><p><address class="property-address">{LANG.productcode}: {ROW.product_code}</address></p><!-- END: product_code -->
							<p style="margin-top:12px"><address class="property-address">Xem: {ROW.hitstotal}</address></p>					
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
							<a title="{ROW.title}" href="{ROW.link}" class="btn btn-primary">{LANG.detail_product} <i class="fa fa-angle-right fa-right"></i></a>
						</div>
					</div>

					<div class="table-list full-width hide-on-list">
						<div class="cell">
							<div class="info-row amenities">
							<!-- BEGIN: product_code1 --><p style="margin-top:-8px"><address class="property-address">{LANG.productcode}: {ROW.product_code}</address></p><!-- END: product_code1 -->
							<p style="margin-top:12px"><address class="property-address">Xem: {ROW.hitstotal}</address></p>
							</div>
						</div>
						<div class="cell">
							<div class="phone">
								<a title="{ROW.title}" href="{ROW.link}" class="btn btn-primary"> {LANG.detail_product} <i class="fa fa-angle-right fa-right"></i></a>
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
		<!-- END: loop -->
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
<!-- END: row -->
<div class="msgshow" id="msgshow"></div>
<!-- END: main -->