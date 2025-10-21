<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Entry</title>
    <!-- Using Tailwind CSS via CDN for easier styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.3s ease-out;
        }
        .animate-pulse {
            animation: pulse 0.5s ease;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.02); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden w-full max-w-2xl animate-fade-in">
        <!-- Card Header -->
        <div class="bg-white px-6 py-4 border-b border-gray-200">
            <div class="flex items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <h1 class="text-xl font-semibold text-gray-800">New Product Entry</h1>
            </div>
            <p class="text-sm text-gray-500 mt-1">Fill in the details below to add a new product</p>
        </div>
        
        <!-- Card Body -->
        <div class="p-6">
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">There were {{ $errors->count() }} errors with your submission</h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('store') }}">
                @csrf
                
                <!-- Product Name -->
                <div class="mb-6">
                    <label for="ProductName" class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                    <input type="text" id="ProductName" name="ProductName" 
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                           placeholder="Enter product name" 
                           value="{{ old('ProductName') }}"
                           required>
                </div>
                
                <!-- Price and Quantity -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Unit Price ($)</label>
                        <input type="number" step="0.01" id="price" name="price" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="0.00" 
                               value="{{ old('price') }}"
                               required>
                    </div>
                    <div>
                        <label for="qty" class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                        <input type="number" id="qty" name="qty" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                               value="{{ old('qty', 1) }}" 
                               min="1" 
                               required>
                    </div>
                </div>
                
                <!-- Total Amount Display -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                    <p class="text-xs font-semibold text-blue-800 uppercase tracking-wider">Total Amount</p>
                    <p id="totalAmount" class="text-2xl font-bold text-blue-600">$0.00</p>
                </div>
                
                <!-- Description -->
                <div class="mb-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                    <textarea id="description" name="description" rows="3" 
                              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                              placeholder="Product description and features">{{ old('description') }}</textarea>
                </div>
                
                <!-- Category -->
                <div class="mb-8">
                    <label for="categoryID" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select id="categoryID" name="categoryID" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                            required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->categoryID }}" {{ old('categoryID') == $category->categoryID ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Form Actions -->
                <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-3">
                    <button type="reset" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-trash mr-2"></i> Clear
                    </button>
                    <a href="{{ url('/') }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 text-center">
                        <i class="fas fa-arrow-left mr-2"></i> Back
                    </a>
                    <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-plus mr-2"></i> Add Product
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const priceInput = document.getElementById('price');
            const quantityInput = document.getElementById('qty');
            const totalAmountDisplay = document.getElementById('totalAmount');
            
            function calculateTotal() {
                const price = parseFloat(priceInput.value) || 0;
                const quantity = parseInt(quantityInput.value) || 0;
                const total = (price * quantity).toLocaleString('en-US', {
                    style: 'currency',
                    currency: 'USD'
                });
                
                totalAmountDisplay.textContent = total;
                totalAmountDisplay.classList.add('animate-pulse');
                setTimeout(() => totalAmountDisplay.classList.remove('animate-pulse'), 500);
            }
            
            // Initial calculation
            calculateTotal();
            
            // Event listeners
            priceInput.addEventListener('input', calculateTotal);
            quantityInput.addEventListener('input', calculateTotal);
            
            // Form reset handler
            document.querySelector('form').addEventListener('reset', function() {
                setTimeout(() => {
                    quantityInput.value = 1;
                    calculateTotal();
                }, 0);
            });
        });
    </script>
</body>
</html>