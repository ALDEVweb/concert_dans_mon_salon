function verifNewMsg(){
    fetch("surveiller_message.php")
    .then(ret => {
        return ret.json();
    })
    .then(data => {
        let dateCompare = Date.now() - 3000;
        let dateLastMsg = new Date(data.dateMsg).getTime()
        if(dateLastMsg > dateCompare){
            let auteur = data.auteur;
            let premiereLettre = auteur[0].toLowerCase();
            let d = "";
            if('aeiou'.includes(premiereLettre)){
                d = "d'";
            }else{
                d = "de ";
            }
            alertNewMsg();
            msg.innerText = `Nouveau message ${d}${data.auteur} !`;
        }
    })
}

function alertNewMsg(){
    let popup = document.getElementById("popup");
    popup.classList.remove("d-none");
}

let msg = document.getElementById("msgPopup")

setInterval(verifNewMsg, 3000);

let cross = document.getElementById("cross");
cross.addEventListener("click", (e) =>{
    popup.classList.add("d-none");
})
