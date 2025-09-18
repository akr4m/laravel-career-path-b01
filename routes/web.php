<?php

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPdf\Facades\Pdf as SpatiePdf;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-pdf', function () {
    // $html = '<h1>Laravel PDF Test</h1>';

    // $pdf = Pdf::loadHTML($html);

    // return $pdf->download('test.pdf');

    // return $pdf->stream('test.pdf');

    // $pdf = Pdf::loadView('invoice');

    // return $pdf->stream('inovice-xxx.pdf');
});

Route::get('/invoices/{invoiceId}', function (string $invoiceId) {
    // get invoice data from Invoice table
    $customerName = 'John Doe';

    $items = [
        ['name' => 'Product A', 'quantity' => 2, 'price' => 50],
        ['name' => 'Product B', 'quantity' => 1, 'price' => 70],
        ['name' => 'Product C', 'quantity' => 8, 'price' => 150],
    ];

    $data = [
        'invoiceId' => $invoiceId,
        'customerName' => $customerName,
        'items' => $items,
        'total' => 120,
    ];

    $pdf = Pdf::loadView('invoice', $data);
    $pdf = $pdf->setPaper('A4', 'landscape');

    return $pdf->stream("invoice-{$invoiceId}.pdf");
});

Route::get('/spatie-invoices/{invoiceId}', function (string $invoiceId) {
    $customerName = 'John Doe';

    $items = [
        ['name' => 'Product A', 'quantity' => 2, 'price' => 50],
        ['name' => 'Product B', 'quantity' => 1, 'price' => 70],
        ['name' => 'Product C', 'quantity' => 8, 'price' => 150],
    ];

    $data = [
        'invoiceId' => $invoiceId,
        'customerName' => $customerName,
        'items' => $items,
        'total' => 120,
    ];

    return SpatiePdf::view('invoice', $data)->save('invoice.pdf');
});

Route::get('/spatie/welcome', function () {

    return SpatiePdf::view('welcome')
        ->format('A4')
        ->save('welcome.pdf');
});
