<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Product | Inventory</title>
    <style>
        :root {
            --primary: #4f46e5;
            --primary-light: #a5b4fc;
            --primary-dark: #3730a3;
            --secondary: #10b981;
            --accent: #f59e0b;
            --light: #f8fafc;
            --dark: #1e293b;
            --darker: #0f172a;
            --gray: #94a3b8;
            --light-gray: #f1f5f9;
            --border-radius: 0.5rem;
            --border-radius-lg: 0.75rem;
            --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background-color: var(--light-gray);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            color: var(--dark);
            line-height: 1.5;
        }

        .card {
            width: 100%;
            max-width: 720px;
            background: white;
            border-radius: var(--border-radius-lg);
            box-shadow: var(--shadow-md);
            overflow: hidden;
            transition: var(--transition);
        }

        .card:hover {
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .card-header {
            padding: 1.75rem 2rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .card-title svg {
            width: 1.75rem;
            height: 1.75rem;
            color: white;
        }

        .card-subtitle {
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.8);
            margin-top: 0.5rem;
        }

        .card-body {
            padding: 2rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--darker);
        }

        .form-label.required:after {
            content: " *";
            color: #ef4444;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray);
            border-radius: var(--border-radius);
            font-size: 0.9375rem;
            transition: var(--transition);
            background-color: white;
            color: var(--dark);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }

        .form-control::placeholder {
            color: var(--gray);
            opacity: 0.7;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
            line-height: 1.6;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%231e293b'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7' /%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 1rem;
        }

        .amount-card {
            background-color: #f0fdf4;
            border-radius: var(--border-radius);
            padding: 1.25rem;
            margin-bottom: 1.75rem;
            border: 1px solid #dcfce7;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .amount-label {
            font-size: 0.875rem;
            color: var(--gray);
            font-weight: 600;
        }

        .amount-value {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--secondary);
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--light-gray);
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: var(--border-radius);
            font-size: 0.9375rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border: 1px solid transparent;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-outline {
            background-color: white;
            border-color: var(--gray);
            color: var(--dark);
        }

        .btn-outline:hover {
            background-color: var(--light-gray);
            border-color: var(--dark);
        }

        .btn-accent {
            background-color: var(--accent);
            color: white;
        }

        .btn-accent:hover {
            background-color: #d97706;
            transform: translateY(-1px);
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .card {
            animation: fadeIn 0.4s ease-out;
        }

        .pulse {
            animation: pulse 0.5s ease;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
                gap: 1.25rem;
            }
            
            .form-group.full-width {
                grid-column: span 1;
            }
            
            .form-actions {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            body {
                padding: 1rem;
            }
            
            .card-header {
                padding: 1.5rem;
            }
            
            .card-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                Add New Product
            </h1>
            <p class="card-subtitle">Fill in the product details below to add to inventory</p>
        </div>
        
        <div class="card-body">
            <form method="POST" action="{{ route('store') }}">
                @csrf
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label for="ProductName" class="form-label required">Product Name</label>
                        <input type="text" class="form-control" id="ProductName" name="ProductName" placeholder="e.g., Wireless Bluetooth Headphones" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="price" class="form-label required">Unit Price</label>
                        <div style="position: relative;">
                            <span style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: var(--gray);">$</span>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="0.00" style="padding-left: 30px;" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="qty" class="form-label required">Quantity</label>
                        <input type="number" class="form-control" id="qty" name="qty" value="1" min="1" required>
                    </div>
                </div>
                
                <div class="amount-card">
                    <div class="amount-label">TOTAL AMOUNT</div>
                    <div id="totalAmount" class="amount-value">$0.00</div>
                </div>
                
                <div class="form-group">
                    <label for="description" class="form-label">Product Description</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Describe the product features, specifications, and benefits..."></textarea>
                </div>
                
                <div class="form-group">
                    <label for="category" class="form-label required">Category</label>
                    <select name="categoryID" class="form-control" required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->categoryID }}"
                                {{ old('categoryID') == $category->categoryID ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-actions">
                    <button type="reset" class="btn btn-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="18" height="18">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Clear Form
                    </button>
                    <button type="button" class="btn btn-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="18" height="18">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Save & Add Another
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="18" height="18">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Save Product
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
                    currency: 'USD',
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                });
                
                totalAmountDisplay.textContent = total;
                totalAmountDisplay.classList.add('pulse');
                setTimeout(() => totalAmountDisplay.classList.remove('pulse'), 500);
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