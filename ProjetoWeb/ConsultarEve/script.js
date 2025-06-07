const daysTag = document.querySelector(".days"),
      currentDate = document.querySelector(".current-date"),
      prevNextIcon = document.querySelectorAll(".icons span"),
      notesContainer = document.querySelector(".notes-container"),
      selectedDateEl = document.querySelector(".selected-date"),
      notesList = document.querySelector(".notes-list"),
      addNoteBtn = document.getElementById("add-note"),
      noteForm = document.querySelector(".note-form"),
      noteText = document.getElementById("note-text"),
      saveNoteBtn = document.getElementById("save-note"),
      cancelNoteBtn = document.getElementById("cancel-note"),
      deleteNoteBtn = document.getElementById("delete-note");

let date = new Date(),
    currYear = date.getFullYear(),
    currMonth = date.getMonth(),
    selectedDate = null,
    notes = JSON.parse(localStorage.getItem('calendar-notes')) || {},
    editingNoteId = null;

const months = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho",
                "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];

const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(),
        lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(),
        lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(),
        lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();
    let liTag = "";

    // Dias do mês anterior
    for (let i = firstDayofMonth; i > 0; i--) {
        const dayNumber = lastDateofLastMonth - i + 1;
        const prevMonth = currMonth - 1 < 0 ? 11 : currMonth - 1;
        const prevYear = currMonth - 1 < 0 ? currYear - 1 : currYear;
        const dateStr = `${prevYear}-${prevMonth + 1}-${dayNumber}`;
        const hasEvent = notes[dateStr] && notes[dateStr].length > 0 ? "has-event" : "";
        liTag += `<li class="inactive ${hasEvent}" data-date="${dateStr}">${dayNumber}</li>`;
    }

    // Dias do mês atual
    for (let i = 1; i <= lastDateofMonth; i++) {
        const dateStr = `${currYear}-${currMonth + 1}-${i}`;
        const isToday = i === date.getDate() && currMonth === new Date().getMonth() 
                      && currYear === new Date().getFullYear() ? "active" : "";
        const hasEvent = notes[dateStr] && notes[dateStr].length > 0 ? "has-event" : "";
        liTag += `<li class="${isToday} ${hasEvent}" data-date="${dateStr}">${i}</li>`;
    }

    // Dias do próximo mês
    for (let i = lastDayofMonth; i < 6; i++) {
        const dayNumber = i - lastDayofMonth + 1;
        const nextMonth = currMonth + 1 > 11 ? 0 : currMonth + 1;
        const nextYear = currMonth + 1 > 11 ? currYear + 1 : currYear;
        const dateStr = `${nextYear}-${nextMonth + 1}-${dayNumber}`;
        const hasEvent = notes[dateStr] && notes[dateStr].length > 0 ? "has-event" : "";
        liTag += `<li class="inactive ${hasEvent}" data-date="${dateStr}">${dayNumber}</li>`;
    }
    
    currentDate.innerText = `${months[currMonth]} ${currYear}`;
    daysTag.innerHTML = liTag;

    // Adiciona evento de clique para cada dia
    document.querySelectorAll('.days li').forEach(day => {
        day.addEventListener('click', () => {
            const dateStr = day.dataset.date;
            if (dateStr) {
                selectDate(dateStr);
            }
        });
    });
    
    // Mostra as anotações do dia atual ao carregar
    if (!selectedDate) {
        const today = new Date();
        const todayStr = `${today.getFullYear()}-${today.getMonth() + 1}-${today.getDate()}`;
        selectDate(todayStr);
    }
};

const selectDate = (dateStr) => {
    // Remove a seleção anterior
    document.querySelectorAll('.days li').forEach(day => {
        day.classList.remove('selected');
    });
    
    // Adiciona seleção ao novo dia
    const dayElement = document.querySelector(`.days li[data-date="${dateStr}"]`);
    if (dayElement) {
        dayElement.classList.add('selected');
    }
    
    selectedDate = dateStr;
    const [year, month, day] = dateStr.split('-');
    selectedDateEl.textContent = `${day.padStart(2, '0')}/${month.padStart(2, '0')}/${year}`;
    
    showNotesForDate(dateStr);
    noteForm.classList.add('hidden');
};

const showNotesForDate = (dateStr) => {
    notesList.innerHTML = '';
    const dateNotes = notes[dateStr] || [];
    
    if (dateNotes.length === 0) {
        notesList.innerHTML = '<li class="no-notes">Nenhuma anotação para este dia</li>';
    } else {
        dateNotes.forEach((note, index) => {
            const noteEl = document.createElement('li');
            noteEl.innerHTML = `
                <div class="note-date">${formatDateDisplay(dateStr)}</div>
                <div class="note-text">${note.text}</div>
            `;
            noteEl.addEventListener('click', () => editNote(dateStr, index));
            notesList.appendChild(noteEl);
        });
    }
};

// Função auxiliar para formatar a data
const formatDateDisplay = (dateStr) => {
    const [year, month, day] = dateStr.split('-');
    return `${day.padStart(2, '0')}/${month.padStart(2, '0')}/${year}`;
};

const showNoteForm = () => {
    if (!selectedDate) {
        alert("Por favor, selecione uma data primeiro!");
        return;
    }
    
    noteText.value = '';
    editingNoteId = null;
    deleteNoteBtn.classList.add('hidden');
    noteForm.classList.remove('hidden');
};

const hideNoteForm = () => {
    noteForm.classList.add('hidden');
};

const saveNote = () => {
    const text = noteText.value.trim();
    if (!text || !selectedDate) return;
    
    if (!notes[selectedDate]) {
        notes[selectedDate] = [];
    }
    
    if (editingNoteId !== null) {
        notes[selectedDate][editingNoteId].text = text;
    } else {
        notes[selectedDate].push({
            id: Date.now(),
            text: text,
            date: selectedDate
        });
    }
    
    localStorage.setItem('calendar-notes', JSON.stringify(notes));
    hideNoteForm();
    showNotesForDate(selectedDate);
    renderCalendar(); // Atualiza os indicadores de evento
};

const deleteNote = () => {
    if (editingNoteId === null || !selectedDate) return;
    
    notes[selectedDate].splice(editingNoteId, 1);
    if (notes[selectedDate].length === 0) {
        delete notes[selectedDate];
    }
    
    localStorage.setItem('calendar-notes', JSON.stringify(notes));
    hideNoteForm();
    showNotesForDate(selectedDate);
    renderCalendar(); // Atualiza os indicadores de evento
};

const editNote = (dateStr, index) => {
    const note = notes[dateStr][index];
    noteText.value = note.text;
    editingNoteId = index;
    deleteNoteBtn.classList.remove('hidden');
    noteForm.classList.remove('hidden');
};


// Event Listeners
addNoteBtn.addEventListener('click', showNoteForm);
saveNoteBtn.addEventListener('click', saveNote);
cancelNoteBtn.addEventListener('click', hideNoteForm);
deleteNoteBtn.addEventListener('click', deleteNote);

prevNextIcon.forEach(icon => {
    icon.addEventListener("click", () => {
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        if(currMonth < 0 || currMonth > 11) {
            date = new Date(currYear, currMonth, new Date().getDate());
            currYear = date.getFullYear();
            currMonth = date.getMonth();
        }
        renderCalendar();
    });
});

// Inicialização
renderCalendar();
// Seleciona o dia atual por padrão
const today = new Date();
const todayStr = `${today.getFullYear()}-${today.getMonth()+1}-${today.getDate()}`;
selectDate(todayStr);