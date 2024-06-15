<?php
require_once("../class/class.users.php");
?>

<div class="activate" id="activate-users">
    <h2>Активация пользователей</h2>
    <form action="#" method="post">
        <?php
        $list = new Users;
        $ids = $list->get_all_users_id();
        for ($i = 0; $i < count($ids); $i++) {
        ?>
            <div class="activateUser">

                <div class="userName">
                    <?php
                    echo $user = $list->get_users_info($ids[$i])['name_users'];
                    ?>
                </div>
                <div class="userActiva">
                    <input type="checkbox" name="<?php echo $list->get_users_info($ids[$i])['name_users'] ?>" class="checkbox-input" <?php
                                                                                                                                        if ($list->get_users_info($ids[$i])['activate'] == 1) {
                                                                                                                                            echo "checked";
                                                                                                                                        }
                                                                                                                                        ?>>
                </div>
            </div>


        <?php
        }
        ?>

        <div class="modal-button">
            <button type="submit" class="button">
                Отправить
            </button>
        </div>
    </form>
</div>