const fs = require("fs");
const path = require("path");
const url = require("url");

// modules
const log = (type, message) => {
  console.info(`[${type.toUpperCase()}] # ${message}`);
};

log("info", "CLI Initialized successfully.");
