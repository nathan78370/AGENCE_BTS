<div class="container mt-5">
	<div class="d-flex justify-content-center">
		<div class="col-auto">
			<h3 class="text-center mb-3">Ajouter un logement</h3>
			<form method="post" action="">
				<div class="mb-3">
					<label for="adresse" class="form-label">Adresse</label>
					<textarea name="adresse" id="adresse" class="form-control"></textarea>
				</div>
				<div class="mb-3">
					<label for="ville" class="form-label">Ville</label>
					<input type="text" name="ville" id="ville" class="form-control">
				</div>
				<div class="mb-3">
					<label for="pieces" class="form-label">Nombre de pièces</label>
					<input type="number" name="nbPieces" id="pieces" class="form-control">
				</div>
				<div class="mb-3">
					<label for="surface" class="form-label">Surface</label>
					<input type="number" name="surface" id="surface" class="form-control">
				</div>
				<div class="mb-3">
					<label for="prix" class="form-label">Prix</label>
					<input type="number" name="prix" id="prix" class="form-control">
				</div>
				<div class="d-flex justify-content-center">
					<button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
				</div>
			</form>
		</div>
	</div>
</div>