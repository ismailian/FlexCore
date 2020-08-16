#!/usr/bin/env node

const program = require("commander");

// setup
program
  .version("1.0.0")
  .command("handler", "All related commands to Handlers")
  .command("model", "All related commands to Models")
  .command("module", "All related commands to Modules")
  .command("utility", "All related commands to Utilities")
  .command("view", "All related commands to Views")
  .parse(process.argv);
