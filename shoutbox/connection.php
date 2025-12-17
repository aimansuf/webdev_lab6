<?php
$link = mysqli_connect('localhost', 'root', '', 'shoutbox');

if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
?>