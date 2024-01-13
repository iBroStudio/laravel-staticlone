<?php

return [
    'models' => [
        'website' => \IBroStudio\StatiClone\Models\Website::class,
    ],
    'database' => [
        'need_websites_table' => true,
        'websites_table' => 'websites',
    ],
];
