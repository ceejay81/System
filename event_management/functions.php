<?php
function generateRandomID($length = 6) {
    return substr(str_shuffle("0123456789"), 0, $length);
}

function hashPassword($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
?>
