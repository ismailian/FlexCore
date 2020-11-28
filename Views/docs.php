<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/assets/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/css/partials/reset.css">
  <title>Docs - FlexCore</title>
</head>

<body>

  <!-- header -->
  <?php include(__DIR__ . "/layouts/header.php") ?>
  <!-- header -->

  <!-- content -->
  <div class="container mt-5">
    <div class="card w-75 m-auto shadow-sm">
      <div class="card-header"><strong>Documentation</strong></div>
      <div class="card-body py-5">
        this is the docs page.
      </div>
      <div class="card-footer d-flex justify-content-end">
        <button class="btn btn-sm btn-primary disabled mx-1">Prev</button>
        <button class="btn btn-sm btn-primary mx-1">Next</button>
      </div>
    </div>
  </div>
  <!-- content -->

  <!-- footer -->
  <?php include(__DIR__ . "/layouts/footer.php") ?>
  <!-- footer -->

</body>

</html>