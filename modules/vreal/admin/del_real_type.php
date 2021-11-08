<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 18:49
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

$rid = $nv_Request->get_int( 'rid', 'post', 0 );

$contents = "NO_" . $rid;
$rid = $db->query( "SELECT rid FROM " . $db_config['prefix'] . "_" . $module_data . "_real_type WHERE rid=" . $rid )->fetchColumn();
if( $rid > 0 )
{
	$check_rows = $db->query( "SELECT COUNT(*) FROM " . $db_config['prefix'] . "_" . $module_data . "_rows WHERE r_id =" . $rid )->fetchColumn();

	if( $check_rows > 0 )
	{
		$contents = "ERR_" . sprintf( $lang_module['delsource_msg_rows'], $check_rows );
	}
	else
	{
		$sql = "DELETE FROM " . $db_config['prefix'] . "_" . $module_data . "_real_type WHERE rid=" . $rid;
		if( $db->query( $sql ) )
		{
			nv_fix_real_type();
			$nv_Cache->delMod( $module_name );
			$contents = "OK_" . $rid;
		}
	}
}

include NV_ROOTDIR . '/includes/header.php';
echo $contents;
include NV_ROOTDIR . '/includes/footer.php';