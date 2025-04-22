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
        <div class="mt-5">
            <h1 class="text-center mb-4">Order List</h1>
            <table class="table table-bordered table-hover order-table">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Discount</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderItem as $key => $val)
                    <tr>
                        <td>{{ ++$key}}</td>
                        <td>{{ $val->orderId }}</td>
                        <td>{{ $val->productId }}</td>
                        <td>{{ $val->name }}</td>
                        <td>{{ $val->qty }}</td>
                        <td>{{ $val->discount }}</td>
                        <td>{{ $val->price }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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