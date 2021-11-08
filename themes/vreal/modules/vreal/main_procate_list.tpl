<!-- BEGIN: main -->
<div id="products">
	<!-- BEGIN: catalogs -->
	<div class="panel panel-default">
		<div class="title_home">
			<h2><a href="{LINK_CATALOG}" title="{TITLE_CATALOG}">{TITLE_CATALOG}</a></h2>
		</div>
		<div class="panel-body rows-items">
			<!-- BEGIN: items -->
            <div class="col-sm-24 col-md-24 {CLS}">
                <div class="col-md-8">
                    <div style="height: auto">
                        <a href="{LINK}" title="{TITLE}"><img src="{IMG_SRC}" alt="{TITLE}" <!-- BEGIN: tooltip_js -->data-toggle="tooltip" data-placement="bottom" data-rel="tooltip" data-html="true" <!-- END: tooltip_js -->title="{TITLE}" class="img-thumbnail custom_tooltip" style="height:{height}px;width:{width}px;"></a>
                    </div>
				</div>
				<div class="col-md-16 caption text-center">
					<h3><a href="{LINK}" title="{TITLE}">{TITLE0}</a></h3>
	    			<p class="text-justify">{hometext}</p>

					<!-- BEGIN: product_code -->
					<p class="label label-default">{PRODUCT_CODE}</p>
					<!-- END: product_code -->

					<!-- BEGIN: price -->
					<p class="price">
						<span class="{class_money}">{product_price} {money_unit}</span>
						<!-- BEGIN: discounts -->
						<br />
						<span class="money">{product_discounts} {money_unit}</span>
						<!-- END: discounts -->
					</p>
					<!-- END: price -->

					<!-- BEGIN: contact -->
					<p class="price">
						<span class="money">{LANG.price_contact}</span>
					</p>
					<!-- END: contact -->
				</div>
				<!-- BEGIN: adminlink -->
				<p class="pull-right">{ADMINLINK}</p>
				<!-- END: adminlink -->
			</div>
			<!-- END: items -->
		</div>
	</div>
	<!-- END: catalogs -->
</div>
<div class="msgshow" id="msgshow">&nbsp;</div>
<!-- END: main -->