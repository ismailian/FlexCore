const program = require("commander");
const model = require("./commands/Model");

// sub-commands
program.command("create").description("Create a Model.").action(model.create);
program.command("delete").description("Delete a Model.").action(model.delete);

program.parse(process.argv);
