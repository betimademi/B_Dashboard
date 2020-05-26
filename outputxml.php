<!DOCTYPE html>
<!--
Item Name: Elisyam - Web App & Admin Dashboard Template
Version: 1.5
Author: SAEROX

** A license must be purchased in order to legally use this template for your project **
-->


<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bifeks - Dashboard</title>
        <meta name="description" content="Bifeks is a Web App and Admin Dashboard Template built with Bootstrap 4">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
            $("#selectxmlfile").change(function(){
                          xml = $(this).val();
            $.ajax({
                type: 'POST',
                url: 'outputxml.php',
                data: {id: xml}, //Pass the id
                success:function(text){
                    console.log(xml);
                }

                  });

             });
         });
</script>

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/bifeks_logo.png">
        <!-- <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png"> -->
        <!-- Stylesheet -->
        <link rel="stylesheet" href="assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="assets/vendors/css/base/elisyam-1.5.min.css">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body id="page-top">
        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="assets/img/bifeks_logo.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>
            </div>
        </div>
        <!-- End Preloader -->
        <div class="page">
            <!-- Begin Header -->
            <header class="header">
                <nav class="navbar fixed-top">
                    <!-- Begin Search Box-->
                    <div class="search-box">
                        <button class="dismiss"><i class="ion-close-round"></i></button>
                        <form id="searchForm" action="#" role="search">
                            <input type="search" placeholder="Search something ..." class="form-control">
                        </form>
                    </div>
                    <!-- End Search Box-->
                    <!-- Begin Topbar -->
                    <div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
                        <!-- Begin Logo -->
                        <div class="navbar-header">
                            <a href="db-default.html" class="navbar-brand">
                                <div class="brand-image brand-big">
                                    <img src="assets/img/bifeks_logo.png" alt="logo" class="logo-big">
                                </div>
                                <div class="brand-image brand-small">
                                    <img src="assets/img/bifeks_logo.png.png" alt="logo" class="logo-small">
                                </div>
                            </a>
                            <!-- Toggle Button -->
                            <a id="toggle-btn" href="#" class="menu-btn active">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            <!-- End Toggle -->
                        </div>
                        <!-- End Logo -->
                        <!-- Begin Navbar Menu -->
                        <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
                            <!-- Search -->
                            <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="la la-search"></i></a></li>
                            <!-- End Search -->
                            <!-- Begin Notifications -->
                            <li class="nav-item dropdown"><a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="la la-bell animated infinite swing"></i><span class="badge-pulse"></span></a>
                                <ul aria-labelledby="notifications" class="dropdown-menu notification">
                                    <li>
                                        <div class="notifications-header">
                                            <div class="title">Notifications (4)</div>
                                            <div class="notifications-overlay"></div>
                                            <img src="assets/img/notifications/01.jpg" alt="..." class="img-fluid">
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="message-icon">
                                                <i class="la la-user"></i>
                                            </div>
                                            <div class="message-body">
                                                <div class="message-body-heading">
                                                    New user registered
                                                </div>
                                                <span class="date">2 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="message-icon">
                                                <i class="la la-calendar-check-o"></i>
                                            </div>
                                            <div class="message-body">
                                                <div class="message-body-heading">
                                                    New event added
                                                </div>
                                                <span class="date">7 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="message-icon">
                                                <i class="la la-history"></i>
                                            </div>
                                            <div class="message-body">
                                                <div class="message-body-heading">
                                                    Server rebooted
                                                </div>
                                                <span class="date">7 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="message-icon">
                                                <i class="la la-twitter"></i>
                                            </div>
                                            <div class="message-body">
                                                <div class="message-body-heading">
                                                    You have 3 new followers
                                                </div>
                                                <span class="date">10 hours ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a rel="nofollow" href="#" class="dropdown-item all-notifications text-center">View All Notifications</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- End Notifications -->
                            <!-- User -->
                            <li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><img src="assets/img/avatar/avatar-01.jpg" alt="..." class="avatar rounded-circle"></a>
                                <ul aria-labelledby="user" class="user-size dropdown-menu">
                                    <li class="welcome">
                                        <a href="#" class="edit-profil"><i class="la la-gear"></i></a>
                                        <img src="assets/img/avatar/avatar-01.jpg" alt="..." class="rounded-circle">
                                    </li>
                                    <li>
                                        <a href="pages-profile.html" class="dropdown-item">
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="app-mail.html" class="dropdown-item">
                                            Messages
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item no-padding-bottom">
                                            Settings
                                        </a>
                                    </li>
                                    <li class="separator"></li>
                                    <li>
                                        <a href="pages-faq.html" class="dropdown-item no-padding-top">
                                            Faq
                                        </a>
                                    </li>
                                    <li><a rel="nofollow" href="pages-login.html" class="dropdown-item logout text-center"><i class="ti-power-off"></i></a></li>
                                </ul>
                            </li>
                            <!-- End User -->
                            <!-- Begin Quick Actions -->
                            <li class="nav-item"><a href="#off-canvas" class="open-sidebar"><i class="la la-ellipsis-h"></i></a></li>
                            <!-- End Quick Actions -->
                        </ul>
                        <!-- End Navbar Menu -->
                    </div>
                    <!-- End Topbar -->
                </nav>
            </header>
            <!-- End Header -->
            <!-- Begin Page Content -->
            <div class="page-content d-flex align-items-stretch">
                <div class="default-sidebar">
                    <!-- Begin Side Navbar -->
                    <nav class="side-navbar box-scroll sidebar-scroll">
                        <!-- Begin Main Navigation -->
                        <ul class="list-unstyled">

                            <li><a href="index.php"><i class="la la-home"></i><span>Dashboard</span></a></li>
                    <li><a href="trmk.php"><i class="la la-away"></i><span>Insert Turkish-Macedonian</span></a></li>
                    <li><a href="tral.php"><i class="la la-away"></i><span>Insert Turkish-Albanian</span></a></li>
                    <li><a href="tren.php"><i class="la la-away"></i><span>Insert Turkish-English</span></a></li>
                            <li><a href="convert.php"><i class="la la-away"></i><span>Download-Convert-XML</span></a></li>
                            <li><a href="outputxml1.php"><i class="la la-away"></i><span>Output version.1</span></a></li>
                            <li><a href="outputxml.php"><i class="la la-away"></i><span>Output version.2</span></a></li>
                            <li><a href="shownode.php"><i class="la la-away"></i><span>Output Advanced</span></a></li>
                            <li><a href="woocomerce.php"><i class="la la-away"></i><span>WooCommerce</span></a></li>
                            <li><a href="magentorequest.php"><i class="la la-away"></i><span>Magento Request</span></a></li>
                            <li><a href="prestarequest.php"><i class="la la-away"></i><span>Presta Request</span></a></li>
                            <li><a href="xmlrequest.php"><i class="la la-away"></i><span>Get XML</span></a></li>
                        </ul>

                        <!-- End Main Navigation -->
                    </nav>
                    <!-- End Side Navbar -->
                </div>
                <!-- End Left Sidebar -->
                <div class="content-inner">
                    <div class="container-fluid">
                        <!-- Begin Page Header-->




