<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-9-2010 14:43
 */

if( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );

if( defined( 'NV_EDITOR' ) ) {
	require_once NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php';
}

// Lua chon Layout
$selectthemes = (!empty($site_mods[$module_name]['theme'])) ? $site_mods[$module_name]['theme'] : $global_config['site_theme'];
$layout_array = nv_scandir(NV_ROOTDIR . '/themes/' . $selectthemes . '/layout', $global_config['check_op_layout']);

$table_name = $db_config['prefix'] . "_" . $module_data . "_rows";
$month_dir_module = nv_mkdir( NV_UPLOADS_REAL_DIR . '/' . $module_upload, date( "Y_m" ), true );
$array_real_block_module = array();
$id_block_content = array();

$sql = "SELECT bid, adddefault, " . NV_LANG_DATA . "_title FROM " . $db_config['prefix'] . "_" . $module_data . "_real_block ORDER BY weight ASC";
$result = $db->query( $sql );

while( list( $bid_i, $adddefault_i, $title_i ) = $result->fetch( 3 ) ) {
	$array_real_block_module[$bid_i] = $title_i;
	if( $adddefault_i ) {
		$id_block_content[] = $bid_i;
	}
}

$catid = $nv_Request->get_int( 'catid', 'get', 0 );
$parentid = $nv_Request->get_int( 'parentid', 'get', 0 );

$stmt = $db->prepare( "SELECT numsubcat FROM " . $db_config['prefix'] . "_" . $module_data . "_catalogs WHERE catid= :parentid" );
$stmt->bindParam( ':parentid', $parentid, PDO::PARAM_STR );
$stmt->execute();
$subcatid = $stmt->fetchColumn();
if( $subcatid > 0 ) {
	Header( "Location: " . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name );
	die();
}

$rowcontent = array(
	'id' => 0,
	'listcatid' => $catid,
	'group_id' => '',
	'user_id' => $admin_info['admin_id'],
	'r_id' => 0,
	'addtime' => NV_CURRENTTIME,
	'edittime' => NV_CURRENTTIME,
	'status' => 0,
	'publtime' => NV_CURRENTTIME,
	'exptime' => 0,
	'archive' => 1,
	'product_code' => '',
	'product_number' => 1,
	'product_price' => 0,
	'product_discounts' => 0,
	'money_unit' => $pro_config['money_unit'],
	'product_unit' => '',
	'homeimgfile' => '',
	'homeimgthumb' => '',
	'homeimgalt' => '',
	'imgposition' => 0,
	'copyright' => 0,
	'inhome' => 1,
    'layout_func' => '',	
    'property' => 0,
    'propatt' => '',	
	'gmap' => '',
    'caddress' => '',		
    'street' => '',	
    'authorid' => 0,			
	'allowed_comm' => $module_config[$module_name]['setcomm'],
	'allowed_rating' => 1,
	'ratingdetail' => '0',
	'allowed_send' => 1,
	'allowed_print' => 1,
	'allowed_save' => 1,
	'hitstotal' => 0,
	'hitscm' => 0,
	'hitslm' => 0,
	'showprice' => 0,
	'com_id' => 0,
	'title' => '',
	'alias' => '',
    'keywords' => '',
    'keywords_old' => '',
	'hometext' => '',
	'address' => '',	
	'design' => '',
	'utility' => '',
	'policy' => '',	
	'bodytext' => '',
	'support' => '',
	'realtitle' => '',
	'realinfo' => '',	
	'rtext' => ''
);

$page_title = $lang_module['content_add'];
$error = '';
$groups_list = nv_groups_list();

$rowcontent['id'] = $nv_Request->get_int( 'id', 'get,post', 0 );

