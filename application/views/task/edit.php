<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->load->view('components/head'); ?>
    <title>Task</title>
</head>
<body class="bg-light">
    <?php $this->load->view('components/navbar'); ?>
    <div class="container mt-4">
        <h3>Edit Task</h3>
        <form method="post">
            <input type="text" name="title" value="<?= set_value('title', $task->title) ?>" class="form-control mb-2" placeholder="Task Title" required>
            <textarea name="description" class="form-control mb-2" required><?= set_value('description', $task->description) ?></textarea>

            <label>Project:</label>
            <select name="project_id" class="form-control mb-2" required>
                <?php foreach($projects as $project): ?>
                    <option value="<?= $project->id ?>" <?= $project->id == $task->project_id ? 'selected' : '' ?>>
                        <?= $project->name ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label>Assign To:</label>
            <select name="assigned_to" class="form-control mb-2" required>
                <?php foreach($users as $user): ?>
                    <option value="<?= $user->id ?>" <?= $user->id == $task->assigned_to ? 'selected' : '' ?>>
                        <?= $user->name ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label>Status:</label>
            <select name="status" class="form-control mb-2">
                <option value="pending" <?= $task->status == 'pending' ? 'selected' : '' ?>>Pending</option>
                <option value="in_progress" <?= $task->status == 'in_progress' ? 'selected' : '' ?>>In Progress</option>
                <option value="completed" <?= $task->status == 'completed' ? 'selected' : '' ?>>Completed</option>
            </select>

            <label>Due Date:</label>
            <input type="date" name="due_date" class="form-control mb-3" value="<?= set_value('due_date', $task->due_date) ?>" required>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>