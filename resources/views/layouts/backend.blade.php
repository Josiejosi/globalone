<!DOCTYPE html>
<html>

<head>
    <title>ONE GLOBAL NETWORK</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="ONE GLOBAL NETWORK" name="keywords">
    <meta content="ONE GLOBAL NETWORK" name="author">
    <meta content="ONE GLOBAL NETWORK, Peer to Peer Donations" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="active" content="{{ auth()->user()->id }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset( 'images/favicon/apple-touch-icon.png' ) }}">
    <link rel="icon" type="image/png" href="{{ asset( 'images/favicon/favicon-32x32.png' ) }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset( 'images/favicon/favicon-16x16.png' ) }}" sizes="16x16">
    <link href="{{ asset( 'css/backend.css' ) }}" rel="stylesheet">
    <style type="text/css">
    .alert {
        color: #fff;
    }

    .table .row-actions a {
        color: #f7f9fa;
    }

    </style>
</head>

<body>
    <div></div>
    <div class="all-wrapper menu-side with-side-panel" id="app">
        <div class="layout-w">
            <div class="menu-mobile menu-activated-on-click color-scheme-dark">
                <div class="mm-logo-buttons-w">
                    <a href="#"><img src="{{ asset( 'images/avatar.jpg' ) }}" alt="ONE GLOBAL NETWORK"></a>
                    <div class="mm-buttons">
                        <div class="mobile-menu-trigger">
                            <div class="os-icon os-icon-hamburger-menu-1"></div>
                        </div>
                    </div>
                </div>
                <div class="menu-and-user">
                    <div class="logged-user-w">
                        <div class="avatar-w"><img alt="" src="{{ asset( 'images/avatar.jpg' ) }}"></div>
                            <div class="logged-user-info-w">
                                <div class="logged-user-name">{{ auth()->user()->name }} {{ auth()->user()->surname }}</div>
                                <div class="logged-user-role">LEVEL {{ $level }}</div>
                            </div>
                        </div>
                        <ul class="main-menu">
                            <li>
                                <a href="{{ url('/home') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-window-content"></div>
                                </div>
                                <span>Dashboard</span>
                            </a>
                            </li>
                            <li>
                                <a href="{{ url('/wallet') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-wallet-loaded"></div>
                                </div>
                                <span>Wallet</span>
                            </a>
                            </li>
                            <li>
                                <a href="{{ url('/transactions') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-hierarchy-structure-2"></div>
                                </div>
                                <span>Transactions</span>
                            </a>
                            </li>
                            <li>
                                <a href="{{ url('/profile') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-user-male-circle"></div>
                                </div>
                                <span>Profile</span>
                            </a>
                            </li>
                            <!-- Start of admin -->
                            @if ( auth()->user()->hasRole('admin') )
                            <li>
                                <a href="{{ url('/block') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-user-male-circle"></div>
                                </div>
                                <span>Block</span>
                            </a>
                            </li>
                            <li>
                                <a href="{{ url('/member') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-user-male-circle"></div>
                                </div>
                                <span>New Member</span>
                            </a>
                            </li>
                            <li>
                                <a href="{{ url('/donation') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-hierarchy-structure-2"></div>
                                </div>
                                <span>Admin Donations</span>
                            </a>
                            </li>
                            <li>
                                <a href="{{ url('/settings') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-ui-46"></div>
                                </div>
                                <span>Settings</span>
                            </a>
                            </li>
                            @endif

                            <li>
                                <a href="{{ url('/logout') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-signs-11"></div>
                                </div>
                                <span>Logout</span>
                            </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="desktop-menu menu-side-w menu-activated-on-click">
                    <div class="logo-w">
                        <a class="logo" href="index.html">
                        <img src="{{ asset( 'images/logo/icon.png' ) }}">
                        <div class="logo-label">OGN</div>
                    </a>
                    </div>
                    <div class="menu-and-user">
                        <div class="logged-user-w">
                            <div class="logged-user-i">
                                <div class="avatar-w"><img alt="" src="{{ asset( 'images/avatar.jpg' ) }}"></div>
                                    <div class="logged-user-info-w">
                                        <div class="logged-user-name">{{ auth()->user()->name }} {{ auth()->user()->surname }}</div>
                                        <div class="logged-user-role">LEVEL {{ $level }}</div>
                                    </div>
                                    <div class="logged-user-menu">
                                        <div class="logged-user-avatar-info">
                                            <div class="avatar-w"><img alt="" src="{{ asset( 'images/avatar.jpg' ) }}"></div>
                                                <div class="logged-user-info-w">
                                                    <div class="logged-user-name">{{ auth()->user()->name }} {{ auth()->user()->surname }}</div>
                                                    <div class="logged-user-role">LEVEL {{ $level }}</div>
                                                </div>
                                            </div>
                                            <div class="bg-icon"><i class="os-icon os-icon-wallet-loaded"></i></div>
                                            <ul>
                                                <li><a href="{{ url('/logout') }}"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <ul class="main-menu">
                                    <li>
                                        <a href="{{ url('/home') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-window-content"></div>
                                </div>
                                <span>Dashboard</span>
                            </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/wallet') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-wallet-loaded"></div>
                                </div>
                                <span>Wallet</span>
                            </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/transactions') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-hierarchy-structure-2"></div>
                                </div>
                                <span>Transactions</span>
                            </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/profile') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-user-male-circle"></div>
                                </div>
                                <span>Profile</span>
                            </a>
                                    </li>
                                    <!-- Start of admin -->
                                    @if ( auth()->user()->hasRole('admin') )
                                    <li>
                                        <a href="{{ url('/block') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-user-male-circle"></div>
                                </div>
                                <span>Block</span>
                            </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/member') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-user-male-circle"></div>
                                </div>
                                <span>New Member</span>
                            </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/donation') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-hierarchy-structure-2"></div>
                                </div>
                                <span>Admin Donations</span>
                            </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/settings') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-ui-46"></div>
                                </div>
                                <span>Settings</span>
                            </a>
                                    </li>
                                    @endif

                                    <!-- end of admin -->
                                    <li>
                                        <a href="{{ url('/logout') }}">
                                <div class="icon-w">
                                    <div class="os-icon os-icon-signs-11"></div>
                                </div>
                                <span>Logout</span>
                            </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="content-w">

                            <div class="content-panel-toggler">
                                <i class="os-icon os-icon-grid-squares-22"></i>
                                <span>Sidebar</span>
                            </div>
                            <div class="content-i">
                                <div class="content-box">
                                    <div class="row">
                                        <div class="container">
                                            @include('flash::message')
                                        </div>
                                    </div>
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="display-type"></div>
                    <div class="modal" id="funds_withdrawal" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Funds Withdrawal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Funds can only be withdrawn once, any of your contributions have matured.</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <script src="{{ asset( 'js/backend.js' ) }}"></script>
                @yield('js')
</body>

</html>
