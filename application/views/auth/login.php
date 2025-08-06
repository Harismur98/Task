<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg">
                <div class="card-header text-center">
                    <h4>Login</h4>
                </div>
                <div class="card-body">
                    <!-- Flash message -->
                    <?php if($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Validation errors -->
                    <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                    <form method="post" action="<?= base_url('auth/login') ?>">
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?= set_value('email') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>Don't have an account? <a href="<?= base_url('register') ?>">Register</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
