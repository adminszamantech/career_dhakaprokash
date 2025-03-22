<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('/storage/assets/logo/faviconV2.png') }}" type="image/x-icon">
    <title>Career - Dhaka Prokash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <style>
        .watermark-logo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.1;
            width: 220px;
            pointer-events: none;
        }

        tr td {
            font-size: 15px;
        }

        .dashed-line {
            border: 0;
            border-top: 2px dashed #000;
            width: 100%;
        }
        .select2-selection {
            height: 44px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 44px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            margin-top:5px;
        }
        input{
            border: 1px solid #AAAAAA;
            background:#FFFFFF";
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="container py-4 px-2">

            <div class="card shadow-md bg-light py-5 px-2">
                <div class="row">
                    <div class="d-flex justify-content-center align-items-center flex-column">
                        <div class="col-sm-3 mb-3">
                            <img class="w-100" src="{{ asset('/storage/assets/logo/logo1672518180.png') }}"
                                alt="Logo">
                        </div>
                    </div>
                </div>
                <hr class="dashed-line">
                <div class="card-body" style="position: relative; padding: 30px;">
                    <h5 class="card-title text-center fw-bold">আগ্রহী প্রার্থীরা আবেদন ফরমটি সাবমিট করুন। চুড়ান্ত
                        মনোনীত হলে আপনাকে কল করা হবে।</h5>

                        @if ($errors->any())
                            <div class="row d-flex justify-content-center my-2">
                                <div class="col-md-6">
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('career.formSubmit') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 pt-2">
                                    <label for="" class="pb-1"><b>সম্পূর্ণ নাম</b> <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="bn_name" class="form-control" value="{{ old('bn_name') }}" placeholder="আপনার সম্পূর্ণ নাম" required>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label for="" class="pb-1"><b>সম্পূর্ণ নাম (ইংরেজী)</b> <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="en_name" class="form-control" value="{{ old('en_name') }}" placeholder="আপনার সম্পূর্ণ নাম (ইংরেজী)" required>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 pt-2">
                                    <label for="" class="pb-1"><b>মোবাইল নাম্বার</b> <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="mobile" class="form-control" value="{{ old('mobile') }}" placeholder="আপনার মোবাইল নাম্বার" required>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label for="" class="pb-1"><b>ইমেইল <span
                                        class="text-danger">*</span></b></label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="আপনার ইমেইল" required>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 pt-2">
                                    <label for="" class="pb-1"><b>জন্ম তারিখ</b> <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="date_of_bath" class="form-control" value="{{ old('date_of_bath') }}" placeholder="আপনার জন্ম তারিখ" required>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label for="" class="pb-1"><b>শিক্ষাগত যোগ্যতা</b> <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="edu_qualification" class="form-control" value="{{ old('edu_qualification') }}" placeholder="আপনার শিক্ষাগত যোগ্যতা" required>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6 pt-2">
                                    <label for="" class="pb-1"><b>বর্তমান পেশা</b> <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="present_occ" class="form-control" value="{{ old('present_occ') }}" placeholder="আপনার বর্তমান পেশা" required>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label for="" class="pb-1"><b>কর্মস্থল</b><span
                                        class="text-danger"> *</span></label>
                                    <input type="text" name="work_place" class="form-control" value="{{ old('work_place') }}" placeholder="আপনার কর্মস্থল" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pt-2">
                                    <label for="" class="pb-1"><b>যে পদে আবেদন করতে ইচ্ছুক</b><span
                                        class="text-danger"> *</span></label>
                                    <select name="application_type" class="apply-post-name form-control" id="select2-zila-name" required>
                                        <option value="">যে পদে আবেদন করতে ইচ্ছুক</option>
                                        <option value="1">স্টাফ রিপোর্টার</option>
                                        <option value="2">জেলা প্রতিনিধি</option>
                                        <option value="3">উপজেলা প্রতিনিধি</option>
                                        <option value="4">ক্যাম্পাস প্রতিনিধি</option>
                                    </select>
                                </div>
                                <div class="col-md-6 pt-2" id="zila-name-append"></div>
                            </div>

                            <div class="row" id="upozila-row-append">

                            </div>

                            <div class="row">
                                <div class="col-md-6 pt-2">
                                    <label for="" class="pb-1"><b>স্থায়ী ঠিকানা</b> <span
                                        class="text-danger">*</span></label>
                                    <input type="text" name="permanent_address" class="form-control" value="{{ old('permanent_address') }}" placeholder="আপনার স্থায়ী ঠিকানা" required>
                                </div>
                                <div class="col-md-6 pt-2">
                                    <label for="" class="pb-1"><b>সাংবাদিকতায় প্রশিক্ষণ আছে?</b><span
                                        class="text-danger"> *</span></label>
                                        <select name="journalism_tranning" class="apply-post-name form-control" required>
                                            <option value="">সাংবাদিকতায় প্রশিক্ষণ আছে?</option>
                                            <option value="হ্যাঁ">হ্যাঁ</option>
                                            <option value="না">না</option>
                                        </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pt-2">
                                    <label for="" class="pb-1"><b>আপনার ছবি দিন</b> <span
                                        class="text-danger">*</span></label>
                                    <input type="file" name="applicant_photo" class="form-control p-2" placeholder="আপনার ছবি দিন" accept=".jpg, .jpeg, .png" required>
                                </div>
                                <div class="col-md-6 d-flex justify-content-center align-items-center" style="padding-top:35px">
                                    <button class="w-100 btn btn-md btn-info">Submit</button>
                                </div>
                            </div>

                        </form>




                    <img src="{{ asset('/storage/assets/logo/logo1672518180.png') }}" alt="Watermark Logo"
                        class="watermark-logo">
                </div>
            </div>




        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.apply-post-name').select2();
            // zila select2
            $('#select2-zila-name').change(function() {
                var selectedValue = $(this).val();
                $('#zila-name-append').empty();
                $('#upozila-row-append').empty();
                if (selectedValue !== "" && (selectedValue == 1 || selectedValue == 2 || selectedValue == 3)) {

                    $('#zila-name-append').html(`
                        <div class="mt-4 spinner-grow spinner-grow-sm " role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="mt-4 spinner-grow spinner-grow-sm text-info" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="mt-4 spinner-grow spinner-grow-sm text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    `);

                    $.ajax({
                        url: '/get-zila-lists',
                        type: 'GET',
                        success: function(response) {
                            if(response.status == 'success'){
                                var options = '<option value="">জেলা নাম খুঁজুন</option>';
                                $.each(response.districts, function(index, district) {
                                    options += `<option value="${district.id}">${district.bn_name}</option>`;
                                });
                                $('#zila-name-append').html(`
                                    <label for="zila" class="pb-1"><b>জেলা</b><span class="text-danger">*</span></label>
                                    <select name="district_id" class="zila-name form-control" id="select2-upozila-name" required>
                                        ${options}
                                    </select>
                                `);
                                $('.zila-name').select2();
                            }
                        },
                        error: function() {
                            $('#zila-name-append').html('<p class="mt-4">Please try again.</p>');
                        }
                    });
                }
                if (selectedValue !== "" && (selectedValue == 4)) {
                    $('#zila-name-append').html(`
                        <div class="mt-4 spinner-grow spinner-grow-sm " role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="mt-4 spinner-grow spinner-grow-sm text-info" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <div class="mt-4 spinner-grow spinner-grow-sm text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    `);
                    $('#zila-name-append').html(`
                        <label for="" class="pb-1"><b>বিশ্ববিদ্যালয় ক্যাটাগরি</b><span
                            class="text-danger"> *</span></label>
                            <select name="university_type" class="apply-post-name form-control" id="select-university-name" required>
                                <option value="">বিশ্ববিদ্যালয় ক্যাটাগরি</option>
                                <option value="1">পাবলিক বিশ্ববিদ্যালয়</option>
                                <option value="2">জাতীয় বিশ্ববিদ্যালয়</option>
                                <option value="3">প্রাইভেট বিশ্ববিদ্যালয়</option>
                            </select>
                    `);
                    $('.apply-post-name').select2();

                }
            });


            // upozila select2
            $(document).on('change', '#select2-upozila-name', function() {
                var selectedZilaValue = $(this).val();
                $('#upozila-row-append').empty();

                if (selectedZilaValue !== "") {
                    $('#upozila-row-append').html(`
                        <div class="d-flex justify-content-center gap-2">
                            <div class="mt-4 spinner-grow spinner-grow-sm " role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="mt-4 spinner-grow spinner-grow-sm text-info" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="mt-4 spinner-grow spinner-grow-sm text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    `);
                    $.ajax({
                        url: '/get-upozila-lists/'+selectedZilaValue,
                        type: 'GET',
                        success: function(response) {
                            if(response.status == 'success'){
                                var options = '<option value="">উপজেলা নাম খুঁজুন</option>';
                                $.each(response.upozilas, function(index, upozila) {
                                    options += `<option value="${upozila.id}">${upozila.bn_name}</option>`;
                                });
                                $('#upozila-row-append').html(`
                                    <div class="col-md-6 pt-2">
                                        <label for="upozila" class="pb-1"><b>উপজেলা</b><span class="text-danger">*</span></label>
                                        <select name="upazila_id" class=" form-control" id="upozila-name" required>
                                            ${options}
                                        </select>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <label for="" class="pb-1"><b>বর্তমান ঠিকানা</b> <span
                                            class="text-danger">*</span></label>
                                        <input type="text" name="present_address" class="form-control" placeholder="আপনার বর্তমান ঠিকানা" required>
                                    </div>
                                `);
                                $('#upozila-name').select2();
                            }
                        },
                        error: function() {
                            $('#upozila-name-append').html('<p class="mt-4">Please try again.</p>');
                        }
                    });
                }
            });

            // university select2
            $(document).on('change', '#select-university-name', function() {
                var selectedUniValue = $(this).val();
                $('#upozila-row-append').empty();

                if (selectedUniValue !== "" && (selectedUniValue == 1 || selectedUniValue == 3)) {
                    $('#upozila-row-append').html(`
                        <div class="d-flex justify-content-center gap-2">
                            <div class="mt-4 spinner-grow spinner-grow-sm " role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="mt-4 spinner-grow spinner-grow-sm text-info" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="mt-4 spinner-grow spinner-grow-sm text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    `);
                    $.ajax({
                        url: '/get-university-lists/'+selectedUniValue,
                        type: 'GET',
                        success: function(response) {

                            if(response.status == 'success'){
                                var options = '<option value="">বিশ্ববিদ্যালয় নাম খুঁজুন</option>';
                                $.each(response.universities, function(index, university) {
                                    options += `<option value="${university.name}">${university.name}</option>`;
                                });
                                $('#upozila-row-append').html(`
                                    <div class="col-md-6 pt-2">
                                        <label for="upozila" class="pb-1"><b>বিশ্ববিদ্যালয় নাম খুঁজুন</b><span class="text-danger">*</span></label>
                                        <select name="university_name" class="form-control" id="upozila-name" required>
                                            ${options}
                                        </select>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                        <label for="" class="pb-1"><b>বর্তমান ঠিকানা</b> <span
                                            class="text-danger">*</span></label>
                                        <input type="text" name="present_address" class="form-control" placeholder="আপনার বর্তমান ঠিকানা" required>
                                    </div>
                                `);
                                $('#upozila-name').select2();
                            }
                        },
                        error: function() {
                            $('#upozila-name-append').html('<p class="mt-4">Please try again.</p>');
                        }
                    });
                }

                if(selectedUniValue !== "" && (selectedUniValue == 2)){
                    $('#upozila-row-append').html(`
                        <div class="d-flex justify-content-center gap-2">
                            <div class="mt-4 spinner-grow spinner-grow-sm " role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="mt-4 spinner-grow spinner-grow-sm text-info" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <div class="mt-4 spinner-grow spinner-grow-sm text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    `);

                    $('#upozila-row-append').html(`
                        <div class="col-md-6 pt-2">
                            <label for="" class="pb-1"><b>বিশ্ববিদ্যালয় নাম লিখুন</b> <span
                                class="text-danger">*</span></label>
                            <input type="text" name="university_name" class="form-control" placeholder="আপনার বিশ্ববিদ্যালয় নাম" required>
                        </div>
                        <div class="col-md-6 pt-2">
                            <label for="" class="pb-1"><b>বর্তমান ঠিকানা</b> <span
                                class="text-danger">*</span></label>
                            <input type="text" name="present_address" class="form-control" placeholder="আপনার বর্তমান ঠিকানা" required>
                        </div>
                    `);
                }
            });

        });

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.info("{{ session('info') }}");
        @endif
    </script>
</body>

</html>

