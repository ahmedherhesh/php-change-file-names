<?php
$path = !empty($_GET['path']) ? $_GET['path'] : '';
if($path){
    $files = scandir($path);
    $num = 1;
    foreach ($files as $file) {
        if (in_array($file, ['.', '..']) || is_dir($path . '\\' . $file)) continue;
        if ($num < 10) $num = '0' . $num;
        $extention = '.' . array_reverse(explode('.', $file))[0];
        rename($path . '\\' . $file, $path . '\\' . $num . $extention);
        $num++;
    }
}
