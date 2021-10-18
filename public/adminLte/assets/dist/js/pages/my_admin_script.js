function create_product() {
    let pro_name = $('#pro_name').val()
    console.log(pro_name)
}

document.getElementById('file-input').onchange = function () {
    loadImage(
        this.files[0],
        function (img) {
            document.body.appendChild(img)
        }, 
        { maxWidth: 600 } // Options
    )
}
