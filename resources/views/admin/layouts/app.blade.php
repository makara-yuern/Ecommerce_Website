<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

</head>

<body class="font-sans antialiased">
    <div x-data="{ sidebarOpen: true }" class="flex min-h-screen bg-gray-100">
        <aside class="sidebar flex-shrink-0 flex flex-col border-r transition-all duration-300"
            :class="{ 'minimize': !sidebarOpen }">
            @include('admin.layouts.sidebar')
        </aside>
        <div class="flex-1">
            @include('admin.layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="my-6 px-6">
                    {{ $header }}
                </header>
            @endisset

            <!-- Page Content -->
            <main class="m-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

</html>
