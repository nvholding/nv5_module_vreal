<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2017 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 04/18/2017 09:47
 */

if (!defined('NV_MAINFILE')) {
    die('Stop!!!');
}

if (!function_exists('vreal_block_list')) {

    function vreal_block_list($block_config)
    {
        global $nv_Cache, $db, $db_config, $site_mods, $module_name, $module_config, $global_config, $lang_module, $blockID;

        $module = $block_config['module'];
        $mod_data = $site_mods[$module]['module_data'];
        $mod_file = $site_mods[$module]['module_file'];
        $pro_config = $module_config[$module];

        if (file_exists(NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $mod_file . '/block_vreal_block_list.tpl')) {
            $block_theme = $global_config['module_theme'];
        } else {
            $block_theme = 'default';
        }

        $xtpl = new XTemplate('block_vreal_block_list.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/modules/' . $mod_file);
        $xtpl->assign('LANG', $lang_module);
		$xtpl->assign('BLOCKID', $blockID);	

        $sql = 'SELECT bid, ' . NV_LANG_DATA . '_title AS title, ' . NV_LANG_DATA . '_alias AS alias FROM ' . $db_config['prefix'] . '_' . $mod_data . '_real_block ORDER BY weight ASC';
        $list = $nv_Cache->db($sql, '', $module);

        foreach ($list as $row) {
		   $row['link'] = NV_BASE_SITEURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&amp;' . NV_NAME_VARIABLE . '=' . $mod_data . '&amp;' . NV_OP_VARIABLE . '=blockcat/' . $row['alias'];
 
           $xtpl->assign('ROW', $row);			

		   $db->sqlreset()->select('COUNT(*)')
			->from($db_config['prefix'] . '_' . $mod_data . '_rows As b1')
			->join('INNER JOIN ' . $db_config['prefix'] . '_' . $mod_data . '_block As b2')
			->where('b2.id = b1.id AND b2.bid = ' . $row['bid']);
			$numrow = $db->query( $db->sql() )->fetchColumn();			
			$xtpl->assign('numrow', $numrow);
			
            $xtpl->parse('main.loop');
        }					

        $xtpl->parse('main');
        return $xtpl->text('main');
    }
}

if (defined('NV_SYSTEM')) {
    $content = vreal_block_list($block_config);
}
