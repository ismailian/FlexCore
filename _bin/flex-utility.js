const program = require("commander");
const utility = require("./commands/Utility");

// sub-commands
program
  .command("create")
  .description("Create a Utility.")
  .action(utility.create);

program
  .command("delete")
  .description("Delete a Utility.")
  .action(utility.delete);

program.parse(process.argv);
