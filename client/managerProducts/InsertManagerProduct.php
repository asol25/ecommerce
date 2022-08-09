<?php

?>

<body>
    <?php echo '  <form class="modal-content animate" action="' . $requestInsertAPI . '" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById("id01").style.display="none"" class="close" title="Close Modal">&times;</span>
                <img src="img_avatar2.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <div>
                <label for="uname"><b>Tên Sản Phẩm</b></label>
                <input type="text" placeholder="Enter Username" name="key_name" required>
                </div>

                
            <progress value="0" id="uploader" max="100">0%</progress><br><br>
            // get the file from user
            <input id="photo"class="file"type="file" name="mainimage" 
                               value="" onchange="GetPictureInfoViews()"><br><br>
            // submit the chosen file
            <button id="submit_link"type="submit" name="button">Save</button>

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

                <button type="submit" name="InsertManagerProduct">Them</button>
            </div>
        </form>'; ?>

    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-firestore.js"></script>
    <script src="/backend/ImagesServices/imagesServices.js"></script>
</body>