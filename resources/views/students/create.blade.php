@extends('layouts.app')

@section('title', 'Register Student')

@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    .registration-page {
        min-height: calc(100vh - 80px);
        padding: 48px 24px 70px;
        background:
            radial-gradient(circle at top left, rgba(59, 91, 219, 0.08), transparent 30%),
            linear-gradient(180deg, #f7f8fc 0%, #eef1f7 100%);
    }

    .registration-container {
        max-width: 1100px;
        margin: 0 auto;
    }

    .page-heading {
        margin-bottom: 32px;
        animation: fadeDown 0.5s ease;
    }

    .page-heading .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 7px 13px;
        border-radius: 999px;
        background: rgba(49, 76, 167, 0.1);
        color: #314ca7;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        margin-bottom: 14px;
    }

    .page-heading h1 {
        margin: 0;
        color: #172033;
        font-size: clamp(2rem, 4vw, 2.8rem);
        letter-spacing: -0.04em;
    }

    .page-heading p {
        margin: 10px 0 0;
        color: #64748b;
        font-size: 0.98rem;
        line-height: 1.7;
    }

    .registration-card {
        overflow: hidden;
        background: #ffffff;
        border: 1px solid #e5e9f2;
        border-radius: 22px;
        box-shadow: 0 20px 60px rgba(15, 23, 42, 0.09);
        animation: fadeUp 0.6s ease;
    }

    .registration-card-header {
        padding: 30px 36px;
        color: #ffffff;
        background: linear-gradient(135deg, #172554, #243b82);
    }

    .registration-card-header h2 {
        margin: 0;
        font-size: 1.35rem;
        letter-spacing: -0.02em;
    }

    .registration-card-header p {
        margin: 7px 0 0;
        color: rgba(255, 255, 255, 0.72);
        font-size: 0.9rem;
    }

    .registration-form {
        padding: 36px;
    }

    .form-section {
        margin-bottom: 42px;
    }

    .form-section:last-of-type {
        margin-bottom: 10px;
    }

    .section-heading {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 25px;
        padding-bottom: 14px;
        border-bottom: 1px solid #e8edf5;
    }

    .section-number {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        flex-shrink: 0;
        border-radius: 10px;
        background: #edf2ff;
        color: #314ca7;
        font-size: 0.8rem;
        font-weight: 800;
    }

    .section-heading h3 {
        margin: 0;
        color: #1e293b;
        font-size: 1rem;
        font-weight: 700;
    }

    .section-heading span {
        margin-left: auto;
        color: #94a3b8;
        font-size: 0.78rem;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 24px;
    }

    .form-group {
        min-width: 0;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        margin-bottom: 9px;
        color: #334155;
        font-size: 0.86rem;
        font-weight: 700;
    }

    .required {
        color: #dc2626;
        margin-left: 2px;
    }

    .optional {
        color: #94a3b8;
        font-weight: 500;
        font-size: 0.75rem;
    }

    .form-control,
    .form-select {
        width: 100%;
        min-height: 48px;
        padding: 12px 15px;
        border: 1px solid #d8dee9;
        border-radius: 11px;
        background: #ffffff;
        color: #1e293b;
        font-family: inherit;
        font-size: 0.92rem;
        outline: none;
        transition:
            border-color 0.2s ease,
            box-shadow 0.2s ease,
            background 0.2s ease,
            transform 0.2s ease;
    }

    textarea.form-control {
        min-height: 120px;
        resize: vertical;
    }

    .form-control::placeholder {
        color: #aab4c3;
    }

    .form-control:hover,
    .form-select:hover {
        border-color: #b8c2d4;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #3657c8;
        box-shadow: 0 0 0 4px rgba(54, 87, 200, 0.1);
    }

    /* =========================================
       INVALID VALIDATION STATE
    ========================================= */

    .form-control.is-invalid,
    .form-select.is-invalid {
        border: 2px solid #dc2626 !important;
        background-color: #fff8f8;
        box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.08);
    }

    .form-control.is-invalid:focus,
    .form-select.is-invalid:focus {
        border-color: #dc2626 !important;
        box-shadow: 0 0 0 4px rgba(220, 38, 38, 0.14);
    }

    .invalid-feedback {
        display: flex;
        align-items: flex-start;
        gap: 7px;
        margin-top: 8px;
        color: #dc2626;
        font-size: 0.79rem;
        font-weight: 600;
        line-height: 1.45;
        animation: fadeIn 0.2s ease;
    }

    .invalid-feedback::before {
        content: "⚠";
        flex-shrink: 0;
        font-size: 0.9rem;
        line-height: 1.2;
    }

    /* =========================================
       VALID STATE
    ========================================= */

    .form-control.is-valid,
    .form-select.is-valid {
        border-color: #16a34a;
        background-color: #f7fff9;
    }

    .form-control.is-valid:focus,
    .form-select.is-valid:focus {
        border-color: #16a34a;
        box-shadow: 0 0 0 4px rgba(22, 163, 74, 0.1);
    }

    .field-hint {
        margin-top: 7px;
        color: #94a3b8;
        font-size: 0.75rem;
        line-height: 1.5;
    }

    /* =========================================
       FILE UPLOAD
    ========================================= */

    .file-upload-wrapper {
        position: relative;
    }

    .file-upload-area {
        position: relative;
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 18px;
        border: 1.5px dashed #cbd5e1;
        border-radius: 14px;
        background: #fafcff;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .file-upload-area:hover {
        border-color: #3657c8;
        background: #f5f7ff;
    }

    .file-upload-area.invalid {
        border-color: #dc2626;
        background: #fff8f8;
    }

    .file-preview {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 70px;
        height: 70px;
        flex-shrink: 0;
        overflow: hidden;
        border-radius: 13px;
        background: #e9eef8;
        color: #64748b;
        font-size: 1.5rem;
    }

    .file-preview img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .file-upload-text strong {
        display: block;
        color: #334155;
        font-size: 0.88rem;
    }

    .file-upload-text span {
        display: block;
        margin-top: 4px;
        color: #94a3b8;
        font-size: 0.76rem;
    }

    .file-input {
        position: absolute;
        width: 1px;
        height: 1px;
        opacity: 0;
        pointer-events: none;
    }

    /* =========================================
       FORM ACTIONS
    ========================================= */

    .form-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        margin-top: 38px;
        padding-top: 25px;
        border-top: 1px solid #e8edf5;
    }

    .form-note {
        max-width: 470px;
        margin: 0;
        color: #94a3b8;
        font-size: 0.77rem;
        line-height: 1.6;
    }

    .action-buttons {
        display: flex;
        gap: 12px;
        flex-shrink: 0;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 46px;
        padding: 0 20px;
        border-radius: 10px;
        font-family: inherit;
        font-size: 0.86rem;
        font-weight: 700;
        text-decoration: none;
        cursor: pointer;
        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease,
            background 0.2s ease;
    }

    .btn:hover {
        transform: translateY(-2px);
    }

    .btn-secondary {
        border: 1px solid #d8dee9;
        background: #ffffff;
        color: #475569;
    }

    .btn-secondary:hover {
        background: #f8fafc;
        box-shadow: 0 8px 20px rgba(15, 23, 42, 0.06);
    }

    .btn-primary {
        border: 1px solid #2d49ae;
        background: linear-gradient(135deg, #3657c8, #263f9a);
        color: #ffffff;
        box-shadow: 0 10px 25px rgba(49, 76, 167, 0.22);
    }

    .btn-primary:hover {
        box-shadow: 0 14px 30px rgba(49, 76, 167, 0.3);
    }

    .btn-primary:disabled {
        opacity: 0.7;
        cursor: not-allowed;
        transform: none;
    }

    /* =========================================
       ERROR SUMMARY
    ========================================= */

    .error-summary {
        margin-bottom: 28px;
        padding: 16px 18px;
        border: 1px solid #fecaca;
        border-radius: 13px;
        background: #fff7f7;
        color: #991b1b;
    }

    .error-summary strong {
        display: block;
        margin-bottom: 5px;
        font-size: 0.9rem;
    }

    .error-summary p {
        margin: 0;
        font-size: 0.8rem;
        line-height: 1.5;
    }

    /* =========================================
       ANIMATIONS
    ========================================= */

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeDown {
        from {
            opacity: 0;
            transform: translateY(-15px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-4px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .registration-page {
            padding: 30px 16px 50px;
        }

        .registration-form,
        .registration-card-header {
            padding: 25px 20px;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .form-group.full-width {
            grid-column: auto;
        }

        .form-actions {
            align-items: stretch;
            flex-direction: column;
        }

        .action-buttons {
            width: 100%;
        }

        .action-buttons .btn {
            flex: 1;
        }

        .section-heading span {
            display: none;
        }
    }

    @media (max-width: 480px) {
        .action-buttons {
            flex-direction: column-reverse;
        }

        .file-upload-area {
            align-items: flex-start;
        }
    }
</style>

<div class="registration-page">

    <div class="registration-container">

        {{-- PAGE HEADING --}}
        <div class="page-heading">
            <div class="eyebrow">
                Student Management System
            </div>

            <h1>Register a New Student</h1>

            <p>
                Complete the information below to create a new student registration record.
                Fields marked with an asterisk are required.
            </p>
        </div>

        {{-- REGISTRATION CARD --}}
        <div class="registration-card">

            <div class="registration-card-header">
                <h2>Student Registration Form</h2>

                <p>
                    Enter accurate personal and academic information.
                </p>
            </div>

            <form
                action="{{ route('students.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="registration-form"
                id="studentRegistrationForm"
                novalidate
            >

                @csrf

                {{-- ERROR SUMMARY --}}
                @if ($errors->any())
                    <div class="error-summary">
                        <strong>Please correct the highlighted fields.</strong>

                        <p>
                            Some of the information you entered is invalid or incomplete.
                            Review the red warnings below and try again.
                        </p>
                    </div>
                @endif


                {{-- =========================================
                    SECTION 1: STUDENT INFORMATION
                ========================================== --}}

                <div class="form-section">

                    <div class="section-heading">
                        <div class="section-number">01</div>

                        <h3>Student Information</h3>

                        <span>Basic identification details</span>
                    </div>

                    <div class="form-grid">

                        {{-- STUDENT ID --}}
                        <div class="form-group">
                            <label for="student_id">
                                Student ID
                            </label>

                            <input
                                type="text"
                                id="student_id"
                                name="student_id"
                                value="{{ old('student_id') }}"
                                class="form-control @error('student_id') is-invalid @enderror"
                                placeholder="1234-5678"
                                inputmode="numeric"
                                maxlength="9"
                                autocomplete="off"
                                required
                            >

                            @error('student_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                            @error('student_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- EMAIL --}}
                        <div class="form-group">

                            <label class="form-label" for="email">
                                Email Address
                                <span class="required">*</span>
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="example@email.com"
                                required
                            >

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- FIRST NAME --}}
                        <div class="form-group">

                            <label class="form-label" for="first_name">
                                First Name
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="first_name"
                                name="first_name"
                                value="{{ old('first_name') }}"
                                class="form-control name-input @error('first_name') is-invalid @enderror"
                                placeholder="Enter first name"
                                autocomplete="given-name"
                                required
                            >

                            @error('first_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- MIDDLE NAME --}}
                        <div class="form-group">

                            <label class="form-label" for="middle_name">
                                Middle Name
                                <span class="optional">(Optional)</span>
                            </label>

                            <input
                                type="text"
                                id="middle_name"
                                name="middle_name"
                                value="{{ old('middle_name') }}"
                                class="form-control name-input @error('middle_name') is-invalid @enderror"
                                placeholder="Enter middle name"
                            >

                            @error('middle_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- LAST NAME --}}
                        <div class="form-group">

                            <label class="form-label" for="last_name">
                                Last Name
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="last_name"
                                name="last_name"
                                value="{{ old('last_name') }}"
                                class="form-control name-input @error('last_name') is-invalid @enderror"
                                placeholder="Enter last name"
                                autocomplete="family-name"
                                required
                            >

                            @error('last_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- MOBILE NUMBER --}}
                        <div class="form-group">

                            <label class="form-label" for="mobile_number">
                                Mobile Number
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="mobile_number"
                                name="mobile_number"
                                value="{{ old('mobile_number') }}"
                                class="form-control @error('mobile_number') is-invalid @enderror"
                                placeholder="e.g. 09123456789"
                                inputmode="numeric"
                                autocomplete="tel"
                                maxlength="15"
                                required
                            >

                            @error('mobile_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- DATE OF BIRTH --}}
                        <div class="form-group">

                            <label class="form-label" for="date_of_birth">
                                Date of Birth
                                <span class="required">*</span>
                            </label>

                            <input
                                type="date"
                                id="date_of_birth"
                                name="date_of_birth"
                                value="{{ old('date_of_birth') }}"
                                class="form-control @error('date_of_birth') is-invalid @enderror"
                                required
                            >

                            @error('date_of_birth')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- GENDER --}}
                        <div class="form-group">

                            <label class="form-label" for="gender">
                                Gender
                                <span class="required">*</span>
                            </label>

                            <select
                                id="gender"
                                name="gender"
                                class="form-select @error('gender') is-invalid @enderror"
                                required
                            >
                                <option value="">Select gender</option>

                                <option
                                    value="Male"
                                    {{ old('gender') === 'Male' ? 'selected' : '' }}
                                >
                                    Male
                                </option>

                                <option
                                    value="Female"
                                    {{ old('gender') === 'Female' ? 'selected' : '' }}
                                >
                                    Female
                                </option>

                                <option
                                    value="Other"
                                    {{ old('gender') === 'Other' ? 'selected' : '' }}
                                >
                                    Other
                                </option>

                            </select>

                            @error('gender')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- =========================================
                    SECTION 2: ACADEMIC INFORMATION
                ========================================== --}}

                <div class="form-section">

                    <div class="section-heading">
                        <div class="section-number">02</div>

                        <h3>Academic Information</h3>

                        <span>Program and year level</span>
                    </div>

                    <div class="form-grid">

                        {{-- PROGRAM --}}
                        <div class="form-group">

                            <label class="form-label" for="program">
                                Program
                                <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                id="program"
                                name="program"
                                value="{{ old('program') }}"
                                class="form-control @error('program') is-invalid @enderror"
                                placeholder="e.g. BS Information Technology"
                                required
                            >

                            @error('program')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- YEAR LEVEL --}}
                        <div class="form-group">

                            <label class="form-label" for="year_level">
                                Year Level
                                <span class="required">*</span>
                            </label>

                            <select
                                id="year_level"
                                name="year_level"
                                class="form-select @error('year_level') is-invalid @enderror"
                                required
                            >

                                <option value="">Select year level</option>

                                <option
                                    value="1st Year"
                                    {{ old('year_level') === '1st Year' ? 'selected' : '' }}
                                >
                                    1st Year
                                </option>

                                <option
                                    value="2nd Year"
                                    {{ old('year_level') === '2nd Year' ? 'selected' : '' }}
                                >
                                    2nd Year
                                </option>

                                <option
                                    value="3rd Year"
                                    {{ old('year_level') === '3rd Year' ? 'selected' : '' }}
                                >
                                    3rd Year
                                </option>

                                <option
                                    value="4th Year"
                                    {{ old('year_level') === '4th Year' ? 'selected' : '' }}
                                >
                                    4th Year
                                </option>

                            </select>

                            @error('year_level')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- =========================================
                    SECTION 3: ADDRESS
                ========================================== --}}

                <div class="form-section">

                    <div class="section-heading">
                        <div class="section-number">03</div>

                        <h3>Contact Address</h3>

                        <span>Residential information</span>
                    </div>

                    <div class="form-grid">

                        <div class="form-group full-width">

                            <label class="form-label" for="address">
                                Complete Address
                                <span class="required">*</span>
                            </label>

                            <textarea
                                id="address"
                                name="address"
                                class="form-control @error('address') is-invalid @enderror"
                                placeholder="Enter complete residential address"
                                required
                            >{{ old('address') }}</textarea>

                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- =========================================
                    SECTION 4: PROFILE PICTURE
                ========================================== --}}

                <div class="form-section">

                    <div class="section-heading">
                        <div class="section-number">04</div>

                        <h3>Profile Picture</h3>

                        <span>JPG, JPEG, or PNG • Maximum 2 MB</span>
                    </div>

                    <div class="form-grid">

                        <div class="form-group full-width">

                            <label class="form-label" for="profile_picture">
                                Upload Profile Picture
                                <span class="required">*</span>
                            </label>

                            <div class="file-upload-wrapper">

                                <label
                                    for="profile_picture"
                                    id="fileUploadArea"
                                    class="file-upload-area @error('profile_picture') invalid @enderror"
                                >

                                    <div
                                        class="file-preview"
                                        id="filePreview"
                                    >
                                        📷
                                    </div>

                                    <div class="file-upload-text">

                                        <strong id="fileName">
                                            Choose an image
                                        </strong>

                                        <span>
                                            JPG, JPEG, or PNG format. Maximum file size: 2 MB.
                                        </span>

                                    </div>

                                </label>

                                <input
                                    type="file"
                                    id="profile_picture"
                                    name="profile_picture"
                                    class="file-input"
                                    accept=".jpg,.jpeg,.png,image/jpeg,image/png"
                                    required
                                >

                            </div>

                            @error('profile_picture')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- =========================================
                    FORM ACTIONS
                ========================================== --}}

                <div class="form-actions">

                    <p class="form-note">
                        By submitting this form, the student information will be
                        validated and securely stored in the Student Registration System.
                    </p>

                    <div class="action-buttons">

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

                </div>

            </form>

        </div>

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

