<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=Request::buildUri( '/')?>"><h2 class="logo">WFFLIX</h2></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?=(Request::uri() === "") ? 'active' : ''?>" href="<?=Request::buildUri( '/')?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=(Request::uri() === Request::buildUri( 'courses')) ? 'active' : ''?>" href="<?=Request::buildUri( '/courses')?>">Cursussen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=(Request::uri() === Request::buildUri( 'contact')) ? 'active' : ''?>" href="<?=Request::buildUri( '/contact')?>">Contact</a>
                </li>  <li class="nav-item">
                    <a class="nav-link <?=(Request::uri() === Request::buildUri( 'faq')) ? 'active' : ''?>" href="<?=Request::buildUri( '/faq')?>">FAQ</a>
                </li>
                <?php
                    if (Auth::isLoggedIn()) {
                ?>
                        <li class="nav-item">
                            <a class="nav-link <?=(Request::uri() === Request::buildUri( 'profile')) ? 'active' : ''?>" href="<?=Request::buildUri( '/profile')?>">Profiel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=Request::buildUri( '/logout')?>">Uitloggen</a>
                        </li>
                <?php
                    }
                    else {
                ?>
                        <li class="nav-item">
                            <a class="nav-link <?=(Request::uri() === Request::buildUri( 'login')) ? 'active' : ''?>" href="<?=Request::buildUri( '/login')?>">Inloggen</a>
                        </li>
                <?php
                    }



                    if (Auth::isAdmin() || Auth::isTeacher()) {
                ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=Request::buildUri( '/admin')?>">Admin modus</a>
                        </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>

