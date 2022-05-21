<?php
// mengaktifkan session php
session_start();

session_unset();
// menghapus semua session
session_destroy();
// menghapus cookies
if (isset($_COOKIE['cookielogin'])) {
    $time = time();
    setcookie("cookielogin[username]", $time - 3600);
    setcookie("cookielogin[password]", $time - 3600);
}
// mengalihkan halaman ke halaman login
header("location:index.php");
exit();
