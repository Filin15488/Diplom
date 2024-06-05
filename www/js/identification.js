// BUTTONS
const addFileButton = document.getElementById("addFile");
const addFolderButton = document.getElementById("addFolder");
// MODAL
const modal = document.getElementById("modal");

// FORMS
const addFileForm = document.getElementById("addFileForm");
const addFolderFilesFormButton = document.getElementById("addFolderFilesForm");

// EVENTS
addFileButton.addEventListener("click", () => {
  modal.classList.add("modal-parent--open");
  addFileForm.style.display = "block";
})

addFolderButton.addEventListener("click", () => {
  modal.classList.add("modal-parent--open");
  addFolderFilesFormButton.style.display = "block";
})
// Закрытие модального окна
modal.querySelector(".modal").addEventListener("click", function (event) {
  event._isClick = true
})

modal.addEventListener("click", function (event) {
  if (event._isClick === true) return
  modal.classList.remove("modal-parent--open")
  addFileForm.style.display = "none";
  addFolderFilesFormButton.style.display = "none";
})

// Закрытие при нажатии на Esc
window.addEventListener("keydown", function (event) {
  if (event.key === "Escape") {
    modal.classList.remove("modal-parent--open")
    addFileForm.style.display = "none";
    addFolderFilesFormButton.style.display = "none";
  }
})

// кнопка выбора файлов
$('.upload-files input[type=file]').on('change', function() {
  let file = this.files[0];
  $(this).sty
  $(this).next().html(file.name);
});

// списко выгрузки из дирректории



// кнопка выбора папки
$('.upload-directory input[type=file]').on('change', function() {
  let files = this.files;
  let fileNames = [];
  for (let i = 0; i < files.length; i++) {
      fileNames.push(files[i].name);
  }
  $(this).next().html(fileNames.join(', '));
});