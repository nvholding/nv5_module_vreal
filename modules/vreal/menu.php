<?php
/**
 * @Project NUKEVIET 4.x
 * @Author QUOCVIET (quocvietposcovn@gmail)
 * @copyright 2009
 * @License GNU/GPL version 2 or any later version
 * @Createdate 28/04/2018 12:54
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$sql = 'SELECT * FROM ' . $db_config['prefix'] . '_' . $mod_data . '_catalogs ORDER BY sort ASC';
$result = $db->query( $sql );
while( $row = $result->fetch() )
{
	$array_item[$row['catid']] = array(
		'parentid' => $row['parentid'],
		'groups_view' => $row['groups_view'],
		'key' => $row['catid'],
		'title' => $row[NV_LANG_DATA . '_title'],
		'alias' => $row[NV_LANG_DATA . '_alias'],
	);
}

$_sql = 'SELECT * FROM ' . $db_config['prefix'] . '_' . $mod_data . '_real_type ORDER BY weight ASC';
$_result = $db->query( $_sql );
while( $_row = $_result->fetch() ){
	$array_real_type[$_row['rid']] = array(
		'key' => $_row['rid'],
		'title' => $_row[NV_LANG_DATA . '_title'],
		'alias' => 'real_type/' . $_row[NV_LANG_DATA . '_alias'],
	);
}

$sql1 = 'SELECT * FROM ' . $db_config['prefix'] . '_' . $mod_data . '_real_block ORDER BY weight ASC';
$result1 = $db->query( $sql1 );
while( $row1 = $result1->fetch() ) 
{
	$array_real_block[$row1['bid']] = array(
		'key' => $row1['bid'],
		'title' => $row1[NV_LANG_DATA . '_title'],
		'alias' => 'real_block/' . $row1[NV_LANG_DATA . '_alias'],
	);
}