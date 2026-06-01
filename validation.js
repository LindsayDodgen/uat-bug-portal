const form = document.getElementById('bugForm');

form.addEventListener('submit', function (e) {
  // first stop the form from submitting so we can check everything
  e.preventDefault();

  let isValid = true;

  // list of all required fields by their id
  const requiredFields = [
    'bugTitle',
    'module',
    'stepsToReproduce',
    'expectedResult',
    'actualResult',
    'severity',
    'environment',
    'testerName'
  ];

  // loop through each field and check if its empty
  requiredFields.forEach(function (fieldId) {
    const field = document.getElementById(fieldId);

    if (field.value.trim() === '') {
      // Show the error
      field.classList.add('is-invalid');
      isValid = false;
    } else {
      // Remove error state if they've filled it in
      field.classList.remove('is-invalid');
    }
  });

  // if everything is filled in, submit the form
  if (isValid) {
    form.submit();
  }
});