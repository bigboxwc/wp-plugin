- _Replace `BigBox\Plugin` with your namespace_
- _Replace `PLUGIN` constant with your constant prefix_
- _Replace `'plugin'` text domain with your text domain_
- _Replace `'plugin_` function prefixes with your function prefix_

# Plugin

WordPress plugin base.

## Install

#### Clone Repository

```
$ git clone git@github.com:bigboxwc/wp-plugin wp-plugin && cd wp-plugin
```

#### Setup Plugin
```
$ npm run setup-plugin
```

## Develop

```
$ npm run dev
```

## Lint

#### Javascript

```
$ npm run lint
```

#### CSS
```
$ npm run css-lint
```

#### PHP
```
$ composer run lint
```

## Release

```
$ npm run package-plugin
```
