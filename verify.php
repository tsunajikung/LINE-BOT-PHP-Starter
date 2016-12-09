<?php
$access_token = '2SqwVhx4/ZmAqzL+ojMgLnwXf9RHgwCyTCaTiJBgKoPtxE5/O6QXNCJKlkeeyAmGDmdEUeKI51FDQ5mhd/T5iOiRA39zgHcZolgJcOt07PcAwVofZrokUxMcgaMMHPLdm73mYGMLbBNmqxaQTMvRBwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;