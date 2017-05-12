# JSON Server Starter Scaffolding

## Install

> `NodeJS` and `yarn` need to be installed on your system.

Meant to be a fake back-end to a site. Also helps to design the database structure.

``` bash
git clone https://github.com/roberthamel/r-doc-json-server.git jsondb
cd jsondb
yarn
```

## Configure

Make any necessary modifications to the schema in generate.js.

```bash
yarn generate
```

Open `localhost:3004` in your browser.

> Because there may be other node servers that need to be run, I have set the default port to `3004`

## Watch for changes

```bash
yarn watch
```

Open in your browser. Make modification to your `generate.js` files. Refresh the browser to see your changes.

## Example

To get started before starting with your own design.

```bash
yarn example
```

## Todo

- [ ] Add testing framework to aide in writing helper functions for generating code.