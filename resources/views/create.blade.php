<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Register Student</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100 min-h-screen">

<div class="max-w-4xl mx-auto px-6 py-10">

    <div class="mb-6">

        <a href="{{ route('students.index') }}"
           class="text-blue-600 hover:underline">

            ← Back to Students

        </a>

        <h1 class="text-3xl font-bold text-gray-800 mt-4">
            Student Registration Form
        </h1>

        <p class="text-gray-500 mt-2">
            Fill out the required information below.
        </p>

    </div>

    @if ($errors->any())

        <div class="bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-lg mb-6">

            <h3 class="font-semibold mb-2">
                Please correct the following errors:
            </h3>

            <ul class="list-disc list-inside">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('students.store') }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white shadow-md rounded-xl p-8">

        @csrf

        <h2 class="text-xl font-semibold mb-5">
            Personal Information
        </h2>

        <div class="grid md:grid-cols-2 gap-5">

            <div>

                <label class="block font-medium mb-2">
                    Student ID
                </label>

                <input
                    type="text"
                    name="student_id"
                    value="{{ old('student_id') }}"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

            </div>

            <div>

                <label class="block font-medium mb-2">
                    Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

            </div>

            <div>

                <label class="block font-medium mb-2">
                    First Name
                </label>

                <input
                    type="text"
                    name="first_name"
                    value="{{ old('first_name') }}"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

            </div>

            <div>

                <label class="block font-medium mb-2">
                    Middle Name
                </label>

                <input
                    type="text"
                    name="middle_name"
                    value="{{ old('middle_name') }}"
                    class="w-full border rounded-lg px-4 py-3"
                >

            </div>

            <div>

                <label class="block font-medium mb-2">
                    Last Name
                </label>

                <input
                    type="text"
                    name="last_name"
                    value="{{ old('last_name') }}"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

            </div>

            <div>

                <label class="block font-medium mb-2">
                    Mobile Number
                </label>

                <input
                    type="text"
                    name="mobile_number"
                    value="{{ old('mobile_number') }}"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

            </div>

            <div>

                <label class="block font-medium mb-2">
                    Date of Birth
                </label>

                <input
                    type="date"
                    name="date_of_birth"
                    value="{{ old('date_of_birth') }}"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

            </div>

            <div>

                <label class="block font-medium mb-2">
                    Gender
                </label>

                <select
                    name="gender"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

                    <option value="">
                        Select Gender
                    </option>

                    <option value="Male"
                        {{ old('gender') == 'Male' ? 'selected' : '' }}>
                        Male
                    </option>

                    <option value="Female"
                        {{ old('gender') == 'Female' ? 'selected' : '' }}>
                        Female
                    </option>

                    <option value="Other"
                        {{ old('gender') == 'Other' ? 'selected' : '' }}>
                        Other
                    </option>

                </select>

            </div>

        </div>

        <h2 class="text-xl font-semibold mt-8 mb-5">
            Academic Information
        </h2>

        <div class="grid md:grid-cols-2 gap-5">

            <div>

                <label class="block font-medium mb-2">
                    Program
                </label>

                <select
                    name="program"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

                    <option value="">
                        Select Program
                    </option>

                    <option value="BS Information Technology"
                        {{ old('program') == 'BS Information Technology' ? 'selected' : '' }}>
                        BS Information Technology
                    </option>

                    <option value="BS Computer Science"
                        {{ old('program') == 'BS Computer Science' ? 'selected' : '' }}>
                        BS Computer Science
                    </option>

                    <option value="BS Information Systems"
                        {{ old('program') == 'BS Information Systems' ? 'selected' : '' }}>
                        BS Information Systems
                    </option>

                </select>

            </div>

            <div>

                <label class="block font-medium mb-2">
                    Year Level
                </label>

                <select
                    name="year_level"
                    class="w-full border rounded-lg px-4 py-3"
                    required
                >

                    <option value="">
                        Select Year Level
                    </option>

                    <option value="1st Year">1st Year</option>
                    <option value="2nd Year">2nd Year</option>
                    <option value="3rd Year">3rd Year</option>
                    <option value="4th Year">4th Year</option>

                </select>

            </div>

        </div>

        <div class="mt-6">

            <label class="block font-medium mb-2">
                Address
            </label>

            <textarea
                name="address"
                rows="4"
                class="w-full border rounded-lg px-4 py-3"
                required
            >{{ old('address') }}</textarea>

        </div>

        <div class="mt-6">

            <label class="block font-medium mb-2">
                Profile Picture
            </label>

            <input
                type="file"
                name="profile_picture"
                accept=".jpg,.jpeg,.png"
                class="w-full border rounded-lg px-4 py-3"
                required
            >

            <p class="text-sm text-gray-500 mt-2">
                Accepted formats: JPG, JPEG, PNG. Maximum size: 2MB.
            </p>

        </div>

        <div class="mt-8">

            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 font-medium"
            >

                Register Student

            </button>

        </div>

    </form>

</div>

</body>
</html>