<?php

return [
    'groups' => [
        'admin' => ['*'],
        'guest' => ['top', 'post.*', 'login', 'password.*'],
    ],
];
