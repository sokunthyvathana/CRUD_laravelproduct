<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Product List</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables -->
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.8/datatables.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --accent: #4895ef;
            --light: #f8f9fa;
            --dark: #212529;
            --success: #4cc9f0;
            --card-shadow: 0 8px 24px rgba(149, 157, 165, 0.2);
            --transition: all 0.3s ease;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e7f1 100%);
            min-height: 100vh;
            padding: 20px;
            color: #333;
        }
        
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transition: var(--transition);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            border-radius: 16px 16px 0 0 !important;
            padding: 20px 30px;
            border: none;
        }
        
        .card-title {
            font-weight: 600;
            letter-spacing: -0.5px;
            margin: 0;
            font-size: 1.8rem;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--accent) 0%, var(--primary) 100%);
            border: none;
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: 500;
            transition: var(--transition);
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(67, 97, 238, 0.4);
        }
        
        .btn-primary i {
            margin-right: 8px;
        }
        
        .table-container {
            padding: 20px;
        }
        
        #productsTable {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            border-radius: 12px;
            overflow: hidden;
        }
        
        #productsTable thead {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
            color: white;
        }
        
        #productsTable th {
            font-weight: 500;
            padding: 16px 15px;
            border: none;
        }
        
        #productsTable tbody tr {
            transition: var(--transition);
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
        
        #productsTable tbody tr:hover {
            background-color: rgba(67, 97, 238, 0.05);
        }
        
        #productsTable tbody td {
            padding: 14px 15px;
            vertical-align: middle;
            border: none;
        }
        
        #productsTable tbody tr:nth-child(even) {
            background-color: rgba(248, 249, 250, 0.5);
        }
        
        .price-cell {
            font-weight: 600;
            color: var(--primary);
        }
        
        .action-cell {
            text-align: center;
        }
        
        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(67, 97, 238, 0.1);
            color: var(--primary);
            transition: var(--transition);
            margin: 0 3px;
            text-decoration: none;
        }
        
        .action-btn:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }
        
        .status-badge {
            padding: 5px 12px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .status-active {
            background: rgba(76, 201, 240, 0.15);
            color: #0d6efd;
        }
        
        .status-inactive {
            background: rgba(108, 117, 125, 0.15);
            color: #6c757d;
        }
        
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            border-radius: 50px !important;
            margin: 0 3px;
            border: none !important;
            padding: 6px 14px !important;
            transition: var(--transition);
        }
        
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%) !important;
            color: white !important;
        }
        
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%) !important;
            color: white !important;
        }
        
        .dataTables_length select,
        .dataTables_filter input {
            border-radius: 50px;
            padding: 6px 15px;
            border: 1px solid #dee2e6;
            transition: var(--transition);
        }
        
        .dataTables_length select:focus,
        .dataTables_filter input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
        }
        
        .page-title {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
        }
        
        .page-title h1 {
            font-weight: 700;
            color: var(--dark);
            font-size: 2.2rem;
            margin-bottom: 10px;
        }
        
        .page-title p {
            color: #6c757d;
            font-size: 1.05rem;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .page-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--primary), var(--accent));
            border-radius: 2px;
            margin: 15px auto;
        }
        
        .stats-summary {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }
        
        .stat-card {
            flex: 1;
            min-width: 200px;
            background: white;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-right: 15px;
        }
        
        .icon-primary {
            background: rgba(67, 97, 238, 0.15);
            color: var(--primary);
        }
        
        .icon-success {
            background: rgba(76, 201, 240, 0.15);
            color: #0dcaf0;
        }
        
        .icon-warning {
            background: rgba(255, 193, 7, 0.15);
            color: #ffc107;
        }
        
        .stat-content h3 {
            font-size: 1.1rem;
            margin: 0;
            color: #6c757d;
            font-weight: 500;
        }
        
        .stat-content .value {
            font-size: 1.6rem;
            font-weight: 700;
            margin: 5px 0 0;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px 20px;
        }
        
        .empty-state i {
            font-size: 5rem;
            color: #e9ecef;
            margin-bottom: 20px;
        }
        
        .empty-state h3 {
            color: #6c757d;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: 20px; border-radius: 12px; border: none; background: rgba(16, 185, 129, 0.1); color: #065f46; padding: 1rem 1.5rem;">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        <div class="page-title">
            <h1>Product Inventory Dashboard</h1>
            <p>Manage your products with this modern interface</p>
        </div>
        
        <!-- Stats Summary -->
        <div class="stats-summary">
            <div class="stat-card">
                <div class="stat-icon icon-primary">
                    <i class="fas fa-box"></i>
                </div>
                <div class="stat-content">
                    <h3>Total Products</h3>
                    <div class="value">{{ count($products) }}</div>
                </div>
            </div>
            
            @php
                $activeCount = 0;
                $lowStockCount = 0;
                $outOfStockCount = 0;
                
                foreach ($products as $product) {
                    if ($product->qty > 10) {
                        $activeCount++;
                    } else if ($product->qty > 0 && $product->qty <= 10) {
                        $lowStockCount++;
                    } else {
                        $outOfStockCount++;
                    }
                }
            @endphp
            
            <div class="stat-card">
                <div class="stat-icon icon-success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-content">
                    <h3>Active Products</h3>
                    <div class="value">{{ $activeCount }}</div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon icon-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="stat-content">
                    <h3>Low Stock</h3>
                    <div class="value">{{ $lowStockCount }}</div>
                </div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-ban" style="background: rgba(220, 53, 69, 0.15); color: #dc3545;"></i>
                </div>
                <div class="stat-content">
                    <h3>Out of Stock</h3>
                    <div class="value">{{ $outOfStockCount }}</div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2 class="card-title mb-0"><i class="fas fa-list me-2"></i>Product List</h2>
                <a href="{{ url('/product') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Add New Product
                </a>
            </div>
            <div class="card-body table-container">
                @if(count($products) > 0)
                <table id="productsTable" class="table table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Status</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            @php
                                // Determine status based on quantity
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
                            <tr>
                                <td>{{ $product->ProductID }}</td>
                                <td>{{ $product->ProductName }}</td>
                                <td><span class="status-badge {{ $statusClass }}">{{ $status }}</span></td>
                                <td>{{ $product->qty }}</td>
                                <td class="price-cell">${{ number_format($product->price, 2) }}</td>
                                <td class="price-cell">${{ number_format($product->amount, 2) }}</td>
                                <td>{{ $product->category->category_name ?? 'N/A' }}</td>
                                <td class="action-cell">
                                    <a href="{{ route('products.show', $product->ProductID) }}" class="action-btn" title="View"><i class="fas fa-eye"></i></a>
                                    <a href="{{ route('products.edit', $product->ProductID) }}" class="action-btn" title="Edit"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('products.destroy', $product->ProductID) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete" onclick="return confirm('Are you sure you want to delete this product?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="empty-state">
                    <i class="fas fa-box-open"></i>
                    <h3>No products found</h3>
                    <p class="mt-3">You haven't added any products yet. Get started by adding your first product.</p>
                    <a href="{{ url('/product') }}" class="btn btn-primary mt-3">
                        <i class="fas fa-plus me-1"></i> Add Product
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.8/datatables.min.js"></script>
    
    <script>
        $(document).ready(function() {
            @if(count($products) > 0)
            $('#productsTable').DataTable({
                responsive: true,
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search products...",
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ products",
                    "paginate": {
                        "previous": "<i class='fas fa-chevron-left'></i>",
                        "next": "<i class='fas fa-chevron-right'></i>"
                    }
                },
                "dom": "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                       "<'row'<'col-sm-12'tr>>" +
                       "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                "initComplete": function(settings, json) {
                    $('.dataTables_filter input').addClass('form-control');
                    $('.dataTables_length select').addClass('form-select');
                }
            });
            @endif
        });
    </script>
</body>
</html>