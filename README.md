# php framework example
This example is taken from https://symfony.com/doc/current/create_framework/index.html

## 01 - Let's get started
Let's go to the `framework` directory and run
```bash
symfony server:start
```

Even this simple snippet of PHP code is vulnerable to one of the most widespread Internet security issue, XSS
(Cross-Site Scripting). We can inject code in the GET parameter.

```html
<iframe src="javascript:alert(0)"></iframe>
```

## 02 - Going OOP
Writing web code is about interacting with HTTP. So, the fundamental principles of our framework should be around the
HTTP specification.

The first step towards better code is probably to use an Object-Oriented approach; that’s the main goal of the Symfony
HttpFoundation component: replacing the default PHP global variables and functions by an Object-Oriented layer.

using the HttpFoundation component is the start of better interoperability between all frameworks and applications using
it (like Symfony, Drupal 8, phpBB 3, Laravel and ezPublish 5, and more).

## 03 - The Front Controller
Up until now, our application is simplistic as there is only one page. To spice things up a little bit, let’s go crazy
and add another page that says goodbye

We have indeed moved most of the shared code into a central place, but it does not feel like a good abstraction, does
it? We still have the `send()` method for all pages, our pages do not look like templates and we are still not able to
test this code properly.

## 04 - Refactor
Now, configure your web server root directory to point to web/ and all other files won’t be accessible from the client
anymore.

Adding a new page is a two-step process: add an entry in the map and create a PHP template in src/pages/. From a
template, get the Request data via the $request variable and tweak the Response headers via the $response variable.

```bash
symfony server:start --port=4321 --passthru=front.php
```

## 05 - The Routing Component
Before we start diving into the Routing component, let’s refactor our current framework just a little to make templates
even more readable.

Instead of an array for the URL map, the Routing component relies on a RouteCollection instance:

```php
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();
```

The match() method takes a request path and returns an array of attributes (notice that the matched route is
automatically stored under the special _route attribute):
```php
$matcher->match('/bye');
/* Result:
[
    '_route' => 'bye',
];
*/

$matcher->match('/hello/Fabien');
/* Result:
[
    'name' => 'Fabien',
    '_route' => 'hello',
];
*/

$matcher->match('/hello');
/* Result:
[
    'name' => 'World',
    '_route' => 'hello',
];
*/
```
