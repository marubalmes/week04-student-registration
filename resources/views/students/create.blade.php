@extends('layouts.app')

@section(
    'title',
    'Register Student | Student Registration System'
)

@section('content')

<section class="page-section">

    <div class="form-container">

        <a
            href="{{ route('students.index') }}"
            class="back-link"
        >
            ← Back to Student Directory
        </a>


        <div class="form-page-header">

            <span class="eyebrow">
                New Registration
            </span>

            <h1>
                Register a Student
            </h1>

            <p>
                Complete all required information below.
                The information will be validated before
                the registration is saved.
            </p>

        </div>


        @if($errors->any())

            <div
                class="alert alert-error"
                role="alert"
            >

                <strong>
                    Please review the information below.
                </strong>

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ route('students.store') }}"
            method="POST"
            enctype="multipart/form-data"
            id="studentRegistrationForm"
        >

            @csrf


            <!-- PERSONAL INFORMATION -->

            <section class="form-section">

                <div class="section-heading">

                    <span class="section-number">
                        01
                    </span>

                    <div>

                        <h2>
                            Personal Information
                        </h2>

                        <p>
                            Student identification and contact details.
                        </p>

                    </div>

                </div>


                <div class="form-grid">

                    <div class="form-group">

                        <label for="student_id">
                            Student ID *
                        </label>

                        <input
                            type="text"
                            id="student_id"
                            name="student_id"
                            value="{{ old('student_id') }}"
                            placeholder="Example: 2026-0001"
                            required
                        >

                        @error('student_id')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    <div class="form-group">

                        <label for="email">
                            Email Address *
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="student@example.com"
                            required
                        >

                        @error('email')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    <div class="form-group">

                        <label for="first_name">
                            First Name *
                        </label>

                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            value="{{ old('first_name') }}"
                            required
                        >

                        @error('first_name')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    <div class="form-group">

                        <label for="middle_name">
                            Middle Name
                            <span class="optional">
                                Optional
                            </span>
                        </label>

                        <input
                            type="text"
                            id="middle_name"
                            name="middle_name"
                            value="{{ old('middle_name') }}"
                        >

                    </div>


                    <div class="form-group">

                        <label for="last_name">
                            Last Name *
                        </label>

                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            value="{{ old('last_name') }}"
                            required
                        >

                        @error('last_name')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    <div class="form-group">

                        <label for="mobile_number">
                            Mobile Number *
                        </label>

                        <input
                            type="text"
                            id="mobile_number"
                            name="mobile_number"
                            value="{{ old('mobile_number') }}"
                            placeholder="09123456789"
                            required
                        >

                        @error('mobile_number')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    <div class="form-group">

                        <label for="date_of_birth">
                            Date of Birth *
                        </label>

                        <input
                            type="date"
                            id="date_of_birth"
                            name="date_of_birth"
                            value="{{ old('date_of_birth') }}"
                            required
                        >

                        @error('date_of_birth')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    <div class="form-group">

                        <label for="gender">
                            Gender *
                        </label>

                        <select
                            id="gender"
                            name="gender"
                            required
                        >

                            <option value="">
                                Select gender
                            </option>

                            <option
                                value="Male"
                                @selected(old('gender') === 'Male')
                            >
                                Male
                            </option>

                            <option
                                value="Female"
                                @selected(old('gender') === 'Female')
                            >
                                Female
                            </option>

                            <option
                                value="Other"
                                @selected(old('gender') === 'Other')
                            >
                                Other
                            </option>

                        </select>

                        @error('gender')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>

                </div>

            </section>


            <!-- ACADEMIC INFORMATION -->

            <section class="form-section">

                <div class="section-heading">

                    <span class="section-number">
                        02
                    </span>

                    <div>

                        <h2>
                            Academic Information
                        </h2>

                        <p>
                            Student program and year level.
                        </p>

                    </div>

                </div>


                <div class="form-grid">

                    <div class="form-group">

                        <label for="program">
                            Program *
                        </label>

                        <select
                            id="program"
                            name="program"
                            required
                        >

                            <option value="">
                                Select program
                            </option>

                            <option
                                value="BS Information Technology"
                                @selected(old('program') === 'BS Information Technology')
                            >
                                BS Information Technology
                            </option>

                            <option
                                value="BS Computer Science"
                                @selected(old('program') === 'BS Computer Science')
                            >
                                BS Computer Science
                            </option>

                            <option
                                value="BS Information Systems"
                                @selected(old('program') === 'BS Information Systems')
                            >
                                BS Information Systems
                            </option>

                        </select>

                        @error('program')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>


                    <div class="form-group">

                        <label for="year_level">
                            Year Level *
                        </label>

                        <select
                            id="year_level"
                            name="year_level"
                            required
                        >

                            <option value="">
                                Select year level
                            </option>

                            @foreach([
                                '1st Year',
                                '2nd Year',
                                '3rd Year',
                                '4th Year'
                            ] as $year)

                                <option
                                    value="{{ $year }}"
                                    @selected(old('year_level') === $year)
                                >
                                    {{ $year }}
                                </option>

                            @endforeach

                        </select>

                        @error('year_level')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>

                </div>

            </section>


            <!-- ADDRESS -->

            <section class="form-section">

                <div class="section-heading">

                    <span class="section-number">
                        03
                    </span>

                    <div>

                        <h2>
                            Contact Information
                        </h2>

                        <p>
                            Student residential address.
                        </p>

                    </div>

                </div>


                <div class="form-group">

                    <label for="address">
                        Complete Address *
                    </label>

                    <textarea
                        id="address"
                        name="address"
                        rows="5"
                        placeholder="Enter complete address"
                        required
                    >{{ old('address') }}</textarea>

                    @error('address')

                        <span class="field-error">
                            {{ $message }}
                        </span>

                    @enderror

                </div>

            </section>


            <!-- PROFILE PICTURE -->

            <section class="form-section">

                <div class="section-heading">

                    <span class="section-number">
                        04
                    </span>

                    <div>

                        <h2>
                            Profile Picture
                        </h2>

                        <p>
                            JPG, JPEG, or PNG · Maximum size: 2MB
                        </p>

                    </div>

                </div>


                <div class="upload-layout">

                    <div class="image-preview">

                        <span id="imagePlaceholder">
                            Image Preview
                        </span>

                        <img
                            id="imagePreview"
                            src=""
                            alt="Selected profile preview"
                            class="hidden"
                        >

                    </div>


                    <div class="upload-control">

                        <label
                            for="profile_picture"
                            class="upload-label"
                        >

                            <span>
                                Choose Profile Picture
                            </span>

                            <small>
                                or drag an image into this area
                            </small>

                        </label>


                        <input
                            type="file"
                            id="profile_picture"
                            name="profile_picture"
                            accept=".jpg,.jpeg,.png"
                            required
                        >

                        <p
                            id="fileName"
                            class="file-name"
                        >
                            No file selected
                        </p>


                        @error('profile_picture')

                            <span class="field-error">
                                {{ $message }}
                            </span>

                        @enderror

                    </div>

                </div>

            </section>


            <div class="form-actions">

                <a
                    href="{{ route('students.index') }}"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>


                <button
                    type="submit"
                    class="btn btn-primary"
                    id="submitButton"
                >
                    Register Student
                </button>

            </div>

        </form>

    </div>

</section>

@endsection