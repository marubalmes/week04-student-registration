<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="description"
        content="Student Registration System"
    >

    <title>
        @yield('title', 'Student Registration System')
    </title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>

<body>

    <header class="site-header">

        <div class="container navbar">

            <a
                href="{{ route('students.index') }}"
                class="brand"
            >

                <div class="brand-mark">
                    SR
                </div>

                <div>

                    <span class="brand-title">
                        Student Registration
                    </span>

                    <span class="brand-subtitle">
                        Management System
                    </span>

                </div>

            </a>


            <nav class="navbar-actions">

                <a
                    href="{{ route('students.index') }}"
                    class="nav-link"
                >
                    Directory
                </a>

                <a
                    href="{{ route('students.create') }}"
                    class="btn btn-primary"
                >
                    <span>+</span>
                    Register Student
                </a>

            </nav>

        </div>

    </header>


    <main>

        @yield('content')

    </main>


    <footer class="site-footer">

        <div class="container footer-content">

            <p>
                Student Registration System
            </p>

            <p>
                ITST 302 · Client-Server Technologies
            </p>

        </div>

    </footer>

</body>

</html>