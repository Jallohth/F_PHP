<?php 
    $title ="Nous contacter";
    require_once 'data/config.php';
    require_once 'fonctions.php';
    // conversion du fuseau horaire
    date_default_timezone_set('UTC');
    // recuperer l'heure du jour
    $heure = (int)($_GET['heure'] ?? date('G'));
    // le creneau du jour
    $jour = (int)($_GET['jour'] ?? date('N')-1);
    $creneaux = CRENEAUX[$jour];
    // la date du jour
    $ouvert = in_creneaux($heure, $creneaux);
    // pour gerer les couleurs d'affichage des messages en utiliisant les ternaires
    $couleur = $ouvert ? 'green':'red';
    require 'element/header.php';
?>
    <section class="rouge">
         <!-- Page Header-->
        <header class="masthead" style="background-image: url('img/contact-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="page-heading">
                            <h1>Contact Me !!!</h1>
                            <p class="subheading">Have questions ? I have answers.</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
       <div class="row justify-content-center">
            <div class="col-md-5 card">
                <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
                <div class="my-5">
                    <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <div class="form-floating">
                            <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                            <label for="name">Name</label>
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="email" type="email" placeholder="Enter your email..." data-sb-validations="required,email" />
                            <label for="email">Email address</label>
                            <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="phone" type="tel" placeholder="Enter your phone number..." data-sb-validations="required" />
                            <label for="phone">Phone Number</label>
                            <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="message" placeholder="Enter your message here..." style="height: 12rem" data-sb-validations="required"></textarea>
                            <label for="message">Message</label>
                            <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                        </div>
                        <br />
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3">Error sending message!</div>
                        </div>
                        <!-- Submit Button-->
                        <button class="btn btn-primary text-uppercase disabled" id="submitButton" type="submit">Send</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 card">
                <h4>Entrez une heure pour vérifier</h4>
                <!-- le message -->
                <?php if($ouvert) :?> 
                    <div class="alert alert-success">
                        Le magasin sera ouvert
                    </div>
                <?php else :?> 
                    <div class="alert alert-danger">
                        Le magasin sera fermé
                    </div>
                <?php endif?> 
                <!-- le formulaire -->
                <form action="" method="GET">
                    <div class="form-group">
                        <?= select ('jour',$jour, JOURS) ?>                
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="number" name="heure" value="<?= $heure ?>">
                    </div>
                    <button class="btn btn-primary" type="submit">Verification</button>
                </form>
                
                <h3 class="fw-bold text-center my-4">Horaires d'ouvertures</h3 >
                <ul>
                    <?php foreach(JOURS as $k => $jour): ?> 
                        <li>
                            <strong><?= $jour ?></strong> :
                            <?= creneaux_html(CRENEAUX[$k]);?>
                        </li>
                    <?php endforeach;?> 
                </ul>                
            </div>
       </div>
    </section>


<?php require 'element/footer.php';?>