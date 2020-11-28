<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/assets/css/bootstrap.css">
	<title>User Profile - FlexCore</title>
</head>

<body>

	<div class="container mt-5">
		<div class="card bg-light w-75 m-auto">
			<div class="card-header text-dark">
				<strong>Edit Your Profile</strong>
			</div>
			<div class="card-body py-5 ">
				<div class="form-group">
					<label for="username">Username</label>
					<input class="form-control w-100" type="text" value="<?= $username ?>" disabled>
				</div>
				<div class="form-group">
					<label for="fullname">Fullname</label>
					<input class="form-control w-100" type="text" value="<?= $fullname ?>" disabled>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input class="form-control w-100" type="text" value="<?= $email ?>" disabled>
				</div>
			</div>
			<div class="card-footer">
				<button class="btn btn-sm btn-danger">Sign out</button>
			</div>
		</div>
	</div>

</body>

</html>