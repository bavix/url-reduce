<?php

// default configure for bxCfg
return [
    // module notify enable
    'notify' => true,

    // module auth is enable
    'auth' => 1,

    // qr code color
    'style' => 'shorten',
    'css' => [
        'shorten' => [
            'default' => '#110022'
        ]
    ],
    
    'services' => [
        'phishtank' => [
            'apiKey' => env('PHISHTANK_API_KEY'),
        ],
        'virusTotal' => [
            'apiKey' => env('VT_API_KEY'),
        ],
    ],
];
