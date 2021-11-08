<!-- BEGIN: main -->
<div id="products" class="clearfix">
    <!-- BEGIN: displays -->
    <div class="form-group form-inline pull-right">
        <label class="control-label">{LANG.displays_product}</label>
        <select name="sort" id="sort" class="form-control input-sm" onchange="nv_chang_price();">
            <!-- BEGIN: sorts -->
                <option value="{key}" {se}> {value}</option>
            <!-- END: sorts -->
        </select>
    </div>
    <div class="clearfix">&nbsp;</div>
    <!-- END: displays -->

    <!-- BEGIN: items -->
	<div class="item-wrap infobox_trigger item-relaxing-apartment-ocean-view">
		<div class="property-item table-list">
			<div class="table-cell">
				<div class="figure-block">
					<figure class="item-thumb">
					 
						<div class="label-wrap label-right hide-on-list">
							<!-- BEGIN: real_block -->
							<span class="label-status label label-default"><a href="{REAL_BLOCK_LINK}" title="{REAL_BLOCK}">{REAL_BLOCK}</a></span>		
							<!-- END: real_block -->								
						</div>

						<div class="price hide-on-list">
							<span class="item-price">
								<!-- BEGIN: price -->{product_price} {pro_unit}<!-- END: price -->
								<!-- BEGIN: contact -->{LANG.price_contact}<!-- END: contact -->									
							</span>
						</div>
						<a class="hover-effect" href="{LINK}" title="{TITLE}">
							<img style="width:100%;height:100%;object-fit:cover" src="{IMG_SRC}" class="size-houzez-property-thumb-image" alt="{TITLE}" width="385" height="258">                   
						</a>
						<ul class="actions">
							<a style="margin-right:5px" href="{LINK}"><li><span class="add_fav" data-placement="top" data-toggle="tooltip" data-container="body" data-original-title="{TITLE}"><i class="fa fa-link"></i></span></li></a>
							<a style="color:#fff" href="#" data-toggle="modal" data-target="#large-image-modal" class="popup-photo-link-{ID}">
							<li><span class="compare-property" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="Xem ảnh lớn">
								<i class="fa fa-photo"></i>
							</span></li></a>
						</ul>
						<script type="text/javascript" data-show="after">
							$('.popup-photo-link-{ID}').click(function(e){
							e.preventDefault();
							$('#large-image-modal .modal-body').html( '<img width="100%" src="{IMG_SRC_LARGE}" alt="{TITLE}" />' );
							});
						</script>				
					</figure>
				</div>
			</div>
			<div class="item-body table-cell">
				<div class="body-left table-cell">
					<div class="info-row">
						<div class="label-wrap hide-on-grid">
							<span class="label-status label label-default"> 
							<!-- BEGIN: real_block1 -->
							<span class="label-status label label-default"><a href="{REAL_BLOCK_LINK}" title="{REAL_BLOCK}">{REAL_BLOCK}</a></span>		
							<!-- END: real_block1 -->							
						</div>
						<h2 class="property-title"><a href="{LINK}" title="{TITLE}">{TITLE0}</a></h2>
						<address class="property-address">
						<!-- BEGIN: real_type --><a href="{REAL_TYPE.link}" title="{REAL_TYPE.title}">{REAL_TYPE.title}</a><!-- END: real_type -->
						</address>    
					</div>
					<div class="info-row amenities hide-on-grid">
						<!-- BEGIN: product_code --><p><span>{LANG.productcode}: {ROW.product_code}</span></p><!-- END: product_code -->
						
					</div>

					<div class="info-row date hide-on-grid">
						<!-- BEGIN: author --><p class="prop-user-agent"><i class="fa fa-user"></i> {author}</p><!-- END: author -->
						<p><i class="fa fa-calendar"></i>{publtime}</p>
					</div>
					
				</div>
				<div class="body-right table-cell hidden-gird-cell">

					<div class="info-row price">
					<span class="item-price">
					<!-- BEGIN: price1 -->{product_price} {pro_unit}<!-- END: price1 -->
					<!-- BEGIN: contact1 -->{LANG.price_contact}<!-- END: contact1 -->	
					</span>
					</div>

					<div class="info-row phone text-right">
						<a title="{TITLE}" href="{LINK}" class="btn btn-primary">{LANG.detail_product} <i class="fa fa-angle-right fa-right"></i></a>
					</div>
				</div>

				<div class="table-list full-width hide-on-list">
					<div class="cell">
						<div class="info-row amenities">
							<!-- BEGIN: product_code1 --><p><span>{LANG.productcode}: {ROW.product_code}</span></p><!-- END: product_code1 -->
							<p><span>Xem: {hitsotal}</span></p>
						</div>
					</div>
					<div class="cell">
						<div class="phone">
							<a title="{TITLE}" href="{LINK}" class="btn btn-primary"> {LANG.detail_product} <i class="fa fa-angle-right fa-right"></i></a>
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
    <!-- END: items -->
</div>
<!-- BEGIN: pages -->
<div class="text-center">
    {generate_page}
</div>
<!-- END: pages -->
<div class="msgshow" id="msgshow">&nbsp;</div>
<!-- END: main -->