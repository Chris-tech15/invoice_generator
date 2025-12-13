<?php
// resources/dashboard.php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: /resources/auth/login.php");
    exit;
}

 require_once __DIR__ . '/../config/db.php';

$title = "Dashboard | Invoice Generator";

ob_start();
?>

<main class="flex flex-col min-h-screen p-8 bg-gray-100">

    <!-- Info Cards Container -->
    <div class="flex flex-wrap w-full gap-6 mb-8">
        <!-- Example Info Card -->
        <a href="#" class="flex-1 min-w-[280px] p-12 border shadow-md bg-blue-500 text-white rounded-xl hover:bg-blue-600 hover:shadow-xl transition">
            <h5 class="mb-3 text-2xl font-semibold leading-8 tracking-tight">Total Invoices</h5>
            <p class="text-4xl font-bold">
                <?php
                $stmt = $pdo->prepare("SELECT COUNT(*) FROM invoices WHERE company_id = ?");
                $stmt->execute([$_SESSION['company_id']]);
                echo $stmt->fetchColumn();
                ?>
            </p>
        </a>

        <a href="#" class="flex-1 min-w-[280px] p-12 border shadow-md bg-green-500 text-white rounded-xl hover:bg-green-600 hover:shadow-xl transition">
            <h5 class="mb-3 text-2xl font-semibold leading-8 tracking-tight">Total Customers</h5>
            <p class="text-4xl font-bold">
                <?php
                $stmt = $pdo->prepare("SELECT COUNT(DISTINCT customer_email) FROM invoices WHERE company_id = ?");
                $stmt->execute([$_SESSION['company_id']]);
                echo $stmt->fetchColumn();
                ?>
            </p>
        </a>

        <a href="#" class="flex-1 min-w-[280px] p-12 border shadow-md bg-yellow-500 text-white rounded-xl hover:bg-yellow-600 hover:shadow-xl transition">
            <h5 class="mb-3 text-2xl font-semibold leading-8 tracking-tight">Total Revenue</h5>
            <p class="text-4xl font-bold">
                <?php
                $stmt = $pdo->prepare("SELECT IFNULL(SUM(total_amount),0) FROM invoices WHERE company_id = ? AND status='paid'");
                $stmt->execute([$_SESSION['company_id']]);
                echo number_format($stmt->fetchColumn(), 2);
                ?>
            </p>
        </a>
    </div>

    <!-- Recent Invoices Table -->
    <div class="flex-1 w-full p-6 overflow-x-auto bg-white shadow-xl rounded-xl">
        <h2 class="mb-6 text-2xl font-semibold">Recent Invoices</h2>
        <table class="min-w-full text-lg border border-gray-300 table-auto">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-6 py-3 border">Invoice #</th>
                    <th class="px-6 py-3 border">Customer</th>
                    <th class="px-6 py-3 border">Amount</th>
                    <th class="px-6 py-3 border">Status</th>
                    <th class="px-6 py-3 border">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->prepare("SELECT * FROM invoices WHERE company_id = ? ORDER BY invoice_date DESC LIMIT 10");
                $stmt->execute([$_SESSION['company_id']]);
                $invoices = $stmt->fetchAll();

                if (!empty($invoices)) {
                    foreach ($invoices as $inv): ?>
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4 border"><?= htmlspecialchars($inv['invoice_number']) ?></td>
                            <td class="px-6 py-4 border"><?= htmlspecialchars($inv['customer_name']) ?></td>
                            <td class="px-6 py-4 border"><?= number_format($inv['total_amount'], 2) ?></td>
                            <td class="px-6 py-4 capitalize border"><?= htmlspecialchars($inv['status']) ?></td>
                            <td class="px-6 py-4 border"><?= htmlspecialchars($inv['invoice_date']) ?></td>
                        </tr>
                    <?php endforeach;
                } else { ?>
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center border">No invoices found.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</main>


<?php
$content = ob_get_clean();
require __DIR__ . '/layout/layout.php';
