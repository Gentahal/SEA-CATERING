<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ isset($title) ? $title.' | ' : '' }}{{ config('app.name', 'SEA Catering') }}</title>

        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --primary-color: #2a9d8f;
                --primary-dark: #21867a;
                --secondary-color: #264653;
                --accent-color: #e9c46a;
            }
            
            body {
                font-family: 'Inter', sans-serif;
                background-color: #f8fafc;
            }
            
            .auth-card {
                background: white;
                border-radius: 12px;
                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
                transition: all 0.3s ease;
            }
            
            .auth-card:hover {
                box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>
    <body class="text-gray-800 antialiased bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="min-h-screen flex flex-col sm:justify-center items-center p-4 sm:p-6">
            
            <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10">
                <div class="absolute top-20 right-20 w-64 h-64 rounded-full bg-primary-100 opacity-20 blur-3xl"></div>
                <div class="absolute bottom-20 left-20 w-64 h-64 rounded-full bg-accent-100 opacity-20 blur-3xl"></div>
            </div>

            <div class="w-full sm:max-w-md auth-card">
                <div class="px-6 py-8 sm:px-10">
                    {{ $slot }}
                </div>
            </div>

        </div>
    </body>
</html>