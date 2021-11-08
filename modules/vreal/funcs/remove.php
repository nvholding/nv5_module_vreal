<?php

/**
 * @Project NUKEVIET 4.x
 * @Author QUOCVIET (quocvietposcovn@gmail)
 * @Copyright 20018
 * @License GNU/GPL version 2 or any later version
 * @Createdate 28/04/2018 12:54
 */

if( ! defined( 'NV_IS_MOD_REAL' ) ) die( 'Stop!!!' );

if( ! isset( $_SESSION[$module_data . '_cart'] ) ) $_SESSION[$module_data . '_cart'] = array();

$id = $nv_Request->get_int( 'id', 'post,get', 0 );

if( $id > 0 )
{
	if( isset( $_SESSION[$module_data . '_cart'][$id] ) )
	{
		unset( $_SESSION[$module_data . '_cart'][$id] );
		echo $id;
	}
	else
		echo "";
}
else
{
	$listall = $nv_Request->get_string( 'listall', 'post,get' );
	$array_id = explode( ',', $listall );
	$array_id = array_map( "intval", $array_id );
	foreach( $array_id as $id )
	{
		if( $id > 0 )
		{
			if( isset( $_SESSION[$module_data . '_cart'][$id] ) )
			{
				unset( $_SESSION[$module_data . '_cart'][$id] );
			}
		}
	}
	echo "OK_0";
}