<div class="widget has-shadow col-4" style="margin-top: 20px;padding: 20px;">
    <form action="#" method="post" style="margin-left:20px;">
        <div class="input-group mb-3">
            <select class="custom-select" id="selectxmlfile" name="selected">

             <option selected>Choose xml file </option>

             <?php
             foreach(glob(dirname(__FILE__) . '/uploads/*') as $filename){
                $filename = basename($filename);
                echo "<option value='" . $filename . "'>".$filename."</option>";
            }

            ?>

            </select>
            <button type="submit" class="btn btn-outline-info" name="click">Press Enter</button>
        </div>


</div>


<div class="widget has-shadow" style="margin-top: 30px;padding: 30px;">
    <div class="row">
            <div class="col-4">
                        <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample">
    Show Color
  </a>
</p>
  </div>
  <div class="col-4">
    <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
    Show Category
  </a>
</p>
</div>
<div class="col-4">
    <p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
    Show Category Tree
  </a>
</p>
</div>

<div class="col-4">
<div class="collapse multi-collapse" id="collapseExample1">
  <div class="card card-body">

   <?php
   require 'translate.php';
     if(isset($_POST['click'])){
        $selected_val = $_POST['selected'];


        //

                function super_unique($array)
                    {
             $result = array_map("unserialize", array_unique(array_map("serialize", $array)));

             foreach ($result as $key => $value)
            {
              if ( is_array($value) )
             {
                  $result[$key] = super_unique($value);
             }
             }
             return $result;
              }


            $dom = new DOMDocument();


            $file = (dirname(__FILE__).'/uploads/'.$selected_val);
            if (file_exists($file)){
            $dom->load($file);
            $xpath = new DOMXPath($dom);
            $nodeOne = $xpath->query('//Ozellik');
               //Ebijuteri -> AnaKategori  //YokYok -> KategoriTree  //iFondi -> KategoriTree
            $array = array();

            foreach ($nodeOne as $color) {
                if($color->getAttribute("Tanim")==="Ngjyra"){


                    $array[] = $color->nodeValue;

            }
        }

                $resultcolor = super_unique($array);
                $c = array_filter($resultcolor);


               //echo '<div class="col-4">';
               echo '<ul class="list-group list-group-flush">';

               foreach ($c as $value) {
                if(in_array($value,$colorTRAL)){
                    echo '<li class="list-group-item">' .$value. '</li>';
                }

                else
                {
                    echo '<li class="list-group-item list-group-item-danger">' .$value. '</li>';
                }
                }
                echo '</ul>';

               // echo '</div>';

            }
            else
            {
                echo "No file found";
            }

        }



    ?>

  </div>
