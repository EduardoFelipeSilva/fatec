// Exemplo de script para filtragem de tabela
document.addEventListener('DOMContentLoaded', () => {
    const searchInput = document.querySelector('.table-controls .search-box input');
    const tableRows = document.querySelectorAll('.sales-table tbody tr');

    searchInput.addEventListener('keyup', (e) => {
        const searchTerm = e.target.value.toLowerCase();

        tableRows.forEach(row => {
            let rowText = row.textContent.toLowerCase();
            if (rowText.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});