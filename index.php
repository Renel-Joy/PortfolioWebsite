<?php require_once('config.php'); ?>
 <!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<?php require_once('inc/header.php') ?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 <link rel="stylesheet" href="profile_asset/css/layout.css">
 <link rel="stylesheet" href="profile_asset/css/fonts.css">
<link rel="stylesheet" href="profile_asset/css/default.css">
<link rel="stylesheet" href="profile_asset/css/magnific-popup.css">
<link rel="stylesheet" href="profile_asset/css/media-queries.css">

<link rel="icon" href="http://localhost/ladao/uploads/1713425340_aboutme.jpg">
<link rel="stylesheet" href="http://localhost/ladao/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="http://localhost/ladao/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<link rel="stylesheet" href="http://localhost/ladao/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="http://localhost/ladao/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="http://localhost/ladao/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="http://localhost/ladao/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="http://localhost/ladao/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="http://localhost/ladao/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<link rel="stylesheet" href="http://localhost/ladao/plugins/jqvmap/jqvmap.min.css">
<link rel="stylesheet" href="http://localhost/ladao/dist/css/adminlte.css">
<link rel="stylesheet" href="http://localhost/ladao/dist/css/custom.css">
<link rel="stylesheet" href="http://localhost/ladao/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<link rel="stylesheet" href="http://localhost/ladao/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="http://localhost/ladao/plugins/summernote/summernote-bs4.min.css">
<link rel="stylesheet" href="http://localhost/ladao/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
<script src="http://localhost/ladao/plugins/jquery/jquery.min.js"></script>
<script src="http://localhost/ladao/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="http://localhost/ladao/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="http://localhost/ladao/plugins/toastr/toastr.min.js"></script>
<script src="http://localhost/ladao/dist/js/script.js"></script>
  <body style="background: linear-gradient(to right, #41C9E2, #ACE2E1, #F7EEDD) url(uploads/background.jpg) no-repeat top center;" >
<!--style="background-color:#FCC8D1;"-->
   <header id="home">

   <nav id="nav-wrap">
    <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
    <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

    <!-- Logo -->
    <a href="./admin/login.php" class="logo"><img src="path/to/your/logo.png" alt="Logo"></a>

    <ul id="nav" class="nav">
        <li class="current"><a class="smoothscroll" href="#home">Home</a></li>
        <li><a class="smoothscroll" href="#about">About</a></li>
        <li><a class="smoothscroll" href="#resume">Resume</a></li>
    </ul> 
</nav> 

<?php 
$u_qry = $conn->query("SELECT * FROM users where id = 1");
foreach($u_qry->fetch_array() as $k => $v){
  if(!is_numeric($k)){
    $user[$k] = $v;
  }
}
$c_qry = $conn->query("SELECT * FROM contacts");
while($row = $c_qry->fetch_assoc()){
    $contact[$row['meta_field']] = $row['meta_value'];
}

?>
      <div class="row banner" >
         <div class="banner-text">
            <h1 class="responsive-headline"><p class= "blink">I'm <?php echo isset($user) ? ucwords($user['firstname'].' '.$user['lastname']) : ""; ?></p></h1>
            <h3><?php echo stripslashes($_settings->info('welcome_message')) ?></h3>
            <hr />
            <ul class="social">
               <li><a target="_blank" href="<?php echo $contact['facebook'] ?>"><i class="fa fa-facebook"></i></a></li>
               <li><a target="_blank" href="<?php echo $contact['twitter'] ?>"><i class="fa fa-twitter"></i></a></li>
               <li><a target="_blank" href="<?php echo $contact['instagram'] ?>"><i class="fa fa-instagram"></i></a></li>
            </ul>
         </div>
      </div>

      <p class="scrolldown">
         <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
      </p>

   </header> 


   <section id="about">

      <div class="row">

         <div class="three columns">
            <div class="w3-animate-fading">
               <img class="profile-pic"  src="profile_asset/images/aboutme.jpg" alt="" />
            </div>      
         </div>
        
         <div class="nine columns main-col">
         
               <h2>About Me</h2>

            <style>
              #about_me *{
                color: #000100; !important;
              }
              
            </style>
            <div id="about_me"><?php include "about.html"; ?></div>

            <div class="row">

               <div class="columns contact-details">
             
                  <h2>Contact Details</h2>
                  <p class="address">
               <span><?php echo $contact['address'] ?></span><br>
               <span><?php echo $contact['mobile'] ?></span><br>
                     <span><?php echo $contact['email'] ?></span>
             </p>

               </div>

            </div> 

         </div> 

      </div>

   </section> 


   
   <section id="resume">

      
      <div class="row education">

         <div class="three columns header-col">
            <h1><span>Educational Attainment</span></h1>
         </div>

         <div class="nine columns main-col">
          <?php 
          $e_qry = $conn->query("SELECT * FROM education order by year desc, month desc");
          while($row = $e_qry->fetch_assoc()):
          ?>
            <div class="row item">

               <div class="twelve columns">

                  <h3><?php echo $row['school'] ?></h3>
                  <p class="info"><?php echo $row['degree'] ?> <span>&bull;</span> <em class="date"><?php echo $row['month'].' '.$row['year'] ?></em></p>

                  <p>
                  <?php echo stripslashes(html_entity_decode($row['description'])) ?>
                  </p>

               </div>

            </div> 
          <?php endwhile; ?>
           

         </div> 

      </div> 

      
      <div class="row work">

         <div class="three columns header-col">
            <h1><span>Works</span></h1>
         </div>

         <div class="nine columns main-col">
          <?php 
          $w_qry = $conn->query("SELECT * FROM work ");
          while($row = $w_qry->fetch_assoc()):
          ?>
            <div class="row item">

               <div class="twelve columns">

                  <h3><?php echo $row['company'] ?></h3>
                  <p class="info"><?php echo $row['position'] ?> <span>&bull;</span> <em class="date"><?php echo str_replace("_"," ",$row['started']) ?> - <?php echo str_replace("_"," ",$row['ended']) ?></em></p>

                  
                  <p><?php echo stripslashes(html_entity_decode($row['description'])) ?></p>

               </div>

            </div> 
          <?php endwhile; ?>
         </div> 

      </div> 
<li> <a href="ladaoCV.pdf" target="_blank" <i class= "bx bx-file-blank"></i><span>Resume</span></a></li>
      
      <?php require_once('inc/footer.php') ?>
  </body>
</html>


<style>


</style>
