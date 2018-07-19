- _Replace `BigBox\Plugin` with your namespace_
- _Replace `PLUGIN` constant with your constant prefix_
- _Replace `'plugin'` text domain with your text domain_
- _Replace `'plugin_` function prefixes with your function prefix_

# Plugin

WordPress plugin base.

## Install

```
$ git clone git@github.com:bigboxwc/wp-plugin wp-plugin && cd wp-plugin
$ npm run setup-theme
```

## Develop

```
$ npm run dev
```

## Lint

```
$ npm run lint # Lint Javascript
$ npm run css-lint # Lint CSS
$ composer run lint # Lint PHP
```

## Release

```
$ npm run package-plugin
```
