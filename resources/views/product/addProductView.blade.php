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
      <h2 class="mb-4">Product View</h2>
      @include('layouts.message')
        <div class="container py-5">
            <div class="form-container">
                <h3 class="mb-4">Add New Product</h3>
                <form action="/add-product" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" name="product_name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="sku" class="form-label">Product SKU</label>
                        <input type="text" name="sku" class="form-control" required>
                    </div>
                    </div>

                    <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="unit" class="form-label">Product Unit</label>
                        <select class="form-select" name="unit" required>
                            <option value="" selected disabled>--Choose unit--</option>
                            <option value="kg">Kilogram (kg)</option>
                            <option value="litre">Litre (L)</option>
                            <option value="piece">Piece (pcs)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="unit_value" class="form-label">Product Unit Value</label>
                        <input type="text" name="unit_value" class="form-control" placeholder="e.g., 1kg, 3L, 5pcs" required>
                    </div>
                    </div>

                    <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="selling_price" class="form-label">Selling Price ($)</label>
                        <input type="number" step="0.01" name="selling_price" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="purchase_price" class="form-label">Purchase Price ($)</label>
                        <input type="number" step="0.01" name="purchase_price" class="form-control" required>
                    </div>
                    </div>

                    <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="discount" class="form-label">Discount (%)</label>
                        <input type="number" step="0.01" name="discount" class="form-control" placeholder="e.g., 5%">
                    </div>
                    <div class="col-md-6">
                        <label for="tax" class="form-label">Tax (%)</label>
                        <input type="number" step="0.01" name="tax" class="form-control" placeholder="e.g., 10%">
                    </div>
                    </div>

                    <div class="mb-3">
                    <label for="productImage" class="form-label">Product Image</label>
                    <input type="file" name="image[]" multiple class="form-control" accept="image/*" required>
                    <small class="text-muted">You can select up to 4 images.</small>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-success">Add Product</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
        <h2 class="mb-4">Product Details</h2>
          <!-- @foreach ($products as $product)
            <div class="col-md-3">            
            @php $images = explode(' | ', $product->image); @endphp
                <div class="card mt-4" style="width: 18rem;">
                <img src="{{ asset($images[0]) }}" style="width: 100%; height: 15rem;" alt="Image" width="100"> 
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->productName }}</h5>
                        <p class="card-text mb-1"><strong>Price: </strong>{{ $product->sellingPrice }}</p>
                        <div class="text-center">
                        <a href="#" class="btn btn-primary">Add cart</a>
                        <a href="#" class="btn btn-warning">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
          @endforeach -->
            <table class="table table-bordered table-striped mt-4 table-responsive">
              <thead class="table-dark">
                  <tr>
                      <th scope="col">Image</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">SKU</th>
                      <th scope="col">Unit</th>
                      <th scope="col">Value</th>
                      <th scope="col">Price</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($products as $product)
                      @php 
                          $images = explode(' | ', $product->image); 
                          $thumbnail = isset($images[0]) ? $images[0] : '/img/default.jpg'; 
                      @endphp
                      <tr>
                          <td><img src="{{ asset($thumbnail) }}" alt="Image" style="width: 40px; height: 40px; object-fit: cover;"></td>
                          <td><a href="{{url('/edit-product-view/'.$product->id)}}">{{ $product->productName }}</td></a>
                          <td>{{ $product->sku }}</td>
                          <td>{{ $product->unit }}</td>
                          <td>{{ $product->unitValue }}</td>
                          <td>${{ $product->sellingPrice }}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
          <div class="d-flex justify-content-center mt-4">
            {{ $products->onEachSide(2)->links() }}
        </div>
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
