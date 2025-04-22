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
      <h2 class="mb-4">Product Update</h2>
          <a href="/add-product-view"><button type="reset" class="btn btn-warning">Back</button></a>  
        <div class="container py-5">
            <div class="form-container">
                <h3 class="mb-4">Update Product</h3>    
                <form action="{{url('/edit-product/'.$products->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" value="{{$products->productName}}" name="product_name" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="sku" class="form-label">Product SKU</label>
                        <input type="text" value="{{$products->sku}}" name="sku" class="form-control" required>
                    </div>
                    </div>

                    <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="unit" class="form-label">Product Unit</label>
                        <select class="form-select" name="unit" required>
                            <option value="" disabled selected disabled>--Choose unit--</option>
                            <option value="kg" {{ $products->unit == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                            <option value="litre" {{ $products->unit == 'litre' ? 'selected' : '' }}>Litre (L)</option>
                            <option value="piece" {{ $products->unit == 'piece' ? 'selected' : '' }}>Piece (pcs)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="unit_value" class="form-label">Product Unit Value</label>
                        <input type="text" value="{{$products->unitValue}}" name="unit_value" class="form-control" placeholder="e.g., 1kg, 3L, 5pcs" required>
                    </div>
                    </div>

                    <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="selling_price" class="form-label">Selling Price ($)</label>
                        <input type="number" value="{{$products->sellingPrice}}" step="0.01" name="selling_price" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="purchase_price" class="form-label">Purchase Price ($)</label>
                        <input type="number" value="{{$products->purchasePrice}}" step="0.01" name="purchase_price" class="form-control" required>
                    </div>
                    </div>

                    <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="discount" class="form-label">Discount (%)</label>
                        <input type="number" value="{{$products->discount}}" step="0.01" name="discount" class="form-control" placeholder="e.g., 5%">
                    </div>
                    <div class="col-md-6">
                        <label for="tax" class="form-label">Tax (%)</label>
                        <input type="number" value="{{$products->tax}}" step="0.01" name="tax" class="form-control" placeholder="e.g., 10%">
                    </div>
                    </div>

                    <div class="mb-3">
                        <label for="productImage" class="form-label">Product Image</label>
                        <input type="file" name="image[]" multiple class="form-control" accept="image/*" required>
                        <small class="text-muted">You can select up to 4 images.</small>
                    </div>    
                      
                    <div class="card mt-4" style="width: 100%;">
                        <div class="small-img-row d-flex">
                        @if(isset($images[0]))<div class="small-img-col"><img src="{{asset($images[0])}}" alt="" width="100%" height="100%" class="small-img"></div>@endif
                        @if(isset($images[1]))<div class="small-img-col"><img src="{{asset($images[1])}}" alt="" width="100%" height="100%" class="small-img"></div>@endif
                        @if(isset($images[2]))<div class="small-img-col"><img src="{{asset($images[2])}}" alt="" width="100%" height="100%" class="small-img"></div>@endif
                        @if(isset($images[3]))<div class="small-img-col"><img src="{{asset($images[3])}}" alt="" width="100%" height="100%" class="small-img"></div>@endif
                        </div>
                    </div><br>

                    <div class="d-flex gap-2">
                        <button type="submit" onclick="return confirm('Are you sure you want to update this item?')" class="btn btn-warning w-100">Updated Product</button>                   
                    </div>
                </form><br>
                <a href="{{url('/delete-item/'.$products->id)}}" class="d-block text-center"><button class="btn btn-danger w-100" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button></a>   
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
