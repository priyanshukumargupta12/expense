document.addEventListener('DOMContentLoaded', () => {
    const expenseForm = document.getElementById('expenseForm');
    const expenseTableBody = document.getElementById('expenseTableBody');

    // Fetch and display existing expenses
    function loadExpenses() {
        fetch('get_expenses.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    expenseTableBody.innerHTML = '';
                    data.expenses.forEach(expense => {
                        const row = `
                            <tr>
                                <td>${expense.description}</td>
                                <td>$${parseFloat(expense.amount).toFixed(2)}</td>
                                <td>${expense.category}</td>
                                <td>${expense.expense_date}</td>
                            </tr>
                        `;
                        expenseTableBody.innerHTML += row;
                    });
                }
            });
    }

    // Add new expense
    expenseForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const expenseData = {
            description: document.getElementById('description').value,
            amount: document.getElementById('amount').value,
            category: document.getElementById('category').value,
            date: document.getElementById('date').value
        };

        fetch('add_expense.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(expenseData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadExpenses();
                expenseForm.reset();
            } else {
                alert('Error adding expense');
            }
        });
    });

    // Initial load of expenses
    loadExpenses();
});
