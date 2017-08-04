<?php

include_once 'lib/config.php';
include_once ROOT.'/lib/functions.php';

$output = array('%output%' => '');

if(isset($_POST['select']))
{
	$db = Db::getInstance();
	$user9 = new MyTest($db);

	if($user9->find('user9'))
	{
		$output['%output%'] = $user9->getKey().' '.$user9->getData();
	}
	else
	{
		$output['%output%'] = '<span>No data</span>';
	}
}

if(isset($_POST['addRow']) && (!empty($_POST['string'])))
{
	$db = Db::getInstance();
	$user9 = new MyTest($db);
	$data = $user9->clearString($_POST['string']);
	$user9->setData($data);
	$user9->setKey('user9');
	if($user9->save())
	{
		$output['%output%'] = '<span>Row added</span>';
	}
}

if(isset($_POST['updateRow']) && (!empty($_POST['string'])))
{
	$db = Db::getInstance();

	$user9 = new MyTest($db);
	$user9->find('user9');
	$data = $user9->clearString($_POST['string']);
	$user9->setData($data);
	if($user9->save())
	{
		$output['%output%'] = '<span>Row changed</span>';
	}
}

if(isset($_POST['deleteRow']))
{
	$db = DB::getInstance();

	$user9 = new MyTest($db);

	$user9->find('user9');
	$user9->setData(''); // или setData = null
	if($user9->save())
	{
		$output['%output%'] = '<span>Row deleted</span>';
	}
}

templateRender($output);