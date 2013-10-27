
    <footer>
        
        <span class="credits" >Réalisé par la cellule web du BDE Gobelins</span>
        <div class="footer_links" >
            <a href="" >mentions légales</a> - 
            <a href="" >contact</a>
        </div>
    </footer>
</div> <!-- container -->

<div class="overlay" >
    <div class="adherer_popup" >
        <a href="#" class="close" >
            <img src="<?php bloginfo('template_url') ?>/images/close.png" />
        </a>
        <h2>Adhère au BDE !</h2>
        <p>
            Il te suffit d'être un élève de Gobelins et de remplir ce formulaire, après quoi tu seras redirigé sur le site Paypal afin
            de finaliser la transaction correspondant au montant de l'adhésion. Tu peux également remplir ce formulaire papier et nous le retourner
            accompagné de ta cotisation de 10 €.
        </p>
        <form action="<?php bloginfo('url') ?>/process.php" method="POST" >
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="7HSF8NGD94D68">
            <p><label for="last_name" >Nom *</label> <input type="text" id="last_name" name="last_name" /></p>
            <p><label for="first_name" >Prénom *</label> <input type="text" id="first_name" name="first_name" /></p>
            <p><label for="email" >Adresse e-mail *</label> <input type="email" id="email" name="email" /></p>
            <p><label for="birthdate" >Date de naissance *</label> <input type="text" id="birthdate" name="birthdate" /></p>
            <p><label for="address1" >Adresse *</label> <input type="text" id="address1" name="address1" /></p>
            <p><label for="zip" >Code Postal *</label> <input type="text" id="zip" name="zip" /></p>
            <p><label for="city" >Ville *</label> <input type="text" id="city" name="city" /></p>
            <p><label for="formation" >Formation *</label> <input type="text" name="formation" id="formation" /></p>
            <p><label for="option" >Option *</label> <input type="text" name="option" id="option" /></p>

            <p>
                <input type="submit" value="Check it out !" />
            </p>
        </form> 
    </div>
</div>


<?php wp_footer(); ?>
<script src="<?php bloginfo('template_url') ?>/js/jquery.easing.js" ></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script src="<?php bloginfo('template_url') ?>/js/slider.js" ></script>

<?php if (isset($_GET['form_error'])) { ?>
    <script src="http://"
<?php } ?>

</body>

</html>