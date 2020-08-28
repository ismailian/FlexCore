const logger = require("../Logger");

const Handler = {
  create() {
    logger.log("success", "creating Handler...");
  },
  delete() {
    logger.log("warn", "deleting Handler...");
    setTimeout(() => {
      logger.log("success", "handler deleted successfully.");
    }, 1500);
  },
};

module.exports = Handler;
