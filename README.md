# tail.php

Tail (follow) a remote file using a PHP script and telnet 

```
$ telnet localhost 80
Trying 127.0.0.1...
Connected to localhost.
Escape character is '^]'.
```

You have to enter:

```
GET /tail.php HTTP/1.1
Host: localhost

```
NB: Make sure you end the above telnet commands with an empty line!

You can use Ctrl + ']' to get to the telnet prompt and type "quit" to exit.
