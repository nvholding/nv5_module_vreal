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

if (! nv_function_exists('houzez_new_real_big')) {
    function houzez_block_config_real_big($module, $data_block, $lang_block)
    {
        global $nv_Cache, $db_config, $site_mods;
		
        $html = '<div class="form-group">';					
        $html .= '<label class="control-label col-sm-6">' . $lang_block['catid'] . '</label>';
				$sql = 'SELECT catid, lev, ' . NV_LANG_DATA . '_title AS title FROM ' . $db_config['prefix'] . '_' . $site_mods[$module]['module_data'] . '_catalogs ORDER BY sort ASC';
				$list = $nv_Cache->db($sql, '', $module);
        $html .= '<div class="col-sm-18">';
        $html .= '<div style="height: 160px; overflow: auto"><label><input type="checkbox" id="select_all">Check all</label><br/>';
				foreach ($list as $l) {
					$xtitle_i = '';
					if ($l['lev'] > 0) {
						for ($i = 1; $i <= $l['lev']; ++$i) {
							$xtitle_i .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
						}
					}
					$data_block['catid'] = !empty( $data_block['catid'] ) ? $data_block['catid'] : array();
					$html .= $xtitle_i . '<label><input type="checkbox" id="check" name="config_catid[]" value="' . $l['catid'] . '" ' . ((in_array($l['catid'], $data_block['catid'])) ? ' checked="checked"' : '') . '</input>' . $l['title'] . '</label><br />';
				}
        $html .= '</div></div></div>';
        $html .= '<script>';
		$html .= '			$("#select_all").change(function() {';
		$html .= '				var checkboxes = $(this).closest("form").find("[id^=check][type=checkbox]");';
		$html .= '				if($(this).is(":checked")) {';
		$html .= '					checkboxes.prop("checked", true);';
		$html .= '				} else {';
		$html .= '					checkboxes.prop("checked", false);';
		$html .= '				}';
		$html .= '			});';
        $html .= '</script>';			

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
		
        return $html;
    }

    function houzez_block_config_real_big_submit($module, $lang_block)
    {
        global $nv_Request;
        $return = array();
        $return['error'] = array();
        $return['config'] = array();
        $return['config']['catid'] = $nv_Request->get_array('config_catid', 'post', array());
        $return['config']['title_length'] = $nv_Request->get_int('config_title_length', 'post', 0);
        $return['config']['numrow'] = $nv_Request->get_int('config_numrow', 'post', 0);		
		$return['config']['orderby'] = $nv_Request->get_title('config_orderby', 'post', '');		
		
        return $return;
    }


	
    function houzez_new_real_big($block_config)
    {
        global $pro_config, $client_info, $db_config, $nv_Cache, $site_mods, $lang_global, $global_array_cat, $module_name, $global_config, $lang_module, $db, $module_config, $blockID;
        $module = $block_config['module'];
        $mod_data = $site_mods[$module]['module_data'];
        $mod_file = $site_mods[$module]['module_file'];
		$orderby = $block_config['orderby'];
		
        if (empty($block_config['catid'])) {
            return '';
        }
        $catid = implode(',', $block_config['catid']);
		
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
		
		
		if( file_exists( NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/vreal/block_vreal_sidebar_big.tpl' ) ){
			$block_theme = $global_config['module_theme'];
		} else {
			$block_theme = 'default';
		}
			$xtpl = new XTemplate( 'block_vreal_sidebar_big.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/vreal' );
		$xtpl->assign('LANG', $lang_module);
		$xtpl->assign('GLANG', $lang_global);	
        $xtpl->assign('NV_BASE_SITEURL', NV_BASE_SITEURL);
        $xtpl->assign('TEMPLATE', $block_theme);			
		
		$db->sqlreset()
			->select('id, listcatid, r_id, user_id, ' . NV_LANG_DATA . '_title AS title, ' . NV_LANG_DATA . '_alias AS alias, ' . NV_LANG_DATA . '_hometext AS hometext, homeimgfile, homeimgthumb, product_price, money_unit, product_unit, product_code, publtime, hitstotal, showprice, authorid')
			->from($db_config['prefix'] . '_' . $site_mods[$module]['module_data'] . '_rows t1')
			->where('listcatid IN(' . $catid . ')')
			->order($orderby)
			->limit($block_config['numrow']);
		$list = $nv_Cache->db($db->sql(), '', $module);
		
        if (! empty($list)) {					
            foreach ($list as $row) {
				$link = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $module . '&amp;' . NV_OP_VARIABLE . '=';
                $row['link'] = $link . $global_array_cat[$row['listcatid']]['alias'] . '/' . $row['alias'] . '-' . $row['id'] . $global_config['rewrite_exturl'];						   
                $row['title'] = nv_clean60($row['title'], $block_config['title_length']);
				$row['publtime'] = nv_date('d/m/Y', $row['publtime']);	
				$row['cat'] = $global_array_cat[$row['listcatid']]['title'];					
				$row['cat_link'] = $link . $global_array_cat[$row['listcatid']]['alias'];	
				
				$row['thumb_large'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $site_mods[$module]['module_upload'] . '/' . $row['homeimgfile'];
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
						
				
				if ($row['showprice'] == '1') {
					$sql = $db->query( 'SELECT * FROM ' . $db_config['prefix'] . '_' . $module . '_units WHERE id = ' . $row['product_unit'] );
					$data_unit = $sql->fetch();
					$data_unit['title'] = $data_unit[NV_LANG_DATA . '_title'];
					$product_unit = $data_unit['title'];								
					$xtpl->assign( 'product_price',  nice_number($row['product_price']) . ' ' . $row['money_unit'] . '/' . $product_unit);
					$xtpl->parse('main.loop.price');
				} else {
					$xtpl->parse('main.loop.contact');
				}

										
				$xtpl->assign('ROW', $row);		
				$xtpl->parse('main.loop');					
            }	
		$xtpl->parse('main');
		return $xtpl->text('main');					
		}
    }
}
if (defined('NV_SYSTEM')) {
    $content = houzez_new_real_big($block_config);
}