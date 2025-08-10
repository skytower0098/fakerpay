# FakerPay Laravel Package

A Laravel package for managing orders (payments) with a separate admin panel and a public API without authentication.

---

## Installation

1. Place the package inside your project's `vendor/yourvendor/fakerpay` directory (or install via Composer if published).

2. If auto-discovery is not enabled, add the service provider to `config/app.php`:

```php
'providers' => [
    // ...
    YourVendor\FakerPay\FakerPayServiceProvider::class,
],
