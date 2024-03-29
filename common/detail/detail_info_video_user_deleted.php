<link rel="stylesheet" href="../../public/css/detail_page/boostrap.css">
<link rel="stylesheet" href="../../public/css/detail_page/style.css">
<link rel="stylesheet" href="../../public/css/detail_page/uploaded_page.css">
<link rel="stylesheet" href="../../public/fontawesome-free-5.15.3-web/css/all.min.css">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<!-- <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script> -->
<head>
<title>Manage</title>
<link rel="icon"
        href="../../img/icon_page/icon_page.png">
</head>
<?php 
require_once ('../../db/dbhelper.php');
session_start();
if (!empty($_SESSION['user'])) {
  $user = $_SESSION['user'];
} else {
  header("location: ../../main/");
}

//Truy van database
$sql = "select * from account where id = '$user'";
$info_user = executeSingleResult($sql);
if ($info_user != null) {
  $id = $info_user['id'];
  $username = $info_user['user_name'];
  $useravatar = $info_user['user_avatar'];
  $email   = $info_user['email'];
  $phone = $info_user['phone'];
  $created_at = $info_user['created_at'];
} else {
  header("location: ../../main/");
}

?>
<?php
if (isset($_SESSION['user'])) {
$userdetail = <<< EOD
          <div class="up_container">

          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="../../main/" class=" navbar-brand ">
              <img src="../../img/icon_page/icon_page.png"
                class="up_logo-page" />
              <div class="up_logo-name">Trung's YOUTUBE</div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="form-inline my-2 my-lg-0">
              <div class="up_search-container">
                <i class="fas fa-search search_icon" style="cursor: default;"></i>
                <div class="search_content">
                  <input class="form-control mr-sm-2 search_input" id="search_input" name="search_input" type="search" style="border: none;" placeholder="Tìm kiếm trên kênh của bạn">
      
                </div>
              </div>
              <div class="list-group" id="result"></div>
      
            </form>
              <div class="up_create-container">
                <button class=" btn-active crip_animate" id="modal_btn" style="position: relative;">
                  <i class="fas fa-video bx"></i>
                  <span class="bx ">Tạo</span>
                </button>
              </div>
              <div class="up_user-avatar_nav">
                <img src="../../img/$useravatar" class="up_user-avatar" alt="" onclick="up_dropDown_nav()">
                <div id="up_dropDown" class="up_dropdown-content">
                  <div class="up_dropdown-userinfo">
                    <div class="up_dropdown-user-avatar">
                      <img src="../../img/$useravatar" class="up_user-avatar-dropdown" alt="">
                    </div>
                    <div class="up_dropdown-user-name">
                      $username
                    </div>
                  </div>
                  <div class="up_dropdown-options">
                    <a href="../../common/channel_user/videos.php?id=$id">
                      <div class="up_icon">
                        <div>
                          <i class="up_dropdown-options-icon far fa-user-circle"></i>
                        </div>

                        <div style="margin-left: 10px;">Kênh của bạn</div>
                      </div>
                    </a>
                  </div>
                  <div class="up_dropdown-options">
                    <a href="../../main/">
                      <div class="up_icon">
                        <div>
                          <img
                            src="../../img/icon_page/icon_page.png"
                            class="up_dropdown-options-icon" />
                        </div>

                        <div style="margin-left: 10px;">Trung's YOUTUBE</div>
                      </div>
                    </a>
                  </div>
                  <div class="up_dropdown-options">
                    <a href="../../common/account_manage/progressLogout.php">
                      <div class="up_icon">
                        <div>
                          <i class="up_dropdown-options-icon fas fa-sign-out-alt"></i>
                        </div>

                        <div style="margin-left: 10px;">Đăng xuất</div>
                      </div>
                    </a>
                  </div>
                </div>

              </div>
            </div>
          </nav>

          <div class="main-content_container container-fluid">
            <div class="row m_row">
              <div class="side_container col-xl-2 col-sm-1">
                <div class="side-inner_container">
                  <div class="side-inner_userinfo">
                    <div class="user_avatar">
                      <a href="../../common/channel_user/videos.php?id=$id"><img src="../../img/$useravatar" alt=""></a>
                    </div>
                    <div class="user_title">
                      Kênh của bạn
                    </div>
                    <div class="user_name">
                      $username
                    </div>
                  </div>
                  <div class="side-inner_options">
                    <ul class="sidebar-options-first">
                      <li class="sidebar-options__item ">
                        <a href="detail_info_video_user.php" class="sidebar-options__link">
                          <span class="sidebar-options__icon">
                            <i class="fab fa-youtube"></i>
                          </span>
                          <span class="sidebar-options__name ">Nội dung</span>
                        </a>
                      </li>

                      <li class="sidebar-options__item selected">
                        <a href="" class="sidebar-options__link">
                          <span class="sidebar-options__icon">
                            <i class="fas fa-trash"></i>
                          </span>
                          <span class="sidebar-options__name">Video đã xóa</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="main_container col-xl-10 col-sm-11">
                <div class="main_title-container">
                  <div class="main_title">
                    Danh sách video đã xóa
                  </div>
                </div>
                <div class="main_videos">

                 
                  <div class="videos-content">
                    <div class="videos-content-title">
                    <div class="videos-content-box-g title" style="width: 76px;"></div>
                      <div class="videos-content-box-g title video">Video</div>
                      <div class="videos-content-box title day">Ngày xóa</div>
                      <div class="videos-content-box title view">Số lượt xem</div>

                      <div class="videos-content-box title like">Số lượt thích</div>
                    </div>
                    <div>
        EOD;
        echo $userdetail;
}
?>
                <?php
                  if (isset($_SESSION['user'])) {

                    $sql = "SELECT * FROM video WHERE video.user_id = ".$_SESSION['user'];
                    $sql .= " AND deleted_at ORDER BY created_at DESC";
                    $video = executeResult($sql);

                    $db = mysqli_connect("localhost", "root", "", "cloneyoutube");
                    $rs = mysqli_query($db,$sql);
                    if (mysqli_num_rows($rs) > 0) {
                        foreach ($video as $item) {
                          $videos = <<< EOD
                            <div class="videos-content-main">
                            <div class="videos-content-box videos-content-box-options">
                              <div class="videos_option_choice text-primary"><a href ="../../common/main/progressVideo.php?user_id=$user&video_id={$item['id']}&type=restore"><i class="fas fa-edit"></i> Khôi phục </a> </div>
                              <div class="videos_option_choice delete_modal_btn text-danger" data-user_id="$id" data-video_id="{$item['id']}"><i class="fas fa-trash-alt"></i> Xóa vĩnh viễn </div>
                            </div>
                            <div class="videos-content-box-g video">
                              <div class="video-content_video">
                              <div class="video-content_thumbnail">
                                <img src="https://img.youtube.com/vi/{$item['video_id']}/mqdefault.jpg" class="video-content_video-img" alt="404 Not Found">
                              </div>
                              <div class="video-content_name">
                                    {$item['tenvideo']}
                              </div>
                              </div>
                            </div>
                            <div class="time" style="display: none;" data-value="{$item['deleted_at']}"></div>
                            <span class="videos-content-box day createTime"></span>
                            <div class="videos-content-box view">{$item['view_count']}</div>

                            <div class="videos-content-box like">{$item['like_count']}</div>
                            </div>
                          EOD;
                        echo $videos;
                        }
                    } else {
                      echo "<div style='display: flex; justify-content: center;'> Bạn chưa xóa video nào !!! </div>";
                    }
                  }
                ?>
