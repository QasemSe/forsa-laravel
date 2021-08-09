<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forsa - found training</title>
    <link rel="stylesheet" href="{{ asset('frontend/fonts/teshrin/teshrin.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/fontawesome/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/feather/feather.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/theme.css') }}">

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a href="#" class="navbar-brand me-md-6">
            <img src="{{ asset('frontend/img/brand.svg') }}" width="70" alt="Forsa">
        </a>
        <!-- /.navbar-brand -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">About Us</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Our App</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">Contact Us</a>
                </li>
            </ul>
            <!-- /.navbar-nav -->
        </div>
        <!-- /.collapse -->
        <div class="navbar-buttons">
            <a href="{{ route('login') }}" class="btn btn-primary">User Login</a>
            <a href="{{ route('showCompanyLogin') }}" class="btn btn-primary">Company Login</a>
{{--            <a href="#" class="ms-4 fw-bold small">AR</a>--}}
        </div>
        <!-- /.navbar-buttons -->
    </div>
    <!-- /.container -->
</nav>

<section class="py-md-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-md-5 col-lg-6 order-md-2 mt-5 mt-md-0">
                <img src="{{ asset('frontend/img/phone.png') }}" class="img-fluid" alt="Forsa App">
            </div>
            <div class="col-12 col-md-7 col-lg-6 text-center text-md-start mt-5 mt-md-0">
                <h1 class="display-4"><span class="text-primary">Forsa</span> To Found Training</h1>
                <p class="lead text-muted mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid asperiores explicabo itaque repellat suscipit voluptatibus?</p>
                <a href="#" class="btn btn-lg btn-outline-primary mt-4"><i class="fab fa-google-play me-2 "></i>Download From Google Play</a>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<section class="py-5 bg-primary text-white mt-6 mt-md-0">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 text-center my-2 my-md-0">
                <div class="mb-2">
                        <span class="svg-icon svg-icon-light svg-icon-4x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                        </span>
                </div>
                <h4 class="h1">1.6K</h4>
                <p class="text-white-50">Users</p>
            </div>
            <div class="col-12 col-md-4 text-center my-2 my-md-0">
                <div class="mb-2">
                        <span class="svg-icon svg-icon-light svg-icon-4x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="#000000" />
                                    <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1" />
                                    <path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                        </span>
                </div>
                <h4 class="h1">214</h4>
                <p class="text-white-50">Companies</p>
            </div>
            <div class="col-12 col-md-4 text-center my-2 my-md-0">
                <div class="mb-2">
                        <span class="svg-icon svg-icon-light svg-icon-4x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M2,13 C2,12.5 2.5,12 3,12 C3.5,12 4,12.5 4,13 C4,13.3333333 4,15 4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 C2,15 2,13.3333333 2,13 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 8.000000) rotate(-180.000000) translate(-12.000000, -8.000000) " x="11" y="1" width="2" height="14" rx="1" />
                                    <path d="M7.70710678,15.7071068 C7.31658249,16.0976311 6.68341751,16.0976311 6.29289322,15.7071068 C5.90236893,15.3165825 5.90236893,14.6834175 6.29289322,14.2928932 L11.2928932,9.29289322 C11.6689749,8.91681153 12.2736364,8.90091039 12.6689647,9.25670585 L17.6689647,13.7567059 C18.0794748,14.1261649 18.1127532,14.7584547 17.7432941,15.1689647 C17.3738351,15.5794748 16.7415453,15.6127532 16.3310353,15.2432941 L12.0362375,11.3779761 L7.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000004, 12.499999) rotate(-180.000000) translate(-12.000004, -12.499999) " />
                                </g>
                            </svg>
                        </span>
                </div>
                <h4 class="h1">5.2K</h4>
                <p class="text-white-50">Downloads</p>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>

