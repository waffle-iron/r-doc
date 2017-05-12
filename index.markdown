---
layout: page
title: Welcome to r-doc
---

## Build Status


[![Build Status](https://travis-ci.org/roberthamel/r-doc.svg?branch=master)](https://travis-ci.org/roberthamel/r-doc)

---

## About

My goal with [r-doc.com](https://www.r-doc.com){:target="_blank"} is to create a functional technical documentation repository application. Documentation can be accessed without needing to be logged in. Each document will contain a revision ID and the latest approved document revision is what will be displayed. A full administration panel will also available that considered role based permissions to determine what access to document modification functionality is available to the user. An approval process will be required for any saved edits to documents. Anybody who relies heavily on in-house product documentation will benefit from this software.

---

## Site

[r-doc.com](https://www.r-doc.com){:target="_blank"}

---

## Public Repository

[https://github.com/roberthamel/r-doc](https://github.com/roberthamel/r-doc){:target="_blank"}

---

## Technologies Used

### Hosting

- [Hover](https://www.hover.com){:target="_blank"}: Domain name registration.
- [Fortrabbit](https://www.fortrabbit.com/){:target="_blank"}: The host of the application.

### Server Side

- [Laravel](https://laravel.com){:target="_blank"}: The base PHP framework that serves the pages and communicates with the database.

### Client Side

- [VueJS](https://vuejs.org){:target="_blank"}: Dynamic JavaScript framework responsible for display web pages in a component-oriented manner.
- [font-awesome](http://fontawesome.io/){:target="_blank"}: A CSS based icon font library.
- [gh-pages](https://www.npmjs.com/package/gh-pages){:target="_blank"}: A Node.js command-line used to publish this site easily.
- [moment](https://momentjs.com/){:target="_blank"}: JavaScript library for working with time.
- [simplemde](https://simplemde.com/){:target="_blank"}: JavaScript Markdown editor.
- [vue-simplemde](https://github.com/F-loat/vue-simplemde){:target="_blank"}: VueJS wrapper plugin for _simplemde_.
- [to-markdown](https://github.com/domchristie/to-markdown){:target="_blank"}: Converts HTML into Markdown text.
- [showdown](https://github.com/showdownjs/showdown){:target="_blank"}: Converts Markdown into HTML.
- [json-server](https://github.com/typicode/json-server){:target="_blank"}: NodeJS CLI for creating a mock rest api server.
- [json-server-start](https://github.com/roberthamel/json-server-starter){:target="_blank"}: A repo that I built to help me quickly get started mocking out my `json-server` implementation.

### Testing Methods

- [Laravel Dusk](https://laravel.com/docs/5.4/dusk){:target="_blank"}: Provides a browser-based integration testing environment.
- [PHPUnit](https://phpunit.de/){:target="_blank"}: PHP Unit testing environment tightly integrated into Laravel.

### Source Control

- [GitHub](https://github.com){:target="_blank"}: An online git service that allows you to store source code revisions.
- [Travis CI](https://travis-ci.org){:target="_blank"}: When I make a commit to my GitHub repository, all unit and feature tests are run in a container environment. This lets me know that my application is ready for production. Also provides the ability automatically deploy to my hosting provider upon success.
- [GitHub Pages](https://pages.github.com/){:target="_blank"}: How I created the document you are currently viewing.