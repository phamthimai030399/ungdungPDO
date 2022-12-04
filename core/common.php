<?php
function redirect($url) {
    header("Location: " . $url);
    exit();
}
function route($name) {
    return 'index.php?source=' . $name;
}