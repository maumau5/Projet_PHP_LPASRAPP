<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Inscription d'un utilisateur</h1>
        </div>
    </div>
    <!--formulaire d'inscription d'un utilisateur au blog -->
    <div class="row">
        <div class="col-12">
            <form method="POST" action="user.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nom">Votre nom</label>
                    <input type="text" required class="form-control" id="nom" name="nom">
                </div>
                <div class="form-group">
                    <label for="prenom">Votre prénom</label>
                    <input type="text" required class="form-control" id="prenom" name="prenom">
                </div>
                <div class="form-group">
                    <label for="email">Votre adresse mail</label>
                    <input type="email" required class="form-control" id="email" name="email" placeholder="example@gmail.com">
                </div>
                <div class="form-group">
                    <label for="mdp">Votre mot de passe</label>
                    <input type="password" required class="form-control" id="texte" rows="3" name="mdp" placeholder="Entrer ici votre mot de passe">
                </div>
                <button type="submit" class="btn btn-primary" name="submit" value="bouton">Inscription</button>
            </form>
        </div>
    </div>


</div>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.slim.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>