<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Student Registration System')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-800 min-h-screen">

    <!-- Navigation -->
    <header class="sticky top-0 z-50 border-b border-slate-200 bg-white/90 backdrop-blur">

        <div class="max-w-7xl mx-auto px-6">

            <div class="h-16 flex items-center justify-between">

                <a href="{{ route('students.index') }}"
                   class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center font-bold shadow-sm">
                        SR
                    </div>

                    <div>

                        <h1 class="font-bold text-slate-900">
                            Student Registration
                        </h1>

                        <p class="text-xs text-slate-500">
                            Management System
                        </p>

                    </div>

                </a>

                <a href="{{ route('students.create') }}"
                   class="hidden sm:inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 hover:shadow-md">

                    <span class="text-lg leading-none">+</span>

                    Register Student

                </a>

            </div>

        </div>

    </header>

    <main>

        @yield('content')

    </main>

    <footer class="border-t border-slate-200 bg-white mt-16">

        <div class="max-w-7xl mx-auto px-6 py-6 text-center text-sm text-slate-500">

            Student Registration System · ITST 302 Client-Server Technologies

        </div>

    </footer>

</body>
</html>
