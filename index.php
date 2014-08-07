<!--
  copyright (c) 2009 google inc.

  You are free to copy and use this sample.
  License can be found here: http://code.google.com/apis/ajaxsearch/faq/#license
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>MQTT MDM on Android</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script type="text/javascript" src="jquery.label_over.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script type="text/javascript" src="script.js"></script>   
  </head>
  <body style="font-family: Arial;border: 0 none;">
  <div id="content">
    <table align="center" cellspacing="0" cellpadding="0">
    <tr>
    <td>
      <table>
        <tr>
          <td style="width:12%"><td>
          <td style="width:76%">
            <div id="title">MQTT Based Android MDM and Push Notification Service</div>
            <div class="status">
                Server status:
                  <?
                  require('SAM/php_sam.php');

                  //create a new connection object
                  $conn = new SAMConnection();

                  //start initialise the connection
                  $result = $conn->connect(SAM_MQTT, array(SAM_HOST => '127.0.0.1', SAM_PORT => 1883));      
                  if ($result) {
                    $conn->disconnect();
                    print_r("<span class='online'>Online</span>");
                  } else {
                    print_r("<span class='offline'>Offline</span>");
                  }
                  ?>        
            </div>
            <div id="tabs">
              <ul>
                <li><a href="#tabs-1">Commands</a></li>
                <li><a href="#tabs-2">Device Policy</a></li>
              </ul>
              <div id="tabs-1">
                <div id="commandOptions">
                  <input type ="radio" name="command" value="lock" style="width:20px">Lock Device</input><br/>
                  <input type ="radio" name="command" value="remote_wipe" style="width:20px">Execute Remote Wipe</input><br/>
                  <input id="resetPassword" type ="radio" name="command" value="reset_password" style="width:20px">Reset Password</input><br/>
                  <div id="enter_password" style="display:none">
                    Enter Password : <input type="password" pattern="[0-9]*" inputmode="numeric" id="password" style="width:60%"></input>
                  </div>
                </div>
                </br/>
                <button id="submit">Execute remote Command</button>
              </div>
              <div id="tabs-2">
                <div id="devicePolicy">
                  <div>
                    <label for="enable_camera">Enable Camera</label>
                    <input type="checkbox" name="enable_camera" value="enable_camera" style="width:20px" />
                  </div>
                  <div>
                    <label for="encrypt_device">Encrypt Device</label>
                    <input type="checkbox" name="encrypt_device" value="encrypt_device" style="width:20px" />
                  </div>
                  </br/>
                  <button id="submit">Push Policy</button>
                </div>
              </div>
            </div>
          </td>
          <td style="width:12%"></td>
        </tr>
      </table>
    </td>
    </tr>    
    </table>
    </div>
  </body>
</html>