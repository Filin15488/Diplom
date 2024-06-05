<div class="addFolderFilesForm" id="addFolderFilesForm">
    <h2>Добавление дирректории</h2>
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="addFolder-row-1">
            <div class="addFolder-item">
                Выберете стеганопрограмму
            </div>

            <div class="addFolder-item">
                <select id="selectProg" name="selectProg" class="select-input">
                    <?php echo $prog->get_select_programs() ?>
                </select>
            </div>
        </div>

        <div class="addFolder-row-2">
            <div class="addFolder-item">
                Выберете выгружаемую директорию
            </div>
            <div class="addFile-item">
                <label class="input-file upload-directory">
                    <input type="file" name="files[]" multiple webkitdirectory id="selectFolder">
                    <span>ВЫБЕРИТЕ ДИРЕКТОРИЮ</span>
                    <script src="../js/jquery/2.1.1/jquery.min.js"></script>
                </label>
            </div>

        </div>

        <div class="addFolder-row-3 inside__containers" id="uploadDirectory"></div>




        <div class="modal-button">
            <button type="submit" class="button">
                Отправить
            </button>
        </div>

    </form>
</div>