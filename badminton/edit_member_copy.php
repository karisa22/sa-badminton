<?php
include 'common/connect.php';
session_start();
if (!isset($_SESSION["type"])) //1 = admin , 2 = member
    header("location:login.php");
if ($_SESSION["type"]!=1) //admin only
    header("location:home.php");
if (!isset($_GET['id'])) //1 = admin , 2 = member
    header("location:profile_list.php");
$id = $_GET['id'];
$sql = "SELECT * FROM t_user WHERE user_id='$id'";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_array($result);
$status= $row['user_type'];

$name=$row['user_name'];
$tel=$row['user_tel'];
$type=$row['user_type'];
$username=$row['user_username'];
$image=$row['image_name'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
  <?php if ($result) { ?>
    <div class="d-flex justify-content-center align-items-center vh-100">

      <form class="shadow w-450 p-3" action="controllers/update_user.php" method="post" enctype="multipart/form-data">

        <h4 class="display-4  fs-1">Edit Profile</h4><br>

        <div class="mb-3" style='display:none;'>
          <label class="form-label">id</label>
          <input type="text" class="form-control" name="id" value="<?php echo $id ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Name</label>
          <input type="text" class="form-control" name="name" value="<?php echo $name ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Telephone</label>
          <input type="text" class="form-control" name="tel" value="<?php echo $tel ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" class="form-control" name="username" value="<?php echo $username ?>">
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="text" class="form-control" name="password" value="">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="profile_list.php" class="link-secondary">Back</a>
      </form>
    </div>
  <?php } ?>
</body>

</html>