<?php 
$div =<<<EOD
        </div>
      </div>
    </div>

  </div>
  EOD;
  echo $div;
?>


<!-- The Delete Modal -->
<div class="modal fade" id="delete_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
      </div>
      <div class="modal-body" style="text-align: center;">
        <p class="text-danger">
        Bạn chắc chắn muốn xóa VĨNH VIỄN video này chứ? <br>
        <-- Một khi đã xóa sẽ không khôi phục được  -->
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary " id="delete_modal_close" data-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-danger" id="delete_modal_confirm"> Chắc chắn Xóa</button>
      </div>
    </div>
  </div>
</div>
<!-- The Modal -->
<div id="upload_modal" class="upload-modal">

  <!-- Modal content -->
  <div class="upload-modal-content">
    <div class="upload-modal-content_inner">
      <div class="upload-modal-top">
        <div class="upload-modal-title">
          <div>Tải video lên</div>
        </div>
        <div class="upload-modal-close">
          <span class="modal-close-btn">&times;</span>
        </div>
      </div>
      <div class="upload-modal-main">

        <form class="mt-4" method="POST" id="submit_form" action="../channel_user/progressUp.php">
          <div id="main_form">
            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id;?>">
            <input type="hidden" class="form-control" id="username" name="username" value="<?php echo $username;?>">
            <input type="hidden" class="form-control" id="useravatar" name="useravatar" value="<?php echo $useravatar;?>">
            <div class="form-group">
              <label for="name">Tiêu đề</label>
              <textarea class="form-control" id="name" maxlength="100" name="name"></textarea>
              <div id="name_count">
                
              </div>
              <div class="form__input-error-message"></div>
            </div>
            <div class="form-group">
              <label for="description">Mô tả</label>
              <textarea class="form-control" id="description" maxlength="5000" name="description"></textarea>
              <div id="description_count">
                
              </div>
              <div class="form__input-error-message"></div>
            </div>
            <div class="form-group">
              <label for="videoId">VideoID</label>
              <textarea class="form-control" id="videoId" maxlength="32" name="videoId"></textarea>
              <div class="form__input-error-message"></div>
            </div>

            <div class="form-group">
              <label for="category">Thể loại</label>
              <select name="category" id="category" required>
              <option value="" selected disabled hidden>Chọn thể loại</option>
              <?php 
                  $sql = "select * from category";
                  $data_category = executeResult($sql);
                  foreach($data_category as $category_mini) {
                      $category = <<<EOD
                        <option value="{$category_mini['category_name']}">{$category_mini['category_name']}</option>
                      EOD;
                      echo $category;
                  }
              ?>
              </select>
              <div class="form__input-error-message"></div>
            </div>

            <div class="col text-center">
              <button type="button" class="preview_button btn btn-primary" id="preview">PREVIEW</button>
            </div>
          </div>

        </form>
        <div class="preview_info" id="preview_form" style="display: none;">

          <div class="p_video_container">
            <div class="" id="p_videoId" name="p_videoId" style="display: none;"></div>
            <iframe width="900" height="506" id="p_img" src="" title="YouTube video player" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture;"
              allowfullscreen></iframe>
          </div>
          <div class="p_name_container">
            <h1 class="p-card-title" id="p_name" name="p_name"></h1>
          </div>


          <div class="p_description_container">
            <div class="p_description_content" id="p_description" name="p_description"></div>
          </div>

          <div class="p_button_container">
            <button class="return_button btn btn-primary btn-warning" id="back_button">CHỈNH SỬA</button>
            <button type="submit" class="submit_button btn btn-primary" id="submit_video_form">LƯU</button>
          </div>
        </div>
      </div>


    </div>
  </div>

