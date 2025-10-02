{{-- <!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .form-section {
            transition: all 0.3s ease;
        }
        .form-section.hidden {
            display: none;
        }
        .tab-active {
            border-bottom: 3px solid #3b82f6;
            color: #3b82f6;
            font-weight: 600;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8 max-w-6xl">
        <!-- Header -->
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Library Management System</h1>
            <p class="text-gray-600">Manage books, members, and borrowing records</p>
        </header>

        <!-- Tabs Navigation -->
        <div class="flex border-b border-gray-200 mb-6 overflow-x-auto">
            <button onclick="showForm('create')" class="px-4 py-2 font-medium text-gray-600 hover:text-blue-500 focus:outline-none tab-active">
                Create Records
            </button>
            <button onclick="showForm('edit')" class="px-4 py-2 font-medium text-gray-600 hover:text-blue-500 focus:outline-none">
                Edit Records
            </button>
        </div>

        <!-- Create Forms Section -->
        <div id="create" class="form-section">
            <!-- Create Book Form -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-book text-blue-500 text-xl mr-2"></i>
                    <h2 class="text-xl font-semibold text-gray-800">Add New Book</h2>
                </div>
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 mb-2" for="book-title">Title</label>
                            <input type="text" id="book-title" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="book-author">Author</label>
                            <input type="text" id="book-author" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="book-isbn">ISBN</label>
                            <input type="text" id="book-isbn" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="book-published">Published Year</label>
                            <input type="number" id="book-published" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="book-category">Category</label>
                            <select id="book-category" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select Category</option>
                                <option value="fiction">Fiction</option>
                                <option value="non-fiction">Non-Fiction</option>
                                <option value="science">Science</option>
                                <option value="history">History</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="book-copies">Number of Copies</label>
                            <input type="number" id="book-copies" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    <div class="mt-4">
                        <label class="block text-gray-700 mb-2" for="book-description">Description</label>
                        <textarea id="book-description" rows="3" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <button type="button" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg mr-2 hover:bg-gray-300">Cancel</button>
                        <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Add Book</button>
                    </div>
                </form>
            </div>

            <!-- Create Member Form -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-user text-green-500 text-xl mr-2"></i>
                    <h2 class="text-xl font-semibold text-gray-800">Add New Member</h2>
                </div>
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 mb-2" for="member-name">Full Name</label>
                            <input type="text" id="member-name" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="member-email">Email</label>
                            <input type="email" id="member-email" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="member-phone">Phone Number</label>
                            <input type="tel" id="member-phone" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="member-id">Member ID</label>
                            <input type="text" id="member-id" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="member-address">Address</label>
                            <textarea id="member-address" rows="2" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="member-dob">Date of Birth</label>
                            <input type="date" id="member-dob" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <button type="button" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg mr-2 hover:bg-gray-300">Cancel</button>
                        <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Add Member</button>
                    </div>
                </form>
            </div>

            <!-- Create Borrow/Return Form -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-exchange-alt text-purple-500 text-xl mr-2"></i>
                    <h2 class="text-xl font-semibold text-gray-800">Borrow/Return Book</h2>
                </div>
                <form>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 mb-2" for="transaction-type">Transaction Type</label>
                            <select id="transaction-type" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                <option value="borrow">Borrow</option>
                                <option value="return">Return</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="member-select">Member</label>
                            <select id="member-select" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select Member</option>
                                <option value="1">John Doe (ID: M001)</option>
                                <option value="2">Jane Smith (ID: M002)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="book-select">Book</label>
                            <select id="book-select" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select Book</option>
                                <option value="1">The Great Gatsby (ISBN: 9780743273565)</option>
                                <option value="2">To Kill a Mockingbird (ISBN: 9780061120084)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2" for="transaction-date">Date</label>
                            <input type="date" id="transaction-date" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div id="due-date-container">
                            <label class="block text-gray-700 mb-2" for="due-date">Due Date</label>
                            <input type="date" id="due-date" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        <div id="return-condition-container" class="hidden">
                            <label class="block text-gray-700 mb-2" for="return-condition">Return Condition</label>
                            <select id="return-condition" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                <option value="excellent">Excellent</option>
                                <option value="good">Good</option>
                                <option value="damaged">Damaged</option>
                                <option value="lost">Lost</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <button type="button" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg mr-2 hover:bg-gray-300">Cancel</button>
                        <button type="submit" class="px-6 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600">Process Transaction</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Edit Forms Section -->
        <div id="edit" class="form-section hidden">
            <!-- Edit Book Form -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-book text-blue-500 text-xl mr-2"></i>
                    <h2 class="text-xl font-semibold text-gray-800">Edit Book</h2>
                </div>
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="edit-book-search">Search Book</label>
                        <div class="flex">
                            <input type="text" id="edit-book-search" placeholder="Search by title, author, or ISBN" class="w-full px-4 py-2 border rounded-l-lg focus:ring-blue-500 focus:border-blue-500">
                            <button type="button" class="px-4 py-2 bg-blue-500 text-white rounded-r-lg hover:bg-blue-600">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                    <div id="edit-book-details" class="hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 mb-2" for="edit-book-title">Title</label>
                                <input type="text" id="edit-book-title" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="edit-book-author">Author</label>
                                <input type="text" id="edit-book-author" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="edit-book-isbn">ISBN</label>
                                <input type="text" id="edit-book-isbn" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="edit-book-published">Published Year</label>
                                <input type="number" id="edit-book-published" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="edit-book-category">Category</label>
                                <select id="edit-book-category" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select Category</option>
                                    <option value="fiction">Fiction</option>
                                    <option value="non-fiction">Non-Fiction</option>
                                    <option value="science">Science</option>
                                    <option value="history">History</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="edit-book-copies">Number of Copies</label>
                                <input type="number" id="edit-book-copies" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                        <div class="mt-4">
                            <label class="block text-gray-700 mb-2" for="edit-book-description">Description</label>
                            <textarea id="edit-book-description" rows="3" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                        <div class="mt-6 flex justify-end">
                            <button type="button" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg mr-2 hover:bg-gray-300">Cancel</button>
                            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Update Book</button>
                            <button type="button" class="px-6 py-2 bg-red-500 text-white rounded-lg ml-2 hover:bg-red-600">Delete Book</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Edit Member Form -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-user text-green-500 text-xl mr-2"></i>
                    <h2 class="text-xl font-semibold text-gray-800">Edit Member</h2>
                </div>
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="edit-member-search">Search Member</label>
                        <div class="flex">
                            <input type="text" id="edit-member-search" placeholder="Search by name, email, or member ID" class="w-full px-4 py-2 border rounded-l-lg focus:ring-blue-500 focus:border-blue-500">
                            <button type="button" class="px-4 py-2 bg-green-500 text-white rounded-r-lg hover:bg-green-600">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                    <div id="edit-member-details" class="hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 mb-2" for="edit-member-name">Full Name</label>
                                <input type="text" id="edit-member-name" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="edit-member-email">Email</label>
                                <input type="email" id="edit-member-email" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="edit-member-phone">Phone Number</label>
                                <input type="tel" id="edit-member-phone" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="edit-member-id">Member ID</label>
                                <input type="text" id="edit-member-id" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="edit-member-address">Address</label>
                                <textarea id="edit-member-address" rows="2" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"></textarea>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="edit-member-dob">Date of Birth</label>
                                <input type="date" id="edit-member-dob" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                        <div class="mt-6 flex justify-end">
                            <button type="button" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg mr-2 hover:bg-gray-300">Cancel</button>
                            <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Update Member</button>
                            <button type="button" class="px-6 py-2 bg-red-500 text-white rounded-lg ml-2 hover:bg-red-600">Delete Member</button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Edit Borrow/Return Form -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center mb-4">
                    <i class="fas fa-exchange-alt text-purple-500 text-xl mr-2"></i>
                    <h2 class="text-xl font-semibold text-gray-800">Edit Transaction</h2>
                </div>
                <form>
                    <div class="mb-4">
                        <label class="block text-gray-700 mb-2" for="edit-transaction-search">Search Transaction</label>
                        <div class="flex">
                            <input type="text" id="edit-transaction-search" placeholder="Search by member name, book title, or transaction ID" class="w-full px-4 py-2 border rounded-l-lg focus:ring-blue-500 focus:border-blue-500">
                            <button type="button" class="px-4 py-2 bg-purple-500 text-white rounded-r-lg hover:bg-purple-600">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>

                    <div id="edit-transaction-details" class="hidden">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 mb-2" for="edit-transaction-type">Transaction Type</label>
                                <select id="edit-transaction-type" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    <option value="borrow">Borrow</option>
                                    <option value="return">Return</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="edit-member-select">Member</label>
                                <select id="edit-member-select" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select Member</option>
                                    <option value="1">John Doe (ID: M001)</option>
                                    <option value="2">Jane Smith (ID: M002)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="edit-book-select">Book</label>
                                <select id="edit-book-select" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Select Book</option>
                                    <option value="1">The Great Gatsby (ISBN: 9780743273565)</option>
                                    <option value="2">To Kill a Mockingbird (ISBN: 9780061120084)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2" for="edit-transaction-date">Date</label>
                                <input type="date" id="edit-transaction-date" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div id="edit-due-date-container">
                                <label class="block text-gray-700 mb-2" for="edit-due-date">Due Date</label>
                                <input type="date" id="edit-due-date" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            <div id="edit-return-condition-container">
                                <label class="block text-gray-700 mb-2" for="edit-return-condition">Return Condition</label>
                                <select id="edit-return-condition" class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500">
                                    <option value="excellent">Excellent</option>
                                    <option value="good">Good</option>
                                    <option value="damaged">Damaged</option>
                                    <option value="lost">Lost</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-6 flex justify-end">
                            <button type="button" class="px-6 py-2 bg-gray-200 text-gray-800 rounded-lg mr-2 hover:bg-gray-300">Cancel</button>
                            <button type="submit" class="px-6 py-2 bg-purple-500 text-white rounded-lg hover:bg-purple-600">Update Transaction</button>
                            <button type="button" class="px-6 py-2 bg-red-500 text-white rounded-lg ml-2 hover:bg-red-600">Delete Transaction</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Show/hide form sections
        function showForm(sectionId) {
            document.querySelectorAll('.form-section').forEach(section => {
                section.classList.add('hidden');
            });
            document.getElementById(sectionId).classList.remove('hidden');

            // Update active tab
            document.querySelectorAll('[onclick^="showForm"]').forEach(button => {
                button.classList.remove('tab-active');
            });
            event.currentTarget.classList.add('tab-active');
        }

        // Toggle due date and return condition fields based on transaction type
        document.getElementById('transaction-type').addEventListener('change', function() {
            const transactionType = this.value;
            const dueDateContainer = document.getElementById('due-date-container');
            const returnConditionContainer = document.getElementById('return-condition-container');

            if (transactionType === 'borrow') {
                dueDateContainer.classList.remove('hidden');
                returnConditionContainer.classList.add('hidden');
            } else {
                dueDateContainer.classList.add('hidden');
                returnConditionContainer.classList.remove('hidden');
            }
        });

        // Similar functionality for edit form
        document.getElementById('edit-transaction-type').addEventListener('change', function() {
            const transactionType = this.value;
            const dueDateContainer = document.getElementById('edit-due-date-container');
            const returnConditionContainer = document.getElementById('edit-return-condition-container');

            if (transactionType === 'borrow') {
                dueDateContainer.classList.remove('hidden');
                returnConditionContainer.classList.add('hidden');
            } else {
                dueDateContainer.classList.add('hidden');
                returnConditionContainer.classList.remove('hidden');
            }
        });

        // Simulate search functionality (would be replaced with actual search in a real app)
        document.querySelectorAll('[id$="-search"]').forEach(searchInput => {
            searchInput.addEventListener('keyup', function() {
                const detailsId = this.id.replace('-search', '-details');
                const detailsSection = document.getElementById(detailsId);

                if (this.value.length > 0) {
                    detailsSection.classList.remove('hidden');
                } else {
                    detailsSection.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html> --}}
