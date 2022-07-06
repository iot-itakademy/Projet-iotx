import axios from "axios";
import {getElement} from "bootstrap/js/src/util";

let buttonSubmitDate = document.getElementById("submitDate")

buttonSubmitDate.addEventListener('click', () => {
    let year = document.getElementById("selectYear")
    let month = document.getElementById("selectMonth")
    if (year.value !== "" && month.value !== "") {
        document.getElementById("PictureContent").innerHTML = "<i class=\"fa-solid fa-spinner-third\"></i>"
        axios.get("/gallery/" + year.value + "/" + month.value)
            .then(function (response) {
                document.getElementById("PictureContent").innerHTML = "";
                response.data.forEach(element => {

                })

            })
    } else {
        alert("Veuillez sélectionnez une période.")
    }
})