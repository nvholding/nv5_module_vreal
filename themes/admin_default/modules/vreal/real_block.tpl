<!-- BEGIN: main -->
<div id="module_show_list">
	{REAL_BLOCK_LIST}
</div>
<br />
<a id="edit"></a>
<!-- BEGIN: error -->
<div class="quote" style="width:98%">
	<blockquote class="error"><span>{ERROR}</span></blockquote>
</div>
<div class="clear"></div>
<!-- END: error -->
<form class="form-inline" action="{NV_BASE_ADMINURL}index.php" method="post">
	<input type="hidden" name ="{NV_NAME_VARIABLE}"value="{MODULE_NAME}" />
	<input type="hidden" name ="{NV_OP_VARIABLE}"value="{OP}" />
	<input type="hidden" name ="bid" value="{DATA.bid}" />
	<input name="savecat" type="hidden" value="1" />
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover">
			<caption>{LANG.add_block_cat}</caption>
			<col width="150"/>
			<tbody>
				<tr>
					<td align="right"><strong>{LANG.block_name}: </strong></td>
					<td><input class="form-control" style="width: 650px" name="title" type="text" value="{DATA.title}" id="idtitle" maxlength="255" /></td>
				</tr>
				<tr>
					<td align="right"  width="180px"><strong>{LANG.alias} : </strong></td>
					<td>
					<input class="form-control" style="width: 650px" name="alias" type="text" value="{DATA.alias}" maxlength="255" id="idalias" />
					&nbsp; <em class="fa fa-refresh fa-lg fa-pointer" onclick="get_alias('real_block', {DATA.bid});">&nbsp;</em>
					</td>
				</tr>				

				<tr>
					<td align="right"><strong>{LANG.keywords}: </strong></td>
					<td><input class="form-control" style="width: 650px" name="keywords" type="text" value="{DATA.keywords}" maxlength="255" /></td>
				</tr>
				<tr>
					<td align="right"><strong>{LANG.real_block_image}: </strong></td>
					<td><input class="form-control" style="width:500px" type="text" name="image" id="image" value="{DATA.image}"/> &nbsp; <input class="btn btn-info" type="button" value="{GLANG.browse_image}" name="selectimg"/>
					<!-- BEGIN: image -->
					<br />
					<img src="{IMAGE}" style="max-width:200px"/>
					<!-- END: image -->
					</td>
				</tr>								
				<tr>
					<td valign="top" align="right" width="100px">
					<br>
					<strong>{LANG.description}</strong></td>
					<td><textarea style="width: 650px" name="description" cols="100" rows="5">{DATA.description}</textarea></td>
				</tr>
			</tbody>
		</table>
	</div>
	<br />
	<div class="text-center">
		<input class="btn btn-primary" name="submit1" type="submit" value="{LANG.save}" />
	</div>
</form>
<script type="text/javascript">
	$("input[name=selectimg]").click(function() {
		var area = "image";
		var path = "{NV_UPLOADS_DIR}/" + nv_module_name + "/real_block";
		var type = "image";
		nv_open_browse("{NV_BASE_ADMINURL}index.php?" + nv_name_variable + "=upload&popup=1&area=" + area + "&path=" + path + "&type=" + type, "NVImg", 850, 500, "resizable=no,scrollbars=no,toolbar=no,location=no,status=no");
		return false;
	});
</script>
<!-- BEGIN: get_alias -->
<script type="text/javascript">
	$("#idtitle").change(function() {
		get_alias("real_block", {DATA.bid});
	});
</script>
<!-- END: get_alias -->
<!-- END: main -->