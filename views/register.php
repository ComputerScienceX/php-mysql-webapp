
<!DOCTYPE html>
<html lang="en" data-theme="light"  data-sidebar-behaviour="fixed" data-navigation-color="inverted" data-is-fluid="true">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="Webinning" name="author">
        
            <!-- Theme CSS -->
            <link rel="stylesheet" href="/assets/css/theme.bundle.css" id="stylesheetLTR">
            <link rel="stylesheet" href="/assets/css/theme.rtl.bundle.css" id="stylesheetRTL">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap">
        <link rel="stylesheet" media="print" onload="this.onload=null;this.removeAttribute('media');" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap">
        
        <!-- no-JS fallback -->
        <noscript>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap">
        </noscript>


        <style>
            video {
  max-width: 100%;
  height: auto;
}
            </style>

        
        <script>
         // Theme switcher
        
            let themeSwitcher = document.getElementById('themeSwitcher');
        
            const getPreferredTheme = () => {
                if (localStorage.getItem('theme') != null) {
                    return localStorage.getItem('theme');
                }
        
                return document.documentElement.dataset.theme;
            };
        
            const setTheme = function (theme) {
                if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.dataset.theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                } else {
                    document.documentElement.dataset.theme = theme;
                }
        
                localStorage.setItem('theme', theme);
            };
        
            const showActiveTheme = theme => {
                const activeBtn = document.querySelector(`[data-theme-value="${theme}"]`);
        
                document.querySelectorAll('[data-theme-value]').forEach(element => {
                    element.classList.remove('active');
                });
        
                activeBtn && activeBtn.classList.add('active');
        
             // Set button if demo mode is enabled
                document.querySelectorAll('[data-theme-control="theme"]').forEach(element => {
                    if (element.value == theme) {
                        element.checked = true;
                    }
                });
            };
        
            function reloadPage() {
                window.location = window.location.pathname;
            }
        
        
            setTheme(getPreferredTheme());
        
            if(typeof themeSwitcher != 'undefined') {
                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                    if(localStorage.getItem('theme') != null) {
                        if (localStorage.getItem('theme') == 'auto') {
                            reloadPage();
                        }
                    }
                });
        
                window.addEventListener('load', () => {
                    showActiveTheme(getPreferredTheme());
                    
                    document.querySelectorAll('[data-theme-value]').forEach(element => {
                        element.addEventListener('click', () => {
                            const theme = element.getAttribute('data-theme-value');
        
                            localStorage.setItem('theme', theme);
                            reloadPage();
                        })
                    })
                });
            }
        </script>
        <!-- Favicon -->
        <link rel="icon" href="./assets/favicon/favicon.ico" sizes="any">
        
            <!-- Demo script -->
            <script>
                var themeConfig = {
                    theme: JSON.parse('"light"'),
                    isRTL: JSON.parse('false'),
                    isFluid: JSON.parse('true'),
                    sidebarBehaviour: JSON.parse('"fixed"'),
                    navigationColor: JSON.parse('"inverted"')
                };
                
                var isRTL = localStorage.getItem('isRTL') === 'true',
                    isFluid = localStorage.getItem('isFluid') === 'true',
                    theme = localStorage.getItem('theme'),
                    sidebarSizing = localStorage.getItem('sidebarSizing'),
                    linkLTR = document.getElementById('stylesheetLTR'),
                    linkRTL = document.getElementById('stylesheetRTL'),
                    html = document.documentElement;
        
                if (isRTL) {
                    linkLTR.setAttribute('disabled', '');
                    linkRTL.removeAttribute('disabled');
                    html.setAttribute('dir', 'rtl');
                } else {
                    linkRTL.setAttribute('disabled', '');
                    linkLTR.removeAttribute('disabled');
                    html.removeAttribute('dir');
                }
            </script>
        
        <!-- Page Title -->
        <title>Dashboard | Dashly</title>
    </head>
    
    <body>

            <!-- THEME CONFIGURATION -->
            <script>
                let themeAttrs = document.documentElement.dataset;
            
                for(let attr in themeAttrs) {
                    if(localStorage.getItem(attr) != null) {
                        document.documentElement.dataset[attr] = localStorage.getItem(attr);
            
                        if (theme === 'auto') {
                            document.documentElement.dataset.theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
            
                            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
                                e.matches ? document.documentElement.dataset.theme = 'dark' : document.documentElement.dataset.theme = 'light';
                            });
                        }
                    }
                }
            </script>
        <!-- NAVIGATION -->
        <nav id="mainNavbar" class="navbar navbar-vertical navbar-expand-lg scrollbar bg-dark navbar-dark">
            
            <!-- Theme configuration (navbar) -->
                <script>
                    let navigationColor = localStorage.getItem('navigationColor'),
                        navbar = document.getElementById('mainNavbar');
                
                    if(navigationColor != null && navbar != null) {
                        if(navigationColor == 'inverted') {
                            navbar.classList.add('bg-dark', 'navbar-dark');
                            navbar.classList.remove('bg-white', 'navbar-light');
                        } else {
                            navbar.classList.add('bg-white', 'navbar-light');
                            navbar.classList.remove('bg-dark', 'navbar-dark');
                        }
                    }
                </script>    
            <div class="container-fluid">
                
                <!-- Brand -->
                <div class="navbar-brand" style="color:gold;" href="/index.php">
              <!--      <img src="/assets/images/logo-small.svg" class="navbar-brand-img logo-light logo-small" alt="..." width="19" height="25">
                    <img src="/assets/images/logo.svg" class="navbar-brand-img logo-light logo-large" alt="..." width="125" height="25">
        
                    <img src="/assets/images/logo-dark-small.svg" class="navbar-brand-img logo-dark logo-small" alt="..." width="19" height="25">
                    <img src="/assets/images/logo-dark.svg" class="navbar-brand-img logo-dark logo-large" alt="..." width="125" height="25">
                -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
            <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15"/>
          </svg>&nbsp<strong>ComputerScienceX.com</strong>

                </div>
        
                <!-- Navbar toggler -->
                <a href="javascript: void(0);" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#sidenavCollapse" aria-controls="sidenavCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </a>
        
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenavCollapse">
        
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-lg-7">
        
        
                        <li class="nav-item">
                            <a href="/pages/free-content.php" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="nav-link-icon" height="18" width="18"><path d="M22.627 14.87 15 22.5l-3.75.75.75-3.75 7.631-7.63a2.113 2.113 0 0 1 2.991 0l.009.008a2.116 2.116 0 0 1-.004 2.992zM8.246 20.25h-6a1.5 1.5 0 0 1-1.5-1.5V2.25a1.5 1.5 0 0 1 1.5-1.5h15a1.5 1.5 0 0 1 1.5 1.5V9m-10.5-3.75h6m-9 4.5h9m-9 4.5h7.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                                <span>FREE CONTENT</span>
                                <span class="badge text-bg-success rounded-pill ms-auto">FREE</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pages/paid-content.php" class="nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="nav-link-icon" height="18" width="18"><path d="M22.627 14.87 15 22.5l-3.75.75.75-3.75 7.631-7.63a2.113 2.113 0 0 1 2.991 0l.009.008a2.116 2.116 0 0 1-.004 2.992zM8.246 20.25h-6a1.5 1.5 0 0 1-1.5-1.5V2.25a1.5 1.5 0 0 1 1.5-1.5h15a1.5 1.5 0 0 1 1.5 1.5V9m-10.5-3.75h6m-9 4.5h9m-9 4.5h7.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/></svg>
                                <span>PREMIUM CONTENT</span>
                                <span class="badge text-bg-info rounded-pill ms-auto">PREMIUM</span>
                            </a>
                        </li>
        
        
                    </ul>
                    <!-- End of Navigation -->

                    <?php if ($_SESSION['premium_status'] !== 1){
                            echo '<div class="help-box rounded-3 py-5 px-4 text-center mt-auto">
                            <img src="/assets/images/illustrations/upgrade-illustration.svg" alt="..." class="img-fluid mb-4" width="160" height="160">    
                            <h6>Upgrade to explore<br> <span class="emphasize">premium</span> features</h6>
                            
                            <!-- Button -->
                            <a class="btn w-100 btn-sm btn-primary" href="/premium.php">Upgrade to Premium</a>
                        </div>';
                        } ?>
                </div>
                <!-- End of Collapse -->
            </div>
        </nav>
        <!-- MAIN CONTENT -->
        <main>

            <!-- HEADER -->
            <header class="container-fluid d-flex py-6 mb-4">
            
            
                <!-- Top buttons -->
                <div class="d-flex align-items-center ms-auto me-n1 me-lg-n2">
            
                    <!-- Dropdown -->
                    <div class="dropdown" id="themeSwitcher">
                        <a href="javascript: void(0);" class="dropdown-toggle no-arrow d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px link-secondary" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,0">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" height="18" width="18"><g><path d="M12,4.64A7.36,7.36,0,1,0,19.36,12,7.37,7.37,0,0,0,12,4.64Zm0,12.72A5.36,5.36,0,1,1,17.36,12,5.37,5.37,0,0,1,12,17.36Z" style="fill: currentColor"/><path d="M12,3.47a1,1,0,0,0,1-1V1a1,1,0,0,0-2,0V2.47A1,1,0,0,0,12,3.47Z" style="fill: currentColor"/><path d="M4.55,6a1,1,0,0,0,.71.29A1,1,0,0,0,6,6,1,1,0,0,0,6,4.55l-1-1A1,1,0,0,0,3.51,4.93Z" style="fill: currentColor"/><path d="M2.47,11H1a1,1,0,0,0,0,2H2.47a1,1,0,1,0,0-2Z" style="fill: currentColor"/><path d="M4.55,18l-1,1a1,1,0,0,0,0,1.42,1,1,0,0,0,.71.29,1,1,0,0,0,.71-.29l1-1A1,1,0,0,0,4.55,18Z" style="fill: currentColor"/><path d="M12,20.53a1,1,0,0,0-1,1V23a1,1,0,0,0,2,0V21.53A1,1,0,0,0,12,20.53Z" style="fill: currentColor"/><path d="M19.45,18A1,1,0,0,0,18,19.45l1,1a1,1,0,0,0,.71.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.42Z" style="fill: currentColor"/><path d="M23,11H21.53a1,1,0,0,0,0,2H23a1,1,0,0,0,0-2Z" style="fill: currentColor"/><path d="M18.74,6.26A1,1,0,0,0,19.45,6l1-1a1,1,0,1,0-1.42-1.42l-1,1A1,1,0,0,0,18,6,1,1,0,0,0,18.74,6.26Z" style="fill: currentColor"/></g></svg>
                        </a>
            
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <button type="button" class="dropdown-item active" data-theme-value="light">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="me-2" height="18" width="18"><g><path d="M12,4.64A7.36,7.36,0,1,0,19.36,12,7.37,7.37,0,0,0,12,4.64Zm0,12.72A5.36,5.36,0,1,1,17.36,12,5.37,5.37,0,0,1,12,17.36Z" style="fill: currentColor"/><path d="M12,3.47a1,1,0,0,0,1-1V1a1,1,0,0,0-2,0V2.47A1,1,0,0,0,12,3.47Z" style="fill: currentColor"/><path d="M4.55,6a1,1,0,0,0,.71.29A1,1,0,0,0,6,6,1,1,0,0,0,6,4.55l-1-1A1,1,0,0,0,3.51,4.93Z" style="fill: currentColor"/><path d="M2.47,11H1a1,1,0,0,0,0,2H2.47a1,1,0,1,0,0-2Z" style="fill: currentColor"/><path d="M4.55,18l-1,1a1,1,0,0,0,0,1.42,1,1,0,0,0,.71.29,1,1,0,0,0,.71-.29l1-1A1,1,0,0,0,4.55,18Z" style="fill: currentColor"/><path d="M12,20.53a1,1,0,0,0-1,1V23a1,1,0,0,0,2,0V21.53A1,1,0,0,0,12,20.53Z" style="fill: currentColor"/><path d="M19.45,18A1,1,0,0,0,18,19.45l1,1a1,1,0,0,0,.71.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.42Z" style="fill: currentColor"/><path d="M23,11H21.53a1,1,0,0,0,0,2H23a1,1,0,0,0,0-2Z" style="fill: currentColor"/><path d="M18.74,6.26A1,1,0,0,0,19.45,6l1-1a1,1,0,1,0-1.42-1.42l-1,1A1,1,0,0,0,18,6,1,1,0,0,0,18.74,6.26Z" style="fill: currentColor"/></g></svg>
                                    Light mode
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item" data-theme-value="dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="me-2" height="18" width="18"><path d="M19.57,23.34a1,1,0,0,0,0-1.9,9.94,9.94,0,0,1,0-18.88,1,1,0,0,0,.68-.94,1,1,0,0,0-.68-.95A11.58,11.58,0,0,0,8.88,2.18,12.33,12.33,0,0,0,3.75,12a12.31,12.31,0,0,0,5.11,9.79A11.49,11.49,0,0,0,15.61,24,12.55,12.55,0,0,0,19.57,23.34ZM10,20.17A10.29,10.29,0,0,1,5.75,12a10.32,10.32,0,0,1,4.3-8.19A9.34,9.34,0,0,1,15.59,2a.17.17,0,0,1,.17.13.18.18,0,0,1-.07.2,11.94,11.94,0,0,0-.18,19.21.25.25,0,0,1-.16.45A9.5,9.5,0,0,1,10,20.17Z" style="fill: currentColor"/></svg>
                                    Dark mode
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item" data-theme-value="auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="me-2" height="18" width="18"><path d="M24,12a1,1,0,0,0-1-1H19.09a.51.51,0,0,1-.49-.4,6.83,6.83,0,0,0-.94-2.28.5.5,0,0,1,.06-.63l2.77-2.76a1,1,0,1,0-1.42-1.42L16.31,6.28a.5.5,0,0,1-.63.06A6.83,6.83,0,0,0,13.4,5.4a.5.5,0,0,1-.4-.49V1a1,1,0,0,0-2,0V4.91a.51.51,0,0,1-.4.49,6.83,6.83,0,0,0-2.28.94.5.5,0,0,1-.63-.06L4.93,3.51A1,1,0,0,0,3.51,4.93L6.28,7.69a.5.5,0,0,1,.06.63A6.83,6.83,0,0,0,5.4,10.6a.5.5,0,0,1-.49.4H1a1,1,0,0,0,0,2H4.91a.51.51,0,0,1,.49.4,6.83,6.83,0,0,0,.94,2.28.5.5,0,0,1-.06.63L3.51,19.07a1,1,0,1,0,1.42,1.42l2.76-2.77a.5.5,0,0,1,.63-.06,6.83,6.83,0,0,0,2.28.94.5.5,0,0,1,.4.49V23a1,1,0,0,0,2,0V19.09a.51.51,0,0,1,.4-.49,6.83,6.83,0,0,0,2.28-.94.5.5,0,0,1,.63.06l2.76,2.77a1,1,0,1,0,1.42-1.42l-2.77-2.76a.5.5,0,0,1-.06-.63,6.83,6.83,0,0,0,.94-2.28.5.5,0,0,1,.49-.4H23A1,1,0,0,0,24,12Zm-8.74,2.5A5.76,5.76,0,0,1,9.5,8.74a5.66,5.66,0,0,1,.16-1.31A.49.49,0,0,1,10,7.07a5.36,5.36,0,0,1,1.8-.31,5.47,5.47,0,0,1,5.46,5.46,5.36,5.36,0,0,1-.31,1.8.49.49,0,0,1-.35.32A5.53,5.53,0,0,1,15.26,14.5Z" style="fill: currentColor"/></svg>
                                    Auto
                                </button>
                            </li>
                        </ul>
                    </div>
            
                    <!-- Separator -->
                    <div class="vr bg-gray-700 mx-2 mx-lg-3"></div>
            
            
            
                    <!-- Dropdown -->
                    <div class="dropdown">
                        <a href="javascript: void(0);" class="dropdown-toggle no-arrow d-flex align-items-center justify-content-center bg-white rounded-circle shadow-sm mx-1 mx-lg-2 w-40px h-40px" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false" data-bs-offset="0,0">
                            <div class="avatar avatar-circle avatar-sm">
                            <span class="avatar-title text-bg-primary-soft"><?php echo mb_substr($_SESSION['user_name'], 0, 1); ?></span>
                            </div>
                        </a>



                        <div class="dropdown-menu">
                            <div class="dropdown-item-text">
                                <div class="d-flex align-items-center">

                                    <div class="flex-grow-1 ms-3">
                                        <h4 class="mb-0" style="font-size:18px;"><?php echo $_SESSION['user_name']; ?></h4>
                                        <p class="card-text" style="color:green;font-size:18px;"><?php if ($_SESSION['premium_status'] == 1){
                            echo "PREMIUM";
                        }else {
                            echo "FREE" ;
                            echo '<div class="help-box rounded-3 py-5 px-4 text-center mt-auto">
                            <h6>Upgrade to explore<br> <span class="emphasize">premium</span> features</h6>
                            
                            <!-- Button -->
                            <a class="btn w-100 btn-sm btn-primary" href="/premium.php">Upgrade to Premium</a>
                        </div>';
                        } ?></p>
                                    </div>
                                </div>
                            </div>
            
            
            
                            <hr class="dropdown-divider">
            
            
                            <a class="dropdown-item" href="index.php?logout">Sign out</a>
                        </div>
                    </div>
                </div>
            </header>








            <div class="container-fluid">







