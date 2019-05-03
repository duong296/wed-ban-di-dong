<?php
    require_once __DIR__. "/../../autoload/autoload.php" ;

    $category = $db->fetchAll("category");
?>
<?php require_once __DIR__. "/../../layouts/header.php" ; ?>

    <div id="content-wrapper">
      <h1>DANH SÁCH DANH MỤC <a href="add.php" class="btn btn-success">thêm mới</a></h1>
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="http://localhost/didong/admin">trang chủ admin</a>
            </li>
            <li class="breadcrumb-item active"> danh sách danh mục </li>
          </ol>
        </div>
        <div class="clearfix"></div>
        <?php if(isset($_SESSION['success'])) :?>
          <div class="alert alert-success">
           <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
          </div>
        <?php endif ; ?>

        <?php if(isset($_SESSION['error'])) :?>
          <div class="alert alert-danger">
           <?php echo $_SESSION['error']; unset($_SESSION['error']) ?>
          </div>
        <?php endif ; ?>
          <div class="table-category">
            <table style="width:100%">
              <tr>
                <th>STT</th>
                <th>name</th>
                <th>created</th>
                <th>action</th>
              </tr>
              <?php $stt = 1 ;foreach ($category as $item) : ?>
              <tr>
                <td><?php echo $stt?></td>
                <td><?php echo $item['name']?></td>
                <td><?php echo $item['created_at']?></td>
                <td>
                  <a href="edit.php?id<?php echo $item['id'] ?>">sửa</a>
                  <a href="delete.php?id<?php echo $item['id'] ?>">xóa</a>
                </td>
              </tr>
              <?php $stt++; endforeach ?>
            </table>
      </div>
       <div id="pagination" class="text-center">
          <a href="#">&laquo;</a>
          <a href="#">1</a>
          <a class="active" href="#">2</a>
          <a href="#">3</a>
          <a href="#">4</a>
          <a href="#">5</a>
          <a href="#">6</a>
          <a href="#">&raquo;</a>
        </div>  
</div>
 <?php require_once __DIR__. "/../../layouts/footer.php" ; ?>