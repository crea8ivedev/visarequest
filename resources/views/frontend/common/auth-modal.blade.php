<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
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
                        <p class="error" id="errorMessage"></p>
                        <form method="POST" id="loginForm" action="{{ route('user.login') }}">
                            @csrf
                            <div class="modal-body">
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
                                    <p> <a href="#forgotPane" data-toggle="tab" role="tab"
                                            class="blue-text">Forgot Password?</a></p>
                                </div>
                                <div class="text-center mt-4">
                                    <button
                                        class="cmt-btn cmt-btn-size-sm cmt-btn-shape-round cmt-btn-style-fill cmt-btn-color-skincolor w-100"
                                        type="submit">Log in</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="signupPane" role="signupPane">
                        <form method="POST" id="signupForm" action="{{ route('user.register') }}">
                            @csrf
                            <div class="modal-body">
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
                                    <button
                                        class="cmt-btn cmt-btn-size-sm cmt-btn-shape-round cmt-btn-style-fill cmt-btn-color-skincolor w-100"
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