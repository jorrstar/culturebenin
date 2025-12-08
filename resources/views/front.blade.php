<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Culture du Bénin</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", sans-serif;
            background: #f7f7f7;
        }

        .header {
            background: linear-gradient(90deg, #e67e22, #d35400);
            padding: 20px;
            text-align: center;
            color: white;
            font-size: 28px;
            font-weight: bold;
        }

        .container {
            width: 90%;
            margin: 30px auto;
        }

        .become-author {
            display: inline-block;
            padding: 12px 18px;
            background: #2ecc71;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }

        .card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card-body {
            padding: 15px;
        }

        .title {
            font-size: 20px;
            color: #333;
            font-weight: bold;
            margin-bottom: 6px;
        }

        .author {
            font-size: 14px;
            color: #888;
            margin-bottom: 12px;
        }

        .description {
            font-size: 15px;
            color: #555;
            margin-bottom: 15px;
            line-height: 1.4;
        }

        .btn-read {
            display: inline-block;
            padding: 8px 12px;
            background: #e67e22;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="header">
        🇧🇯 Culture & Patrimoine du Bénin
    </div>

    <!-- AJOUTEZ ICI -->
    <div style="text-align:center; padding:25px 20px; background:linear-gradient(135deg, #1e3c72, #2a5298);">
        <div style="max-width:800px; margin:0 auto;">
            <h2 style="color:#ffdd00; margin-bottom:15px; font-size:28px;">
                <i class="fas fa-crown" style="margin-right:10px;"></i>Accédez aux contenus Premium
            </h2>
            <p style="color:white; font-size:18px; margin-bottom:20px;">
                Soutenez la culture béninoise et débloquez tous nos contenus exclusifs
            </p>
            <a href="{{ route('subscription.show') }}" 
               style="display:inline-block; padding:15px 35px; background:#ffdd00; 
                      color:#1e3c72; border-radius:50px; text-decoration:none; 
                      font-weight:bold; font-size:18px; transition:all 0.3s;">
                <i class="fas fa-star" style="margin-right:8px;"></i>Devenir Membre Premium - 2$/mois
            </a>
            <p style="color:#cccccc; margin-top:15px; font-size:14px;">
                <i class="fas fa-lock" style="margin-right:5px;"></i>Paiement sécurisé • Annulation à tout moment
            </p>
        </div>
    </div>
    
    <div style="text-align:center; margin-top:20px;">
    <a href="{{ route('layout') }}" 
       style="padding:12px 18px; background:#3498db; color:white; 
              border-radius:8px; text-decoration:none; font-weight:bold;">
        🔧 Accéder au tableau de bord
    </a>
</div>

    <div class="container">

        <a href="#" class="become-author">📚 Devenir auteur</a>

        <div class="grid">

            {{-- EXEMPLE 1 --}}
            <div class="card">
                <img src="https://i.imgur.com/dmlg8Gj.jpeg" alt="">
                <div class="card-body">
                    <div class="title">Le Royaume du Dahomey</div>
                    <div class="author">Par : <strong>Ayô Mêton</strong></div>
                    <div class="description">
                        Découvrez l’histoire fascinante du royaume du Dahomey, berceau de la puissance, du courage et des amazones.
                    </div>
                    <a href="#" class="btn-read">Voir plus</a>
                </div>
            </div>

            {{-- EXEMPLE 2 --}}
            <div class="card">
                <img src="https://i.imgur.com/s6lJGQe.jpeg" alt="">
                <div class="card-body">
                    <div class="title">Le temple des Pythons</div>
                    <div class="author">Par : <strong>Agossou Codjo</strong></div>
                    <div class="description">
                        Le célèbre temple de Ouidah abrite plus de 50 pythons sacrés, symbole de protection et de tradition.
                    </div>
                    <a href="#" class="btn-read">Voir plus</a>
                </div>
            </div>

            {{-- EXEMPLE 3 --}}
            <div class="card">
                <img src="https://i.imgur.com/sF7yV8f.jpeg" alt="">
                <div class="card-body">
                    <div class="title">Ganvié, la Venise d’Afrique</div>
                    <div class="author">Par : <strong>Kponton Léhady</strong></div>
                    <div class="description">
                        Village lacustre situé sur le lac Nokoué, Ganvié offre un spectacle unique au monde, entre tradition et modernité.
                    </div>
                    <a href="#" class="btn-read">Voir plus</a>
                </div>
            </div>

            {{-- EXEMPLE 4 --}}
            <div class="card">
                <img src="https://i.imgur.com/8r7XPmE.jpeg" alt="">
                <div class="card-body">
                    <div class="title">La porte du Non-Retour</div>
                    <div class="author">Par : <strong>Houndji Romaric</strong></div>
                    <div class="description">
                        Monument historique de Ouidah, mémoire des millions d’âmes déportées lors de la traite négrière.
                    </div>
                    <a href="#" class="btn-read">Voir plus</a>
                </div>
            </div>

            {{-- EXEMPLE 5 --}}
            <div class="card">
                <img src="https://i.imgur.com/tx3C5fN.jpeg" alt="">
                <div class="card-body">
                    <div class="title">Le Vodoun : Spiritualité béninoise</div>
                    <div class="author">Par : <strong>Adjovi Sina</strong></div>
                    <div class="description">
                        Le vodoun, symbole identitaire du Bénin, est une religion riche, mystérieuse et profondément enracinée dans l’histoire.
                    </div>
                    <a href="#" class="btn-read">Voir plus</a>
                </div>
            </div>

            {{-- EXEMPLE 6 --}}
            <div class="card">
                <img src="https://i.imgur.com/H2Y7f4P.jpeg" alt="">
                <div class="card-body">
                    <div class="title">Les Masques Guèlèdè</div>
                    <div class="author">Par : <strong>Houngbédji K.</strong></div>
                    <div class="description">
                        Patrimoine immatériel de l’humanité, les masques Guèlèdè célèbrent les mères et protègent la communauté.
                    </div>
                    <a href="#" class="btn-read">Voir plus</a>
                </div>
            </div>

        </div>
    </div>

</body>
</html>
