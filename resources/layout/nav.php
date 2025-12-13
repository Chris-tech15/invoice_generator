<?php
// resources/layout/nav.php
// Only show if user is logged in
if (!isset($_SESSION)) session_start();
?>

<nav class="flex items-center justify-between p-4 text-white bg-gray-800">
    <div class="flex items-center space-x-4">
        <span class="text-xl font-bold">Invoice Generator</span>
        <a href="/resources/dashboard.php" class="hover:underline">Dashboard</a>
        <a href="/resources/invoices/list.php" class="hover:underline">Invoices</a>
        <a href="/resources/customers/list.php" class="hover:underline">Customers</a>
        <a href="/resources/reports.php" class="hover:underline">Reports</a>
    </div>
    <div>
        <span class="mr-4">Hello, <?= htmlspecialchars($_SESSION['username'] ?? 'User') ?></span>
        <a href="/resources/auth/logout.php" class="px-3 py-1 bg-red-500 rounded hover:bg-red-600">Logout</a>
    </div>
</nav>
