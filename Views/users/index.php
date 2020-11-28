<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <title>User Dashboard - FlexCore</title>
</head>

<body>

    <div class="container mt-5">
        <div class="card bg-light w-75 m-auto">
            <div class="card-header text-dark">
                <strong>Dashboard</strong>
            </div>
            <div class="card-body py-5 text-center">
                <div class="alert alert-success">
                    Welcome (<?= $username ?>) to your dashboard.
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-sm btn-danger">Sign out</button>
            </div>
        </div>
    </div>

</body>

</html>