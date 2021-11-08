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
    'bid' => 0,
    'title' => $lang_module['real_block'],
    'link' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $module_info['alias']['real_block']
);

$alias = isset( $array_op[1] ) ? $array_op[1] : '';
$real_block_array = array();

$bid = 0;
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

    $sth = $db_slave->prepare('SELECT bid, image, ' . NV_LANG_DATA . '_title as title, ' . NV_LANG_DATA . '_alias as alias, ' . NV_LANG_DATA . '_description as description, ' . NV_LANG_DATA . '_keywords as keywords FROM ' . $db_config['prefix'] . '_' . $module_data . '_real_block WHERE ' . NV_LANG_DATA . '_alias= :alias');
    $sth->bindParam(':alias', $alias, PDO::PARAM_STR);
    $sth->execute();

    list ($bid, $real_block_image, $page_title, $alias, $description, $key_words) = $sth->fetch(3);

    if ($bid > 0) {
        $base_url_rewrite = $base_url = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $module_info['alias']['real_block'] . '/' . $alias;
        if ($page > 1) {
            $page_title .= ' ' . NV_TITLEBAR_DEFIS . ' ' . $lang_global['page'] . ' ' . $page;
            $base_url_rewrite .= '/page-' . $page;
        }
        $base_url_rewrite = nv_url_rewrite(str_replace('&amp;', '&', $base_url_rewrite), true);
        if ($_SERVER['REQUEST_URI'] != $base_url_rewrite and NV_MAIN_DOMAIN . $_SERVER['REQUEST_URI'] != $base_url_rewrite) {
            nv_redirect_location($base_url_rewrite);
        }

        $array_mod_title[] = array(
            'bid' => 0,
            'title' => $page_title,
            'link' => $base_url
        );

        $db_slave->sqlreset()
            ->select('COUNT(*)')
            ->from($db_config['prefix'] . '_' . $module_data . '_rows as t1')
			->join('INNER JOIN ' . $db_config['prefix'] . '_' . $module_data . '_block as t2 WHERE t2.id= t1.id and t2.bid= ' . $bid);
			
        $num_items = $db_slave->query($db_slave->sql())
            ->fetchColumn();

        $db_slave->select('t1.id, t1.listcatid, t1.r_id, t1.user_id, t1.' . NV_LANG_DATA . '_title AS title, t1.' . NV_LANG_DATA . '_alias AS alias, t1.' . NV_LANG_DATA . '_hometext AS hometext, t1.homeimgfile, t1.homeimgthumb, t1.product_price, t1.product_code, t1.money_unit, t1.publtime, t1.hitstotal, t1.showprice, t1.product_unit, t1.authorid')
			->order( $orderby )
			->limit($per_page)
            ->offset(($page - 1) * $per_page);

        $result = $db_slave->query($db_slave->sql());
        while ($item = $result->fetch()) {
			
			$sql = $db->query( 'SELECT * FROM ' . $db_config['prefix'] . '_' . $module_data . '_units WHERE id = ' . $item['product_unit'] );
			$data_unit = $sql->fetch();
			$data_unit['title'] = $data_unit[NV_LANG_DATA . '_title'];
			$product_unit = $data_unit['title'];
			
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
		
            $real_block_array[] = $item;
        }
        $result->closeCursor();
        unset($result, $row);

        $generate_page = nv_alias_page($page_title, $base_url, $num_items, $per_page, $page);

        if (!empty($real_block_image)) {
            $real_block_image = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $module_upload . '/real_block/' . $real_block_image;
            $meta_property['og:image'] = NV_MY_DOMAIN . $real_block_image;
        }
		
        $contents = real_block_theme($real_block_array, $generate_page, $page_title, $description, $real_block_image, $sorts);
    } else {
        nv_redirect_location(NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $module_info['alias']['real_block']);
    }
} else {
    $page_title = $lang_module['real_block'];
    $key_words = $module_info['keywords'];

    $result = $db_slave->query('SELECT bid, image,  add_time as publtime, ' . NV_LANG_DATA . '_title as title, ' . NV_LANG_DATA . '_alias as alias, ' . NV_LANG_DATA . '_description as description, ' . NV_LANG_DATA . '_keywords as keywords FROM ' . $db_config['prefix'] . '_' . $module_data . '_real_block ORDER BY weight ASC');
    while ($item = $result->fetch()) {
		
        $item['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&amp;' . NV_OP_VARIABLE . '=' . $module_info['alias']['real_block'] . '/' . $item['alias'];
		
		if (!empty($item['image']) and file_exists(NV_ROOTDIR . '/' . NV_FILES_DIR . '/' . $module_upload . '/real_block/' . $item['image'])) {
            //image thumb
            $item['thumb'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/real_block/' . $item['image'];
        } elseif (!empty($item['image'])) {
            //image file
            $item['thumb'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/real_block/' . $item['image'];
        } else {
            $item['thumb'] = '';
        }

		$db->sqlreset()->select('COUNT(*)')
		->from($db_config['prefix'] . '_' . $module_data . '_block As t1')
		->join('INNER JOIN ' . $db_config['prefix'] . '_' . $module_name . '_rows As t2')	
		->where('t1.id = t2.id AND t1.bid = ' . $item['bid']);
		
		$item['numrow'] = $db->query( $db->sql() )->fetchColumn();		
		
		$real_block_array[] = $item;
    }
    $result->closeCursor();
    unset($result, $row);

    $contents = real_block_theme($real_block_array, '', $page_title, $description, '');
}
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';