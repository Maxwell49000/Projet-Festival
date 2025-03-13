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

            <div class="container mt-5">

                <form action="index.php?controller=Programmation&action=find" method="POST" class="d-flex justify-content-center">
                    <input
                        type="text"
                        class="form-control me-2"
                        name="query"
                        placeholder="Recherchez un évènement"
                        aria-label="Rechercher">
                    <button type="submit" class="btn btn-outline-light btn-lg">Rechercher</button>
                </form>
            </div>

        </div>
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="thead-light">
                    <tr>

                        <th>Nom</th>
                        <th>Description</th>
                        <th>Date de l'événement</th>
                        <th>Prix</th>
                        <th>Place disponible</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result) : ?>
                        <tr>

                            <td><?php echo ($result->nom); ?></td>
                            <td><?php echo ($result->description); ?></td>
                            <td><?php echo ($result->date_evenement); ?></td>
                            <td><?php echo ($result->prix); ?></td>
                            <td><?php echo ($result->quantite); ?></td>
                            <td>
                                <a href="index.php?controller=Programmation&action=show&id=<?php echo $result->id_programmation; ?>"
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
            <a href="index.php" class="btn btn-outline-light btn-lg">
                <i class="fa-solid fa-arrow-left"></i> Retour à l'accueil
            </a>
        </div>

    </div>
</div>