<?php
if (file_exists('.env.dev_config.php')) {
    require_once('.env.dev_config.php');
} else {
    require_once('.env.online_config.php');
}