</div>
</div>
<div class="col-4">
<div class="collapse multi-collapse" id="collapseExample2">
  <div class="card card-body">
    <?php


           //  $nodeTwo = $xpath->query('//Kategori');
           //     //Ebijuteri -> AnaKategori  //YokYok -> KategoriTree  //iFondi -> KategoriTree
           //  $array2 = array();

           // foreach ($nodeTwo as $kategori) {
           //      $array2[] = $kategori->nodeValue;
           //  }
           //      $resultkategori = super_unique($array2);
           //      $k = array_filter($resultkategori);


           //     //echo '<div class="col-4">';
           //      echo '<ul class="list-group list-group-flush">';

           //      foreach ($k as $kat) {
           //          if(in_array(htmlspecialchars($kat),$KategoriTRAL)){
           //          echo '<li class="list-group-item">' .$kat. '</li>';
           //          }

           //           else
           //          {
           //          echo '<li class="list-group-item list-group-item-danger">' .$kat. '</li>';
           //           }
           //     }

           //      echo '</ul>';
           //      echo '</div>';


            ?>
  </div>
</div>
</div>
<div class="col-4">
<div class="collapse multi-collapse" id="collapseExample3">
  <div class="card card-body">
    <?php


            // $nodeThree = $xpath->query('//KategoriTree');
            // $array3 = array();
            //  foreach ($nodeThree as $kategoriTree) {
            //     $array3[] = $kategoriTree->nodeValue;
            // }
            // $resultkategoritree = super_unique($array3);
            // $kt = array_filter($resultkategoritree);

            //  //echo '<div class="col-4">';
            //  echo '<ul class="list-group list-group-flush">';

            //     foreach ($kt as $tree) {
            //          if(in_array(htmlspecialchars($tree),$TreeTRAL)){

            //         echo '<li class="list-group-item">' .$tree. '</li>';
            //     }

            //     else
            //     {
            //         echo '<li class="list-group-item list-group-item-danger">' .$tree. '</li>';
            //     }
            //    }
            //      echo '</ul>';
            //     echo '</div>';


            ?>

  </div>
