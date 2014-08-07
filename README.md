MqttBasedMDMClient
==================

This is an application written in Php to implement MDM server using MQTT protocol

##Introduction

This is a library forked from [tokudu](https://github.com/tokudu/PhpMQTTClient). The previous library was only used to send the push notification on the device. This fork has been updated so that it can work with [android-mqtt-mdm-client](https://github.com/karthiksaligrama/android-mqtt-mdm-client).


##Setup

To setup the library download the code and put them in your apache document root directory. 
If you are setting up the apache for the first time on your system, then you will need to include the php modules for this program to work.

You will also need to install a mqtt server on your machine. If you install it on any other machine then please take care to change the ip address in the index.php at the location

```
$result = $conn->connect(SAM_MQTT, array(SAM_HOST => '127.0.0.1', SAM_PORT => 1883));
```

This program should work with any MQTT server, but i ran the test on [mosquitto server](http://mosquitto.org) for more details. for ducumentation see [documentation](http://mosquitto.org/documentation/)

##License

Everything here is licenced under Apache 2.0
http://www.apache.org/licenses/LICENSE-2.0