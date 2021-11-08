<?php

/**
 * @Project NUKEVIET 4.x
 * @Author QUOCVIET (quocvietposcovn@gmail)
 * @copyright 2009
 * @License GNU/GPL version 2 or any later version
 * @Createdate 28/04/2018 12:54
 */

if( ! defined( 'NV_IS_MOD_REAL' ) ) die( 'Stop!!!' );

if( empty( $id ) )
{
	Header( 'Location: ' . nv_url_rewrite( NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name, true ) );
	exit();
}

// Thiet lap quyen xem chi tiet
$contents = '';
$publtime = 0;

$sql = $db->query( 'SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_rows WHERE id = ' . $id . ' AND status=1' );
$data_content = $sql->fetch();
$data_shop = array();

if( empty( $data_content ) ) {
	$nv_redirect = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name;
	redict_link( $lang_module['detail_do_not_view'], $lang_module['redirect_to_back_shops'], $nv_redirect );
}


$key_words = $data_content[NV_LANG_DATA . '_keywords'];
$description_detail = $data_content[NV_LANG_DATA . '_hometext'];
$page_title = !empty($data_content[NV_LANG_DATA . '_realtitle']) ? $data_content[NV_LANG_DATA . '_realtitle'] : $data_content[NV_LANG_DATA . '_title'];
$description = !empty($data_content[NV_LANG_DATA . '_realinfo']) ? $data_content[NV_LANG_DATA . '_realinfo'] : $data_content[NV_LANG_DATA . '_hometext'];

