# php framework example
This example is taken from https://symfony.com/doc/current/create_framework/index.html

## 01 - Let's get started
Let's go to the `framework` directory and run
```bash
symfony server:start
```

Even this simple snippet of PHP code is vulnerable to one of the most widespread Internet security issue, XSS
(Cross-Site Scripting). We can inject code in the GET parameter

```html
<iframe src="javascript:alert(0)"></iframe>
```
