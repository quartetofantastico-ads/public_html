<?php

// $regId ="dWn79FkrT1CgrxIi-kkRll:APA91bGkYEzrSNaNLiBDh5ddmIFE0YDooqAK0Hkfy06Dch_BPWTzTAbcxjaHD_DWURbsr8NV3sC4MQmGNKyo-5KiL1qOLeaDmIwswV5ROSmL_5_GHuJtBSdHsPQ3ktZo-ts6u5Czkjid";

// // Here, INCLUDE YOUR FCM FILE
// include 'fcm.php';
// $notification = array();
// $arrNotification= array();
// $arrData = array();
// $arrNotification["body"] ="Test by Futurelens.";
// $arrNotification["title"] = "PHP Notification";
// $arrNotification["sound"] = "default";
// $arrNotification["type"] = 1;

// $fcm = new FCM();
// $result = $fcm->send_notification($regId, $arrNotification, "Android");





// if(isset($_GET['send_notification'])){
   send_notification ();
// }

function send_notification()
{
    
    echo $_POST['body'];
	echo 'Hello';
define( 'API_ACCESS_KEY', 'AAAAJwHbqBA:APA91bG3pgsHvDgITa57kb-sHYAy6Kq7_bOhk3uBdgS5TDFFHlERrBaCPGSKx_5HEVt6p_k1LYQzjUboE9y-nkjVfVqgURat_7u8sjgc-uahg4PBDlhBnBJTq-OVpOYJs7nQFhyzStDF');
 
     $msg = array
          (
		'body' 	=> 'Essas são as nossas notifiacções',
		'title'	=> 'Você está vendo as notificações do AnimalLovers',
             	
          );
	$fields = array
			(
				// 'to'		=> $_REQUEST['token'],
				'to'		=> "dWn79FkrT1CgrxIi-kkRll:APA91bGkYEzrSNaNLiBDh5ddmIFE0YDooqAK0Hkfy06Dch_BPWTzTAbcxjaHD_DWURbsr8NV3sC4MQmGNKyo-5KiL1qOLeaDmIwswV5ROSmL_5_GHuJtBSdHsPQ3ktZo-ts6u5Czkjid",
				'notification'	=> $msg
			);
	
	
	$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		echo $result;
		curl_close( $ch );
}

?>