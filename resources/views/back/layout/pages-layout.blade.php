<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8"/>
    <title>@yield('pageTitle')</title>

    <!-- Site favicon -->
    <link
        rel="apple-touch-icon"
        sizes="180x180"
        href="/back/vendors/images/apple-touch-icon.png"
    />
    <link
        rel="icon"
        type="image/png"
        sizes="32x32"
        href="/back/vendors/images/favicon-32x32.png"
    />
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="/back/vendors/images/favicon-16x16.png"
    />

    <!-- Mobile Specific Metas -->
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1"
    />

    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"
    />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/core.css"/>
    <link
        rel="stylesheet"
        type="text/css"
        href="/back/vendors/styles/icon-font.min.css"
    />
    <link rel="stylesheet" type="text/css" href="/back/vendors/styles/style.css"/>
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/dist/toastr.min.css"/>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"/>
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({"gtm.start": new Date().getTime(), event: "gtm.js"});
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <!-- End Google Tag Manager -->
    <link rel="stylesheet" href="/extra-assets/ijaboCropTool/ijaboCropTool.min.css">
    <style>
        .swal2-popup{
            font-size: 0.78em !important;
        }
    </style>
    @livewireStyles
    @stack('stylesheets')
</head>
<body>
<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
        <div
            class="search-toggle-icon bi bi-search"
            data-toggle="header_search"
        ></div>
    </div>
    <div class="header-right">
        @livewire('admin-header-profile-info')
    </div>
</div>



<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="/back/vendors/images/deskapp-logo.svg" alt="" class="dark-logo"/>
            <img
                src="/back/vendors/images/deskapp-logo-white.svg"
                alt=""
                class="light-logo"
            />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">

                @if( Route::is('admin.*'))
                    <li>
                        <a href="{{ route('admin.manage-categories.cats-list') }}"
                           class="dropdown-toggle no-arrow {{ Route::is('admin.manage-categories.cat-list') ? 'active' : '' }}">
								<span class="micon dw dw-align-left3"></span
                                ><span class="mtext">Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manage-products.products-list') }}"
                           class="dropdown-toggle no-arrow">
								<span class="micon dw dw-chair"></span
                                ><span class="mtext">Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manage-project-categories.project-categories-list') }}"
                           class="dropdown-toggle no-arrow">
								<span class="micon dw dw-align-center"></span
                                ><span class="mtext">Project Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manage-projects.projects-list') }}"
                           class="dropdown-toggle no-arrow">
								<span class="micon dw dw-folder"></span
                                ><span class="mtext">Project</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manage-news.news-list') }}"
                           class="dropdown-toggle no-arrow">
								<span class="micon dw dw-newspaper-1"></span
                                ><span class="mtext">News</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manage-users.users-list') }}"
                           class="dropdown-toggle no-arrow">
								<span class="micon dw dw-user1"></span
                                ><span class="mtext">Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manage-orders.orders-list') }}"
                           class="dropdown-toggle no-arrow">
								<span class="micon dw dw-invoice-1"></span
                                ><span class="mtext">Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manage-contact.contact-list') }}"
                           class="dropdown-toggle no-arrow">
								<span class="micon dw dw-phone-call"></span
                                ><span class="mtext">Contact</span>
                        </a>
                    </li>
{{--                    <li>--}}
{{--                        <a href="invoice.html" class="dropdown-toggle no-arrow">--}}
{{--								<span class="micon bi bi-receipt-cutoff"></span--}}
{{--                                ><span class="mtext">Invoice</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <div class="sidebar-small-cap">Settings</div>
                    </li>
                    <li>
                        <a
                            href="{{route('admin.profile')}}"
                            class="dropdown-toggle no-arrow {{ Route::is('admin.profile') ? 'active' : '' }}"
                        >
                            <span class="micon fa fa-user"></span>
                            <span class="mtext"
                            >Profile
									</span>
                        </a>
                    </li>
                    <li>
                        <a
                            href="{{route('admin.settings')}}"
                            class="dropdown-toggle no-arrow {{ Route::is('admin.settings') ? 'active' : '' }}"
                        >
                            <span class="micon icon-copy fi-widget"></span>
                            <span class="mtext"
                            >Settings
									</span>
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('admin.home') }}" class="dropdown-toggle no-arrow {{ Route::is('admin.home') ? 'active' : '' }}">
								<span class="micon fa fa-home"></span
                                ><span class="mtext">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manage-categories.cats-list') }}"
                           class="dropdown-toggle no-arrow {{ Route::is('admin.manage-categories.cats-list') ? 'active' : '' }}">
								<span class="micon dw dw-align-left3"></span
                                ><span class="mtext">Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manage-products.products-list') }}"
                           class="dropdown-toggle no-arrow">
								<span class="micon dw dw-chair"></span
                                ><span class="mtext">Product</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.manage-projects.projects-list') }}"
                           class="dropdown-toggle no-arrow">
								<span class="micon dw dw-folder"></span
                                ><span class="mtext">Project</span>
                        </a>
                    </li>
                    <li>
                        <a href="invoice.html" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-receipt-cutoff"></span
                                ><span class="mtext">Invoice</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <div class="sidebar-small-cap">Settings</div>
                    </li>
                    <li>
                        <a
                            href=""
                            class="dropdown-toggle no-arrow {{ \Illuminate\Support\Facades\Route::is('admin.profile') ? 'active' : '' }}"
                        >
                            <span class="micon fa fa-user"></span>
                            <span class="mtext"
                            >Profile
                            </span>
                        </a>
                    </li>
                @endif

            </ul>
        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div>
                @yield('content')
            </div>
        </div>
    </div>
</div>
<!-- js -->
<script src="/back/vendors/scripts/core.js"></script>
<script src="/back/vendors/scripts/script.min.js"></script>
<script src="/back/vendors/scripts/process.js"></script>
<script src="/back/vendors/scripts/layout-settings.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4"></script>
<script>
    if(navigator.userAgent.indexOf("Firefox") != -1){
        history.pushState(null, null, document.URL);
        window.addEventListener('popstate',function (){
            history.pushState(null, null, document.URL);
        })
    }
</script>
<script src="/extra-assets/ijaboCropTool/ijaboCropTool.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    window.addEventListener('showToastr', function (event){
        toastr.remove();
        if(event.detail.type === 'info'){toastr.info(event.detail.message);}
        else if(event.detail.type === 'success'){toastr.success(event.detail.message);}
        else if(event.detail.type === 'error'){toastr.error(event.detail.message);}
        else if(event.detail.type === 'warning'){toastr.warning(event.detail.message);}
        else {return false;}
    })
</script>
<!-- Google Tag Manager (noscript) -->
@livewireScripts
@stack('scripts')
</body>
</html>
