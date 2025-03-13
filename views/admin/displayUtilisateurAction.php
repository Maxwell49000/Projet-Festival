<div class="container mt-5">
    <!-- Titre principal -->
    <h1 class="text-center mb-4 text-primary">Liste des utilisateurs</h1>

    <div class="card-footer text-center">
        <a href="index.php?controller=utilisateur&action=createUtilisateurAction" class="btn btn-outline-light btn-lg">
            Créer un utilisateur
        </a>
    </div>

    <!-- Message (s'il y en a) -->
    <?php if (!empty($message)) : ?>
        <div class="alert alert-info text-center">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <!-- Tableau des avis -->
    <div class="card shadow-sm">
        <div class="card-header text-white">
            <h4 class="mb-0">Avis</h4>

            <div class="container mt-5">

                <form action="index.php?controller=Utilisateur&action=find" method="POST" class="d-flex justify-content-center">
                    <input
                        type="text"
                        class="form-control me-2"
                        name="query"
                        placeholder="Recherchez un utilisateur"
                        aria-label="Rechercher">
                    <button type="submit" class="btn btn-outline-light btn-lg">Rechercher</button>
                </form>
            </div>

        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Id-Utilisateur</th>
                        <th>Nom</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Statut</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($utilisateurs as $utilisateur) : ?>
                        <tr>
                            <td><?php echo ($utilisateur->id_utilisateur); ?></td>
                            <td><?php echo ($utilisateur->nom); ?></td>
                            <td><?php echo ($utilisateur->password); ?></td>
                            <td><?php echo ($utilisateur->email); ?></td>
                            <td><?php echo ($utilisateur->statut); ?></td>
                            <td><a href="index.php?controller=Admin&action=updateUtilisateur&id=<?php echo $utilisateur->id_utilisateur; ?>"
                                    class="btn btn-sm btn-info">
                                    <i class="fa-solid fa-pen"></i> Modifier
                                </a>

                                <a href="index.php?controller=Utilisateur&action=deleteUser&id=<?php echo $utilisateur->id_utilisateur; ?>"
                                    class="btn btn-sm btn-info">
                                    <i class="fa-regular fa-trash-can"></i> Supprimer
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-center">
            <a href="index.php" class="btn btn-outline-light btn-lg">
                <i class="fa-solid fa-arrow-left"></i> Retour à l'accueil
            </a>
        </div>


    </div>
</div>