</div>
</div>
</div>
</form>
</div>


                        <!-- End Page Header -->



                    <!-- End Container -->
                    <!-- Begin Page Footer-->

                    <!-- End Page Footer -->
                    <a href="#" class="go-top"><i class="la la-arrow-up"></i></a>
                    <!-- Offcanvas Sidebar -->
                    <div class="off-sidebar from-right">
                        <div class="off-sidebar-container">
                            <header class="off-sidebar-header">
                                <ul class="button-nav nav nav-tabs mt-3 mb-3 ml-3" role="tablist" id="weather-tab">
                                    <li><a class="active" data-toggle="tab" href="#messenger" role="tab" id="messenger-tab">Messages</a></li>
                                    <li><a data-toggle="tab" href="#today" role="tab" id="today-tab">Today</a></li>
                                </ul>
                                <a href="#off-canvas" class="off-sidebar-close"></a>
                            </header>
                            <div class="off-sidebar-content offcanvas-scroll auto-scroll">
                                <div class="tab-content">
                                    <!-- Begin Messenger -->
                                    <div role="tabpanel" class="tab-pane show active fade" id="messenger" aria-labelledby="messenger-tab">
                                        <!-- Begin Chat Message -->
                                        <span class="date">Today</span>
                                        <div class="messenger-message messenger-message-sender">
                                            <img class="messenger-image messenger-image-default" src="assets/img/avatar/avatar-02.jpg" alt="...">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                        <span class="mb-2">Brandon wrote</span>
                                                        Hi David, what's up?
                                                    </p>
                                                </div>
                                                <div class="messenger-details">
                                                    <span class="messenger-message-localization font-size-small">2 minutes ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="messenger-message messenger-message-recipient">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                       Hi Brandon, fine and you?
                                                   </p>
                                                    <p>
                                                       I'm working on the next update of Elisyam
                                                   </p>
                                                </div>
                                                <div class="messenger-details">
                                                    <span class="messenger-message-localisation font-size-small">3 minutes ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="messenger-message messenger-message-sender">
                                            <img class="messenger-image messenger-image-default" src="assets/img/avatar/avatar-02.jpg" alt="...">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                        <span class="mb-2">Brandon wrote</span>
                                                        I can't wait to see
                                                    </p>
                                                </div>
                                                <div class="messenger-details">
                                                    <span class="messenger-message-localization font-size-small">5 minutes ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="messenger-message messenger-message-recipient">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                       I'm almost done
                                                   </p>
                                                </div>
                                                <div class="messenger-details">
                                                    <span class="messenger-message-localisation font-size-small">10 minutes ago</span>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="date">Yesterday</span>
                                        <div class="messenger-message messenger-message-sender">
                                            <img class="messenger-image messenger-image-default" src="assets/img/avatar/avatar-05.jpg" alt="...">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                        I updated the server tonight
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="messenger-message messenger-message-recipient">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                       Didn't you have any problems?
                                                   </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="messenger-message messenger-message-sender">
                                            <img class="messenger-image messenger-image-default" src="assets/img/avatar/avatar-05.jpg" alt="...">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                        No!
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="messenger-message messenger-message-recipient">
                                            <div class="messenger-message-wrapper">
                                                <div class="messenger-message-content">
                                                    <p>
                                                       Great!
                                                   </p>
                                                    <p>
                                                       See you later!
                                                   </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Chat Message -->
                                        <!-- Begin Message Form -->
                                        <div class="enter-message">
                                            <div class="enter-message-form">
                                                <input type="text" placeholder="Enter your message..."/>
                                            </div>
                                            <div class="enter-message-button">
                                                <a href="#" class="send"><i class="ion-paper-airplane"></i></a>
                                            </div>
                                        </div>
                                        <!-- End Message Form -->
                                    </div>
                                    <!-- End Messenger -->
                                    <!-- Begin Today -->
                                    <div role="tabpanel" class="tab-pane fade" id="today" aria-labelledby="today-tab">
                                        <!-- Begin Today Stats -->
                                        <div class="sidebar-heading pt-0">Today</div>
                                        <div class="today-stats mt-3 mb-3">
                                            <div class="row">
                                                <div class="col-4 text-center">
                                                    <i class="la la-users"></i>
                                                    <div class="counter">264</div>
                                                    <div class="heading">Clients</div>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <i class="la la-cart-arrow-down"></i>
                                                    <div class="counter">360</div>
                                                    <div class="heading">Sales</div>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <i class="la la-money"></i>
                                                    <div class="counter">$ 4,565</div>
                                                    <div class="heading">Earnings</div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Today Stats -->
                                        <!-- Begin Friends -->
                                        <div class="sidebar-heading">Friends</div>
                                        <div class="quick-friends mt-3 mb-3">
                                            <ul class="list-group w-100">
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-02.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Brandon Smith</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-03.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Louis Henry</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-04.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Nathan Hunter</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-05.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Megan Duncan</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-left align-self-center mr-3">
                                                            <img src="assets/img/avatar/avatar-06.jpg" alt="..." class="img-fluid rounded-circle" style="width: 35px;">
                                                        </div>
                                                        <div class="media-body align-self-center">
                                                            <a href="javascript:void(0);">Beverly Oliver</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Friends -->
                                        <!-- Begin Settings -->
                                        <div class="sidebar-heading">Settings</div>
                                        <div class="quick-settings mt-3 mb-3">
                                            <ul class="list-group w-100">
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-body align-self-center">
                                                            <p class="text-dark">Notifications Email</p>
                                                        </div>
                                                        <div class="media-right align-self-center">
                                                            <label>
                                                                <input class="toggle-checkbox" type="checkbox" checked>
                                                                <span>
                                                                    <span></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-body align-self-center">
                                                            <p class="text-dark">Notifications Sound</p>
                                                        </div>
                                                        <div class="media-right align-self-center">
                                                            <label>
                                                                <input class="toggle-checkbox" type="checkbox">
                                                                <span>
                                                                    <span></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">
                                                    <div class="media">
                                                        <div class="media-body align-self-center">
                                                            <p class="text-dark">Chat Message Sound</p>
                                                        </div>
                                                        <div class="media-right align-self-center">
                                                            <label>
                                                                <input class="toggle-checkbox" type="checkbox" checked>
                                                                <span>
                                                                    <span></span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End Settings -->
                                    </div>
                                    <!-- End Today -->
                                </div>
                            </div>
                            <!-- End Offcanvas Container -->
                        </div>
                        <!-- End Offsidebar Container -->
                    </div>
                    <!-- End Offcanvas Sidebar -->
                </div>
            </div>
            <!-- End Page Content -->
        </div>
        <!-- Begin Vendor Js -->
        <script src="assets/vendors/js/base/jquery.min.js"></script>
        <script src="assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="assets/vendors/js/nicescroll/nicescroll.min.js"></script>
        <script src="assets/vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
    </body>
</html>