<div class="card">
    <div class="card-body">
 
    <?php
// show potential errors / feedback (from registration object)
if (isset($registration)) {
    if ($registration->errors) {
        foreach ($registration->errors as $error) {
            echo $error;
        }
    }
    if ($registration->messages) {
        foreach ($registration->messages as $message) {
            echo $message;
        }
    }
}
?>
                 <!-- Title -->
                 <h1 class="mb-2 text-center">
                        Sign Up
                    </h1>














                    <!-- Subtitle -->
                    <p class="text-secondary text-center">
                        Register to access to your account
                    </p>

                    <!-- Form -->
                    <form method="post" action="register.php" name="registerform">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">






                 <!-- Input -->
                                    <input style="color:teal;" id="login_input_username" name="user_name" type="text" class="form-control" placeholder="username" required >
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="mb-4">




                                    <!-- Label -->
                                    <label for="login_input_email" class="form-label">
                                        Email Address
                                    </label>
    
                                    <!-- Input -->
                                    <input style="color:teal;" id="login_input_email" type="email" class="form-control" placeholder="Your email address"  name="user_email" required >
                                </div>
                            </div>
                        </div> <!-- / .row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-4">

                                    <!-- Label -->
                                    <label for="login_input_password_new" class="form-label">
                                    Password (min. 6 characters)
                                    </label>
    
                                    <!-- Input -->
                                    <div class="input-group input-group-merge">
                                        <input style="color:teal;" id="login_input_password_new" type="password" class="form-control" autocomplete="off" data-toggle-password-input placeholder="Your password" name="user_password_new" pattern=".{6,}">
                                        
                                        <button type="button" class="input-group-text px-4 text-secondary link-primary" data-toggle-password></button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-4">


                                    <!-- Label -->
                                    <label for="login_input_password_repeat" class="form-label">
                                        Confirm password
                                    </label>
    
                                    <!-- Input -->
                                    <div class="input-group input-group-merge">
                                        <input style="color:teal;" id="login_input_password_repeat" type="password" name="user_password_repeat" pattern=".{6,}" class="form-control" autocomplete="off" data-toggle-password-input placeholder="Your password again">
                                        
                                        <button type="button" class="input-group-text px-4 text-secondary link-primary" data-toggle-password></button>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- / .row -->



                        <div class="row align-items-center text-center">
                            <div class="col-12">

                                <!-- Button -->

                                <button type="submit" class="btn w-100 btn-primary mt-6 mb-2" name="register" value="Register" >Get started</button>
                            </div>

                            <div class="col-12">

                                <!-- Link -->
                                <small class="mb-0 text-body-secondary">Already registered? <a href="/index.php" class="fw-semibold">Login</a></small>
                            </div>
                        </div> <!-- / .row -->
                    </form>
    </div>
</div>



</div> <!-- / .container-fluid -->












            <!-- Footer-->
            <!-- Footer -->
            <footer class="mt-auto">
                <div class="container-fluid mt-4 mb-6 text-body-secondary">
                    <div class="row justify-content-between">
                        <div class="col">
                            © Dashly. 2025 Webinning.
                        </div>
            
                        <div class="col-auto">
                            v1.6.0
                        </div>
                    </div> <!-- / .row -->
                </div>
            </footer>
            

            
        </main> <!-- / main -->

        <!-- JAVASCRIPT-->
        <!-- Theme JS -->
        <script src="/assets/js/theme.bundle.js"></script>    </body>
</html>