<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UAT Bug Report Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
  body {
    background-color: #f4f6f9;
  }

  .lbe-header {
    background-color: #0b438c;
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
    <div class="row justify-content-center">
      <div class="col-lg-8">

        <div class="card shadow-sm">
          <div class="card-body p-4">

            <div class="lbe-header d-flex justify-content-between align-items-center mb-4">
              <div>
                <h1>UAT Bug Report Portal</h1>
                <p>Use this form to log bugs found during testing.</p>
              </div>
              <a href="buglist.php" class="btn btn-light">View Bug Reports</a>
            </div>

            <!-- novalidate stops the browser from showing its own popups, it will handle validation itself in validation.js -->
            <form id="bugForm" action="submit.php" method="POST" enctype="multipart/form-data" novalidate>

              <!-- Bug details -->
              <div class="mb-3">
                <label for="bugTitle" class="form-label">Bug Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="bugTitle" name="bugTitle" placeholder="Short description of the bug">
                <div class="invalid-feedback">Please enter a bug title.</div>
              </div>

              <div class="mb-3">
                <label for="module" class="form-label">Module / Feature Affected <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="module" name="module" placeholder="e.g. Login, Dashboard">
                <div class="invalid-feedback">Please enter the affected module or feature.</div>
              </div>

              <div class="mb-3">
                <label for="stepsToReproduce" class="form-label">Steps to Reproduce <span class="text-danger">*</span></label>
                <textarea class="form-control" id="stepsToReproduce" name="stepsToReproduce" rows="4" placeholder="describe the steps taken to reproduce"></textarea>
                <div class="invalid-feedback">describe the steps to reproduce the bug.</div>
              </div>

              <div class="mb-3">
                <label for="expectedResult" class="form-label">Expected Result <span class="text-danger">*</span></label>
                <textarea class="form-control" id="expectedResult" name="expectedResult" rows="3" placeholder="What should happen"></textarea>
                <div class="invalid-feedback">describe the expected result.</div>
              </div>

              <div class="mb-3">
                <label for="actualResult" class="form-label">Actual Result <span class="text-danger">*</span></label>
                <textarea class="form-control" id="actualResult" name="actualResult" rows="3" placeholder="What actually happened"></textarea>
                <div class="invalid-feedback">describe the actual result.</div>
              </div>

              <!-- Dropdowns -->
              <div class="mb-3">
                <label for="severity" class="form-label">Severity <span class="text-danger">*</span></label>
                <select class="form-select" id="severity" name="severity">
                  <!--this option acting as a placeholder-->
                  <option value=""></option>
                  <option value="Critical">Critical</option>
                  <option value="High">High</option>
                  <option value="Medium">Medium</option>
                  <option value="Low">Low</option>
                </select>
                <div class="invalid-feedback">Please select a severity level.</div>
              </div>

              <div class="mb-3">
                <label for="environment" class="form-label">Environment <span class="text-danger">*</span></label>
                <select class="form-select" id="environment" name="environment">
                  <!--this option acting as a placeholder-->
                  <option value=""></option>
                  <option value="Desktop Chrome">Desktop Chrome</option>
                  <option value="Mobile Safari">Mobile Safari</option>
                  <option value="Firefox">Firefox</option>
                  <option value="Other">Other</option>
                </select>
                <div class="invalid-feedback">Please select an environment.</div>
              </div>

              <!-- Screenshot is optional so no validation needed here -->
              <div class="mb-3">
                <label for="screenshot" class="form-label">Screenshot <span class="text-muted">(optional)</span></label>
                <input type="file" class="form-control" id="screenshot" name="screenshot" accept="image/*">
                <div class="form-text">JPG, PNG, Max 5MB.</div>
              </div>

              <div class="mb-4">
                <label for="testerName" class="form-label">Tester Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="testerName" name="testerName" placeholder="full name">
                <div class="invalid-feedback">Please enter your name.</div>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>

            </form>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <script src="validation.js"></script>
</body>
</html>