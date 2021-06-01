<div class="container mt-4">
	<div class="row d-flex justify-content-center">
		<div class="col-auto">
			<?= Alerts::getFlash(); ?>
			<form method="post" action="">
  				<div class="mb-3">
    				<label for="nom" class="form-label">Nom</label>
    				<input type="text" name="nom" id="nom" class="form-control">
  				</div>
  				<div class="mb-3">
    				<label for="prenom" class="form-label">Prénom</label>
    				<input type="text" name="prenom" id="prenom" class="form-control">
  				</div>
  				<div class="mb-3">
    				<label for="email" class="form-label">Adresse email</label>
    				<input type="email" name="email" id="email" class="form-control">
  				</div>
  				<div class="mb-3">
    				<label for="mdp" class="form-label">Mot de passe</label>
    				<input type="password" name="mdp" id="mdp" class="form-control">
  				</div>
  				<div class="d-flex justify-content-center">
  					<button type="submit" name="inscription" class="btn btn-primary">
  						Créer un compte
  					</button>
  				</div>
			</form>
		</div>
	</div>
</div>