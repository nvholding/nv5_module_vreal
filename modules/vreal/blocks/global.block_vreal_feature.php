<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC <contact@vinades.vn>
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 3/9/2010 23:25
 */

if (! defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (! nv_function_exists('vreal_feature_product')) {
    function vreal_block_config_feature_product($module, $data_block, $lang_block)
    {
        global $nv_Cache, $db_config, $site_mods;

        $html = '<div class="form-group">';			
		$html .= '<label class="control-label col-sm-6">' . $lang_block['blockid'] . '</label>';
		$html .= '<div class="col-sm-18"><select name="config_blockid" class="form-control w100">';
		$sql = 'SELECT bid, '. NV_LANG_DATA .'_title AS title FROM '. $db_config['prefix'] . '_' . $site_mods[$module]['module_data'] .'_real_block ORDER BY weight ASC';
		$list = $nv_Cache->db( $sql, 'catid', $module );
		foreach( $list as $l )
		{
			$html .= '<option value="' . $l['bid'] . '" ' . ( ( $data_block['blockid'] == $l['bid'] ) ? ' selected="selected"' : '' ) . '>' . $l['title'] . '</option>';
		}
		$html .= '</select></div>';		
		$html .= '</div>';
		
        $html .= '<div class="form-group">';
        $html .= '<label class="control-label col-sm-6">' . $lang_block['title_length'] . '</label>';
        $html .= '<div class="col-sm-18">';
        $html .= '<input type="text" class="form-control w100 pull-left" name="config_title_length" value="' . $data_block['title_length'] . '"/>';
        $html .= '</div>';
        $html .= '</div>';

		$html .= '<div class="form-group">';
        $html .= '<label class="control-label col-sm-6">' . $lang_block['numrow'] . '</label>';
        $html .= '<div class="col-sm-18"><input type="text" name="config_numrow" class="form-control w100 pull-left" size="5" value="' . $data_block['numrow'] . '"/>';
        $html .= '</div>';
        $html .= '</div>';		
		
		$html .= '<div class="form-group">';		
		$html .= '<label class="control-label col-sm-6">' . $lang_block['orderby'] . '</label>';
		$html .= '<div class="col-sm-6"><select name="config_orderby" class="form-control w100">';
				$orderby = array(0 => $lang_block['recent'], 1 => $lang_block['oldest'], 2 => $lang_block['tophit'], 3 => $lang_block['random']);
				foreach( $orderby as $orderby_i ){
					$sl2 = ( $data_block['orderby'] == $orderby_i ) ? ' selected' : '';
		$html .= '<option value="' . $orderby_i . '" ' . $sl2 . '>' . $orderby_i . '</option>';}
		$html .= '	</select></div>';
		$html .= '</div>';			

		$html .= '<div class="form-group">';		
		$html .= '<label class="control-label col-sm-6">' . $lang_block['carousel'] . '</label>';
		$html .= '<div class="col-sm-6"><select name="config_carousel" class="form-control w200">';
				$carousel = array(0 => 'feature', 1 => 'feature_slider');
				foreach( $carousel as $carousel_i ){
					$sl1 = ( $data_block['carousel'] == $carousel_i ) ? ' selected' : '';
		$html .= '<option value="' . $carousel_i . '" ' . $sl1 . '>' . $carousel_i . '</option>';}
		$html .= '	</select></div>';
		$html .= '</div>';		
		
        return $html;
    }

    function vreal_block_config_feature_product_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = array();
        $return['error'] = array();
        $return['config'] = array();
		$return['config']['blockid'] = $nv_Request->get_int( 'config_blockid', 'post', 0 );		
        $return['config']['title_length'] = $nv_Request->get_int('config_title_length', 'post', 0);
        $return['config']['numrow'] = $nv_Request->get_int('config_numrow', 'post', 0);		
		$return['config']['orderby'] = $nv_Request->get_title('config_orderby', 'post', '');		
		$return['config']['carousel'] = $nv_Request->get_title('config_carousel', 'post', '');
		
        return $return;
    }
	
    function vreal_feature_product($block_config)
    {
        global $pro_config, $client_info, $module_info, $db_config, $nv_Cache, $site_mods, $lang_global, $global_array_cat, $module_name, $global_config, $lang_module, $db, $module_config, $blockID;
        $module = $block_config['module'];
        $mod_data = $site_mods[$module]['module_data'];
        $mod_file = $site_mods[$module]['module_file'];
		$orderby = $block_config['orderby'];
		$carousel = $block_config['carousel'];
		
		if ($block_config['orderby'] == 'Mới nhất') {
            $orderby = 'publtime DESC';
        } elseif ($block_config['orderby'] == 'Cũ nhất') {
             $orderby = 'publtime ASC';
        } elseif ($block_config['orderby'] == 'Xem nhiều') {
             $orderby = 'hitstotal DESC';
        } elseif ($block_config['orderby'] == 'Nên xem') {
             $orderby = 'rand()';
        }	

		
		$sql = 'SELECT catid, parentid, lev, ' . NV_LANG_DATA . '_title AS title, ' . NV_LANG_DATA . '_alias AS alias, viewcat, numsubcat, subcatid, numlinks, ' . NV_LANG_DATA . '_description AS description, inhome, ' . NV_LANG_DATA . '_keywords AS keywords, groups_view FROM ' . $db_config['prefix'] . '_' . $mod_data . '_catalogs ORDER BY sort ASC';
		$_list = $nv_Cache->db($sql, 'catid', $module);
            foreach ($_list as $_row) {
                $global_array_cat[$_row['catid']] = array(
                    'catid' => $_row['catid'],
                    'parentid' => $_row['parentid'],
                    'title' => $_row['title'],
                    'alias' => $_row['alias'],
                    'link' => NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=' . $_row['alias'],
                    'viewcat' => $_row['viewcat'],
                    'numsubcat' => $_row['numsubcat'],
                    'subcatid' => $_row['subcatid'],
                    'numlinks' => $_row['numlinks'],
                    'description' => $_row['description'],
                    'inhome' => $_row['inhome'],
                    'keywords' => $_row['keywords'],
                    'groups_view' => $_row['groups_view'],
                    'lev' => $_row['lev']
                );
		}
		unset($_list, $_row);	
		
		
		if( file_exists( NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/vreal/block_vreal_' . $carousel . '.tpl' ) ){
			$block_theme = $global_config['module_theme'];
		} 
		
		$xtpl = new XTemplate( 'block_vreal_' . $carousel . '.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/vreal' );
		$xtpl->assign('LANG', $lang_module);
		$xtpl->assign('GLANG', $lang_global);
		$xtpl->assign('TEMPLATE', $block_theme);		
		$xtpl->assign('BLOCKID', $blockID);
		$xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
		
		$db->sqlreset()
			->select('bid, '. NV_LANG_DATA .'_title AS title, ' . NV_LANG_DATA . '_alias AS alias')
			->from($db_config['prefix'] . '_' . $site_mods[$module]['module_data'] .'_real_block')
			->where('bid= ' . $block_config['blockid']);
		$list1 = $nv_Cache->db($db->sql(), '', $module);
		if (! empty($list1)) {
			 foreach ($list1 as $row1) {
				$xtpl->assign('REAL_BLOCK',$row1['title']);
				$xtpl->assign('REAL_BLOCK_LINK', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=real_block/' . $row1['alias']);	
			 }
		}
		
		$db->sqlreset()
			->select('t1.id, t1.listcatid, t1.r_id, t1.user_id, t1.' . NV_LANG_DATA . '_title AS title, t1.' . NV_LANG_DATA . '_alias AS alias, t1.' . NV_LANG_DATA . '_hometext AS hometext, t1.homeimgfile, t1.homeimgthumb, t1.product_price, t1.money_unit, t1.product_code, t1.publtime, t1.hitstotal, t1.showprice, t1.product_unit, t1.authorid')
			->from($db_config['prefix'] . '_' . $site_mods[$module]['module_data'] . '_rows t1')
			->join('INNER JOIN ' . $db_config['prefix'] . '_' . $site_mods[$module]['module_data'] . '_block t2')
			->where('t1.id = t2.id AND t2.bid= ' . $block_config['blockid'])	
			->order($orderby)
			->limit($block_config['numrow']);
		$list = $nv_Cache->db($db->sql(), '', $module);
		
        if (! empty($list)) {					
            foreach ($list as $stt => $row) {
                $row['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=' . $global_array_cat[$row['listcatid']]['alias'] . '/' . $row['alias'] . '-' . $row['id'] . $global_config['rewrite_exturl'];						   
                $row['title'] = nv_clean60($row['title'], $block_config['title_length']);
				$row['publtime'] = nv_date('d/m/Y', $row['publtime']);	
				
				$xtpl->assign('CAT', $global_array_cat[$row['listcatid']]['title']);
				$xtpl->assign('CATLINK', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=' . $global_array_cat[$row['listcatid']]['alias']);	
					
				if (!empty($row['authorid'])){					
				$db->sqlreset()
				->select('userid, first_name, last_name')
				->from($db_config['prefix'] . '_users')						
				->where('userid = '. $row['authorid']);
				$list3 = $nv_Cache->db($db->sql(), '', $module);
					foreach ($list3 as $l3) {
						$xtpl->assign('author', $l3['first_name'] . ' ' . $l3['last_name']);
					}						
				}
				
				$xtpl->parse('main.loop.author');
				$xtpl->parse('main.loop.author1');
				 if ($row['homeimgthumb'] == 1) {
                        $row['thumb'] = NV_BASE_SITEURL . NV_FILES_DIR . '/' . $site_mods[$module]['module_upload'] . '/' . $row['homeimgfile'];
                    } elseif ($row['homeimgthumb'] == 2) {
                        $row['thumb'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $site_mods[$module]['module_upload'] . '/' . $row['homeimgfile'];
                    } elseif ($row['homeimgthumb'] == 3) {
                        $row['thumb'] = $row['homeimgfile'];
                    } elseif (! empty($module_config[$module_name]['show_no_image'])) {
                        $row['thumb'] = NV_BASE_SITEURL . $module_config[$module_name]['show_no_image'];
                    } else {
                        $row['thumb'] = NV_BASE_SITEURL . 'themes/' . $global_config['site_theme'] . '/images/no-image.jpg';
                    }
					$row['thumb_large'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $site_mods[$module]['module_upload'] . '/' . $row['homeimgfile'];
					if( $pro_config['active_price'] == '1' ) {
						if( $row['showprice'] == '1' ) {	
						
							$sql = $db->query( 'SELECT * FROM ' . $db_config['prefix'] . '_' . $module . '_units WHERE id = ' . $row['product_unit'] );
							$data_unit = $sql->fetch();
							$data_unit['title'] = $data_unit[NV_LANG_DATA . '_title'];
							$product_unit = $data_unit['title'];										
							
							$xtpl->assign( 'product_price', nice_number( $row['product_price'] ) . ' ' . $row['money_unit'] .'/' . $product_unit );
							$xtpl->assign( 'class_money', 'money' );
							$xtpl->parse( 'main.loop.price' );
							$xtpl->parse( 'main.loop.price1' );
						} else {
							$xtpl->parse( 'main.loop.contact' );
							$xtpl->parse( 'main.loop.contact1' );
						}
					}		

					$db->sqlreset()
						->select('rid, ' . NV_LANG_DATA . '_title AS title, ' . NV_LANG_DATA . '_alias AS alias')
						->from($db_config['prefix'] . '_' . $site_mods[$module]['module_data'] . '_real_type')
						->where('rid = '. $row['r_id']);
					$list2 = $nv_Cache->db($db->sql(), '', $module);
					foreach ($list2 as $l2) {	
					$xtpl->assign('REAL_TYPE', $l2['title']);
					$xtpl->assign('REAL_TYPE_LINK', NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=real_type/' . $l2['alias']);
					}
					
					$xtpl->assign('i', $stt);						
                    $xtpl->assign('ROW', $row);		
					$xtpl->parse('main.loop');		
            }	
		$xtpl->parse('main');
		return $xtpl->text('main');					
		}
    }
}
if (defined('NV_SYSTEM')) {
    $content = vreal_feature_product($block_config);
}



