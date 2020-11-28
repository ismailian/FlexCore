<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/assets/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/css/partials/reset.css">
  <title>Release - FlexCore</title>
</head>

<body>

  <!-- header -->
  <?php include(__DIR__ . "/layouts/header.php") ?>
  <!-- header -->

  <!-- content -->
  <div class="container mt-5">
    <div class="card w-75 m-auto shadow-sm">
      <div class="card-header">
        <strong>Release & changelogs.</strong>
        <span class="small">(You will find the release notes here.)</span>
      </div>
      <div class="card-body py-5">

        <div class="my-3">
          <span class="d-block w-100 mb-3">Latest release is ready for download.</span>
          <a href="/downloads/archive/flexcore/beta_v1.0.0/" class="btn btn-sm btn-success">Download Now</a>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-between">
        <span>Current version (Beta)</span>
        <span>1.0.0</span>
      </div>
    </div>
  </div>
  <!-- content -->

  <!-- footer -->
  <?php include(__DIR__ . "/layouts/footer.php") ?>
  <!-- footer -->

</body>

</html>