<section class="py-8">
    <div class="container">
        <div class="row">
            <div class="col-md-2 d-flex justify-content-center order-md-2 mb-5 mb-md-0">
                <div class="phone-slider">
                    <img src="{{ asset('frontend/img/smartphone_2.png') }}" alt="Smartphone" width="100%">

                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ asset('frontend/img/sample.jpg') }}" alt="sample" width="100%">
                            </div>
                        </div>
                        <!-- /.swiper-wrapper -->
                    </div>
                    <!-- /.swiper-container -->
                </div>
                <!-- /.phone-slider -->
            </div>

            <div class="col-md-5 order-md-1 d-flex flex-column justify-content-md-center">
                <div class="d-flex flex-column align-items-center flex-md-row-reverse align-items-md-start">
                        <span class="svg-icon svg-icon-secondary svg-icon-2x mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <rect fill="#000000" opacity="0.3" x="2" y="2" width="20" height="20" rx="10" />
                                    <path d="M6.16794971,14.5547002 C5.86159725,14.0951715 5.98577112,13.4743022 6.4452998,13.1679497 C6.90482849,12.8615972 7.52569784,12.9857711 7.83205029,13.4452998 C8.9890854,15.1808525 10.3543313,16 12,16 C13.6456687,16 15.0109146,15.1808525 16.1679497,13.4452998 C16.4743022,12.9857711 17.0951715,12.8615972 17.5547002,13.1679497 C18.0142289,13.4743022 18.1384028,14.0951715 17.8320503,14.5547002 C16.3224187,16.8191475 14.3543313,18 12,18 C9.64566871,18 7.67758127,16.8191475 6.16794971,14.5547002 Z" fill="#000000" />
                                </g>
                            </svg>
                        </span>
                    <div class="me-2 text-center text-md-end">
                        <h4 class="fw-bold mb-1">Featured Title</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut, facilis.</p>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center flex-md-row-reverse align-items-md-start">
                        <span class="svg-icon svg-icon-secondary svg-icon-2x mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M7.14319965,19.3575259 C7.67122143,19.7615175 8.25104409,20.1012165 8.87097532,20.3649307 L7.89205065,22.0604779 C7.61590828,22.5387706 7.00431787,22.7026457 6.52602525,22.4265033 C6.04773263,22.150361 5.88385747,21.5387706 6.15999985,21.0604779 L7.14319965,19.3575259 Z M15.1367085,20.3616573 C15.756345,20.0972995 16.3358198,19.7569961 16.8634386,19.3524415 L17.8320512,21.0301278 C18.1081936,21.5084204 17.9443184,22.1200108 17.4660258,22.3961532 C16.9877332,22.6722956 16.3761428,22.5084204 16.1000004,22.0301278 L15.1367085,20.3616573 Z" fill="#000000" />
                                    <path d="M12,21 C7.581722,21 4,17.418278 4,13 C4,8.581722 7.581722,5 12,5 C16.418278,5 20,8.581722 20,13 C20,17.418278 16.418278,21 12,21 Z M19.068812,3.25407593 L20.8181344,5.00339833 C21.4039208,5.58918477 21.4039208,6.53893224 20.8181344,7.12471868 C20.2323479,7.71050512 19.2826005,7.71050512 18.696814,7.12471868 L16.9474916,5.37539627 C16.3617052,4.78960984 16.3617052,3.83986237 16.9474916,3.25407593 C17.5332781,2.66828949 18.4830255,2.66828949 19.068812,3.25407593 Z M5.29862906,2.88207799 C5.8844155,2.29629155 6.83416297,2.29629155 7.41994941,2.88207799 C8.00573585,3.46786443 8.00573585,4.4176119 7.41994941,5.00339833 L5.29862906,7.12471868 C4.71284263,7.71050512 3.76309516,7.71050512 3.17730872,7.12471868 C2.59152228,6.53893224 2.59152228,5.58918477 3.17730872,5.00339833 L5.29862906,2.88207799 Z" fill="#000000" opacity="0.3" />
                                    <path d="M11.9630156,7.5 L12.0475062,7.5 C12.3043819,7.5 12.5194647,7.69464724 12.5450248,7.95024814 L13,12.5 L16.2480695,14.3560397 C16.403857,14.4450611 16.5,14.6107328 16.5,14.7901613 L16.5,15 C16.5,15.2109164 16.3290185,15.3818979 16.1181021,15.3818979 C16.0841582,15.3818979 16.0503659,15.3773725 16.0176181,15.3684413 L11.3986612,14.1087258 C11.1672824,14.0456225 11.0132986,13.8271186 11.0316926,13.5879956 L11.4644883,7.96165175 C11.4845267,7.70115317 11.7017474,7.5 11.9630156,7.5 Z" fill="#000000" />
                                </g>
                            </svg>
                        </span>
                    <div class="me-2 text-center text-md-end">
                        <h4 class="fw-bold mb-1">Lorem ipsum</h4>
                        <p>Paragraph of text beneath the heading to explain the heading.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 order-md-3 d-flex flex-column justify-content-md-center">
                <div class="d-flex flex-column align-items-center flex-md-row align-items-md-start">
                        <span class="svg-icon svg-icon-secondary svg-icon-2x mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3" />
                                    <path d="M11.1750002,14.75 C10.9354169,14.75 10.6958335,14.6541667 10.5041669,14.4625 L8.58750019,12.5458333 C8.20416686,12.1625 8.20416686,11.5875 8.58750019,11.2041667 C8.97083352,10.8208333 9.59375019,10.8208333 9.92916686,11.2041667 L11.1750002,12.45 L14.3375002,9.2875 C14.7208335,8.90416667 15.2958335,8.90416667 15.6791669,9.2875 C16.0625002,9.67083333 16.0625002,10.2458333 15.6791669,10.6291667 L11.8458335,14.4625 C11.6541669,14.6541667 11.4145835,14.75 11.1750002,14.75 Z" fill="#000000" />
                                </g>
                            </svg>
                        </span>
                    <div class="ms-2 text-center text-md-start">
                        <h4 class="fw-bold mb-1">Most Secure</h4>
                        <p>Paragraph of text beneath the heading to explain the heading.</p>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center flex-md-row align-items-md-start">
                        <span class="svg-icon svg-icon-secondary svg-icon-2x mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z" fill="#000000" />
                                    <path d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z" fill="#000000" opacity="0.3" />
                                </g>
                            </svg>
                        </span>
                    <div class="ms-2 text-center text-md-start">
                        <h4 class="fw-bold mb-1">Updates Forever</h4>
                        <p>Paragraph of text beneath the heading to explain the heading.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>

