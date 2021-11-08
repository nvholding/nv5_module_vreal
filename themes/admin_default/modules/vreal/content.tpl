<!-- BEGIN: main -->
<!-- BEGIN: error -->
<div class="alert alert-danger">{error}</div>
<!-- END: error -->
<link rel="stylesheet" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.css">
<script type="text/javascript">var inrow = '{inrow}';</script>
<form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
	<input type="hidden" value="1" name="save">
	<input type="hidden" value="{rowcontent.id}" name="id">
	<div class="row">
		<div class="col-sm-24 col-md-18">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>{LANG.content_overview}</strong></div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group">
							<div class="col-md-4 control-label">{LANG.name} <span class="require">(*)</span></div>
							<div class="col-md-20">
								<input type="text" maxlength="255" value="{rowcontent.title}" name="title" id="idtitle" class="form-control" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">{LANG.alias}</label>
							<div class="col-md-20">
								<div class="input-group">
									<input class="form-control" name="alias" type="text" id="idalias" value="{rowcontent.alias}"/>
									<span class="input-group-btn">
										<button class="btn btn-info" type="button" onclick="get_alias('content', {rowcontent.id});">
											<i class="fa fa-refresh fa-lg">&nbsp;</i>
										</button>
									</span>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<label class="col-md-4 control-label">{LANG.content_homeimg}</label>
						<div class="col-md-20">
							<div class="input-group">
								<input class="form-control" type="text" name="homeimg" id="homeimg" value="{rowcontent.homeimgfile}"/>
								<span class="input-group-btn">
									<button class="btn btn-info" type="button" name="selectimg">
										<i class="fa fa-image fa-lg">&nbsp;</i>
									</button>
								</span>
							</div>
							<input placeholder="{LANG.content_homeimgalt}" class="form-control margin-top-lg" type="text" maxlength="255" value="{rowcontent.homeimgalt}" name="homeimgalt" style="width:100%" />
						</div>
						<div class="col-md-6 margin-top-lg">
							<input type="button" class="btn btn-info" onclick="nv_add_otherimage();" value="{LANG.add_otherimage}">
						</div>					
					</div>
					<div class="row" id="otherimage">
						<!-- BEGIN: otherimage -->
						<div class="input-group margin-bottom-lg">
							<input value="{DATAOTHERIMAGE.value}" name="otherimage[]" id="otherimage_{DATAOTHERIMAGE.id}" class="form-control" maxlength="255">
							<span class="input-group-btn">
								<button class="btn btn-info" type="button" name="selectfile" onclick="nv_open_browse( '{NV_BASE_ADMINURL}index.php?{NV_NAME_VARIABLE}=upload&popup=1&area=otherimage_{DATAOTHERIMAGE.id}&path={NV_UPLOADS_DIR}/{module_name}&currentpath={CURRENT}&type=file', 'NVImg', 850, 500, 'resizable=no,scrollbars=no,toolbar=no,location=no,status=no' ); return false; ">
									<i class="fa fa-image fa-lg">&nbsp;</i>
								</button>
							</span>
						</div>
						<!-- END: otherimage -->					
					</div>
					
				</div>
			</div>
			<div class="panel panel-default google-map none-apartment">
				<div class="panel-heading"><strong>Google Map</strong></div>	
				<div class="panel-body">					
					<div class="form-group">
						<label class="control-label col-md-4">{LANG.paddress}</label>
						<div class="col-sm-20">
							<div class="row">
								<div class="col-xs-24">
									<input type="text" class="form-control" name="config_company_address" id="config_company_address" value="{GMAP_AD}" />
								</div>	
							</div>	
							<div class="row">								
								<div class="col-xs-24" style="display:none">
									<select name="config_company_showmap" id="config_company_mapshow" class="form-control" onchange="return controlMap(true);">
										<option value="0">Not Show</option>
										<option value="1" selected="selected">Show</option>
									</select>
								</div>							
							</div>
						</div>
					</div>							
					<div class="form-group">	
						<label class="control-label col-md-4">{LANG.caddress}</label>
						<div class="col-sm-20">
							<div class="row">
								<div class="col-xs-24">
									<input type="text" class="form-control" name="caddress" value="{rowcontent.caddress}" />
								</div>	
							</div>	
						</div>						
					</div>				
					<div class="form-group">								
						<label class="col-md-4 control-label">{LANG.streetview}</label>
						<div class="col-md-8">
							<input type="text" maxlength="250" value="{rowcontent.street}" name="street" class="form-control" placeholder="{LANG.streetview_tips}" />
						</div>								
					</div>		
					<div id="config_company_maparea" class="col-md-24" style="padding:20px">
						<div id="config_company_mapcanvas" style="width:100%"></div>
						<div class="row form-group" style="margin-top: 20px">
							<div class="col-xs-6">
								<div class="input-group">
									<span class="input-group-addon">L</span>
									<input type="text" class="form-control" name="config_company_mapcenterlat" id="config_company_mapcenterlat" value="{GMAP_CL}" readonly="readonly" />
								</div>
							</div>
							<div class="col-xs-6">
								<div class="input-group">
									<span class="input-group-addon">N</span>
									<input type="text" class="form-control" name="config_company_mapcenterlng" id="config_company_mapcenterlng" value="{GMAP_CN}" readonly="readonly" />
								</div>
							</div>
							<div class="col-xs-6">
								<div class="input-group">
									<span class="input-group-addon">L</span>
									<input type="text" class="form-control" name="config_company_maplat" id="config_company_maplat" value="{GMAP_L}" readonly="readonly" />
								</div>
							</div>
							<div class="col-xs-6">
								<div class="input-group">
										<span class="input-group-addon">N</span>
										<input type="text" class="form-control" name="config_company_maplng" id="config_company_maplng" value="{GMAP_N}" readonly="readonly" />
								</div>
							</div>
						</div>
						<div class="row m-bottom">
							<div class="col-xs-12">
								<div class="input-group">
									<span class="input-group-addon">Z</span>
									<input type="text" class="form-control" name="config_company_mapzoom" id="config_company_mapzoom" value="{GMAP_Z}" readonly="readonly" />
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>			
																
			<div class="panel panel-default">
				<div class="panel-body">						
					<ul class="nav nav-tabs">					
					  <li class="active"><a data-toggle="tab" href="#hometext"><strong>{LANG.content_hometext}</span></strong></a></li>							
					  <li class="apartment"><a data-toggle="tab" href="#address"><strong>{LANG.content_address}</strong></a></li>					  				
					  <li class="apartment"><a data-toggle="tab" href="#design"><strong>{LANG.content_design}</strong></a></li>					  
					  <li class="apartment"><a data-toggle="tab" href="#utility"><strong>{LANG.content_utility}</strong></a></li>					  
					  <li class="apartment"><a data-toggle="tab" href="#policy"><strong>{LANG.content_policy}</strong></a></li>	
					  <li><a data-toggle="tab" href="#bodytext"><strong>{LANG.content_bodytext}</span></strong></a></li>								  
					  <li><a data-toggle="tab" href="#support"><strong>{LANG.content_support}</strong></a></li>							  
					</ul>	
					
					<div class="tab-content">					
						<div id="hometext" class="tab-pane fade in active">
							<div style="padding:2px; background:#CCCCCC; margin:0; display:block; position:relative">
							{edit_hometext}
							</div>	
						</div>
						<div id="address" class="tab-pane fade">
							<div style="padding:2px; background:#CCCCCC; margin:0; display:block; position:relative">
							{edit_address}
							</div>
						</div>
						<div id="design" class="tab-pane fade">
							<div style="padding:2px; background:#CCCCCC; margin:0; display:block; position:relative">
							{edit_design}
							</div>
						</div>
						<div id="utility" class="tab-pane fade">
							<div style="padding:2px; background:#CCCCCC; margin:0; display:block; position:relative">
							{edit_utility}
							</div>
						</div>
						<div id="policy" class="tab-pane fade">
							<div style="padding:2px; background:#CCCCCC; margin:0; display:block; position:relative">
							{edit_policy}
							</div>
						</div>
						<div id="bodytext" class="tab-pane fade">
							<div style="padding:2px; background:#CCCCCC; margin:0; display:block; position:relative">
							{edit_bodytext}
							</div>
						</div>								
						<div id="support" class="tab-pane fade">
							<div style="padding:2px; background:#CCCCCC; margin:0; display:block; position:relative">
							{edit_support}
							</div>
						</div>							
					</div>
				</div>
			</div>
			<div class="panel panel-default apartment">
				<div class="panel-heading"><strong>{LANG.site_custom_tag}</strong></div>
				<div class="panel-body">
					<div class="form-group">
						<div class="col-md-4" style="padding-bottom: 10px">
							<label class="control-label">{LANG.realtitle}</label>
						</div>
						<div class="col-md-10">
							<input type="text" maxlength="250" value="{rowcontent.realtitle}" name="realtitle" class="form-control" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-24" style="padding-bottom: 10px">
							<label class="control-label">{LANG.realinfo}</label>
						</div>
						<div class="col-md-24">
							{edit_realinfo}
						</div>
					</div>
				</div>
			</div>			
		</div>
	
		<div class="col-sm-24 col-md-6">	
			<div class="panel panel-default">
				<div class="panel-heading"><strong>{LANG.content_product}</strong></div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group">
							<div class="col-xs-10">
								<label>{LANG.content_cat}</label>
							</div>
							<div class="col-xs-14">
								<select class="form-control" name="catid" onchange="nv_getgroup(this)">
									<!-- BEGIN: rowscat -->
									<option value="{catid_i}" {select} >{xtitle_i} {title_i}</option>
									<!-- END: rowscat -->
								</select>																		
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-xs-10">
								<label>{LANG.content_rid}</label>
							</div>
							<div class="col-xs-14">
								<select class="form-control" name="rid">{rid}</select>									
							</div>
						</div>
					</div>							
					<div class="row">
						<div class="form-group">
							<div class="col-xs-10">
								<label>{LANG.content_product_code}</label>
							</div>
							<div class="col-xs-14">
								<input class="form-control" name="product_code" type="text" value="{rowcontent.product_code}" maxlength="255">						
							</div>
						</div>
					</div>		
					<div class="row">
						<div class="form-group">
							<div class="col-xs-10">
								<label>{LANG.prounit}</label>
							</div>
							<div class="col-xs-14">
								<select class="form-control" name="product_unit">
									<!-- BEGIN: rowunit -->
									<option value="{uid}" {uch}>{utitle}</option>
									<!-- END: rowunit -->
								</select>																
							</div>
						</div>
					</div>								
					<div class="row">
						<div class="form-group">
							<div class="col-xs-10">
								<label>{LANG.content_product_product_price}</label>
							</div>
							<div class="col-xs-14">
								<input class="form-control" type="text" maxlength="50" value="{rowcontent.product_price}" name="product_price" onkeyup="this.value=FormatNumber(this.value);" id="f_money">						
							</div>
						</div>
					</div>								
					<div class="row">
						<div class="form-group">
							<div class="col-xs-10">
								<label>{LANG.content_product_money_unit}</label>
							</div>
							<div class="col-xs-14">
								<select class="form-control" name="money_unit">
									<!-- BEGIN: currency -->
									<option value="{MON.code}" {MON.select}>{MON.currency}</option>
									<!-- END: currency -->
								</select>															
							</div>
						</div>
					</div>						
					<div style="margin: 5px 0 10px 0;">
						<input type="checkbox" name="showprice" value="1" {ck_showprice}/>
						<label>{LANG.content_showprice}</label>
					</div>					
				</div>
			</div>	
		
			<div class="panel panel-default">
				<div class="panel-heading"><strong>{LANG.content_property}</strong></div>
					<div class="panel-body">
						<div style="margin: 5px 0 10px 0;">
							<input id="property" type="checkbox" name="property" value="1" {ck_property}>
							<label>{LANG.is_property}</label>
						</div>
						
					<div class="none-apartment">
						<div class="row">
							<div class="form-group">
								<div class="col-xs-12">
									<input type="text" maxlength="250" value="{prop_area}" name="prop_area" class="form-control" placeholder="{LANG.content_area}">
								</div>
								<div class="col-xs-12">
									<input type="text" maxlength="250" value="{prop_bedr}" name="prop_bedr" class="form-control" placeholder="{LANG.bed}">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-xs-12">
									<input type="text" maxlength="250" value="{prop_floor}" name="prop_floor" class="form-control" placeholder="{LANG.floorth}">
								</div>		
								<div class="col-xs-12">
									<input type="text" maxlength="250" value="{prop_wc}" name="prop_wc" class="form-control" placeholder="{LANG.toilet}">
								</div>								
							</div>
						</div>						
						<div class="row">
							<div class="form-group">
								<div class="col-xs-12">
									<input type="text" maxlength="250" value="{prop_front}" name="prop_front" class="form-control" placeholder="{LANG.road}">
								</div>
								<div class="col-xs-12">
									<input type="text" maxlength="250" value="{prop_dir}" name="prop_dir" class="form-control" placeholder="{LANG.direction}">
								</div>
							</div>
						</div>							
					</div>					
				</div>
			</div>						
			<div id="layout_func" class="panel panel-default">
				<div class="panel-heading"><strong>Layout</strong></div>
				<div class="panel-body">
					<div class="row">
						<div class="form-group">
							<div class="col-xs-10">
								<label>{LANG.pick_layout}</label>
							</div>
							<div class="col-xs-14">
								<select name="layout_func" class="form-control">
									<option value="0">None</option>
									<!-- BEGIN: layout_func -->
									<option value="{LAYOUT_FUNC.key}"{LAYOUT_FUNC.selected}>{LAYOUT_FUNC.key}</option>
									<!-- END: layout_func -->
								</select>														
							</div>
						</div>
					</div>					
				</div>
			</div>				
			<!-- BEGIN:listgroup -->
			<div class="panel panel-default">
				<div class="panel-heading"><strong>{LANG.content_group}</strong></div>
				<div class="panel-body">
					<ul style="margin:0" id="listgroupid"></ul>
				</div>
			</div>
			<!-- END:listgroup -->
			<!-- BEGIN:real_block -->
			<div class="panel panel-default">
				<div class="panel-heading"><strong>{LANG.content_block}</strong></div>
				<div class="panel-body">
					{row_block}
				</div>
			</div>
			<!-- END:real_block -->
			<div class="panel panel-default">
				<div class="panel-heading"><strong>{LANG.content_keywords}</strong></div>
				<div class="panel-body">
							<div class="clearfix uiTokenizer uiInlineTokenizer">
								<div id="keywords" class="tokenarea">
									<!-- BEGIN: keywords -->
									<span class="uiToken removable" title="{KEYWORDS}"> {KEYWORDS} <input type="hidden" autocomplete="off" name="keywords[]" value="{KEYWORDS}" /> <a onclick="$(this).parent().remove();" class="remove uiCloseButton uiCloseButtonSmall" href="javascript:void(0);"></a> </span>
									<!-- END: keywords -->
								</div>
								<div class="uiTypeahead">
									<div class="wrap">
										<input type="hidden" class="hiddenInput" autocomplete="off" value="" />
										<div class="innerWrap">
											<input id="keywords-search" type="text" placeholder="{LANG.input_keyword_tags}" class="form-control textInput" style="width: 100%;" />
										</div>
									</div>
								</div>
							</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">{LANG.content_publ_date} <span class="timestamp">{LANG.content_notetime}</span></div>
				<div class="panel-body">
					<div class="form-group">
						<div class="input-group">
							<input class="form-control" name="publ_date" id="publ_date" value="{publ_date}" maxlength="10" type="text" />
							<span class="input-group-btn">
								<button class="btn btn-default" type="button" id="publ_date-btn">
									<em class="fa fa-calendar fa-fix">&nbsp;</em>
								</button> </span>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-xs-12">
								<select class="form-control" name="phour">
									{phour}
								</select>
							</div>
							<div class="col-xs-12">
								<select class="form-control" name="pmin">
									{pmin}
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">{LANG.content_exp_date} <span class="timestamp">{LANG.content_notetime}</span></div>
				<div class="panel-body">
					<div class="form-group">
						<div class="input-group">
							<input class="form-control" name="exp_date" id="exp_date" value="{exp_date}" maxlength="10" type="text" />
							<span class="input-group-btn">
								<button class="btn btn-default" type="button" id="exp_date-btn">
									<em class="fa fa-calendar fa-fix">&nbsp;</em>
								</button> </span>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-xs-12">
								<select class="form-control" name="ehour">
									{ehour}
								</select>
							</div>
							<div class="col-xs-12">
								<select class="form-control" name="emin">
									{emin}
								</select>
							</div>
						</div>
					</div>
					<div style="margin-top: 5px;">
						<input type="checkbox" value="1" name="archive" {archive_checked} />
						<label>{LANG.content_archive}</label>
					</div>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">{LANG.content_extra}</div>
				<div class="panel-body">
					<div style="margin-bottom: 2px;">
						<input type="checkbox" value="1" name="inhome" {inhome_checked}/>
						<label>{LANG.content_inhome}</label>
					</div>
					<div style="margin-bottom: 2px;">
						<input type="checkbox" value="1" name="allowed_rating" {allowed_rating_checked}/>
						<label>{LANG.content_allowed_rating}</label>
					</div>
					<div style="margin-bottom: 2px;">
						<input type="checkbox" value="1" name="allowed_send" {allowed_send_checked}/>
						<label>{LANG.content_allowed_send}</label>
					</div>
					<div style="margin-bottom: 2px;">
						<input type="checkbox" value="1" name="allowed_print" {allowed_print_checked} />
						<label>{LANG.content_allowed_print}</label>
					</div>
					<div style="margin-bottom: 2px;">
						<input type="checkbox" value="1" name="allowed_save" {allowed_save_checked} />
						<label>{LANG.content_allowed_save}</label>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">{LANG.content_allowed_comm}</div>
				<div class="panel-body">
					<!-- BEGIN: allowed_comm -->
					<div class="row">
						<label><input name="allowed_comm[]" type="checkbox" value="{ALLOWED_COMM.value}" {ALLOWED_COMM.checked} />{ALLOWED_COMM.title}</label>
					</div>
					<!-- END: allowed_comm -->
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">{LANG.content_author}</div>
				<div class="panel-body">
					<div class="row">						
						<select class="form-control w250" name="authorid">{authorid}</select>															
					</div>
				</div>
			</div>				
		</div>
	</div>
	<div class="text-center" style="margin-top: 10px">
		<!-- BEGIN:status -->
		<input class="btn btn-primary" name="statussave" type="submit" value="{LANG.save}" />
		<!-- END:status -->
		<!-- BEGIN:status0 -->
		<input class="btn btn-primary" name="status0" type="submit" value="{LANG.save_temp}" />
		<input class="btn btn-primary" name="status1" type="submit" value="{LANG.publtime}" />
		<!-- END:status0 -->
	</div>
