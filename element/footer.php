    <footer>
       <div class="row">
            <div class="col-md-4">
                <div class="partenaires">
                    <ul>
                        <h4>Partners : </h4>
                        <li class="partenaire"><a href="#">Orange Guinnée</a></li>
                        <li class="partenaire"><a href="#">Guinnée Telecom</a></li>
                        <li class="partenaire"><a href="#">Banque National</a></li>
                        <li class="partenaire"><a href="#">Vista Banque</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="liens">
                    <h4>follow us</h4>
                    <div class="icon">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-whatsapp"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="contact">
                    <h4>Contacts : </h4>
                    <p>Adress : Mamou/Hore Fello </p>
                    <p>Phone  : +224 629 72 26 33 <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; +224 623 22 91 88 </p>
                </div>
            </div>
       </div>
        <div class="row" id="dernier">
            <div class="col-md-6">
                <p class="paragraph">All right reserved &copy; 2023</p>
            </div>
            <div class="col-md-6">
                <?php
                    require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'fonctions'.DIRECTORY_SEPARATOR.'compter.php';
                    add_viw();
                    $viws = nomber_viws();
                ?>
                <p class="paragraph">Il y'a <?= $viws ?> visite<?php if($viws > 1):?>s<?php endif;?> sur le site</p>
            </div>
        </div>
         <!-- Inclusion des fichiers -->
        <script src="javascript/bootstrap.bundle.min.js"></script>
        <script src="javascript/bootstrap.min.js"></script>
        <script src="javascript/jquery-3.6.0.js"></script>
        <script src="javascript/jquery-migrate-3.3.2.js"></script>
        <script src="js/scripts.js"></script>
    </footer>
</body>
</html>
