<?php 
    $title ="Ma page d'acceuil" ;  
    $nav = "index";
    require 'element/header.php';
?>

    <main>
       <section class="presentation">
           <div class="sec">
                <h1>Qui suis-je ? </h1>
                <div class="caroussel">
                    <div class="lefts"> 
                        <img src="img/thd.jpeg" alt="Ma photo" hspace=50 title="THD l'enfant de sa cher maman">
                        <img src="img/thd1.jpeg" alt="Ma photo" hspace=50 title="THD l'enfant de sa cher maman">
                        <img src="img/thd2.jpeg" alt="Ma photo" hspace=50 title="THD l'enfant de sa cher maman">
                        <img src="img/thd3.jpg" alt="Ma photo" hspace=50 title="THD l'enfant de sa cher maman">
                    </div>           
                </div>
                <div class="right">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, earum neque possimus vero culpa in fugit recusandae mollitia dolorem debitis animi atque,
                    blanditiis nisi dicta minus libero sapiente optio corporis?</p>
                </div>
           </div>
       </section>
       <section class="parcours">
            <h1>Parcours et expériences</h1>
            <div class="sec">
                <h2>Expériences professionnelles </h2>
                <div class="par">
                    <div class="left"> 
                        <h3>2023 - Todays</h3>
                    </div>
                    <div class="right">
                        <h3>Créateur - THD Hamananke Jalloh</h3>
                        <p>Créateur du site personnel THD et beaucoup d'autre sont prévus inchâ allah</p>
                    </div>
                </div>
                <div class="par">
                    <div class="left"> 
                        <h3>2022 - 2023</h3>
                    </div>
                    <div class="right">
                        <h3>Créateur - THD Hamananke Jalloh</h3>
                        <p>Créateur d'un SGBD desktop pour le gérer le Département Génie Informatique de l'Institut Supérieur de Technologie de Mamou</p>
                    </div>
                </div>
                <div class="par">
                    <div class="left"> 
                        <h3>2022 - 2023</h3>
                    </div>
                    <div class="right">
                        <h3>Developeur - Java</h3>
                        <p>Developeur d'un SGBD pour l'entreprise Hamana dans le cadre d'une digitalisation de leur donnés</p>
                    </div>
                </div>
                <h2>Parcours scolaires</h2>
                <div class="par">
                    <div class="left"> 
                        <h3>2021 - 2024</h3>
                    </div>
                    <div class="right">
                        <h3>Cycle Univesitaire</h3>
                        <p>Obptation du diplôme de licence professionnel spécialisé dans le developpement web  </p>
                    </div>
                </div>
                <div class="par">
                    <div class="left"> 
                        <h3>2017 - 2020</h3>
                    </div>
                    <div class="right">
                        <h3>Cycle du lycée en serie scientifique</h3>
                        <p>Trois années d'etude qui s'est soldé par l'optation du diplôme de baccalauréat en science mathématique</p>
                    </div>
                </div>
            </div>
       </section>
       <section class="competences">
            <h1>Compétances et niveau</h1>
            <div class="sec">
                <div class="cleft"> 
                    <div class="sous">
                        <div class="sousleft"><h3>Compétences</h3></div>
                        <div class="souright"><h3>Niveau</h3></div>
                    </div>
                    <div class="sous">
                        <div class="sousleft">HTML / CSS</div>
                        <div class="souright">EXPERT</div>
                    </div>
                    <div class="sous">
                        <div class="sousleft">JAVA</div>
                        <div class="souright">INTERMEDIAIRE</div>
                    </div>
                    <div class="sous">
                        <div class="sousleft">MySQL</div>
                        <div class="souright">AVANCE</div>
                    </div>
                </div>
                <div class="cright">
                    <div class="sous">
                        <div class="sousleft"><h3>Compétences</h3></div>
                        <div class="souright"><h3>Niveau</h3></div>
                    </div>
                    <div class="sous">
                        <div class="sousleft">JAVA-SCRIPT </div>
                        <div class="souright">INTERMEDIAIRE</div>
                    </div>
                    <div class="sous">
                        <div class="sousleft">PHP</div>
                        <div class="souright">DEBUTANT</div>
                    </div>
                    <div class="sous">
                        <div class="sousleft">RIA & LARAVEL</div>
                        <div class="souright">DEBUTANT</div>
                    </div>
                </div>
            </div>
       </section>
       <section class="recomandations">
            <h1>Recommandations (à télécharger)</h1>
            <div class="sec">
                <div class="rec">
                    <h2>Cours d'HTML / CSS </h2>
                    <div class="left">
                        <a href="pdf/html.pdf" target="_blank"><img src="img/pdf.png" alt="pdf"></a>
                    </div>
                    <div class="left">
                        <a href="pdf/html2.pdf" target="_blank"><img src="img/pdf.png" alt="pdf"></a>
                    </div>
                    <div class="left">
                        <a href="pdf/html3.pdf" target="_blank"><img src="img/pdf.png" alt="pdf"></a>
                    </div>
                    <div class="right">
                        <P>Ces documents là sont des très bon documents car leur contenu est très riche</P>
                    </div>
                </div>
                <div class="rec">
                    <h2>Cours de Java et JavaScript </h2>
                    <div class="left">
                        <a href="pdf/java.pdf" target="_blank"><img src="img/pdf.png" alt="pdf"></a>
                    </div>
                    <div class="left">
                        <a href="pdf/JavaScript.pdf" target="_blank"><img src="img/pdf.png" alt="pdf"></a>
                    </div>
                    <div class="left">
                        <a href="pdf/java1.pdf" target="_blank"><img src="img/pdf.png" alt="pdf"></a>
                    </div>
                    <div class="right">
                        <P>Ces cours là c'est sans commantaire ouvre seulement vous allez decouvrir vous même </P>
                    </div>
                </div>
            </div>
       </section>
    </main>

<?php require 'element/footer.php';?>