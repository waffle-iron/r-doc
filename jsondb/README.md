# JSON Server for r-doc

## Install

Meant to be a fake back-end to my site. Also helps to design the database structure.

``` bash
git clone https://github.com/roberthamel/r-doc-json-server.git jsondb
cd jsondb
```

## Configure

Make any necessary modifications to the schema in generate.js.

```bash
yarn generate
```

Open `localhost:3000` in your browser.

## Watch for changes

```bash
yarn watch
```

Open in your browser. Make modification to your `generate.js` files. Refresh the browser to see your changes.