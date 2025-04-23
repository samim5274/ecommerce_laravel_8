<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      overflow-x: hidden;
    }
    .sidebar {
      height: 100vh;
      background: #212529;
      color: #fff;
      padding-top: 1rem;
      position: fixed;
      top: 0;
      left: 0;
      width: 240px;
      transition: all 0.3s;
      z-index: 1000;
    }
    .sidebar a {
      color: #adb5bd;
      padding: 12px 20px;
      display: flex;
      align-items: center;
      text-decoration: none;
      transition: 0.3s;
    }
    .sidebar a:hover, .sidebar a.active {
      background-color: #343a40;
      color: #fff;
    }
    .sidebar a i {
      margin-right: 10px;
    }
    .content {
      margin-left: 240px;
      padding: 20px;
      transition: margin-left 0.3s;
    }
    .form-container {
      max-width: 800px;
      margin: auto;
      background: white;
      padding: 40px;
      border-radius: 12px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }
    @media (max-width: 768px) {
      .sidebar {
        left: -240px;
      }
      .sidebar.show {
        left: 0;
      }
      .content {
        margin-left: 0;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  @include('layouts.dashboardMenu')
 

  <!-- Main Content -->
  <div class="content">
    <div class="container-fluid">
      @include('layouts.message')
        <div style="text-align: center; margin: 0 0 20px 0; padding: 0;">
            <h1 style="margin: 0;">Ecommerce Management System</h1>
            <p style="margin: 2px 0;">Address: 1234 Example Street, City, Country</p>
            <p style="margin: 2px 0;">Phone: +123 456 7890</p>
            <p style="margin: 2px 0;">Email: info@mycompany.com</p>
        </div>
        <div class="mt-2">
            @foreach($orders as $val)
                <form action="{{ url('/update-order-status/'.$val->id) }}" method="POST" class="row g-2 align-items-center mb-3">
                    @csrf
                    
                    <div class="col-auto">
                        <label for="order-date-{{ $val->id }}" class="col-form-label">Order Date:</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="order-date-{{ $val->id }}" class="form-control" value="{{ $val->date }}" readonly>
                    </div>

                    <div class="col-auto">
                        <label for="order-id-{{ $val->id }}" class="col-form-label">Order ID:</label>                        
                    </div>
                    <div class="col-auto">
                        <input type="text" id="order-id-{{ $val->id }}" class="form-control" value="{{ $val->id }}" readonly>
                    </div>

                    <div class="col-auto">
                        <label for="customer-name-{{ $val->id }}" class="col-form-label">Customer Name:</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="customer-name-{{ $val->id }}" class="form-control" value="{{ $val->user->name }}" readonly>
                    </div>
                    
                    <div>
                    <div class="col-auto">
                        <label for="status-{{ $val->id }}" class="col-form-label">Status:</label>
                    </div>
                    <div class="col-auto">
                        <select name="status" id="status-{{ $val->id }}" class="form-select">
                            @php
                                $statuses = [
                                    'pending' => 'Pending',
                                    'in_progress' => 'Processing',
                                    'shipped' => 'Shipped',
                                    'delivered' => 'Delivered',
                                    'cancelled' => 'Cancelled',
                                    'returned' => 'Returned',
                                    'refunded' => 'Refunded',
                                    'completed' => 'Completed',
                                ];
                            @endphp
                            @foreach($statuses as $value => $label)
                                <option value="{{ $value }}" {{ $val->status == $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    </div>

                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            @endforeach

        </div>
    </div>
</div>


  <script>
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');

    menuToggle.addEventListener('click', () => {
      sidebar.classList.toggle('show');
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>