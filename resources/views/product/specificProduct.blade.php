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
            <div class="row g-4 align-items-start">
                <!-- Product Image -->
                <div class="col-md-6">
                    <div class="border rounded-4 overflow-hidden shadow-sm">
                        @if(isset($images[0]))<img src="{{asset($images[0])}}" class="img-fluid w-100" alt="" style="object-fit: cover; height: 100%;">@endif
                    </div><br>

                    <!-- Thumbnails -->
                    <div class="d-flex flex-wrap gap-2">
                        @if(isset($images[1]))<img src="{{asset($images[1])}}" class="img-thumbnail thumb-img" alt="Main" style="height: 80px; width: 80px; object-fit: cover; cursor: pointer;">@endif
                        @if(isset($images[2]))<img src="{{asset($images[2])}}" class="img-thumbnail thumb-img" alt="Main" style="height: 80px; width: 80px; object-fit: cover; cursor: pointer;">@endif
                        @if(isset($images[3]))<img src="{{asset($images[3])}}" class="img-thumbnail thumb-img" alt="Main" style="height: 80px; width: 80px; object-fit: cover; cursor: pointer;">@endif
                    </div>
                </div>

                <!-- Product Info -->
                <div class="col-md-6">
                    <h2 class="fw-bold mb-3">{{ $products->productName }}</h2>

                    <div class="mb-3">
                        @if($products->discount > 0)
                            <h4 class="text-danger fw-bold d-inline">
                                ${{ number_format($products->sellingPrice - ($products->sellingPrice * $products->discount / 100), 2) }}
                            </h4>
                            <span class="text-muted text-decoration-line-through ms-2">
                                ${{ number_format($products->sellingPrice, 2) }}
                            </span>
                            <span class="badge bg-success ms-2">{{ $products->discount }}% OFF</span>
                        @else
                            <h4 class="fw-bold">${{ number_format($products->sellingPrice, 2) }}</h4>
                        @endif
                    </div>

                    <p class="text-muted mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo expedita magnam, illum, nam cumque deserunt molestiae labore, nulla distinctio rem assumenda exercitationem repudiandae dolor dolorum asperiores nemo neque est. Quasi, at itaque corporis velit, facilis culpa non perspiciatis voluptatem, quod sed architecto ad distinctio eligendi harum ipsum asperiores sint illo!</p>

                    <!-- Quantity Selector -->
                    <form action="{{url('/add-to-card/'.$products->id)}}" method="GET">
                        @csrf
                        <div class="mb-4">
                            <label for="qty" class="form-label">Quantity:</label>
                            <input type="number" name="txtqty" id="qty" value="1" min="1" class="form-control w-25">
                        </div>

                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-cart-plus me-1"></i> Add to Cart
                            </button>
                            <a href="/show-all-product" class="btn btn-outline-secondary btn-lg">Back to Shop</a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Optional: Related Products or Reviews -->
            {{-- <div class="mt-5">
                <h4>Similar Products</h4>
                @include('components.related-products', ['product' => $product])
            </div> --}}
        </div>

    </div>
</div>


  <script>
    const menuToggle = document.getElementById('menu-toggle');
    const sidebar = document.getElementById('sidebar');

    menuToggle.addEventListener('click', () => {
      sidebar.classList.toggle('show');
    });

    document.querySelectorAll('.thumb-img').forEach(img => {
        img.addEventListener('click', () => {
            document.getElementById('mainImage').src = img.src;
        });
    });

  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
