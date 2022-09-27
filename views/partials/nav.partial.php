<header>
<div class="container">

        <h2 class="logo">WFFLIX</h2>

    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/courses">Courses</a></li>
            <li><a href="/contact">Contact</a></li>
            <?php
                if (Auth::isLoggedIn()) {
					echo '<li><a href="/profile">Profiel</a></li>';
                    echo '<li><a href="/logout">Uitloggen</a></li>';
                    
                }
                else {
                    echo '<li><a href="/login">Inloggen</a></li>';
                }
            ?>
            <?php
            if (Auth::isAdmin()) {
                echo '<li><a href="/admin">Admin modus</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>
</header>
