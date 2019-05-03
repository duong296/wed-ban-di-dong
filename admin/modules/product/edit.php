<?php
   $open = "category";
   
   require_once __DIR__. "/../../autoload/autoload.php" ;
   $category = $db->fetchAll("category");
        $error = array();
        $data = array();
        if (!empty($_POST['add_action']))
        {
            // Lấy dữ liệu
            $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
          
            if (empty($data['name'])){
                $error['name'] = '* mời bạn điền đầy đủ sản phẩm';
            }
              
            // Lưu dữ liệu
            if (!$error)
            {

              $isset = $db->fetchOne("category","name = '".$data['name']."'");
              if (count($isset) > 0)
                {
                   $_SESSION['error']= "tên danh mục dã tồn tại ";
                   redirectAdmin("category");
                }

                else
                {
                echo 'thêm mới thành công';
                $id_insert = $db->insert("category",$data);
                if($id_insert > 0)
                {
                    $_SESSION['success']= "thêm mới thành công ";
                    redirectAdmin("category");
                }
              }
              
            }

        }
?>
 <?php require_once __DIR__. "/../../layouts/header.php" ; ?>
    <div id="content-wrapper">
      <h1>
       THÊM MỚI   SẢN PHẨM
      </h1>
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="http://localhost/didong/admin/">Trang chủ admin</a>
            </li>
            <li class="breadcrumb-item">
              <a href="http://localhost/didong/admin/modules/product/">sản phẩm</a>
            </li>
            <li class="breadcrumb-item active">thêm mới sản phẩm</li>
          </ol>
        </div>
        <div class="forms-add">
           <form class="form-horizontal" role="form" method="post" action="add.php">

             <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">danh mục sản phẩm</label>
              <div class="col-sm-8">
              <select class="form-control col-md-8" name="category_id">
              <option value="">- mời bạn chọn danh mục sản phẩm -</option>  
              <?php foreach ($category as $item):?>
                <option value="<?php echo $item['id'] ?>"><?php echo $item['name']?></option>
              <?php endforeach ?>
              </select>
                <p class="text-danger"><?php echo isset($error['name']) ? $error['name'] : ''; ?></p>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">tên sản phẩm</label>
              <div class="col-sm-8">
                <input type="text"  name="name" class="form-control" id="inputEmail3" placeholder="tên sản phẩm" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>"/>
                <p class="text-danger"><?php echo isset($error['name']) ? $error['name'] : ''; ?></p>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label"> giá sản phẩm</label>
              <div class="col-sm-8">
                <input type="number"  name="price" class="form-control" id="inputEmail3" placeholder="9.999.999" value="<?php echo isset($data['price']) ? $data['price'] : ''; ?>"/>
                <p class="text-danger"><?php echo isset($error['price']) ? $error['price'] : ''; ?></p>
              
              </div>
            </div>

             <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label"> giảm giá</label>
              <div class="col-sm-3">
                <input type="number"  name="sele" class="form-control" id="inputEmail3" placeholder="10%" value="0"/>
              </div>
            </div>

             <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label"> hình ảnh</label>
              <div class="col-sm-3">
                <input type="file"  name="sele" class="form-control" id="inputEmail3" name="thumbnair" />
                  <p class="text-danger"><?php echo isset($error['thumbnair']) ? $error['thumbnair'] : ''; ?></p>
              </div>
            </div>

             <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">nội dung</label>
              <div class="col-sm-8">
                <textarea type="text"  name="content" class="form-control" id="inputEmail3"></textarea>
                <p class="text-danger"><?php echo isset($error['content']) ? $error['content'] : ''; ?></p>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="add_action" value="Gửi liên hệ" class="btn btn-success">lưu</button>
              </div>
            </div>
          </form>
        </div>

      
</div>
 <?php require_once __DIR__. "/../../layouts/footer.php" ; ?>
 