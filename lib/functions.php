<?php
function dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function __autoload($classname)
{
	if(is_readable(ROOT.'/lib/'.$classname.'.php'))
	{
		include_once ROOT.'/lib/'.$classname.'.php';
	}
	else
	{
		throw new Exception('no such file : '.ROOT.'/lib/'.$classname.'.php');
	}
}

function templateRender($array)
{
	$template = file_get_contents(TEMPLATE);
	foreach($array as $key => $val)
	{
		$template = str_replace($key, $val, $template);
	}
	echo $template;
   }