<section class="category-row">
    <div class="container">
        <nav class="main-menu menu-mobile m-auto" id="menu">
            <ul class="menu category-list">
                <li class="mega-menu-item service-category">
                    <a href="{{ route('frontend.user.profile') }}"
                        class="mega-menu-link   {{ (request()->is('profile')) ? 'active' : '' }}">My Profile</a>
                </li>
                <li class="mega-menu-item service-category">
                    <a href="{{ route('frontend.user.application.service') }}"
                        class="mega-menu-link   {{ (request()->is('services')) ? 'active' : '' }}">My Services</a>
                </li>
            </ul>
        </nav>
    </div>



</section>