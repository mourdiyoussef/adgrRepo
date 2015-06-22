<?php
/**
 * User: youssef
 * Date: 03/02/2015
 * Time: 15:19
 */

?>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

    <!--- Sidebar navigation -->
    <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
    <ul id="nav">
        <!-- Main menu with font awesome icon -->
        <li><a href="index.html"><i class="icon-home"></i> Acceuil</a>
            <!-- Sub menu markup
            <ul>
              <li><a href="#">Submenu #1</a></li>
              <li><a href="#">Submenu #2</a></li>
              <li><a href="#">Submenu #3</a></li>
            </ul>-->
        </li>
        <li class="has_sub"><a href="#"><i class="icon-list-alt"></i> Adhérents  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
            <ul>
                <li><a href="donneurAddForm.php">Nouvel adérant</a></li>
                <li><a href="donneurListTable.php">Liste des adérants</a></li>
                <li><a href="donneurAptContactList.php">Liste des adérants apts</a></li>
                <li><a href="widgets3.html">Recherche avancée</a></li>
            </ul>
        </li>
        <li class="has_sub"><a href="#"><i class="icon-file-alt"></i> Collecte  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
            <ul>
                <li><a href="collecteAddForm.php">Nouvelle collecte</a></li>
                <li><a href="collecteListTable.php">Liste des collectes</a></li>
            </ul>
        </li>
        <li class="has_sub"><a href="#"><i class="icon-file-alt"></i> Contacts  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
            <ul>
                <li><a href="contactAddForm.php">Nouveau contact</a></li>
                <li><a href="contactListTable.php">Liste des contacts</a></li>
            </ul>
        </li>

        <li class="has_sub"><a href="#"><i class="icon-file-alt"></i> Notifications <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
            <ul>
                <li><a href="notificationAddForm.php">Nouvelle notification</a></li>
                <li><a href="userListTable.php">Liste des notifications</a></li>
            </ul>
        </li>
        <li class="has_sub"><a href="#"><i class="icon-file-alt"></i> Dépenses  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
            <ul>
                <li><a href="categorieAddForm.php">Nouvelle catégorie</a></li>
                <li><a href="categorieListTable.php">Liste des catégories</a></li>
                <li><a href="depenseAddForm.php">Nouvelle dépense</a></li>
                <li><a href="depenseListTable.php">Liste des dépenses</a></li>
            </ul>
        </li>
        <!-- seulement pour les admins --------------------------------->
        <?php if($_SESSION['role']=="admin") {
            ?>
            <li class="has_sub"><a href="#"><i class="icon-file-alt"></i> Utilisateurs <span class="pull-right"><i
                            class="icon-chevron-right"></i></span></a>
                <ul>
                    <li><a href="userAddForm.php">Nouvel utilisateur</a></li>
                    <li><a href="userListTable.php">Liste des utilisateurs</a></li>
                </ul>
            </li>


        <?php
        }
        ?>
    </ul>
</div>