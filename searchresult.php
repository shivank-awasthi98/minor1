<?php 



if($_REQUEST['typeofuser']=='parttimer'){
    $query="SELECT * FROM jobs WHERE jobtitle='".$_REQUEST['keyword']."' OR category='".$_REQUEST['keyword']."' OR subcategory='".$_REQUEST['keyword']."' OR skills='".$_REQUEST['keyword']."';";
    
}
else {
    $query="SELECT * FROM users WHERE typeofuser=parttimer AND username=".$_REQUEST['keyword'].";";
}
        $result=mysqli_query($link,$query);
        while($row=mysqli_fetch_assoc($result)){
            echo('<div class="mt-04"><div class="card mt-04 mb-04">
  <div class="card-body ">'.$row["jobtitle"].'</div>
    
  </div></div>');
        }
        ?>