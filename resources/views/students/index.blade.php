@extends('layouts.app')

@section('title', 'Student Directory')

@section('content')

<style>
    * {
        box-sizing: border-box;
    }

    .directory-page {
        min-height: calc(100vh - 80px);
        padding: 48px 24px 70px;
        background:
            radial-gradient(
                circle at top left,
                rgba(59, 91, 219, 0.08),
                transparent 30%
            ),
            linear-gradient(
                180deg,
                #f7f8fc 0%,
                #eef1f7 100%
            );
    }

    .directory-container {
        max-width: 1250px;
        margin: 0 auto;
    }

    /*
    |--------------------------------------------------------------------------
    | PAGE HEADING
    |--------------------------------------------------------------------------
    */

    .directory-heading {
        display: flex;
        align-items: flex-end;
        justify-content: space-between;
        gap: 25px;
        margin-bottom: 32px;
        animation: fadeDown 0.5s ease;
    }

    .eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 7px 13px;
        margin-bottom: 14px;
        border-radius: 999px;
        background: rgba(49, 76, 167, 0.1);
        color: #314ca7;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    .directory-heading h1 {
        margin: 0;
        color: #172033;
        font-size: clamp(2rem, 4vw, 2.8rem);
        letter-spacing: -0.04em;
    }

    .directory-heading p {
        max-width: 650px;
        margin: 10px 0 0;
        color: #64748b;
        font-size: 0.96rem;
        line-height: 1.7;
    }

    /*
    |--------------------------------------------------------------------------
    | BUTTONS
    |--------------------------------------------------------------------------
    */

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
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

    .btn-primary {
        border: 1px solid #2d49ae;
        background:
            linear-gradient(
                135deg,
                #3657c8,
                #263f9a
            );
        color: #ffffff;
        box-shadow:
            0 10px 25px
            rgba(49, 76, 167, 0.22);
    }

    .btn-primary:hover {
        box-shadow:
            0 14px 30px
            rgba(49, 76, 167, 0.3);
    }

    /*
    |--------------------------------------------------------------------------
    | SUCCESS MESSAGE
    |--------------------------------------------------------------------------
    */

    .success-alert {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 24px;
        padding: 15px 18px;
        border: 1px solid #bbf7d0;
        border-radius: 14px;
        background: #f0fdf4;
        color: #166534;
        animation: fadeDown 0.4s ease;
    }

    .success-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #dcfce7;
        font-weight: 800;
    }

    .success-alert strong {
        display: block;
        font-size: 0.85rem;
    }

    /*
    |--------------------------------------------------------------------------
    | DIRECTORY CARD
    |--------------------------------------------------------------------------
    */

    .directory-card {
        overflow: hidden;
        border: 1px solid #e5e9f2;
        border-radius: 22px;
        background: #ffffff;
        box-shadow:
            0 20px 60px
            rgba(15, 23, 42, 0.09);
        animation: fadeUp 0.6s ease;
    }

    /*
    |--------------------------------------------------------------------------
    | DIRECTORY TOOLBAR
    |--------------------------------------------------------------------------
    */

    .directory-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 24px 28px;
        border-bottom: 1px solid #e8edf5;
        background: #ffffff;
    }

    .student-count {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .count-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: #edf2ff;
        color: #314ca7;
        font-size: 1.1rem;
    }

    .student-count strong {
        display: block;
        color: #1e293b;
        font-size: 0.92rem;
    }

    .student-count span {
        display: block;
        margin-top: 3px;
        color: #94a3b8;
        font-size: 0.76rem;
    }

    /*
    |--------------------------------------------------------------------------
    | SEARCH
    |--------------------------------------------------------------------------
    */

    .search-wrapper {
        position: relative;
        width: min(360px, 100%);
    }

    .search-wrapper span {
        position: absolute;
        top: 50%;
        left: 15px;
        color: #94a3b8;
        transform: translateY(-50%);
        pointer-events: none;
    }

    .search-input {
        width: 100%;
        min-height: 46px;
        padding: 0 16px 0 43px;
        border: 1px solid #d8dee9;
        border-radius: 11px;
        background: #ffffff;
        color: #1e293b;
        font-family: inherit;
        outline: none;
        transition:
            border-color 0.2s ease,
            box-shadow 0.2s ease;
    }

    .search-input:focus {
        border-color: #3657c8;
        box-shadow:
            0 0 0 4px
            rgba(54, 87, 200, 0.1);
    }

    /*
    |--------------------------------------------------------------------------
    | STUDENT TABLE
    |--------------------------------------------------------------------------
    */

    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    .student-table {
        width: 100%;
        border-collapse: collapse;
    }

    .student-table thead {
        background: #f8fafc;
    }

    .student-table th {
        padding: 16px 20px;
        color: #64748b;
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.05em;
        text-align: left;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .student-table td {
        padding: 17px 20px;
        border-top: 1px solid #eef1f6;
        color: #475569;
        font-size: 0.86rem;
        vertical-align: middle;
    }

    .student-row {
        transition:
            background 0.2s ease;
    }

    .student-row:hover {
        background: #fafbff;
    }

    /*
    |--------------------------------------------------------------------------
    | STUDENT PROFILE
    |--------------------------------------------------------------------------
    */

    .student-profile {
        display: flex;
        align-items: center;
        gap: 13px;
        min-width: 220px;
    }

    .student-avatar {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 46px;
        height: 46px;
        flex-shrink: 0;
        overflow: hidden;
        border-radius: 13px;
        background:
            linear-gradient(
                135deg,
                #3657c8,
                #263f9a
            );
        color: #ffffff;
        font-size: 0.9rem;
        font-weight: 800;
        box-shadow:
            0 6px 15px
            rgba(49, 76, 167, 0.18);
    }

    .student-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .student-name {
        display: block;
        color: #1e293b;
        font-weight: 700;
        line-height: 1.4;
    }

    .student-email {
        display: block;
        margin-top: 3px;
        color: #94a3b8;
        font-size: 0.76rem;
    }

    /*
    |--------------------------------------------------------------------------
    | BADGES
    |--------------------------------------------------------------------------
    */

    .badge {
        display: inline-flex;
        align-items: center;
        padding: 6px 10px;
        border-radius: 999px;
        background: #eef2ff;
        color: #314ca7;
        font-size: 0.74rem;
        font-weight: 700;
        white-space: nowrap;
    }

    .year-badge {
        background: #f1f5f9;
        color: #475569;
    }

    /*
    |--------------------------------------------------------------------------
    | ACTION BUTTONS
    |--------------------------------------------------------------------------
    */

    .action-group {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 38px;
        height: 38px;
        border: 1px solid #dfe5ee;
        border-radius: 9px;
        background: #ffffff;
        color: #64748b;
        text-decoration: none;
        cursor: pointer;
        transition:
            transform 0.2s ease,
            box-shadow 0.2s ease,
            border-color 0.2s ease;
    }

    .action-btn:hover {
        transform: translateY(-2px);
    }

    .view-btn:hover {
        border-color: #3657c8;
        color: #3657c8;
        box-shadow:
            0 6px 15px
            rgba(54, 87, 200, 0.1);
    }

    .delete-btn {
        color: #dc2626;
    }

    .delete-btn:hover {
        border-color: #fecaca;
        background: #fff7f7;
        color: #dc2626;
        box-shadow:
            0 6px 15px
            rgba(220, 38, 38, 0.08);
    }

    /*
    |--------------------------------------------------------------------------
    | EMPTY STATE
    |--------------------------------------------------------------------------
    */

    .empty-state {
        padding: 80px 25px;
        text-align: center;
    }

    .empty-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 74px;
        height: 74px;
        margin: 0 auto 20px;
        border-radius: 22px;
        background: #edf2ff;
        color: #3657c8;
        font-size: 2rem;
    }

    .empty-state h2 {
        margin: 0;
        color: #1e293b;
        font-size: 1.25rem;
    }

    .empty-state p {
        max-width: 440px;
        margin: 10px auto 24px;
        color: #94a3b8;
        font-size: 0.88rem;
        line-height: 1.7;
    }

    /*
    |--------------------------------------------------------------------------
    | NO SEARCH RESULT
    |--------------------------------------------------------------------------
    */

    .no-results {
        display: none;
        padding: 35px;
        color: #94a3b8;
        text-align: center;
        font-size: 0.88rem;
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE MODAL
    |--------------------------------------------------------------------------
    */

    .modal-overlay {
        position: fixed;
        inset: 0;
        z-index: 999;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 20px;
        background: rgba(15, 23, 42, 0.55);
        backdrop-filter: blur(4px);
    }

    .modal-overlay.active {
        display: flex;
        animation: fadeIn 0.2s ease;
    }

    .delete-modal {
        width: 100%;
        max-width: 440px;
        padding: 30px;
        border-radius: 20px;
        background: #ffffff;
        box-shadow:
            0 25px 80px
            rgba(15, 23, 42, 0.25);
        animation: modalUp 0.25s ease;
    }

    .modal-icon {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 55px;
        height: 55px;
        margin-bottom: 18px;
        border-radius: 16px;
        background: #fff1f2;
        color: #dc2626;
        font-size: 1.5rem;
    }

    .delete-modal h3 {
        margin: 0;
        color: #1e293b;
        font-size: 1.25rem;
    }

    .delete-modal p {
        margin: 10px 0 24px;
        color: #64748b;
        font-size: 0.86rem;
        line-height: 1.7;
    }

    .delete-modal strong {
        color: #334155;
    }

    .modal-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .modal-cancel {
        border: 1px solid #d8dee9;
        background: #ffffff;
        color: #475569;
    }

    .modal-delete {
        border: 1px solid #b91c1c;
        background: #dc2626;
        color: #ffffff;
    }

    .modal-delete:hover {
        background: #b91c1c;
    }

    /*
    |--------------------------------------------------------------------------
    | ANIMATIONS
    |--------------------------------------------------------------------------
    */

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
        }

        to {
            opacity: 1;
        }
    }

    @keyframes modalUp {
        from {
            opacity: 0;
            transform: translateY(15px) scale(0.98);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    /*
    |--------------------------------------------------------------------------
    | RESPONSIVE
    |--------------------------------------------------------------------------
    */

    @media (max-width: 768px) {

        .directory-page {
            padding: 30px 16px 50px;
        }

        .directory-heading {
            align-items: stretch;
            flex-direction: column;
        }

        .directory-heading .btn {
            width: 100%;
        }

        .directory-toolbar {
            align-items: stretch;
            flex-direction: column;
            padding: 20px;
        }

        .search-wrapper {
            width: 100%;
        }

        .student-table th,
        .student-table td {
            padding: 14px 16px;
        }
    }

</style>


<div class="directory-page">

    <div class="directory-container">

        {{-- PAGE HEADING --}}
        <div class="directory-heading">

            <div>

                <div class="eyebrow">
                    Student Management System
                </div>

                <h1>Student Directory</h1>

                <p>
                    View, search, manage, and access the profiles of all
                    registered students in the Student Registration System.
                </p>

            </div>

            <a
                href="{{ route('students.create') }}"
                class="btn btn-primary"
            >
                + Register Student
            </a>

        </div>


        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))

            <div class="success-alert">

                <div class="success-icon">
                    ✓
                </div>

                <div>
                    <strong>
                        {{ session('success') }}
                    </strong>
                </div>

            </div>

        @endif


        {{-- DIRECTORY CARD --}}
        <div class="directory-card">

            {{-- TOOLBAR --}}
            <div class="directory-toolbar">

                <div class="student-count">

                    <div class="count-icon">
                        👥
                    </div>

                    <div>
                        <strong>
                            {{ $students->count() }}
                            {{ $students->count() == 1 ? 'Student' : 'Students' }}
                        </strong>

                        <span>
                            Registered student records
                        </span>
                    </div>

                </div>


                @if($students->count() > 0)

                    <div class="search-wrapper">

                        <span>⌕</span>

                        <input
                            type="text"
                            id="studentSearch"
                            class="search-input"
                            placeholder="Search by name, ID, email, or program..."
                        >

                    </div>

                @endif

            </div>


            {{-- STUDENT TABLE --}}
            @if($students->count() > 0)

                <div class="table-responsive">

                    <table class="student-table">

                        <thead>

                            <tr>
                                <th>Student</th>
                                <th>Student ID</th>
                                <th>Program</th>
                                <th>Year Level</th>
                                <th>Actions</th>
                            </tr>

                        </thead>

                        <tbody id="studentTableBody">

                            @foreach($students as $student)

                                <tr
                                    class="student-row"
                                    data-search="
                                        {{ strtolower(
                                            $student->first_name . ' ' .
                                            $student->middle_name . ' ' .
                                            $student->last_name . ' ' .
                                            $student->student_id . ' ' .
                                            $student->email . ' ' .
                                            $student->program . ' ' .
                                            $student->year_level
                                        ) }}
                                    "
                                >

                                    {{-- STUDENT --}}
                                    <td>

                                        <div class="student-profile">

                                            <div class="student-avatar">

                                                @if($student->profile_picture)

                                                    <img
                                                        src="{{ asset('storage/' . $student->profile_picture) }}"
                                                        alt="{{ $student->first_name }} {{ $student->last_name }}"
                                                    >

                                                @else

                                                    {{ strtoupper(
                                                        substr($student->first_name, 0, 1) .
                                                        substr($student->last_name, 0, 1)
                                                    ) }}

                                                @endif

                                            </div>


                                            <div>

                                                <span class="student-name">

                                                    {{ $student->first_name }}

                                                    @if($student->middle_name)
                                                        {{ $student->middle_name }}
                                                    @endif

                                                    {{ $student->last_name }}

                                                </span>

                                                <span class="student-email">
                                                    {{ $student->email }}
                                                </span>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- STUDENT ID --}}
                                    <td>

                                        <span class="badge">
                                            {{ $student->student_id }}
                                        </span>

                                    </td>


                                    {{-- PROGRAM --}}
                                    <td>
                                        {{ $student->program }}
                                    </td>


                                    {{-- YEAR LEVEL --}}
                                    <td>

                                        <span class="badge year-badge">
                                            {{ $student->year_level }}
                                        </span>

                                    </td>


                                    {{-- ACTIONS --}}
                                    <td>

                                        <div class="action-group">

                                            {{-- VIEW --}}
                                            <a
                                                href="{{ route('students.show', $student) }}"
                                                class="action-btn view-btn"
                                                title="View Student"
                                            >
                                                👁
                                            </a>


                                            {{-- DELETE --}}
                                            <button
                                                type="button"
                                                class="action-btn delete-btn delete-student-btn"
                                                title="Delete Student"
                                                data-student-name="{{ $student->first_name }} {{ $student->last_name }}"
                                                data-delete-url="{{ route('students.destroy', $student) }}"
                                            >
                                                🗑
                                            </button>

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


                {{-- NO SEARCH RESULTS --}}
                <div
                    class="no-results"
                    id="noResults"
                >
                    No students were found matching your search.
                </div>

            @else

                {{-- EMPTY STATE --}}
                <div class="empty-state">

                    <div class="empty-icon">
                        👨‍🎓
                    </div>

                    <h2>No Students Registered Yet</h2>

                    <p>
                        The student directory is currently empty.
                        Register your first student to begin building
                        the Student Registration System.
                    </p>

                    <a
                        href="{{ route('students.create') }}"
                        class="btn btn-primary"
                    >
                        + Register First Student
                    </a>

                </div>

            @endif

        </div>

    </div>

