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
            console.log(text); // Здесь будет содержимое ответа в формате текста
            const data = JSON.parse(text);
            console.log(data);
            //   document.getElementById("eddit_user_name").value = data.name_users;
            //   document.getElementById("role").value = data.id_role;
            //   document.getElementById("eddit_user_max_size").value = data.max_file_size || '';
            //   document.getElementById("eddit_user_max_files").value = data.max_files_count || '';
            //   document.getElementById("user_id").value = data.id_users;
            //   const message = document.getElementById("form__checkbox-message");
            //   message.textContent = 'Для загрузки осталось доступно ' + (data.max_files_count - data.max_files_current_count) + ' файл(ов)';
            //   message.classList.add("form__checkbox-message");
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
