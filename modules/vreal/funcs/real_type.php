<?php

/**
 * @Project NUKEVIET 4.x
 * @Author QUOCVIET (quocvietposcovn@gmail)
 * @Copyright 20018
 * @License GNU/GPL version 2 or any later version
 * @Createdate 28/04/2018 12:54
 */

if (!defined('NV_IS_MOD_REAL')) {
    die('Stop!!!');
}

$nv_Request->get_int( 'sorts', 'session', 0 );
$sorts = $nv_Request->get_int( 'sort', 'post', 0 );
$sorts_old = $nv_Request->get_int( 'sorts', 'session', 0 );
$sorts = $nv_Request->get_int( 'sorts', 'post', $sorts_old );

$array_mod_title[] = array(
    'rid' => 0,
    'title' => 'Loại hình',
    'link' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $module_info['alias']['real_type']
);

$alias = isset( $array_op[1] ) ? $array_op[1] : '';
$real_type_array = array();

$rid = 0;
if (!empty($alias)) {
	
	$orderby = '';
	if( $sorts == 0 ){
		$orderby = 'id DESC';
	} elseif( $sorts == 1 ){
		$orderby = 'product_price ASC, id DESC';
	} else {
		$orderby = 'product_price DESC, id DESC';
	}
	
    $page = (isset($array_op[2]) and substr($array_op[2], 0, 5) == 'page-') ? intval(substr($array_op[2], 5)) : 1;

    $sth = $db_slave->prepare('SELECT rid, image, ' . NV_LANG_DATA . '_title as title, ' . NV_LANG_DATA . '_alias as alias FROM ' . $db_config['prefix'] . '_' . $module_data . '_real_type WHERE ' . NV_LANG_DATA . '_alias= :alias');
    $sth->bindParam(':alias', $alias, PDO::PARAM_STR);
    $sth->execute();

    list ($rid, $real_type_image, $page_title, $alias) = $sth->fetch(3);

    if ($rid > 0) {
        $base_url_rewrite = $base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $module_info['alias']['real_type'] . '/' . $alias;
        if ($page > 1) {
            $page_title .= ' ' . NV_TITLEBAR_DEFIS . ' ' . $lang_global['page'] . ' ' . $page;
            $base_url_rewrite .= '/page-' . $page;
        }
        $base_url_rewrite = nv_url_rewrite(str_replace('&amp;', '&', $base_url_rewrite), true);
        if ($_SERVER['REQUEST_URI'] != $base_url_rewrite and NV_MAIN_DOMAIN . $_SERVER['REQUEST_URI'] != $base_url_rewrite) {
            nv_redirect_real_type($base_url_rewrite);
        }

        $array_mod_title[] = array(
            'rid' => 0,
            'title' => $page_title,
            'link' => $base_url
        );

        $db_slave->sqlreset()
            ->select('COUNT(*)')
            ->from($db_config['prefix'] . '_' . $module_data . '_rows')
			->where('r_id= ' . $rid);
			
        $num_items = $db_slave->query($db_slave->sql())
            ->fetchColumn();

        $db_slave->select('id, listcatid, r_id, user_id, ' . NV_LANG_DATA . '_title AS title, ' . NV_LANG_DATA . '_alias AS alias, ' . NV_LANG_DATA . '_hometext AS hometext, homeimgfile, homeimgthumb, product_price, product_code, money_unit, publtime, hitstotal, showprice, product_unit, authorid')
			->order( $orderby )
			->limit($per_page)
            ->offset(($page - 1) * $per_page);

        $result = $db_slave->query($db_slave->sql());		
		
        while ($item = $result->fetch()) {
			
			$sql = $db->query( 'SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_units WHERE id = ' . $item['product_unit'] );
			$data_unit = $sql->fetch();
			$data_unit['title'] = $data_unit[NV_LANG_DATA . '_title'];
			$product_unit = $data_unit['title'];

/*			
			$db_slave->select('t1.bid, t1.' . NV_LANG_DATA . '_title, t1.' . NV_LANG_DATA . '_alias, t2.bid, t2.id')
				->from($db_config['prefix'] . '_' . $module_data . '_block_cat t1')	
				->join('INNER JOIN ' . $db_config['prefix'] . '_' . $module_data . '_block t2 ON t2.bid = t1.bid')	
				->where('t2.id = ' . $item['id']);
			$_result = $db_slave->query($db_slave->sql());			
			$data_blockcat = array();				
			while( list( $bid, $title, $alias, $_bid, $_id ) = $_result->fetch( 3 ) ) {
				$data_blockcat[] = array(
					'blockcat' => $title,
					'blockcat_link' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $module_info['alias']['blockcat'] . '/' . $alias
				);				
			}
			$item['data_blockcat'] = $data_blockcat;	
*/
			
            if ($item['homeimgthumb'] == 1) {
                //image thumb
                $item['thumb'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/' . $item['homeimgfile'];
            } elseif ($item['homeimgthumb'] == 2) {
                //image file
                $item['thumb'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $item['homeimgfile'];
            } elseif ($item['homeimgthumb'] == 3) {
                //image url
                $item['thumb'] = $item['homeimgfile'];
            } else {
                $item['thumb'] = '';
            }

			$item['thumb_large'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $item['homeimgfile'];		
            $item['link'] = $global_array_cat[$item['listcatid']]['link'] . '/' . $item['alias'] . '-' . $item['id'] . $global_config['rewrite_exturl'];
			
			if (!empty($item['authorid'])){
				$sql = $db->query('SELECT userid, first_name, last_name FROM ' . $db_config['prefix'] . '_users WHERE userid = ' . $item['authorid'] );
				$data_author = $sql->fetch();	
				$item['auth'] = $data_author['first_name'] . ' ' . $data_author['last_name'];
			} 	
		
            $real_type_array[] = $item;
        }
        $result->closeCursor();
        unset($result, $row);

        $generate_page = nv_alias_page($page_title, $base_url, $num_items, $per_page, $page);

        if (!empty($real_type_image)) {
            $real_type_image = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/real_type/' . $real_type_image;
            $meta_property['og:image'] = NV_MY_DOMAIN . $real_type_image;
        }
		
        $contents = real_type_theme($real_type_array, $generate_page, $page_title, $real_type_image, $sorts);
    } else {
        nv_redirect_real_type(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $module_info['alias']['real_type']);
    }
} else {
    $page_title = 'Loại hình';
    $key_words = $module_info['keywords'];

    $result = $db_slave->query('SELECT rid, image, weight, add_time as publtime, ' . NV_LANG_DATA . '_title as title, ' . NV_LANG_DATA . '_alias as alias FROM ' . $db_config['prefix'] . '_' . $module_data . '_real_type ORDER BY weight ASC');
    while ($item = $result->fetch()) {
        $item['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $module_info['alias']['real_type'] . '/' . $item['alias'];
		
        if (!empty($item['image']) and file_exists(NV_ROOTDIR . '/' . NV_FILES_DIR . '/' . $module_upload . '/real_type/' . $item['image'])) {
            //image thumb
            $item['thumb'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/real_type/' . $item['image'];
        } elseif (!empty($item['image'])) {
            //image file
            $item['thumb'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/real_type/' . $item['image'];
        } else {
            $item['thumb'] = '';
        }

		$db->sqlreset()->select('COUNT(*)')->from($db_config['prefix'] . '_' . $module_data . '_rows')->where('r_id = ' . $item['rid']);
		$item['numrow'] = $db->query( $db->sql() )->fetchColumn();
		
        $real_type_array[] = $item;
    }
    $result->closeCursor();
    unset($result, $row);

    $contents = real_type_theme($real_type_array, '', $page_title, '');
}
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';