import axios from "axios";

let buttonSubmitDate = document.getElementById("submitDate")

buttonSubmitDate.addEventListener('click', () => {
    let year = document.getElementById("selectYear")
    let month = document.getElementById("selectMonth")
    if (year.value !== "" && month.value !== "") {
        document.getElementById("PictureContent").innerHTML = "<i class=\"fa-solid fa-spinner-third\"></i>"
        axios.get("/gallery/" + year.value + "/" + month.value)
            .then(function (response) {
                document.getElementById("PictureContent").innerHTML = response.data.data;
                addEventDelete(document.querySelectorAll(".btn-danger"))
            })
    } else {
        alert("Veuillez sélectionnez une période.")
    }
})
function addEventDelete(listButtonDelete) {
    listButtonDelete.forEach(button => {
        button.addEventListener('click', () => {
            console.log(button.dataset.filename)
            axios.post("http://www.scrutoscope.live/api/file/images/delete", {
                "fileName": button.dataset.filename
            })
        })
    })
}
