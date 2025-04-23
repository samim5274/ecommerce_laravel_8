<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>

    <div style="text-align: center; margin: 0 0 20px 0; padding: 0;">
        <h1 style="margin: 0;">Ecommerce Management System</h1>
        <p style="margin: 2px 0;">Address: 1234 Example Street, City, Country</p>
        <p style="margin: 2px 0;">Phone: +123 456 7890</p>
        <p style="margin: 2px 0;">Email: info@mycompany.com</p>
    </div>


    <h3>Customer Details</h3>
        @if ($order->isNotEmpty())
        @php $o = $order->first(); @endphp

        <div style="border: 1px solid #ccc; border-radius: 10px; padding: 20px; margin-bottom: 20px;">
            <div style="display: flex; justify-content: space-between; flex-wrap: wrap;">
                <div><strong>Order ID:</strong> {{ $o->id }}</div>
                <div><strong>Customer Name:</strong> {{ $o->user->name }}</div>
                <div><strong>Email:</strong> {{ $o->user->email ?? 'N/A' }}</div>
                <div><strong>Order Date:</strong> {{ $o->created_at->format('Y-m-d') }}</div>
                <div><strong>Total:</strong> ${{ number_format($o->total, 2) }}</div>
            </div>
        </div>
        @endif

    <h2>Order Items</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Qty</th>
                <th>Discount</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp

            @foreach ($orderItem as $item)
                @php
                    $itemTotal = $item->qty * ($item->price - $item->discount);
                    $total += $itemTotal;
                @endphp
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>${{ number_format($item->discount, 2) }}/-</td>
                    <td>${{ number_format($item->price, 2) }}/-</td>
                    <td>${{ number_format($itemTotal, 2) }}/-</td>
                </tr>
            @endforeach

            <tr>
                <td colspan="5" class="text-end"><strong>Total:</strong></td>
                <td><strong>BDT ${{ number_format($total) }}/-</strong></td>
            </tr>
        </tbody>
    </table>
    <footer style="margin-top: 40px; text-align: center; font-size: 14px; color: #555;">
        <p><strong>Note:</strong> Return Policy - Products can be returned within 30 days of purchase with a valid receipt. Terms and conditions apply.</p>
    </footer>
</body>
</html>