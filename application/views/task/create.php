<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->load->view('components/head'); ?>
    <title>Task</title>
</head>
<body>
    <?php $this->load->view('components/navbar'); ?>
    <div class="container mt-5">
        <h3 class="mb-4">Create Task</h3>

        <form method="post" class="card p-4 shadow-sm">
            <div class="mb-3">
                <label class="form-label">Task Title</label>
                <input type="text" name="title" class="form-control" placeholder="Task Title" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" placeholder="Task Description" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Project</label>
                <select name="project_id" class="form-select" required>
                    <option value="" disabled selected>Select a project</option>
                    <?php foreach($projects as $project): ?>
                        <option value="<?= $project->id ?>"><?= htmlspecialchars($project->name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Assign To</label>
                <select name="assigned_to" class="form-select" required>
                    <option value="" disabled selected>Select a user</option>
                    <?php foreach($users as $user): ?>
                        <option value="<?= $user->id ?>"><?= htmlspecialchars($user->name) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Due Date</label>
                <input type="date" name="due_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Create Task</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>