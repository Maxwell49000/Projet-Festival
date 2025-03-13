<?php
//  var_dump($_SESSION);
// die; 
?>
<?php if (empty($_SESSION['statut']) || ($_SESSION['statut'] == 'invite')): ?>

    <div class="container mt-5">
        <!-- Titre principal -->
        <h1 class="text-center mb-4 text-primary"><?php echo ($programmation->nom); ?></h1>

        <!-- Carte de la programmation -->
        <div class="card shadow-sm">
            <div class="card-header text-white">
                <h4 class="mb-0">Détails de l'évènement</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th>Nom</th>
                            <th>Catégorie</th>
                            <th>Description</th>
                            <th>Date de l'évènement</th>
                            <th>Place disponible</th>
                            <th>Prix</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="<?php echo ($programmation->photo); ?> " /> </td>
                            <td><?php echo ($programmation->nom); ?></td>
                            <td><?php echo ($programmation->nom_categorie); ?></td>
                            <td><?php echo ($programmation->description); ?></td>
                            <td><?php echo ($programmation->date_evenement); ?></td>
                            <td><?php echo ($programmation->quantite); ?></td>
                            <td><?php echo ($programmation->prix); ?></td>
                            <td>
                                <a href="index.php?controller=Panier&action=ajouterArticle&id=<?php echo $programmation->id_programmation; ?>&quantite=1"
                                    class="btn btn-sm btn-warning">
                                    <i class="fa-solid fa-cart-shopping"></i>Reserver
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Section commentaires -->
            <div class="card shadow-lg">
                <div class="card-header text-white">
                    <h5 class="mb-0"><i class="fas fa-comments"></i> Avis et Commentaires</h5>
                </div>
                <div class="card-body">
                    <?php if (!empty($avis)) : ?>
                        <table class="table table-hover">
                            <thead>
                                <tr class="table-light">
                                    <th scope="col">Nom</th>
                                    <th scope="col">Commentaire</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($avis as $avis) : ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($avis->nom); ?></td>
                                        <td><?php echo htmlspecialchars($avis->commentaire); ?></td>
                                        <td><?php echo htmlspecialchars($avis->date_commentaire); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <div class="alert alert-secondary text-center" role="alert">
                            Aucun commentaire pour le moment.
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-footer text-center">
                    <a href="index.php?controller=Programmation&action=displayProgrammationAction" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-arrow-left"></i> Retour à la liste
                    </a>
                </div>
            </div>
        <?php elseif (isset($_SESSION['statut']) &&  $_SESSION['statut'] == 1): ?>

            <div class="container mt-5">
                <!-- Titre principal -->
                <h1 class="text-center mb-4 text-primary"><?php echo ($programmation->nom); ?></h1>

                <!-- Carte de la programmation -->
                <div class="card shadow-sm">
                    <div class="card-header text-white">
                        <h4 class="mb-0">Détails de l'évènement</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th></th>
                                    <th>Nom</th>
                                    <th>Catégorie</th>
                                    <th>Description</th>
                                    <th>Date de l'évènement</th>
                                    <th>Place disponible</th>
                                    <th>Prix</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="<?php echo ($programmation->photo); ?> " /> </td>
                                    <td><?php echo ($programmation->nom); ?></td>
                                    <td><?php echo ($programmation->nom_categorie); ?></td>
                                    <td><?php echo ($programmation->description); ?></td>
                                    <td><?php echo ($programmation->date_evenement); ?></td>
                                    <td><?php echo ($programmation->quantite); ?></td>
                                    <td><?php echo ($programmation->prix); ?></td>
                                    <td>
                                        <a href="index.php?controller=Panier&action=ajouterArticle&id=<?php echo $programmation->id_programmation; ?>&quantite=1"
                                            class="btn btn-sm btn-warning">
                                            <i class="fa-solid fa-cart-shopping"></i>Reserver
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Section commentaires -->
                    <div class="card shadow-lg">
                        <div class="card-header text-white">
                            <h5 class="mb-0"><i class="fas fa-comments"></i> Avis et Commentaires</h5>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($avis)) : ?>
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="table-light">
                                            <th scope="col">Nom</th>
                                            <th scope="col">Commentaire</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($avis as $avis) : ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($avis->nom); ?></td>
                                                <td><?php echo htmlspecialchars($avis->commentaire); ?></td>
                                                <td><?php echo htmlspecialchars($avis->date_commentaire); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <div class="alert alert-secondary text-center" role="alert">
                                    Aucun commentaire pour le moment.
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer text-center">
                            <a href="index.php?controller=Programmation&action=displayProgrammationAction" class="btn btn-outline-light btn-lg">
                                <i class="fas fa-arrow-left"></i> Retour à la liste
                            </a>
                        </div>
                    </div>



                    <!-- Formulaire pour ajouter un commentaire -->
                    <div class="card-footer">
                        <h5 class="text-primary"><i class="fas fa-pen"></i> Ajouter un commentaire</h5>
                        <form action="index.php?controller=Avis&action=ajouterCommentaireAction" method="POST">
                            <div class="form-group mb-3">
                                <label for="nom">Votre nom :</label>
                                <input type="text" id="nom" name="nom" class="form-control" placeholder="Entrez votre nom" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="commentaire">Votre commentaire :</label>
                                <textarea id="commentaire" name="commentaire" class="form-control" rows="4" placeholder="Écrivez votre commentaire" required></textarea>
                            </div>
                            <input type="hidden" name="id_programmation" value="<?php echo htmlspecialchars($programmation->id_programmation); ?>">
                            <button type="submit" class="btn btn-outline-light btn-lg">
                                <i class="fas fa-paper-plane"></i> Publier
                            </button>
                        </form>
                    <?php endif; ?>
                    </div>
                </div>