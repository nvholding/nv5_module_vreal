<!-- BEGIN: main -->
<div id="products">
	<!-- BEGIN: catalogs -->
	<div class="panel panel-default">
		<div class="title_home clear">
			<h3><a href="{LINK_CATALOG}" class="pro_title" title="{TITLE_CATALOG}"><i class="fa fa-align-left" aria-hidden="true"></i>&nbsp;<span>{TITLE_CATALOG}</span></a></h3>
		</div>
		<div class="panel-body rows-items">
			<!-- BEGIN: items -->
            <div class="col-sm-6 col-md-{num}">
                <div class="thumbnail">
                    <div style="height: auto">
                        <a href="{LINK}" title="{TITLE}"><img src="{IMG_SRC}" alt="{TITLE}" <!-- BEGIN: tooltip_js -->data-toggle="tooltip" data-placement="bottom" data-rel="tooltip" data-html="true" <!-- END: tooltip_js -->title="{TITLE}" class="img-thumbnail custom_tooltip" style="height:{height}px;width:{width}px;"></a>
                    </div>
					<div class="caption text-center">
    					<h3><a href="{LINK}" title="{TITLE}">{TITLE0}</a></h3>

                        <!-- BEGIN: product_code -->
                        <p class="label label-default">{PRODUCT_CODE}</p>
                        <!-- END: product_code -->

                        <!-- BEGIN: adminlink -->
                        <p>{ADMINLINK}</p>
                        <!-- END: adminlink -->

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

                        <!-- BEGIN: compare -->
                        <p><input type="checkbox" value="{ID}"{ch} onclick="nv_compare({ID});" id="compare_{ID}"/><a href="#" onclick="nv_compare_click();" >&nbsp;{LANG.compare}</a></p>
                        <!-- END: compare -->

                        <div class="clearfix">
                            <!-- BEGIN: order -->
                            <a href="javascript:void(0)" id="{ID}" title="{TITLE}" onclick="cartorder(this)"><button type="button" class="btn btn-primary btn-xs">{LANG.add_product}</button></a>
                            <!-- END: order -->
							<a href="{LINK}" title="{TITLE}" ><button type="button" class="btn btn-primary btn-xs">{LANG.detail_product}</button></a>
                        </div>
					</div>
				</div>
			</div>
			<!-- END: items -->
		</div>
	</div>
	<!-- END: catalogs -->
</div>
<div class="msgshow" id="msgshow">&nbsp;</div>
<!-- END: main -->