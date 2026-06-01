<?php
require_once 'db.php';

// Get the id from the URL e.g. detail.php?id=3
$id = $_GET['id'];

// Fetch just that one bug report
$stmt = $pdo->prepare("SELECT * FROM bug_reports WHERE id = :id");
$stmt->execute([':id' => $id]);
//fetching a single line and picking by name
$bug = $stmt->fetch(PDO::FETCH_ASSOC);

// If no bug found with that id, go back to the list
if (!$bug) {
  header('Location: buglist.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($bug['bug_title']) ?> / UAT Bug Report Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f6f9;
    }

    .lbe-header {
      background-color: #0505af;
      color: white;
      padding: 16px 24px;
      margin-bottom: 32px;
      border-radius: 6px;
    }

    .lbe-header h1, .lbe-header h2 {
      color: white;
      margin: 0;
    }

    .lbe-header p {
      color: rgba(255,255,255,0.85);
      margin: 4px 0 0 0;
    }

    .card {
      border: none;
      box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .btn-primary {
      background-color: #1a73e8;
      border-color: #1a73e8;
    }

    .btn-primary:hover {
      background-color: #1558b0;
      border-color: #1558b0;
    }

    .btn-outline-secondary {
      border-color: #1a73e8;
      color: #1a73e8;
    }

    .btn-outline-secondary:hover {
      background-color: #1a73e8;
      color: white;
    }

    .list-group-item:hover {
      background-color: #eaf1fd;
    }

    .form-control:focus, .form-select:focus {
      border-color: #1a73e8;
      box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.2);
    }
  </style>


</head>
<body>
  <div class="container my-5">

    <div class="lbe-header d-flex justify-content-between align-items-center mb-4">
      <div>
        <h1><?= htmlspecialchars($bug['bug_title']) ?></h1>
        <p>Submitted by <?= htmlspecialchars($bug['tester_name']) ?> on <?= date('d M Y, H:i', strtotime($bug['created_at'])) ?></p>
      </div>
        <!-- addition of a back button -->
      <a href="buglist.php" class="btn btn-light">&larr; Back</a>
    </div>

    <table class="table table-bordered">
      <tr>
        <th>Feature</th>
        <td><?= htmlspecialchars($bug['module']) ?></td>
      </tr>
      <tr>
        <th>Severity</th>
        <td><?= htmlspecialchars($bug['severity']) ?></td>
      </tr>
      <tr>
        <th>Environment</th>
        <td><?= htmlspecialchars($bug['environment']) ?></td>
      </tr>
      <tr>
        <th>Steps to Reproduce</th>
        <td><?= nl2br(htmlspecialchars($bug['steps_to_reproduce'])) ?></td>
      </tr>
      <tr>
        <th>Expected Result</th>
        <td><?= nl2br(htmlspecialchars($bug['expected_result'])) ?></td>
      </tr>
      <tr>
        <th>Actual Result</th>
        <td><?= nl2br(htmlspecialchars($bug['actual_result'])) ?></td>
      </tr>
      <?php if ($bug['screenshot']): ?>
      <tr>
        <th>Screenshot</th>
        <td><img src="<?= $bug['screenshot'] ?>" class="img-fluid" alt="Bug screenshot"></td>
      </tr>
      <?php endif; ?>
    </table>

  </div>
</body>
</html>