if( $nv_Request->get_int( 'save', 'post' ) == 1 ) {
	$field_lang = nv_file_table( $table_name );
	$id_block_content = array_unique( $nv_Request->get_typed_array( 'bids', 'post', 'int', array() ) );

	$rowcontent['listcatid'] = $nv_Request->get_int( 'catid', 'post', 0 );

	$group_id = array_unique( $nv_Request->get_typed_array( 'groupids', 'post', 'int', array() ) );
	$rowcontent['group_id'] = implode( ',', $group_id );

	$rowcontent['r_id'] = $nv_Request->get_int( 'rid', 'post', 0 );
	$rowcontent['showprice'] = $nv_Request->get_int( 'showprice', 'post', 0 );
	$rowcontent['showorder'] = $nv_Request->get_int( 'showorder', 'post', 0 );

	if( $rowcontent['r_id'] == 0 ){
		$rowcontent['ltext'] = nv_substr( $nv_Request->get_title( 'ltext', 'post', '', 1 ), 0, 255 );
		if( ! empty( $rowcontent['ltext'] ) )
		{
			$stmt = $db->prepare( 'SELECT rid FROM ' . $db_config['prefix'] . '_' . $module_data . '_real_type WHERE ' . NV_LANG_DATA . '_title= :ltext' );
			$stmt->bindParam( ':ltext', $rowcontent['ltext'], PDO::PARAM_STR );
			$stmt->execute();
			$rowcontent['r_id'] = (int) $stmt->fetchColumn();
		}
	}
	if( $rowcontent['r_id'] > 0 ) $rowcontent['rtext'] = '';

	$publ_date = $nv_Request->get_title( 'publ_date', 'post', '' );
	$exp_date = $nv_Request->get_title( 'exp_date', 'post', '' );

	if( ! empty( $publ_date ) and ! preg_match( '/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $publ_date ) ) $publ_date = '';
	if( ! empty( $exp_date ) and ! preg_match( '/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $exp_date ) ) $exp_date = '';

	if( empty( $publ_date ) ) {
		$rowcontent['publtime'] = NV_CURRENTTIME;
	} else {
		$phour = $nv_Request->get_int( 'phour', 'post', 0 );
		$pmin = $nv_Request->get_int( 'pmin', 'post', 0 );
		unset( $m );
		preg_match( '/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $publ_date, $m );
		$rowcontent['publtime'] = mktime( $phour, $pmin, 0, $m[2], $m[1], $m[3] );
	}

	if( empty( $exp_date ) ) {
		$rowcontent['exptime'] = 0;
	} else {
		$ehour = $nv_Request->get_int( 'ehour', 'post', 0 );
		$emin = $nv_Request->get_int( 'emin', 'post', 0 );
		unset( $m );
		preg_match( '/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/', $exp_date, $m );
		$rowcontent['exptime'] = mktime( $ehour, $emin, 0, $m[2], $m[1], $m[3] );
	}

	$rowcontent['archive'] = $nv_Request->get_int( 'archive', 'post', 0 );

	if( $rowcontent['archive'] > 0 ) {
		$rowcontent['archive'] = ( $rowcontent['exptime'] > NV_CURRENTTIME ) ? 1 : 2;
	}

	$rowcontent['title'] = nv_substr( $nv_Request->get_title( 'title', 'post', '', 1 ), 0, 255 );
	
	$alias = nv_substr( $nv_Request->get_title( 'alias', 'post', '', 1 ), 0, 255 );
	$alias = strtolower($alias);
	$rowcontent['alias'] = ( $alias == '' ) ? change_alias( $rowcontent['title'] ) : change_alias( $alias );
	
	$hometext = $nv_Request->get_string( 'hometext', 'post', '');
	$rowcontent['hometext'] = defined( 'NV_EDITOR' ) ? nv_nl2br( $hometext, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $hometext ) ), '<br />' );
	
	$address = $nv_Request->get_string( 'address', 'post', '');
	$rowcontent['address'] = defined( 'NV_EDITOR' ) ? nv_nl2br( $address, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $address ) ), '<br />' );

	$design = $nv_Request->get_string( 'design', 'post', '');
	$rowcontent['design'] = defined( 'NV_EDITOR' ) ? nv_nl2br( $design, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $design ) ), '<br />' );

	$utility = $nv_Request->get_string( 'utility', 'post', '' );
	$rowcontent['utility'] = defined( 'NV_EDITOR' ) ? nv_nl2br( $utility, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $utility ) ), '<br />' );
	
	$policy = $nv_Request->get_string( 'policy', 'post', '');
	$rowcontent['policy'] = defined( 'NV_EDITOR' ) ? nv_nl2br( $policy, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $policy ) ), '<br />' );

	$bodytext = $nv_Request->get_string( 'bodytext', 'post', '' );
	$rowcontent['bodytext'] = defined( 'NV_EDITOR' ) ? nv_nl2br( $bodytext, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $bodytext ) ), '<br />' );
	
	$support = $nv_Request->get_string( 'support', 'post', '');
	$rowcontent['support'] = defined( 'NV_EDITOR' ) ? nv_nl2br( $support, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $support ) ), '<br />' );

	$rowcontent['realtitle'] = $nv_Request->get_title( 'realtitle', 'post', '' );	
	
	$realinfo = $nv_Request->get_string( 'realinfo', 'post', '');
	$rowcontent['realinfo'] = defined( 'NV_EDITOR' ) ? nv_nl2br( $realinfo, '' ) : nv_nl2br( nv_htmlspecialchars( strip_tags( $realinfo ) ), '<br />' );

	
	$rowcontent['product_code'] = nv_substr( $nv_Request->get_title( 'product_code', 'post', '', 1 ), 0, 255 );
	$rowcontent['product_number'] = $nv_Request->get_int( 'product_number', 'post', 0 );
	$rowcontent['product_price'] = $nv_Request->get_string( 'product_price', 'post', '' );
	$rowcontent['product_price'] = str_replace( ',', '', $rowcontent['product_price'] );
	$rowcontent['product_discounts'] = $nv_Request->get_int( 'product_discounts', 'post', 0 );
	$rowcontent['money_unit'] = $nv_Request->get_title( 'money_unit', 'post', '' );
	$rowcontent['product_unit'] = $nv_Request->get_int( 'product_unit', 'post', 0 );
	$rowcontent['homeimgfile'] = $nv_Request->get_title( 'homeimg', 'post', '' );
	$rowcontent['homeimgalt'] = $nv_Request->get_title( 'homeimgalt', 'post', '', 1 );
	
	$rowcontent['copyright'] = ( int )$nv_Request->get_bool( 'copyright', 'post' );
	$rowcontent['inhome'] = ( int )$nv_Request->get_bool( 'inhome', 'post' );
	
    // Lua chon Layout
    $rowcontent['layout_func'] = $nv_Request->get_title('layout_func', 'post', '');
	$rowcontent['property'] = $nv_Request->get_int('property', 'post', 0);
	
	$propatt = $nv_Request->get_array('propatt', 'post', 'string');
	$prop_area = $nv_Request->get_title('prop_area', 'post', '');		
	$prop_bedr = $nv_Request->get_title('prop_bedr', 'post', '');		
	$prop_floor = $nv_Request->get_title('prop_floor', 'post', '');		
	$prop_front = $nv_Request->get_title('prop_front', 'post', '');		
	$prop_wc = $nv_Request->get_title('prop_wc', 'post', '');		
	$prop_dir = $nv_Request->get_title('prop_dir', 'post', '');	
	
	$propatt = array(
		'prop_area' => $prop_area, 
		'prop_bedr' => $prop_bedr, 
		'prop_floor' => $prop_floor, 
		'prop_front' => $prop_front, 
		'prop_wc' => $prop_wc, 
		'prop_dir' => $prop_dir
	);
	$rowcontent['propatt'] = implode( '|', $propatt );		
	
	$gmap = $nv_Request->get_array('gmap', 'post', 'string');
	$gmap_ad = $nv_Request->get_title('config_company_address', 'post', '34 Lê Duẩn, Bến Nghé, Quận 1, Ho Chi Minh City, Vietnam');		
	$gmap_cl = $nv_Request->get_title('config_company_mapcenterlat', 'post', 10.781022900000005);	
	$gmap_cn = $nv_Request->get_title('config_company_mapcenterlng', 'post', 106.69846340000004);		
	$gmap_l = $nv_Request->get_title('config_company_maplat', 'post', 10.781022900000005);	
	$gmap_n = $nv_Request->get_title('config_company_maplng', 'post', 106.69846340000004);		
	$gmap_z = $nv_Request->get_title('config_company_mapzoom', 'post', 18);	
	$gmap = array(
		'config_company_address' => $gmap_ad, 
		'config_company_mapcenterlat' => $gmap_cl, 
		'config_company_mapcenterlng' => $gmap_cn, 
		'config_company_maplat' => $gmap_l, 
		'config_company_maplng' => $gmap_n, 
		'config_company_mapzoom' => $gmap_z
	);
	$rowcontent['gmap'] = implode( '|', $gmap );
	
	$rowcontent['caddress'] = $nv_Request->get_title('caddress', 'post', '');	
	$rowcontent['street'] = $nv_Request->get_title('street', 'post', '');
	$rowcontent['authorid'] = $nv_Request->get_int('authorid', 'post', 0);	
	
	$_groups_post = $nv_Request->get_array( 'allowed_comm', 'post', array() );
	$rowcontent['allowed_comm'] = ! empty( $_groups_post ) ? implode( ',', nv_groups_post( array_intersect( $_groups_post, array_keys( $groups_list ) ) ) ) : '';

	$rowcontent['allowed_rating'] = ( int )$nv_Request->get_bool( 'allowed_rating', 'post' );
	$rowcontent['allowed_send'] = ( int )$nv_Request->get_bool( 'allowed_send', 'post' );
	$rowcontent['allowed_print'] = ( int )$nv_Request->get_bool( 'allowed_print', 'post' );
	$rowcontent['allowed_save'] = ( int )$nv_Request->get_bool( 'allowed_save', 'post' );
    $rowcontent['keywords'] = $nv_Request->get_array('keywords', 'post', '');
    $rowcontent['keywords'] = implode(', ', $rowcontent['keywords']);
	
	// Xu ly anh minh hoa khac
	$otherimage = $nv_Request->get_typed_array( 'otherimage', 'post', 'string' );
	$array_otherimage = array();
	foreach( $otherimage as $otherimage_i ) {
		if( ! nv_is_url( $otherimage_i ) and file_exists( NV_DOCUMENT_ROOT . $otherimage_i ) ) {
			$lu = strlen( NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' );
			$otherimage_i = substr( $otherimage_i, $lu );
		} elseif( ! nv_is_url( $otherimage_i ) ) {
			$otherimage_i = '';
		}
		if( ! empty( $otherimage_i ) ) {
			$array_otherimage[] = $otherimage_i;
		}
	}
	$rowcontent['otherimage'] = implode( '|', $array_otherimage );

	// Kiem tra ma san pham trung
	$error_product_code = false;
	if( ! empty( $rowcontent['product_code'] ) ) {
		$stmt = $db->prepare( 'SELECT id FROM ' . $db_config['prefix'] . '_' . $module_data . '_rows WHERE product_code= :product_code AND id!=' . $rowcontent['id'] );
		$stmt->bindParam( ':product_code', $rowcontent['product_code'], PDO::PARAM_STR );
		$stmt->execute();
		$id_err = $stmt->rowCount();

		$stmt = $db->prepare( 'SELECT id FROM ' . $db_config['prefix'] . '_' . $module_data . '_rows WHERE product_code= :product_code' );
		$stmt->bindParam( ':product_code', $rowcontent['product_code'], PDO::PARAM_STR );
		$stmt->execute();
		if( $rowcontent['id'] == 0 and $stmt->rowCount() ) {
			$error_product_code = true;
		} elseif( $id_err ) {
			$error_product_code = true;
		}
	}

	if( empty( $rowcontent['title'] ) ) {
		$error = $lang_module['error_title'];
	} elseif( $error_product_code ) {
		$error = $lang_module['error_product_code'];
	} elseif( empty( $rowcontent['listcatid'] ) ) {
		$error = $lang_module['error_cat'];
	} elseif( trim( strip_tags( $rowcontent['hometext'] ) ) == '' ) {
		$error = $lang_module['error_hometext'];
	} elseif( trim( strip_tags( $rowcontent['bodytext'] ) ) == '' ) {
		$error = $lang_module['error_bodytext'];
	} else {
		// Xu ly hang san xuat moi
		if( ! empty( $rowcontent['ltext'] ) ) {
			$weight = $db->query( 'SELECT max(weight) FROM ' . $db_config['prefix'] . '_' . $module_data . '_real_type' )->fetchColumn();
			$weight = intval( $weight ) + 1;
			$field_lang_real_type = nv_file_table( $db_config['prefix'] . '_' . $module_data . '_real_type' );
			$listfield = '';
			$listvalue = '';
			$data_insert = array();
			foreach( $field_lang_real_type as $field_lang_i ) {
				list( $flang, $fname ) = $field_lang_i;
				$listfield .= ', ' . $flang . '_' . $fname;
				$listvalue .= ', :' . $flang . '_' . $fname;
				$data_insert[$flang . '_' . $fname] = $rowcontent['rtext'];
			}
			$sql = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_real_type ( image, weight, add_time, edit_time " . $listfield . ") VALUES ( '', '', " . $weight . ", " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . " " . $listvalue . ")";
			$rowcontent['r_id'] = $db->insert_id( $sql, 'rid', $data_insert );
		}

		// Xu ly tu khoa
		if( $rowcontent['keywords'] == '' ) {
			if( $rowcontent['hometext'] != '' ) {
				$rowcontent['keywords'] = nv_get_keywords( $rowcontent['hometext'] );
			} else {
				$rowcontent['keywords'] = nv_get_keywords( $rowcontent['bodytext'] );
			}
		}
		$rowcontent['status'] = ( $nv_Request->isset_request( 'status1', 'post' ) ) ? 1 : 0;

		// Xu ly anh minh hoa
		$rowcontent['homeimgthumb'] = 0;
		if( ! nv_is_url( $rowcontent['homeimgfile'] ) and is_file( NV_DOCUMENT_ROOT . $rowcontent['homeimgfile'] ) ) {
			$lu = strlen( NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' );
			$rowcontent['homeimgfile'] = substr( $rowcontent['homeimgfile'], $lu );
			if( file_exists( NV_ROOTDIR . '/' . NV_FILES_DIR . '/' . $module_upload . '/' . $rowcontent['homeimgfile'] ) ) {
				$rowcontent['homeimgthumb'] = 1;
			} else {
				$rowcontent['homeimgthumb'] = 2;
			}
		} elseif( nv_is_url( $rowcontent['homeimgfile'] ) ) {
			$rowcontent['homeimgthumb'] = 3;
		} else {
			$rowcontent['homeimgfile'] = '';
		}

		$listfield = '';
		$listvalue = '';
		foreach( $field_lang as $field_lang_i ) {
			list( $flang, $fname ) = $field_lang_i;
			$listfield .= ', ' . $flang . '_' . $fname;
			$listvalue .= ', :' . $flang . '_' . $fname;
		}

		if( $rowcontent['id'] == 0 ) {
			$rowcontent['publtime'] = ( $rowcontent['publtime'] > NV_CURRENTTIME ) ? $rowcontent['publtime'] : NV_CURRENTTIME;
			if( $rowcontent['status'] == 1 and $rowcontent['publtime'] > NV_CURRENTTIME ) {
				$rowcontent['status'] = 2;
			}

			$sql = "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_rows (id, listcatid, group_id, user_id, r_id, addtime, edittime, status, publtime, exptime, archive, product_code, product_number, product_price, product_discounts, money_unit, product_unit, homeimgfile, homeimgthumb, homeimgalt, otherimage, imgposition, copyright, inhome, layout_func, property, propatt, gmap, caddress, street, authorid, allowed_comm, allowed_rating, ratingdetail, allowed_send, allowed_print, allowed_save, hitstotal, hitscm, hitslm, showprice " . $listfield . ")
				 VALUES ( NULL ,
				 :listcatid,
				 :group_id,
				 " . intval( $rowcontent['user_id'] ) . ",
				 " . intval( $rowcontent['r_id'] ) . ",
				 " . intval( $rowcontent['addtime'] ) . ",
				 " . intval( $rowcontent['edittime'] ) . ",
				 " . intval( $rowcontent['status'] ) . ",
				 " . intval( $rowcontent['publtime'] ) . ",
				 " . intval( $rowcontent['exptime'] ) . ",
				 " . intval( $rowcontent['archive'] ) . ",
				 :product_code,
				 " . intval( $rowcontent['product_number'] ) . ",
				 " . $rowcontent['product_price'] . ",
				 " . intval( $rowcontent['product_discounts'] ) . ",
				 :money_unit,
				 " . intval( $rowcontent['product_unit'] ) . ",
				 :homeimgfile,
				 :homeimgthumb,
				 :homeimgalt,
				 :otherimage,
				 " . intval( $rowcontent['imgposition'] ) . ",
				 " . intval( $rowcontent['copyright'] ) . ",
				 " . intval( $rowcontent['inhome'] ) . ",
				 :layout_func,		
				 :property,
				 :propatt,					 
				 :gmap,				 				 
				 :caddress,		
				 :street,
				 :authorid,				 		 		 
				 :allowed_comm,
				 " . intval( $rowcontent['allowed_rating'] ) . ",
				 :ratingdetail,
				 " . intval( $rowcontent['allowed_send'] ) . ",
				 " . intval( $rowcontent['allowed_print'] ) . ",
				 " . intval( $rowcontent['allowed_save'] ) . ",
				 " . intval( $rowcontent['hitstotal'] ) . ",
				 " . intval( $rowcontent['hitscm'] ) . ",
				 " . intval( $rowcontent['hitslm'] ) . ",
				 " . intval( $rowcontent['showprice'] ) . "
				" . $listvalue . "
			)";
			$data_insert = array();
			$data_insert['listcatid'] = $rowcontent['listcatid'];
			$data_insert['group_id'] = $rowcontent['group_id'];
			$data_insert['product_code'] = $rowcontent['product_code'];
			$data_insert['money_unit'] = $rowcontent['money_unit'];
			$data_insert['homeimgfile'] = $rowcontent['homeimgfile'];
			$data_insert['homeimgthumb'] = $rowcontent['homeimgthumb'];
			$data_insert['homeimgalt'] = $rowcontent['homeimgalt'];
			$data_insert['otherimage'] = $rowcontent['otherimage'];
			$data_insert['ratingdetail'] = $rowcontent['ratingdetail'];
			$data_insert['layout_func'] = $rowcontent['layout_func'];
			$data_insert['property'] = $rowcontent['property'];
			$data_insert['propatt'] = $rowcontent['propatt'];	
			$data_insert['gmap'] = $rowcontent['gmap'];							
			$data_insert['caddress'] = $rowcontent['caddress'];							
			$data_insert['street'] = $rowcontent['street'];	
			$data_insert['authorid'] = $rowcontent['authorid'];							
			$data_insert['allowed_comm'] = $rowcontent['allowed_comm'];
			foreach( $field_lang as $field_lang_i ) {
				list( $flang, $fname ) = $field_lang_i;
				$data_insert[$flang . '_' . $fname] = $rowcontent[$fname];
			}

			$rowcontent['id'] = $db->insert_id( $sql, 'catid', $data_insert );

			if( $rowcontent['id'] > 0 ) {
				$auto_product_code = '';
				if( ! empty( $pro_config['format_code_id'] ) and empty( $rowcontent['product_code'] ) ) {
					$i = 1;
					$auto_product_code = vsprintf( $pro_config['format_code_id'], $rowcontent['id'] );

					$stmt = $db->prepare( 'SELECT id FROM ' . $db_config['prefix'] . '_' . $module_data . '_rows WHERE product_code= :product_code' );
					$stmt->bindParam( ':product_code', $auto_product_code, PDO::PARAM_STR );
					$stmt->execute();
					while( $stmt->rowCount() )
					{
						$auto_product_code = vsprintf( $pro_config['format_code_id'], ( $rowcontent['id'] + $i++ ) );
					}

					$stmt = $db->prepare( 'UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_rows SET product_code= :product_code WHERE id=' . $rowcontent['id'] );
					$stmt->bindParam( ':product_code', $auto_product_code, PDO::PARAM_STR );
					$stmt->execute();
				}

				nv_fix_group_count( $rowcontent['group_id'] );
				nv_insert_logs( NV_LANG_DATA, $module_name, 'Add A Product', 'ID: ' . $rowcontent['id'], $admin_info['userid'] );
			} else {
				$error = $lang_module['errorsave'];
			}
		} else {
			$rowcontent_old = $db->query( 'SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_rows where id=' . $rowcontent['id'] )->fetch();
			$rowcontent['user_id'] = $rowcontent_old['user_id'];
			if( $rowcontent_old['status'] == 1 ) {
				$rowcontent['status'] = 1;
			}
			if( intval( $rowcontent['publtime'] ) < intval( $rowcontent_old['addtime'] ) ) {
				$rowcontent['publtime'] = $rowcontent_old['addtime'];
			}
			if( $rowcontent['status'] == 1 and $rowcontent['publtime'] > NV_CURRENTTIME ) {
				$rowcontent['status'] = 2;
			}

			$stmt = $db->prepare( "UPDATE " . $db_config['prefix'] . "_" . $module_data . "_rows SET
			 listcatid= :listcatid,
			 group_id= :group_id,
			 user_id=" . intval( $rowcontent['user_id'] ) . ",
			 r_id=" . intval( $rowcontent['r_id'] ) . ",
			 status=" . intval( $rowcontent['status'] ) . ",
			 publtime=" . intval( $rowcontent['publtime'] ) . ",
			 exptime=" . intval( $rowcontent['exptime'] ) . ",
			 edittime= " . NV_CURRENTTIME . " ,
			 archive=" . intval( $rowcontent['archive'] ) . ",
			 product_code = :product_code,
			 product_number = product_number + " . intval( $rowcontent['product_number'] ) . ",
			 product_price = " . $rowcontent['product_price'] . ",
			 product_discounts = " . intval( $rowcontent['product_discounts'] ) . ",
			 money_unit = :money_unit,
			 product_unit = " . intval( $rowcontent['product_unit'] ) . ",
			 homeimgfile= :homeimgfile,
			 homeimgalt= :homeimgalt,
			 otherimage= :otherimage,
			 homeimgthumb= :homeimgthumb,
			 imgposition=" . intval( $rowcontent['imgposition'] ) . ",
			 copyright=" . intval( $rowcontent['copyright'] ) . ",
			 inhome=" . intval( $rowcontent['inhome'] ) . ",
			 layout_func= :layout_func,
			 property= :property,			 
			 propatt= :propatt,			 
			 gmap= :gmap,				 
			 caddress= :caddress,			 
			 street= :street,		
			 authorid= :authorid,			 
			 allowed_comm= :allowed_comm,
			 allowed_rating=" . intval( $rowcontent['allowed_rating'] ) . ",
			 allowed_send=" . intval( $rowcontent['allowed_send'] ) . ",
			 allowed_print=" . intval( $rowcontent['allowed_print'] ) . ",
			 allowed_save=" . intval( $rowcontent['allowed_save'] ) . ",
			 showprice = " . intval( $rowcontent['showprice'] ) . ",
			 " . NV_LANG_DATA . "_title= :title,
			 " . NV_LANG_DATA . "_alias= :alias,
			 " . NV_LANG_DATA . "_keywords= :keywords,			 
			 " . NV_LANG_DATA . "_hometext= :hometext,
			 " . NV_LANG_DATA . "_address= :address,
			 " . NV_LANG_DATA . "_design= :design,			 
			 " . NV_LANG_DATA . "_utility= :utility,
			 " . NV_LANG_DATA . "_policy= :policy,			 
			 " . NV_LANG_DATA . "_bodytext= :bodytext,
			 " . NV_LANG_DATA . "_support= :support,
			 " . NV_LANG_DATA . "_realtitle= :realtitle,
			 " . NV_LANG_DATA . "_realinfo= :realinfo			 
			WHERE id =" . $rowcontent['id'] );

			$stmt->bindParam( ':listcatid', $rowcontent['listcatid'], PDO::PARAM_STR );
			$stmt->bindParam( ':group_id', $rowcontent['group_id'], PDO::PARAM_STR );
			$stmt->bindParam( ':product_code', $rowcontent['product_code'], PDO::PARAM_STR );
			$stmt->bindParam( ':money_unit', $rowcontent['money_unit'], PDO::PARAM_STR );
			$stmt->bindParam( ':homeimgfile', $rowcontent['homeimgfile'], PDO::PARAM_STR );
			$stmt->bindParam( ':homeimgalt', $rowcontent['homeimgalt'], PDO::PARAM_STR );
			$stmt->bindParam( ':otherimage', $rowcontent['otherimage'], PDO::PARAM_STR );
			$stmt->bindParam( ':homeimgthumb', $rowcontent['homeimgthumb'], PDO::PARAM_STR );
			$stmt->bindParam(':layout_func', $rowcontent['layout_func'], PDO::PARAM_STR);
			$stmt->bindParam(':property', $rowcontent['property'], PDO::PARAM_STR);		
			$stmt->bindParam(':propatt', $rowcontent['propatt'], PDO::PARAM_STR);				
			$stmt->bindParam(':gmap', $rowcontent['gmap'], PDO::PARAM_STR);				
			$stmt->bindParam(':caddress', $rowcontent['caddress'], PDO::PARAM_STR);				
			$stmt->bindParam(':street', $rowcontent['street'], PDO::PARAM_STR);	
			$stmt->bindParam(':authorid', $rowcontent['authorid'], PDO::PARAM_STR);				
			$stmt->bindParam( ':allowed_comm', $rowcontent['allowed_comm'], PDO::PARAM_STR );
			$stmt->bindParam( ':title', $rowcontent['title'], PDO::PARAM_STR );
			$stmt->bindParam( ':alias', $rowcontent['alias'], PDO::PARAM_STR );
			$stmt->bindParam( ':keywords', $rowcontent['keywords'], PDO::PARAM_STR );			
			$stmt->bindParam( ':hometext', $rowcontent['hometext'], PDO::PARAM_STR );
			$stmt->bindParam( ':address', $rowcontent['address'], PDO::PARAM_STR );		
			$stmt->bindParam( ':design', $rowcontent['design'], PDO::PARAM_STR );			
			$stmt->bindParam( ':utility', $rowcontent['utility'], PDO::PARAM_STR );
			$stmt->bindParam( ':policy', $rowcontent['policy'], PDO::PARAM_STR );			
			$stmt->bindParam( ':bodytext', $rowcontent['bodytext'], PDO::PARAM_STR );
			$stmt->bindParam( ':support', $rowcontent['support'], PDO::PARAM_STR );
			$stmt->bindParam( ':realtitle', $rowcontent['realtitle'], PDO::PARAM_STR );
			$stmt->bindParam( ':realinfo', $rowcontent['realinfo'], PDO::PARAM_STR );				

			if( $stmt->execute() ){
				nv_fix_group_count( $rowcontent['group_id'] );
				if( $rowcontent_old['group_id'] != $rowcontent['group_id'] ) nv_fix_group_count( $rowcontent_old['group_id'] );
				nv_insert_logs( NV_LANG_DATA, $module_name, 'Edit A Product', 'ID: ' . $rowcontent['id'], $admin_info['userid'] );
			} else {
				$error = $lang_module['errorsave'];
			}
		}
		
		nv_set_status_module();

		if( $error == '' ) {
			$db->query( "DELETE FROM " . $db_config['prefix'] . "_" . $module_data . "_block WHERE id = " . $rowcontent['id'] );

			foreach( $id_block_content as $bid_i ) {
				$db->query( "INSERT INTO " . $db_config['prefix'] . "_" . $module_data . "_block (bid, id, weight) VALUES ('" . $bid_i . "', '" . $rowcontent['id'] . "', '0')" );
			}

			foreach( $array_real_block_module as $bid_i ) {
				nv_news_fix_block( $bid_i );
			}

			$nv_Cache->delMod( $module_name );
			Header( 'Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=items' );
			die();
		}
		$nv_Cache->delMod( $module_name );
	}

} elseif ( $rowcontent['id'] > 0 ) {
	
	$rowdata = $db->query( "SELECT * FROM " . $db_config['prefix'] . "_" . $module_data . "_rows where id=" . $rowcontent['id'] )->fetch();
	$rowcontent = array(
		'id' => $rowdata['id'],
		'listcatid' => $rowdata['listcatid'],
		'group_id' => $rowdata['group_id'],
		'user_id' => $rowdata['user_id'],
		'r_id' => $rowdata['r_id'],
		'addtime' => $rowdata['addtime'],
		'edittime' => $rowdata['edittime'],
		'status' => $rowdata['status'],
		'publtime' => $rowdata['publtime'],
		'exptime' => $rowdata['exptime'],
		'archive' => $rowdata['archive'],
		'product_code' => $rowdata['product_code'],
		'product_number' => $rowdata['product_number'],
		'product_price' => $rowdata['product_price'],
		'product_discounts' => $rowdata['product_discounts'],
		'money_unit' => $rowdata['money_unit'],
		'product_unit' => $rowdata['product_unit'],
		'homeimgfile' => $rowdata['homeimgfile'],
		'homeimgthumb' => $rowdata['homeimgthumb'],
		'homeimgalt' => $rowdata['homeimgalt'],
		'otherimage' => $rowdata['otherimage'],
		'imgposition' => $rowdata['imgposition'],
		'copyright' => $rowdata['copyright'],
		'inhome' => $rowdata['inhome'],
		'layout_func' => $rowdata['layout_func'],
		'property' => $rowdata['property'],	
		'propatt' => $rowdata['propatt'],				
		'caddress' => $rowdata['caddress'],	
		'gmap' => $rowdata['gmap'],									
		'street' => $rowdata['street'],		
		'authorid' => $rowdata['authorid'],				
		'allowed_comm' => $rowdata['allowed_comm'],
		'allowed_rating' => $rowdata['allowed_rating'],
		'ratingdetail' => $rowdata['ratingdetail'],
		'allowed_send' => $rowdata['allowed_send'],
		'allowed_print' => $rowdata['allowed_print'],
		'allowed_save' => $rowdata['allowed_save'],
		'hitstotal' => $rowdata['hitstotal'],
		'hitscm' => $rowdata['hitscm'],
		'hitslm' => $rowdata['hitslm'],
		'showprice' => $rowdata['showprice'],
		'title' => $rowdata[NV_LANG_DATA . '_title'],
		'alias' => $rowdata[NV_LANG_DATA . '_alias'],
		'keywords' => $rowdata[NV_LANG_DATA . '_keywords'],		
		'hometext' => $rowdata[NV_LANG_DATA . '_hometext'],
		'address' => $rowdata[NV_LANG_DATA . '_address'],	
		'design' => $rowdata[NV_LANG_DATA . '_design'],		
		'utility' => $rowdata[NV_LANG_DATA . '_utility'],
		'policy' => $rowdata[NV_LANG_DATA . '_policy'],		
		'bodytext' => $rowdata[NV_LANG_DATA . '_bodytext'],
		'support' => $rowdata[NV_LANG_DATA . '_support'],
		'realtitle' => $rowdata[NV_LANG_DATA . '_realtitle'],
		'realinfo' => $rowdata[NV_LANG_DATA . '_realinfo']		
	);

	$page_title = $lang_module['content_edit'];

	$rowcontent['rtext'] = '';

	$id_block_content = array();
	$sql = 'SELECT bid FROM ' . $db_config['prefix'] . '_' . $module_data . '_block where id=' . $rowcontent['id'];
	$result = $db->query( $sql );

	while( list( $bid_i ) = $result->fetch( 3 ) ) {
		$id_block_content[] = $bid_i;
	}
	
}

if( ! empty( $rowcontent['homeimgfile'] ) and file_exists( NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $rowcontent['homeimgfile'] ) ){
	$rowcontent['homeimgfile'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $rowcontent['homeimgfile'];
}


$sql = 'SELECT rid, ' . NV_LANG_DATA . '_title FROM ' . $db_config['prefix'] . '_' . $module_data . '_real_type ORDER BY weight ASC';
$result = $db->query( $sql );
$array_real_type_module = array();
$array_real_type_module[0] = $lang_module['real_type_sl'];
while( list( $rid_i, $title_i ) = $result->fetch( 3 ) ) {
	$array_real_type_module[$rid_i] = $title_i;
}

// Author
$_sql = 'SELECT userid, first_name, last_name FROM ' . $db_config['prefix'] . '_users ORDER BY userid ASC';
$_result = $db->query( $_sql );
$array_authorid_module = array();
$array_authorid_module[0] = $lang_module['author_sl'];
while( list( $userid_i, $first_name_i, $last_name_i ) = $_result->fetch( 3 ) ) {
	$array_authorid_module[$userid_i] = $first_name_i . ' ' . $last_name_i;
}

$tdate = date( 'H|i', $rowcontent['publtime'] );
$publ_date = date( 'd/m/Y', $rowcontent['publtime'] );
list( $phour, $pmin ) = explode( '|', $tdate );
if( $rowcontent['exptime'] == 0 ) {
	$emin = $ehour = 0;
	$exp_date = '';
} else {
	$exp_date = date( 'd/m/Y', $rowcontent['exptime'] );
	$tdate = date( 'H|i', $rowcontent['exptime'] );
	list( $ehour, $emin ) = explode( '|', $tdate );
}

if( ! empty( $rowcontent['otherimage'] ) ){
	$otherimage = explode( '|', $rowcontent['otherimage'] );	
} else {
	$otherimage = array();
}
	
if( ! empty( $rowcontent['gmap'] ) ){
	$gmap = explode( '|', $rowcontent['gmap'] );
} else {
	$gmap = array();
}

if( ! empty( $rowcontent['propatt'] ) ){
	$propatt = explode( '|', $rowcontent['propatt'] );
} else {
	$propatt = array();
}
$xtpl = new XTemplate( 'content.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'rowcontent', $rowcontent );
$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL );
$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE );
$xtpl->assign( 'NV_OP_VARIABLE', NV_OP_VARIABLE );
$xtpl->assign( 'module_name', $module_name );
$xtpl->assign( 'module_upload', $module_upload );
$xtpl->assign( 'CURRENT', NV_UPLOADS_DIR . '/' . $module_upload );

if( $error != '' ) {
	$xtpl->assign( 'error', $error );
	$xtpl->parse( 'main.error' );
}

if( $rowcontent['status'] == 1 ) {
	$xtpl->parse( 'main.status' );
} else {
	$xtpl->parse( 'main.status0' );
}

// Property atrribute
if( !empty($propatt) ) {
	$xtpl->assign('prop_area', $propatt[0]);	
	$xtpl->assign('prop_bedr', $propatt[1]);
	$xtpl->assign('prop_floor', $propatt[2]);
	$xtpl->assign('prop_front', $propatt[3]);
	$xtpl->assign('prop_wc', $propatt[4]);	
	$xtpl->assign('prop_dir', $propatt[5]);	
}

// Gmap
if( !empty($gmap) ) {
	$xtpl->assign('GMAP_AD', $gmap[0]);	
	$xtpl->assign('GMAP_CL', $gmap[1]);
	$xtpl->assign('GMAP_CN', $gmap[2]);
	$xtpl->assign('CMAP_L', $gmap[3]);
	$xtpl->assign('GMAP_N', $gmap[4]);	
	$xtpl->assign('GMAP_Z', $gmap[5]);	
}

// Other image
$items = 0;
if( ! empty( $otherimage ) )
{
	foreach( $otherimage as $otherimage_i ) {
		if( ! empty( $otherimage_i ) and file_exists( NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $otherimage_i ) )
		{
			$otherimage_i = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $otherimage_i;
		}
		$data_otherimage_i = array( 'id' => $items, 'value' => $otherimage_i );
		$xtpl->assign( 'DATAOTHERIMAGE', $data_otherimage_i );
		$xtpl->parse( 'main.otherimage' );
		++$items;
	}
}
$xtpl->assign( 'FILE_ITEMS', $items );


// List catalogs
$sql = 'SELECT catid, ' . NV_LANG_DATA . '_title, lev, numsubcat FROM ' . $db_config['prefix'] . '_' . $module_data . '_catalogs ORDER BY sort ASC';
$result_cat = $db->query( $sql );
if( $result_cat->rowCount() == 0 )
{
	Header( 'Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=cat' );
	die();
}

while( list( $catid_i, $title_i, $lev_i, $numsubcat_i ) = $result_cat->fetch( 3 ) )
{
	if( $rowcontent['listcatid'] == 0 ) $rowcontent['listcatid'] = $catid_i;

	$xtitle_i = '';
	if( $lev_i > 0 )
	{
		for( $i = 1; $i <= $lev_i; $i++ )
		{
			$xtitle_i .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		}
	}

	$select = ( $catid_i == $rowcontent['listcatid'] ) ? ' selected=\'selected\'' : '';

	$xtpl->assign( 'xtitle_i', $xtitle_i );
	$xtpl->assign( 'title_i', $title_i );
	$xtpl->assign( 'catid_i', $catid_i );
	$xtpl->assign( 'select', $select );

	$xtpl->parse( 'main.rowscat' );
}

// List group
if( ! empty( $rowcontent['group_id'] ) )
{
	$array_groupid_in_row = explode( ',', $rowcontent['group_id'] );
}
else
{
	$array_groupid_in_row = array();
}

$inrow = nv_base64_encode( serialize( $array_groupid_in_row ) );
$xtpl->assign( 'url_load', NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=getgroup&cid=' . $rowcontent['listcatid'] . '&inrow=' . $inrow );
$xtpl->assign( 'inrow', $inrow );
$xtpl->parse( 'main.listgroup' );

// Time update
$xtpl->assign( 'publ_date', $publ_date );
$select = '';
for( $i = 0; $i <= 23; $i++ )
{
	$select .= "<option value=\"" . $i . "\"" . ( ( $i == $phour ) ? " selected=\"selected\"" : "" ) . ">" . str_pad( $i, 2, "0", STR_PAD_LEFT ) . "</option>\n";
}
$xtpl->assign( 'phour', $select );

$select = "";
for( $i = 0; $i < 60; $i++ )
{
	$select .= "<option value=\"" . $i . "\"" . ( ( $i == $pmin ) ? " selected=\"selected\"" : "" ) . ">" . str_pad( $i, 2, "0", STR_PAD_LEFT ) . "</option>\n";
}
$xtpl->assign( 'pmin', $select );


// Time exp
$xtpl->assign( 'exp_date', $exp_date );
$select = "";
for( $i = 0; $i <= 23; $i++ )
{
	$select .= "<option value=\"" . $i . "\"" . ( ( $i == $ehour ) ? " selected=\"selected\"" : "" ) . ">" . str_pad( $i, 2, "0", STR_PAD_LEFT ) . "</option>\n";
}
$xtpl->assign( 'ehour', $select );

$select = "";
for( $i = 0; $i < 60; $i++ )
{
	$select .= "<option value=\"" . $i . "\"" . ( ( $i == $emin ) ? " selected=\"selected\"" : "" ) . ">" . str_pad( $i, 2, "0", STR_PAD_LEFT ) . "</option>\n";
}
$xtpl->assign( 'emin', $select );

// Lua chon Layout
foreach ($layout_array as $value) {
    $value = preg_replace($global_config['check_op_layout'], '\\1', $value);
    $xtpl->assign('LAYOUT_FUNC', array(
        'key' => $value,
        'selected' => ($rowcontent['layout_func'] == $value) ? ' selected="selected"' : ''
    ));
    $xtpl->parse('main.layout_func');
}

// Property
$property_ck = $rowcontent['property'] ? " checked=\"checked\"" : "";
$xtpl->assign('ck_property', $property_ck);

// Allowed comm
$allowed_comm = explode( ',', $rowcontent['allowed_comm'] );
foreach( $groups_list as $_group_id => $_title )
{
	$xtpl->assign( 'ALLOWED_COMM', array(
		'value' => $_group_id,
		'checked' => in_array( $_group_id, $allowed_comm ) ? ' checked="checked"' : '',
		'title' => $_title
	) );
	$xtpl->parse( 'main.allowed_comm' );
}

// Real_type
$select = "";
while( list( $rid_i, $real_type_title_i ) = each( $array_real_type_module ) ) {
	$real_type_sl = ( $rid_i == $rowcontent['r_id'] ) ? " selected=\"selected\"" : "";
	$select .= "<option value=\"" . $rid_i . "\" " . $real_type_sl . ">" . $real_type_title_i . "</option>\n";
}
$xtpl->assign( 'rid', $select );

// Author
$_select = "";
while( list( $userid_i, $author_name_i ) = each( $array_authorid_module ) ) {
	$authorid_sl = ( $userid_i == $rowcontent['authorid'] ) ? " selected=\"selected\"" : "";
	$_select .= "<option value=\"" . $userid_i . "\" " . $authorid_sl . ">" . $author_name_i . "</option>\n";
}
$xtpl->assign( 'authorid', $_select );

$rowcontent['hometext'] = htmlspecialchars( nv_editor_br2nl( $rowcontent['hometext'] ) ); //Edit hometext
if( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) ) {
	$edits_hometext = nv_aleditor( 'hometext', '100%', '300px', $rowcontent['hometext'] );
} else {
	$edits_hometext = "<textarea style=\"width: 100%\" name=\"hometext\" id=\"hometext\" cols=\"20\" rows=\"15\">" . $rowcontent['hometext'] . "</textarea>";
}

$rowcontent['address'] = htmlspecialchars( nv_editor_br2nl( $rowcontent['address'] ) ); //Edit address
if( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) ) {
	$edits_address = nv_aleditor( 'address', '100%', '300px', $rowcontent['address'] );
} else {
	$edits_address = "<textarea style=\"width: 100%\" name=\"address\" id=\"address\" cols=\"20\" rows=\"15\">" . $rowcontent['address'] . "</textarea>";
}

$rowcontent['design'] = htmlspecialchars( nv_editor_br2nl( $rowcontent['design'] ) ); //Edit design
if( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) ) {
	$edits_design = nv_aleditor( 'design', '100%', '300px', $rowcontent['design'] );
} else {
	$edits_design = "<textarea style=\"width: 100%\" name=\"design\" id=\"design\" cols=\"20\" rows=\"15\">" . $rowcontent['design'] . "</textarea>";
}

