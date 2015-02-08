<?php
/**
 * Created by PhpStorm.
 * User: youssef
 * Date: 03/02/2015
 * Time: 15:58
 */
?>
<!-- baniere de recherche et menu de l'utilisateur pour le changement des informations -->

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">

    <div class="conjtainer">
        <!-- Navigation starts -->
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <!-- Recherche Rapide -->
                <li class="dropdown dropdown-big">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-danger"><i class="icon-refresh"></i></span> Recherche rapide</a>
                </li>
            </ul>

            <!-- Search form -->
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>

            <!-- Utilisateur -->
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown pull-right">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <i class="icon-user"></i> Admin <b class="caret"></b>
                    </a>

                    <!-- Menu de l'utilisateur -->
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="icon-user"></i> Profil</a></li>
                        <li><a href="login.html"><i class="icon-off"></i> Déconnexion</a></li>
                    </ul>
                </li>

            </ul>
        </nav>

    </div>
</div>