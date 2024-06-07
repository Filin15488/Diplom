<div class="addUserForm" id="addUserForm">
    <form action="./user_add.php" method="post">
        <h2>Добавление нового пользователя</h2>
        <p> Введите имя пользователя</p>
        <input type="text" class="input-text" name="add_user_name">
        <p> Введите пароль</p>
        <input type="password" class="input-text" name="add_user_pass">
        <p> Повторите пароль</p>
        <input type="password" class="input-text" name="add_user_pass2">
        <p> Выберите роль</p>
        <select name="role" class="select-input">
            <?php
            require("../class/class.select_role.php");
            $list = new SelectRole;
            echo $list->get_select_options();
            ?>
        </select>

        <p> Максимальный размер файла в МБ
            <?php
            require_once("../inclusion/question_svg.php");
            echo question_svg('Максимальный размер КАЖДОГО файла, который пользователь может загрузить. При оставлении поля будет установлено максимальное значение. Введите число в диапазоне от 0 до ' . ini_get('upload_max_filesize'), 20, 20);
            ?>
        </p>
        <input type="number" class="input-text" name="max_size" id="add_user_max_size" min='0' <?php echo 'max="' . filter_var(ini_get('upload_max_filesize'), FILTER_SANITIZE_NUMBER_INT) . '"'; ?>>
        <p> Максимальное количество файлов
            <?php
            require_once("../inclusion/question_svg.php");
            echo question_svg('Максимальное количество файлов, которое доступно пользователю для загрузки. Учтите, что данное значение устанавливает общее количество файлов, которые пользователь может загрузить в систему, а не за раз (Максимум файлов за один раз: ' . ini_get('max_file_uploads') . ")", 20, 20);
            ?>

        </p>
        <input type="text" class="input-text">
        <div class="modal-button">
            <button type="submit" class="button">
                Отправить
            </button>
        </div>

    </form>
</div>