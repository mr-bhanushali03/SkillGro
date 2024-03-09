@extends('dashboard.layout.layout')

@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">{{ $Title }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">{{ $Title }}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="card">
                <div class="card-header border-0 rounded">
                    <div class="row g-2 align-items-center">
                        <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                            <div class="search-box">
                                <label class="form-label" for="searchResultList">Search</label>
                                <input type="text" class="form-control" autocomplete="off" id="searchResultList"
                                    placeholder="Search for course & category or something...">
                                <i class="ri-search-line search-icon mb-1 mt-3"></i>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                            <label for="students" class="form-label">Students</label>
                            <select class="form-control" id="total-student" data-choices>
                                <option value="All">All</option>
                                <option value="500">500</option>
                                <option value="1k">1k</option>
                                <option value="2k">2k</option>
                                <option value="3k">3k</option>
                                <option value="4k">4k</option>
                                <option value="5k">5k</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                            <label for="ratings" class="form-label">Ratings</label>
                            <select class="form-control" id="total-ratings" data-choices>
                                <option value="All">All</option>
                                <option value="1 star">1 Star</option>
                                <option value="2 star">2 star</option>
                                <option value="3 star">3 star</option>
                                <option value="4 star">4 star</option>
                                <option value="5 star">5 star</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                            <label for="category-select" class="form-label">Category</label>
                            <select class="form-control" id="category-select" data-choices>
                                <option value="All">All</option>
                                @foreach ($Categories as $Category)
                                    <option value="{{ $Category->category }}">{{ $Category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                            <div class="hstack gap-2 mt-lg-n3">
                                <button type="button" class="btn btn-danger w-100 mt-lg-5">
                                    <i class="ri-delete-bin-2-line me-1 align-bottom"></i> Delete All
                                </button>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                            <div class="hstack gap-2 mt-lg-n3">
                                <button class="btn btn-success w-100 mt-lg-5" data-bs-toggle="modal"
                                    data-bs-target="#addcourse">
                                    <i class="ri-add-fill me-1 align-bottom"></i> Add Course
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4" id="seller-list"></div>
            <!--end row-->

            <div class="row align-items-center mb-4 text-center text-sm-start" id="pagination-element">
                <div class="col-sm">
                    <div class="text-muted">
                        Showing 1 to 8 of 12 entries
                    </div>
                </div>
                <div class="col-sm-auto  mt-3 mt-sm-0">
                    <div
                        class="pagination-block pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                        <div class="page-item">
                            <a href="javascript:void(0);" class="page-link" id="page-prev"><i
                                    class="mdi mdi-chevron-left"></i></a>
                        </div>
                        <span id="page-num" class="pagination"></span>
                        <div class="page-item">
                            <a href="javascript:void(0);" class="page-link" id="page-next"><i
                                    class="mdi mdi-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- pagination-element -->

            <div id="noresult" class="d-none">
                <div class="text-center py-4">
                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                        colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px"></lord-icon>
                    <h5 class="mt-2">Sorry! No Result Found</h5>
                    <p class="text-muted mb-0">We've searched more than 150+ sellers We did not find any sellers for you
                        search.</p>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade zoomIn" id="addcourse" tabindex="-1" aria-labelledby="addSellerLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addSellerLabel">Add Course</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-content border-0 mt-3">
                            <ul class="nav nav-tabs nav-tabs-custom nav-success p-2 pb-0 bg-light" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#courseDetails" role="tab"
                                        aria-selected="true">
                                        Course
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#curriculumDetails" role="tab"
                                        aria-selected="false">
                                        Curriculum
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#tutorialsDetails" role="tab"
                                        aria-selected="false">
                                        Tutorials
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('addCourse') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="tab-content">
                                    <div class="tab-pane active" id="courseDetails" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Course Title</label>
                                                    <input type="text" class="form-control" id="title"
                                                        placeholder="Enter course title" name="title"
                                                        value="{{ old('title') }}" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="level" class="form-label">Course
                                                        Level</label>
                                                    <select class="form-control" id="level" name="level"
                                                        value="{{ old('level') }}" data-choices data-choices-search-false>
                                                        <option value="Beginner">Beginner</option>
                                                        <option value="Intermediate">Intermediate</option>
                                                        <option value="Advanced">Advanced</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="actualPrice" class="form-label">Actual Price</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon1">&#8377;</span>
                                                        <input type="number" class="form-control" id="actualPrice"
                                                            placeholder="Actual Price" name="actualPrice"
                                                            value="{{ old('actualPrice') }}" autocomplete="off" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="sellingPrice" class="form-label">Selling
                                                        Price</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon1">&#8377;</span>
                                                        <input type="number" class="form-control" id="sellingPrice"
                                                            placeholder="Selling Price" name="sellingPrice"
                                                            value="{{ old('sellingPrice') }}" autocomplete="off" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="category" class="form-label">Category</label>
                                                    <select class="form-control" id="category" name="category"
                                                        value="{{ old('category') }}" data-choices required>
                                                        <option value="Choose Category" disabled readonly selected>Choose
                                                            Category</option>
                                                        @foreach ($Categories as $Category)
                                                            <option value="{{ $Category->category }}">
                                                                {{ $Category->category }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="banner" class="form-label">Banner
                                                    </label>
                                                    <input type="file" class="form-control" name="banner"
                                                        value="{{ old('banner') }}" id="banner" accept="image/*"
                                                        required>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Course
                                                        Description</label>
                                                    <textarea class="description" name="description" value="{{ old('description') }}">
                                                    </textarea>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                            class="ri-close-line me-1 align-middle"></i> Close</button>
                                                    <button class="btn btn-primary" data-bs-toggle="tab"
                                                        onclick="showTab('curriculumDetails', event)" role="tab"
                                                        aria-selected="false">Next<i
                                                            class="ri-arrow-right-line align-bottom ms-1"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <div class="tab-pane" id="curriculumDetails" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="curriculumTitle" class="form-label">Curriculum
                                                        Title</label>
                                                    <input type="text" class="form-control" name="curriculumTitle"
                                                        value="{{ old('curriculumTitle') }}" id="curriculumTitle"
                                                        placeholder="Enter your curriculum title" autocomplete="off"
                                                        required>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="curriculumDescription" class="form-label">Curriculum
                                                        Description</label>
                                                    <textarea class="curriculumdescription" name="curriculumDescription" value="{{ old('curriculumDescription') }}"></textarea>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button class="btn btn-secondary" data-bs-toggle="tab"
                                                        onclick="showTab('courseDetails', event)" role="tab"
                                                        aria-selected="false"><i
                                                            class="ri-arrow-left-line align-bottom me-1"></i> Prev</button>
                                                    <button class="btn btn-primary" data-bs-toggle="tab"
                                                        onclick="showTab('tutorialsDetails', event)" role="tab"
                                                        aria-selected="false">Next<i
                                                            class="ri-arrow-right-line align-bottom ms-1"></i></button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <div class="tab-pane" id="tutorialsDetails" role="tabpanel">
                                        <button id="addAccordion" class="btn btn-primary align-end mb-2">Add Tutorials
                                        </button>
                                        <button id="removeAccordion" class="btn btn-danger align-end mb-2">Remove
                                            Tutorials</button>
                                        <div class="row">
                                            <div class="live-preview">
                                                <div class="accordion accordion-flush mb-3" id="accordionFlushExample">
                                                    <div class="accordion-item" id="accordionItem1">
                                                        <h2 class="accordion-header" id="flush-headingOne">
                                                            <button class="accordion-button" type="button"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapseOne" aria-expanded="true"
                                                                aria-controls="flush-collapseOne">
                                                                Curriculum Tutorial Section 1
                                                            </button>
                                                        </h2>
                                                        <div id="flush-collapseOne"
                                                            class="accordion-collapse collapse show"
                                                            aria-labelledby="flush-headingOne"
                                                            data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3">
                                                                            <label for="tutorialsTitle"
                                                                                class="form-label text-dark">Video
                                                                                Title</label>
                                                                            <input type="text" class="form-control"
                                                                                id="tutorialsTitle1"
                                                                                value="{{ old('tutorialsTitle1') }}"
                                                                                name="tutorialsTitle1" autocomplete="off"
                                                                                placeholder="Enter your video title"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3">
                                                                            <label for="videos1"
                                                                                class="form-label text-dark">Add
                                                                                Multiple Videos</label>
                                                                            <p class="text-muted">Use <code>multiple</code>
                                                                                videos within the same time to select
                                                                                multiple
                                                                                files.</p>
                                                                            <input class="form-control tutorialsInput"
                                                                                type="file" name="tutorials1[]"
                                                                                value="{{ old('tutorials1') }}" multiple
                                                                                data-allow-reorder="true" accept="video/*"
                                                                                required>
                                                                            <ul class="list-group mt-3 tutorialsList1">
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button class="btn btn-secondary prev-tab" data-bs-toggle="tab"
                                                        onclick="showTab('curriculumDetails', event)" role="tab"
                                                        aria-selected="false"><i
                                                            class="ri-arrow-left-line align-bottom me-1"></i>
                                                        Prev</button>
                                                    <button class="btn btn-primary" type="submit">Save<i
                                                            class="ri-save-3-line align-bottom ms-1"></i></button>
                                                </div>
                                            </div>
                                            <!--end row-->
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--end modal-->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
@section('scripts')
    <script>
        ClassicEditor.create(document.querySelector('.description'))
        ClassicEditor.create(document.querySelector('.curriculumdescription'))


        $(document).ready(function() {
            $('.hstack button[data-bs-toggle="tab"]').on('click', function(event) {
                const targetTabId = $(this).attr('href').substring(1);
                showTab(targetTabId, event);
            });
        });

        function showTab(tabId, event) {
            $('.tab-pane').removeClass('active').filter(`#${tabId}`).addClass('active');
            $('.nav-link').removeClass('active').filter(`[href="#${tabId}"]`).addClass('active');
            if (event) {
                event.preventDefault();
            }
        }

        $(document).ready(function() {
            var accordionCounter = 1;

            $('#accordionFlushExample').on('change', '.tutorialsInput', function() {
                var files = this.files;
                var accordionIndex = $(this).closest('.accordion-item').attr('id').replace('accordionItem',
                    '');
                var $fileList = $(`.tutorialsList${accordionIndex}`);
                var $fileInput = $(this);

                // Retrieve existing files from the tutorials[] array
                var existingFiles = $fileInput.data('existing-files') || [];

                // Combine existing files with newly selected files
                var allFiles = existingFiles.concat(Array.from(files));

                // Store the updated tutorials[] array in the data attribute
                $fileInput.data('existing-files', allFiles);

                $fileList.empty();

                for (var i = 0; i < allFiles.length; i++) {
                    var file = allFiles[i];
                    var fileName = file.name;
                    var fileSize = formatBytes(file.size);

                    var listItem = $(
                        '<li class="list-group-item d-flex justify-content-between align-items-center">' +
                        '<div class="form-check">' +
                        '<input class="form-check-input" type="checkbox" id="checkbox' + i +
                        '" data-filename="' + fileName + '" name="checkbox' + i + '">' +
                        '<label class="form-check-label" for="checkbox' + i + '">' + fileName +
                        '</label>' +
                        '</div>' +
                        '<span class="badge badge-primary badge-pill">' + fileSize + '</span>' +
                        '<button type="button" class="btn btn-danger btn-sm delete" data-index="' + i +
                        '"><i class="bx bxs-trash"></i></button>' +
                        '</li>'
                    );

                    $fileList.append(listItem);
                }
            });

            $('#file-list' + accordionCounter + '').on('change', '.form-check-input', function() {
                var filename = $(this).data('filename');
                var paidStatus = $(this).prop('checked') ? 'paid' : 'free';

                // Find the file in the array and update its paid status
                var fileIndex = fileList.findIndex(function(item) {
                    return item.filename === filename;
                });

                if (fileIndex !== -1) {
                    fileList[fileIndex].paidStatus = paidStatus;
                } else {
                    // If the file is not found, add it to the array
                    fileList.push({
                        filename: filename,
                        paidStatus: paidStatus
                    });
                }
            });



            $('#accordionFlushExample').on('click', '.delete', function() {
                var index = $(this).data('index');
                var accordionIndex = $(this).closest('.accordion-item').attr('id').replace('accordionItem',
                    '');
                var input = $(`.tutorialsInput${accordionIndex}`);

                input.val(function(_, value) {
                    var files = value.split(',');
                    files.splice(index, 1);
                    return files.join(',');
                });

                $(this).parent().remove();
            });

            $('#addAccordion').click(function() {
                accordionCounter++;
                var accordionItem = createAccordionItem(accordionCounter);
                $('#accordionFlushExample').append(accordionItem);
            });

            $('#removeAccordion').click(function() {
                var $accordionItems = $('#accordionFlushExample').children('.accordion-item');

                if ($accordionItems.length > 1) {
                    $accordionItems.last().remove();
                    accordionCounter--;
                }
            });

            function createAccordionItem(counter) {
                return $(`
        <div class="accordion-item" id="accordionItem${counter}">
            <h2 class="accordion-header" id="flush-heading${counter}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                    data-bs-target="#flush-collapse${counter}" aria-expanded="true" aria-controls="flush-collapse${counter}">
                    Curriculum Tutorial Section ${counter}
                </button>
            </h2>
            <div id="flush-collapse${counter}" class="accordion-collapse collapse show"
                aria-labelledby="flush-heading${counter}" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="tutorialsTitle${counter}" class="form-label text-dark">Video Title</label>
                                <input type="text" class="form-control" id="tutorialsTitle${counter}" value="{{ old('tutorialsTitle${counter}') }}"
                                    name="tutorialsTitle${counter}" autocomplete="off" placeholder="Enter your video title" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="videos${counter}" class="form-label">Add Multiple Videos</label>
                                <p class="text-muted">Use <code>multiple</code> videos within the same time to select multiple files.</p>
                                <input class="form-control tutorialsInput" type="file" name="tutorials${counter}[]" multiple value="{{ old('tutorials${counter}') }}"
                                    data-allow-reorder="true" accept="video/*" required>
                                <ul class="list-group mt-3 tutorialsList${counter}"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `);
            }

            function formatBytes(bytes, decimals = 2) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const dm = decimals < 0 ? 0 : decimals;
                const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
            }
        });
    </script>
@endsection
