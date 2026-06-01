*Form Validation

Test / Expected / Result

Submit form with all fields empty       / Error messages appear on all required fields              / Pass
Submit form with one field empty        / Error message appears on that field only                  / Pass
Submit form with all fields filled      / Form submits and redirects to bug list                    / Pass

*Bug Submission

Test / Expected / Result

Submit a valid bug report               / Report saves to database and appears in bug list           / Pass
Submit a bug report with a screenshot   / Screenshot saves to uploads folder and shows in detail view / Pass
Submit a bug report without a screenshot / Screenshot row does not appear in detail view            / Pass

*Bug List

Test / Expected / Result

Open bug list after submitting a report / Report appears in the list                                / Pass
Check severity badge colours            / Critical = red, High = yellow, Medium = blue, Low = grey  / Pass
Click a bug in the list                 / Opens the detail page for that bug                        / Pass

*Navigation

Test / Expected / Result

Click View Bug Reports on form page     / Takes you to bug list                                     / Pass
Click + New Bug Report on bug list      / Takes you to the form                                     / Pass
Click Back on detail page               / Takes you back to bug list                                / Pass

*Responsive Design

Test / Expected / Result

Open form on desktop width              / Form displays correctly in a centred card                 / Pass
Resize browser to mobile width          / Form stacks correctly and remains usable                  / Pass

*Browsers Tested

- Desktop Chrome
- Opera GX