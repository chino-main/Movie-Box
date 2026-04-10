function openAddDialog(){
    const dialog = document.getElementById('add-dialog');
    const formContainer = document.getElementById('form-add-movie');

    fetch('/moviesCrud/back-end/models/add_movie.php')
        .then(response => response.text())
        .then(html => {
            formContainer.innerHTML = html;
            const addForm = document.getElementById('add-movie-form');
            addForm.addEventListener("submit", function(e) {
                e.preventDefault();
                submitAddForm(addForm);
            });
            dialog.showModal();
        })
        .catch(error => console.error("Error:", error));
}

function closeDialog(dialogId){
    const dialog = document.getElementById(dialogId);
    dialog.classList.add('closing')

    dialog.addEventListener('animationend', ()=>{
        dialog.close();
        dialog.classList.remove('closing');

    },{ once: true});
}

function submitAddForm(form) {
    const formData = new FormData(form);

    fetch('/moviesCrud/back-end/models/insert_movie.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('add-dialog').close();
            window.location.reload();
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error("Error:", error));
}

function openDeleteDialog(id){
    const dialog = document.getElementById('delete-dialog');
    const dialogContainer = document.getElementById('delete-dialog-container');
    
    fetch('/moviesCrud/back-end/models/remove_movie.php?id=' + id)
        .then(response => response.text())
        .then(html => {
            dialogContainer.innerHTML = html;
            dialog.showModal();
        })
        .catch(error => console.error("Error:", error));
}

function confirmDelete(id){
    fetch('/moviesCrud/back-end/models/delete_movie.php?id=' + id, {
        method: 'POST'
    })
    .then(response => response.text())
    .then(data => {
        innerHTML = data;
        location.reload();
    })
    .catch(error => console.error("Error:", error));
}

function openEditDialog(id){
    const dialog = document.getElementById('edit-dialog');
    const formContainer = document.getElementById('edit-form-container');

    fetch('/moviesCrud/back-end/models/update_movie.php?id=' + id)
        .then(response => response.text())
        .then(html => {
            formContainer.innerHTML = html;
            const editForm = document.getElementById('edit-movie-form');
            editForm.addEventListener("submit", function(e) {
                e.preventDefault();
                submitEditForm(editForm);
            });
            dialog.showModal();
        })
        .catch(error => console.error("Error:", error));
}

function submitEditForm(form) {
    const formData = new FormData(form);
    fetch('/moviesCrud/back-end/models/edit_movie.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById('edit-dialog').close();
            location.reload();
        } else {
            alert(data.message);
        }
    })
    .catch(error => console.error("Error:", error));
}