</form>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}{NV_ASSETS_DIR}/js/language/jquery.ui.datepicker-{NV_LANG_INTERFACE}.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}themes/admin_default/js/vreal_content.js"></script>
<script type="text/javascript" src="{NV_BASE_SITEURL}themes/admin_default/js/vreal_gmap.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#publ_date,#exp_date").datepicker({
			showOn : "both",
			dateFormat : "dd/mm/yy",
			changeMonth : true,
			changeYear : true,
			showOtherMonths : true,
			buttonImage : nv_base_siteurl + "assets/images/calendar.gif",
			buttonImageOnly : true
		});
		var cachesource = {};
		$("#AjaxLText").autocomplete({
			minLength : 2,
			delay : 500,
			source : function(request, response) {
				var term = request.term;
				if ( term in cachesource) {
					response(cachesource[term]);
					return;
				}
				$.getJSON(script_name + "?" + nv_name_variable + "=" + nv_module_name + "&" + nv_fc_variable + "=sourceajax", request, function(data, status, xhr) {
					cachesource[term] = data;
					response(data);
				});
			}
		});
	});
	var file_items = {FILE_ITEMS};
	var file_selectfile = '{LANG.file_selectfile}';
	var nv_base_adminurl = '{NV_BASE_ADMINURL}';
	var file_dir = '{NV_UPLOADS_DIR}/{module_name}';
	var currentpath = "{CURRENT}";
	$("button[name=selectimg]").click(function() {
		var area = "homeimg";
		var path = "{NV_UPLOADS_DIR}/{module_name}";
		var currentpath = "{CURRENT}";
		var type = "image";
		nv_open_browse("{NV_BASE_ADMINURL}index.php?{NV_NAME_VARIABLE}=upload&popup=1&area=" + area + "&path=" + path + "&type=" + type + "&currentpath=" + currentpath, "NVImg", 850, 500, "resizable=no,scrollbars=no,toolbar=no,location=no,status=no");
		return false;
	});
	function clearobval(ob) {
		$("#" + ob + "").val('');
	}
	$("#listgroupid").on('load', '{url_load}');
	function FormatNumber(str) {
		var strTemp = GetNumber(str);
		if (strTemp.length <= 3)
			return strTemp;
		strResult = "";
		for (var i = 0; i < strTemp.length; i++)
			strTemp = strTemp.replace(",", "");
		var m = strTemp.lastIndexOf(".");
		if (m == -1) {
			for (var i = strTemp.length; i >= 0; i--) {
				if (strResult.length > 0 && (strTemp.length - i - 1) % 3 == 0)
					strResult = "," + strResult;
				strResult = strTemp.substring(i, i + 1) + strResult;
			}
		} else {
			var strphannguyen = strTemp.substring(0, strTemp.lastIndexOf("."));
			var strphanthapphan = strTemp.substring(strTemp.lastIndexOf("."), strTemp.length);
			var tam = 0;
			for (var i = strphannguyen.length; i >= 0; i--) {
				if (strResult.length > 0 && tam == 4) {
					strResult = "," + strResult;
					tam = 1;
				}
				strResult = strphannguyen.substring(i, i + 1) + strResult;
				tam = tam + 1;
			}
			strResult = strResult + strphanthapphan;
		}
		return strResult;
	}
	function GetNumber(str) {
		var count = 0;
		for (var i = 0; i < str.length; i++) {
			var temp = str.substring(i, i + 1);
			if (!(temp == "," || temp == "." || (temp >= 0 && temp <= 9))) {
				alert("{LANG.inputnumber}");
				return str.substring(0, i);
			}
			if (temp == " ")
				return str.substring(0, i);
			if (temp == ".") {
				if (count > 0)
					return str.substring(0, ipubl_date);
				count++;
			}
		}
		return str;
	}
	function IsNumberInt(str) {
		for (var i = 0; i < str.length; i++) {
			var temp = str.substring(i, i + 1);
			if (!(temp == "." || (temp >= 0 && temp <= 9))) {
				alert("{LANG.inputnumber}");
				return str.substring(0, i);
			}
			if (temp == ",") {
				alert("{LANG.thaythedaucham}");
				return str.substring(0, i);
			}
		}
		return str;
	}
	$('[type="submit"]').hover(function() {
		if ($('[name="keywords[]"]').length == 0) {
			if ($('#message-tags').length == 0) {
				$('#message').html('<div style="margin-top: 10px" id="message-tags" class="alert alert-danger">{LANG.content_tags_empty}.<!-- BEGIN: auto_tags --> {LANG.content_tags_empty_auto}.<!-- END: auto_tags --></div>');
			}
		} else {
			$('#message-tags').remove();
		}
	});
</script>
<!-- BEGIN:getalias -->
<script type="text/javascript">
	$("#idtitle").change(function() {
		get_alias();
	});
</script>
<!-- END:getalias -->

<script type="text/javascript">
if($('input[name=property]').attr('checked')){
	$(".apartment,#layout_func").show();
	$(".none-apartment").hide();
} else {
	$(".apartment,#layout_func").hide();
	$(".none-apartment").show();
}
$("#property").click(function() {
	if($(this).is(":checked")) {
		$(".apartment,#layout_func").show();
		$(".none-apartment").hide();		
	} else {
		$(".apartment,#layout_func").hide();
		$(".none-apartment").show();	
	}
});
</script>
<!-- END:main -->