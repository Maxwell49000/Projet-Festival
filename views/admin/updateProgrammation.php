<!-- Formulaire pour modifier une programmation -->
<?php if (!empty($message)): ?>
    <p class="alert alert-info"><?php echo $message; ?></p>
<?php endif; ?>
<h1 class="text-center mb-4">Modifier un évènement</h1>
<form action="index.php?controller=Admin&action=update" method="post" class="container">
    <fieldset class="border p-4 rounded">
        <div class="form-group">
            <!-- champs id_programmation en hidden pour le faire passer -->
            <input type="hidden" id="id_programmation" name="id_programmation" value="<?php echo $programmation->id_programmation; ?>">
        </div>
        <div class="form-group">
            <label for="nom"><b>Nom :</b></label>
            <input type="text" id="nom" name="nom" class="form-control" value="<?php echo $programmation->nom; ?>">
        </div>
        <div class="form-group">
            <label for="description"><b>Description :</b></label>
            <input type="text" id="description" name="description" class="form-control" value="<?php echo $programmation->description; ?>">
        </div>
        <div class="form-group">
            <label for="photo"><b>Photo actuelle :</b></label>
            <!-- Aperçu de l'image actuelle -->
            <?php if (!empty($programmation->photo)) : ?>
                <img src="IMG/<?php echo htmlspecialchars($programmation->photo); ?>" alt="Image actuelle" style="max-width: 200px; max-height: 200px;">
            <?php else : ?>
                <p>Aucune image disponible</p>
            <?php endif; ?>
            <div class="form-group">
                <label for="photo"><b>Photo :</b></label>
                <input type="file" id="photo" name="photo" class="form-control" value="<?php echo $programmation->photo; ?>">
            </div>
            <div class="form-group">
                <label for="date_evenement"><b>Date de l'évènement :</b></label>
                <input type="date" id="date_evenement" name="date_evenement" class="form-control" value="<?php echo substr($programmation->date_evenement, 0, 10); ?>">
            </div>
            <div class="form-group">
                <label for="quantite"><b>Quantité :</b></label>
                <input type="number" id="quantite" name="quantite" class="form-control" value="<?php echo $programmation->quantite; ?>">
            </div>
            <div class="form-group">
                <label for="prix"><b>Prix :</b></label>
                <input type="number" id="prix" name="prix" class="form-control" value="<?php echo $programmation->prix; ?>">
            </div>
            <div class="form-group">
                <label for="categorie"><b>Catégorie :</b></label>
                <select id="categorie" name="categorie" class="form-control" required>
                    <option value="" disabled>Choisissez une catégorie</option>
                    <?php foreach ($categories as $categorie): ?>
                        <option value="<?php echo $categorie->id_categorie; ?>"
                            <?php echo ($categorie->id_categorie == $programmation->id_categorie) ? 'selected' : ''; ?>>
                            <?php echo $categorie->nom_categorie; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
    </fieldset>
    <button type="submit" class="btn btn-outline-light btn-lg mt-3">Envoyer</button>
</form>