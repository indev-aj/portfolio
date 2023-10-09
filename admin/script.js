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

function getExp() {
    // Get all elements with the class "input-task"
    var inputTaskElements = document.querySelectorAll('.input-task');

    // Convert the NodeList to an array using Array.from()
    var inputTaskArray = Array.from(inputTaskElements);

    // Loop through each input-task element
    inputTaskArray.forEach(function (inputTaskElement) {
        // Get the corresponding input field with the same index
        var index = inputTaskArray.indexOf(inputTaskElement);
        var inputField = document.querySelectorAll('input[name="input-task[]"]')[index];

        // Transfer the value from the div to the input field
        inputField.value = inputTaskElement.textContent;
        console.log(inputField.value);
    });

}

function addTask() {
    // Create a new input field
    var newInput = document.createElement('input');
    newInput.type = 'text';
    newInput.name = 'input-task[]';
    newInput.id = 'input-task';
    newInput.style.display = 'none';

    // Create a new editable div
    var newDiv = document.createElement('div');
    newDiv.contentEditable = true;
    newDiv.className = 'input-task';
    newDiv.setAttribute('data-placeholder', 'Enter text here');

    // Create a new delete button
    var newDeleteBtn = document.createElement('div');
    newDeleteBtn.className = 'delete-btn';
    newDeleteBtn.addEventListener('click', function () {
        // Remove the parent container when the delete button is clicked
        taskContainer.removeChild(newInputTaskContainerDiv);
        taskContainer.removeChild(newDeleteBtn);
    });

    var newImg = document.createElement('img');
    newImg.src = '../icons/cross.png';
    newDeleteBtn.appendChild(newImg);

    // Create a new input task container div
    var newInputTaskContainerDiv = document.createElement('div');
    newInputTaskContainerDiv.className = "input-task-container";

    // Get the existing task container
    var taskContainer = document.querySelector('.task-container');

    // Append the new input, div, to new input task container div
    newInputTaskContainerDiv.appendChild(newInput);
    newInputTaskContainerDiv.appendChild(newDiv);

    // Get the add task button
    var addTaskButton = document.querySelector('.add-task-btn');

    // Append input task container and button to the existing taskcontainer
    taskContainer.insertBefore(newInputTaskContainerDiv, addTaskButton);
    taskContainer.insertBefore(newDeleteBtn, addTaskButton);
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


