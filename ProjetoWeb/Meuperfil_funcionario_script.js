document.addEventListener('DOMContentLoaded', function() {
    const editProfileBtn = document.getElementById('editProfileBtn');
    const saveProfileBtn = document.getElementById('saveProfileBtn');
    const cancelEditBtn = document.getElementById('cancelEditBtn');

    const profileInputs = document.querySelectorAll('.profile-details input');

    function toggleEditMode(isEditing) {
        profileInputs.forEach(input => {
            input.readOnly = !isEditing; 
            if (isEditing) {
                input.style.backgroundColor = 'white'; 
            } else {
                input.style.backgroundColor = '#f0f0f0'; 
            }
        });

        editProfileBtn.style.display = isEditing ? 'none' : 'inline-block';
        saveProfileBtn.style.display = isEditing ? 'inline-block' : 'none';
        cancelEditBtn.style.display = isEditing ? 'inline-block' : 'none';
    }

    
    let originalValues = {};
    function saveOriginalValues() {
        profileInputs.forEach(input => {
            originalValues[input.id] = input.value;
        });
    }


    editProfileBtn.addEventListener('click', function() {
        saveOriginalValues(); 
        toggleEditMode(true);
    });

    
    saveProfileBtn.addEventListener('click', function() {
        
        alert('Informações salvas!');
        toggleEditMode(false);
    });

    //cancelamento//
    cancelEditBtn.addEventListener('click', function() {
        profileInputs.forEach(input => {
            input.value = originalValues[input.id];
        });
        toggleEditMode(false); 
        alert('Edição cancelada');
    });
    
});