<section class="mb-8">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="px-6 py-5 rounded-3 shadow-lg">
                    <h2 class="text-primary mb-5">Contact Us</h2>
                    <form action="">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nameInput" placeholder="Name">
                            <label for="nameInput">
                                <i class="feather icon-user me-2"></i>Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="emailInput" placeholder="Email">
                            <label for="nameInput">
                                <i class="feather icon-mail me-2"></i>
                                Email
                            </label>
                        </div>
                        <div class="form-floating mb-5">
                            <textarea class="form-control" placeholder="Message" id="floatingTextarea2" style="height: 100px"></textarea>
                            <label for="floatingTextarea2">
                                <i class="feather icon-paperclip me-2"></i>
                                Message
                            </label>
                        </div>

                        <button type="submit" class="form-control btn btn-primary">
                            <i class="feather icon-send me-2"></i>
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 ps-lg-6 mt-6 mt-lg-0">
                <div class="mb-5">
                    <h3>Hi there! Lorem ipsum dolor.</h3>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus id nisi quibusdam quisquam veniam voluptates? Asperiores deserunt in omnis quisquam.</p>
                </div>
                <div>
                    <div class="d-flex align-items-center text-primary mb-3">
                        <div class="border border-primary rounded-pill p-3 me-3">
                            <i class="fs-5 feather icon-phone-call btn-circle"></i>
                        </div>
                        <div>
                            <p class="mb-1 opacity-75">Company phone</p>
                            <h5 class="mb-0">+970597666666</h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center text-primary mb-3">
                        <div class="border border-primary rounded-pill p-3 me-3">
                            <i class="fs-5 feather icon-mail btn-circle"></i>
                        </div>
                        <div>
                            <p class="mb-1 opacity-75">Email address</p>
                            <h5 class="mb-0">example@email.com</h5>
                        </div>
                    </div>
                    <div class="d-flex align-items-center text-primary">
                        <div class="border border-primary rounded-pill p-3 me-3">
                            <i class="fs-5 feather icon-map-pin btn-circle"></i>
                        </div>
                        <div>
                            <p class="mb-1 opacity-75">Company location</p>
                            <h5 class="mb-0">Palestine, gaza</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>

<footer class="bg-primary py-5 text-white text-center">
    <div class="container ">
        <div>
            <img src="{{ asset('frontend/img/brand-reverse.svg') }}" alt="Forsa Brand" width="80">
        </div>
        <div class="social-icons d-flex justify-content-center my-4">
            <a href="#"><i class="fab fa-facebook-f text-white me-4"></i></a>
            <a href="#"><i class="fab fa-twitter text-white me-4"></i></a>
            <a href="#"><i class="fab fa-dribbble text-white me-4"></i></a>
            <a href="#"><i class="fab fa-youtube text-white"></i></a>
        </div>
    </div>
    <!-- /.container -->
    <p class="fw-lighter mb-0 opacity-75">All Rights Reserved <b>Forsa</b> &copy; 2021</p>
</footer>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper('.swiper-container', {
        grabCursor: true,
        loop: true,
        resistanceRatio: 0,
        autoplay: {
            delay: 5000,
        }
    })
</script>
</body>

</html>
