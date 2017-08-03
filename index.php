<?php

include_once 'lib/config.php';
include_once ROOT.'/lib/functions.php';

$db = Db::getInstance();

$user9 = new MyTest($db);

$user9->setKey('user9');
$user9->setData('kakayato Data');
$user9->save();

$user9->find('user9');
echo $user9->getData();

include 'templates/index.php';