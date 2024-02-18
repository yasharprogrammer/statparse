<?php
declare(strict_types = 1);
ini_set('display_errors', '1');
error_reporting(E_ALL);

const ROOT_DIR = __DIR__ . '/';

require_once __DIR__ .'/vendor/autoload.php';

use Main\StatParse;

new StatParse();
