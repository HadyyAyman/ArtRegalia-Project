document.addEventListener('DOMContentLoaded', function () {
  const modal = document.getElementById('editModal');
  const span = document.getElementsByClassName('close')[0];
  const form = document.getElementById('editForm');

  // Open the modal
  function openModal(category) {
    document.getElementById('editCategoryId').value = category.id;
    document.getElementById('editCategoryName').value = category.name;
    document.getElementById('editParentId').value = category.parentId;
    document.getElementById('editCategoryType').value = category.type;
    modal.style.display = 'block';
  }

  // Close the modal
  span.onclick = function () {
    modal.style.display = 'none';
  }

  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = 'none';
    }
  }

  // Attach event listeners to Edit links
  document.querySelectorAll('#table-body a[data-id]').forEach(function (editLink) {
    editLink.addEventListener('click', function (event) {
      event.preventDefault();
      const categoryId = this.getAttribute('data-id');
      const category = php_data.find(cat => cat.id == categoryId);
      openModal(category);
    });
  });
});