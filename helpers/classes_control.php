<?php

function control_class($class)
{
	$class = "/classes/" . $class . ".php";
	if (is_readable($class))
	{
		require $class;
	}
}
spl_autoload_register("control_class");

?>