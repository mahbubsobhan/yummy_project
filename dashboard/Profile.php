
<?=

include('./Include/DashBoardHeader.php');

?>

<div class="row justify-content-center">
  <div class="col-lg-12">
    <div class="card shadow">
      <div class="card-body">
        <form enctype="multipart/form-data" action="../controller/UpdateProfile.php" method="POST">
          <div class="card-header text-center">
            <h2>Profile</h2>
            <label for="avatar">
              <img src="<?= GetImage() ?>" class="w-px-100 rounded-circle ProfileImg" />
              <br>
              <span class="text-danger"><?= $_SESSION['errors']['profileImg_error'] ?? null ?></span>
            </label>
            <input type="file" accept=".jpg,.png" id="avatar"  name="profile"  class="d-none">
          </div>

          <div class="mb-3 d-flex justify-content-center">
            <div class="w-50">
              <label for="">Your Name</label>
              <input type="text" name="username" id="" class="form-control my-3" value="<?=$_SESSION['auth']['username'] ?>" placeholder="Your Name" />
              <span class="text-danger"><?= $_SESSION['errors']['name_error'] ?? null ?></span>
              <br/>
              <label for="">Your Email</label>
              <input type="email" name="email" id="" class="form-control my-3" value="<?=$_SESSION['auth']['email'] ?>" placeholder="Email" />
              <span class="text-danger"><?= $_SESSION['errors']['email_error'] ?? null ?></span>
              <br/>
              <label for="">Update Password</label>
              <input type="password" name="password" id="" class="form-control my-3" placeholder="Update Your Password" />
            </div>
          </div>

          <div class="d-flex justify-content-center">
            <button class="btn btn-primary">Update Profile</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?=

include('./Include/DashBoardFooter.php');


?>


<script>


  const ImageInput = document.querySelector('#avatar');
  const ProfileImage = document.querySelector('.ProfileImg');


  function ProfileImageUpdate(event) {

    ProfileImage.src = URL.createObjectURL(event.target.files[0]);

  }

 ImageInput.addEventListener('change',ProfileImageUpdate);

</script>





<?php

if(isset($_SESSION['success'])){

?>
  <script>
  Toast.fire({
    icon: "success",
    title: "Update successfully"
  });
  </script>
<?php
}

unset($_SESSION['errors']);
unset($_SESSION['success']);
