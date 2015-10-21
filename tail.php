<?php
// configuration
$file = '/var/log/apache2/access.log';
$ip = '127.';
// start of script
$title = "\033[H\033[2K$file";
if (strpos($_SERVER['REMOTE_ADDR'],$ip)!==0) die('Access Denied');
$stream = fopen($file, 'r');
if (!$stream) die("Could not open file: $file\n");
echo "\033[m\033[2J";
fseek($stream, 0, SEEK_END);
echo str_repeat("\n",4500)."\033[s$title";
flush();
while(true){
  $data = stream_get_contents($stream);
  if ($data) {
    echo "\033[32m\033[u".$data."\033[s".str_repeat("\033[m",1500)."$title";
    flush();
  }
  usleep(100000);
}
fclose($stream);
