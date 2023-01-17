@extends('layouts.app')

@section('content')
    <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyModalLabel">Odpovedať</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                    <ul id="rply_msgList"></ul>

                    <input type="hidden" id="ziadost_id"/>

                    <div class="form-group mb-3">
                        <label  id="meno">Meno:</label>
                    </div>
                    <div class="form-group mb-3">
                        <label  id="priezvisko">Priezvisko:</label>
                    </div>
                    <div class="form-group mb-3">
                        <label id="e-mail">Email:</label>
                    </div>
                    <div class="form-group mb-3">
                        <label  id="telefon">Telefon</label>
                    </div>
                    <div class="form-group mb-3">
                        <label >Predmet:</label>
                        <input type="text" id="predmet" required class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label id="obsah">Obsah:</label>
                    </div>
                    <div class="form-group mb-3">
                        <label>Odpoved:</label>
                        <input type="text" id="odpoved" required class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary send_email">Reply</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div id="success_message"></div>
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Správy
                            <button type="button" class="btn btn-primary float-end" onclick="loadmessages()"
                                    data-bs-target="#AddStudentModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bootstrap-reboot" viewBox="0 0 16 16">
                                    <path d="M1.161 8a6.84 6.84 0 1 0 6.842-6.84.58.58 0 1 1 0-1.16 8 8 0 1 1-6.556 3.412l-.663-.577a.58.58 0 0 1 .227-.997l2.52-.69a.58.58 0 0 1 .728.633l-.332 2.592a.58.58 0 0 1-.956.364l-.643-.56A6.812 6.812 0 0 0 1.16 8z"></path>
                                    <path d="M6.641 11.671V8.843h1.57l1.498 2.828h1.314L9.377 8.665c.897-.3 1.427-1.106 1.427-2.1 0-1.37-.943-2.246-2.456-2.246H5.5v7.352h1.141zm0-3.75V5.277h1.57c.881 0 1.416.499 1.416 1.32 0 .84-.504 1.324-1.386 1.324h-1.6z"></path>
                                </svg>
                            </button>

                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>predmet</th>
                                <th>email</th>
                                <th>odpovedat</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/js/ajax.js"></script>

@endsection
