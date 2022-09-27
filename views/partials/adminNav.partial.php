
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?=Request::buildUri( '/admin')?>"><h2 class="logo">WFFLIX</h2></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?=(Request::uri() === Request::buildUri( 'admin')) ? 'active' : ''?>" href="<?=Request::buildUri( '/admin')?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=(Request::uri() === Request::buildUri( 'admin/users')) ? 'active' : ''?>" href="<?=Request::buildUri( '/admin/users')?>">Gebruikers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=(Request::uri() === Request::buildUri( 'admin/videos')) ? 'active' : ''?>" href="<?=Request::buildUri( '/admin/videos')?>">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?=(Request::uri() === Request::buildUri( 'admin/categories')) ? 'active' : ''?>" href="<?=Request::buildUri( '/admin/categories')?>">Categorieën</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=Request::buildUri( '/logout')?>">Uitloggen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=Request::buildUri( '/')?>">Sluit Admin</a>
                </li>
            </ul>
        </div>
    </div>
</nav>