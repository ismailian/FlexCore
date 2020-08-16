const program = require("commander");
const handler = require("./commands/Handler");

// sub-commands
program
  .command("create")
  .description("Create a Handler.")
  .action(handler.create);

program
  .command("delete")
  .description("Delete a Handler.")
  .action(handler.delete);

program.parse(process.argv);
