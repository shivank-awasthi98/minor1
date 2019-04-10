<?php
session_start();
if(!array_key_exists('id',$_SESSION))
{
    header("location:landing.php");
}
$link = mysqli_connect("localhost", "root", "", "clg_minor");
$query="SELECT * FROM parttimerinfo WHERE uid=".$_GET['id']."";
$result= mysqli_query($link,$query);
$row=mysqli_fetch_assoc($result);


?>
<html lang="en"> 
<head>
    <title>Resume</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Responsive Resume Template">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    
    <!-- FontAwesome JS-->
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
       
    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/pillar-1.css">


</head> 

<body>	

    <article class="resume-wrapper text-center position-relative">
	    <div class="resume-wrapper-inner mx-auto text-left  shadow-lg">
		    <header class="resume-header pt-4 pt-md-0 bg-warning">
			    <div class="media flex-column flex-md-row">
				    <img class="mr-3 img-fluid picture mx-auto bg-white" src="yellowavatar.png" alt="">
				    <div class="media-body p-4 d-flex flex-column flex-md-row mx-auto mx-lg-0">
					    <div class="primary-info">
						    <h1 class="name mt-0 mb-1 text-white text-uppercase text-uppercase"><?php echo($row['name']." ".$row['lastname']);?></h1>
						    <div class="title mb-3"><?php echo($row['shortdiscription']); ?></div>
						    <ul class="list-unstyled">
							    <li class="mb-2"><a href="#"><i class="far fa-envelope fa-fw mr-2 text-white" data-fa-transform="grow-3"></i><?php echo($row['email']); ?></a></li>
							    <li><a href="#"><i class="fas fa-mobile-alt fa-fw mr-2 text-white" data-fa-transform="grow-6"></i><?php echo($row['phone']); ?></a></li>
						    </ul>
					    </div><!--//primary-info-->
					    <div class="secondary-info ml-md-auto mt-2 ">
						    <ul class="resume-social list-unstyled">
				                <li class="mb-3"><a href="#"><span class="fa-container text-center mr-2"><i class="fab fa-linkedin-in fa-fw"></i></span><?php echo($row['linkedin']); ?></a></li>
				                <li class="mb-3"><a href="#"><span class="fa-container text-center mr-2"><i class="fab fa-github-alt fa-fw"></i></span><?php echo($row['github']); ?></a></li>
				                
				                <li><a href="#"><span class="fa-container text-center mr-2"><i class="fas fa-globe"></i></span><?php echo($row['website']); ?></a></li>
						    </ul>
					    </div><!--//secondary-info-->
					    
				    </div><!--//media-body-->
			    </div><!--//media-->
		    </header>
		    <div class="resume-body p-5  ">
			    <section class="resume-section summary-section mb-5  ">
				    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3  ">Career Summary</h2>
				    <div class="resume-section-content">
					    <p class="mb-0"><?php echo($row['parttimerdiscription']); ?></p>
				    </div>
			    </section><!--//summary-section-->
			    <div class="row">
				    <div class="col-lg-9">
					    <section class="resume-section experience-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3  ">Work Experience</h2>
						    <div class="resume-section-content">
							    <div class="resume-timeline position-relative">
								    <article class="resume-timeline-item position-relative pb-5">
									    
									    <div class="resume-timeline-item-header mb-2">
										    <div class="d-flex flex-column flex-md-row">
										        <h3 class="resume-position-title font-weight-bold mb-1  "><?php echo($row['job1role']); ?></h3>
										        <div class="resume-company-name ml-auto"><?php echo($row['job1title']); ?></div>
										    </div><!--//row-->
										    
									    </div><!--//resume-timeline-item-header-->
									    <div class="resume-timeline-item-desc">
										    <p><?php echo($row['job1discription']); ?></p>
										    										    <h4 class="resume-timeline-item-desc-heading font-weight-bold">Technologies used:</h4>
										    <ul class="list-inline">
                                                <?php 
                                                $skills=explode(" ",$row['job1skills']); 
                                                foreach($skills as $skill){
                                                ?>
											    <li class="list-inline-item"><span class="badge badge-warning badge-pill"><?php echo $skill ;?></span></li><?php } ?>
											    
										    </ul>
									    </div><!--//resume-timeline-item-desc-->

								    </article><!--//resume-timeline-item-->
								    <?php  
                                        if (strlen($row['job2title'])>0){?>
                                        <article class="resume-timeline-item position-relative pb-5">
									    
									    <div class="resume-timeline-item-header mb-2">
										    <div class="d-flex flex-column flex-md-row">
										        <h3 class="resume-position-title font-weight-bold mb-1  "><?php echo($row['job2role']); ?></h3>
										        <div class="resume-company-name ml-auto"><?php echo($row['job2title']); ?></div>
										    </div>
                                        <div class="resume-timeline-item-desc">
										    <p><?php echo($row['job2discription']); ?></p>
                                            <h4 class="resume-timeline-item-desc-heading font-weight-bold">Technologies used:</h4>
										    <ul class="list-inline">
                                                <?php
                                                $skills=explode(" ",$row['job2skills']); 
                                                foreach($skills as $skill){
                                                ?>
											    <li class="list-inline-item"><span class="badge badge-warning badge-pill"><?php echo $skill ;?></span></li><?php } ?>

                                            </ul>   
									    </div>
                                            </div>
                                    </article>
											    
                                    <?php } ?>
                                    <?php  if (strlen($row['job3title'])>0){?>
                                        <article class="resume-timeline-item position-relative pb-5">
									    
									    <div class="resume-timeline-item-header mb-2">
										    <div class="d-flex flex-column flex-md-row">
										        <h3 class="resume-position-title font-weight-bold mb-1  "><?php echo($row['job3role']); ?></h3>
										        <div class="resume-company-name ml-auto"><?php echo($row['job3title']); ?></div>
										    </div>
                                        <div class="resume-timeline-item-desc">
										    <p><?php echo($row['job3discription']); ?> </p>
                                            <h4 class="resume-timeline-item-desc-heading font-weight-bold">Technologies used:</h4>
										    <ul class="list-inline">
                                                <?php
                                                $skills=explode(" ",$row['job3skills']); 
                                                foreach($skills as $skill){
                                                ?>
											    <li class="list-inline-item"><span class="badge badge-warning badge-pill"><?php echo $skill ;?></span></li><?php } ?>

                                            </ul>   
									    </div>
                                            </div>
                                    </article>
                                    <?php } ?>

								    
								   
								    
								  
								    
							    </div><!--//resume-timeline-->
							    
							    
							    
							    
							    
							    
						    </div>
					    </section><!--//experience-section-->
				    </div>
				    <div class="col-lg-3">
					    <section class="resume-section skills-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3  ">Skills &amp; Tools</h2>
						    <div class="resume-section-content">
						        <div class="resume-skill-item">
							        <h4 class="resume-skills-cat font-weight-bold">Frontend</h4>
							        <ul class="list-unstyled mb-4">
                                        <?php
                                                $skills=explode(" ",$row['frontendskills']); 
                                                foreach($skills as $skill){
                                                ?>
								        <li class="mb-2">
								            <div class="resume-skill-name"><?php echo $skill ;?></div>
									        
								        </li><?php } ?>
								        
							        </ul>
						        </div><!--//resume-skill-item-->
						        
						        <div class="resume-skill-item">
							        <h4 class="resume-skills-cat font-weight-bold">Frontend</h4>
							        <ul class="list-unstyled mb-4">
                                        <?php
                                                $skills=explode(" ",$row['backendskills']); 
                                                foreach($skills as $skill){
                                                ?>
								        <li class="mb-2">
								            <div class="resume-skill-name"><?php echo $skill ;?></div>
									        
								        </li><?php } ?>
								        
							        </ul>
						        </div>
						        
						        <div class="resume-skill-item">
						            <h4 class="resume-skills-cat font-weight-bold  ">Others</h4>
						            <ul class="list-inline">
                                        <?php
                                                $skills=explode(" ",$row['otherskills']); 
                                                foreach($skills as $skill){
                                                ?>
							            <li class="list-inline-item"><span class="badge badge-light"><?php echo $skill ;?></span></li><?php } ?>
							            
						            </ul>
						        </div><!--//resume-skill-item-->
						    </div><!--resume-section-content-->
					    </section><!--//skills-section-->
					    <section class="resume-section education-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Education</h2>
						    <div class="resume-section-content">
							    <ul class="list-unstyled">
								    <li class="mb-2">
								        <div class="resume-degree font-weight-bold"><?php echo $row['educationlevel1']; ?></div>
								        <div class="resume-degree-org"><?php echo $row['from1']; ?></div>
								        <div class="resume-degree-time">From <?php echo $row['starton1']; ?>- Till <?php echo $row['finishedon1']; ?></div>
								    </li>
								    <li>
                                        <div class="resume-degree font-weight-bold"><?php $row['educationlevel2'] ?></div>
								        <div class="resume-degree-org"><?php echo $row['from2']; ?></div>
								        <div class="resume-degree-time">From <?php echo $row['starton2']; ?>- Till <?php echo $row['finishedon2'] ;?></div>
								    </li>
							    </ul>
						    </div>
					    </section><!--//education-section-->


					    <section class="resume-section interests-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Interests</h2>
						    <div class="resume-section-content">
							    <ul class="list-unstyled">
								    <li class="mb-1"><?php echo $row['hobbie1']; ?></li>
								    <li class="mb-1"><?php echo $row['hobbie2']; ?></li>
								    <li class="mb-1"><?php echo $row['hobbie3']; ?></li>
							    </ul>
						    </div>
					    </section><!--//interests-section-->
					    
				    </div>
			    </div><!--//row-->
		    </div><!--//resume-body-->
		    
		    
	    </div>
    </article>  

    
    <footer class="footer text-center pt-2 pb-5">
        back to <a href=redirect.php class='text-warning'>Index</a>
    </footer>

    

</body>
</html> 

