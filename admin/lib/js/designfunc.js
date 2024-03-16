/*==================== CHANGE COLOR NAVBAR ====================*/
window.addEventListener('scroll', function () {
  var header = document.getElementById('header');
  if (window.scrollY > 50) {
    header.classList.add('scroll');
  } else {
    header.classList.remove('scroll');
  }
});
/*==================== VIEW PASSWORD ====================*/
function togglePasswordVisibility() {
  var passwordInput = document.getElementById('password');
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
  } else {
    passwordInput.type = 'password';
  }
}

// DESIGN FUNC ADMIN SIDE
/*==================== SEARCH BAR ====================*/
const searchInput = document.getElementById('searchInput');
const searchPatientName = document.getElementById('searchPatientName');

searchInput.addEventListener('input', function () {
  const searchText = this.value.toLowerCase();
  const rows = searchPatientName.getElementsByTagName('tr');
  let matchFound = false;

  for (let row of rows) {
    const nameColumn = row.getElementsByTagName('td')[0];
    if (nameColumn) {
      const nameText = nameColumn.textContent.toLowerCase();
      if (nameText.includes(searchText)) {
        row.style.display = '';
        matchFound = true;
      } else {
        row.style.display = 'none';
      }
    }
  }

  const existingNoNameRow = searchPatientName.querySelector('.no-name-row');
  if (existingNoNameRow) {
    existingNoNameRow.remove();
  }

  if (!matchFound) {
    const noNameRow = document.createElement('tr');
    noNameRow.classList.add('no-name-row');
    const noNameCell = document.createElement('td');
    noNameCell.setAttribute('colspan', '6');
    noNameCell.textContent = 'No name found';
    noNameRow.appendChild(noNameCell);
    searchPatientName.appendChild(noNameRow);
  }
});
