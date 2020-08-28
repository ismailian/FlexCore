const logger = require("../Logger");

const Model = {
  create() {
    logger.log("success", "Creating Model...");
  },
  delete() {
    logger.log("warn", "Deleting Model...");
  },
};

module.exports = Model;
