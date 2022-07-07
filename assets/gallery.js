import axios from "axios";

let buttonSubmitDate    = document.getElementById("submitDate")
let date                = new Date();

document.getElementById("PictureContent").innerHTML = "<div class=\"w-100 d-flex justify-content-center mt-5\"><i class=\"fa-solid fa-spinner fa-spin fa-2xl\"></i></div>"
axios.get("/gallery/" + date.getFullYear() + "/" + ('0' + (date.getMonth() + 1)).slice(-2))
    .then(function (response) {
        console.log('test')
        document.getElementById("PictureContent").innerHTML = response.data.data;
        addEventDelete(document.querySelectorAll(".btn-danger"))
    })
    .catch(function (e) {
        if (e.response.status === 404) {
            document.getElementById("PictureContent").innerHTML = "<p class='col alert alert-danger'>" + e.response.data.data + "</p>"
        }
    })

buttonSubmitDate.addEventListener('click', () => {
    let year    = document.getElementById("selectYear")
    let month   = document.getElementById("selectMonth")
    if (year.value !== "" && month.value !== "") {
        document.getElementById("PictureContent").innerHTML = "<div class=\"w-100 d-flex justify-content-center mt-5\"><i class=\"fa-solid fa-spinner fa-spin fa-2xl\"></i></div>"
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
            let year    = document.getElementById("selectYear")
            let month   = document.getElementById("selectMonth")
            axios({
                url: "http://www.scrutoscope.live/api/file/images/delete",
                method: "DELETE",
                data: {
                    "fileName": button.dataset.filename,
                    "base64Image": ""
                }
            })
            document.getElementById("PictureContent").innerHTML = "<div class=\"w-100 d-flex justify-content-center mt-5\"><i class=\"fa-solid fa-spinner fa-spin fa-2xl\"></i></div>"
            document.location.reload()
        })
    })
}
