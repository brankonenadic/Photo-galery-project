<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) { redirect("login.php"); }?> 
<?php   
    $photos = Photo::find_all();
?>
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
        
            <!-- Top Menu Items -->
            <?php include("includes/top_nav.php"); ?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include("includes/side_nav.php"); ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
        <div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Photos
            <small>Subheading</small>
        </h1>
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Photo</th>
                        <th>ID</th>
                        <th>File name</th>
                        <th>Title</th>
                        <th>Size</th>
                        <th>Coments</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($photos as $photo) : ?>
                    <tr>
                        <td><img class="admin-photo-tumbnail" src="<?php echo $photo->photo_path(); ?>" alt="">
                        <div class="pictures_link">
                            <a href="delete_photo.php/?id=<?php echo $photo->id; ?>">Delete</a>
                            <a href="edit_photo.php?id=<?php echo $photo->id; ?>">Edit</a>
                            <a href="../photo.php?id=<?php echo $photo->id; ?>">View</a>
                        </div>
                        </td>
                        <td><?php echo $photo->id;  ?></td>
                        <td><?php echo $photo->filename;  ?></td>
                        <td><?php echo $photo->title;  ?></td>
                        <td><?php echo $photo->size;  ?></td>
                        <td>
                            <?php $comments = Comment::find_all_comments($photo->id); 
                            if (count($comments) == 0) {
                                $comment_number = "No comments yet";
                            } else {
                                $comment_number = count($comments) . " comments";
                            }
                            ?>
                        <a href="comment_photo.php?id=<?php echo $photo->id; ?>"><?php echo $comment_number; ?></a></td>
                    </tr>
                    <?php  endforeach ;  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.row -->

</div>
           
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>