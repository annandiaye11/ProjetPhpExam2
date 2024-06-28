import { FournisseurModel } from "./model/FournisseurModel.js"

document.addEventListener("DOMContentLoaded", (e)=> {
    const telFour = document.getElementById("telephone")
    telFour.addEventListener("input", ()=> {
        const fourModel = new FournisseurModel();
        if (telFour.value.length >= 9) {
            fourModel.findFournisseurByTel(telFour.value);
        }

    })
})