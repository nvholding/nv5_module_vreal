<!-- BEGIN: form -->
<div class="page panel panel-default">
    <div class="panel-body">
		<h3 class="text-center" style="margin-bottom:20px">{LANG.search_title}</h3>
		<div id="formsearch">
			<form action="{NV_BASE_SITEURL}" method="get" name="frm_search1" onsubmit="return onsubmitsearch1();">
				<div class="row">
					<div class="col-xs-4">
						<select name="cata" id="cata1" class="selectpicker">
							<option value="0">{LANG.allcatagories}</option>
							<!-- BEGIN: loopcata -->
							<option {ROW.selected} value="{ROW.catid}">{ROW.xtitle}</option>
							<!-- END: loopcata -->
						</select>
					</div>
					<div class="col-xs-4">
						<select name="rid" id="rid1" class="selectpicker">
							<option value="0">{LANG.real_type_title}</option>
							<!-- BEGIN: loop_real_type -->
							<option {ROW.selected} value="{ROW.rid}">{ROW.title}</option>
							<!-- END: loop_real_type -->
						</select>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-4">
						<input onblur="this.placeholder='{LANG.price1}'" onfocus="this.placeholder=''" id="price11" type="text" class="form-control" value="{value_price1}" name="price1" placeholder="{LANG.price1}">
					</div>

					<div class="col-xs-4">
						<input onblur="this.placeholder='{LANG.price2}'" onfocus="this.placeholder=''" id="price21" type="text" class="form-control" value="{price2}" name="price2" placeholder="{LANG.price2}">	
					</div>
					<div class="col-xs-3">
					<select name="typemoney" id="typemoney1" class="selectpicker">
						<option value="0">{LANG.moneyunit}</option>
						<!-- BEGIN: typemoney -->
						<option {ROW.selected} value="{ROW.code}">{ROW.code}</option>
						<!-- END: typemoney -->
					</select>	
					</div>
				</div>
				
				<div class="form-group">
					<label>{LANG.keyword}</label>
					<input id="keyword1" type="text" value="{value_keyword}" name="keyword" class="form-control">
				</div>

				<div class="row text-center">
					<input type="button" class="btn btn-primary" name="submit" id="submit" value="{LANG.search}" onclick="onsubmitsearch1()">
				</div>
			</form>
		</div>
	</div>
</div>	
<!-- END: form -->
<!-- BEGIN: main -->
<div class="page panel panel-default">
    <div class="panel-body">
	<h3 class="text-center" style="margin-bottom:20px">{LANG.search_result}</h3>
	
<div class="row row-fluid"><div class="col-sm-12"><div class="vc_column-inner"><div class="wpb_wrapper">
	<div style="padding-top:0px;" class="houzez-module carousel-thumbs-grid caption-above carousel-module">
		<!-- BEGIN: items -->
		<div id="properties-carousel" class="col-sm-6">
			<div class="owl-stage-outer">
				<div class="owl-stage">
					<div class="owl-item cloned">
						<div class="item">
							<div class="figure-block">
								<figure class="item-thumb">
									<div class="label-wrap label-right hide-on-list">
										<span class="label-status label label-default"><a href="{CAT_LINK}" title="{CAT}">{CAT}</a></span>							                
									</div>
									<a class="hover-effect" href="{LINK}" title="{TITLE}">
										<img src="{IMG_SRC}" alt="{TITLE}" width="385" height="258">											
									</a>
									<ul class="actions hidden-xs">
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
											<div class="cap-price pull-left">
												<!-- BEGIN: price -->{product_price}<!-- END: price -->
												<!-- BEGIN: contact -->{LANG.price_contact}<!-- END: contact -->				
											</div>
											<ul class="actions">
											<a style="margin-right:5px" href="{LINK}"><li><span class="add_fav" data-placement="top" data-toggle="tooltip" data-container="body" data-original-title="{LANG.detail_product}"><i class="fa fa-link"></i></span></li></a>
											<a style="color:#fff" href="#" data-toggle="modal" data-target="#large-image-modal" class="popup-photo-link1-{ID}"><li><span class="compare-property" data-placement="top" data-toggle="tooltip" data-container="body" data-original-title="{LANG.detail_view_lage_img}">
											<i class="fa fa-photo"></i>
											</span></li></a>
											</ul>
										</figcaption>
										<figcaption class="detail-above detail">
											<div class="fig-title clearfix">
												<h3 class="pull-left"><a href="{LINK}" title="{TITLE}">{TITLE0}</a></h3>
											</div>
											<ul class="list-inline" style="float:left">
												<li class="cap-price">
												<!-- BEGIN: price1 -->{product_price}<!-- END: price1 -->
												<!-- BEGIN: contact1 -->{LANG.price_contact}<!-- END: contact1 -->	
												</li>
											</ul>
										</figcaption>
								</figure>
								<div class="detail-bottom detail">
									<h3><a href="{LINK}" title="{TITLE}">{TITLE0}</a></h3>
									<ul class="list-inline">										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END: items -->
	</div>
</div></div></div></div>
		
		<!-- BEGIN: pages -->
		<div class="pages">
			{generate_page}
		</div>
		<!-- END: pages -->
		<div class="msgshow" id="msgshow"></div>
	</div>
</div>
<!-- END: main -->