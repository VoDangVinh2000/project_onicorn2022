<?php

use Illuminate\Http\Request as request;
return [
    // 'admin_url_uploads' => $_SERVER['HTTP_HOST'] . '/uploads/',
    'admin_url_dir_uploads' => __DIR__,
    'admin_url_storage_folder' => '/storage/uploads/',
    'array_html_option_enabled' => [
        0 => "Ẩn",
        1 => "Hoạt động",
    ]
];
