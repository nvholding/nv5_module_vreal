<?php

/**
 * @Project NUKEVIET 4.x
 * @Author QUOCVIET (quocvietposcovn@gmail)
 * @Copyright 20018
 * @License GNU/GPL version 2 or any later version
 * @Createdate 28/04/2018 12:54
 */
 
if( ! defined( 'NV_IS_MOD_REAL' ) ) die( 'Stop!!!' );
$url = array();
$cacheFile = NV_LANG_DATA . '_Sitemap.cache';
$pa = NV_CURRENTTIME - 7200;
if( ( $cache = $nv_Cache->getItem( $module_name, $cacheFile ) ) != false and filemtime( NV_ROOTDIR . '/' . NV_CACHEDIR . '/' . $module_name . '/' . $cacheFile ) >= $pa )
{
$url = unserialize( $cache );
}
else
{
$db->sqlreset()->select( 'id, listcatid, edittime, ' . NV_LANG_DATA . '_alias' )->from( $db_config['prefix'] . '_' . $module_data . '_rows' )->where( 'status =1' )->order( 'publtime DESC' )->limit( 1000 );
$result = $db->query( $db->sql() );
$url = array();
while( list( $id, $catid_i, $edittime, $alias ) = $result->fetch( 3 ) )
{
$url[] = array( 'link' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $global_array_cat[$catid_i]['alias'] . '/' . $alias . '-' . $id . $global_config['rewrite_exturl'], 'publtime' => $edittime );
}
$cache = serialize( $url );
$nv_Cache->setItem( $module_name, $cacheFile, $cache );
}
nv_xmlSitemap_generate( $url );
die();