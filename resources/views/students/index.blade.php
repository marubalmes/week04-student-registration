<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="max-w-6xl mx-auto px-6 py-10">

        <div class="flex justify-between items-center mb-8">

            <div>
                <h1 class="text-3xl font-bold text-gray-800">
                    Student Registration System
                </h1>

                <p class="text-gray-500 mt-1">
                    ITST 302 - Week 4 Laboratory Activity
                </p>
            </div>

            <a href="{{ route('students.create') }}"
               class="bg-blue-600 text-white px-5 py-3 rounded-lg hover:bg-blue-700">

                Register Student

            </a>

        </div>

        <div class="bg-white shadow-md rounded-xl overflow-hidden">

            <div class="p-6">

                <h2 class="text-xl font-semibold mb-5">
                    Registered Students
                </h2>

                @if($students->count())

                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">

                        @foreach($students as $student)

                            <a href="{{ route('students.show', $student->id) }}"
                               class="border rounded-lg p-5 hover:shadow-md transition">

                                <div class="flex items-center gap-4">

                                    <img
                                        src="{{ asset('storage/' . $student->profile_picture) }}"
                                        alt="Profile Picture"
                                        class="w-16 h-16 rounded-full object-cover"
                                    >

                                    <div>

                                        <h3 class="font-semibold text-lg">
                                            {{ $student->first_name }}
                                            {{ $student->last_name }}
                                        </h3>

                                        <p class="text-gray-500 text-sm">
                                            {{ $student->student_id }}
                                        </p>

                                    </div>

                                </div>

                            </a>

                        @endforeach

                    </div>

                @else

                    <div class="text-center py-10">

                        <p class="text-gray-500">
                            No students registered yet.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>

</body>
</html>