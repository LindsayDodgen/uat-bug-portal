*UAT Bug Report Portal

A simple web app that allows testers to submit bug reports found during UAT testing of lbe-vle. Once submitted, each report is saved to a database and can be viewed in a bug list. You can also click on any bug to see its full details.

*Requirements

XAMPP (includes Apache, MySQL and PHP)
Any browser

*Setup instructions

- Download or clone this repository
- Copy the "uat-bug-portal" folder into your XAMPP htdocs directory: C:\xampp\htdocs\uat-bug-portal
- Open XAMPP and start both Apache and mysql modules
- Open phpMyAdmin at "localhost/phpmyadmin" and create a database called "uat_bug_portal"
- In phpMyAdmin select the database, click the SQL tab, paste in the contents of "schema.sql" and click "GO"
- Open your browser and go to: localhost/uat-bug-portal/forms.php


*How to use

- Fill in the form to submit a bug report and click "Submit"
- You will be taken to the bug list where all submitted reports are shown
- Click any bug in the list to view its full details
- To go back to the form click "+ New Bug Report"

*Areas of Struggle

During development i ran into alot of issues making the screenshot upload to work with the database, with some debugging i found that i had to add (enctype="multipart/form-data" ) in the forms.php because in the submit.php: 
(if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] === 0) {)

this condition was always coming out as false because the data was not being changed and was being sent as plain text.

My Validation.js was being completly bypassed and i found out that i had my (form.submit();) in the wrong line and was not actually submitting the form.
