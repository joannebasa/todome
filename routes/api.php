<?php

$router->group(["prefix" => "tasks"], function ($router) {
	$router->post("", "Tasks@create");
	$router->get("", "Tasks@list");
	$router->put("{task}", "Tasks@update");
	$router->delete("{task}", "Tasks@delete");
	$router->patch("{task}/complete", "Tasks@complete");
	$router->patch("{task}/todo", "Tasks@todo");
});