CREATE TABLE bug_reports (
  id INT AUTO_INCREMENT PRIMARY KEY,
  bug_title VARCHAR(200) NOT NULL,
  module VARCHAR(200) NOT NULL,
  steps_to_reproduce TEXT NOT NULL,
  expected_result TEXT NOT NULL,
  actual_result TEXT NOT NULL,
  severity VARCHAR(50) NOT NULL,
  environment VARCHAR(100) NOT NULL,
  screenshot VARCHAR(200),
  tester_name VARCHAR(200) NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);