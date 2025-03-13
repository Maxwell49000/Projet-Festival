// document.querySelector('.myForm').addEventListener('submit', function (e) {
//     e.preventDefault();
//     let isValid = true;

//     // Validation du nom d'evenement:
//     const nom = document.getElementById('nom');
//     const nomError = document.getElementById('nomError');
//     if (nom.value.length < 3) {
//         nomError.textContent = "Le nom de l'evenement doit contenir au moins 3 caractères.";
//         nomError.style.display = "block";
//         isValid = false;
//     } else {
//         nomError.style.display = "none";
//     }

//     // Validation de la description:
//     const description = document.getElementById('description');
//     const descriptionError = document.getElementById('descriptionError');


//     if (description.value.length < 5) {
//         descriptionError.textContent = "La description doit contenir au moins 5 caractères.";
//         descriptionError.style.display = "block";
//         isValid = false;
//     } else {
//         descriptionError.style.display = "none";
//     }

//     // Validation de la photo:
//     const photoInput = document.getElementById('photo');
//     const photoError = document.getElementById('photoError');
//     // Accède au fichier sélectionné
//     const file = photoInput.files[0];



//     // Vérifie si un fichier est sélectionné
//     if (!file) {
//         photoError.textContent = "Veuillez sélectionner un fichier.";
//         photoError.style.display = "block";
//         return;
//     } else {
//         photoError.style.display = "none";
//     }

//     // Vérifie la taille du fichier (par exemple, 2 Mo max)
//     const maxSizeInMB = 2;
//     if (file.size > maxSizeInMB * 1024 * 1024) {
//         photoError.textContent = `Le fichier dépasse la taille maximale de ${maxSizeInMB} Mo.`;
//         photoError.style.display = "block";
//         return;
//     } else {
//         photoError.style.display = "none";
//     }

//     // Vérifie l'extension du fichier
//     const allowedExtensions = ['jpg', 'jpeg', 'png'];
//     const fileExtension = file.name.split('.').pop().toLowerCase();
//     if (!allowedExtensions.includes(fileExtension)) {
//         photoError.textContent = `Seuls les fichiers ${allowedExtensions.join(', ')} sont autorisés.`;
//         photoError.style.display = "block";
//         return;

//     } else {
//         photoError.style.display = "none";
//     }




//     // Validation de la date de l'événement
//     const dateInput = document.getElementById('date_evenement');
//     const dateError = document.getElementById('date_evenementError');

//     console.log(dateInput);






// // Validation de la quantité:
// const age = document.getElementById('age');
// const ageValue = parseInt(age.value);
// const ageError = document.getElementById('ageError');

// if (isNaN(ageValue) || ageValue < 18 || ageValue > 100) {
//     ageError.textContent = "L'age doit être entre 18 et 100 ans";
//     ageError.style.display = "block";
//     isValid = false;
// } else {
//     ageError.style.display = "none";
// }


// // Validation du prix:
// const age = document.getElementById('age');
// const ageValue = parseInt(age.value);
// const ageError = document.getElementById('ageError');

// if (isNaN(ageValue) || ageValue < 18 || ageValue > 100) {
//     ageError.textContent = "L'age doit être entre 18 et 100 ans";
//     ageError.style.display = "block";
//     isValid = false;
// } else {
//     ageError.style.display = "none";
// }

// // Validation de la catégorie:
// const age = document.getElementById('age');
// const ageValue = parseInt(age.value);
// const ageError = document.getElementById('ageError');

// if (isNaN(ageValue) || ageValue < 18 || ageValue > 100) {
//     ageError.textContent = "L'age doit être entre 18 et 100 ans";
//     ageError.style.display = "block";
//     isValid = false;
// } else {
//     ageError.style.display = "none";
// }




//     if (isValid) {
//         alert("Le formulaire est valide et sera envoyé !");
//         this.submit(); // Envoi du formulaire
//     }



// });