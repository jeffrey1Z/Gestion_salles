
<?php require 'header.php'?>
<style>
    .row{
    background: #000;
    border-radius: 27px;
    border: 1px solid transparent;
    box-shadow: 0 0 5px red;
    padding: 20px;
    transition: all 0.5s ease;
}
.row img{
    height: auto;
    border-radius: 27px;
    margin-bottom: 1.4rem;
    width: 100%;
}
.row h4{
    font-size: 25px;
    font-weight: 700;
    margin-bottom: 10px;
    line-height: 1.4rem;
}
.row:hover{
    border: 1px solid red;
    transform: translateY(5px) scale(1.04);
    cursor:pointer;
}
</style>
<section class="accueil" id="accueil">
    <div class="contenus" data-aos="zoom-in">
        <h3 >ACTIVEZ-VOUS</h3>
        <h1>CHEZ NOUS</h1>
        <h3 ><span class="deco"></span></h3>

        <p>Nous sommes ravis de vous accueillir dans un espace conçu 
            pour vous aider à atteindre vos objectifs de fitness</p>
        <?php if (isset($_SESSION['id'])): ?>
        <a href="login.php" class="btn-connexion">Deconnexiom</a>
        <?php else: ?>
        <a href="login.php" class="btn-connexion">Connexion</a>
        <?php endif; ?>
    </div>
    <div class="acc-image" data-aos="zoom-in">
            <img src="img/IMG_5796.JPG" alt="">
        </div>
   
</section>
<section class="service" id="service">
    <h2 class="tete" data-aos="zoom-in-down">Nos <span>services</span></h2>
    <div class="service-contene" data-aos="zoom-in-up">
        <div class="row"><img src="img/IMG_5806.JPG" alt="">
        <h4>Fitness</h4>
        </div>
    
        <div class="row"><img src="img/IMG_5793.JPG" alt="">
        <h4>Cardio</h4>
        </div>
    
        <div class="row"><img src="img/IMG_5815.PNG" alt="">
        <h4>Developpent personnel</h4>
        </div>
       
        <div class="row"><img src="img/IMG_5816.JPG" alt="">
        <h4>Yoga</h4>
        </div>
        
        <div class="row"><img src="img/IMG_5814.JPG" alt="">
        <h4>Musculation</h4>
        </div>
        
        <div class="row"><img src="img/IMG_5795.JPG" alt="">
        <h4>Dance</h4>
        </div>
        
    </div>
</section>

<section class="prop" id="prop">

    <div class="prop-img">
        <img src="img/IMG_5817.PNG" alt="" data-aos="zoom-in-up">
    </div>
    <div class="prop-contenu" data-aos="zoom-in-down">
        <h2 class="tete2">pourquoi nous choisir?</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore veritatis id omnis nemo est quod.]
        </p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium labore, explicabo soluta cum aut ea consectetur dolorum mollitia.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem facere veniam odio!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius impedit illum rerum amet laboriosam provident dolorum nisi.</p>
        <?php if (isset($_SESSION['id'])): ?>
        <a href="login.php" class="btn-connexion">Deconnexiom</a>
        <?php else: ?>
        <a href="login.php" class="btn-connexion">Connexion</a>
        <?php endif; ?>
    </div>

</section>


<section class="plans" id="plans" data-aos="zoom-in-up">
    <h2 class="tete">Nos <span>Offres</span></h2>
    <div class="plans-con">
        <div class="box">
            <h3>BASIC</h3>
            <h2><span>50$/Mois</span></h2>
            <ul>
                <li>Vous aurez acces aux meteriels.</li>
                <li>vous aurez droit a un suivi permanent.</li>
            </ul>
            <?php if (isset($_SESSION['id'])): ?>
            <a href="formachat.php?plan=BASIC&prix=50" class="con">souscivez maintenant </a>
            <?php else:?>
            <a href="login.php" class="con">souscivez maintenant </a>
            <?php endif; ?>
        </div>
        <div class="box">
            <h3>STANDARD</h3>
            <h2><span>80$/Mois</span></h2>
            <ul>
                <li>Vous aurez acces aux meteriels.</li>
                <li>Vous aurez droit a un coach.</li>
                <li>vous aurez droit a un suivi permanent.</li>
                <li>Vous aurez acces a la sale 3/7 24H.</li>
            </ul>
            <?php if (isset($_SESSION['id'])): ?>
            <a href="formachat.php?plan=STANDARD&prix=80" class="con">souscivez maintenant </a>
            <?php else: 
                echo "<script>alert('Veuillez d'abord vous connecter avant de souscrire a l'abonnement!');</script>"?>
            <a href="login.php" class="con">souscivez maintenant </a>
            <?php endif; ?>
        </div>
        <div class="box">
            <h3>PREMIUM</h3>
            <h2><span>120$/Mois</span></h2>
            <ul>
                <li>Vous aurez acces aux meteriels.</li>
                <li>Vous aurez droit a un coach.</li>
                <li>vous aurez droit a un suivi permanent.</li>
                <li>Vous aurez acces a la sale 3/7 24H.</li>
                <li>Avoir un programme d'alimentation.</li>
                
            </ul>
            <?php if (isset($_SESSION['id'])): ?>
            <a href="formachat.php?plan=PREMIUM&prix=120" class="con">souscivez maintenant </a>
            <?php else:  ?>
                <a href="login.php" class="con">souscivez maintenant </a>
            <?php endif; ?>
            </div>
    </div>
</section>
<script src="script.js"></script>
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init(
        {
            offset:300,
            duration:1400
        }
    );
  </script>
<?php require 'footer.php'?>

</body>
</html>