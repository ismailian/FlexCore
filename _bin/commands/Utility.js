const logger = require("../Logger");

const Utility = {
  create() {
    logger.log("success", "Creating Utility...");
  },
  delete() {
    logger.log("success", "Deleting Utility...");
  },
};

module.exports = Utility;