</div>
<a href="" id="middle_man"></a>
<a href="" id="middle_man_all"></a>
<!-- Notify Modal -->
<?php
if (!empty($_SESSION['success'])) {
  $success = $_SESSION['success'];
}
if (isset($_SESSION['success'])) {
  $modal =<<< EOD
    <div class="notify_modal" id="notify_modal_id">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Thông báo</h5>
          </div>
          <div class="modal-body">
            <p>$success</p>
          </div>
        </div>
      </div>
    </div>
  EOD;
  echo $modal;
  unset($_SESSION['success']);
}
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="../../public/js/info_page.js"></script>
<script src="../../public/js/validate.js"></script>
<script src="../../public/js/moment.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src='https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" 
crossorigin="anonymous"></script>

<script>
  var open_delete_modal = document.querySelectorAll(".delete_modal_btn");
  var delete_modal = document.getElementById("delete_modal");
  var close_delete_modal = document.getElementById("delete_modal_close");
  [].forEach.call(open_delete_modal, function(el) {
    el.onclick = function() {
      delete_modal.classList.add("show");
        let data = $(el);
        user_id = data.data('user_id');
        video_id = data.data('video_id');
    }
    var btn_confirm_delete = document.getElementById('delete_modal_confirm');
    btn_confirm_delete.onclick = function () {
      middle_man.href = '../../common/main/progressVideo.php?user_id='+ user_id +'&video_id='+ video_id +'&type=real_delete';
      middle_man.click();
    }
  })
  
  close_delete_modal.onclick = function() {
    delete_modal.classList.remove("show");
  }
  window.onclick = function(event) {

    // if (!event.target.matches('#delete_modal_btn')) {
    //   delete_modal.classList.remove("show");
    //   delete_modal.classList.add("fade");
    // }
    if (!event.target.matches('.up_user-avatar')) {
      var drop_down_avatar = document.getElementById("up_dropDown");
      drop_down_avatar.classList.remove("show");
    }
    var modal = document.getElementById("upload_modal");
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
  setTimeout(function() {
    $('#notify_modal_id').addClass('notify_modal_hide');
  }, 3500);
</script>

<script>
  $(document).ready(function () {

    $("#name").keyup(function () {
      var nam_value = $(this).val();
      $("#p_name").text(nam_value);
      $("#name_count").text($(this).val().length + "/100");
    });
    $("#description").keyup(function () {
      var des_value = $(this).val();
      $("#p_description").text(des_value);
      $("#description_count").text($(this).val().length + "/5000");
    });

  });

  var preview_btn = document.getElementById("preview");

  preview_btn.onclick = function (e) {
    e.preventDefault();

    $('#preview_form').show();
    add = $('#videoId').val();
    $('#p_videoId').empty().text(add);
    var x = document.getElementById("p_videoId").innerHTML;

    var preview_img = document.getElementById("p_img");
    preview_img.src = "https://www.youtube.com/embed/" + x + "?autoplay=1&rel=0";

    var modal = document.getElementById("main_form");
    modal.style.display = "none";
  }

  var back_btn = document.getElementById("back_button");
  var main_modal = document.getElementById("main_form");
  var preview_modal = document.getElementById("preview_form");
  back_btn.onclick = function () {
    main_modal.style.display = "block";
    preview_modal.style.display = "none";
  }

</script>

<script>
  Validator({
    form: '#submit_form',
    formGroupSelector: '.form-group',
    errorSelector: '.form__input-error-message',
    rules: [
      Validator.isRequired('#name'),
      Validator.isRequired('#description'),
      Validator.isRequired('#videoId'),
      Validator.isRequired('#category'),
      Validator.minLength('#name', 5),
      Validator.minLength('#description', 5),

    ],

  });
</script>

<script>
  function up_dropDown_nav() {
    document.getElementById("up_dropDown").classList.toggle("show");
  }
</script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var x = document.querySelectorAll('.time');
    var z = document.getElementsByClassName('createTime')
    for (i = 0; i < x.length; i++) {
      var y = new Date(x[i].getAttribute("data-value"));
      var month = y.getMonth() + 1;
      z[i].innerHTML = y.getDate() + " th " + month + ", " + y.getFullYear();
    }
  });
