<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice No: {{ $invoiceId }}</title>
    <link href="{{public_path('pdf.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
    <h1>Invoice</h1>
    <p>Invoice ID: {{ $invoiceId }}</p>
    <p class="customer-name">Customer Name: {{ $customerName }}</p>

    <table>
        <tr>
            <th>Item</th>
            <th>Qty</th>
            <th>Price</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>${{ $item['price'] }}</td>
            </tr>
         @endforeach
    </table>

    <div class="page-break"></div>

    <div style="padding-top: 12px; font-weight: bold;">
        Total: ${{ $total }}
    </div>

    <div class="page-break"></div>

    <a class="qr" href="https://google.com">
        <img src="{{public_path('qr.png')}}" style="height: 320px; width: auto;" />
    </a>

    <div class="page-break"></div>
    <div>
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.


    </div>
</body>
</html>
