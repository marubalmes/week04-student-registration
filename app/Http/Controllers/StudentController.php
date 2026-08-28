<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display the student directory.
     */
    public function index()
    {
        $students = Student::latest()->get();

        return view('students.index', compact('students'));
    }

    /**
     * Show the student registration form.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly registered student.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'student_id' => [
                    'required',
                    'string',
                    'regex:/^\d{4}-\d{4}$/',
                    'unique:students,student_id',
                ],

                'first_name' => [
                    'required',
                    'string',
                    'max:100',
                    'regex:/^[a-zA-Z\s\'\-]+$/',
                ],

                'middle_name' => [
                    'nullable',
                    'string',
                    'max:100',
                    'regex:/^[a-zA-Z\s\'\-]+$/',
                ],

                'last_name' => [
                    'required',
                    'string',
                    'max:100',
                    'regex:/^[a-zA-Z\s\'\-]+$/',
                ],

                'email' => [
                    'required',
                    'email',
                    'max:255',
                    'unique:students,email',
                ],

                'mobile_number' => [
                    'required',
                    'string',
                    'regex:/^[0-9]+$/',
                    'min:10',
                    'max:15',
                ],

                'date_of_birth' => [
                    'required',
                    'date',
                    'before:today',
                ],

                'gender' => [
                    'required',
                    Rule::in([
                        'Male',
                        'Female',
                        'Other',
                    ]),
                ],

                'program' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'year_level' => [
                    'required',
                    Rule::in([
                        '1st Year',
                        '2nd Year',
                        '3rd Year',
                        '4th Year',
                    ]),
                ],

                'address' => [
                    'required',
                    'string',
                ],

                'profile_picture' => [
                    'required',
                    'image',
                    'mimes:jpg,jpeg,png',
                    'max:2048',
                ],
            ],
            [
                'first_name.regex' =>
                    'First name can only contain letters, spaces, apostrophes, and hyphens.',

                'middle_name.regex' =>
                    'Middle name can only contain letters, spaces, apostrophes, and hyphens.',

                'last_name.regex' =>
                    'Last name can only contain letters, spaces, apostrophes, and hyphens.',

                'email.email' =>
                    'Please enter a valid email address.',

                'email.unique' =>
                    'This email address is already registered.',

                'student_id.unique' =>
                    'This Student ID is already registered.',

                'mobile_number.regex' =>
                    'Mobile number can only contain numbers.',

                'mobile_number.min' =>
                    'Mobile number must contain at least 10 digits.',

                'mobile_number.max' =>
                    'Mobile number cannot exceed 15 digits.',

                'profile_picture.required' =>
                    'Please upload a profile picture.',

                'profile_picture.image' =>
                    'The uploaded file must be an image.',

                'profile_picture.mimes' =>
                    'Profile picture must be a JPG, JPEG, or PNG file.',

                'profile_picture.max' =>
                    'Profile picture must not exceed 2 MB.',
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Upload Profile Picture
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_picture')) {
            $validatedData['profile_picture'] = $request
                ->file('profile_picture')
                ->store('student_profiles', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Create Student
        |--------------------------------------------------------------------------
        */

        $student = Student::create($validatedData);

        return redirect()
            ->route('students.show', $student)
            ->with(
                'success',
                'Student has been registered successfully.'
            );
    }

    /**
     * Display a specific student's profile.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /**
     * Delete a registered student.
     */
    public function destroy(Student $student)
    {
        /*
        |--------------------------------------------------------------------------
        | Delete Profile Picture
        |--------------------------------------------------------------------------
        */

        if (
            $student->profile_picture &&
            \Storage::disk('public')->exists($student->profile_picture)
        ) {
            \Storage::disk('public')->delete(
                $student->profile_picture
            );
        }

        /*
        |--------------------------------------------------------------------------
        | Delete Student Record
        |--------------------------------------------------------------------------
        */

        $student->delete();

        return redirect()
            ->route('students.index')
            ->with(
                'success',
                'Student record has been deleted successfully.'
            );
    }
}