-- Insert Users
INSERT INTO users (name, email, password) VALUES
('Ahmed Ali', 'ahmed@example.com', MD5('pass123')),
('Fatima Khan', 'fatima@example.com', MD5('pass123')),
('Omar Siddique', 'omar@example.com', MD5('pass123')),
('Aisha Malik', 'aisha@example.com', MD5('pass123')),
('Hassan Raza', 'hassan@example.com', MD5('pass123'));

-- Insert Income
INSERT INTO income (user_id, source, amount, income_date) VALUES
(1, 'Salary', 5000.00, '2026-01-01'),
(2, 'Freelance', 1200.50, '2026-01-05'),
(3, 'Business', 3000.00, '2026-01-10'),
(4, 'Salary', 4500.00, '2026-01-03'),
(5, 'Investments', 800.00, '2026-01-07');

-- Insert Expenses
INSERT INTO expenses (user_id, category, description, amount, expense_date) VALUES
(1, 'Food', 'Groceries', 200.00, '2026-01-02'),
(2, 'Transport', 'Uber rides', 50.00, '2026-01-06'),
(3, 'Entertainment', 'Movies', 30.00, '2026-01-11'),
(4, 'Food', 'Restaurant', 100.00, '2026-01-04'),
(5, 'Transport', 'Bus pass', 20.00, '2026-01-08');

-- Insert Budgets
INSERT INTO budgets (user_id, category, amount, month) VALUES
(1, 'Food', 500.00, 2026),
(2, 'Transport', 200.00, 2026),
(3, 'Entertainment', 150.00, 2026),
(4, 'Food', 400.00, 2026),
(5, 'Transport', 100.00, 2026);
