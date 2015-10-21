<?php
$file = '/var/log/apache2/access.log';
$title = "\e[H\e[2K$file";
echo "\e[m\e[2J";
$stream = fopen($file, 'r');
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
