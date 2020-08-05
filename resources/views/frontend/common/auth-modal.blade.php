<div class="modal fade" id="authModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <div class="modal-content">
            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal"><span
                    aria-hidden="true">×</span></button>
            <div class="modal-c-tabs">
                <ul class="nav nav-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#loginPane" role="tab">SignIn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#signupPane" role="tab">SignUp</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in show active" id="loginPane" role="loginPane">

                        <form method="POST" id="loginForm" action="{{ route('user.login') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="alertMessage"> </div>
                                <div class="form-group">
                                    <label for="email">email</label>
                                    <input id="email" type="email" class="form-control" name="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="password">password</label>
                                    <input id="password" type="password" class="form-control" name="password"
                                        autocomplete="current-password">

                                </div>
                                <div class="text-right mt-4">
                                    <p> <a href="#forgotPane" data-toggle="tab" role="tab" class="blue-text">Forgot
                                            Password?</a></p>
                                </div>
                                <div class="text-center mt-4">
                                    <button disabled
                                        class="disableBtn cmt-btn cmt-btn-size-sm cmt-btn-shape-round cmt-btn-style-fill cmt-btn-color-skincolor w-100"
                                        type="submit">Log in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="signupPane" role="signupPane">
                        <form method="POST" id="signupForm" action="{{ route('user.register') }}">
                            @csrf
                            <div class="modal-body">
                                <div class="alertMessage"> </div>
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" id="first_name" name="first_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control">
                                </div>
                                <div class="text-center mt-4">
                                    <button disabled
                                        class="disableBtn cmt-btn cmt-btn-size-sm cmt-btn-shape-round cmt-btn-style-fill cmt-btn-color-skincolor w-100"
                                        type="submit">Sign up</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="agentModal" tabindex="-1" role="dialog" aria-labelledby="agentModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agent">Contact Agent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="agentForm" action="">
                    @csrf
                    <p class="error" id="errorMessage"></p>
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" autofocus>
                            <span class="invalid-feedback" role="alert" id="nameError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email">
                            <span class="invalid-feedback" role="alert" id="emailError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="message" class="col-md-4 col-form-label text-md-right">Message</label>
                        <div class="col-md-6">
                            <textarea id="message" name="message"></textarea>
                            <span class="invalid-feedback" role="alert" id="emailError">
                                <strong></strong>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" disabled class="disableBtn btn btn-primary">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>