<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <?php $this->load->view('components/head'); ?>
</head>
<body class="bg-light">

<?php $this->load->view('components/navbar'); ?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Projects</h2>
        <a href="<?= base_url('project/create') ?>" class="btn btn-primary">+ Create Project</a>
    </div>

    <?php if (empty($projects)): ?>
        <div class="alert alert-info">No projects available.</div>
    <?php else: ?>
        <div class="list-group">
            <?php foreach($projects as $project): ?>
                <div class="list-group-item">
                    <h5 class="mb-1"><?= htmlspecialchars($project->name) ?></h5>
                    <p class="mb-0 text-muted"><?= htmlspecialchars($project->description) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
