<!-- BEGIN: main -->
<div class="widget widget-categories">
	<div class="widget-top"><h3 class="widget-title">{GLANG.new_real}</h3></div>  
	<div class="widget-body">	
		<!-- BEGIN: loop -->	
		<div class="media">
			<div class="media-left">
				<figure class="item-thumb">
					<a class="hover-effect" href="{ROW.link}" title="{ROW.title}" {ROW.target_blank}>
						<img src="{ROW.thumb}" alt="{ROW.title}" class="attachment-houzez-widget-prop size-houzez-widget-prop wp-post-image" width="150" height="110">								
					</a>
				</figure>
			</div>
			<div class="media-body">
				<h3 class="media-heading"><a class="hover-effect" href="{ROW.link}" title="{ROW.title}" {ROW.target_blank}>{ROW.title}</a></h3>
				<div class="amenities">
					<!-- BEGIN: price --><p style="margin-top:10px">{product_price} {PRICE_UNIT}</p><!-- END: price -->
					<!-- BEGIN: contact --><p style="margin-top:10px">{LANG.price_contact}<!-- END: contact -->
				</div>
			</div>
		</div>
		<!-- END: loop -->
	</div>
</div>	
<!-- END: main -->
