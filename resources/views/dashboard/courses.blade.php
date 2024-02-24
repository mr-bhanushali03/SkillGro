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
                                                        autocomplete="off" required>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="level" class="form-label">Course
                                                        Level</label>
                                                    <select class="form-control" id="level" name="level"
                                                        data-choices data-choices-search-false>
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
                                                            autocomplete="off" required>
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
                                                            autocomplete="off" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="category" class="form-label">Category</label>
                                                    <select class="form-control" id="category" name="category"
                                                        data-choices required>
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
                                                        id="banner" accept="image/*" required>
                                                </div>
                                            </div>
                                            <!--end col-->

                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="description" class="form-label">Course
                                                        Description</label>
                                                    <textarea class="description" name="description">
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
                                                        id="curriculumTitle" placeholder="Enter your curriculum title"
                                                        autocomplete="off" required>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="curriculumDescription" class="form-label">Curriculum
                                                        Description</label>
                                                    <textarea class="curriculumdescription" name="curriculumDescription"></textarea>
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
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="flush-headingOne">
                                                            <button class="accordion-button" type="button"
                                                                id="flushOne" data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapseOne" aria-expanded="true"
                                                                aria-controls="flush-collapseOne">
                                                                Curriculum Tutorial Section
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
                                                                                id="tutorialsTitle" name="tutorialsTitle"
                                                                                autocomplete="off"
                                                                                placeholder="Enter your video title"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                    <!--end col-->

                                                                    <div class="col-lg-12">
                                                                        <div class="mb-3">
                                                                            <label for="addTutorial"
                                                                                class="form-label text-dark">Add
                                                                                Videos</label>
                                                                            <span class="d-block mb-2">You can add multiple
                                                                                videos and uncheck the checkbox
                                                                                to provide a video-free experience</span>
                                                                            <input type="file" id="filepond"
                                                                                class="filepond" multiple
                                                                                name="tutorials[]"
                                                                                data-allow-reorder="true"
                                                                                data-max-file-size="100MB"
                                                                                accept="video/*" required>
                                                                        </div>
                                                                    </div>
                                                                    <!--end col-->
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


        document.addEventListener("DOMContentLoaded", function() {
            const tabButtons = document.querySelectorAll('.hstack button[data-bs-toggle="tab"]');
            tabButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    const targetTabId = this.getAttribute('href').substring(1);
                    showTab(targetTabId, event);
                });
            });
        });

        function showTab(tabId, event) {
            const tabs = document.querySelectorAll('.tab-pane');
            const tabLinks = document.querySelectorAll('.nav-link');

            tabs.forEach(tab => {
                if (tab.id === tabId) {
                    tab.classList.add('active');
                } else {
                    tab.classList.remove('active');
                }
            });

            tabLinks.forEach(link => {
                const linkHref = link.getAttribute('href');
                const cleanLinkHref = linkHref.startsWith('#') ? linkHref.substring(1) : linkHref;

                if (cleanLinkHref === tabId) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });

            // Prevent the default behavior of the link (e.g., navigating to a new URL)
            if (event) {
                event.preventDefault();
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            FilePond.registerPlugin(FilePondPluginFileValidateSize);
            const accordionItem = document.querySelector('.accordion-item').cloneNode(true);
            const filePondConfig = {
                allowMultiple: true,
                maxFileSize: '100MB',
                labelMaxFileSizeExceeded: 'File is too large',
                labelMaxFileSize: 'Maximum file size is 500MB',
                labelIdle: 'Drag & Drop your files or <span class="filepond--label-action">Browse</span>',
                server: {
                    process: (fieldName, file, metadata, load) => load(file),
                }
            };
            const filePond = FilePond.create(document.querySelector('#filepond'), filePondConfig);

            document.getElementById('addAccordion').addEventListener('click', addAccordionSection);
            document.getElementById('removeAccordion').addEventListener('click', removeLastAccordionSection);

            function addAccordionSection() {

                for (let i = 0; i < accordionItem.children.length; i++) {
                    const collapseElement = accordionItem.querySelector('.accordion-collapse');
                    const buttonElement = accordionItem.querySelector('.accordion-button');

                    if (collapseElement && buttonElement) {
                        collapseElement.id = `flush-collapse${i}`;
                        collapseElement.classList.remove('show');

                        buttonElement.setAttribute('data-bs-target', `#flush-collapse${i}`);
                        buttonElement.setAttribute('aria-controls', `#flush-collapse${i}`);
                        buttonElement.id = `flush${i}`;
                    }
                }

                document.querySelector('.accordion').appendChild(accordionItem);

                const acordianFileConfig = {
                    allowMultiple: true,
                    maxFileSize: '100MB',
                    labelMaxFileSizeExceeded: 'File is too large',
                    labelMaxFileSize: 'Maximum file size is 500MB',
                    labelIdle: 'Drag & Drop your files or <span class="filepond--label-action">Browse</span>',
                    server: {
                        process: (fieldName, file, metadata, load) => load(file),
                    }
                };
                const accordianFilePond = FilePond.create(accordionItem.querySelector('.filepond'),
                    acordianFileConfig);

                accordianFilePond.on('processfiles', (error, file) => {
                    accordionItem.querySelectorAll('.filepond--list li').forEach(li => {
                        const serverId = li.id;
                        const text = li.querySelector('.filepond--file-wrapper legend')
                            .innerText;
                        addCheckbox(serverId, text, file, true);
                    });
                });

                function addCheckbox(serverId, text, file, checked) {
                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.name = 'type';
                    checkbox.value = text;
                    checkbox.checked = checked;
                    checkbox.style.cssText = 'float: right; transform: translate3d(22px, -34px, 10px);';
                    checkbox.classList.add('form-check-input');
                    document.getElementById(serverId).append(checkbox);
                    if (window.innerWidth <= 768) {
                        document.getElementById(serverId).style.width = '94%';
                    } else {
                        document.getElementById(serverId).style.width = '97%';
                    }
                }
            }

            function removeLastAccordionSection() {
                const accordionItems = document.querySelectorAll('.accordion-item');
                if (accordionItems.length > 1) {
                    const lastAccordionItem = accordionItems[accordionItems.length - 1];
                    lastAccordionItem.remove();
                }
            }

            filePond.on('processfiles', (error, file) => {
                document.querySelectorAll('.filepond--list li').forEach(li => {
                    const serverId = li.id;
                    const text = li.querySelector('.filepond--file-wrapper legend').innerText;
                    addCheckbox(serverId, text, file, true);
                });
            });

            function addCheckbox(serverId, text, file, checked) {
                const checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.name = 'type';
                checkbox.value = text;
                checkbox.checked = checked;
                checkbox.style.cssText = 'float: right; transform: translate3d(22px, -34px, 10px);';
                checkbox.classList.add('form-check-input');
                document.getElementById(serverId).append(checkbox);
                if (window.innerWidth <= 768) {
                    document.getElementById(serverId).style.width = '94%';
                } else {
                    document.getElementById(serverId).style.width = '97%';
                }
            }
        });
    </script>
@endsection