$rowcontent['utility'] = htmlspecialchars( nv_editor_br2nl( $rowcontent['utility'] ) ); //Edit utility
if( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) ) {
	$edits_utility = nv_aleditor( 'utility', '100%', '300px', $rowcontent['utility'] );
} else {
	$edits_utility = "<textarea style=\"width: 100%\" name=\"utility\" id=\"utility\" cols=\"20\" rows=\"15\">" . $rowcontent['utility'] . "</textarea>";
}

$rowcontent['policy'] = htmlspecialchars( nv_editor_br2nl( $rowcontent['policy'] ) ); //Edit policy
if( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) ) {
	$edits_policy = nv_aleditor( 'policy', '100%', '300px', $rowcontent['policy'] );
} else {
	$edits_policy = "<textarea style=\"width: 100%\" name=\"policy\" id=\"policy\" cols=\"20\" rows=\"15\">" . $rowcontent['policy'] . "</textarea>";
}

$rowcontent['bodytext'] = htmlspecialchars( nv_editor_br2nl( $rowcontent['bodytext'] ) ); //Edit policy
if( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) ) {
	$edits_bodytext = nv_aleditor( 'bodytext', '100%', '300px', $rowcontent['bodytext'] );
} else {
	$edits_bodytext = "<textarea style=\"width: 100%\" name=\"bodytext\" id=\"bodytext\" cols=\"20\" rows=\"15\">" . $rowcontent['bodytext'] . "</textarea>";
}

