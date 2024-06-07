// BUTTONS
const addFileButton = document.getElementById("addFile");
const addFolderButton = document.getElementById("addFolder");
// MODAL
const modal = document.getElementById("modal");

// FORMS
const addFileForm = document.getElementById("addFileForm");
const addFolderFilesFormButton = document.getElementById("addFolderFilesForm");

// Form handlers
const handler = document.getElementById("handler");
const errorHandler = document.getElementById("error-message");
const doneHandler = document.getElementById("done-message");


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
  handler.style.display = "none";
  errorHandler.style.display = "none";
  doneHandler.style.display = "none";

})

// Закрытие при нажатии на Esc
window.addEventListener("keydown", function (event) {
  if (event.key === "Escape") {
    modal.classList.remove("modal-parent--open")
    addFileForm.style.display = "none";
    addFolderFilesFormButton.style.display = "none";
    handler.style.display = "none";
    errorHandler.style.display = "none";
    doneHandler.style.display = "none";
  }
})

// кнопка выбора файлов
$('.upload-files input[type=file]').on('change', function () {
  let file = this.files[0];
  $(this).sty
  $(this).next().html(file.name);
});

// список выгружаемой дирректории
const listDirrectory = document.getElementById("uploadDirectory");

// кнопка выбора папки
$('.upload-directory input[type=file]').on('change', function () {
  let files = this.files;
  let fileNames = [];
  for (let i = 0; i < files.length; i++) {
    fileNames.push(files[i].name);
  }
  if (files.length > 0) {
    // Получаем путь к первому файлу
    let firstFilePath = files[0].webkitRelativePath;
    // Извлекаем имя директории из пути
    directoryName = firstFilePath.split('/')[0];
  }
  $('#uploadDirectory').html(fileNames.join('<br>'));
  $(this).next().html(directoryName);
  listDirrectory.style.display = "block";
});

// обработчик ответов на форму

document.addEventListener('DOMContentLoaded', () => {
  // Получение текущего URL
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.size > 0) {
    // Получение параметров err и success
    const errParam = urlParams.get('err');
    const successParam = urlParams.get('success');

    // Парсинг параметров в массивы
    const errors = errParam ? errParam.split(',') : [];
    const successes = successParam ? successParam.split(',') : [];

    // Создание объекта с результатами
    const parsedResponse = {
      errors: errors,
      successes: successes
    };

    // Логирование результата
    console.log(parsedResponse);

    // Запись данных в соответствующие блоки
    const errorMessageDiv = document.getElementById('error-message');
    const doneMessageDiv = document.getElementById('done-message');

    if (errorMessageDiv) {
      errorMessageDiv.innerHTML = errors.length > 0 ? errors.join('<br>') : 'No errors';
      modal.classList.add("modal-parent--open");
      errorHandler.style.display = "grid";

    }

    if (doneMessageDiv) {
      doneMessageDiv.innerHTML = successes.length > 0 ? successes.join('<br>') : 'No successes';

      modal.classList.add("modal-parent--open");
      doneHandler.style.display = "grid";
    }
  }

});
