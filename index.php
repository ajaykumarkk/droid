
<!DOCTYPE HTML>
<?php include 'connect.php';
	session_start();
?>
<html>
	<head>
		<title>Dr.Droid</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {
			
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 1600,
			        speed: 600
			      });
			});
		  </script>
		 
	</head>
	<body>
		<!--start-wrap-->
		
			<!--start-header-->
			<div class="header">
				<div class="wrap">
				<!--start-logo-->
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" title="logo" /></a>
				</div>
				<!--end-logo-->
				<!--start-top-nav-->
				<div class="top-nav">
					<ul>
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="services.php">services</a></li>
						<li><a href="blog.php">First Aid</a></li>
						<li><a href="contact.php">contact</a></li>
					</ul>					
				</div>
				<div class="clear"> </div>
				<!--end-top-nav-->
			</div>
			<!--end-header-->
		</div>
		<div class="clear"> </div>
			<!--start-image-slider---->
					<center><div class="image-slider">
						<!-- Slideshow 1 --><center>
					    <ul class="rslides" id="slider1">
					      <li><img src="images/slider-image1.jpg" alt="" height="42" width="42"></li>
					      <li><img src="images/slider-image2.jpg" alt="" height="42" width="42"></li>
					      <li><img src="images/slider-image1.jpg" alt="" height="42" width="42"></li>
					    </ul></center>
						 <!-- Slideshow 2 -->
					</div></center>
					<!--End-image-slider---->
		    <div class="clear"> </div>
		    <div class="content-grids">
		    	<div class="wrap">
		    	<div class="section group">
				<div class="listview_1_of_3 images_1_of_3">
					<div class="listing listing_1_of_2">
						  <img src="images/grid-img1.png">
					</div>
					<div class="text list_1_of_2">
						 
						 <?php if($_SESSION['signed_in'] == false)
									echo "<h3>Login</h3>"; 
								else
									echo "<h3>Logout</h3>"?>
						 
						  <div class="button"><span><a id='logindiv' href="<?php if($_SESSION['signed_in'] == true){ echo 'logout.php';}else{echo 'login.php';} ?>"><?php if($_SESSION['signed_in'] == true){ echo '<h1>Logout</h1>';}else{echo 'Login';} ?></a></span></div>
					</div>
				</div>				
				<div class="listview_1_of_3 images_1_of_3">
					<div class="listimg listimg_1_of_2">
						  <img src="images/grid-img2.png">
					</div>
					<div class="text list_1_of_2">
						  <h3>Dashboard</h3>
						  <div class="button"><span><a href="dashboard.php">Dashboard</a></span></div>
				     </div>
				</div>				
				<div class="listview_1_of_3 images_1_of_3">
					<div class="listimg listimg_1_of_2">
						  <img src="images/grid-img3.png">
					</div>
					<div class="text list_1_of_2">
						  <h3>Join Us Now</h3>
						  
						  <div class="button"><span><a href="signup.php">Click to join</a></span></div>
				    </div>
				</div>				
			</div>
		    </div>
		   </div>
		   <div class="wrap">
		   <div class="content-box">
		   <div class="section group">
				<div class="col_1_of_3 span_1_of_3 frist">
					<h3>About Us</h3>
					<img src="images/box-img1.jpg" title="staff" /><br/>
					<span>An online platform to aid patients in finding the right doctors based on the symptoms they suffer from. The system suggests the best doctor considering the rating, distance and expertise. Automated appointment scheduling. Storage of patient’s medical history and prescriptions allows to patients to keep track of follow up appointments easily.</span>
				<br/><a href="about.html">Readmore</a>
				</div>
				<div class="col_1_of_3 span_1_of_3 second">
					<h3>Top Doctors</h3>
					<span>List Of Doctors Who has the highest rating</span>
					<?php						//// SORTING HERE
						 $sql="
								SELECT
								Doc_id,max(user_rating)
								FROM	
									ratings
								GROUP BY
									Doc_id;
									";
						$result = mysqli_query(mysqli_connect($server, $username, $password,$database),$sql);
						$myary=array();
						while($row = mysqli_fetch_assoc($result))
						{	
						
							$doc_id=$row["Doc_id"];
							$user_rating=$row["max(user_rating)"];
							$myary["$user_rating"]=$doc_id;
							//echo " ".$myary["$user_rating"];
						}
						
						krsort ($myary);
						foreach ($myary as $key => $val) {
							$sql1 = "
								SELECT
									FirstName,LastName
								FROM	
									doctor
								WHERE
									Doc_id='$val';
									";
								$result1= mysqli_query(mysqli_connect($server, $username, $password,$database),$sql1);
								$row1 = mysqli_fetch_assoc($result1);
								echo " </br><a href='#'><img src='images/arrow.png'> ".$row1["FirstName"]." ".$row1["LastName"].""."</a> ";
						}
						
					?>
					
				</div>
				<div class="col_1_of_3 span_1_of_3 frist">
					<h3>Latest News</h3>
					<! this is a rss widget to get news for our site/>
					<iframe  height="400" alt="Rss feed loading..."  width="300" src="http://feed.mikle.com/widget/?rssmikle_url=http%3A%2F%2Frss.medicalnewstoday.com%2Ffeaturednews.xml&rssmikle_frame_width=300&rssmikle_frame_height=400&frame_height_by_article=0&rssmikle_target=_blank&rssmikle_font=Arial%2C%20Helvetica%2C%20sans-serif&rssmikle_font_size=12&rssmikle_border=off&responsive=off&text_align=left&text_align2=left&corner=off&scrollbar=on&autoscroll=on&scrolldirection=up&scrollstep=3&mcspeed=20&sort=Off&rssmikle_title=on&rssmikle_title_bgcolor=%230066FF&rssmikle_title_color=%23FFFFFF&rssmikle_item_bgcolor=%23FFFFFF&rssmikle_item_title_length=55&rssmikle_item_title_color=%230066FF&rssmikle_item_border_bottom=on&rssmikle_item_description=on&item_link=off&rssmikle_item_description_length=150&rssmikle_item_description_color=%23666666&rssmikle_item_date=gl1&rssmikle_timezone=Etc%2FGMT&datetime_format=%25b%20%25e%2C%20%25Y%20%25l%3A%25M%20%25p&item_description_style=text%2Btn&item_thumbnail=full&item_thumbnail_selection=auto&article_num=15&rssmikle_item_podcast=off&" scrolling="no" name="rssmikle_frame" marginwidth="0" marginheight="0" vspace="0" hspace="0" frameborder="0"></iframe>
				</div>
			</div>
		   </div>
		   </div>
		   <div class="clear"> </div>
		   <div class="footer">
		   	 <div class="wrap">
		   	<div class="footer-left">
		   			<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about.php">About</a></li>
						<li><a href="services.php">services</a></li>
						<li><a href="blog.php">blog</a></li>
						<li><a href="contact.php">contact</a></li>
					</ul>
		   	</div>
		   	<div class="footer-right">
		   		<p>Dr.Droid | Design By <a href="contact.php">SEA-2</a></p>
		   	</div>
		   	<div class="clear"> </div>
		   </div>
		   </div>
		<!--end-wrap-->
	</body>
</html>

