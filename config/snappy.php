<?php

return array(


    'pdf' => array(
        'enabled' => true,
        'binary'  => base_path('vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64'),
        'timeout' => false,
        'options' => array(),
        'env'     => array(),
        'zoom' => 1.5,
    ),
    'image' => array(
        'enabled' => true,
        'binary'  =>  base_path('vendor/h4cc/wkhtmltoimage-amd64/bin/wkhtmltoimage-amd64'),
        'zoom' => 1.5,

        'timeout' => false,
        'options' => array(),
        'env'     => array(),
    ),


);
