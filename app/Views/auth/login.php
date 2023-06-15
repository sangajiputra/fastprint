<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <!-- Menampilkan pesan error -->
        <?php if (session()->getFlashData('errors')) : ?>
            <div class="alert alert-danger">
                <h4>Error</h4>
                <?php foreach (session()->getFlashData('errors') as $error) : ?>
                    <p><?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashData('message')) : ?>
            <div class="alert alert-danger"><?= session()->getFlashData('message') ?></div>
        <?php endif; ?>
        <!-- Form Login -->
        <form action="<?= site_url('login') ?>" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <!-- <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember Me</label>
            </div> -->
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="<?= site_url('register') ?>" class="btn btn-link">Register</a>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>