<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Distribuidora Uriol') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Styles -->
        <style>
            body {
                background-color: white;
                color: #900; /* Rojo oscuro */
            }
            .logo {
                color: #ff0000; /* Rojo brillante */
            }
            .card {
                background-color: #fff; /* Blanco */
                border: 1px solid #ff0000; /* Borde rojo */
            }
        </style>
    </head>
    <body class="font-sans">
        <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center py-4">
            <div class="text-center">
                <a href="/" class="logo">
                    <x-application-logo class="fs-1" />
                </a>
            </div>

            <div class="w-100 mt-4" style="max-width: 400px;">
                <div class="card shadow-sm p-4">
                    {{ $slot }}
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

