document.addEventListener('DOMContentLoaded', () => {

    /*
    |--------------------------------------------------------------------------
    | Student Search
    |--------------------------------------------------------------------------
    */

    const searchInput =
        document.getElementById('studentSearch');

    const studentGrid =
        document.getElementById('studentGrid');

    const noSearchResults =
        document.getElementById('noSearchResults');


    if (searchInput && studentGrid) {

        const studentCards =
            studentGrid.querySelectorAll('.student-card');


        searchInput.addEventListener('input', () => {

            const query =
                searchInput.value
                    .trim()
                    .toLowerCase();


            let visibleStudents = 0;


            studentCards.forEach((card) => {

                const searchableContent =
                    card.dataset.search || '';


                const matches =
                    searchableContent.includes(query);


                card.style.display =
                    matches ? '' : 'none';


                if (matches) {
                    visibleStudents++;
                }

            });


            if (noSearchResults) {

                noSearchResults.classList.toggle(
                    'hidden',
                    visibleStudents !== 0
                );

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Profile Image Preview
    |--------------------------------------------------------------------------
    */

    const fileInput =
        document.getElementById('profile_picture');

    const imagePreview =
        document.getElementById('imagePreview');

    const imagePlaceholder =
        document.getElementById('imagePlaceholder');

    const fileName =
        document.getElementById('fileName');


    if (fileInput && imagePreview) {

        fileInput.addEventListener('change', (event) => {

            const file =
                event.target.files[0];


            if (!file) {

                imagePreview.src = '';

                imagePreview.classList.add('hidden');

                if (imagePlaceholder) {
                    imagePlaceholder.classList.remove('hidden');
                }

                if (fileName) {
                    fileName.textContent =
                        'No file selected';
                }

                return;
            }


            if (fileName) {
                fileName.textContent =
                    file.name;
            }


            const reader =
                new FileReader();


            reader.addEventListener('load', (e) => {

                imagePreview.src =
                    e.target.result;


                imagePreview.classList.remove(
                    'hidden'
                );


                if (imagePlaceholder) {
                    imagePlaceholder.classList.add(
                        'hidden'
                    );
                }

            });


            reader.readAsDataURL(file);

        });

    }


    /*
    |--------------------------------------------------------------------------
    | Prevent Double Submission
    |--------------------------------------------------------------------------
    */

    const registrationForm =
        document.getElementById(
            'studentRegistrationForm'
        );

    const submitButton =
        document.getElementById(
            'submitButton'
        );


    if (registrationForm && submitButton) {

        registrationForm.addEventListener(
            'submit',
            () => {

                submitButton.disabled = true;

                submitButton.textContent =
                    'Registering Student...';

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Automatically Dismiss Success Notification
    |--------------------------------------------------------------------------
    */

    const successToast =
        document.querySelector(
            '.toast-success'
        );


    if (successToast) {

        setTimeout(() => {

            successToast.style.opacity = '0';

            successToast.style.transform =
                'translateY(-10px)';


            setTimeout(() => {

                successToast.remove();

            }, 300);

        }, 5000);

    }

});