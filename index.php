<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
<?php 
  include('templates/head.php');
 ?>

<!-- insert my any specific css css -->

 </head>


<body>

<?php 
  include('templates/scripts.php');
 ?>

 <script type="text/javascript">
 // no-js = will not occur
 document.documentElement.className = document.documentElement.className.replace('no-js','js');

    $(function(){
$('body').fadeIn(750); 

    });

    </script>



<?php 
  include('templates/navigation.php');
 ?>
  <!-- the page specific content -->
  
   

    <div id="home-carousel" class="carousel slide opacity-carousel" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
    <li data-target="#home-carousel" data-slide-to="1"></li>
    <li data-target="#home-carousel" data-slide-to="2"></li>
    <li data-target="#home-carousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
    <img src="images/1_books_min.jpg" alt="Books">
</div>

     <div class="item">
  <img src="images/2_buildings.jpg" alt="Buildings">
    </div>

    <div class="item">
      <img src="images/3_city.jpg" alt="City">
    </div>

    <div class="item">
      <img src="images/4_hall.jpg" alt="Hall">
    </div>

   
  </div>

  <a class="left carousel-control" href="#home-carousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#home-carousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

  </div>   <!-- carousel -->
  <div class="container-fluid">


        <div class="row">
      <div class="col-md-8 col-xs-8 large justify">
      
      <h3> L Wiener &amp; Associates is a Cape Town based legal firm. With over 35 years experience in criminal and civil law, 
    the firm is a court work specialist, specifically<span class="text-highlight"> civil litigation, debt collection, sectional title levy collection </span> and <span  class="text-highlight"> criminal litigation </span>, in the Magistrates' and Regional courts </h3>
    
      </div>

       <div class="col-md-4 col-xs-4 ">
       <div class="text-center">
       <a href="/practice_areas.php"  class="btn btn-lg btn-default transition">Learn More</a>
       </div>
    
      </div>
    
    
    
    </div>
    
<?php 
  include('templates/footer.php');
 ?>

</div>
   
</div>

<!-- any page specific scripts-->

</body>


</html>
  	
 


