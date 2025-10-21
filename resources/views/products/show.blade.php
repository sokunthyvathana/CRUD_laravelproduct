<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->ProductName }} | Product Details</title>
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
            padding: 2rem;
            color: var(--dark);
            line-height: 1.5;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .card {
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

        .product-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .info-group {
            margin-bottom: 1.5rem;
        }

        .info-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.5rem;
        }

        .info-value {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--dark);
        }

        .price-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--secondary);
        }

        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-size: 0.875rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .status-active {
            background: rgba(16, 185, 129, 0.15);
            color: var(--secondary);
        }

        .status-warning {
            background: rgba(245, 158, 11, 0.15);
            color: var(--accent);
        }

        .status-inactive {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
        }

        .description-section {
            background: var(--light-gray);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .description-text {
            color: var(--dark);
            line-height: 1.7;
            font-size: 1rem;
        }

        .actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
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
            text-decoration: none;
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

        .btn-danger {
            background-color: #ef4444;
            color: white;
        }

        .btn-danger:hover {
            background-color: #dc2626;
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

        /* Responsive */
        @media (max-width: 768px) {
            .product-info {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .actions {
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
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    Product Details
                </h1>
                <p class="card-subtitle">Viewing information for {{ $product->ProductName }}</p>
            </div>
            
            <div class="card-body">
                <div class="product-info">
                    <div class="info-group">
                        <div class="info-label">Product ID</div>
                        <div class="info-value">#{{ $product->ProductID }}</div>
                    </div>
                    
                    <div class="info-group">
                        <div class="info-label">Product Name</div>
                        <div class="info-value">{{ $product->ProductName }}</div>
                    </div>
                    
                    <div class="info-group">
                        <div class="info-label">Category</div>
                        <div class="info-value">{{ $product->category->category_name ?? 'N/A' }}</div>
                    </div>
                    
                    <div class="info-group">
                        <div class="info-label">Status</div>
                        <div>
                            @php
                                $status = '';
                                $statusClass = '';
                                if ($product->qty > 10) {
                                    $status = 'In Stock';
                                    $statusClass = 'status-active';
                                } elseif ($product->qty > 0 && $product->qty <= 10) {
                                    $status = 'Low Stock';
                                    $statusClass = 'status-warning';
                                } else {
                                    $status = 'Out of Stock';
                                    $statusClass = 'status-inactive';
                                }
                            @endphp
                            <span class="status-badge {{ $statusClass }}">{{ $status }}</span>
                        </div>
                    </div>
                    
                    <div class="info-group">
                        <div class="info-label">Quantity</div>
                        <div class="info-value">{{ $product->qty }} units</div>
                    </div>
                    
                    <div class="info-group">
                        <div class="info-label">Unit Price</div>
                        <div class="price-value">${{ number_format($product->price, 2) }}</div>
                    </div>
                    
                    <div class="info-group">
                        <div class="info-label">Total Amount</div>
                        <div class="price-value">${{ number_format($product->amount, 2) }}</div>
                    </div>
                </div>
                
                @if($product->description)
                <div class="description-section">
                    <div class="info-label">Description</div>
                    <div class="description-text">{{ $product->description }}</div>
                </div>
                @endif
                
                <div class="actions">
                    <a href="{{ route('products.index') }}" class="btn btn-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="18" height="18">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to List
                    </a>
                    <a href="{{ route('products.edit', $product->ProductID) }}" class="btn btn-accent">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="18" height="18">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Product
                    </a>
                    <form action="{{ route('products.destroy', $product->ProductID) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="18" height="18">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            Delete Product
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 