<div class="addFileForm" id="addFileForm">
    <h2>Добавление файла</h2>
    <form action="./addFile.php" method="post" enctype="multipart/form-data">
        <div class="addFile">
            <div class="addFile-row-1">
                <div class="addFile-item">
                    Выберете стеганопрограмму
                </div>

                <div class="addFile-item">
                    <select id="selectProg" name="selectProg" class="select-input">
                        <?php echo $prog->get_select_programs() ?>
                    </select>
                </div>
            </div>

            <div class="addFile-row-2">
                <div class="addFile-item">
                    Выберете файл
                </div>
                <div class="addFile-item">
                    <label class="input-file upload-files">
                        <input type="file" name="file">
                        <span>ВЫБЕРИТЕ ФАЙЛ</span>
                        <!-- <script src="https://snipp.ru/cdn/jquery/2.1.1/jquery.min.js"></script> -->
                        <script src="../js/jquery/2.1.1/jquery.min.js"></script>

                    </label>
                </div>
            </div>
            <div class="addFile-row-3">
                <div class="addFile-item">
                    Сохранить исходный файл на сервере?
                </div>
                <div class="addFile-item">
                    <input type="checkbox" name="saveFile" id="saveFile" class="checkbox-input">
                </div>

            </div>
        </div>


        <div class="modal-button">
            <button type="submit" class="button">
                Отправить
            </button>
        </div>

    </form>
</div>