<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php $this->load->view('components/head'); ?>
</head>
<body class="bg-light">

<?php $this->load->view('components/navbar'); ?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Tasks</h2>
        <div>
            <a href="<?= base_url('task/export') ?>" class="btn btn-success me-2">Export to Excel</a>
            <a href="<?= base_url('task/create') ?>" class="btn btn-primary">+ Create Task</a>
        </div>
    </div>

    <?php if (empty($tasks)): ?>
        <div class="alert alert-info">No tasks available.</div>
    <?php else: ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Project</th>
                        <th>Assigned To</th>
                        <th>Status</th>
                        <th>Due Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($tasks as $task): ?>
                    <tr class="task-row" style="cursor: pointer;"
                        data-title="<?= htmlspecialchars($task->title) ?>"
                        data-project="<?= htmlspecialchars($task->project_name) ?>"
                        data-user="<?= htmlspecialchars($task->assigned_user) ?>"
                        data-status="<?= ucfirst($task->status) ?>"
                        data-date="<?= htmlspecialchars($task->due_date) ?>"
                        data-description="<?= htmlspecialchars($task->description ?? 'No description') ?>"
                    >
                        <td><?= htmlspecialchars($task->title) ?></td>
                        <td><?= htmlspecialchars($task->project_name) ?></td>
                        <td><?= htmlspecialchars($task->assigned_user) ?></td>
                        <td>
                            <span class="badge bg-<?= $task->status == 'completed' ? 'success' : ($task->status == 'in_progress' ? 'warning' : 'secondary') ?>">
                                <?= ucfirst($task->status) ?>
                            </span>
                        </td>
                        <td><?= htmlspecialchars($task->due_date) ?></td>
                        <td>
                            <a href="<?= base_url('task/edit/' . $task->id) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= base_url('task/delete/' . $task->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <div class="mt-4">
        <?= $pagination_links ?>
    </div>
</div>

<!-- Task Detail Modal -->
<div class="modal fade" id="taskDetailModal" tabindex="-1" aria-labelledby="taskDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="taskDetailModalLabel">Task Detail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Title:</strong> <span id="modalTitle"></span></p>
        <p><strong>Project:</strong> <span id="modalProject"></span></p>
        <p><strong>Assigned To:</strong> <span id="modalUser"></span></p>
        <p><strong>Status:</strong> <span id="modalStatus"></span></p>
        <p><strong>Due Date:</strong> <span id="modalDate"></span></p>
        <p><strong>Description:</strong> <span id="modalDescription"></span></p>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
    $(document).ready(function () {
            $('.task-row').on('click', function () {
                $('#modalTitle').text($(this).data('title'));
                $('#modalProject').text($(this).data('project'));
                $('#modalUser').text($(this).data('user'));
                $('#modalStatus').text($(this).data('status'));
                $('#modalDate').text($(this).data('date'));
                $('#modalDescription').text($(this).data('description'));

                $('#taskDetailModal').modal('show');
            });
        });
</script>
</html>
