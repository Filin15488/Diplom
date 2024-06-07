<div class="addProgForm" id="addProgForm">
    <form action="./addProg.php" method="post">
        <h2>Добавление стеганопрограмму</h2>
        <p> Название стеганопрограммы</p>
        <input type="text" class="input-text" name="stego_name">
        <p> Вид стенограммы:</p>
        <select name="stego_type" class="select-input">
            <?php
            require("../class/class.programs.php");
            $programs = new Programs;
            echo $programs->get_select_types();
            ?>
        </select>
        <p>Тип контейнера</p>
        <input type="text" name="stego_container_type" id="" class="select-input">
        <p>Алгоритм стегановложения</p>
        <input type="text" name="stego_algoritm_stego" id="" class="select-input">
        <p>Год создания программы</p>
        <input type="number" id="year" name="stego_date" min="1970" max="2100" placeholder="YYYY" class="input-text">
        <p>Автор</p>
        <input type="text" name="stego_author" id="" class="input-text">
        <p>Алгоритм шифрования</p>
        <input type="text" name="stego_algoritm_encryption" id="" class="input-text">
        <p>Система</p>
        <select name="stego_OS" id="" class="select-input">
            <?php
            echo $programs->get_select_OS();
            ?>
        </select>
        <p>Вид программы</p>
        <select name="stego_portable" id="" class="select-input">
            <option value="0">Устанавливаемая</option>
            <option value="1">Портативная</option>
        </select>


        <div class="modal-button">
            <button type="submit" class="button">
                Отправить
            </button>
        </div>

    </form>
</div>