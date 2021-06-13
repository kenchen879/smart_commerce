<div class='dashboard-wrapper dashboard-user-profile'>
    <div id='media'>
        <h2 class='' style='font-weight: 600;'>新增產品</h2>
        <form class='text-left clearfix' id='insertForm' role="form" enctype="multipart/form-data">
            <div class='form-group'>
                <input type='text' id='pName' name='pName' class='form-control' placeholder='產品名稱' style='width:50%;'>                
            </div>
            <div class='form-group'>
                <input type='number' id='pUnitPrice' name='pUnitPrice' class='form-control' placeholder='$' style='width:50%;' min=0 max=10000>
            </div>
            <div class='form-group'>
                <textarea id='pDescription' name='pDescription' class='form-control' placeholder='產品描述' style='width:50%;' rows="5" cols="20"></textarea>
            </div>
            <?php
                    require "../mysql/config.php";
                    $categorySql = "SELECT DISTINCT(category) FROM product;";
                    $link->query($categorySql);
            ?>
            <div class="product-category">
                <h4 class="widget-title"style="font-weight:600;display:inline">分類</h4><br>                
                <select id="categoryChoice">
                    <option>選擇</option>
                    <?php
                        while($row = $link->getData())
                            echo "<option>".$row['category']."</option>";
                    ?>
                </select>
                <input type='text' id='category' name='category' class='form-control' placeholder='分類' style='width:50%;'>
            </div>
            <div id='upBox'>
                <label id='inputBox' class='tf-ion-images' for='upload_img' style='width:100px;'>
                    <input id='upload_img' name='userImage[]' style='display:none;' type='file' multiple>
                </label>
                <div class='' id='imgBox'>
                    <img class='img-responsive' id='imageData' src='#' alt='產品圖片' style='height:50px;width:50px;display:inline'/>                
                </div>
            </div>
            <button type='submit' class='btn btn-main text-center'>新增產品</button>            
        </form>                                
    </div>
</div>
<script src="../../js/jquery_res_insertproduct.js"></script>
<script>
    $('#categoryChoice').change(()=>{
        var cateVal = $('#categoryChoice').val();
        $('#category').val(cateVal);
    });    
    imgUpload({
				inputId:'upload_img', //input框id
				imgBox:'imgBox', //圖片容器id
				// buttonId:'btn', //提交按鈕id
				// upUrl:'',  //提交地址
				// data:'file' //引數名
			});
</script>
<script src="../../js/jquery_res_product.js"></script>
