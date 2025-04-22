<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

        .sidebar a:hover,
        .sidebar a.active {
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

            <div class="my-4">
                <div class="row">

                    <div class="col-md-8">
                        <div class="row">
                            @foreach ($data as $product)
                                @php
                                    $images = explode(' | ', $product->image);
                                    $firstImage = $images[0] ?? 'img/default.png';
                                @endphp
                                <div class="col-md-3 col-sm-6 mb-4">
                                    <div class="card h-100 shadow-sm">
                                        <a href="{{url('/specific-product-view/'.$product->id)}}"><img src="{{ asset($firstImage) }}" class="card-img-top" alt="Product Image" style="height: 200px; object-fit: cover;"></a>
                                        <div class="card-body d-flex flex-column">
                                            <h5 class="card-title">{{ $product->productName }}</h5>
                                            <p class="mb-1"><strong>Price:</strong> ${{ $product->sellingPrice }}</p>
                                            <div class="mt-auto d-grid gap-2">
                                                <a href="{{url('/add-to-card/'.$product->id)}}" class="btn btn-sm btn-info">Add to Cart</a>
                                                <a href="#" class="btn btn-sm btn-warning">Buy Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card p-4 shadow-sm">
                            <h4 id="product-name">Select a product</h4>
                            @php $total = 0; $cart = session('cart', []); @endphp
                            @if(session('cart') && count(session('cart')) > 0)
                              <table class="table table-hover table-sm table-responsive">
                                  <thead>
                                      <tr>
                                          <th>ID</th>
                                          <th>Image</th>
                                          <th>Product</th>
                                          <th>Qty</th>
                                          <th>Price</th>
                                          <th></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach(session('cart') as $i => $item)
                                      @php
                                        $discount = ($item['price'] * $item['discount'])/100;
                                        $finalPrice = $item['price'] - $discount;
                                        $total += $finalPrice;
                                      @endphp
                                          <tr>
                                              <td>{{ $item['id'] }}</td>
                                              <td><img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" width="50" height="50"></td>
                                              <td>{{ $item['name'] }}</td>
                                              <td>{{ $item['qty'] }}</td>
                                              <td>${{ number_format($finalPrice, 2) }}</td>
                                              <td><a class="w3-button w3-black" href="{{ url('/remove/cart/'.$item['id']) }}"><i class="bi bi-trash3-fill text-danger"></i></a></td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                              <form action="/order/place" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-warning w-100">Place Order</button>
                                </form><br>

                          @else
                              <p>Your cart is empty.</p>
                          @endif
                            <!-- <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" id="quantity" value="1" min="1"
                                    class="form-control w-25">
                            </div> -->
                            <h4>Total Price: $<span id="total-price">{{ number_format($total, 2) }}</span></h4>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{ $data->onEachSide(2)->links() }}
                    </div>

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
