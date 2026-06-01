<?php

// only once so it wont try to declare it as a variable twice
require_once 'db.php';

// Grab each field from the form
$bugTitle = $_POST['bugTitle'];
$module = $_POST['module'];
$stepsToReproduce = $_POST['stepsToReproduce'];
$expectedResult = $_POST['expectedResult'];
$actualResult = $_POST['actualResult'];
$severity = $_POST['severity'];
$environment = $_POST['environment'];
$testerName = $_POST['testerName'];

// dealing with the screenshot differently
$screenshot = null;

if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] === 0) {
  $uploads = 'uploads/';

  // If the uploads folder doesnt exist yet, create it
  if (!file_exists($uploads)) {
    mkdir($uploads, true);
  }

  //adding a timestamp to prevent the same names
  $filename = time() . '_' . basename($_FILES['screenshot']['name']);
  //then moving it from the temporary folder to the upload folder
  move_uploaded_file($_FILES['screenshot']['tmp_name'], $uploads . $filename);
  //then saving the file path
  $screenshot = $uploads . $filename;
}

// Save the report to the database
$sql = "INSERT INTO bug_reports 
        (bug_title, module, steps_to_reproduce, expected_result, actual_result, severity, environment, screenshot, tester_name) 
        VALUES 
        (:bugTitle, :module, :stepsToReproduce, :expectedResult, :actualResult, :severity, :environment, :screenshot, :testerName)";

$stmt = $pdo->prepare($sql);

$stmt->execute([
  ':bugTitle'         => $bugTitle,
  ':module'           => $module,
  ':stepsToReproduce' => $stepsToReproduce,
  ':expectedResult'   => $expectedResult,
  ':actualResult'     => $actualResult,
  ':severity'         => $severity,
  ':environment'      => $environment,
  ':screenshot'       => $screenshot,
  ':testerName'       => $testerName
]);

// forward the user to the bug list after submitting
header('Location: buglist.php');
exit;