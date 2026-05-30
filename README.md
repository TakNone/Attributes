# Attributes

[![PHP Version](https://img.shields.io/badge/php-8%2B-blue)](https://www.php.net/) [![License: MIT](https://img.shields.io/badge/license-MIT-green)](LICENSE)

Attribute-based validation for PHP 8.4+ : validate method parameters, return values and property access using compact, reusable attributes

# Validator - Declarative validation using PHP 8+ attributes

A lightweight, framework-agnostic library that lets you declare validation rules as PHP attributes. Validate method parameters, method return values, and property get/set using compact, reusable attribute classes ( for example `#[Range]`, `#[Pattern]`, `#[Vector]` ) Built-in caching of reflection metadata keeps runtime overhead low

---

# 📦 Installation

Install via Composer :

```bash
composer require taknone/attributes
```

Then enable Composer autoload in your project :

```php
require_once __DIR__.'/vendor/autoload.php';
```

---

# 🚀 Quickstart

The repository includes an [`examples`](examples) directory with runnable examples and small helper scripts

---

# Contributing

PRs welcome ! Follow a few rules :

1. Run and add example for new validators
2. Keep attribute constructor arguments constant expressions ( required by PHP attributes )
3. Document behavior for corner cases ( nullability, casting, unique semantics )

---

# License

MIT — see [`LICENSE`](LICENSE)

---

# Support / Contact

If you need help integrating `Attributes` into your project, open an issue or reach out via the repository's issue tracker