@extends('layouts.app')

@section(
    'title',
    $student->first_name . ' ' .
    $student->last_name .
    ' | Student Profile'
)

@section('content')

<section class="page-section">

    <div class="profile-container">


        @if(session('success'))

            <div
                class="toast-success"
                role="status"
            >

                <div class="success-icon">
                    ✓
                </div>

                <div>

                    <strong>
                        Registration Successful
                    </strong>

                    <p>
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        @endif


        <a
            href="{{ route('students.index') }}"
            class="back-link"
        >
            ← Back to Student Directory
        </a>


        <section class="profile-card">


            <!-- PROFILE HEADER -->

            <div class="profile-hero">

                <img
                    src="{{ asset(
                        'storage/' .
                        $student->profile_picture
                    ) }}"
                    alt="Profile picture of {{ $student->first_name }} {{ $student->last_name }}"
                    class="profile-image"
                >


                <div>

                    <span class="profile-label">
                        Student Profile
                    </span>

                    <h1>

                        {{ $student->first_name }}

                        @if($student->middle_name)
                            {{ $student->middle_name }}
                        @endif

                        {{ $student->last_name }}

                    </h1>

                    <p class="profile-student-id">
                        Student ID · {{ $student->student_id }}
                    </p>


                    <div class="profile-tags">

                        <span>
                            {{ $student->program }}
                        </span>

                        <span>
                            {{ $student->year_level }}
                        </span>

                    </div>

                </div>

            </div>


            <div class="profile-content">


                <!-- PERSONAL -->

                <section class="profile-section">

                    <h2>
                        Personal Information
                    </h2>


                    <div class="info-list">

                        <div class="info-item">

                            <span>
                                Email Address
                            </span>

                            <strong>
                                {{ $student->email }}
                            </strong>

                        </div>


                        <div class="info-item">

                            <span>
                                Mobile Number
                            </span>

                            <strong>
                                {{ $student->mobile_number }}
                            </strong>

                        </div>


                        <div class="info-item">

                            <span>
                                Date of Birth
                            </span>

                            <strong>
                                {{ $student->date_of_birth->format('F d, Y') }}
                            </strong>

                        </div>


                        <div class="info-item">

                            <span>
                                Gender
                            </span>

                            <strong>
                                {{ $student->gender }}
                            </strong>

                        </div>

                    </div>

                </section>


                <!-- ACADEMIC -->

                <section class="profile-section">

                    <h2>
                        Academic Information
                    </h2>


                    <div class="info-list">

                        <div class="info-item">

                            <span>
                                Program
                            </span>

                            <strong>
                                {{ $student->program }}
                            </strong>

                        </div>


                        <div class="info-item">

                            <span>
                                Year Level
                            </span>

                            <strong>
                                {{ $student->year_level }}
                            </strong>

                        </div>


                        <div class="info-item">

                            <span>
                                Registration Date
                            </span>

                            <strong>
                                {{ $student->created_at->format('F d, Y') }}
                            </strong>

                        </div>

                    </div>

                </section>

            </div>


            <!-- ADDRESS -->

            <section class="address-section">

                <h2>
                    Residential Address
                </h2>

                <p>
                    {{ $student->address }}
                </p>

            </section>

        </section>

    </div>

</section>

@endsection