<?php
define('CURRENCY', '$');
define('WEB_URL', 'http://127.0.0.1/site/');
define('ROOT_PATH', 'C:\wamp\www\site/');


define('DB_HOSTNAME', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'akal');
$link = mysqli_connect(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD);mysqli_select_db(DB_DATABASE, $link);?>