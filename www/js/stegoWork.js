// BUTTONS
const addNewProgButton = document.getElementById("addProg");
const editProgButton = document.getElementById("editProg");
const rdProgButton = document.getElementById("rdProg");

// MODAL
const modal = document.getElementById("modal");

// FORMS
const addProgForm = document.getElementById("addProgForm");
const editProgForm = document.getElementById("edditProgForm");
const rdProgForm = document.getElementById("rdProgForm");

// EVENTS
addNewProgButton.addEventListener("click", () => {
  modal.classList.add("modal-parent--open");
  addProgForm.style.display = "flex";
  addProgForm.style.flexDirection = "column";
})

editProgButton.addEventListener("click", () => {
  modal.classList.add("modal-parent--open");
  editProgForm.style.display = "flex";
  editProgForm.style.flexDirection = "column";

})

rdProgButton.addEventListener("click", () => {
  modal.classList.add("modal-parent--open");
  rdProgForm.style.display = "flex";
  rdProgForm.style.flexDirection = "column";
})

// Закрытие модального окна
modal.querySelector(".modal").addEventListener("click", function (event) {
  event._isClick = true
})

modal.addEventListener("click", function (event) {
  if (event._isClick === true) return
  modal.classList.remove("modal-parent--open")
  addProgForm.style.display = "none";
  editProgForm.style.display = "none";
  rdProgForm.style.display = "none";
})

// Закрытие при нажатии на Esc
window.addEventListener("keydown", function (event) {
  if (event.key === "Escape") {
    modal.classList.remove("modal-parent--open")
  }
})

const sendForm = (data) => {
  fetch("/api/progDataJson.php", {
    method: "POST",
    body: JSON.stringify(data),
    headers: {
      "Content-Type": "application/json",
    }
  }).then((res) => {
    // console.log(res);
    // const data = JSON.parse(res);
    res.text().then(text => {
      // console.log(text); // Здесь будет содержимое ответа в формате текста
      const data = JSON.parse(text);
      console.log(data);
      document.getElementById("stego_name").value = data.st_prog_name;
      document.getElementById("stego_type").value = data.vid;
      document.getElementById("stego_container_type").value = data.extention;
      document.getElementById("stego_algoritm_stego").value = data.algoritm;
      document.getElementById("stego_date").value = data.year_create;
      document.getElementById("stego_author").value = data.author;
      document.getElementById("stego_encryption").value = data.encryption;
      document.getElementById("stego_OS").value = data.OS;
      document.getElementById("stego_portable").value = data.is_portable;
      document.getElementById("stego_old_name").value = data.st_prog_name;
      // обход значений объекта
      // Object.keys(data).forEach(key => {
      //     console.log(`${key}: ${data[key]}`);
      // });
    });

    // input.value = data.name;
  }).catch((err) => {
    console.error(err);
  }).finally(() => {
    console.log('Final');
  });
};

const select = document.getElementById("Edditedprog");

select.addEventListener("change", () => {
  const value = select.value;
  console.log(value);
  // console.log(JSON.stringify(value));
  sendForm({ value });
})

// чтение программы

const rdProgInfoSend = (data) => {
  fetch("/api/progDataJson.php", {
    method: "POST",
    body: JSON.stringify(data),
    headers: {
      "Content-Type": "application/json",
    }
  }).then((res) => {
    // console.log(res);
    // const data = JSON.parse(res);
    res.text().then(text => {
      // console.log(text); // Здесь будет содержимое ответа в формате текста
      const data = JSON.parse(text);
      console.log(data);
      rdProgInfo.textContent = JSON.stringify(data, null, 2);

    });

    // input.value = data.name;
  }).catch((err) => {
    console.error(err);
  }).finally(() => {
    console.log('Final');
  });
};

const rdFilesInfoSend = (data) => {
  fetch("/api/rdFilesDataJson.php", {
    method: "POST",
    body: JSON.stringify(data),
    headers: {
      "Content-Type": "application/json",
    }
  }).then((res) => {
    // console.log(res);
    // const data = JSON.parse(res);
    res.text().then(text => {
      // console.log(text); // Здесь будет содержимое ответа в формате текста
      const data = JSON.parse(text);
      console.log(data);
      // rdProgInfo.textContent = JSON.stringify(data, null, 2);
      rdProgInfoFiles.textContent = JSON.stringify(data, null, 2);

    });

    // input.value = data.name;
  }).catch((err) => {
    console.error(err);
  }).finally(() => {
    console.log('Final');
  });
};

const rdSelect = document.getElementById("rdProgselected");
const rdProgInfo = document.getElementById("rdProgInfo");
const rdProgInfoFiles = document.getElementById("rdProgInfoFiles");
const rdProgName = document.getElementById("rdProgName");
const rdProgName2 = document.getElementById("rdProgName2");


rdSelect.addEventListener("change", () => {
  const value = rdSelect.value;
  console.log(value);
  // console.log(JSON.stringify(value));
  rdProgInfoSend({ value });
  rdFilesInfoSend({ value });
  rdProgName.value = value;
  rdProgName2.value= value;
})