<div class="container mt-5">
    <?php if (!empty($message)): ?>
        <div class="alert alert-info" role="alert">
            <?php echo $message; ?>
        </div>
    <?php endif; ?>


    <h1 class="text-center mb-4">Ajouter un utilisateur</h1>

    <form action="index.php?controller=Utilisateur&action=add" method="post">
        <div class=" mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez le nom d'utilisateur" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password :</label>
            <input type="text" class="form-control" id="password" name="password" rows="3" placeholder="Définissez votre password" required></textarea>
        </div>

        <div class="form-group">
            <label for="email"><b>Email :</b></label>
            <input type="email" id="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="statut" class="form-label">Statut :</label>
            <input type="text" class="form-control" id="statut" name="statut" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-outline-light btn-lg">Envoyer</button>
        </div>
    </form>
</div>