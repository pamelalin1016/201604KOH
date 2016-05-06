<?php
if (file_exists(SET_SETTING_FILE.'.env.dev_config.php')) {
    require_once(SET_SETTING_FILE.'.env.dev_config.php');
} elseif (file_exists(SET_SETTING_FILE.'.env.online_config.php')) {
    require_once(SET_SETTING_FILE.'.env.online_config.php');
} elseif (file_exists(SET_SETTING_FILE.'.cfg.dev_config.php')) {
    require_once(SET_SETTING_FILE.'.cfg.dev_config.php');
} elseif (file_exists(SET_SETTING_FILE.'.cfg.online_config.php')) {
    require_once(SET_SETTING_FILE.'.cfg.online_config.php');
}