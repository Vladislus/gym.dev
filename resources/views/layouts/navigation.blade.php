<style>
    /* resources/css/app.css */

    .navigation {
        background-color: #000;
        padding: 10px 0;
        margin-bottom: 50px;
        position: sticky;
        top: 0;
        width: 100%;
        z-index: 10;
    }

    .navigation ul {
        list-style: none;
        display: flex;
        justify-content: center;
        margin: 0;
        padding: 0;
    }

    .navigation ul li {
        margin: 0 10px;
        position: relative;
    }

    .navigation ul li a {
        color: #FFD700;
        text-decoration: none;
        font-weight: bold;
        position: relative;
    }

    .navigation ul li a:hover {
        color: white;
    }

    .navigation ul li a::before {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #FFD700;
        transform: scaleX(0);
        transition: transform 0.3s ease-in-out;
    }

    .navigation ul li a:hover::before {
        transform: scaleX(1);
    }

    .navigation ul li a.logout-link {
        color: #FFD700;
        text-decoration: none;
        font-weight: bold;
        position: relative;
    }

    .navigation ul li a.logout-link:hover {
        color: white;
    }

    .navigation ul li a.logout-link::before {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #FFD700;
        transform: scaleX(0);
        transition: transform 0.3s ease-in-out;
    }

    .navigation ul li a.logout-link:hover::before {
        transform: scaleX(1);
    }

    .btn-izlogoties {
        background-color: #FFD700;
        color: #000;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
    }

    .btn-izlogoties:hover {
        background-color: #000;
        color: #FFD700;
    }

    /* Submenu styles */

    .navigation .submenu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #000;
        padding: 10px;
    }

    .navigation ul li:hover > .submenu {
        display: block;
    }

    .navigation .submenu li {
        margin: 10px 0;
    }

    .navigation .submenu li a {
        color: #FFD700;
        text-decoration: none;
        font-weight: bold;
        position: relative;
    }

    .navigation .submenu li a:hover {
        color: white;
    }

    .navigation .submenu li a::before {
        content: "";
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #FFD700;
        transform: scaleX(0);
        transition: transform 0.3s ease-in-out;
    }

    .navigation .submenu li a:hover::before {
        transform: scaleX(1);
    }
</style>

<nav class="navigation">
    <ul>
        <li><a href="{{ route('home') }}">Sākums</a></li>
        <li>
            <a href="{{ route('competitions.all') }}">Kalendārs</a>
            <ul class="submenu">
                <li><a href="{{ route('competitions.create') }}">Izveidot jaunas</a></li>
            </ul>
        </li>
        <li><a href="#">Reitings</a></li>
        <li><a href="#">Profils</a></li>
        <li>
            <form id="post-link" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <a href="#" onclick="event.preventDefault(); document.getElementById('post-link').submit();">Izlogoties</a>
            </form>
        </li>
    </ul>
</nav>