<!-- BEGIN: main -->
<div class="widget widget-categories">
	<div class="widget-top"><h3 class="widget-title">{GLANG.tophits}</h3></div>  
	<div class="widget-body">
		<!-- BEGIN: loop -->
		<div class="media">
			<div class="owl-item" style="width:300px;">
			<div class="item">
					<figure class="item-thumb">
					<span style="cursor:pointer" title="{ROW.cat}" class="label-featured label label-success" onclick="location.href='{ROW.cat_link}'">{ROW.cat}</span>
					<a class="hover-effect" href="{ROW.link}" title="{ROW.title}" {ROW.target_blank}>
						<img src="{ROW.thumb}" alt="{ROW.title}" width="385" height="235">
					</a>
					<figcaption class="thumb-caption">
						<div class="pull-left" style="margin: 0 0 5px 5px;width:60%"> 
							<span class="text-left" onMouseOver="this.style.color='#0F0'" onMouseOut="this.style.color='#fff'" onclick="location.href='{ROW.link}'" style="width:100%;color:#fff;float:left;font-size:13px;cursor:pointer;overflow:hidden;white-space:nowrap;text-overflow:ellipsis" title="{ROW.title}">{ROW.title}</span>
						</div>	
						<div class="pull-right hidden-xs" style="margin: 0 0 5px 5px;"> 
							<span style="color:#fff;float:right">
							<!-- BEGIN: price -->{product_price}<!-- END: price -->
							<!-- BEGIN: contact -->{LANG.price_contact}<!-- END: contact -->	
							</span>
						</div>							
					</figcaption>
					</figure>

			</div></div>	
		</div>	
		<!-- END: loop -->	
	</div>
</div>
<!-- END: main -->