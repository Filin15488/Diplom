<div class="rdProgForm" id="rdProgForm">
    <h2>Просмотр и удаление</h2>
    <p> Выберите стеганопрограмму</p>
    <select name="rdProg" id="rdProgselected" class="select-input">
        <?php
        $programs = new Programs;
        echo $programs->get_select_programs();
        ?>
    </select>
    <div class="separator"></div>

    <div class="inside__containers">
        <p>Сведения о стеганопрограмме</p>
        <div class="inside__containers rdProgInfo">
            <pre id="rdProgInfo"></pre>
        </div>
        <p>Файлы программы</p>
        <div class="inside__containers rdProgInfo">
            <pre id="rdProgInfoFiles"></pre>
        </div>
        <div class="rdBotton">
        <form action="./rdProgDownload.php" method="post">
        <input type="submit" class="button" value="Выгрузить" id="downloadProg">

            <input type="hidden" name="rdProgName" id="rdProgName">
        </form>
        <form action="./rdProfDelete.php" method="post">
        <input type="submit" class="button dangerButton" value="Удалить" id="deleteProg">

        <input type="hidden" name="rdProgName" id="rdProgName2">
        </form>

        </div>



    </div>

</div>