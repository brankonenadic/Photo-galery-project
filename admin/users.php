<?php include("includes/header.php"); ?>

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
            Users
            <small>Subheading</small>
        </h1>
   
        <?php 
                
         
           /*  print_r($_SESSION); */

          /*  $user = new User;
           $user->username = "Huse";
           $user->password = "4321";
           $user->first_name = "Husein";
           $user->last_name = "Booss";
           $user->create(); */ 

           /* $user = User::find_by_id(10);
           $user->username = "Uber";
           $user->password = "1111";
           $user->first_name = "Huber";
           $user->last_name = "Biber";
           $user->update(); */

          /*   $user = User::find_by_id(6);
            $user->delete(); */

     /*        $user = User::find_by_id(5);
            $user->username = "Nova Munjara";
            $user->save(); */
/* 
            $user = new User;
            $user->password = "123";
            $user->save();  */

 /*  $user = User::find_by_id(6);
  $user->password = "123";
            $user->save(); */

           /*  $users = User::find_all();
            foreach ($users as $user) {
               echo $user->username . "<br>" ;
            } */

            /* $photos = Photo::find_all();
            foreach ($photos as $photo) {
               echo ->title . "<br>" ;
            } */

         /*   $photo = new Photo;
           $photo->title = "Very nice photo";
           $photo->discription = "Photo from nice town";
           $photo->filename = "pic";
           $photo->type = "image";
           $photo->size = "1800";
           $photo->create(); */

        ?>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

</div>
           
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>