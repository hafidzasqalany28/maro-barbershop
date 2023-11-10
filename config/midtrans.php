<?php

return [
    'isProduction' => env('MIDTRANS_IS_PRODUCTION', false),
    'isSanitized' => env('MIDTRANS_IS_SANITIZED', false),
    'is3ds' => env('MIDTRANS_IS_3DS', false),
    'clientKey' => env('MIDTRANS_CLIENT_KEY'),
    'serverKey' => env('MIDTRANS_SERVER_KEY'),
    'merchantId' => env('MIDTRANS_MERCHANT_ID'),
];
