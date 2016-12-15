<?php 
define("server", "localhost");
define("user", "root");
define("pass", "");
define("database", "tintuc");
$conn=mysqli_connect(server,user,pass, database) or die("lỗi kết nối");
mysqli_set_charset($conn,"utf8");
 ?>