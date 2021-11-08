<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 18:49
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$lid = $nv_Request->get_int( 'lid', 'post', 0 );
$mod = $nv_Request->get_string( 'mod', 'post', '' );
$new_vid = $nv_Request->get_int( 'new_vid', 'post', 0 );

if( empty( $lid ) ) die( 'NO_' . $lid );
$content = 'NO_' . $lid;

if( $mod == 'weight' and $new_vid > 0 )
{
	$sql = 'SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_location WHERE lid=' . $lid;
	$result = $db->query( $sql );
	$numrows = $result->rowCount();
	if( $numrows != 1 ) die( 'NO_' . $lid );

	$sql = 'SELECT lid FROM ' . $db_config['prefix'] . '_' . $module_data . '_location WHERE lid!=' . $lid . ' ORDER BY weight ASC';
	$result = $db->query( $sql );

	$weight = 0;
	while( $row = $result->fetch() )
	{
		++$weight;
		if( $weight == $new_vid ) ++$weight;
		$sql = 'UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_location SET weight=' . $weight . ' WHERE lid=' . intval( $row['lid'] );
		$db->query( $sql );
	}

	$sql = 'UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_location SET weight=' . $new_vid . ' WHERE lid=' . intval( $lid );
	$db->query( $sql );

	$nv_Cache->delMod( $module_name );
	$content = 'OK_' . $lid;
}

include NV_ROOTDIR . '/includes/header.php';
echo $content;
include NV_ROOTDIR . '/includes/footer.php';