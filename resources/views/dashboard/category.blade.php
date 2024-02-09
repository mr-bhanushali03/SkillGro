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

            <!-- Desktop View -->
            <div class="row g-4 mb-3 d-none d-sm-flex">
                <div class="col-lg-auto">
                    <!-- Add New Button -->
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createCategory">
                        <i class="ri-add-line align-bottom me-1"></i> Add New
                    </button>

                    <!-- Delete All Button -->
                    <a class="btn btn-secondary" id="deleteMultiple" href="{{route('deleteAll')}}">
                        <i class="ri-delete-bin-2-line align-bottom me-1"></i> Delete All
                    </a>
                </div>

                <div class="col-sm">
                    <div class="d-flex justify-content-sm-end gap-2">
                        <!-- Full Width Search Bar -->
                        <div class="search-box ms-2">
                            <input type="text" class="form-control" id="searchCategory" placeholder="Search...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile View -->
            <div class="col-sm mb-4 d-sm-none">
                <div class="d-flex justify-content-sm-end gap-2 align-items-center">
                    <!-- Add New Button -->
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createCategory">
                        <i class="ri-add-line"></i>
                    </button>

                    <!-- Delete All Button -->
                    <a class="btn btn-secondary ms-2" id="deleteMultiple" href="{{route('deleteAll')}}">
                        <i class="ri-delete-bin-2-line"></i>
                    </a>

                    <!-- Search Bar with Icon (Full Width on Mobile) -->
                    <div class="search-box ms-3">
                        <input type="text" class="form-control" id="searchCategory" placeholder="Search...">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade zoomIn" id="createCategory" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content border-0">
                        <div class="modal-header p-3 bg-info-subtle">
                            <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="close-modal"></button>
                        </div>
                        <form class="tablelist-form" autocomplete="off" method="POST" action="addCategory">
                            @csrf
                            <div class="modal-body">
                                <div class="row pt-3">
                                    <div class="col-lg-12">
                                        <label for="category" class="form-label">Category</label>
                                        <input type="text" id="category" class="form-control" name="category"
                                            placeholder="Development,Finance, Marketing etc..." required />
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                                <div class="row pt-3">
                                    <div class="col-lg-12">
                                        <label for="icon" class="form-label">Icons</label>
                                        <div class="input-group">
                                            <input type="text" id="icon" class="form-control" name="icon"
                                                placeholder="ri-home-line" required />
                                            <a href="{{ route('icons') }}" target="__blank"
                                                class="btn btn-outline-success"><i
                                                    class="ri-codepen-line align-bottom me-1"></i> Choose Icon</a>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" id="close-modal"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Add</button>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update Task</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--end modal-->

            @if (session('success') || $errors->has('category') || $errors->has('icon'))
                <div id="alert-container" class="text-center mx-auto" style="width: 50%;">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->has('category') || $errors->has('icon'))
                        <div class="alert alert-danger">
                            @if ($errors->has('category'))
                                {{ $errors->first('category') }}<br>
                            @endif
                            @if ($errors->has('icon'))
                                {{ $errors->first('icon') }}<br>
                            @endif
                        </div>
                    @endif
                </div>

                <script>
                    // Auto-hide the alert after 3 seconds
                    setTimeout(function() {
                        document.getElementById('alert-container').style.display = 'none';
                    }, 3000);
                </script>
            @endif

            <div class="row">
                @foreach ($Categories as $Category)
                    <div class="col-xl-3 col-lg-4 col-md-6 category">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="avatar-sm object-fit-cover rounded bg-light text-dark d-flex justify-content-center align-items-center">
                                            <i class="{{ $Category->icon }}" style="font-size: 2em;"></i>
                                        </div>
                                    </div>
                                    <div class="ms-3 flex-grow-1 d-flex justify-content-start align-items-center">
                                        <a href="javascript:void(0)">
                                            <h5 class="mt-1">{{ $Category->category }}</h5>
                                        </a>
                                    </div>
                                    <div>
                                        <div class="dropdown float-end mt-1">
                                            <button class="btn btn-ghost-primary btn-icon dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle fs-16"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item view-item-btn" data-bs-toggle="modal"
                                                        data-bs-target="#editCategory{{ $Category->id }}"
                                                        href="javascript:void(0);">Edit</a>
                                                </li>
                                                <li><a class="dropdown-item edit-item-btn"
                                                        href="{{ route('deleteCategory', ['id' => $Category->id]) }}">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->

                    <!-- Modal -->
                    <div class="modal fade zoomIn" id="editCategory{{ $Category->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true" style="position: absolute">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content border-0">
                                <div class="modal-header p-3 bg-info-subtle">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                        id="close-modal"></button>
                                </div>
                                <form class="tablelist-form" autocomplete="off" method="POST" action="updateCategory">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="row pt-3">
                                            <div class="col-lg-12">
                                                <label for="category" class="form-label">Category</label>
                                                <input type="text" id="category" class="form-control"
                                                    value="{{ $Category->category }}" name="category"
                                                    placeholder="Development,Finance, Marketing etc..." required />
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                        <div class="row pt-3">
                                            <div class="col-lg-12">
                                                <label for="icon" class="form-label">Icons</label>
                                                <div class="input-group">
                                                    <input type="text" id="icon" class="form-control"
                                                        name="icon" placeholder="ri-home-line"
                                                        value="{{ $Category->icon }}" required />
                                                    <a href="{{ route('icons') }}" target="__blank"
                                                        class="btn btn-outline-success"><i
                                                            class="ri-codepen-line align-bottom me-1"></i> Choose Icon</a>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                        <input type="hidden" name="id" value="{{ $Category->id }}">
                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light" id="close-modal"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success" id="add-btn">Update</button>
                                            <!-- <button type="button" class="btn btn-success" id="edit-btn">Update Task</button> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--end modal-->
                @endforeach
            </div>
            <!--end row-->
            <div class="noresult"
                style="display: none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <div class="text-center">
                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                        colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                    <h5 class="mt-2">Sorry! No Result Found</h5>
                    <p class="text-muted mb-0">We've searched extensively in this category, but unfortunately, couldn't
                        find any items matching your criteria.</p>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#searchCategory').on('input', function() {
                var query = $(this).val().toLowerCase();

                $('.category').each(function() {
                    var name = $(this).find('.card-body h5').text().toLowerCase();

                    // Show or hide the card based on the search query
                    if (name.includes(query)) {
                        $(this).show();
                        found = true;
                    } else {
                        $(this).css('display', 'none');
                    }
                });

                $('.noresult').toggle($('.card:visible').length === 0);
            });
        });
    </script>
@endsection
