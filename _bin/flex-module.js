const program = require("commander");
const modular = require("./commands/Module");

// sub-commands
program
  .command("create")
  .description("Create a Module.")
  .action(modular.create);
program
  .command("delete")
  .description("Delete a Module.")
  .action(modular.delete);

program.parse(process.argv);
