@extends('layouts.app')

@section('title', 'Student Directory | Student Registration System')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

    <!-- Hero Section -->

    <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 mb-10">

        <div>

            <div class="inline-flex items-center rounded-full bg-blue-50 px-3 py-1 text-sm font-medium text-blue-700 mb-4">

                Student Management Portal

            </div>

            <h2 class="text-4xl font-bold tracking-tight text-slate-900">

                Student Directory

            </h2>

            <p class="mt-3 text-slate-500 max-w-xl">

                Manage registered student information through a secure,
                organized, and centralized registration system.

            </p>

        </div>

        <a href="{{ route('students.create') }}"
           class="sm:hidden inline-flex justify-center rounded-lg bg-blue-600 px-5 py-3 font-semibold text-white transition hover:bg-blue-700">

            + Register Student

        </a>

    </div>


    <!-- Statistics -->

    <div class="grid md:grid-cols-3 gap-5 mb-10">

        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

            <p class="text-sm font-medium text-slate-500">

                Total Students

            </p>

            <p class="text-4xl font-bold text-slate-900 mt-3">

                {{ $students->count() }}

            </p>

            <p class="text-sm text-slate-400 mt-2">

                Registered records

            </p>

        </div>


        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

            <p class="text-sm font-medium text-slate-500">

                Registration Status

            </p>

            <p class="text-xl font-semibold text-green-600 mt-4">

                System Active

            </p>

            <p class="text-sm text-slate-400 mt-2">

                Database connection operational

            </p>

        </div>


        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">

            <p class="text-sm font-medium text-slate-500">

                Latest Activity

            </p>

            <p class="text-xl font-semibold text-slate-900 mt-4">

                @if($students->count())
                    {{ $students->first()->created_at->diffForHumans() }}
                @else
                    No registrations yet
                @endif

            </p>

            <p class="text-sm text-slate-400 mt-2">

                Student registration activity

            </p>

        </div>

    </div>


    <!-- Directory -->

    <div class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

        <div class="p-6 border-b border-slate-200">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                <div>

                    <h3 class="text-xl font-bold text-slate-900">

                        Registered Students

                    </h3>

                    <p class="text-sm text-slate-500 mt-1">

                        Browse and view registered student profiles.

                    </p>

                </div>


                <!-- Search -->

                <div class="relative">

                    <input
                        type="text"
                        id="studentSearch"
                        placeholder="Search students..."
                        class="w-full md:w-72 rounded-lg border border-slate-300 bg-slate-50 px-4 py-2.5 text-sm outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-100"
                    >

                </div>

            </div>

        </div>


        @if($students->count())

            <div class="p-6">

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5"
                     id="studentGrid">

                    @foreach($students as $student)

                        <a
                            href="{{ route('students.show', $student) }}"
                            class="student-card group block rounded-2xl border border-slate-200 bg-white p-5 transition duration-200 hover:-translate-y-1 hover:border-blue-200 hover:shadow-lg"
                        >

                            <div class="flex items-center gap-4">

                                <img
                                    src="{{ asset('storage/' . $student->profile_picture) }}"
                                    alt="{{ $student->first_name }} {{ $student->last_name }}"
                                    class="w-16 h-16 rounded-2xl object-cover ring-1 ring-slate-200"
                                >

                                <div class="min-w-0">

                                    <h4 class="student-name truncate font-bold text-slate-900 group-hover:text-blue-600">

                                        {{ $student->first_name }}
                                        {{ $student->last_name }}

                                    </h4>

                                    <p class="student-id text-sm text-slate-500">

                                        {{ $student->student_id }}

                                    </p>

                                </div>

                            </div>


                            <div class="mt-5 pt-4 border-t border-slate-100">

                                <div class="flex items-center justify-between">

                                    <span class="text-sm text-slate-500">

                                        {{ $student->program }}

                                    </span>

                                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-medium text-blue-700">

                                        {{ $student->year_level }}

                                    </span>

                                </div>

                            </div>

                        </a>

                    @endforeach

                </div>

            </div>

        @else

            <div class="px-6 py-20 text-center">

                <div class="mx-auto w-16 h-16 rounded-2xl bg-slate-100 flex items-center justify-center text-3xl">

                    🎓

                </div>

                <h3 class="mt-5 text-xl font-bold text-slate-900">

                    No students registered yet

                </h3>

                <p class="mt-2 text-slate-500">

                    Start building your student directory by registering
                    the first student.

                </p>

                <a href="{{ route('students.create') }}"
                   class="inline-flex mt-6 rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-blue-700">

                    Register First Student

                </a>

            </div>

        @endif

    </div>

</div>


<script>

const searchInput = document.getElementById('studentSearch');

if (searchInput) {

    searchInput.addEventListener('input', function () {

        const query = this.value.toLowerCase();

        document.querySelectorAll('.student-card').forEach(card => {

            const name = card.querySelector('.student-name')
                .textContent
                .toLowerCase();

            const id = card.querySelector('.student-id')
                .textContent
                .toLowerCase();

            card.style.display =
                name.includes(query) || id.includes(query)
                    ? ''
                    : 'none';

        });

    });

}

</script>

@endsection