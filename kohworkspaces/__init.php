<?php
ini_set('display_errors', '0');
define('SET_SETTING_FILE', '../');

// Configuration
if (file_exists(SET_SETTING_FILE.'config.php')) {
    require_once(SET_SETTING_FILE."config.php");
}

if(isset($_GET['logout']) && $_GET['logout'] == 'logout'){
    $_SERVER['PHP_AUTH_USER'] = null;
    $_SERVER['PHP_AUTH_PW'] = null;
    header('Location: koh_user.php');
    exit;
}

// 非指定 IP 無法進入操作後台
if(!in_array($_SERVER['REMOTE_ADDR'], $allow_ip)){
    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) ||
        $_SERVER['PHP_AUTH_USER'] != 'pamelalin19871016ya' ||$_SERVER['PHP_AUTH_PW'] != '123pamelalin19871016ya!@^#') {
            Header("WWW-Authenticate: Basic realm=\"Login\"");
            Header("HTTP/1.0 401 Unauthorized");

            echo <<<EOB
                <html><body>
                <h1>Rejected!</h1>
                <big>Wrong Username or Password!</big>
                </body></html>
EOB;
            exit;
        }

}

