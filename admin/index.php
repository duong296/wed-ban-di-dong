<?php

    require_once __DIR__. "/autoload/autoload.php" ;
    $db = new database ;
    $category = $db -> fetchAll("category") ;
?>
   <?php require_once __DIR__. "/layouts/header.php" ; ?>

    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">xin chào bạn đến với trang admin</a>
          </li>
          <li class="breadcrumb-item active">Overview</li>
        </ol>
      </div>
    </div>  
 <?php require_once __DIR__. "/layouts/footer.php" ; ?>