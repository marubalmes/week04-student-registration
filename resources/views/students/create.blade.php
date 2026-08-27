@extends('layouts.app')

@section('title', 'Register Student | Student Registration System')

@section('content')

<div class="max-w-5xl mx-auto px-6 py-10">

    <!-- Page Header -->

    <div class="mb-10">

        <a href="{{ route('students.index') }}"
           class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-700">

            ← Back to Student Directory

        </a>

        <div class="mt-5">

            <div class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1 text-sm font-medium text-blue-700">

                New Registration

            </div>

            <h2 class="mt-4 text-4xl font-bold tracking-tight text-slate-900">

                Register a Student

            </h2>

            <p class="mt-3 text-slate-500 max-w-2xl">

                Complete the student information below. All required fields
                will be validated before the registration is processed.

            </p>

        </div>

    </div>


    <!-- Validation Errors -->

    @if ($errors->any())

        <div class="mb-8 rounded-2xl border border-red-200 bg-red-50 p-5">

            <div class="flex gap-4">

                <div>

                    <h3 class="font-semibold text-red-800">

                        Please review the form

                    </h3>

                    <p class="text-sm text-red-600 mt-1">

                        Some information needs to be corrected before
                        the student can be registered.

                    </p>

                    <ul class="mt-3 list-disc list-inside text-sm text-red-700">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    <form
        action="{{ route('students.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-8"
    >

        @csrf


        <!-- Personal Information -->

        <section class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">

            <div class="border-b border-slate-200 px-6 py-5">

                <div class="flex items-center gap-4">

                    <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center font-bold">

                        01

                    </div>

                    <div>

                        <h3 class="font-bold text-slate-900">

                            Personal Information

                        </h3>

                        <p class="text-sm text-slate-500">

                            Basic identification and contact details.

                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6 grid md:grid-cols-2 gap-6">


                <!-- Student ID -->

                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Student ID

                    </label>

                    <input
                        type="text"
                        name="student_id"
                        value="{{ old('student_id') }}"
                        placeholder="e.g. 2026-0001"
                        class="w-full rounded-xl border px-4 py-3 outline-none transition
                        @error('student_id')
                            border-red-400 bg-red-50
                        @else
                            border-slate-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100
                        @enderror"
                    >

                    @error('student_id')

                        <p class="mt-2 text-sm text-red-600">

                            {{ $message }}

                        </p>

                    @enderror

                </div>


                <!-- Email -->

                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Email Address

                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="student@example.com"
                        class="w-full rounded-xl border px-4 py-3 outline-none transition
                        @error('email')
                            border-red-400 bg-red-50
                        @else
                            border-slate-300 focus:border-blue-500 focus:ring-4 focus:ring-blue-100
                        @enderror"
                    >

                    @error('email')

                        <p class="mt-2 text-sm text-red-600">

                            {{ $message }}

                        </p>

                    @enderror

                </div>


                <!-- First Name -->

                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        First Name

                    </label>

                    <input
                        type="text"
                        name="first_name"
                        value="{{ old('first_name') }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    >

                    @error('first_name')

                        <p class="mt-2 text-sm text-red-600">

                            {{ $message }}

                        </p>

                    @enderror

                </div>


                <!-- Middle Name -->

                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Middle Name

                        <span class="font-normal text-slate-400">

                            Optional

                        </span>

                    </label>

                    <input
                        type="text"
                        name="middle_name"
                        value="{{ old('middle_name') }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    >

                </div>


                <!-- Last Name -->

                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Last Name

                    </label>

                    <input
                        type="text"
                        name="last_name"
                        value="{{ old('last_name') }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    >

                    @error('last_name')

                        <p class="mt-2 text-sm text-red-600">

                            {{ $message }}

                        </p>

                    @enderror

                </div>


                <!-- Mobile -->

                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Mobile Number

                    </label>

                    <input
                        type="text"
                        name="mobile_number"
                        value="{{ old('mobile_number') }}"
                        placeholder="09123456789"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    >

                    @error('mobile_number')

                        <p class="mt-2 text-sm text-red-600">

                            {{ $message }}

                        </p>

                    @enderror

                </div>


                <!-- Date of Birth -->

                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Date of Birth

                    </label>

                    <input
                        type="date"
                        name="date_of_birth"
                        value="{{ old('date_of_birth') }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    >

                    @error('date_of_birth')

                        <p class="mt-2 text-sm text-red-600">

                            {{ $message }}

                        </p>

                    @enderror

                </div>


                <!-- Gender -->

                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Gender

                    </label>

                    <select
                        name="gender"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    >

                        <option value="">

                            Select gender

                        </option>

                        <option value="Male"
                            @selected(old('gender') === 'Male')>

                            Male

                        </option>

                        <option value="Female"
                            @selected(old('gender') === 'Female')>

                            Female

                        </option>

                        <option value="Other"
                            @selected(old('gender') === 'Other')>

                            Other

                        </option>

                    </select>

                    @error('gender')

                        <p class="mt-2 text-sm text-red-600">

                            {{ $message }}

                        </p>

                    @enderror

                </div>

            </div>

        </section>


        <!-- Academic Information -->

        <section class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">

            <div class="border-b border-slate-200 px-6 py-5">

                <div class="flex items-center gap-4">

                    <div class="w-10 h-10 rounded-xl bg-slate-900 text-white flex items-center justify-center font-bold">

                        02

                    </div>

                    <div>

                        <h3 class="font-bold text-slate-900">

                            Academic Information

                        </h3>

                        <p class="text-sm text-slate-500">

                            Student program and current year level.

                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6 grid md:grid-cols-2 gap-6">

                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Program

                    </label>

                    <select
                        name="program"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    >

                        <option value="">

                            Select program

                        </option>

                        <option value="BS Information Technology"
                            @selected(old('program') === 'BS Information Technology')>

                            BS Information Technology

                        </option>

                        <option value="BS Computer Science"
                            @selected(old('program') === 'BS Computer Science')>

                            BS Computer Science

                        </option>

                        <option value="BS Information Systems"
                            @selected(old('program') === 'BS Information Systems')>

                            BS Information Systems

                        </option>

                    </select>

                    @error('program')

                        <p class="mt-2 text-sm text-red-600">

                            {{ $message }}

                        </p>

                    @enderror

                </div>


                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">

                        Year Level

                    </label>

                    <select
                        name="year_level"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    >

                        <option value="">

                            Select year level

                        </option>

                        <option value="1st Year"
                            @selected(old('year_level') === '1st Year')>

                            1st Year

                        </option>

                        <option value="2nd Year"
                            @selected(old('year_level') === '2nd Year')>

                            2nd Year

                        </option>

                        <option value="3rd Year"
                            @selected(old('year_level') === '3rd Year')>

                            3rd Year

                        </option>

                        <option value="4th Year"
                            @selected(old('year_level') === '4th Year')>

                            4th Year

                        </option>

                    </select>

                    @error('year_level')

                        <p class="mt-2 text-sm text-red-600">

                            {{ $message }}

                        </p>

                    @enderror

                </div>

            </div>

        </section>


        <!-- Address -->

        <section class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">

            <div class="border-b border-slate-200 px-6 py-5">

                <div class="flex items-center gap-4">

                    <div class="w-10 h-10 rounded-xl bg-slate-700 text-white flex items-center justify-center font-bold">

                        03

                    </div>

                    <div>

                        <h3 class="font-bold text-slate-900">

                            Contact Information

                        </h3>

                        <p class="text-sm text-slate-500">

                            Student residential address.

                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6">

                <label class="block text-sm font-semibold text-slate-700 mb-2">

                    Complete Address

                </label>

                <textarea
                    name="address"
                    rows="4"
                    placeholder="Enter complete address"
                    class="w-full resize-none rounded-xl border border-slate-300 px-4 py-3 outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                >{{ old('address') }}</textarea>

                @error('address')

                    <p class="mt-2 text-sm text-red-600">

                        {{ $message }}

                    </p>

                @enderror

            </div>

        </section>


        <!-- Profile Picture -->

        <section class="rounded-2xl border border-slate-200 bg-white shadow-sm overflow-hidden">

            <div class="border-b border-slate-200 px-6 py-5">

                <div class="flex items-center gap-4">

                    <div class="w-10 h-10 rounded-xl bg-green-600 text-white flex items-center justify-center font-bold">

                        04

                    </div>

                    <div>

                        <h3 class="font-bold text-slate-900">

                            Profile Picture

                        </h3>

                        <p class="text-sm text-slate-500">

                            JPG, JPEG, or PNG · Maximum file size: 2MB

                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6">

                <div class="flex flex-col md:flex-row gap-6 items-center">

                    <div
                        id="imagePreviewContainer"
                        class="w-32 h-32 rounded-2xl bg-slate-100 border-2 border-dashed border-slate-300 flex items-center justify-center overflow-hidden"
                    >

                        <span id="imagePlaceholder"
                              class="text-slate-400 text-sm text-center px-4">

                            Image Preview

                        </span>

                        <img
                            id="imagePreview"
                            class="hidden w-full h-full object-cover"
                        >

                    </div>


                    <div class="flex-1 w-full">

                        <input
                            type="file"
                            name="profile_picture"
                            id="profile_picture"
                            accept=".jpg,.jpeg,.png"
                            class="block w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 text-sm"
                        >

                        @error('profile_picture')

                            <p class="mt-2 text-sm text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                        <p class="mt-3 text-sm text-slate-500">

                            Upload a clear student profile photograph.

                        </p>

                    </div>

                </div>

            </div>

        </section>


        <!-- Actions -->

        <div class="flex flex-col-reverse sm:flex-row justify-end gap-3 pb-10">

            <a
                href="{{ route('students.index') }}"
                class="inline-flex justify-center rounded-xl border border-slate-300 bg-white px-6 py-3 font-semibold text-slate-700 transition hover:bg-slate-50"
            >

                Cancel

            </a>


            <button
                type="submit"
                class="inline-flex justify-center rounded-xl bg-blue-600 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-blue-700 hover:shadow-md"
            >

                Register Student

            </button>

        </div>

    </form>

</div>


<script>

const profilePicture = document.getElementById('profile_picture');
const imagePreview = document.getElementById('imagePreview');
const imagePlaceholder = document.getElementById('imagePlaceholder');

profilePicture.addEventListener('change', function(event) {

    const file = event.target.files[0];

    if (!file) {
        return;
    }

    const reader = new FileReader();

    reader.onload = function(e) {

        imagePreview.src = e.target.result;

        imagePreview.classList.remove('hidden');

        imagePlaceholder.classList.add('hidden');

    };

    reader.readAsDataURL(file);

});

</script>

@endsection