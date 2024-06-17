// BUTTONS
const addNewUserButton = document.getElementById("addNewUser");
const editUserButton = document.getElementById("editUser");
const activateUsersButton = document.getElementById("activateUsers");
// MODAL
const modal = document.getElementById("modal");

// FORMS
const addUserForm = document.getElementById("addUserForm");
const editUserForm = document.getElementById("editUserForm");
const activeUserForm = document.getElementById("activate-users");


// EVENTS
addNewUserButton.addEventListener("click", () => {
  modal.classList.add("modal-parent--open");
  addUserForm.style.display = "block";
})

editUserButton.addEventListener("click", () => {
  modal.classList.add("modal-parent--open");
  editUserForm.style.display = "block";
})

activateUsersButton.addEventListener("click", () => {
  modal.classList.add("modal-parent--open");
  activeUserForm.style.display = "block";
})

// Form handlers
const errorHandler = document.getElementById("error-message");
const doneHandler = document.getElementById("done-message");

// Закрытие модального окна
modal.querySelector(".modal").addEventListener("click", function (event) {
  event._isClick = true
})

// функция закрытия модалки

function disable () {
  modal.classList.remove("modal-parent--open")
  addUserForm.style.display = "none";
  editUserForm.style.display = "none";
  activeUserForm.style.display = "none"
  errorHandler.style.display = "none";
  doneHandler.style.display = "none";
}

modal.addEventListener("click", function (event) {
  if (event._isClick === true) return
  disable();
})

// Закрытие при нажатии на Esc
window.addEventListener("keydown", function (event) {
  if (event.key === "Escape") {
    disable ();
  }
})

const sendForm = (data) => {
  fetch("/api/userDataJson.php", {
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
      document.getElementById("eddit_user_name").value = data.name_users;
      document.getElementById("role").value = data.id_role;
      document.getElementById("eddit_user_max_size").value = data.max_file_size || '';
      document.getElementById("eddit_user_max_files").value = data.max_files_count || '';
      document.getElementById("user_id").value = data.id_users;
      

      const message = document.getElementById("form__checkbox-message");
      message.textContent = 'Для загрузки осталось доступно ' + (data.max_files_count - data.max_files_current_count) + ' файл(ов)';
      message.classList.add("form__checkbox-message");


    });

    // input.value = data.name;
  }).catch((err) => {
    console.error(err);
  }).finally(() => {
    console.log('Final');
  })
}

const select = document.getElementById("selecedtUser");

select.addEventListener("change", () => {
  const value = select.value;
  console.log(value);
  // console.log(JSON.stringify(value));
  sendForm({ value });
})

// всплывающая посказка при наведении на количество совершённых загрузок
const trigger = document.getElementById("form__checkbox");
const message = document.getElementById("form__checkbox-message");

trigger.addEventListener('mouseover', function() {
  // Показываем элемент elementToDisplay при наведении на triggerElement
  message.classList.add('form__checkbox-message--active');
});

trigger.addEventListener('mouseout', function() {
  // Скрываем элемент elementToDisplay при уводе курсора с triggerElement
  message.classList.remove('form__checkbox-message--active');
});


// обработчик ответов на форму

document.addEventListener('DOMContentLoaded', () => {
  // Получение текущего URL
  const urlParams = new URLSearchParams(window.location.search);

  // ошибки
  const errorResponses = {
    error_name : "Пользователь с таким именем уже существует",
    error_equals_pass : "Пароли не совпадают",
    update_error : "Пользователь не обновлен"
  }

  // удачные ответы
  const successResponses = {
    insert_done : "Пользователь успешо добавлен",
    update_done : "Пользователь успешно обновлен"
  }

  // Обработка ошибок
  for (const key of urlParams.keys()) {
    if (errorResponses.hasOwnProperty(key)) {

      const message = errorResponses[key];
      document.getElementById('error-message').innerText = message;
      
      modal.classList.add("modal-parent--open");
      errorHandler.style.display = "flex";

      break;
    }
  }

  // Обработка успешных ответов
  for (const key of urlParams.keys()) {
    if (successResponses.hasOwnProperty(key)) {

      const message = successResponses[key];
      document.getElementById('done-message').innerText = message;
      
      modal.classList.add("modal-parent--open");
      doneHandler.style.display = "flex";

      break;
    }
  }

});
