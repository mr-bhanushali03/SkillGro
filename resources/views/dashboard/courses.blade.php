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
                                <input type="text" class="form-control" autocomplete="off" id="searchResultList"
                                    placeholder="Search for course & category or something..."> 
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                            <select class="form-control" id="total-student">
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
                            <select class="form-control" id="total-ratings">
                                <option value="All">All</option>
                                <option value="1 star">1 Star</option>
                                <option value="2 star">2 star</option>
                                <option value="3 star">3 star</option>
                                <option value="4 star">4 star</option>
                                <option value="5 star">5 star</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                            <select class="form-control" id="category-select">
                                <option value="All">All</option>
                                @foreach ($Categories as $Category)
                                    <option value="{{ $Category->category }}">{{ $Category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                            <div class="hstack gap-2">
                                <button type="button" class="btn btn-danger w-100"><i
                                        class="ri-delete-bin-2-line me-1 align-bottom"></i> Delete All</button>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-6 col-6">
                            <div class="hstack gap-2">
                                <button class="btn btn-success w-100" data-bs-toggle="modal"
                                    data-bs-target="#addcourse"><i class="ri-add-fill me-1 align-bottom"></i> Add Course</button>
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
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-content border-0 mt-3">
                            <ul class="nav nav-tabs nav-tabs-custom nav-success p-2 pb-0 bg-light" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab"
                                        aria-selected="true">
                                        Personal Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#businessDetails" role="tab"
                                        aria-selected="false">
                                        Business Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#bankDetails" role="tab"
                                        aria-selected="false">
                                        Bank Details
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="modal-body">
                            <form action="javascript:void(0)">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">First Name</label>
                                                    <input type="text" class="form-control" id="firstnameInput"
                                                        placeholder="Enter your firstname">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="lastnameInput" class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" id="lastnameInput"
                                                        placeholder="Enter your lastname">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="contactnumberInput" class="form-label">Contact
                                                        Number</label>
                                                    <input type="number" class="form-control" id="contactnumberInput"
                                                        placeholder="Enter your number">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="phonenumberInput" class="form-label">Phone Number</label>
                                                    <input type="number" class="form-control" id="phonenumberInput"
                                                        placeholder="Enter your number">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="emailidInput" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="emailidInput"
                                                        placeholder="Enter your email">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="birthdayidInput" class="form-label">Date of Birth</label>
                                                    <input type="text" id="birthdayidInput" class="form-control"
                                                        data-provider="flatpickr" placeholder="Enter your date of birth">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="cityidInput" class="form-label">City</label>
                                                    <input type="text" class="form-control" id="cityidInput"
                                                        placeholder="Enter your city">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="countryidInput" class="form-label">Country</label>
                                                    <input type="text" class="form-control" id="countryidInput"
                                                        placeholder="Enter your country">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="zipcodeidInput" class="form-label">Zip Code</label>
                                                    <input type="text" class="form-control" id="zipcodeidInput"
                                                        placeholder="Enter your zipcode">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="exampleFormControlTextarea1"
                                                        class="form-label">Description</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter description"></textarea>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button class="btn btn-secondary" data-bs-dismiss="modal"><i
                                                            class="ri-close-line me-1 align-middle"></i> Close</button>
                                                    <button class="btn btn-primary" data-bs-toggle="tab"
                                                        onclick="showTab('businessDetails', event)" role="tab"
                                                        aria-selected="false">Next<i
                                                            class="ri-arrow-right-line align-bottom ms-1"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <div class="tab-pane" id="businessDetails" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="companynameInput" class="form-label">Company Name</label>
                                                    <input type="text" class="form-control" id="companynameInput"
                                                        placeholder="Enter your company name">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="choices-single-default" class="form-label">Company
                                                        Type</label>
                                                    <select class="form-control" data-trigger
                                                        name="choices-single-default" id="choices-single-default">
                                                        <option value="">Select type</option>
                                                        <option value="All" selected>All</option>
                                                        <option value="Merchandising">Merchandising</option>
                                                        <option value="Manufacturing">Manufacturing</option>
                                                        <option value="Partnership">Partnership</option>
                                                        <option value="Corporation">Corporation</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="pancardInput" class="form-label">Pan Card Number</label>
                                                    <input type="text" class="form-control" id="pancardInput"
                                                        placeholder="Enter your pan-card number">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="websiteInput" class="form-label">Website</label>
                                                    <input type="url" class="form-control" id="websiteInput"
                                                        placeholder="Enter your URL">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="faxInput" class="form-label">Fax</label>
                                                    <input type="text" class="form-control" id="faxInput"
                                                        placeholder="Enter your fax">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-4">
                                                <div class="mb-3">
                                                    <label for="companyemailInput" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="companyemailInput"
                                                        placeholder="Enter your email">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="worknumberInput" class="form-label">Number</label>
                                                    <input type="number" class="form-control" id="worknumberInput"
                                                        placeholder="Enter your number">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="companylogoInput" class="form-label">Company Logo</label>
                                                    <input type="file" class="form-control" id="companylogoInput">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button class="btn btn-secondary" data-bs-toggle="tab"
                                                        onclick="showTab('personalDetails', event)" role="tab"
                                                        aria-selected="false"><i
                                                            class="ri-arrow-left-line align-bottom me-1"></i> Prev</button>
                                                    <button class="btn btn-primary" data-bs-toggle="tab"
                                                        onclick="showTab('bankDetails', event)" role="tab"
                                                        aria-selected="false">Next<i
                                                            class="ri-arrow-right-line align-bottom ms-1"></i></button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <div class="tab-pane" id="bankDetails" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="banknameInput" class="form-label">Bank Name</label>
                                                    <input type="text" class="form-control" id="banknameInput"
                                                        placeholder="Enter your bank name">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="branchInput" class="form-label">Branch</label>
                                                    <input type="text" class="form-control" id="branchInput"
                                                        placeholder="Branch">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label for="accountnameInput" class="form-label">Account Holder
                                                        Name</label>
                                                    <input type="text" class="form-control" id="accountnameInput"
                                                        placeholder="Enter account holder name">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="accountnumberInput" class="form-label">Account
                                                        Number</label>
                                                    <input type="number" class="form-control" id="accountnumberInput"
                                                        placeholder="Enter account number">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="ifscInput" class="form-label">IFSC</label>
                                                    <input type="number" class="form-control" id="ifscInput"
                                                        placeholder="IFSC">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button class="btn btn-secondary prev-tab" data-bs-toggle="tab"
                                                        onclick="showTab('businessDetails', event)" role="tab"
                                                        aria-selected="false"><i
                                                            class="ri-arrow-left-line align-bottom me-1"></i> Prev</button>
                                                    <button class="btn btn-primary" type="submit">Save<i
                                                            class="ri-save-3-line align-bottom ms-1"></i></button>
                                                </div>
                                            </div>
                                            <!--end col-->
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
    </script>
@endsection
