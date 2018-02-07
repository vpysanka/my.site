<?php

function autoloadsystem($class_name) {

    $array_paths = array(
        COMPONENTS,
        MODELS
    );

    foreach ($array_paths as $path) {
        $file = $path . $class_name . ".php";

        if(file_exists($file)) {
            include_once $file;
        }
    }
}