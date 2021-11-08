<!-- BEGIN: main -->
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th class="w100 text-center">{LANG.weight}</th>
				<th class="text-center">{LANG.real_type_title}</th>
				<th class="w150 text-center">{LANG.action}</th>
			</tr>
		</thead>	
		<tbody>
			<!-- BEGIN: loop -->
			<tr>
				<td class="text-center">
				<select class="form-control" id="id_weight_{ROW.rid}" onchange="nv_chang_real_type('{ROW.rid}','weight');">
					<!-- BEGIN: weight -->
					<option value="{WEIGHT.key}"{WEIGHT.selected}>{WEIGHT.title}</option>
					<!-- END: weight -->
				</select></td>
				<td>{ROW.title}</td>
				<td class="text-center"><i class="fa fa-edit">&nbsp;</i><a href="{NV_BASE_ADMINURL}index.php?{NV_NAME_VARIABLE}={MODULE_NAME}&amp;{NV_OP_VARIABLE}={OP}&amp;rid={ROW.rid}#edit">{GLANG.edit}</a> &nbsp;-&nbsp; <i class="fa fa-trash-o">&nbsp;</i><a href="javascript:void(0);" onclick="nv_del_real_type({ROW.rid})">{GLANG.delete}</a></td>
			</tr>
			<!-- END: loop -->
		</tbody>
	</table>
</div>
<!-- BEGIN: generate_page --><div class="text-center">{GENERATE_PAGE}</div><!-- END: generate_page -->
<!-- END: main -->