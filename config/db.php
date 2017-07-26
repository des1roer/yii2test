<?php

use yii\db\Connection;

return [
    'class' => Connection::className(),
    'dsn' => 'mysql:host=localhost;dbname=localdb',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'tablePrefix' => 'ds_',
];
