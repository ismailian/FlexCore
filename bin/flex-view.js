const program = require("commander");
const view = require("./commands/View");

// sub-commands
program.command("create").description("Create a View.").action(view.create);
program.command("delete").description("Delete a View.").action(view.delete);

program.parse(process.argv);
