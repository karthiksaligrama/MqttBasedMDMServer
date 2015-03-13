<?php

//this test simulate the request like this:  mosquitto_sub -h 127.0.0.1 -t xxx -i yyxyy -c -q 2
`mosquitto_pub -h 127.0.0.1 -t xxx -m hihi64 -q 2 `;  //first send a qos2 message, it would be cached by mosquitto 

require('SAM/php_sam.php');

//create a new connection object，创建一个新的连接对象
$conn = new SAMConnection();
//$conn->SetDebug(true);
//start initialise the connection，开始初始化连接
$conn->connect(SAM_MQTT, array(SAM_HOST => '127.0.0.1',
                               SAM_PORT => 1883, 
                               SAM_MQTT_CLEANSTART => false ));     

//接收通知
$sid=$conn->Subscribe('topic://xxx', array(SAM_MQTT_QOS => 2, SAM_MQTT_SUBID => "yyxyy"));
if($sid)
{
    do{
        $rc=$conn->Receive($sid, array(SAM_MQTT_QOS => 2, SAM_WAIT => 5000));
        var_dump($rc);
    }while($rc);
}
$conn->disconnect();
?>
