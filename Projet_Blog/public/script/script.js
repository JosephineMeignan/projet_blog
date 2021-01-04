let text = document.getElementById('search-input');
text.addEventListener('keyup', searchArticle)

let category = document.querySelectorAll('.navCategory');

console.log(category);


function searchArticle() {
    console.log(text.value);
    var filter = text.value.toUpperCase() //on pourra mettre des majuscules ou caractères spéciaux il n'y aura pas de problème

    var searchDisplay, i;
    let articleClass = document.querySelectorAll(".article");

    for (i = 0; i < articleClass.length; i++) {
        articlefound = articleClass[i];
        searchDisplay = articlefound.innerText;
        if (searchDisplay.toUpperCase().indexOf(filter) > -1) {
            articleClass[i].style.display = "";

        } else {
            articleClass[i].style.display = "none";

        }
    }
};


for (x=0; x<category.length; x++){
    category[x].addEventListener('click', (event)=>{
        categoryTxt = event.target; 
        console.log(categoryTxt.innerText);
        var filter = categoryTxt.innerText.toUpperCase() //on pourra mettre des majuscules ou caractères spéciaux il n'y aura pas de problème

        var searchDisplay, i;
        let articleClass = document.querySelectorAll(".article");

         for (i = 0; i < articleClass.length; i++) {
            articlefound = articleClass[i];
            searchDisplay = articlefound.innerText;
            if (searchDisplay.toUpperCase().indexOf(filter) > -1) {
                articleClass[i].style.display = "";

            } else {
                articleClass[i].style.display = "none";

            }
        }
    }); 
}