</script>

<script>
$("textarea").each(function () {
  this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
}).on("input", function () {
  this.style.height = "auto";
  this.style.height = (this.scrollHeight) + "px";
});
$("#submit_video_form").click(function() {
    validVideoId(add)
  });
  function validVideoId(id) {
      var img = new Image();
      img.src = "http://img.youtube.com/vi/" + id + "/mqdefault.jpg";
      img.onload = function () {
        checkThumbnail(this.width);
      }
	  }    

	function checkThumbnail(width) {
		//HACK a mq thumbnail has width of 320.
		//if the video does not exist(therefore thumbnail don't exist), a default thumbnail of 120 width is returned.
		if (width === 120) {
			alert("Error: ID video không hợp lệ");
		} else {
      $("#submit_form").submit();
    }
	}
</script>
<!-- SEARCH AJAX -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"../ajaxliveSearch.php?where=edit",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_input').keyup(function(){
  var search = $(this).val();
  var search_field = document.getElementById("result");
  if($(this).val().length > 0){
    search_field.style.display = "block";
  }

  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>
<!-- <script>
  document.addEventListener('DOMContentLoaded', function () {
    var courseId;
    var deleteForm = document.forms['delete-course-form'];
    var checkboxAll = $('#checkbox-all');
    var checkboxAll2 = $('.checkbox-all');
    var courseItemCheckbox = $('input[name="courseId[]"]')
    var containerForm = document.forms['container-form'];
    var optionsBox = document.getElementById("videos-content_actions");


    checkboxAll.change(function () {
      var isCheckedAll = $(this).prop('checked');
      courseItemCheckbox.prop('checked', isCheckedAll);
      var IsChecked = $('input[name="courseAll"]:checked').length > 0;
      var IsCheckedLength = document.getElementById("isCheckedLength");
      if (IsChecked) {
        optionsBox.classList.add("show-options");
        IsCheckedLength.innerText = "Đã chọn tất cả video";
      } else {
        optionsBox.classList.remove("show-options");
      }
    });

    courseItemCheckbox.change(function () {
      var isCheckedArray = courseItemCheckbox.length === $('input[name="courseId[]"]:checked').length;
      checkboxAll.prop('checked', isCheckedArray);

      var atLeastOneIsChecked = $('input[name="courseId[]"]:checked').length > 0;
      var IsCheckedLength = document.getElementById("isCheckedLength");
      if (atLeastOneIsChecked) {
        optionsBox.classList.add("show-options");
        IsCheckedLength.innerText = "Đã chọn " + $('input[name="courseId[]"]:checked').length;
      } else {
        optionsBox.classList.remove("show-options");
      }
    });

    var close_btn = document.getElementById("video_info_page_close");
    var modal_options = document.getElementById("videos-content_actions");
    close_btn.onclick = function() {
      modal_options.classList.remove("show-options");
      checkboxAll2.prop('checked',false);
      checkboxAll.prop('checked',false);
    }  
  });
</script> -->

<!-- //  ./../img/icon_page/icon_page.png  -->