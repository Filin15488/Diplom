<div class="edditProgForm" id="edditProgForm">
    <h2>Редактирование стеганографических программ</h2>
    <p> Выберите редактируемую программу</p>
    <select name="Edditedprog" id="Edditedprog" class="select-input">
        <?php
        $programs = new Programs;
        echo $programs->get_select_programs();
        ?>
    </select>
    <div class="separator"></div>
    <form action="./edditProg.php" method="post">

        <p> Название стеганопрограммы</p>
        <input type="text" name="stego_name" class="input-text" id="stego_name">
        <p>Вид стенограммы</p>
        <select name="stego_type" class="select-input" id="stego_type">
            <?php
            echo $programs->get_select_types();
            ?>
        </select>
        <p>Тип контейнера</p>
        <input type="text" name="stego_container_type" class="input-text" id="stego_container_type">
        <p>Алгоритм стегановложения</p>
        <input type="text" name="stego_algoritm_stego" class="input-text" id="stego_algoritm_stego">
        <p>Год создания программы</p>
        <input type="number" id="stego_date" name="stego_date" min="1970" max="2100" placeholder="YYYY" class="input-text">
        <p>Автор</p>
        <input type="text" name="stego_author" class="input-text" id="stego_author">
        <p>Алгоритм шифрования</p>
        <input type="text" name="stego_algoritm_encryption" class="input-text" id="stego_encryption">
        <p>Система</p>
        <select name="stego_OS" class="select-input" id="stego_OS">
            <?php
            echo $programs->get_select_OS();
            ?>
        </select>
        <p>Вид программы</p>
        <select name="stego_portable" class="select-input" id="stego_portable">
            <option value="0">Устанавливаемая</option>
            <option value="1">Портативная</option>
        </select>

        <input type="hidden" name="stego_old_name" value="Camouflage" id="stego_old_name">

        <div class="modal-button">
            <button type="submit" class="button">
                Отправить
            </button>
        </div>

    </form>
</div>