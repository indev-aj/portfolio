function getSummary() {

    // get summary
    input_summary = document.getElementById("input-summary");
    summary = document.getElementsByClassName("input-summary")[0];

    // get language
    input_language = document.getElementById("input-language");
    language = document.getElementsByClassName("input-language")[0];

    // ! change this to summary-type input
    // ! this code is causing bug where page that doesnt have this input field giving error 
    // if (language.innerText != '')
    //     var l = language.innerText.split(",");
    //     input_language.value = l;

    input_summary.value = summary.innerText;
    
}

// select image and preview
document.addEventListener('DOMContentLoaded', function () {
    // Your code that uses querySelectorAll goes here
    document.getElementById('thumbnail').addEventListener('change', function () {
        const uploadArea = document.querySelector('.upload-area');
        const previewImg = document.querySelector('.preview-img');

        const file = this.files[0]; // Get the selected file
        console.log("here we goo");

        if (file) {
            console.log("imge selected");
            // Display the selected file's name in the upload-area
            uploadArea.innerHTML = `
        <img src="../icons/upload.png" alt="">
        <p>${file.name}</p>
        `;

            // Optionally, you can also display a preview of the selected image
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImg.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            console.log("noooooo");
            // If no file is selected, restore the default content
            uploadArea.innerHTML = `
        <img src="../icons/upload.png" alt="">
        <p>Click here or Drag and Drop Image Over Here</p>
    `;
            previewImg.src = "../images/115x140.svg";
        }
    });
});


