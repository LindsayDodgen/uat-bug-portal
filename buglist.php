<?php
require_once 'db.php';

//Get all bug reports, latest bug reports come first
$stmt = $pdo->query("SELECT * FROM bug_reports ORDER BY created_at DESC");
$bugs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bug Reports</title>
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
        <h1>Bug Reports</h1>
        <p>All submitted bug reports for lbe-vle</p>
      </div>
      <a href="forms.php" class="btn btn-light">+ New Bug Report</a>
    </div>

    <?php if (count($bugs) === 0): ?>
      <p class="text-muted">No bug reports submitted yet.</p>
    <?php else: ?>
      <div class="list-group">

        <!-- loop through each bug report -->
        <?php foreach ($bugs as $bug): ?>

          <?php
          //using bootstraps badge classes for the colours
          $badgeClass = match($bug['severity']) {
            'Critical' => 'danger',
            'High'     => 'warning',
            'Medium'   => 'info',
            'Low'      => 'secondary',
            default    => 'secondary'
          };
          ?>

          <!-- making the bugs linkable to the details page -->
          <a href="detail.php?id=<?= $bug['id'] ?>" class="list-group-item list-group-item-action">
            <div class="d-flex justify-content-between align-items-center">
              <!-- displaying title in bold -->
              <strong><?= htmlspecialchars($bug['bug_title']) ?></strong>
              <!-- dynamic badge colour -->
              <span class="badge bg-<?= $badgeClass ?>"><?= $bug['severity'] ?></span>
            </div>
            <small class="text-muted">
              <!-- showing module and date/time submitted -->
              <?= htmlspecialchars($bug['module']) ?> 
              <?= date('d M Y, H:i', strtotime($bug['created_at'])) ?>
            </small>
          </a>

        <?php endforeach; ?>

      </div>
    <?php endif; ?>

  </div>
</body>
</html>
