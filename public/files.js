function previewImage(e) {
    const input = e.target;
    const image = document.getElementById("previewImage");

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            image.src = e.target.result; // Définit la source de l'image
        }
        reader.readAsDataURL(input.files[0]); // Lit le fichier sélectionné
        image.style.display = "block";
    }
}
document.getElementById("photo").addEventListener('change', previewImage);