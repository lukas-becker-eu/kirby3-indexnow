<?php
Kirby::plugin('lukasbecker/kirby3-indexnow', [
    'options' => [
        'apiKey' => ''
    ],
    'snippets' => [
        'fetch' => __DIR__ . '/snippets/fetch.php'
    ],
    'routes' => function ($kirby) {
        $indexNowKey = kirby()->option('lukasbecker.kirby3-indexnow.apiKey');
        if(array_key_exists('indexNowKey', get_defined_vars())): 
            return [
        
                [
                    'pattern' => "{$indexNowKey}.txt",
                    'action' => function () {
                        return new Response(kirby()->option('lukasbecker.kirby3-indexnow.apiKey'), 'text');
                    }
                ]
                ];
            endif;
    },
    'hooks' => [
        'page.changeSlug:after' => function ($newPage) {
            snippet('fetch', ['newPage' => $newPage ?? null, 'key' => kirby()->option('lukasbecker.kirby3-indexnow.apiKey') ?? null], true);
        },
        'page.changeStatus:after' => function ($newPage) {
            snippet('fetch', ['newPage' => $newPage ?? null, 'key' => kirby()->option('lukasbecker.kirby3-indexnow.apiKey') ?? null], true);
        },
        'page.changeTitle:after' => function ($newPage) {
            snippet('fetch', ['newPage' => $newPage ?? null, 'key' => kirby()->option('lukasbecker.kirby3-indexnow.apiKey') ?? null], true);
        },
        'page.update:after' => function ($newPage) {
            snippet('fetch', ['newPage' => $newPage ?? null, 'key' => kirby()->option('lukasbecker.kirby3-indexnow.apiKey') ?? null], true);
        },
    ]
]);