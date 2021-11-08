<?php
/**
 * @Project NUKEVIET 4.x
 * @Author QUOCVIET (quocvietposcovn@gmail)
 * @copyright 2009
 * @License GNU/GPL version 2 or any later version
 * @Createdate 28/04/2018 12:54
 */

if( ! defined( 'NV_ADMIN' ) or ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

$module_version = array(
	'name' => 'vReal', // Tieu de module
	'modfuncs' => 'main,viewcat,real_block,real_type,detail,search,cart,order,payment,complete,history,group,search_result,compare', // Cac function co block
	'change_alias' => 'real_block,real_type,group,content,rss',
	'is_sysmod' => 0, // 1:0 => Co phai la module he thong hay khong
	'virtual' => 1, // 1:0 => Co cho phep ao hao module hay khong
	'version' => '4.3.01', // Phien ban cua module
	'date' => 'Sat, 28 Apr 2018 00:00:00 GMT', // Ngay phat hanh phien ban
	'author' => 'QUOC VIET (quocvietposcovn@gmail.com)', // Tac gia
	'note' => '', // Ghi chu
	'uploads_dir' => array( 
	$module_name, 
	$module_name . '/thumb', 
	$module_name . '/image', 
	$module_name . '/apartment', 
	$module_name . '/real_type',
	$module_name . '/real_block'
	),
    'files_dir' => array(
        $module_upload . '/apartment',
        $module_upload . '/real_type',
        $module_upload . '/real_block'		
    )
);