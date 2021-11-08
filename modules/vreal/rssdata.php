<?php
/**
 * @Project NUKEVIET 4.x
 * @Author QUOCVIET (quocvietposcovn@gmail)
 * @copyright 2009
 * @License GNU/GPL version 2 or any later version
 * @Createdate 28/04/2018 12:54
 */

if( ! defined( 'NV_IS_MOD_RSS' ) ) die( 'Stop!!!' );

global $db_config;

$rssarray = array();

$sql = 'SELECT catid, parentid, ' . NV_LANG_DATA . '_title AS title, ' . NV_LANG_DATA . '_alias AS alias FROM ' . $db_config['prefix'] . '_' . $mod_data . '_catalogs ORDER BY weight, sort';
$list = $nv_Cache->db( $sql, '', $mod_name );
foreach( $list as $value )
{
	$value['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $mod_name . '&amp;' . NV_OP_VARIABLE . '=rss/' . $value['alias'];
	$rssarray[] = $value;
}