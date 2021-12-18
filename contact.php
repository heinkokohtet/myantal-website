<?php ob_start(); 

session_start();


include("header.php"); ?>

<div class="container" id="navtitle">
  <div class="row justify-content-center text-center">
   <div class="col-8">
    <b><h1>Get in touch with Us</h1></b>
  </div>
  <div class="col-10">
    <h5 id="font1">We are here to help you !</h5>
    
  </div>
</div>
</div>

<div class="container" align="center">


  <div class="col-lg-8 col-md-12 col-sm-12">
    <form>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputfirstname"></label>
          <input type="text" class="form" id="inputName" placeholder=" Name">
        </div>
        <div class="form-group col-md-6">
          <label for="inputlastname"></label>
          <input type="text" class="form" id="inputPassword4" name="phone_no" placeholder="+959XXXXXXX" maxlength="13" pattern="[+-9]{13}">
        </div>
      </div>
      <div class="form-group">
        <label for="inputemail"></label>
        <input type="email" class="form" id="inputAddress" placeholder="sample@gmail.com" pattern="^[-+.\w]{1,64}@[-.\w]{1,64}\.[-.\w]{2,6}$" >
      </div>
      
      <div class="form-group">
        <label for="inputAddress2"></label>
        <textarea class="form" id="inputAddress2" placeholder="Message">
        </textarea>
        
      </div>
      
      <div classs="form-group">
        <button type="submit" id="btn" style="padding: 0.3rem 3.25rem;">Send</button>
      </div>
    </form>
  </div>
</div>

<div class="container" id="map" align="center">
  <div class="row" >
    <div class="col-lg-6 col-md-12 col-sm-12"> 
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3818.674015891165!2d96.18736621435045!3d16.842520388407287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1937eaec29ab3%3A0x3b718393c133ad5e!2sESC%20Youth%20Camp!5e0!3m2!1sen!2smm!4v1599038625170!5m2!1sen!2smm" width="400" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></div>
      
      <div class="col-lg-6 col-md-12 col-sm-12"> 
        <div class="container">
          <div class="row">
            <B><h2>CONTACT INFORMATION</B></h2>
            <table class="table table-borderless" align="center" >
              <tr>
                <td>
                  <i class="fas fa-phone-alt"></i>
                </td>
                <td>
                 +959 45750 0118
               </td>
             </tr>

             <tr>
              <td>
                <i class="fas fa-envelope-open"></i>
              </td>
              <td>
               info.myantal@gmail.com
             </td>
           </tr>

           <tr>
            <td>
              
              <i class="fas fa-map-marker-alt"></i>
            </td>
            <td>
             No. 819-B, Marga-10 St, 12th <br> Qr,S/Ookalapa Township Yangon
           </td>
         </tr>
       </table>
     </div>
   </div>
 </div>
</div>
</div>
</html>
<?php include("footer.php"); ?>
