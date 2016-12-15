<?php 
define("server", "sql100.freevnn.com");
define("user", "freev_18454170");
define("pass", "08041995");
define("database", "freev_18454170_tintuc");
$conn=mysqli_connect(server,user,pass, database) or die("lỗi kết nối");
mysqli_set_charset($conn,"utf8");
 ?>