</div>


{{-- =========================================
    DELETE CONFIRMATION MODAL
========================================= --}}

<div
    class="modal-overlay"
    id="deleteModal"
>

    <div
        class="delete-modal"
        role="dialog"
        aria-modal="true"
    >

        <div class="modal-icon">
            🗑
        </div>

        <h3>Delete Student?</h3>

        <p>

            Are you sure you want to permanently delete

            <strong id="studentNameToDelete">
                this student
            </strong>?

            This action cannot be undone.

        </p>


        <form
            method="POST"
            id="deleteStudentForm"
        >

            @csrf

            @method('DELETE')

            <div class="modal-actions">

                <button
                    type="button"
                    class="btn modal-cancel"
                    id="cancelDelete"
                >
                    Cancel
                </button>


                <button
                    type="submit"
                    class="btn modal-delete"
                >
                    Delete Student
                </button>

            </div>

        </form>

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | STUDENT SEARCH
    |--------------------------------------------------------------------------
    */

    const searchInput =
        document.getElementById('studentSearch');

    const studentRows =
        document.querySelectorAll('.student-row');

    const noResults =
        document.getElementById('noResults');


    if (searchInput) {

        searchInput.addEventListener('input', function () {

            const searchValue =
                this.value.toLowerCase().trim();

            let visibleStudents = 0;


            studentRows.forEach(function (row) {

                const studentData =
                    row.dataset.search;

                if (
                    studentData.includes(searchValue)
                ) {

                    row.style.display = '';

                    visibleStudents++;

                } else {

                    row.style.display = 'none';

                }

            });


            if (noResults) {

                if (
                    visibleStudents === 0 &&
                    searchValue !== ''
                ) {

                    noResults.style.display = 'block';

                } else {

                    noResults.style.display = 'none';

                }

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | DELETE STUDENT MODAL
    |--------------------------------------------------------------------------
    */

    const deleteModal =
        document.getElementById('deleteModal');

    const deleteStudentForm =
        document.getElementById('deleteStudentForm');

    const studentNameToDelete =
        document.getElementById('studentNameToDelete');

    const cancelDelete =
        document.getElementById('cancelDelete');

    const deleteButtons =
        document.querySelectorAll('.delete-student-btn');


    deleteButtons.forEach(function (button) {

        button.addEventListener('click', function () {

            const studentName =
                this.dataset.studentName;

            const deleteUrl =
                this.dataset.deleteUrl;


            /*
            | Update student name.
            */

            studentNameToDelete.textContent =
                studentName;


            /*
            | Update form action.
            */

            deleteStudentForm.action =
                deleteUrl;


            /*
            | Show modal.
            */

            deleteModal.classList.add('active');

        });

    });


    /*
    |--------------------------------------------------------------------------
    | CANCEL DELETE
    |--------------------------------------------------------------------------
    */

    if (cancelDelete) {

        cancelDelete.addEventListener(
            'click',
            function () {

                deleteModal.classList.remove('active');

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | CLOSE MODAL WHEN CLICKING OUTSIDE
    |--------------------------------------------------------------------------
    */

    if (deleteModal) {

        deleteModal.addEventListener(
            'click',
            function (event) {

                if (
                    event.target === deleteModal
                ) {

                    deleteModal.classList.remove('active');

                }

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | CLOSE MODAL WITH ESC KEY
    |--------------------------------------------------------------------------
    */

    document.addEventListener(
        'keydown',
        function (event) {

            if (
                event.key === 'Escape'
            ) {

                deleteModal.classList.remove('active');

            }

        }
    );

});
</script>

@endsection