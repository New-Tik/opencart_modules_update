<?php

define('VERSION', '3.0.3.7');
define('VERSION_CORE', 'ocStore');
define('VERSION_BUILD', '0001');

define('DIR_APPLICATION', '/media/stas/Elements/stas/works/projects/OpenCart/assembly/master/ocStore-3.0.3.7/admin/');
define('DIR_OPENCART', dirname(DIR_APPLICATION) . '/');

echo '<pre>';
var_dump(version_compare("4.0.0.0b", "5.0.3.7"));
echo '</pre>';

die;

$files = [];
function AddFiles($dir = '') {

    $files_ = [];
    
    $files = glob($dir);

    foreach ($files as $file) {
        if (is_dir($file)) {            
            $files_ = array_merge($files_, AddFiles($file . '/*'));
        } else
            $files_[] = str_replace(DIR_OPENCART, '', $file);
    }
    return $files_;
}


$files_admin = AddFiles(DIR_OPENCART .'admin/language/en-gb/*');
$files_catalog = AddFiles(DIR_OPENCART .'catalog/language/en-gb/*');
$files = array_merge($files_admin, $files_catalog);

foreach ($files as $file) {
    echo $file.PHP_EOL;    
}
echo 'Admin:'. count($files_admin).PHP_EOL;
echo 'Catalog:'. count($files_catalog).PHP_EOL;
echo count($files).PHP_EOL;


