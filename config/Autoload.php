<?php
//$objects = [];
//$objects[] = 'blab';
spl_autoload_register(function ($class_name) {
    $array_paths = array(
        '/controllers/',
        '/config/',
        '/model/'
    );

    //echo $class_name; echo '<br>';
    //$i = 0;
    foreach ($array_paths as $path) {
        $path = ROOT . $path . $class_name . '.php';
        if (is_file($path)) {
//            $objects[$i] = $class_name;
//            $i++;
            require_once "$path";
        }
    }
});


