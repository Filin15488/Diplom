<div class="editUserForm" id="editUserForm">
    <h2>Редактирование инфомарии о пользователях</h2>
    <p> Выберите редактируемого пользователя</p>
    <select name="user_id" id="selecedtUser" class="select-input">
        <?php
        require("../class/class.users.php");
        $list_users = new Users;
        echo $list_users->get_select_options();
        ?>
    </select>

    <form action="./user_eddit.php" method="post" data-attr="">
        <p> Введите новое имя пользователя или оставьте его прежним</p>
        <input type="text" name="name_users" class="input-text" id="eddit_user_name" required>
        <p> Введите новый пароль
            <?php
            require_once("../inclusion/question_svg.php");
            echo question_svg('При необходимости. Оставя поле пустым пароль останется прежним');  ?>
        </p>
        <input type="password" name="user_pass" class="input-text">
        <p> Повторите новый пароль</p>
        <input type="password" name="user_pass2" class="input-text">
        <p> Выберите роль</p>
        <select name="id_role" class="select-input" id="role">
            <?php
            // require("../class/class.select_role.php");
            $list = new SelectRole;
            echo $list->get_select_options_id();
            ?>
        </select>
        <p> Максимальный размер файла в МБ
            <?php
            require_once("../inclusion/question_svg.php");
            echo question_svg('Максимальный размер КАЖДОГО файла, который пользователь может загрузить. При оставлении поля будет установлено максимальное значение. Введите число в диапазоне от 0 до ' . ini_get('upload_max_filesize'), 20, 20);
            ?>
        </p>
        <input type="number" class="input-text" name="max_file_size" id="eddit_user_max_size" min='0' <?php echo 'max="' . filter_var(ini_get('upload_max_filesize'), FILTER_SANITIZE_NUMBER_INT) . '"'; ?>>
        <p> Максимальное количество файлов
            <?php
            require_once("../inclusion/question_svg.php");
            echo question_svg('Максимальное количество файлов, которое доступно пользователю для загрузки. Учтите, что данное значение устанавливает общее количество файлов, которые пользователь может загрузить в систему, а не за раз (Максимум файлов за один раз: ' . ini_get('max_file_uploads') . ")", 20, 20);
            ?>

        </p>
        <input type="text" class="input-text" name="max_files_count" id="eddit_user_max_files">
        <div class="form__checkbox" id="form__checkbox">
            <p>Обнулить загрузки</p>
            <div class="form__checkbox-message" id="form__checkbox-message"></div>
            <input type="checkbox" name="clear_downloads" id="clear_downloads" class="checkbox-input">
        </div>
        <input type="hidden" name="id_users" value=1 id="user_id">

        <div class="modal-button">
            <button type="submit" class="button">
                Отправить
            </button>
        </div>

    </form>

</div>