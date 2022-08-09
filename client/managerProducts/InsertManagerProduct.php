<?php

?>

<body>
    <?php echo '  <form class="modal-content animate" action="' . $requestInsertAPI . '" method="post">
            <div class="container">
                <div>
                <label for="uname"><b>Tên Sản Phẩm</b></label>
                <input type="text" placeholder="Enter Username" name="key_name" required>
                </div>
                 <input id="photo"class="file"type="file" name="mainimage" 
                               value="" onchange="GetPictureInfoViews()"><br><br>

                <div>
                <label for="uname"><b>Giá Cũ</b></label>
                <input type="text" placeholder="Enter Username" name="key_oddPrice" required>
                </div>

                <div>
                <label for="uname"><b>Giá Mới</b></label>
                <input type="text" placeholder="Enter Username" name="key_newPrice" required>
                </div>


                <div>
                <label for="uname"><b>Loại Sản Phẩm</b></label>
                <input type="text" placeholder="Enter Username" name="key_category" required>
                </div>

                <div>
                <label for="uname"><b>Mô Tả</b></label>
                <input type="text" placeholder="Enter Username" name="key_description" required>
                </div>
                <input type="text" id="input_link" name="key_picture" style="display: none">
                <button id="submit_link" type="submit" name="InsertManagerProduct">Them</button>
            </div>
        </form>'; ?>

    <script  src="/backend/ImagesServices/imagesServices.js"></script>
</body>