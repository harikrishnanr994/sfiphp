<?php require 'inc/db_config.php';

    //if(isset($_POST['submit'])){
    echo "<script>alert('reached1')</script>";
      $id = mysqli_query($mysqli, "Select *  from blog_posts ORDER BY post_id DESC limit 1 "); //Query the users table
      $row = mysqli_fetch_array($id);
      $uid=$row['post_id'];
      $uid++;
    	  $post_title = $_POST['title'];
    	  $post_date = date('m-d-y');
    	  $post_author = (int)$_POST['author'];
        $post_desc = $_POST['post_desc'];
    	  $post_content = $_POST['content'];
    	  $post_image= $_FILES['image']['name'];
    	  $image_tmp= $_FILES['image']['tmp_name'];
echo "<script>alert('reached2')</script>";
      	if($post_title=='' or $post_author=='' or $post_content=='' or $post_image==''){
          echo "<script>alert('Any of the fields is empty')</script>";
      	  exit();
      	} else {
    	     move_uploaded_file($image_tmp,$one->assets_folder."/img/blog/$post_image");
    	     $insert_query = "insert into blog_posts (post_title,blog_post_desc,blog_head_image,post_date,owner_id,active) values ('$post_title','$post_desc','$post_image','$post_date','$post_author',1);";
           $insert_query .= "insert into blog_post_details (post_id,post_text) values ('$uid','$post_content');";
           echo "<script>alert('reached3')</script>";
           if(mysqli_multi_query($mysqli, $insert_query)){
             echo "<script>alert('reached4')</script>";
          	echo "<script>alert('post published successfuly')</script>";
          	echo "<script>window.open('blog.php','_self')</script>";

        	  }
        }
    //}
    //update or edit
    /*
    if(isset($_POST['update'])){
    	  $post_title = $_POST['title'];
    	  $post_date = date('m-d-y');
    	  $post_author = $_POST['author'];
        $post_desc = $_POST['post_desc'];
    	  $post_content = $_POST['content'];
    	  $post_image= $_FILES['image']['name'];
    	  $image_tmp= $_FILES['image']['tmp_name'];

      	if($post_title=='' or $post_author=='' or $post_content=='' or $post_image==''){
          echo "<script>alert('Any of the fields is empty')</script>";
      	  exit();
      	} else {
    	     move_uploaded_file($image_tmp,$one->assets_folder."/img/blog/$post_image");
           $update_query = "update posts set post_title='$post_title1',post_date='$post_date1',post_author='$post_author1',post_image='$post_image1',post_keywords='$post_keywords1',post_content='$post_content1' where post_id='$update_id'";

           if(mysql_query($insert_query)){

          	echo "<script>alert('post published successfuly')</script>";
          	echo "<script>window.open('blog.php','_self')</script>";

        	  }
        }
    }
*/
?>
