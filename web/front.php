<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();

$map = [
	'/hello' => 'hello',
	'/bye'   => 'bye',
];

// The trick is the usage of the Request::getPathInfo() method which returns the path of the Request by removing the
// front controller script name including its sub-directories (only if needed – see above tip).
$path = $request->getPathInfo();
if (isset($map[$path])) {
		ob_start();
		extract($request->query->all(), EXTR_SKIP);
		include sprintf(__DIR__.'/../src/pages/%s.php', $map[$path]);
		// The last thing that is repeated in each page is the call to setContent(). We can convert all pages to “templates”
		// by just echoing the content and calling the setContent() directly from the front controller script:
		$response->setContent(ob_get_clean());
} else {
		$response->setStatusCode(404);
		$response->setContent('Not Found');
}

$response->send();
