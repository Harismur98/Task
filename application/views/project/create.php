<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->load->view('components/head'); ?>
    <title>Create Project</title>
</head>
<body>
    <?php $this->load->view('components/navbar'); ?>

    <div class="container mt-5">
        <div class="card shadow p-4">
            <h3 class="mb-4">Create Project</h3>

            <form method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Project Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter project name" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Enter project description" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Create Project</button>
                <a href="<?= base_url('project') ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</body>
</html>