/*
|--------------------------------------------------------------------------
| STUDENT ID VALIDATION AND AUTO-FORMATTING
|--------------------------------------------------------------------------
*/

const studentIdInput = document.getElementById('student_id');

if (studentIdInput) {

    studentIdInput.addEventListener('input', function () {

        /*
        | Remove everything except numbers.
        */

        let value = this.value.replace(/\D/g, '');

        /*
        | Limit to 8 numbers.
        */

        value = value.substring(0, 8);

        /*
        | Automatically add the dash after the first 4 numbers.
        */

        if (value.length > 4) {
            value =
                value.substring(0, 4)
                + '-'
                + value.substring(4);
        }

        /*
        | Update input value.
        */

        this.value = value;

        /*
        | Clear existing client validation.
        */

        clearClientError(this);

        /*
        | Validate Student ID format.
        */

        const studentIdPattern =
            /^\d{4}-\d{4}$/;


        if (value === '') {

            this.classList.remove('is-valid');

            return;
        }


        if (!studentIdPattern.test(value)) {

            showClientError(
                this,
                'Student ID must follow the format XXXX-XXXX. Example: 1234-5678.'
            );

            return;
        }


        /*
        | Valid Student ID.
        */

        clearClientError(this);

        this.classList.remove('is-invalid');

        this.classList.add('is-valid');

    });


    /*
    |--------------------------------------------------------------------------
    | VALIDATE WHEN USER LEAVES THE FIELD
    |--------------------------------------------------------------------------
    */

    studentIdInput.addEventListener('blur', function () {

        const studentIdPattern =
            /^\d{4}-\d{4}$/;


        if (this.value.trim() === '') {

            showClientError(
                this,
                'Student ID is required.'
            );

            return;
        }


        if (!studentIdPattern.test(this.value)) {

            showClientError(
                this,
                'Student ID must follow the format XXXX-XXXX. Example: 1234-5678.'
            );

        }

    });

}
        /*
    |--------------------------------------------------------------------------
    | MOBILE NUMBER VALIDATION
    |--------------------------------------------------------------------------
    |
    | Only numbers are allowed.
    | Letters, spaces, and symbols are automatically removed.
    |
    */

    const mobileInput = document.getElementById('mobile_number');

    if (mobileInput) {

        mobileInput.addEventListener('input', function () {

            const originalValue = this.value;

            /*
            | Remove everything except numbers.
            */

            const cleanedValue = originalValue.replace(/[^0-9]/g, '');

            this.value = cleanedValue;

            /*
            | Clear previous client-side error.
            */

            clearClientError(this);

            /*
            | Required field.
            */

            if (cleanedValue === '') {

                this.classList.remove('is-valid');

                return;
            }

            /*
            | Validate minimum and maximum length.
            */

            if (cleanedValue.length < 10) {

                showClientError(
                    this,
                    'Mobile number must contain at least 10 digits.'
                );

                return;
            }

            if (cleanedValue.length > 15) {

                showClientError(
                    this,
                    'Mobile number cannot exceed 15 digits.'
                );

                return;
            }

            /*
            | Valid number.
            */

            clearClientError(this);

            this.classList.remove('is-invalid');

            this.classList.add('is-valid');

        });


        mobileInput.addEventListener('blur', function () {

            if (this.value.trim() === '') {

                showClientError(
                    this,
                    'Mobile number is required.'
                );

            }

        });

    }
    const form = document.getElementById('studentRegistrationForm');

    /*
    |--------------------------------------------------------------------------
    | NAME VALIDATION
    |--------------------------------------------------------------------------
    |
    | Allows:
    | - Letters
    | - Spaces
    | - Apostrophes
    | - Hyphens
    |
    | Rejects:
    | - Numbers
    | - Symbols such as @, #, _, etc.
    |
    */

    const nameInputs = document.querySelectorAll('.name-input');

    nameInputs.forEach(function (input) {

        input.addEventListener('input', function () {

            const originalValue = this.value;

            const cleanedValue = originalValue.replace(
                /[^a-zA-Z\s'\-]/g,
                ''
            );

            if (originalValue !== cleanedValue) {

                this.value = cleanedValue;

                showClientError(
                    this,
                    'Names can only contain letters, spaces, apostrophes, and hyphens.'
                );

            } else {

                clearClientError(this);

                if (this.value.trim().length > 0) {
                    this.classList.add('is-valid');
                }

            }

        });

        input.addEventListener('blur', function () {

            if (
                this.hasAttribute('required') &&
                this.value.trim() === ''
            ) {
                showClientError(
                    this,
                    'This name field is required.'
                );
            }

        });

    });


    /*
    |--------------------------------------------------------------------------
    | EMAIL VALIDATION
    |--------------------------------------------------------------------------
    */

    const emailInput = document.getElementById('email');

    if (emailInput) {

        emailInput.addEventListener('input', function () {

            const email = this.value.trim();

            if (email === '') {

                clearClientError(this);

                return;

            }

            const emailPattern =
                /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailPattern.test(email)) {

                showClientError(
                    this,
                    'Please enter a valid email address.'
                );

            } else {

                clearClientError(this);
                this.classList.add('is-valid');

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | FILE PREVIEW
    |--------------------------------------------------------------------------
    */

    const fileInput = document.getElementById('profile_picture');
    const filePreview = document.getElementById('filePreview');
    const fileName = document.getElementById('fileName');
    const fileUploadArea = document.getElementById('fileUploadArea');

    if (fileInput) {

        fileInput.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) {
                return;
            }

            const allowedTypes = [
                'image/jpeg',
                'image/png'
            ];

            if (!allowedTypes.includes(file.type)) {

                fileUploadArea.classList.add('invalid');

                fileName.textContent =
                    'Invalid file. Please choose a JPG, JPEG, or PNG image.';

                return;
            }

            if (file.size > 2 * 1024 * 1024) {

                fileUploadArea.classList.add('invalid');

                fileName.textContent =
                    'File is too large. Maximum allowed size is 2 MB.';

                return;
            }

            fileUploadArea.classList.remove('invalid');

            fileName.textContent = file.name;

            const reader = new FileReader();

            reader.onload = function (event) {

                filePreview.innerHTML =
                    '<img src="' +
                    event.target.result +
                    '" alt="Profile picture preview">';

            };

            reader.readAsDataURL(file);

        });

    }


    /*
    |--------------------------------------------------------------------------
    | CLIENT-SIDE ERROR FUNCTIONS
    |--------------------------------------------------------------------------
    */

    function showClientError(input, message) {

        input.classList.remove('is-valid');
        input.classList.add('is-invalid');

        let feedback =
            input.parentElement.querySelector('.client-invalid-feedback');

        if (!feedback) {

            feedback = document.createElement('div');

            feedback.className =
                'invalid-feedback client-invalid-feedback';

            input.parentElement.appendChild(feedback);

        }

        feedback.textContent = message;

    }


    function clearClientError(input) {

        input.classList.remove('is-invalid');

        const feedback =
            input.parentElement.querySelector('.client-invalid-feedback');

        if (feedback) {
            feedback.remove();
        }

    }


    /*
    |--------------------------------------------------------------------------
    | PREVENT DOUBLE FORM SUBMISSION
    |--------------------------------------------------------------------------
    */

    if (form) {

        form.addEventListener('submit', function () {

            const submitButton =
                document.getElementById('submitButton');

            if (submitButton) {

                submitButton.disabled = true;

                submitButton.textContent =
                    'Registering Student...';

            }

        });

    }

});
</script>

@endsection