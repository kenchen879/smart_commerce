<?php 		
    require "../mysql/config.php";
    session();
    $sId = $_SESSION['sId'];    
    $productSQL = "SELECT * FROM product WHERE sId=$sId;";
    $link->query($productSQL);
    while ($productRow = $link->getData()) {
        $pNo = $productRow["pNo"];
        $productName = $productRow["pName"];
        $productUnitPrice = $productRow["pUnitPrice"];
        $imageName = $productRow["image"];        
        echo "
            <div class='col-md-4'>
                <div class='product-item'>
                    <div class='product-thumb'>
                        <span class='bage'>Sale</span>
                        <img class='img-responsive' id='imageData$pNo' src='../../images/$imageName' alt='product-img' style='height:250px;'/>
                        <div class='preview-meta'>
                            <ul>
                                <li id='productmodal$pNo'>
                                    <span data-toggle='modal' data-target='#product-modal$pNo'>
                                        <i class='tf-ion-ios-search-strong'></i>
                                    </span>
                                </li>
                                <li>
                                    <span>
                                        <form id='uploadForm$pNo' action='upload.php' method='post'>
                                            <label class='tf-ion-images' for='upload_img$pNo' style='width:100px;'>
                                                <input id='upload_img$pNo' name='userImage$pNo' style='display:none;' type='file'>
                                            </label>
                                        </form>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class='product-content'>
                        <h4><a href='../page/product-details.php?pNo=$pNo' id='ppName$pNo'>$productName</a></h4>
                        <p id='ppUnitPrice$pNo' class='price'>$$productUnitPrice</p>
                    </div>
                </div>
            </div>
            ";
    }
    echo "<input type='text' id='pNo' value='$pNo' style='display:none'>";
    $link->query($productSQL);
    while($productRow = $link->getData()){
        $pNoArr[] = $productRow["pNo"];
    }
    foreach ($pNoArr as $key => $value) {
        $productSQLArr[] = "SELECT * FROM product WHERE pNo = $pNoArr[$key];";
    }
    foreach ($productSQLArr as $key => $value) {
        $link->query($productSQLArr[$key]);
        $productRow = $link->getData();
        $pNo = $productRow["pNo"];
        $productName = $productRow["pName"];
        $productUnitPrice = $productRow["pUnitPrice"];
        $productDescription = $productRow["pDescription"];
        $category = $productRow["category"];
        $imageName = $productRow["image"];
        $productDescription = str_replace("<br>", "\n", $productDescription);
        echo"
            <div class='modal product-modal fade' id='product-modal$pNo'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                    <i class='tf-ion-close'></i>
                </button>
                <div class='modal-dialog ' role='document'>
                    <div class='modal-content'>
                        <div class='modal-body' style='padding:10px;'>
                            <div class='row'>
                                <div style='float:left;padding:20px;width:300px'>
                                    <img class='img-responsive' src='../../images/$imageName' alt='product-img' style='height:315px;' />
                                </div>
                                <div class='single-product-details'><br>
                                    <h2 id='pName$pNo'>
                                        $productName
                                    </h2>
                                    <input id='changeName$pNo' type='text' style='display:none'><br><br>
                                    $ <p class='product-price' id='pUnitPrice$pNo'>
                                        $productUnitPrice
                                    </p>
                                    <input id='changePrice$pNo' type='text' style='display:none'><br>
                                    <textarea class='product-description mt-20' id='pDescription$pNo' rows='5' cols='30'>$productDescription</textarea>
                                    <textarea  class='product-description mt-20' id='changeDes$pNo' style='display:none' rows='5' cols='30'></textarea>
                                    <div class='product-size'>
                                        <span>尺寸:</span>
                                        <select class='form-control'>
                                            <option>F</option>
                                        </select>
                                    </div>
                                    <div class='product-category'>
                                        <span>分類:</span>
                                        <ul>
                                            <li id='category$pNo'>$category</li>
                                            <input id='changeCate$pNo' type='text' style='display:none;width:70px;'>
                                        </ul>                                        
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
    }
    echo "<input type='text' id='countI' value=$pNo style='display:none;' />";
    echo "<script src='../../js/jquery_resimage.js'></script>";
    echo "<script src='../../js/jquery_res_changeproduct.js'></script>";
?>