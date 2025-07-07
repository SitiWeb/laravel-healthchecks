# Laravel Healthchecks

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sitiweb/laravel-healthchecks.svg?style=flat-square)](https://packagist.org/packages/sitiweb/laravel-healthchecks)
[![License](https://img.shields.io/packagist/l/sitiweb/laravel-healthchecks.svg?style=flat-square)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/sitiweb/laravel-healthchecks.svg?style=flat-square)](https://packagist.org/packages/sitiweb/laravel-healthchecks)

Laravel wrapper voor [Healthchecks.io](https://healthchecks.io) waarmee je eenvoudig cronjobs kunt monitoren via Artisan commands of Laravel's scheduler.

---

## ✅ Features

- Ping Healthchecks.io bij start, succes of falen
- Eenvoudige trait voor Artisan commands
- Fluent `->healthchecks()` macro voor gebruik in de scheduler
- Minimale configuratie nodig

---

## 🚀 Installatie

```bash
composer require sitiweb/laravel-healthchecks
