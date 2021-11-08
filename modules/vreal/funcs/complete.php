<?php

/**
 * @Project NUKEVIET 4.x
 * @Author QUOCVIET (quocvietposcovn@gmail)
 * @copyright 2009
 * @License GNU/GPL version 2 or any later version
 * @Createdate 28/04/2018 12:54
 */

if( ! defined( 'NV_IS_MOD_REAL' ) ) die( 'Stop!!!' );

$contents = "";
$payment = $nv_Request->get_string( 'payment', 'get', '' );

// Kiem tra su ton tai cua cong thanh toan.
if( file_exists( NV_ROOTDIR . "/modules/" . $module_file . "/payment/" . $payment . ".complete.php" ) )
{
	// Lay thong tin config neu cong thanh toan duoc kich hoat.
	$stmt = $db->prepare( "SELECT * FROM " . $db_config['prefix'] . "_" . $module_data . "_payment WHERE active=1 and payment= :payment" );
	$stmt->bindParam( ':payment', $payment, PDO::PARAM_STR );
	$stmt->execute();
	if( $stmt->rowCount() )
	{
		$row = $result->fetch();
		$payment_config = unserialize( nv_base64_decode( $row['config'] ) );
		$payment_config['paymentname'] = $row['paymentname'];
		$payment_config['domain'] = $row['domain'];

		// Xu ly thong tin
		require_once NV_ROOTDIR . "/modules/" . $module_file . "/payment/" . $payment . ".complete.php";
	}
}

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';