<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="https://karevault.com/favicon.ico" type="image/x-icon" sizes="16x16">

    <title>{{ $title ?? 'KareVault Internship' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    
    {{-- The Google Fonts are imported directly in your app.css, but leaving these preconnects helps them load faster --}}

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{ $styles ?? '' }}
</head>
<body class="antialiased selection:bg-brand-500 selection:text-white">
    {{ $slot }}
</body>
</html>