$rowcontent['support'] = htmlspecialchars( nv_editor_br2nl( $rowcontent['support'] ) ); //Edit support
if( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) ) {
	$edits_support = nv_aleditor( 'support', '100%', '300px', $rowcontent['support'] );
} else {
	$edits_support = "<textarea style=\"width: 100%\" name=\"support\" id=\"support\" cols=\"20\" rows=\"15\">" . $rowcontent['support'] . "</textarea>";
}

$rowcontent['realinfo'] = htmlspecialchars( nv_editor_br2nl( $rowcontent['realinfo'] ) ); //Edit policy
if( defined( 'NV_EDITOR' ) and function_exists( 'nv_aleditor' ) ) {
	$edits_realinfo = nv_aleditor( 'realinfo', '100%', '120px', $rowcontent['realinfo'] );
} else {
	$edits_realinfo = "<textarea style=\"width: 100%\" name=\"realinfo\" id=\"realinfo\" cols=\"20\" rows=\"15\">" . $rowcontent['realinfo'] . "</textarea>";
}

$shtm = "";
if( count( $array_real_block_module ) > 0 )
{
	foreach( $array_real_block_module as $bid_i => $bid_title )
	{
		$ch = in_array( $bid_i, $id_block_content ) ? " checked=\"checked\"" : "";
		$shtm .= "<input style=\"margin:5px 3px 5px 0\" class=\"news_checkbox\" type=\"checkbox\" name=\"bids[]\" value=\"" . $bid_i . "\"" . $ch . ">" . $bid_title . "<br />\n";
	}
	$xtpl->assign( 'row_block', $shtm );
	$xtpl->parse( 'main.real_block' );
}

