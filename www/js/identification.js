// BUTTONS
const addFileButton = document.getElementById("addFile");

// MODAL
const modal = document.getElementById("modal");

// FORMS
const addFileForm = document.getElementById("addFileForm");

// EVENTS
addFileButton.addEventListener("click", () => {
    modal.classList.add("modal-parent--open");
    addFileForm.style.display = "block";
  })

// Закрытие модального окна
modal.querySelector(".modal").addEventListener("click", function (event) {
    event._isClick = true
  })

  modal.addEventListener("click", function (event) {
    if (event._isClick === true) return
    modal.classList.remove("modal-parent--open")
    addFileForm.style.display = "none";
  })

  // Закрытие при нажатии на Esc
  window.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      modal.classList.remove("modal-parent--open")
    }
  })