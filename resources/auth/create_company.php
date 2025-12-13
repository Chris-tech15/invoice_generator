<?php
$title = "Create Company | Invoice Generator";

// Page-specific content
ob_start();
?>

<div class="flex justify-center items-center min-h-[70vh]">
    <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-lg">
        <h2 class="mb-6 text-3xl font-bold text-center">Create Your Company</h2>

        <form action="/controllers/company_controller.php" 
              method="POST"
              enctype="multipart/form-data"
              class="space-y-5">

            <!-- Company Name -->
            <div>
                <label for="company_name" class="block mb-1 font-medium">Company Name</label>
                <input type="text" name="company_name" id="company_name" required
                       placeholder="Enter your company name"
                       class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Company Email -->
            <div>
                <label for="email" class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" id="email" required
                       placeholder="example@company.com"
                       class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Phone Number -->
            <div>
                <label for="phone" class="block mb-1 font-medium">Phone Number</label>
                <input type="text" name="phone" id="phone" required
                       placeholder="699 999 999"
                       class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Company Website -->
            <div>
                <label for="website" class="block mb-1 font-medium">Website (optional)</label>
                <input type="text" name="website" id="website"
                       placeholder="https://yourcompany.com"
                       class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Company Address -->
            <div>
                <label for="address" class="block mb-1 font-medium">Company Address</label>
                <input type="text" name="address" id="address" required
                       placeholder="City, Street"
                       class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Company Logo Upload -->
            <div>
                <label for="logo" class="block mb-1 font-medium">Company Logo</label>
                <input type="file" name="logo" id="logo" accept="image/*"
                       class="w-full p-3 border rounded-lg bg-gray-50">
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit"
                        class="px-6 py-3 font-bold text-white transition transform bg-blue-500 rounded-lg hover:bg-blue-600 hover:scale-105">
                    Submit for Validation
                </button>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require __DIR__ . '/../layout/layout.php';
