<?php
/**
 * User: youssef
 * Date: 03/02/2015
 * Time: 16:05
 */
$d=new DonneurController();
$oneg = $d->getNbreDonneurByGroup("O-");
$aneg = $d->getNbreDonneurByGroup("A-");
$bneg = $d->getNbreDonneurByGroup("B-");
$abneg = $d->getNbreDonneurByGroup("AB-");
$totalneg = $oneg + $aneg + $bneg + $abneg;
?>
<header>
    <div class="container">
        <div class="row">

            <!-- Logo section -->
            <div class="col-md-4">
                <!-- Logo. -->
                <div class="logo">
                    <h1><a href="#">ADGR<span class="bold">PlateForme</span></a></h1>
                    <p class="meta">Association des Donneurs à Groupes Rares</p>
                </div>
                <!-- Logo ends -->
            </div>

            <!-- Data section -->

            <div class="col-md-4">
                <div class="header-data">

                    <!-- Traffic data -->
                    <div class="hdata">
                        <div class="mcol-left">
                            <!-- Icon with red background -->
                            <i><img src="img/banner/Oneg.png" width="40" height="40"></i>
                        </div>
                        <div class="mcol-right">
                            <!-- Number of visitors -->
                            <p><a href="#"><?php echo $oneg;  ?></a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="hdata">
                        <div class="mcol-left">
                            <!-- Icon with red background -->
                            <i><img src="img/banner/Aneg.png" width="40" height="40"></i>
                        </div>
                        <div class="mcol-right">
                            <!-- Number of visitors -->
                            <p><a href="#"><?php  echo $aneg; ?></a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="hdata">
                        <div class="mcol-left">
                            <!-- Icon with red background -->
                            <i><img src="img/banner/Bneg.png" width="40" height="40"></i>
                        </div>
                        <div class="mcol-right">
                            <!-- Number of visitors -->
                            <p><a href="#"><?php echo $bneg; ?></a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="hdata">
                        <div class="mcol-left">
                            <!-- Icon with red background -->
                            <i><img src="img/banner/ABneg.png" width="40" height="40"></i>
                        </div>
                        <div class="mcol-right">
                            <!-- Number of visitors -->
                            <p><a href="#"><?php echo $abneg; ?></a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="hdata">
                        <div class="mcol-left">
                            <!-- Icon with red background -->
                            <i><img src="img/banner/Tneg.png" width="40" height="40"></i>
                        </div>
                        <!<div class="mcol-right">
                            <!-- Number of visitors -->
                            <p><a href="#"><?php echo $totalneg; ?></a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>



                </div>
            </div>

        </div>
    </div>
</header>