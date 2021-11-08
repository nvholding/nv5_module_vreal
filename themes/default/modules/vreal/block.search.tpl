<!-- BEGIN: main -->
<form id="search_form_shops" action="{NV_BASE_SITEURL}" method="get" role="form" name="frm_search" onsubmit="return onsubmitsearch();">
	<div class="form-group">
		<label>{LANG.keyword}</label>
		<input id="keyword" type="text" value="{value_keyword}" name="keyword" class="form-control input-sm">
	</div>
	
	<div class="form-group">
		<label>{LANG.catagories}</label>
		<select name="cata" id="cata" class="form-control input-sm">
			<option value="0">{LANG.select}</option>
			<!-- BEGIN: loopcata -->
			<option {ROW.selected} value="{ROW.catid}">{ROW.xtitle}</option>
			<!-- END: loopcata -->
		</select>
	</div>
	
	<div class="form-group">
		<label>{LANG.detail_source}</label>
		<select name="sourceid" id="sourceid" class="form-control input-sm">
			<option value="0">{LANG.select}</option>
			<!-- BEGIN: loopsource -->
			<option {ROW.selected} value="{ROW.sourceid}">{ROW.title}</option>
			<!-- END: loopsource -->
		</select>
	</div>
    
	<div class="text-center">
		<input type="button" name="submit" id="submit" value="{LANG.search}" onclick="onsubmitsearch()" class="btn btn-primary">
	</div>
</form>
<!-- END: main -->