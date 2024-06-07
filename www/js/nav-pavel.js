// массив иконок и их сообщений
const menuItems = [
    { trigger: document.getElementById("home_icon"), message: document.getElementById("home-message") },
    { trigger: document.getElementById("list_icon"), message: document.getElementById("list-message") },
    { trigger: document.getElementById("identification_icon"), message: document.getElementById("identification-message") },
    { trigger: document.getElementById("business_icon"), message: document.getElementById("business-message") },
    { trigger: document.getElementById("stego_work_icon"), message: document.getElementById("stego_work-message") },
    { trigger: document.getElementById("settings_icon"), message: document.getElementById("settings-message") }
];
// функция добавления hover эффекта
function addHoverEffect(item) {
    let timeoutId;

    item.trigger.addEventListener('mouseover', function() {
      timeoutId = setTimeout(function() {
        item.message.classList.add('menu__item-message--active');
      }, 500); // Задержка в мс
    });

    item.trigger.addEventListener('mouseout', function() {
      clearTimeout(timeoutId);
      item.message.classList.remove('menu__item-message--active');
    });
  }

  menuItems.forEach(addHoverEffect);