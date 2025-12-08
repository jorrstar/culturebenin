<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CultureBenin - Découvrez la richesse culturelle du Bénin</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-color: #1e3c72;
            --secondary-color: #2a5298;
            --accent-color: #ffdd00;
            --text-light: #ffffff;
            --text-dark: #333333;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            background: linear-gradient(135deg, #0a1931, #1a1a2e);
            color: var(--text-light);
        }
        
        /* Navbar personnalisée */
        .custom-navbar {
            background: rgba(26, 26, 46, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            border-bottom: 2px solid var(--accent-color);
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.8rem;
            color: var(--accent-color) !important;
        }
        
        .nav-link {
            color: var(--text-light) !important;
            font-weight: 500;
            margin: 0 10px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover {
            color: var(--accent-color) !important;
            transform: translateY(-2px);
        }
        
        /* Hero Section avec carousel */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7));
            margin-top: 0;
            padding-top: 0;
        }
        
        /* Carousel personnalisé */
        .tourist-carousel {
            height: 600px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            border: 3px solid var(--accent-color);
        }
        
        .carousel-item {
            height: 600px;
            position: relative;
        }
        
        .carousel-item img {
            object-fit: cover;
            height: 100%;
            width: 100%;
            filter: brightness(0.8);
            transition: transform 8s ease;
        }
        
        .carousel-item.active img {
            transform: scale(1.05);
        }
        
        .carousel-caption-custom {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0, 0, 0, 0.9));
            padding: 40px 20px 30px;
            text-align: center;
        }
        
        .site-name {
            font-size: 2.8rem;
            font-weight: 800;
            color: var(--accent-color);
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.8);
            margin-bottom: 10px;
            letter-spacing: 1px;
        }
        
        .site-location {
            font-size: 1.3rem;
            color: var(--text-light);
            font-weight: 300;
            margin-bottom: 15px;
        }
        
        .site-description {
            font-size: 1rem;
            color: #cccccc;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        /* Contrôles carousel */
        .carousel-control-prev, .carousel-control-next {
            width: 60px;
            height: 60px;
            background: rgba(255, 221, 0, 0.9);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            margin: 0 20px;
            transition: all 0.3s ease;
        }
        
        .carousel-control-prev:hover, .carousel-control-next:hover {
            background: var(--accent-color);
            transform: translateY(-50%) scale(1.1);
        }
        
        .carousel-indicators-custom {
            bottom: 20px;
        }
        
        .carousel-indicators-custom button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            margin: 0 5px;
            border: none;
        }
        
        .carousel-indicators-custom button.active {
            background-color: var(--accent-color);
            transform: scale(1.3);
        }
        
        /* Section Call-to-Action */
        .cta-section {
            background: linear-gradient(135deg, rgba(30, 60, 114, 0.9), rgba(42, 82, 152, 0.9));
            padding: 80px 0;
            margin-top: 50px;
            position: relative;
            overflow: hidden;
        }
        
        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1518834103326-4dbb0c8b6d76?auto=format&fit=crop&w=1950') center/cover;
            opacity: 0.1;
            z-index: -1;
        }
        
        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--accent-color);
        }
        
        .cta-text {
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 30px;
            max-width: 600px;
        }
        
        .btn-cta {
            background: var(--accent-color);
            color: var(--primary-color);
            font-weight: 700;
            font-size: 1.2rem;
            padding: 15px 40px;
            border-radius: 50px;
            border: none;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
        }
        
        .btn-cta:hover {
            background: #ffed4e;
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            color: var(--primary-color);
        }
        
        /* Stats Section */
        .stats-section {
            padding: 80px 0;
            background: rgba(255, 255, 255, 0.05);
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            height: 100%;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.15);
            border-color: var(--accent-color);
        }
        
        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            color: var(--accent-color);
            margin-bottom: 10px;
        }
        
        .stat-label {
            font-size: 1.1rem;
            color: #cccccc;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        /* Footer */
        .footer {
            background: #0a1931;
            padding: 50px 0 20px;
            border-top: 3px solid var(--accent-color);
        }
        
        .footer-logo {
            font-size: 2rem;
            font-weight: 700;
            color: var(--accent-color);
            margin-bottom: 20px;
        }
        
        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            background: var(--accent-color);
            color: var(--primary-color);
            transform: translateY(-5px);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-section {
                min-height: auto;
                padding: 100px 0 50px;
            }
            
            .tourist-carousel {
                height: 400px;
            }
            
            .carousel-item {
                height: 400px;
            }
            
            .site-name {
                font-size: 2rem;
            }
            
            .carousel-control-prev, .carousel-control-next {
                width: 45px;
                height: 45px;
            }
            
            .cta-title {
                font-size: 2rem;
            }
            
            .stat-number {
                font-size: 2.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .tourist-carousel {
                height: 350px;
            }
            
            .carousel-item {
                height: 350px;
            }
            
            .site-name {
                font-size: 1.6rem;
            }
            
            .cta-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-landmark me-2"></i>CultureBenin
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-home me-1"></i> Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-map-marked-alt me-1"></i> Lieux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-calendar-alt me-1"></i> Événements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-images me-1"></i> Galerie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-1"></i> Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-primary ms-3">
                            <i class="fas fa-user-plus me-1"></i> S'inscrire
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section avec Carousel -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0 animate__animated animate__fadeInLeft">
                    <h1 class="display-4 fw-bold mb-4">
                        Découvrez la <span class="text-warning">richesse culturelle</span> du Bénin
                    </h1>
                    <p class="lead mb-4">
                        Explorez les trésors historiques, les sites touristiques emblématiques 
                        et la diversité culturelle qui font la renommée du Bénin.
                    </p>
                    <a href="{{ route('register') }}" class="btn btn-cta animate__animated animate__pulse animate__infinite">
                        <i class="fas fa-compass me-2"></i> Commencer l'exploration
                    </a>
                </div>
                
                <div class="col-lg-6 animate__animated animate__fadeInRight">
                    <div id="touristCarousel" class="carousel slide tourist-carousel" data-bs-ride="carousel">
                        <!-- Indicateurs -->
                        <div class="carousel-indicators carousel-indicators-custom">
                            <button type="button" data-bs-target="#touristCarousel" data-bs-slide-to="0" class="active"></button>
                            <button type="button" data-bs-target="#touristCarousel" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#touristCarousel" data-bs-slide-to="2"></button>
                            <button type="button" data-bs-target="#touristCarousel" data-bs-slide-to="3"></button>
                            <button type="button" data-bs-target="#touristCarousel" data-bs-slide-to="4"></button>
                        </div>
                        
                        <!-- Slides -->
                        <div class="carousel-inner">
                            <!-- Slide 1 -->
                            <div class="carousel-item active">
                                <img src="data:image/jpeg;base64,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" 
                                     alt="Palais Royal d'Abomey">
                                <div class="carousel-caption-custom">
                                    <h2 class="site-name">Palais Royal d'Abomey</h2>
                                    <p class="site-location"><i class="fas fa-map-marker-alt me-2"></i>Abomey, Département du Zou</p>
                                    <p class="site-description">
                                        Patrimoine mondial de l'UNESCO, ancienne capitale du royaume du Dahomey
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Slide 2 -->
                            <div class="carousel-item">
                                <img src="data:image/jpeg;base64,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" 
                                     alt="Village sur pilotis de Ganvié">
                                <div class="carousel-caption-custom">
                                    <h2 class="site-name">Ganvié</h2>
                                    <p class="site-location"><i class="fas fa-map-marker-alt me-2"></i>Lac Nokoué, Département de l'Atlantique</p>
                                    <p class="site-description">
                                        La "Venise de l'Afrique", plus grande cité lacustre d'Afrique
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Slide 3 -->
                            <div class="carousel-item">
                                <img src="https://www.shutterstock.com/shutterstock/photos/2482222715/display_1500/stock-photo-ouidah-benin-the-door-of-no-return-is-a-memorial-to-the-enslaved-africans-who-were-taken-from-2482222715.jpg" 
                                     alt="Porte du Non Retour">
                                <div class="carousel-caption-custom">
                                    <h2 class="site-name">Porte du Non Retour</h2>
                                    <p class="site-location"><i class="fas fa-map-marker-alt me-2"></i>Ouidah, Département de l'Atlantique</p>
                                    <p class="site-description">
                                        Mémorial de la traite négrière, classé au patrimoine de l'UNESCO
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Slide 4 -->
                            <div class="carousel-item">
                                <img src="https://images.unsplash.com/photo-1544551763-6f4d6c4c9d9a?auto=format&fit=crop&w=1950&q=80" 
                                     alt="Parc National de la Pendjari">
                                <div class="carousel-caption-custom">
                                    <h2 class="site-name">Parc de la Pendjari</h2>
                                    <p class="site-location"><i class="fas fa-map-marker-alt me-2"></i>Nord-Ouest du Bénin</p>
                                    <p class="site-description">
                                        Réserve de biosphère UNESCO, refuge des éléphants, lions et guépards
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Slide 5 -->
                            <div class="carousel-item">
                                <img src="https://images.unsplash.com/photo-1544551763-8b6b8b6b6b6b?auto=format&fit=crop&w=1950&q=80" 
                                     alt="Temple des Pythons">
                                <div class="carousel-caption-custom">
                                    <h2 class="site-name">Temple des Pythons</h2>
                                    <p class="site-location"><i class="fas fa-map-marker-alt me-2"></i>Ouidah, Département de l'Atlantique</p>
                                    <p class="site-description">
                                        Site sacré du vodoun, habité par des pythons considérés comme sacrés
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Contrôles -->
                        <button class="carousel-control-prev" type="button" data-bs-target="#touristCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Précédent</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#touristCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Suivant</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col">
                    <h2 class="display-5 fw-bold">Le Bénin en Chiffres</h2>
                    <p class="lead">Découvrez l'ampleur de notre patrimoine culturel</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <div class="stat-number">8</div>
                        <div class="stat-label">Sites UNESCO</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Lieux Touristiques</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <div class="stat-number">12</div>
                        <div class="stat-label">Musées Nationaux</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <div class="stat-number">250+</div>
                        <div class="stat-label">Événements Annuels</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h2 class="cta-title animate__animated animate__fadeInDown">
                        Prêt à explorer la culture béninoise ?
                    </h2>
                    <p class="cta-text animate__animated animate__fadeIn animate__delay-1s">
                        Rejoignez notre communauté de passionnés et accédez à des contenus exclusifs, 
                        des visites virtuelles, et participez aux événements culturels à travers tout le pays.
                    </p>
                    <div class="d-flex flex-wrap justify-content-center gap-3 animate__animated animate__fadeInUp animate__delay-2s">
                        <a href="{{ route('register') }}" class="btn btn-cta">
                            <i class="fas fa-user-plus me-2"></i> Créer un compte gratuit
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">
                            <i class="fas fa-sign-in-alt me-2"></i> Se connecter
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-logo">CultureBenin</div>
                    <p>
                        Votre portail vers la richesse culturelle du Bénin. 
                        Découvrez, explorez et vivez l'expérience culturelle béninoise.
                    </p>
                    <div class="social-icons">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6 mb-4">
                    <h5 class="text-warning mb-3">Explorer</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none mb-2 d-block">Sites Historiques</a></li>
                        <li><a href="#" class="text-light text-decoration-none mb-2 d-block">Musées</a></li>
                        <li><a href="#" class="text-light text-decoration-none mb-2 d-block">Festivals</a></li>
                        <li><a href="#" class="text-light text-decoration-none mb-2 d-block">Artisanat</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-6 mb-4">
                    <h5 class="text-warning mb-3">Ressources</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light text-decoration-none mb-2 d-block">Guides</a></li>
                        <li><a href="#" class="text-light text-decoration-none mb-2 d-block">Cartes</a></li>
                        <li><a href="#" class="text-light text-decoration-none mb-2 d-block">Blog</a></li>
                        <li><a href="#" class="text-light text-decoration-none mb-2 d-block">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 mb-4">
                    <h5 class="text-warning mb-3">Contact</h5>
                    <p class="text-light">
                        <i class="fas fa-envelope me-2"></i> contact@culturebenin.bj<br>
                        <i class="fas fa-phone me-2"></i> +229 XX XX XX XX<br>
                        <i class="fas fa-map-marker-alt me-2"></i> Porto-Novo, Bénin
                    </p>
                </div>
            </div>
            <hr class="bg-light my-4">
            <div class="row">
                <div class="col text-center">
                    <p class="mb-0">&copy; {{ date('Y') }} CultureBenin. Tous droits réservés.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Scripts personnalisés -->
    <script>
        // Animation automatique du carousel
        document.addEventListener('DOMContentLoaded', function() {
            const myCarousel = document.getElementById('touristCarousel');
            const carousel = new bootstrap.Carousel(myCarousel, {
                interval: 5000,
                wrap: true,
                pause: 'hover'
            });
            
            // Animation d'effet zoom sur les images
            myCarousel.addEventListener('slide.bs.carousel', function () {
                const activeItem = this.querySelector('.carousel-item.active img');
                if (activeItem) {
                    activeItem.style.transform = 'scale(1)';
                }
            });
            
            myCarousel.addEventListener('slid.bs.carousel', function () {
                const activeItem = this.querySelector('.carousel-item.active img');
                if (activeItem) {
                    activeItem.style.transform = 'scale(1.05)';
                }
            });
            
            // Animation des stats
            const statNumbers = document.querySelectorAll('.stat-number');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const stat = entry.target;
                        const target = parseInt(stat.textContent);
                        let current = 0;
                        const increment = target / 50;
                        
                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= target) {
                                current = target;
                                clearInterval(timer);
                            }
                            stat.textContent = Math.floor(current) + (stat.textContent.includes('+') ? '+' : '');
                        }, 30);
                        
                        observer.unobserve(stat);
                    }
                });
            }, { threshold: 0.5 });
            
            statNumbers.forEach(stat => observer.observe(stat));
        });
    </script>
</body>
</html>