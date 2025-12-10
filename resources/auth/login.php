<?php
$title = "Login | Invoice Generator";

// Page-specific content
ob_start();
?>

<div class="flex justify-center items-center min-h-[60vh]">
    <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-md">
        <h2 class="mb-6 text-2xl font-bold text-center">Login to Your Account</h2>

        <form action="/../../controllers/auth.php" method="POST" class="space-y-4">
            <!-- Company Code -->
            <div>
                <label for="company_code" class="block mb-1 text-sm font-medium">Company Code</label>
                <input type="text" name="company_code" id="company_code" placeholder="Enter your company code" 
                       class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400" autofocus>
            </div>

            <!-- Username -->
            <div>
                <label for="username" class="block mb-1 text-sm font-medium">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter your username"
                       class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block mb-1 text-sm font-medium">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password"
                       class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Login button -->
            <div class="flex items-center justify-between">
                <button type="submit" 
                        class="px-6 py-3 font-bold text-white transition transform bg-blue-500 rounded-lg hover:bg-blue-600 hover:scale-105">
                    Login
                </button>

                <a href="create_company.php" 
                   class="font-medium text-blue-500 hover:underline hover:text-blue-700">
                   Create Company
                </a>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();

// Load the layout template
require __DIR__ . '/../layout/layout.php';
