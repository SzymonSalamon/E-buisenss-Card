
<head>
    <link rel="stylesheet" type="text/css" href="public/style/index_style.css">
    <link rel="stylesheet" type="text/css" href="public/style/admin_style.css">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="./public/js/lock_orientation.js" async></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover">
    <title>Project Page</title>
</head>
<body>
<?php
session_start();
?>
<div class="Up">
    <div class="logo">
        <?php
        if ($_SESSION['privilage']== 'admin') {
            echo '<a href="adminpanel">';
        }
        ?>
        <img src="public/style/Icons/id_icon.svg" alt= "id_icon" />
        <?php
        if ($_SESSION['privilage']== 'admin') {
            echo '</a>';
        }
        ?>
    </div>
    <header>
            <a href="projects" class="add-project"> <div class="add-project">
                    Back
                </div></a>
        <a href="logout" class="logout">
            <img src="public/style/Icons/exit.svg" alt="exit"/>
        </a>
    </header>
</div>
<div class="down">
    <div class="menu">
    </div>
    <div class="tlo">
        <div class="workspace">
            <section class="projects">

                    <?php foreach ($users as $user):
                        ?>
                        <form method="POST" action="cos">
                            <table>
                        <tr>
                            <td> <input type="hidden" name="id" value="<?= $user->getId()?>"></td>
                            <td> <input type="text" name="email" value="<?= $user->getEmail()?>"> </td>
                            <td> <input type="password" name="password"value="<?= $user->getPassword()?>"></td>
                            <td> <input type="text" name="name" value="<?= $user->getName()?>"> </td>
                            <td> <input type="text" name="surname" value="<?= $user->getSurname()?>"></td>
                            <td> <select name="privilage">
                                    <option value="admin">admin</option>
                                    <option value="normal">normal</option>
                                    <option value="<?= $user->getPrivilage()?>" style="display:none;" selected><?= $user->getPrivilage()?></option>
                                </select> </td>
                            <td>
                                <input type="submit" value="Edit" onclick="this.parentElement.parentElement.parentElement.parentElement.parentElement.action='editUser'">
                            </td>
                            <td>
                                <input type="submit" value="Delete" onclick="this.parentElement.parentElement.parentElement.parentElement.parentElement.action='deleteUser'">
                            </td>
                        </tr>
                            </table>
                    </form>
                <?php endforeach;?>
                </table>
            </section>
        </div>
    </div>
</div>
</body>