if( nv_user_in_groups( $global_array_cat[$catid]['groups_view'] ) ) {
	$sql = 'UPDATE ' . $db_config['prefix'] . '_' . $module_data . '_rows SET hitstotal=hitstotal+1 WHERE id=' . $id;
	$db->query( $sql );

	$catid = $data_content['listcatid'];
	$base_url_rewrite = nv_url_rewrite( NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $global_array_cat[$catid]['alias'] . '/' . $data_content[NV_LANG_DATA . '_alias'] . '-' . $data_content['id'] . $global_config['rewrite_exturl'], true );
	if( $_SERVER['REQUEST_URI'] != $base_url_rewrite ){
		Header( 'Location: ' . $base_url_rewrite );
		die();
	}
	
	$sql = $db->query( 'SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_units WHERE id = ' . $data_content['product_unit'] );
	$data_unit = $sql->fetch();
	$data_unit['title'] = $data_unit[NV_LANG_DATA . '_title'];
	$data_content['product_unit'] = $data_unit['title'];
	
	// Xac dinh anh lon
	$homeimgfile = $data_content['homeimgfile'];
	if( $data_content['homeimgthumb'] == 1 ) {//image thumb
		$data_content['homeimgthumb'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_name . '/' . $homeimgfile;
		$data_content['homeimgfile'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_name . '/' . $homeimgfile;
	} elseif( $data_content['homeimgthumb'] == 2 ) {//image file
		$data_content['homeimgthumb'] = $data_content['homeimgfile'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_name . '/' . $homeimgfile;
	} elseif( $data_content['homeimgthumb'] == 3 ) {//image url
		$data_content['homeimgthumb'] = $data_content['homeimgfile'] = $homeimgfile;
	} else {//no image
		$data_content['homeimgthumb'] = NV_BASE_SITEURL . 'themes/' . $module_info['template'] . '/images/' . $module_file . '/no-image.jpg';
	}
	
	//metatag image facebook
	$meta_property['og:image'] = NV_MY_DOMAIN . $data_content['homeimgthumb'];

	// Real type
	$sql = $db->query( 'SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_real_type WHERE rid = ' . $data_content['r_id'] );
	$data_temp = $sql->fetch();
	$data_content['real_type'] = $data_temp[NV_LANG_DATA . '_title'];
	$data_content['real_type_alias'] = $data_temp[NV_LANG_DATA . '_alias'];
	
	// Author
	$sql = $db->query( 'SELECT u1.userid, u1.first_name, u1.last_name, u1.email, u1.photo, u2.userid, u2.phone_number FROM ' . $db_config['prefix'] . '_users u1 INNER JOIN ' . $db_config['prefix'] . '_users_info u2 WHERE u1.userid = u2.userid AND u1.userid = ' . $data_content['authorid'] );
	$author = $sql->fetch();
	$data_content['author'] = $author['first_name'] . ' ' . $author['last_name'];
	$data_content['author_photo'] = $author['photo'];	
	$data_content['author_email'] = $author['email'];		
	$data_content['author_number'] = $author['phone_number'];	
	
	// Author info
	$sql = $db->query( 'SELECT * FROM ' . $db_config['prefix'] . '_users_info u2 INNER JOIN ' . $db_config['prefix'] . '_users u1 WHERE u1.userid = u2.userid AND u1.userid = ' . $data_content['authorid'] );
	$author_info = $sql->fetch();
	$data_content['facebook'] = $author_info['facebook'];	
	$data_content['google_plus'] = $author_info['google_plus'];		
	$data_content['twitter'] = $author_info['twitter'];	
	$data_content['youtube'] = $author_info['youtube'];
	
	// Fetch Limit
	$db->sqlreset()
		->select( ' id, ' . NV_LANG_DATA . '_title, ' . NV_LANG_DATA . '_alias, homeimgfile, homeimgthumb, addtime, publtime, product_code, product_price, product_discounts, money_unit, showprice, ' . NV_LANG_DATA . '_hometext, product_unit, hitstotal, authorid' )
		->from( $db_config['prefix'] . '_' . $module_data . '_rows' )
		->where( 'id!=' . $id . ' AND listcatid = ' . $data_content['listcatid'] . ' AND status=1' )
		->order( 'ID DESC' )
		->limit( $pro_config['per_row'] );
	$result = $db->query( $db->sql() );
	
	$data_others = array();
	while( list( $_id, $title, $alias, $homeimgfile, $homeimgthumb, $addtime, $publtime, $product_code, $product_price, $product_discounts, $money_unit, $showprice, $hometext, $product_unit, $hitstotal, $authorid ) = $result->fetch( 3 ) )
	{
		$sql = $db->query( 'SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_units WHERE id = ' . $product_unit );
		$data_unit = $sql->fetch();
		$data_unit['title'] = $data_unit[NV_LANG_DATA . '_title'];
		$product_unit = $data_unit['title'];	

		// Author
		$sql = $db->query( 'SELECT u1.userid As user, u1.first_name, u1.last_name, u1.email, u1.photo, u2.userid, u2.phone_number FROM ' . $db_config['prefix'] . '_users u1 INNER JOIN ' . $db_config['prefix'] . '_users_info u2 WHERE u1.userid = u2.userid AND u1.userid = ' . $authorid );
		$author = $sql->fetch();
		if ( $author['user'] > 0 ) {
			$_author = $author['first_name'] . ' ' . $author['last_name'];
		} else {
			$_author = '';
		}
		if( $homeimgthumb == 1 )//image thumb
		{
			$thumb = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_name . '/' . $homeimgfile;
		}
		elseif( $homeimgthumb == 2 )//image file
		{
			$thumb = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_name . '/' . $homeimgfile;
		}
		elseif( $homeimgthumb == 3 )//image url
		{
			$thumb = $homeimgfile;
		}
		else//no image
		{
			$thumb = NV_BASE_SITEURL . 'themes/' . $module_info['template'] . '/images/' . $module_name . '/no-image.jpg';	
		}
		
		$thumb_large = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_name . '/' . $homeimgfile;
		
		$data_others[] = array(
			'id' => $_id,
			'title' => $title,
			'alias' => $alias,
			'homeimgthumb' => $thumb,
			'thumb_large' => $thumb_large,			
			'hometext' => $hometext,
			'addtime' => $addtime,		
			'publtime' => $publtime,				
			'product_code' => $product_code,
			'product_price' => $product_price,
			'product_discounts' => $product_discounts,
			'money_unit' => $money_unit, 
			'showprice' => $showprice,
			'product_unit' => $product_unit,
			'hitstotal' => $hitstotal,	
			'author' => $_author,				
			'link_pro' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $global_array_cat[$data_content['listcatid']]['alias'] . '/' . $alias . '-' . $_id . $global_config['rewrite_exturl'],
			'link_order' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=setcart&amp;id=' . $_id
			);
	}

	$array_other_view = array();
	if( ! empty( $_SESSION[$module_data . '_proview'] ) )
	{
		$arrid = array();
		foreach( $_SESSION[$module_data . '_proview'] as $id_i => $data_i )
		{
			if( $id_i != $id )
			{
				$arrid[] = $id_i;
			}
		}
		$arrtempid = implode( ',', $arrid );
		if( ! empty( $arrtempid ) )
		{
			// Fetch Limit
			$db->sqlreset()->select( 'id, ' . NV_LANG_DATA . '_title, ' . NV_LANG_DATA . '_alias, homeimgfile, homeimgthumb, otherimage, addtime, publtime, product_code, product_price, product_discounts, money_unit, showprice, allowed_comm, ' . NV_LANG_DATA . '_hometext, product_unit, hitstotal' )->from( $db_config['prefix'] . '_' . $module_data . '_rows' )->where( 'id IN ( ' . $arrtempid . ') AND status=1' )->order( 'id DESC' )->limit( $pro_config['per_row'] * 2 );
			$result = $db->query( $db->sql() );

			while( list( $_id, $title, $alias, $homeimgfile, $homeimgthumb, $otherimage, $addtime, $publtime, $product_code, $product_price, $product_discounts, $money_unit, $showprice, $allowed_comm, $hometext, $product_unit, $hitstotal ) = $result->fetch( 3 ) )
			{			
				if( $homeimgthumb == 1 )//image thumb
				{
					$thumb = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_name . '/' . $homeimgfile;
				}
				elseif( $homeimgthumb == 2 )//image file
				{
					$thumb = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_name . '/' . $homeimgfile;
				}
				elseif( $homeimgthumb == 3 )//image url
				{
					$thumb = $homeimgfile;
				}
				else//no image
				{
					$thumb = NV_BASE_SITEURL . 'themes/' . $module_info['template'] . '/images/' . $module_name . '/no-image.jpg';
				}
				
				$thumb_large = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_name . '/' . $homeimgfile;

				$array_other_view[] = array(
					'id' => $_id,
					'title' => $title,
					'alias' => $alias,
					'homeimgthumb' => $thumb,
					'thumb_large' => $thumb_large,							
					'otherimage' => $otherimage,
					'hometext' => $hometext,
					'addtime' => $addtime,
					'publtime' => $publtime,						
					'product_code' => $product_code,
					'product_price' => $product_price,
					'product_discounts' => $product_discounts,
					'money_unit' => $money_unit,					
					'showprice' => $showprice,	
					'allowed_comm' => $allowed_comm,						
					'product_unit' => $product_unit,	
					'hitstotal' => $hitstotal,						
					'link_pro' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $global_array_cat[$data_content['listcatid']]['alias'] . '/' . $alias . '-' . $_id . $global_config['rewrite_exturl'],
					'link_order' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=setcart&amp;id=' . $_id );
			}

		}
	}

    if( ! empty( $data_content['ratingdetail'] ) )
	{
		$data_content['ratingdetail'] = unserialize( $data_content['ratingdetail'] );
	}
	else
	{
		$data_content['ratingdetail'] = array(
			1 => 0,
			2 => 0,
			3 => 0,
			4 => 0,
			5 => 0 );
	}

	$total_value = array_sum( $data_content['ratingdetail'] );
    $total_value = ( $total_value == 0 )? 1 : $total_value;
	$data_content['percent_rate'] = array();

	$data_content['percent_rate'][1] = round( $data_content['ratingdetail'][1] * 100 / $total_value );
	$data_content['percent_rate'][2] = round( $data_content['ratingdetail'][2] * 100 / $total_value );
	$data_content['percent_rate'][3] = round( $data_content['ratingdetail'][3] * 100 / $total_value );
	$data_content['percent_rate'][4] = round( $data_content['ratingdetail'][4] * 100 / $total_value );
	$data_content['percent_rate'][5] = round( $data_content['ratingdetail'][5] * 100 / $total_value );

	$total_rate = $data_content['ratingdetail'][1] + ( $data_content['ratingdetail'][2] * 2 ) + ( $data_content['ratingdetail'][3] * 3 ) + ( $data_content['ratingdetail'][4] * 4 ) + ( $data_content['ratingdetail'][5] * 5 );
	$data_content['ratefercent_avg'] = round( $total_rate / $total_value, 1 );

	SetSessionProView( $data_content['id'], $data_content[NV_LANG_DATA . '_title'], $data_content[NV_LANG_DATA . '_alias'], $data_content['addtime'], NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=' . $global_array_cat[$catid]['alias'] . '/' . $data_content[NV_LANG_DATA . '_alias'] . '-' . $data_content['id'], $data_content['homeimgthumb'] );
	
    // comment
    if (isset($site_mods['comment']) and isset($module_config[$module_name]['activecomm'])) {
        define('NV_COMM_ID', $data_content['id']); // ID bài viết hoặc
        define('NV_COMM_AREA', $module_info['funcs'][$op]['func_id']); // để đáp ứng comment ở bất cứ đâu không cứ là bài viết
        // check allow comemnt
        $allowed = $module_config[$module_name]['allowed_comm']; // tuy vào module để lấy cấu hình. Nếu là module news thì có cấu hình theo bài viết
        if ($allowed == '-1') {
            $allowed = $data_content['allowed_comm'];
        }
        define('NV_PER_PAGE_COMMENT', 5); // Số bản ghi hiển thị bình luận
        require_once NV_ROOTDIR . '/modules/comment/comment.php';
        $area = (defined('NV_COMM_AREA')) ? NV_COMM_AREA : 0;
        $checkss = md5($module_name . '-' . $area . '-' . NV_COMM_ID . '-' . $allowed . '-' . NV_CACHE_PREFIX);
        
        $content_comment = nv_comment_module($module_name, $checkss, $area, NV_COMM_ID, $allowed, 1);
    } else {
        $content_comment = '';
    }	
	
	
    // Xu ly Layout tuy chinh
    $module_info['layout_funcs'][$op_file] = !empty($data_content['layout_func']) ? $data_content['layout_func'] : $module_info['layout_funcs'][$op_file];

	$detail_layout = ( $data_content['layout_func'] == "vreal-detail-2" ) ? "detail_2.tpl" : "detail.tpl";
	
	$contents = detail_product($data_content, $data_unit, $data_others, $data_shop, $array_other_view, $content_comment);
	
} else {
	$nv_redirect = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name;
	redict_link( $lang_module['detail_no_permission'], $lang_module['redirect_to_back_shops'], $nv_redirect );
}

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';