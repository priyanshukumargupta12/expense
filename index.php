<?php
session_start();
require_once 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Family Expense Manager</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Family Expense Manager</h1>
        
        <div class="expense-form">
            <h2>Add New Expense</h2>
            <form id="expenseForm">
                <input type="text" id="description" placeholder="Description" required>
                <input type="number" id="amount" placeholder="Amount" step="0.01" required>
                <select id="category" required>
                    <option value="">Select Category</option>
                    <option value="Groceries">Groceries</option>
                    <option value="Utilities">Utilities</option>
                    <option value="Entertainment">Entertainment</option>
                    <option value="Other">Other</option>
                </select>
                <input type="date" id="date" required>
                <button type="submit">Add Expense</button>
            </form>
        </div>

        <div class="expense-list">
            <h2>Expense List</h2>
            <table id="expenseTable">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Amount</th>
                        <th>Category</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody id="expenseTableBody">
                    <!-- Expenses will be dynamically loaded here -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
