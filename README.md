# zendtech/zendhq-ide-helpers

This package provides class stubs for the purpose of IDE autocompletion when programming to [ZendHQ](https://www.zend.com/products/zendphp-enterprise/zendhq) APIs.
You should primarily include this only if you do not have ZendHQ installed in your local PHP installation, but need your production application code to be able to use ZendHQ PHP APIs.

## Installation

This package should be installed as a development package:

```
composer require --dev zendtech/zendhq-ide-helpers
```

> If you omit the `--dev` flag, Composer _will_ prompt you to see if you meant to install it as a development dependency.

## What's included

This package contains stubs for the following ZendHQ PHP APIs:

- [JobQueue](https://help.zend.com/zendphp/current/content/zendhq/zendhq_jobqueue_php_api.htm)

## Support

The stubs contained in this library are generated from PHP stubs included in the ZendHQ extension, and provided as-is.
