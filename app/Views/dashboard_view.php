<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Tambahkan Bootstrap atau CSS lain sesuai kebutuhan -->
</head>
<body>

<div class="container">
    <h1>Welcome to Dashboard</h1>
    <p>Hello, <?php echo session()->get('username'); ?>! You are logged in.</p>
    <a href="<?php echo site_url('login/logout'); ?>" class="btn btn-danger">Logout</a>
</div>

</body>
</html>
