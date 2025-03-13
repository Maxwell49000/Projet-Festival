<div class="container mt-5">
    <!-- Titre principal -->
    <h1 class="text-center mb-4 text-primary">Liste des événements</h1>

    <!-- Message (s'il y en a) -->
    <?php if (!empty($message)) : ?>
        <div class="alert alert-info text-center">
            <?php echo htmlspecialchars($message); ?>
        </div>
    <?php endif; ?>

    <!-- Recherche d'événement -->
    <div class="card shadow-sm mb-4">
        <div class="card-header text-white">
            <h4 class="mb-0 text-center">Rechercher un événement</h4>
        </div>
        <div class="card-body">
            <form action="index.php?controller=Programmation&action=find" method="POST" class="row g-2 justify-content-center">
                <div class="col-12 col-md-8">
                    <input
                        type="text"
                        class="form-control"
                        name="query"
                        placeholder="Recherchez un événement"
                        aria-label="Rechercher">
                </div>
                <div class="col-12 col-md-auto">
                    <button type="submit" class="btn btn-outline-light btn-lg">Rechercher</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tableau des événements -->
    <div class="card shadow-sm">
        <div class="card-header text-white">
            <h4 class="mb-0">Événements disponibles</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive d-none d-md-block">
                <table class="table table-striped table-hover align-middle text-center">
                    <thead class="thead-light">
                        <tr>
                            <th class="td">Photo</th>
                            <th class="td">Nom</th>
                            <th class="td">Catégorie</th>
                            <th class="td">Description</th>
                            <th class="td">Date</th>
                            <th class="td">Places</th>
                            <th class="td">Prix</th>
                            <th class="td">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($programmations as $programmation) : ?>
                            <tr>
                                <td class="td">
                                    <img src="<?php echo htmlspecialchars($programmation->photo); ?>"
                                        alt="Photo"
                                        class="img-fluid rounded"
                                        style="max-width: 150px; height: auto;">
                                </td>
                                <td class="td"><?php echo htmlspecialchars($programmation->nom); ?></td>
                                <td class="td"><?php echo htmlspecialchars($programmation->nom_categorie); ?></td>
                                <td class="td"><?php echo htmlspecialchars($programmation->description); ?></td>
                                <td class="td"><?php echo htmlspecialchars($programmation->date_evenement); ?></td>
                                <td class="td"><?php echo htmlspecialchars($programmation->quantite); ?></td>
                                <td class="td"><?php echo htmlspecialchars($programmation->prix); ?> €</td>
                                <td class="td">
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

            <!-- Vue mobile : liste au lieu de tableau -->
            <div class="d-block d-md-none">
                <?php foreach ($programmations as $programmation) : ?>
                    <div class="card mb-3 shadow-sm">
                        <div class="row g-0">
                            <div class="col-4">
                                <img src="<?php echo htmlspecialchars($programmation->photo); ?>"
                                    alt="Photo"
                                    class="img-fluid rounded"
                                    style="max-width: 100%; height: auto;">
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo htmlspecialchars($programmation->nom); ?></h5>
                                    <p class="card-text">
                                        <strong>Catégorie :</strong> <?php echo htmlspecialchars($programmation->nom_categorie); ?><br>
                                        <strong>Date :</strong> <?php echo htmlspecialchars($programmation->date_evenement); ?><br>
                                        <strong>Places :</strong> <?php echo htmlspecialchars($programmation->quantite); ?><br>
                                        <strong>Prix :</strong> <?php echo htmlspecialchars($programmation->prix); ?> €
                                    </p>
                                    <a href="index.php?controller=Programmation&action=show&id=<?php echo $programmation->id_programmation; ?>"
                                        class="btn btn-info btn-block">
                                        <i class="fa-solid fa-eye"></i> Voir
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="index.php" class="btn btn-outline-light btn-lg">
                <i class="fa-solid fa-arrow-left"></i> Retour à l'accueil
            </a>
        </div>
    </div>
</div>