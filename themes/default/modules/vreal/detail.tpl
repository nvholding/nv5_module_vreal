<!-- BEGIN: main -->
<div id="detail">
	<div class="panel panel-default">
	    <div class="panel-body">
			<div class="col-md-24"> 
			    <div><h1>{TITLE}</h1></div>
				<div class="text-center">
				<!-- BEGIN: adminlink -->
                <p>{ADMINLINK}</p>
                <!-- END: adminlink -->
				</div>
                <div class="product_info">
                    <!-- BEGIN: source -->
                    <p class="location">
						{LANG.detail_source}: 
						<a href="{link_source}" title="{LANG.detail_source_search}">{source}</a>
					</p>
                    <!-- END: source -->
					
					<!-- BEGIN: price -->
					<p class="price">
						Giá tham khảo: <span class="{class_money}">{product_price}</span>
						<!-- BEGIN: discounts -->
						<br />
						<span class="money">{product_discounts}</span>
						<!-- END: discounts -->
					</p>
					<!-- END: price -->
					
					<!-- BEGIN: contact -->
					<p class="price">
						<span class="money">{LANG.price_contact}</span>
					</p>
					<!-- END: contact -->
					
					<!-- BEGIN: hometext2 -->
					<div class="border"></div>
					<div id="review-about">
					<h2 class="title-detail">{LANG.detail_hometext2}</h2>
						<div class="content_news">{hometext2}</div>
					</div>
					<!-- END: hometext2 -->
					
					<!-- BEGIN: address -->
					<div class="border"></div>
                    <div id="review-exterior">
						<h2 class="title-detail">{LANG.detail_product_address}</h2>
						<div class="content_news">{address}</div>
				   </div>
				   <!-- END: address -->
						
					<!-- BEGIN: promotional -->
					<div class="border"></div>
                    <div id="review-interior">
						<h2 class="title-detail">{LANG.detail_promotional}</h2>
						<div class="content_news">{promotional}</div>
					</div>
					<!-- END: promotional -->
					
					<div class="border"></div>
					<div id="review-amenities">
						<h2 class="title-detail">{LANG.detail_product}</h2>
						<div class="content_news">{DETAIL}</div>
					</div>

					<!-- BEGIN: warranty -->
					<div class="border"></div>
                    <div id="review-facilities">
						<h2 class="title-detail">{LANG.detail_warranty}</h2>
						<div class="content_news">{warranty}</div>
					</div>
					<!-- END: warranty -->

					<!-- BEGIN: note -->
					<div class="border"></div>
					<div id="review-general">
					<h2 class="title-detail">{LANG.cart_note}</h2>
					<div class="content_news">{note}</div>
					</div>
                    <!-- END: note -->
					
					<div class="border"></div>
					<div id="review-tskt"> 
						<h2 class="title-detail">Liên hệ</h2>
						<div class="row">
							<div class="col-md-24">
								[BLOCK_DETAIL_CONTACT]
							</div>
						</div>
					</div>

					<!-- BEGIN: other -->
					<div class="border"></div>
					<div id="review-relative" class="apartment_relative">
						<h2 class="title-detail">Dự án khác tương tự</h2>
						<div class="content_news">{OTHER}</div>	
					</div>
					<!-- END: other -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="msgshow" id="msgshow"></div>
<script type="text/javascript" src="{NV_BASE_SITEURL}themes/{TEMPLATE}/js/detail_nav.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".content_news img").toggleClass('img-thumbnail');
});
</script>
<!-- END: main -->