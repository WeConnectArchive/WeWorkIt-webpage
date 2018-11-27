# SassLint [![NPM Version](https://img.shields.io/npm/v/sasslint.svg)](https://www.npmjs.com/sasslint) [![wercker status](https://app.wercker.com/status/495b54c9f2897a85ca841aec75e18721/s/master "wercker status")](https://app.wercker.com/project/bykey/495b54c9f2897a85ca841aec75e18721)

:construction: __Under construction! Not ready for public use.__ :construction:

SassTree is a JavaScript SCSS linter, built on [SassTree](https://github.com/DFurnes/sasstree).

![screenshot](https://cloud.githubusercontent.com/assets/583202/9041746/cabdefbc-39d7-11e5-8e7f-b54a5b63a70b.png)

To install, run `npm install -g sasslint`.

### Configuration
SassLint will recursively search for a `.sasslint.json` configuration file in parent directories of the file being linted (or a configuration file can be specified with the `--config` option). See the [example config](https://github.com/DFurnes/sasslint/blob/master/tests/.sasslint.json) for details.

### Development
```sh
npm install
./bin/sasslint tests/input.scss
```
