<?php


return [
    "images" => [


        "paths" => [
            "input" => 'app/assets/images',
            "outputs" => 'app/storage/cache/images'
        ],

        "versions" => [

            "small"=> [
                "width" => 136,
                "height" => 136
            ],

            "phone"=> [
                "width" => 236,
            ],

            "medium"=> [
                "width" => 318,
            ],

            "large"=> [
                "width" => 603,
            ]
        ]
    ]
];