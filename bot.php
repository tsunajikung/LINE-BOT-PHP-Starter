<?php
$access_token = '2SqwVhx4/ZmAqzL+ojMgLnwXf9RHgwCyTCaTiJBgKoPtxE5/O6QXNCJKlkeeyAmGDmdEUeKI51FDQ5mhd/T5iOiRA39zgHcZolgJcOt07PcAwVofZrokUxMcgaMMHPLdm73mYGMLbBNmqxaQTMvRBwdB04t89/1O/w1cDnyilFU=';
$reply_token_echo;
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			//$text = $event['message']['text'];
			
			if($event['message']['text']=='สวัสดี'){
				$text = 'สวัสดีจ้า';
			}else if($event['message']['text']=='เออ'){
				$text = 'เพื่อนเล่นหรอ';
			}else if($event['message']['text']=='ชื่ออะไร'){
				$text = 'I AM GROOT !!!';
			}else if($event['message']['text']=='ทำอะไรอยู่'){
				$text = 'ไม่บอก';
			}else{
				$text = 'อือ';
			}
			
			// Get replyToken
			$replyToken = $event['replyToken'];
			$reply_token_echo = $event['replyToken'];
			// Build message to reply back
			$messages = [
				'type' => 'text',
				'text' => $text
				//'text' => 'I AM GROOT !'
			];

			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
print "REPLY TOKEN = "$replyToken;
print "REPLY TOKEN = "$reply_token_echo;
echo "OK";