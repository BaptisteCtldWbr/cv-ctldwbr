function galeriephoto(galerie){
    //prend en paramètre la div.galerie concernée

    let miniature = galerie.querySelectorAll("ul.galerie-mini a")
    //miniature  = liens des images
    let photo     = galerie.querySelector("figure.photo-galerie img")
    //photo = version grande
    let titre     = galerie.querySelector("figure.photo-galerie figcaption")
    //titre = texte associé / title 

    //ajout de l'event listener
    for (let i = 0; i < miniature.length; i++){
        miniature[i].addEventListener("click", function(){
            //La photo devient l'url renseignée dans l'att data-chemin_photo
            photo.src = miniature[i].dataset.chemin_photo
            //Le titre devient le title du lien de la miniature
            titre.innerHTML = miniature[i].title

            //retirer la classe actif à toutes les images
            for(let j = 0; j < miniature.length; j++){
                var miniatureImg = miniature[j].querySelector("img")
                miniatureImg.classList.remove("actif")
            }

            //pour l'ajouter seulement à celle concernée
            var miniatureImg = miniature[i].querySelector("img")
            miniatureImg.classList.add("actif")
        })
    }
}