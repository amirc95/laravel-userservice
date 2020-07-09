<?php

return [
    'password' => [
        'min_length' => env('PASSWORD_MIN_LENGTH', 6),
    ],

    'username' => [
        'min_length' => env('USERNAME_MIN_LENGTH', 6),
    ],
];
