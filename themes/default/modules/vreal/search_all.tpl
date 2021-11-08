<!-- BEGIN: form -->
<div id="formsearch">
    <form action="{NV_BASE_SITEURL}" method="get" name="frm_search" onsubmit="return onsubmitsearch1();">
        <div class="row">
            <div class="col-xs-6">
                <select name="cata" id="cata1" class="form-control">
                    <option value="0">{LANG.allcatagories}</option>
                    <!-- BEGIN: loopcata -->
                    <option {ROW.selected} value="{ROW.catid}">{ROW.xtitle}</option>
                    <!-- END: loopcata -->
                </select>
            </div>
            <div class="col-xs-6">
                <select name="sourceid" id="sourceid1" class="form-control">
                    <option value="0">{LANG.source_title}</option>
                    <!-- BEGIN: loopsource -->
                    <option {ROW.selected} value="{ROW.sourceid}">{ROW.title}</option>
                    <!-- END: loopsource -->
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
<!-- END: form -->
<!-- BEGIN: main -->
<div id="products">
	<!-- BEGIN: items -->
    <div class="col-sm-6 col-md-{num}">
        <div class="thumbnail">
            <div style="height: {height}px">
                <a href="{LINK}" title="{TITLE}"><img src="{IMG_SRC}" alt="{TITLE}" title="{TITLE}" class="img-thumbnail" style="height:{height}px;width:{width}px;"></a>
            </div>
            <div class="caption text-center">
                <h3><a href="{LINK}" title="{TITLE}">{TITLE0}</a></h3>

    			<!-- BEGIN: adminlink -->
    			<p>{ADMINLINK}</p>
    			<!-- END: adminlink -->

			</div>
		</div>
	</div>
	<!-- END: items -->
</div>
<!-- BEGIN: pages -->
<div class="pages">
	{generate_page}
</div>
<!-- END: pages -->
<div class="msgshow" id="msgshow"></div>
<!-- BEGIN: tooltip_js -->
<script type="text/javascript">
    $(document).ready(function() {$("[data-rel='tooltip']").tooltip();});
</script>
<!-- END: tooltip_js -->
<!-- END: main -->