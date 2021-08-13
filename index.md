<?php 
  include "admin/db_connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php include "layout/head.php"; ?>

<body>

  <!-- Navigation -->
  <?php include "layout/topnavigation.php"; ?>

  <!-- Title Header Start -->
  <section class="inner-header-title" style="background-image:url(layout/assets/img/banner-10.jpg);">
    <div class="container">
      <h1>Blog Page</h1>
    </div>
  </section>
  <div class="clearfix"></div>
  <!-- Title Header End -->

  <!-- All blog List Start -->
  <section class="section">
    <div class="container">
      <div class="row .no-mrg">
        
        <?php 
                $no_posts_per_page = 5;
                if (isset($_GET['page']))
                {
                  $page = $_GET['page'];
                }
                else
                {
                  $page = 1;
                }
                $start = $no_posts_per_page * $page - $no_posts_per_page;
                $sql_select_post = "SELECT * FROM posts WHERE post_status = 1 ORDER BY id desc LIMIT {$start} ,{$no_posts_per_page} ";
                $result_sql_select_post = mysqli_query($dbconnection, $sql_select_post);
                while ($rowpost = mysqli_fetch_assoc($result_sql_select_post))
                {
                  $view_post_id = $rowpost['id'];
                  
                  $view_post_title = $rowpost['post_title'];
                  
                  $view_post_date = $rowpost['post_date'];
                  $view_post_edit_date = $rowpost['post_edit_date'];
                  $view_post_image = $rowpost['post_image'];
                  $view_post_text = $rowpost['post_text'];
                  
                  $view_post_visit_counter = $rowpost['post_visit_counter'];
                  $view_post_status = $rowpost['post_status'];
                  $view_post_priority = $rowpost['post_priority'];
             ?>
          
        <!-- Start Blogs -->
        <div class="col-md-8">
       
          <article class="blog-news">
          
            <div class="short-blog">
            
              <!-- <figure class="img-holder">
                <a href="post.php?postid=<?= $view_post_id; ?>"><img
                    src="admin/images/blog/<?php  echo $view_post_image; ?>" class="img-responsive" alt="News"></a>
                
              </figure> -->
              <div class="blog-content">
              <div class="blog-post-date">
                  <?php echo $view_post_date; ?>
                </div>
                <a href="post.php?postid=<?= $view_post_id; ?>">
                  <h2><?php echo $view_post_title; ?></h2>
                </a>
                <div class="blog-text">
                  <p><?php //echo $view_post_text; 
                         echo substr($view_post_text, 0, 400) . "...";?>
                  </p>
                </div>

              </div>
            </div>

          </article>  
        </div>
        <?php } ?>

      </div>
    </div>
  </section>
  <!-- pagination -->

  <div class="row">
    <ul class="pagination">
      <li>
        <?php 
                                $select_post_query = "SELECT * FROM posts WHERE post_status = 1";
                                $result_select_post_query = mysqli_query ($dbconnection, $select_post_query);
                                $sum_posts = mysqli_num_rows($result_select_post_query) ;
                  
                                $allpages = ceil($sum_posts / $no_posts_per_page);
                  
                                if($page > 1)
                                {
                                $previous= $page - 1;


                                ?>
        <a href="index.php?page=<?php echo $previous ?>">&laquo;</a>
        <?php } ?>
      </li>
      <li class="">
        <?php 
                                if ($page < $allpages)
                                 {
                                 $next= $page + 1;
                                  ?>
        <a href="index.php?page=<?php echo $next ?>">&raquo;</a>
        <?php } ?>
      </li>

    </ul>
  </div>


  </div>

  <!-- Footer -->
  <?php include "layout/footer.php"; ?>

  <!-- Scripts ================================================== -->
  <script type="text/javascript" src="layouts/assets/plugins/js/jquery.min.js"></script>
  <script type="text/javascript" src="layouts/assets/plugins/js/viewportchecker.js"></script>
  <script type="text/javascript" src="layouts/assets/plugins/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="layouts/assets/plugins/js/bootsnav.js"></script>
  <script type="text/javascript" src="layouts/assets/plugins/js/select2.min.js"></script>
  <script type="text/javascript" src="layouts/assets/plugins/js/wysihtml5-0.3.0.js"></script>
  <script type="text/javascript" src="layouts/assets/plugins/js/bootstrap-wysihtml5.js"></script>
  <script type="text/javascript" src="layouts/assets/plugins/js/datedropper.min.js"></script>
  <script type="text/javascript" src="layouts/assets/plugins/js/dropzone.js"></script>
  <script type="text/javascript" src="layouts/assets/plugins/js/loader.js"></script>
  <script type="text/javascript" src="layouts/assets/plugins/js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="layouts/assets/plugins/js/slick.min.js"></script>
  <script type="text/javascript" src="layouts/assets/plugins/js/gmap3.min.js"></script>
  <script type="text/javascript" src="layouts/assets/plugins/js/jquery.easy-autocomplete.min.js"></script>
  <!-- Custom Js -->
  <script src="layouts/assets/js/custom.js"></script>
  <script src="layouts/assets/js/jQuery.style.switcher.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $('#styleOptions').styleSwitcher();
    });
  </script>
  <script>
    function openRightMenu() {
      document.getElementById("rightMenu").style.display = "block";
    }

    function closeRightMenu() {
      document.getElementById("rightMenu").style.display = "none";
    }
  </script>

</body>

</html>
