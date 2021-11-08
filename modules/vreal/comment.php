<?php

/**
 * @Project NUKEVIET 4.x
 * @Author QUOCVIET (quocvietposcovn@gmail)
 * @copyright 2009
 * @License GNU/GPL version 2 or any later version
 * @Createdate 28/04/2018 12:54
 */

if (! defined('NV_MAINFILE')) {
    die('Stop!!!');
}

$numf = $db->query( 'SELECT COUNT(*) FROM ' . NV_PREFIXLANG . '_comment where module= ' . $db->quote( $row['module'] ) . ' AND id= ' . $row['id'] . ' AND status=1' )->fetchColumn();

$query = 'UPDATE ' . $db_config['prefix'] . '_' . $mod_info['module_data'] . '_rows SET hitscm=' . $numf . ' WHERE id=' . $row['id'];
$db->query( $query );