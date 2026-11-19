<?php require 'header.php'?>
<link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.css">

<section class="accueil" id="accueil">
    <div class="contenus" data-aos="zoom-in">
        <h3>ACTIVEZ-VOUS</h3>
        <h1>CHEZ NOUS</h1>
        <h3><span class="deco"></span></h3>

        <p>Nous sommes ravis de vous accueillir dans un espace conçu pour vous aider à atteindre vos objectifs de fitness</p>
        <?php if (isset($_SESSION['id'])): ?>
            <a href="login.php" class="btn-connexion">Déconnexion</a>
        <?php else: ?>
            <a href="login.php" class="btn-connexion">Connexion</a>
        <?php endif; ?>
    </div>
    <div class="acc-image" data-aos="zoom-in">
        <img src="img/Ultimate_membership_modal.webp" alt="">
    </div>
</section>

<section class="expo">
    <div class="container-fluid">
        <div class="row">
            <!-- Colonne principale du carousel -->
            <div class="col-12 col-md-8 mb-4">
                <div id="carouselExampleCaptions1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-target="#carouselExampleCaptions1" data-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-target="#carouselExampleCaptions1" data-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-target="#carouselExampleCaptions1" data-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/IMG_5806.JPG" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/IMG_5809.JPG" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/IMG_5810.JPG" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions1" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions1" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <!-- Colonne pour l'image et l'autre carousel -->
            <div class="col-12 col-md-4 mb-4">
                <img src="img/IMG_5818.JPG" alt="" class="img-fluid mb-4">
                <div id="carouselExampleCaptions2" class="carousel slide" data-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-target="#carouselExampleCaptions2" data-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-target="#carouselExampleCaptions2" data-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-target="#carouselExampleCaptions2" data-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/IMG_5810.JPG" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>First slide label</h5>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/IMG_5810.JPG" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Second slide label</h5>
                                <p>Some representative placeholder content for the second slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/IMG_5810.JPG" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Third slide label</h5>
                                <p>Some representative placeholder content for the third slide.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions2" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions2" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <!-- Première ligne de cartes -->
        <div class="card-group mb-4">
            <!-- Première carte -->
            <div class="col-12 col-md-4 mb-3">
                <div class="card">
                    <img src="img/IMG_5815.PNG" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <!-- Deuxième carte -->
            <div class="col-12 col-md-4 mb-3">
                <div class="card">
                    <img src="img/IMG_5815.PNG" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <!-- Troisième carte -->
            <div class="col-12 col-md-4 mb-3">
                <div class="card">
                    <img src="img/IMG_5815.PNG" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Deuxième ligne de cartes -->
        <div class="card-group mb-4">
            <!-- Première carte -->
            <div class="col-12 col-md-4 mb-3">
                <div class="card">
                    <img src="img/IMG_5815.PNG" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <!-- Deuxième carte -->
            <div class="col-12 col-md-4 mb-3">
                <div class="card">
                    <img src="img/IMG_5815.PNG" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

            <!-- Troisième carte -->
            <div class="col-12 col-md-4 mb-3">
                <div class="card">
                    <img src="img/IMG_5815.PNG" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="bootstrap-4.4.1-dist/js/bootstrap.bundle.min.js"></script> <!-- Utilisation du bundle minifié avec Popper -->
<script src="script.js"></script>
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<script>
    AOS.init({ offset: 300, duration: 1400 });
</script>

<?php require 'footer.php'?>
</body>
</html>
