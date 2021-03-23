<?php

    send_notification ();
    
    function send_notification()
    {
        $the_request = &$_GET; 
        echo $the_request['body'];
        
        define( 'API_ACCESS_KEY', 'AAAAJwHbqBA:APA91bG3pgsHvDgITa57kb-sHYAy6Kq7_bOhk3uBdgS5TDFFHlERrBaCPGSKx_5HEVt6p_k1LYQzjUboE9y-nkjVfVqgURat_7u8sjgc-uahg4PBDlhBnBJTq-OVpOYJs7nQFhyzStDF');
     
         $msg = array
              (
    		'body' 	=> $the_request['body'],
    		'title'	=> $the_request['title'],
            'post'  => $the_request['post'],
            'pet'  => $the_request['pet'],
            'idNotification' => $the_request['idNotification'],
            'kindOfNotification' => $the_request['kindOfNotification']
              );
    	$fields = array
    			(
    				'to'		=> $the_request['token'],
    				'data'	=> $msg,
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