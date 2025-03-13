<div class="container mt-5">
    <!-- Titre principal -->
    <h1 class="text-center mb-4 text-primary">Liste des avis</h1>

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

                <form action="index.php?controller=Avis&action=find" method="POST" class="d-flex justify-content-center">
                    <input
                        type="text"
                        class="form-control me-2"
                        name="query"
                        placeholder="Recherchez un avis"
                        aria-label="Rechercher">
                    <button type="submit" class="btn btn-outline-light btn-lg">Rechercher</button>
                </form>
            </div>

        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Id-Avis</th>
                        <th>Nom</th>
                        <th>Commentaire</th>
                        <th>Évènement</th>
                        <th>Date du commentaire</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($avis as $avis) : ?>
                        <tr>
                            <td><?php echo ($avis->id_avis); ?></td>
                            <td><?php echo ($avis->nom); ?></td>
                            <td><?php echo ($avis->commentaire); ?></td>
                            <td><?php echo ($avis->nom_programmation); ?></td>
                            <td><?php echo ($avis->date_commentaire); ?></td>
                            <td>
                                <a href="index.php?controller=Avis&action=deleteAvis&id=<?php echo $avis->id_avis; ?>"
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