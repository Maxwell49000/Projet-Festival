<div class="container mt-5">
    <!-- Titre principal -->
    <h1 class="text-center mb-4 text-primary">Gestion des événements</h1>

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
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>Description</th>
                        <th>Date de l'événement</th>
                        <th>Quantité</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($programmations as $programmation) : ?>
                        <tr>
                            <td><?php echo ($programmation->nom); ?></td>
                            <td><?php echo ($programmation->nom_categorie); ?></td>
                            <td><?php echo ($programmation->description); ?></td>
                            <td><?php echo ($programmation->date_evenement); ?></td>
                            <td><?php echo ($programmation->quantite); ?></td>
                            <td><a href="index.php?controller=Admin&action=updateProgrammation&id=<?php echo $programmation->id_programmation; ?>"
                                    class="btn btn-sm btn-info">
                                    <i class="fa-solid fa-pen"></i> Modifier
                                </a></td>
                            <td><a href="index.php?controller=Admin&action=deleteProgrammation&id=<?php echo $programmation->id_programmation; ?>"
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
            <a href="index.php?controller=Admin&action=homeAdmin" class="btn btn-outline-light btn-lg">
                <i class="fa-solid fa-arrow-left"></i> Retour à l'accueil
            </a>
        </div>

    </div>
</div>