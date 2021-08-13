		<!-- Sidebar Start -->
        <div class="col-md-4">
							<div class="blog-sidebar">
	
								
								<div class="sidebar-widget">
									<h4>Popular Category</h4>
                                    <?php 
                $counter_popular= 0;
                $sql_select_post_popular = "SELECT * FROM posts WHERE post_status = 1 ORDER BY post_visit_counter DESC LIMIT 0,5";
                $result_sql_select_post_popular = mysqli_query($dbconnection, $sql_select_post_popular);
                while ($rowpost_popular = mysqli_fetch_assoc($result_sql_select_post_popular))
                {
                  $view_post_id_popular = $rowpost_popular['id'];
                  $view_post_category_popular = $rowpost_popular['post_category'];
                  $view_post_title_popular = $rowpost_popular['post_title'];
                  $view_post_autor_popular = $rowpost_popular['post_autor'];
                  $view_post_date_popular = $rowpost_popular['post_date'];
                  $view_post_edit_date_popular = $rowpost_popular['post_edit_date'];
                  $view_post_image_popular = $rowpost_popular['post_image'];
                  $view_post_text_popular = $rowpost_popular['post_text'];
                  $view_post_tag_popular = $rowpost_popular['post_tag'];
                  $view_post_visit_counter_popular = $rowpost_popular['post_visit_counter'];
                  $view_post_status_popular = $rowpost_popular['post_status'];
                  $view_post_priority_popular = $rowpost_popular['post_priority'];
                 
                  $counter_popular++;
                  
             ?>
									<div class="blog-item">
										<div class="post-thumb"><a href="blog-detail.html"><img src="assets/img/blog/<?php echo $view_post_image_popular;?>" class="img-responsive" alt=""></a></div>
										<div class="blog-detail">
											<a href="post.php?postid=<?=$view_post_id_popular ?>"><h4><?php echo $view_post_title_popular; ?></h4></a>
											<div class="post-info"><?php echo $view_post_date_popular; ?></div>
										</div>
									</div>
									<?php } ?>
								
							    </div>
						</div>
						<!-- End Sidebar Start -->