// List pro_unit
$sql = 'SELECT id, ' . NV_LANG_DATA . '_title FROM ' . $db_config['prefix'] . '_' . $module_data . '_units';
$result_unit = $db->query( $sql );
if( $result_unit->rowCount() == 0 )
{
	Header( 'Location: ' . NV_BASE_ADMINURL . 'index.php?' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=prounit' );
	die();
}

while( list( $unitid_i, $title_i ) = $result_unit->fetch( 3 ) )
{
	$xtpl->assign( 'utitle', $title_i );
	$xtpl->assign( 'uid', $unitid_i );
	$uch = ( $rowcontent['product_unit'] == $unitid_i ) ? "selected=\"selected\"" : "";
	$xtpl->assign( 'uch', $uch );
	$xtpl->parse( 'main.rowunit' );
}

$archive_checked = ( $rowcontent['archive'] ) ? " checked=\"checked\"" : "";
$xtpl->assign( 'archive_checked', $archive_checked );

$inhome_checked = ( $rowcontent['inhome'] ) ? " checked=\"checked\"" : "";
$xtpl->assign( 'inhome_checked', $inhome_checked );

$allowed_rating_checked = ( $rowcontent['allowed_rating'] ) ? " checked=\"checked\"" : "";
$xtpl->assign( 'allowed_rating_checked', $allowed_rating_checked );

$allowed_send_checked = ( $rowcontent['allowed_send'] ) ? " checked=\"checked\"" : "";
$xtpl->assign( 'allowed_send_checked', $allowed_send_checked );

$allowed_print_checked = ( $rowcontent['allowed_print'] ) ? " checked=\"checked\"" : "";
$xtpl->assign( 'allowed_print_checked', $allowed_print_checked );

$allowed_save_checked = ( $rowcontent['allowed_save'] ) ? " checked=\"checked\"" : "";
$xtpl->assign( 'allowed_save_checked', $allowed_save_checked );

$showprice_checked = ( $rowcontent['showprice'] ) ? " checked=\"checked\"" : "";
$xtpl->assign( 'ck_showprice', $showprice_checked );

if( ! empty( $money_config ) )
{
	if($rowcontent['id'] > 0){
		foreach( $money_config as $currency => $info )
		{
			$info['select'] = ( $rowcontent['money_unit'] == $currency ) ? 'selected="selected"' : '';
			$xtpl->assign( 'MON', $info );
			$xtpl->parse( 'main.currency' );
		}
	}
	else
	{
		foreach( $money_config as $currency => $info )
		{
			$info['select'] = ( $info['is_config'] > 0 ) ? 'selected="selected"' : '';
			$xtpl->assign( 'MON', $info );
			$xtpl->parse( 'main.currency' );
		}
	}
}

$xtpl->assign( 'edit_hometext', $edits_hometext );
$xtpl->assign( 'edit_address', $edits_address );
$xtpl->assign( 'edit_design', $edits_design );
$xtpl->assign( 'edit_utility', $edits_utility );
$xtpl->assign( 'edit_policy', $edits_policy );
$xtpl->assign( 'edit_bodytext', $edits_bodytext );
$xtpl->assign( 'edit_support', $edits_support );
$xtpl->assign( 'edit_realinfo', $edits_realinfo );

if( $rowcontent['id'] > 0 )
{
	$xtpl->parse( 'main.edit' );
}
else
{
	$xtpl->parse( 'main.add' );
}

// Print tags
if (!empty($rowcontent['keywords'])) {
    $keywords_array = explode(',', $rowcontent['keywords']);
    foreach ($keywords_array as $keywords) {
        $xtpl->assign('KEYWORDS', $keywords);
        $xtpl->parse('main.keywords');
    }
}
if( empty( $rowcontent['alias'] ) )
{
	$xtpl->parse( 'main.getalias' );
}

$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';