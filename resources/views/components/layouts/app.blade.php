<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="coffee">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- <script src="https://cdn.tiny.cloud/1/5dwmodcaem7stuwklsjlhhft689r2bu38okypqadx44tcald/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> -->
    
    {{-- EasyMDE --}}
    <link rel="stylesheet" href="https://unpkg.com/easymde/dist/easymde.min.css">
    <script src="https://unpkg.com/easymde/dist/easymde.min.js"></script>
</head>
<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200">

    <x-nav class="px-10" sticky full-width>
 
        <x-slot:brand>
            {{-- Drawer toggle for "main-drawer" --}}
            <label for="main-drawer" class="lg:hidden mr-3">
                <x-icon name="o-bars-3" class="cursor-pointer" />
            </label>
 
            {{-- Brand --}}
            <div >MAILING SYSTEM</div>
        </x-slot:brand>
 
        {{-- Right side actions --}}
        <x-slot:actions>
            <x-theme-toggle darkTheme="coffee" lightTheme="lemonade" />
            <x-button label="Logout" icon="o-arrow-left-start-on-rectangle" link="/logout" class="btn-ghost btn-sm" responsive />
        </x-slot:actions>
    </x-nav>

    {{-- MAIN --}}
    <x-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

            {{-- BRAND --}}

            {{-- MENU --}}
            <x-menu activate-by-route>
                <x-menu-item label="Mails" icon="o-home" link="/admin/send-mail" />
                <x-menu-item label="Recipients" icon="o-users" link="/admin/view-recipients" />
            </x-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-main>

    {{--  TOAST area --}}
    <x-toast />
</body>
</html>
