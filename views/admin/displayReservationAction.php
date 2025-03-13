<div class="container mt-5">
    <!-- Titre principal -->
    <h1 class="text-center mb-4 text-primary">Liste des reservations</h1>

    <div class="card-footer text-center">
        <a href="index.php?controller=Utilisateur&action=createUtilisateurAction" class="btn btn-outline-light btn-lg">
            Créer une reservations
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
            <h4 class="mb-0">Reservations</h4>

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
                        <th>Id-utilisateur</th>
                        <th>Nom utilisateur</th>
                        <th>Email</th>
                        <th>Id_reservation</th>
                        <th>Nom évènement</th>
                        <th>Quantité reservé</th>
                        <th>Prix</th>
                        <th>Date de l'évènement</th>

                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($reservations as $reservation) : ?>
                        <tr>
                            <td><?php echo ($reservation->id_utilisateur); ?></td>
                            <td><?php echo ($reservation->nom_utilisateur); ?></td>
                            <td><?php echo ($reservation->email); ?></td>
                            <td><?php echo ($reservation->id_reservation); ?></td>
                            <td><?php echo ($reservation->nom_evenement); ?></td>
                            <td><?php echo ($reservation->quantite_reservee); ?></td>
                            <td><?php echo ($reservation->prix);  ?> €</td>
                            <td><?php echo ($reservation->date_evenement); ?></td>
                            <td>
                                <a href="index.php?controller=Admin&action=deleteReservationAction&id_reservation=<?php echo $reservation->id_reservation; ?>"
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