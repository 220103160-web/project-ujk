<?php
$hash = '$2y$10$HME2dXMfBTUtE.BXtL.u7.4X08S2ozrYRpTcmXoywfCbrfJMmqXN2';

if (password_verify("123456", $hash)) {
    echo "COCOK";
} else {
    echo "SALAH";
}