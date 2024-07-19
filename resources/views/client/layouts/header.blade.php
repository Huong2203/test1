
    <!-- navigation -->
    <header class="navigation fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-white">
                <a class="navbar-brand order-1" href="{{ route('trangchu') }}">
                    <img class="img-fluid" width="100px" src="{{ asset('theme/client/images/logo.png') }}"
                         alt="Reader | Hugo Personal Blog Template">
                </a>

                @include('client.layouts.nav')

                <div class="order-2 order-lg-3 d-flex align-items-center">
                    <ul class="navbar-nav mx-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->type == 'admin')
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                            {{ __('Quản trị viên') }}
                                        </a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                       {{ __('Đăng xuất') }}
                                    </a>
                                </div>
                            </li>
                        @endguest
                        </ul>

                </div>

            </nav>
        </div>
    </header>
    <!-- /navigation -->



