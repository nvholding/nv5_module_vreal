<!-- BEGIN: main -->
<form id="search_form_shops" action="{NV_BASE_SITEURL}" method="get" role="form" name="frm_search" onsubmit="return onsubmitsearch('{MODULE_NAME}');">
	<div class="form-group search-long">
		<div class="search">
			<div class="input-search input-icon">
				<input onblur="this.placeholder='{LANG.keyword} ...'" onfocus="this.placeholder=''" id="keyword" type="text" class="form-control" value="{value_keyword}" name="keyword" placeholder="{LANG.keyword} ...">
			</div>	
			
			<div class="search-price">
				<input onblur="this.placeholder='{LANG.price1}'" onfocus="this.placeholder=''" style="border-radius:0;width:100px;" id="price1" type="text" class="form-control" value="{value_price1}" name="price1" placeholder="{LANG.price1}">
			</div>
			
			<div class="search-price">
				<input onblur="this.placeholder='{LANG.price2}'" onfocus="this.placeholder=''" style="border-radius:0;width:100px;" id="price2" type="text" class="form-control" value="{price2}" name="price2" placeholder="{LANG.price2}">	
			</div>
			
			<select name="typemoney" id="typemoney" class="selectpicker bs-select-hidden">
				<option value="0">{LANG.moneyunit}</option>
				<!-- BEGIN: typemoney -->
				<option {ROW.selected} value="{ROW.code}">{ROW.code}</option>
				<!-- END: typemoney -->
			</select>	
			
			<select name="cata" id="cata" class="selectpicker bs-select-hidden">
				<option value="0">{LANG.catagories}</option>
				<!-- BEGIN: loopcata -->
				<option {ROW.selected} value="{ROW.catid}">{ROW.xtitle}</option>
				<!-- END: loopcata -->
			</select>

			<select name="rid" id="rid" class="selectpicker bs-select-hidden">
				<option value="0">{LANG.real_type}</option>
				<!-- BEGIN: loop_real_type -->
				<option value="{ROW.rid}"{ROW.selected}>{ROW.title}</option>
				<!-- END: loop_real_type -->
			</select>				
			
		</div>
        <div class="search-btn">
			<button name="submit" id="submit" class="btn btn-secondary" onclick="onsubmitsearch('{MODULE_NAME}')" >{LANG.search}</button>
        </div>
    </div>
</form>
<!-- END: main -->