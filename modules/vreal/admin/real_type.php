<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-9-2010 14:43
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$page_title = $lang_module['real_type'];
$table_name = $db_config['prefix'] . "_" . $module_data . "_real_type";
list( $rowcontent['rid'], $title, $image, $error ) = array( 0, "", "http://", "", "" );
$rowcontent = array(
	'rid' => 0,
	'image' => '',
	'weight' => 0,
	'add_time' => 0,
	'edit_time' => 0,
	'title' => '',
	'alias' => ''	
);

$savecat = $nv_Request->get_int( 'savecat', 'post', 0 );
if( ! empty( $savecat ) )
{
	$field_lang = nv_file_table( $table_name );

	$rowcontent['rid'] = $nv_Request->get_int( 'rid', 'post', 0 );
	$rowcontent['title'] = nv_substr( $nv_Request->get_title( 'title', 'post', '', 1 ), 0, 250 );
	
	$rowcontent['alias'] = nv_substr( $nv_Request->get_title( 'alias', 'post', '', 1 ), 0, 250 );	
	$rowcontent['alias'] = ( $rowcontent['alias'] == "" ) ? change_alias( $rowcontent['title'] ) : change_alias( $rowcontent['alias'] );	
	
	$image_old = $db->query( "SELECT image FROM " . $table_name . " WHERE rid =" . $rowcontent['rid'] )->fetchColumn();

	$rowcontent['image'] = $nv_Request->get_string( 'image', 'post', '' );

	if( ! nv_is_url( $rowcontent['image'] ) and file_exists( NV_DOCUMENT_ROOT . $rowcontent['image'] ) )
	{
		$rowcontent['image'] = substr( $rowcontent['image'], strlen( NV_BASE_SITEURL . NV_UPLOADS_DIR . "/" . $module_name . "/real_type/" ) );
	}
	elseif( ! nv_is_url( $rowcontent['image'] ) )
	{
		$rowcontent['image'] = $image_old;
	}

	if( $rowcontent['image'] != $image_old and is_file( NV_UPLOADS_REAL_DIR . "/" . $module_name . "/real_type/" . $image_old ) )
	{
		@unlink( NV_UPLOADS_REAL_DIR . "/" . $module_name . "/real_type/" . $image_old );
	}

	if( empty( $rowcontent['title'] ) ) {
		$error = $lang_module['real_type_error_title'];
	} else {
		if( $rowcontent['rid'] == 0 ) {
			$stmt = $db->prepare( "SELECT rid FROM " . $db_config['prefix'] . "_" . $module_data . "_real_type WHERE " . NV_LANG_DATA . "_alias= :alias" );
			$stmt->bindParam( ':alias', $data['alias'], PDO::PARAM_STR );
			$stmt->execute();			
			
			if( $stmt->rowCount() ) {
				$error = $lang_module['block_error_alias'];
			} else {	
				$weight = $db->query( "SELECT max(weight) FROM " . $table_name . "" )->fetchColumn();
				$weight = intval( $weight ) + 1;

				$listfield = "";
				$listvalue = "";
				foreach( $field_lang as $field_lang_i )
				{
					list( $flang, $fname ) = $field_lang_i;
					$listfield .= ", " . $flang . "_" . $fname;
					$listvalue .= ", :" . $flang . "_" . $fname;
				}
				$sql = "INSERT INTO " . $table_name . " ( image, weight, add_time, edit_time " . $listfield . ") VALUES ( :image, " . $weight . ", " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . " " . $listvalue . ")";
				$data_insert = array();
				$data_insert['image'] = $rowcontent['image'];
				foreach( $field_lang as $field_lang_i )
				{
					list( $flang, $fname ) = $field_lang_i;
					$data_insert[$flang . "_" . $fname] = $rowcontent[$fname];
				}
				if( $db->insert_id( $sql, 'rid', $data_insert ) )
				{
					$nv_Cache->delMod( $module_name );
					Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op );
					die();
				}
				else
				{
					$error = $lang_module['errorsave'];
				}			
			}
		} else {
			$stmt = $db->prepare( "SELECT rid FROM " . $db_config['prefix'] . "_" . $module_data . "_real_type WHERE " . NV_LANG_DATA . "_alias= :alias AND rid!=" . $rowcontent['rid'] );
			$stmt->bindParam( ':alias', $data['alias'], PDO::PARAM_STR );
			$stmt->execute();
			if( $stmt->rowCount() ){
				$error = $lang_module['block_error_alias'];
			} else {	
				$stmt = $db->prepare( "UPDATE " . $table_name . " SET " . NV_LANG_DATA . "_title= :title,  " . NV_LANG_DATA . "_alias = :alias, image= :image, edit_time=" . NV_CURRENTTIME . " WHERE rid =" . $rowcontent['rid'] );
				$stmt->bindParam( ':title', $rowcontent['title'], PDO::PARAM_STR );
				$stmt->bindParam( ':alias', $rowcontent['alias'], PDO::PARAM_STR );				
				$stmt->bindParam( ':image', $rowcontent['image'], PDO::PARAM_STR );
				if( $stmt->execute() ){
					$nv_Cache->delMod( $module_name );
					Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=" . $op );
					die();
				} else {
					$error = $lang_module['errorsave'];
				}
			}
		}
	}
}

$rowcontent['rid'] = $nv_Request->get_int( 'rid', 'get', 0 );
if( $rowcontent['rid'] > 0 )
{
	list( $rowcontent['rid'], $rowcontent['title'], $rowcontent['alias'], $rowcontent['image'] ) = $db->query( "SELECT rid, " . NV_LANG_DATA . "_title, " . NV_LANG_DATA . "_alias, image FROM " . $db_config['prefix'] . "_" . $module_data . "_real_type where rid=" . $rowcontent['rid'] . "" )->fetch( 3 );
	$lang_module['add_real_type'] = $lang_module['edit_real_type'];
}

$xtpl = new XTemplate( "real_type.tpl", NV_ROOTDIR . "/themes/" . $global_config['module_theme'] . "/modules/" . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'GLANG', $lang_global );
$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
$xtpl->assign( 'MODULE_NAME', $module_name );
$xtpl->assign( 'OP', $op );
$xtpl->assign( 'NV_UPLOADS_DIR', NV_UPLOADS_DIR );

$xtpl->assign( 'REAL_TYPE_LIST', nv_show_real_type_list() );

if( $error != "" ) {
	$xtpl->assign( 'ERROR', $error );
	$xtpl->parse( 'main.error' );
}

if( ! empty( $rowcontent['image'] ) ) {
	$rowcontent['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . "/" . $module_name . "/real_type/" . $rowcontent['image'];
}

$xtpl->assign( 'DATA', $rowcontent );

if( ! empty( $rowcontent['image'] ) ) {
	$xtpl->parse( 'main.image' );
}

if (empty($data['alias'])) {
	$xtpl->parse( 'main.get_alias' );
}

$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';