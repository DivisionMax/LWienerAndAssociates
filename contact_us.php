<?php

$errName = '';
$errEmail = '';
$errSubject = '';
$errMessage = '';
$errRepeat = '';
$result = '';



error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

  if (isset($_POST["submit"])) {
    $emailRepeat = $_POST['emailRepeat']; 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];

    $from = $email; 
    
    // l wiener and associates
    $to = 'lewlaw2002@yahoo.co.uk'; 
    $subject = 'Message from Contact Form';
    $headers = "From: $from " . "\r\n";
    
    $date = date('m/d/Y h:i:s a', time());
    $body ="From: $name\n E-Mail: $email\n Date: $date\n Subject: $subject\n Message:\n $message";
    

    // spam check
     if ($emailRepeat) {
      $errRepeat = 'Spam';
    }

    // Check if name has been entered
    if (!$name) {
      $errName = 'Please enter your name';
    }
    
    // Check if email has been entered and is valid
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errEmail = 'Please enter a valid email address';
    }
    
    if (!$subject) {
      $errSubject = 'Please enter a subject';
    }
    //Check if message has been entered
    if (!$message) {
      $errMessage = 'Please enter your message';
    }

// If there are no errors, send the email
if ($errRepeat){
  // it is spam but state that it is correct
      $result='<div class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
      Thank you for your interest</div>';
}

else{
    if (!$errName && !$errEmail && !$errMessage && !$errSubject) {

         


  if (mail ($to, $subject, $body, $headers)) {
    $result='<p class="alert alert-success alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>

    Thank you for your interest </p>';

    $_POST['emailRepeat'] = ''; 
    $_POST['name'] = '';
    $_POST['email'] = '';
    $_POST['message'] = '';
    $_POST['subject'] = '';
  } else {
    $result='<p class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>

    Sorry there was an error sending your message. Please try again.</p>';
  }
}
}


  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
<?php 
  include('templates/head.php');
 ?>
 <link rel="stylesheet" type="text/css" href="css/tooltipster.css">

<!-- insert my any specific css css -->
  <link rel="stylesheet" type="text/css" href="css/themes/tooltipster-light.css">
 </head>


<body>
<?php 
  include('templates/scripts.php');
 ?>

<?php 
  include('templates/navigation.php');
 ?>
<div class="container-fluid">
      <!-- the page specific content -->
     
  <h1>Contact Us</h1> 
 
  <div class="row">

 <div class="col-md-6">
     <h1>Form </h1>

    
    <form id="contact-form" class="form" action="contact_us.php" method="post" role="form">
       <div class="form-group">
    <div class="input-group">
      <div class="input-group-addon">
        Name:
      </div>
      <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars(isset($_POST['name'])?$_POST['name']:''); ?>" >
      
    </div>
    <?php echo "<p class='text-danger'>$errName</p>";?>
  </div>

    <div class="form-group">
             <input type="email" class="form-control" id="emailRepeat" name="emailRepeat">
    </div>
        <div class="form-group">
      <div class="input-group">
      <div class="input-group-addon">
      Email:
      </div>
    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars(isset($_POST['mail'])?$_POST['mail']:''); ?>">

        </div>
         <?php echo "<p class='text-danger'>$errEmail</p>";?>
</div>
    <div class="form-group">
          <input type="subject" class="form-control" id="subject" name="subject" 
          value="<?php echo htmlspecialchars(isset($_POST['subject'])?$_POST['subject']:''); ?>" placeholder="Subject line">
          
          </div>
          <?php echo "<p class='text-danger'>$errSubject</p>";?>
 
        <div class="form-group">
      <textarea class="form-control" rows="5" id="message" name="message" value="<?php echo htmlspecialchars(isset($_POST['message'])?$_POST['message']:''); ?>" placeholder="Please enter your message, but do not enter any highly sensitive information."></textarea>
  </div>
  
<div class="form-group">
 
 <input id="submit" name="submit" type="submit" value="Send" class="btn btn-default" />
   <?php echo $result; ?>   
  
 
  </div>


</form>
</div> <!--form col row -->
<div class="col-md-6">

    <h1 class="text-justify">Details</h1>

    <div id="not-form" class="text-justify"> 

   <address>
      P.O Box 1062<br />
      Milnerton<br />
      7435<br />
      Cape Town<br />
      South Africa
    </address>
    <div id="footer-contact"> 
      <!-- <a href="mailto:lewlaw2002@yahoo.co.uk">lewlaw2002@yahoo.co.uk</a> <br/> -->
      Phone:  +27 72 128 2033 <br/>
      Fax:  086 510 4187
    </div>
  </div>
</div>
</div> <!-- row -->

<?php 
  include('templates/footer.php');
 ?>
</div>
<!-- any page specific scripts-->
<script src="scripts/jquery-1.11.2.min.js"></script>
<script src="scripts/bootstrap.min.js"></script>
<script src="scripts/jquery.validate.min.js"></script>
<script src="scripts/jquery.tooltipster.min.js"></script>
<script type="text/javascript">


  
  $(function(){

    $('#contact-form :input').each(function()
{
    var tipelement = this;
   
   $(tipelement).tooltipster({
        theme: 'tooltipster-light',
       trigger: 'custom', 
       onlyOne: false, 
       position: 'top',
       multiple:false,
       autoClose:false});
    
   
 
});

    $("#emailRepat").attr("autocomplete","off") ;

     $("#contact-form").validate({

        rules : {
          name: {
            required: true
          },
          email: {
            required: true,
            email: true
          },
          message:{
            required: true,

          }

          },

        messages :{

          email:{
            email: "Enter a valid email"
          },

          message: {
            required: "A short description is useful"
          }

        },
        errorPlacement: function(error, element) 
        {
          var $element = $(element),
              tipelement=element,
              errtxt=$(error).text(),
              last_error='';
           
            last_error = $(tipelement).data('last_error');
            $(tipelement).data('last_error',errtxt);
            if(errtxt !=='' && errtxt != last_error)
              {
                $(tipelement).tooltipster('content', errtxt);
                $(tipelement).tooltipster('show'


                  );
              }
        }

         


 });

  });

</script>

</body>


</html>
