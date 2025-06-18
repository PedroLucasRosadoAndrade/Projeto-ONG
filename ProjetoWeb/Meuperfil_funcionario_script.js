// document.addEventListener('DOMContentLoaded', function() {
//     const editProfileBtn = document.getElementById('editProfileBtn');
//     const saveProfileBtn = document.getElementById('saveProfileBtn');
//     const cancelEditBtn = document.getElementById('cancelEditBtn');

//     const profileInputs = document.querySelectorAll('.profile-details input');

//     function toggleEditMode(isEditing) {
//         profileInputs.forEach(input => {
//             input.readOnly = !isEditing; 
//             if (isEditing) {
//                 input.style.backgroundColor = 'white'; 
//             } else {
//                 input.style.backgroundColor = '#f0f0f0'; 
//             }
//         });

//         editProfileBtn.style.display = isEditing ? 'none' : 'inline-block';
//         saveProfileBtn.style.display = isEditing ? 'inline-block' : 'none';
//         cancelEditBtn.style.display = isEditing ? 'inline-block' : 'none';
//     }

    
//     let originalValues = {};
//     function saveOriginalValues() {
//         profileInputs.forEach(input => {
//             originalValues[input.id] = input.value;
//         });
//     }


//     editProfileBtn.addEventListener('click', function() {
//         saveOriginalValues(); 
//         toggleEditMode(true);
//     });

    
//     // saveProfileBtn.addEventListener('click', function() {
        
//     //     alert('Informações salvas!');
//     //     toggleEditMode(false);
//     // });

//     //cancelamento//
//     cancelEditBtn.addEventListener('click', function() {
//         profileInputs.forEach(input => {
//             input.value = originalValues[input.id];
//         });
//         toggleEditMode(false); 
//         alert('Edição cancelada');
//     });
    
// });

// document.addEventListener("DOMContentLoaded", function () {
//     const editBtn = document.getElementById("editProfileBtn");
//     const saveBtn = document.getElementById("saveProfileBtn");
//     const cancelBtn = document.getElementById("cancelEditBtn");
//     const inputs = document.querySelectorAll("form input");

//     editBtn.addEventListener("click", () => {
//         inputs.forEach(input => {
//             input.removeAttribute("readonly");
//         });
//         editBtn.style.display = "none";
//         saveBtn.style.display = "inline-block";
//         cancelBtn.style.display = "inline-block";
//     });

//     cancelBtn.addEventListener("click", () => {
//         window.location.reload(); // Recarrega a página para restaurar os valores
//     });
// });


document.addEventListener('DOMContentLoaded', function () {
    const editProfileBtn = document.getElementById('editProfileBtn');
    const saveProfileBtn = document.getElementById('saveProfileBtn');
    const cancelEditBtn = document.getElementById('cancelEditBtn');

    const profileInputs = document.querySelectorAll('.profile-details input');
    const form = document.querySelector('form');

    let originalValues = {};

    // Salva os valores originais antes de editar
    function saveOriginalValues() {
        profileInputs.forEach(input => {
            originalValues[input.id] = input.value;
        });
    }

    // Alterna entre modo de edição e visualização
    function toggleEditMode(isEditing) {
        profileInputs.forEach(input => {
            input.readOnly = !isEditing;
            input.style.backgroundColor = isEditing ? 'white' : '#f0f0f0';
        });

        editProfileBtn.style.display = isEditing ? 'none' : 'inline-block';
        saveProfileBtn.style.display = isEditing ? 'inline-block' : 'none';
        cancelEditBtn.style.display = isEditing ? 'inline-block' : 'none';
    }

    // Ao clicar em "Editar Perfil"
    editProfileBtn.addEventListener('click', function (e) {
        e.preventDefault(); // Impede qualquer envio de formulário
        saveOriginalValues();
        toggleEditMode(true);
    });

    // Ao clicar em "Cancelar"
    cancelEditBtn.addEventListener('click', function (e) {
        e.preventDefault(); // Impede qualquer envio de formulário
        profileInputs.forEach(input => {
            input.value = originalValues[input.id];
        });
        toggleEditMode(false);
    });

    // Ao clicar em "Salvar Alterações" (deixa o envio seguir normalmente)
    saveProfileBtn.addEventListener('click', function () {
        // Nenhum preventDefault aqui, o form será enviado normalmente
        toggleEditMode(false); // Opcional, pois a página vai recarregar
    });
});
