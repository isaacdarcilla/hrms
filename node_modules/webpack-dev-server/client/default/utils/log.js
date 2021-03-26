'use strict';

var log = require('../../transpiled-modules/log');

var name = 'webpack-dev-server'; // default level is set on the client side, so it does not need
// to be set by the CLI or API

var defaultLevel = 'info';

function setLogLevel(level) {
  log.configureDefaultLogger({
    level: level
  });
}

setLogLevel(defaultLevel);
module.exports = {
  log: log.getLogger(name),
  setLogLevel: setLogLevel
};