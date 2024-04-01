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

    <div class="container" data-bs-dismiss="modal" aria-label="Close">
        <div class="row justify-content-center">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                            <lord-icon src="https://cdn.lordicon.com/tdrtiskw.json" trigger="loop"
                                colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon>
                            <h5 class="modal-title mt-3" id="exampleModalLabel" style="font-size: 24px;">Oops...! So Sorry !
                            </h5>
                            <p style="font-size: 16px;" class="text-muted">Oops! Something went wrong with your payment.</p>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-primary" onclick="redirectToBack()">Go to back</button>
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

        function redirectToBack() {
            window.history.back()
        }
    </script>
@endsection
