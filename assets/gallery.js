import axios from "axios";

let buttonSubmitDate = document.getElementById("submitDate")

buttonSubmitDate.addEventListener('click', () => {
    let year = document.getElementById("selectYear")
    let month = document.getElementById("selectMonth")
    if (year.value !== "" && month.value !== "") {
        document.getElementById("PictureContent").innerHTML = "<i class=\"fa-solid fa-spinner fa-spin\"></i>"
        axios.get("/gallery/" + year.value + "/" + month.value)
            .then(function (response) {
                document.getElementById("PictureContent").innerHTML = response.data.data;
                addEventDelete(document.querySelectorAll(".btn-danger"))
            })
            .catch(function (e) {
                if (e.response.status === 404) {
                    document.getElementById("PictureContent").innerHTML = "<p class='col alert alert-danger'>" + e.response.data.data + "</p>"
                }
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
