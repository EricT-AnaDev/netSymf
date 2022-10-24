console.log('Hello autoCompTitle');
console.log(searchPath);
const search = document.getElementById("search");
// console.log(search.dataset.searchPath);
const resultSearch = document.getElementById("resultSearch");
let result;

search.onkeyup = ()=>
{
    console.log(search.value);
    fetch(searchPath,
        {
            method:"POST",
            headers: {'Content-Type':'application/x-www-form-urlencoded'},
            body:""
    })
    .then((response) =>response.text())
    .then((texte)=>{console.log(texte)})
}