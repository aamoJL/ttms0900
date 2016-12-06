<?php


require_once '../reactconf.php';
require_once __DBCONFIG_PATH . '/Chat.php';

$chat = new Chat();
$messages = $chat->getMessages();


$chat_converstaion = array();

if (!empty($messages)) {
  foreach ($messages as $message) {
    //$chat_id = (int) $message['chat_id'];
    $chat_id = (int) $message['id'];
    $msg = htmlentities($message['message'], ENT_NOQUOTES);
    $user_name = $message['username'];
    //$sent = date('Y-m-d--H-i-s', $message['sent_on']);
    $sent = $message['sent_on'];
    $chat_converstaion[] = array (
        'username' => $user_name,
        'message' => $msg,
        'time' => $sent,
        'id' => $chat_id
    );
  }
  $response = json_encode($chat_converstaion);
} else {
  echo '<span style="margin-left: 25px;">No chat messages available!</span>';
}

header('Content-type: application/json');
echo $response;
?>
