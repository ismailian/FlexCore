const logger = require("../Logger");

const Module = {
  create() {
    logger.log("success", "Creating Module...");
  },
  delete() {
    logger.log("warn", "Deleting Module...");
  },
};

module.exports = Module;
