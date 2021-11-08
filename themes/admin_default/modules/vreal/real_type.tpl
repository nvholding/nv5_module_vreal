<!-- BEGIN: main -->
<div id="module_show_list">
	{REAL_TYPE_LIST}
</div>
<br />
<!-- BEGIN: error -->
<div class="alert alert-danger">{ERROR}</div>
<div class="clear">&nbsp;</div>
<!-- END: error -->
<form class="form-inline" enctype="multipart/form-data" action="{NV_BASE_ADMINURL}index.php" method="post" id="edit">
	<input type="hidden" name ="{NV_NAME_VARIABLE}" value="{MODULE_NAME}" />
	<input type="hidden" name ="{NV_OP_VARIABLE}" value="{OP}" />
	<input type="hidden" name ="rid" value="{DATA.rid}" />
	<input name="savecat" type="hidden" value="1" />
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<col width="150"/>
			<caption>{LANG.add_real_type}</caption>
			<tbody>
				<tr>
					<td align="right"><strong>{LANG.real_type_title}: </strong></td>
					<td><input class="form-control" name="title" type="text" value="{DATA.title}" maxlength="250" id="idtitle" /></td>
				</tr>
				<tr>
					<td align="right"  width="180px"><strong>{LANG.alias} : </strong></td>
					<td>
					<input class="form-control" style="width: 650px" name="alias" type="text" value="{DATA.alias}" maxlength="255" id="idalias" />
					&nbsp; <em class="fa fa-refresh fa-lg fa-pointer" onclick="get_alias('real_type', {DATA.r_id});">&nbsp;</em>
					</td>
				</tr>						
				<tr>
					<td align="right"><strong>{LANG.real_type_image}: </strong></td>
					<td><input class="form-control" style="width:500px" type="text" name="image" id="image" value="{DATA.image}"/> &nbsp; <input class="btn btn-info" type="button" value="{GLANG.browse_image}" name="selectimg"/>
					<!-- BEGIN: image -->
					<br />
					<img src="{DATA.image}" style="max-width:200px"/>
					<!-- END: image -->
					</td>
				</tr>
		</table>
	</div>
	<br />
	<center><input class="btn btn-primary" name="submit1" type="submit" value="{LANG.save}" />
	</center>
</form>
<script type="text/javascript">
	$("input[name=selectimg]").click(function() {
		var area = "image";
		var path = "{NV_UPLOADS_DIR}/" + nv_module_name + "/real_type";
		var type = "image";
		nv_open_browse("{NV_BASE_ADMINURL}index.php?" + nv_name_variable + "=upload&popup=1&area=" + area + "&path=" + path + "&type=" + type, "NVImg", 850, 500, "resizable=no,scrollbars=no,toolbar=no,location=no,status=no");
		return false;
	});
</script>
<!-- BEGIN: get_alias -->
<script type="text/javascript">
	$("#idtitle").change(function() {
		get_alias("real_type", {DATA.r_id});
	});
</script>
<!-- END: get_alias -->
<!-- END: main -->