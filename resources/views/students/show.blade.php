<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Student Profile</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100 min-h-screen">

<div class="max-w-4xl mx-auto px-6 py-10">

    @if(session('success'))

        <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-lg mb-6">

            {{ session('success') }}

        </div>

    @endif

    <div class="mb-6">

        <a href="{{ route('students.index') }}"
           class="text-blue-600 hover:underline">

            ← Back to Students

        </a>

    </div>

    <div class="bg-white shadow-md rounded-xl overflow-hidden">

        <div class="p-8">

            <div class="flex flex-col md:flex-row gap-8 items-center md:items-start">

                <img
                    src="{{ asset('storage/' . $student->profile_picture) }}"
                    alt="Student Profile Picture"
                    class="w-40 h-40 rounded-full object-cover border"
                >

                <div class="flex-1">

                    <h1 class="text-3xl font-bold text-gray-800">

                        {{ $student->first_name }}
                        {{ $student->middle_name }}
                        {{ $student->last_name }}

                    </h1>

                    <p class="text-gray-500 mt-1">

                        Student ID: {{ $student->student_id }}

                    </p>

                    <div class="grid md:grid-cols-2 gap-5 mt-8">

                        <div>

                            <p class="text-sm text-gray-500">
                                Email Address
                            </p>

                            <p class="font-medium">
                                {{ $student->email }}
                            </p>

                        </div>

                        <div>

                            <p class="text-sm text-gray-500">
                                Mobile Number
                            </p>

                            <p class="font-medium">
                                {{ $student->mobile_number }}
                            </p>

                        </div>

                        <div>

                            <p class="text-sm text-gray-500">
                                Date of Birth
                            </p>

                            <p class="font-medium">
                                {{ $student->date_of_birth }}
                            </p>

                        </div>

                        <div>

                            <p class="text-sm text-gray-500">
                                Gender
                            </p>

                            <p class="font-medium">
                                {{ $student->gender }}
                            </p>

                        </div>

                        <div>

                            <p class="text-sm text-gray-500">
                                Program
                            </p>

                            <p class="font-medium">
                                {{ $student->program }}
                            </p>

                        </div>

                        <div>

                            <p class="text-sm text-gray-500">
                                Year Level
                            </p>

                            <p class="font-medium">
                                {{ $student->year_level }}
                            </p>

                        </div>

                    </div>

                    <div class="mt-6">

                        <p class="text-sm text-gray-500">
                            Address
                        </p>

                        <p class="font-medium">
                            {{ $student->address }}
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>