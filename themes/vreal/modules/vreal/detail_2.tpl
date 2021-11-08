<!-- BEGIN: main -->
<div class="big-header-img" style="background-image:url({SRC_PRO_LAGE});background-repeat:no-repeat;background-size:cover;background-attachment:scroll;background-position:0 0;">
	<div class="tag-description-wrap" title="{TITLE}">
		<div class="tag-overlay">
		<!-- BEGIN: realtitle --><p align="center" class="tag-title">{realtitle}</p><!-- END: realtitle -->
		<!-- BEGIN: realinfo --><p class="tag-description">{realinfo}</p><!-- END: realinfo -->
		</div>
	</div>

</div>

<div class="row">
	<section id="detail">
		<h1 class="item-title text-center">{TITLE}</h1>
		<div class="info text-center" style="margin:-10px 0 15px 0; font-size:14px">
			<span class="visible-lg-inline"><i class="fa fa-unlink"></i>{LANG.productcode}: {PRODUCT_CODE} </span>
			<i class="fa fa-car"></i>{LANG.catagories}: <a title="{CAT}" href="{CATLINK}">{CAT}</a> 
			<!-- BEGIN: real_type --><i class="fa fa-map-o"></i>{LANG.detail_real_type}: <a title="{REAL_TYPE}" href="{REAL_TYPE_LINK}">{REAL_TYPE}</a><!-- END: real_type --><span class="visible-lg-inline">
			<!-- BEGIN: real_block --><i class="fa fa-flag-o"></i>{LANG.real_block}: <!-- BEGIN: loop --><a title="{REAL_BLOCK}" href="{REAL_BLOCK_LINK}">{REAL_BLOCK}</a>{SLASH}<!-- END: loop --><!-- END: real_block -->	
			<i class="fa fa-calendar"></i>{LANG.detail_dateup}: {DATE_UP}</span>
			<i class="fa fa-send-o"></i>{LANG.detail_num_view}: {NUM_VIEW}
		</div>
		<div class="adminlink text-center"><!-- BEGIN: adminlink --><p>{ADMINLINK}</p><!-- END: adminlink -->
		<div class="content_news text-justify">{DETAIL}
			<div class="clearfix"></div>
		</div>		
	</section>
</div>

<!-- BEGIN: hometext -->
<div class="row">
	<section id="overview">
		<div class="overlay">
			<h3 class="item-title text-center">{LANG.content_overview}</h3>
			<div class="content_news text-justify">{hometext}
				<div class="clearfix"></div>
			</div>
		</div>
	</section>
</div>
<!-- END: hometext -->

<!-- BEGIN: address -->
<div class="row">
	<section id="location">
		<h3 class="item-title text-center">{LANG.detail_product_address}</h3>
		<div class="content_news text-justify">{address}
			<div class="clearfix"></div>
		</div>
	</section>
</div>
<!-- END: address -->

<!-- BEGIN: design -->
<div class="row">
	<section id="design">
		<h3 class="item-title text-center">{LANG.content_design}</h3>
		<div class="content_news_1">{design}
			<div class="clearfix"></div>
		</div>
	</section>
</div>
<!-- END: design -->

<!-- BEGIN: utility -->
<div class="row">
	<section id="utility">
		<div class="overlay">
			<h3 class="item-title text-center">{LANG.content_application}</h3>
			<div class="content_news text-justify">{utility}
				<div class="clearfix"></div>
		</div>
		</div>
	</section>
</div>
<!-- END: utility -->

<!-- BEGIN: policy -->
<div class="row">
<section id="policy">
<div class="overlay">
<h3 class="item-title text-center">{LANG.content_salepolicy}</h3>
<div class="content_news text-justify">{policy}
<div class="clearfix"></div>
</div>
</div>
</section>
</div>
<!-- END: policy -->
	
<!-- BEGIN: support -->
<div class="row">
	<section id="contact">
		<div class="col-md-6">
			<h3 class="item-title">{LANG.order_contact}</h3>
			<div class="content_news">{support}
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="col-md-6">
			[VREAL_CONTACT]
		</div>		
	</section>
</div>
<!-- END: support -->					
				
<div class="msgshow" id="msgshow"></div>
<div id="detail2Modal" class="modal">
	<span class="closex" onclick="document.getElementById('detail2Modal').style.display='none'">&times;</span>
	<img class="modal-content" id="img01">
	<div id="caption"></div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$(".content_news img").toggleClass('img-thumbnail');
});

// Modal image
var modal = document.getElementById('detail2Modal');
var img = $('.page-content .content_news .image-left');
var modalImg = $("#img01");
var captionText = document.getElementById("caption");
$('.page-content .content_news .image-left').click(function(){
    modal.style.display = "block";
    var newSrc = this.src;
    modalImg.attr('src', newSrc);
    captionText.innerHTML = this.alt;
});
var span = document.getElementsByClassName("closex")[0];
	span.onclick = function() {
	modal.style.display = "none";
} 
$(document).keydown(function(event) { 
    if (event.keyCode == 27) { 
       $('#detail2Modal').hide();
    }
});
 
// Magnific gallery
	jQuery(function($){
				$("#slideshow, #slideshow").magnificPopup({
					fixedContentPos: false,			
					delegate: "a",
					type: "image",
					mainClass: "mfp-no-margins mfp-with-zoom",
					gallery:{
						enabled:true
					},
					image: {
						verticalFit: true
					},
					zoom: {
						enabled: true,
						duration: 300
					}
				});
			})
			jQuery(function($) {
				SqueezeBox.initialize({});
				SqueezeBox.assign($('a.modal').get(), {
					parse: 'rel'
				});
			});

			window.jModalClose = function () {
				SqueezeBox.close();
			};
</script>
<!-- END: main -->