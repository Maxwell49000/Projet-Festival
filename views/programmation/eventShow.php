<div class="container mt-5">
    <!-- Titre principal -->
    <h1 class="text-center mb-4 text-primary">Liste des événements</h1>

    <!-- Message (s'il y en a) -->
    <?php if (!empty($message)) : ?>
        <div class="alert alert-info text-center">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <!-- Tableau des événements -->
    <div class="card shadow-sm">
        <div class="card-header text-white">
            <h4 class="mb-0">Événements disponibles</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="thead-light">
                    <tr>
                        <th></th>
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>Description</th>
                        <th>Date de l'événement</th>
                        <th>Place disponible</th>
                        <th>Prix</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($programmation as $programmation) : ?>
                        <tr>
                            <td><img src="<?php echo ($programmation->photo); ?> " /> </td>
                            <td><?php echo ($programmation->nom); ?></td>
                            <td><?php echo ($programmation->nom_categorie); ?></td>
                            <td><?php echo ($programmation->description); ?></td>
                            <td><?php echo ($programmation->date_evenement); ?></td>
                            <td><?php echo ($programmation->quantite); ?></td>
                            <td><?php echo ($programmation->prix); ?></td>
                            <td>
                                <a href="index.php?controller=Programmation&action=show&id=<?php echo $programmation->id_programmation; ?>"
                                    class="btn btn-sm btn-info">
                                    <i class="fa-solid fa-eye"></i> Voir
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-center">
            <a href="index.php" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i> Retour à l'accueil
            </a>
        </div>

    </div>
</div>