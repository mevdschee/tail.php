<?php
$file = '/var/log/apache2/access.log';
$title = "\e[H\e[2K$file";
if (strpos($_SERVER['REMOTE_ADDR'],'127.')!==0) die('Access Denied');
$stream = fopen($file, 'r');
if (!$stream) die("Could not open file: $file\n");
echo "\e[m\e[2J";
fseek($stream, 0, SEEK_END);
echo str_repeat("\n",4500)."\e[s$title";
flush();
while(true){
  $data = stream_get_contents($stream);
  if ($data) {
    echo "\e[32m\e[u".$data."\e[s".str_repeat("\e[m",1500)."$title";
    flush();
  }
  usleep(100000);
}
fclose($stream);
