<?php
$sql = file_get_contents('c:\Main Storage\Daftar Proyek\modafinil-malaysia-wp\modafinil_malaysia.sql');
preg_match("/\(\d+,\s*'active_plugins',\s*'(.*?)',\s*'yes'\)/", $sql, $matches);
if (isset($matches[1])) {
    $data = unserialize(stripslashes($matches[1]));
    print_r($data);
} else {
    echo "Not found.";
}
