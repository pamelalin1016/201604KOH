<?php
if (file_exists(SET_SETTING_FILE.'.env.dev_config.php')) {
    require_once(SET_SETTING_FILE.'.env.dev_config.php');
} else {
    require_once(SET_SETTING_FILE.'.env.online_config.php');
}