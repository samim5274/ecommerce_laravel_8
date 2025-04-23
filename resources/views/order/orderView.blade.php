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
        
        <div class="row">
            <h2 class="mb-4">Order list of Date - {{date('d/M/Y')}}</h2>
            <table class="table table-bordered table-striped mt-4 table-responsive">
              <thead class="table-dark">
                  <tr>
                    <th scope="col" class="text-left">Date</th>
                    <th scope="col" >User</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col" class="text-center">Status</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($orders as $val)
                  <tr>
                        <td class="text-left">{{ $val->date }}</td>
                        <td><a href="{{url('/view-order-item/'.$val->id)}}">{{ $val->user->name }}</td></a>
                        <td>${{ $val->total }}/-</td>
                        @php
                            $statusColors = [
                                'pending' => 'bg-warning text-dark',
                                'in_progress' => 'bg-info text-dark',
                                'shipped' => 'bg-primary',
                                'delivered' => 'bg-success',
                                'cancelled' => 'bg-danger',
                                'returned' => 'bg-secondary',
                                'refunded' => 'bg-dark',
                                'completed' => 'bg-success',
                            ];

                            $badgeClass = $statusColors[$val->status] ?? 'bg-light text-dark';
                        @endphp
                        <td class="text-center"><a href="{{url('/order-status-view/'.$val->id)}}"><span class="badge {{ $badgeClass }}">{{ ucfirst(str_replace('_', ' ', $val->status)) }}</span></a></td>
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
