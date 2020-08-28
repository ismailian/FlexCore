const logger = require("../Logger");

const View = {
  create() {
    logger.log("success", "Creating View...");
  },
  delete() {
    logger.log("success", "Deleting View...");
  },
};

module.exports = View;
