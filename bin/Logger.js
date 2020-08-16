const colors = require("colors");

const logger = {
  log(type, message) {
    if (type === "success") {
      console.log(
        new Date().toLocaleTimeString().bgYellow +
          " # ".red +
          `${message}`.dim +
          "[SUCCESS]".green
      );
    }

    if (type === "info") {
      console.log(
        new Date().toLocaleTimeString().bgYellow +
          " # ".red +
          `${message}`.dim +
          "[INFO]".blue
      );
    }

    if (type === "warn") {
      console.log(
        new Date().toLocaleTimeString().bgYellow +
          " # ".red +
          `${message}`.dim +
          "[WARN]".yellow
      );
    }

    if (type === "error") {
      console.log(
        new Date().toLocaleTimeString().bgYellow +
          " # ".red +
          `${message}`.dim +
          "[ERROR]".red
      );
    }
  },
};

module.exports = logger;
