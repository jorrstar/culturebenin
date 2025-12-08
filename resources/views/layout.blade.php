<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            font-family: "Segoe UI", sans-serif;
            background: #eef3fb;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            height: 100vh;
            background: #0f1e54;
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 25px;
            transition: 0.3s ease;
            box-shadow: 2px 0 10px #00000040;
        }

        .sidebar.collapsed { width: 70px; }
        .sidebar.collapsed h2 { opacity: 0; }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #a5c8ff;
            transition: 0.3s;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            text-decoration: none;
            color: white;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: #1a2f7a;
            border-left: 3px solid #3b82f6;
            transform: translateX(5px);
        }

        .sidebar.collapsed a span { display: none; }

        /* Content */
        .content {
            margin-left: 240px;
            transition: 0.3s ease;
            padding: 20px;
        }
        .content.collapsed { margin-left: 70px; }

        /* Topbar */
        .topbar {
            background: #3b82f6;
            color: white;
            padding: 15px 20px;
            font-size: 18px;
            font-weight: bold;
            border-radius: 7px;
            margin-bottom: 20px;
            box-shadow: 0 2px 6px #00000030;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .menu-btn {
            cursor: pointer;
            font-size: 22px;
        }

        /* Profil dropdown */
        #profileDropdown {
            display: none;
            position: absolute;
            right: 20px;
            top: 70px;
            width: 190px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
            padding: 10px;
            z-index: 1000;
        }

        #profileDropdown a {
            display: block;
            padding: 8px;
            text-decoration: none;
            color: #333;
            border-radius: 5px;
        }

        #profileDropdown a:hover {
            background: #f1f1f1;
        }

        /* Card */
        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px #00000020;
        }
    </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
        <h2>Culture Bénin</h2>

        <a href="{{ route('contenus.index') }}"><i class="fa-solid fa-file-lines"></i><span>Contenus</span></a>
        <a href="{{ route('langues.index') }}"><i class="fa-solid fa-language"></i><span>Langues</span></a>
        <a href="{{ route('regions.index') }}"><i class="fa-solid fa-map"></i><span>Régions</span></a>
        <a href="{{ route('utilisateurs.index') }}"><i class="fa-solid fa-users"></i><span>Utilisateurs</span></a>
        <a href="{{ route('typecontenus.index') }}"><i class="fa-solid fa-layer-group"></i><span>Types contenus</span></a>
        <a href="{{ route('typemedias.index') }}"><i class="fa-solid fa-film"></i><span>Types médias</span></a>
        <a href="{{ route('medias.index') }}"><i class="fa-solid fa-photo-film"></i><span>Médias</span></a>
        <a href="{{ route('roles.index') }}"><i class="fa-solid fa-key"></i><span>Rôles</span></a>
    </div>

    <!-- CONTENT -->
    <div class="content" id="content">

        <div class="topbar">
            <span>@yield('title')</span>

            <div style="display:flex; align-items:center; gap:20px;">

                <!-- Photo utilisateur -->
                <div onclick="toggleProfileMenu()" style="cursor:pointer;">
                   @if(Auth::check()) <img 
                        src="{{ Auth::user()->photo ? asset('storage/'.Auth::user()->photo) : 'https://cdn-icons-png.flaticon.com/512/149/149071.png' }}"@endif
                        style="width:42px; height:42px; border-radius:50%; object-fit:cover; border:2px solid white;">
                </div>

                <!-- Menu profile -->
                <div id="profileDropdown">
                    <a href="{{ route('profile.edit') }}">
                        <i class="fa-solid fa-user"></i> Mon profil
                    </a>

                    

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            style="width:100%; padding:8px; margin-top:5px; background:#dc2626; color:white; border:none; border-radius:6px;">
                            <i class="fa-solid fa-right-from-bracket"></i> Déconnexion
                        </button>
                    </form>
                </div>

                <!-- Burger menu -->
                <i class="fa-solid fa-bars menu-btn" onclick="toggleMenu()"></i>
            </div>
        </div>

        <div class="card">
            @yield('content')
        </div>

    </div>

    <script>
        function toggleMenu() {
            document.getElementById("sidebar").classList.toggle("collapsed");
            document.getElementById("content").classList.toggle("collapsed");
        }

        function toggleProfileMenu() {
            const menu = document.getElementById("profileDropdown");
            menu.style.display = menu.style.display === "block" ? "none" : "block";
        }

        document.addEventListener("click", function(e) {
            const profile = document.querySelector(".profile-menu");
            const menu = document.getElementById("profileDropdown");

            if (!e.target.closest("#profileDropdown") && !e.target.closest("img")) {
                menu.style.display = "none";
            }
        });
    </script>

</body>
</html>
