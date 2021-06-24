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
