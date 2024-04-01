@extends('dashboard.layout.layout')

@section('content')
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop"
                                colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>
                            <h5 class="modal-title mt-3" id="exampleModalLabel" style="font-size: 24px;">Well done!</h5>
                            <p style="font-size: 16px;" class="text-muted">Aww yeah, you successfully read this important
                                message.</p>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-primary" onclick="redirectToEnrollCourse()">Go to Course</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#exampleModal').modal('show');
        });

        function redirectToEnrollCourse() {
            window.location.href = "{{ route('enrollCourse') }}";
        }
    </script>
@endsection
