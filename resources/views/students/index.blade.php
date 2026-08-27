@extends('layouts.app')

@section(
    'title',
    'Student Directory | Student Registration System'
)

@section('content')

<section class="page-section">

    <div class="container">

        <div class="page-header">

            <div>

                <span class="eyebrow">
                    Student Management Portal
                </span>

                <h1>
                    Student Directory
                </h1>

                <p>
                    View and manage registered student information
                    in one organized location.
                </p>

            </div>


            <a
                href="{{ route('students.create') }}"
                class="btn btn-primary"
            >
                + Register Student
            </a>

        </div>


        <!-- Statistics -->

        <section class="stats-grid">

            <article class="stat-card">

                <span class="stat-label">
                    Total Students
                </span>

                <strong class="stat-value">
                    {{ $students->count() }}
                </strong>

                <span class="stat-description">
                    Registered student records
                </span>

            </article>


            <article class="stat-card">

                <span class="stat-label">
                    Directory Status
                </span>

                <strong class="status-active">
                    Active
                </strong>

                <span class="stat-description">
                    Student records available
                </span>

            </article>


            <article class="stat-card">

                <span class="stat-label">
                    Latest Registration
                </span>

                <strong class="stat-text">

                    @if($students->count())
                        {{ $students->first()->created_at->diffForHumans() }}
                    @else
                        No records yet
                    @endif

                </strong>

                <span class="stat-description">
                    Based on system records
                </span>

            </article>

        </section>


        <!-- Directory -->

        <section class="directory-panel">

            <div class="directory-header">

                <div>

                    <h2>
                        Registered Students
                    </h2>

                    <p>
                        Search by name, Student ID, or program.
                    </p>

                </div>


                <div class="search-wrapper">

                    <input
                        type="search"
                        id="studentSearch"
                        placeholder="Search students..."
                        aria-label="Search students"
                    >

                </div>

            </div>


            @if($students->count())

                <div
                    class="student-grid"
                    id="studentGrid"
                >

                    @foreach($students as $student)

                        <a
                            href="{{ route('students.show', $student) }}"
                            class="student-card"
                            data-search="
                                {{ strtolower(
                                    $student->first_name . ' ' .
                                    $student->middle_name . ' ' .
                                    $student->last_name . ' ' .
                                    $student->student_id . ' ' .
                                    $student->program
                                ) }}
                            "
                        >

                            <div class="student-card-top">

                                <img
                                    src="{{ asset(
                                        'storage/' .
                                        $student->profile_picture
                                    ) }}"
                                    alt="Profile picture of {{ $student->first_name }} {{ $student->last_name }}"
                                    class="student-avatar"
                                >


                                <div class="student-main-info">

                                    <h3>

                                        {{ $student->first_name }}

                                        @if($student->middle_name)
                                            {{ $student->middle_name }}
                                        @endif

                                        {{ $student->last_name }}

                                    </h3>

                                    <p>
                                        {{ $student->student_id }}
                                    </p>

                                </div>

                            </div>


                            <div class="student-card-footer">

                                <span>
                                    {{ $student->program }}
                                </span>

                                <span class="year-badge">
                                    {{ $student->year_level }}
                                </span>

                            </div>

                        </a>

                    @endforeach

                </div>


                <div
                    id="noSearchResults"
                    class="search-empty-state hidden"
                >

                    <h3>
                        No students found
                    </h3>

                    <p>
                        Try searching with a different name,
                        Student ID, or program.
                    </p>

                </div>

            @else

                <div class="empty-state">

                    <div class="empty-icon">
                        🎓
                    </div>

                    <h3>
                        No students registered yet
                    </h3>

                    <p>
                        Start building the student directory
                        by registering the first student.
                    </p>

                    <a
                        href="{{ route('students.create') }}"
                        class="btn btn-primary"
                    >
                        Register First Student
                    </a>

                </div>

            @endif

        </section>

    </div>

</section>

@endsection