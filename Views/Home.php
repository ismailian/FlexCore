<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <title>Home Page</title>
</head>

<body>
    <h2 class="header">welcome</h2>
    <hr>

    <?php


    if (!is_null($data)) {

        echo json_encode($data);
    }


    ?>
</body>

</html>