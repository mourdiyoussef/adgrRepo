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
                <li><a href="widgets1.html">Nouvel adérant</a></li>
                <li><a href="widgets2.html">Liste des adérants</a></li>
                <li><a href="widgets3.html">Recherche avancée</a></li>
            </ul>
        </li>
        <li class="has_sub"><a href="#"><i class="icon-file-alt"></i> Collecte  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
            <ul>
                <li><a href="post.html">Nouvelle collecte</a></li>
                <li><a href="post.html">Liste des collectes</a></li>
            </ul>
        </li>
        <li class="has_sub"><a href="#"><i class="icon-file-alt"></i> Contacts  <span class="pull-right"><i class="icon-chevron-right"></i></span></a>
            <ul>
                <li><a href="post.html">Nouveau contact</a></li>
                <li><a href="post.html">Liste des contacts</a></li>
            </ul>
        </li>
    </ul>
</div>