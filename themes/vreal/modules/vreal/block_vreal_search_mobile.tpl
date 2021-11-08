<!-- BEGIN: main -->
<form action="{NV_BASE_SITEURL}" method="get" role="form" name="frm_search2" onsubmit="return onsubmitsearch2('{MODULE_NAME}');">
	<div class="single-search-wrap">
		<div class="single-search-inner advance-btn">
			<button class="table-cell text-left" type="button"><i class="fa fa-gear"></i></button>
		</div>
		<div class="single-search-inner single-search">
			<input onblur="this.placeholder='{LANG.keyword} ...'" onfocus="this.placeholder=''" id="keyword2" type="text" class="form-control" value="{value_keyword}" name="keyword" placeholder="{LANG.keyword} ...">
		</div>
		<div class="single-search-inner single-seach-btn">
			<button class="table-cell text-right" type="submit"><i class="fa fa-search"></i></button>
		</div>
	</div>

	<div class="advance-fields">
		<div class="row">
		
			<div class="col-sm-3 col-xs-6">
				<div class="form-group">
					<input onblur="this.placeholder='{LANG.price1}'" onfocus="this.placeholder=''" id="price12" type="text" class="form-control" value="{value_price1}" name="price1" placeholder="{LANG.price1}">
				</div>
			</div>
			<div class="col-sm-3 col-xs-6">
				<div class="form-group">
					<input onblur="this.placeholder='{LANG.price2}'" onfocus="this.placeholder=''" id="price22" type="text" class="form-control" value="{price2}" name="price2" placeholder="{LANG.price2}">
				</div>
			</div>		
			<div class="col-sm-3 col-xs-6">
				<div class="form-group">
					<select name="typemoney" id="typemoney2" class="selectpicker bs-select-hidden">
						<option value="0">{LANG.moneyunit}</option>
						<!-- BEGIN: typemoney -->
						<option {ROW.selected} value="{ROW.code}">{ROW.code}</option>
						<!-- END: typemoney -->
					</select>
				</div>
			</div>		
			<div class="col-sm-3 col-xs-6">
				<div class="form-group">
					<select name="cata" id="cata2" class="selectpicker bs-select-hidden">
						<option value="0">{LANG.catagories}</option>
						<!-- BEGIN: loopcata -->
						<option {ROW.selected} value="{ROW.catid}">{ROW.xtitle}</option>
						<!-- END: loopcata -->
					</select>
				</div>
			</div>		
			<div class="col-sm-3 col-xs-6">
				<div class="form-group">
					<select name="rid" id="rid2" class="selectpicker bs-select-hidden" style="float:left">
						<option value="0">{LANG.detail_real_type}</option>
						<!-- BEGIN: loop_real_type -->
						<option {ROW.selected} value="{ROW.rid}">{ROW.title}</option>
						<!-- END: loop_real_type -->
					</select>	
				</div>
			</div>	
			
            <div class="col-sm-12 col-xs-12">
				<button name="submit" id="submit" class="btn btn-secondary btn-block houzez-theme-button" onclick="onsubmitsearch2('{MODULE_NAME}')" ><i class="fa fa-search pull-left"></i> {LANG.search}</button>
            </div>	
			
		</div>
	</div>
</form>
<!-- END: main -->