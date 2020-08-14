@extends('frontend.layouts.app')
@section('content')

@endsection
<div class="modal fade in" data-backdrop="static" data-keyboard="false" id="resetModal" tabindex="-1" role="dialog"
    aria-labelledby="resetModal" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <div class="modal-content">
            <div class="modal-c-tabs">
                <ul class="nav nav-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#resetForm" role="tab">Reset Password</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <form method="POST" id="resetForm" action="#">
                        @csrf
                        <div class="modal-body">
                            <div class="alertMessage"> </div>
                            <div class="form-group">
                                <label for="email">Password</label>
                                <input id="password" type="password" class="form-control" name="password" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="email">Confirm Password</label>
                                <input id="confirm_password" type="password" class="form-control"
                                    name="confirm_password" autofocus>
                                <input type="hidden" id="token" name="token" value="{{$tokenData->token}}" />
                            </div>
                            <div class="text-center mt-4">
                                <button disabled
                                    class="disableBtn cmt-btn cmt-btn-size-sm cmt-btn-shape-round cmt-btn-style-fill cmt-btn-color-skincolor w-100"
                                    type="submit">Set New Password</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')

<script>
    $(document).ready(function(){
        $("#resetModal").modal('show');
    });
</script>
@endsection