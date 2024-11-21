function galeriephoto(galerie){
    //prend en paramètre la div.galerie concernée

    let miniature = galerie.querySelectorAll("ul.galerie-mini a")
    //miniature  = liens des images
    let photo     = galerie.querySelector("figure.photo-galerie img")
    //photo = version grande
    let titre     = galerie.querySelector("figure.photo-galerie figcaption")
    //titre = texte associé / title 

    //photo actuellement "diffusée"
    let photoActuelle = 0;
    //nb de photos, moins 1 pour correspondre aux clés de la liste
    let nbPhoto = miniature.length - 1;


    //Ajout de la classe 'actif' à la première miniature 
    galerie.querySelector("ul.galerie-mini a img:nth-child(1)").classList.add("actif");

    //ajout de l'event listener
    for (let i = 0; i < miniature.length; i++){
        miniature[i].addEventListener("click", function(){
            //La photo devient l'url renseignée dans l'att data-chemin_photo
            photo.src = miniature[i].dataset.chemin_photo
            //Le titre devient le title du lien de la miniature
            titre.innerHTML = miniature[i].title

            //retirer la classe actif à toutes les images
            for(let j = 0; j < miniature.length; j++){
                miniature[j].querySelector("img").classList.remove("actif");
            }

            //pour l'ajouter seulement à celle concernée
            var miniatureImg = miniature[i].querySelector("img")
            miniatureImg.classList.add("actif")

            //actualisation de la photo "diffusée"
            photoActuelle = i;
        })
    }

    //les deux boutons de défilement
    let btnPhotoSuivante   = galerie.querySelector(".bi-caret-right-fill");
    let btnPhotoPrecedente = galerie.querySelector(".bi-caret-left-fill");

    //au click sur le bouton photo suivante 
    btnPhotoSuivante.addEventListener("click", function(){

        //Photo suivante, ou première si on est à la dernière
        let PhotoSuivante = photoActuelle + 1;
        if (PhotoSuivante > nbPhoto){
            PhotoSuivante = 0;
        }
        //changement de photo
        photo.src = miniature[PhotoSuivante].dataset.chemin_photo;
        titre.innerText = miniature[PhotoSuivante].dataset.titre;
        miniature[photoActuelle].querySelector("img").classList.remove("actif");
        photoActuelle = PhotoSuivante;
        miniature[photoActuelle].querySelector("img").classList.add("actif");
    })
    
    //au click sur le bouton photo précédente
    btnPhotoPrecedente.addEventListener("click", function(){
        
        //Photo précédente ou dernière si on est à la première 
        let PhotoPrecedente = photoActuelle - 1;
        if (PhotoPrecedente < 0){
            PhotoPrecedente = nbPhoto;
        }
        //changement de photo
        photo.src = miniature[PhotoPrecedente].dataset.chemin_photo;
        titre.innerText = miniature[PhotoPrecedente].dataset.titre;
        photoActuelle = PhotoPrecedente;
        miniature[photoActuelle].querySelector("img").classList.remove("actif");
        miniature[photoActuelle].querySelector("img").classList.add("actif");
    }) 
}