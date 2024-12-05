 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
 

  
  <script src="//cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
  <script>
  console.log("demo");
          CKEDITOR.replace( 'introtextckediter' );
          CKEDITOR.replace( 'detailckediter' );
          CKEDITOR.replace( 'metadiscriptionckediter' );
 </script>      

 <script src="https://code.jquery.com/jquery-3.6.2.slim.min.js" integrity="sha256-E3P3OaTZH+HlEM7f1gdAT3lHAn4nWBZXuYe89DFg2d0=" crossorigin="anonymous"></script>  
  <script>
 $(document).ready(function () {

 // appending html to sucess gallery
  $(".appendcode").click(function () {
    $(".appendSucessGallery").append(
      '<div class="row"><div class="form-group col-4"><label for="firstname">Name</label><input type="text" class="form-control" name="name[]" id="firstname"></div><div class="form-group col-4"><label for="firstname">video</label><input type="text" class="form-control" name="video[]" placeholder="video url" id="firstname"></div><div class="form-group col-4"><label for="firstname">Image</label><input type="file" class="form-control" name="image[]"></div></div>'
    );
  });
 

  ///area delete 
  $(document).on("click", ".delete-area", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/places/delete_area.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            // console.log(data)
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });
    

  // gallery delete
    
  $(document).on("click", ".delete_gallery", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "../action/consultancy/deletesg.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          console.log(window.location) ;
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            // console.log(data)
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });
  
  
    //class delete 
  $(document).on("click", ".delete-class", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
    //   alert(did);
      $.ajax({
        url: "../action/consultancy/deletec.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            // console.log(data)
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });
//   delete mail

 $(document).on("click", ".delete-mail", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
    //   alert(did);
      $.ajax({
        url: "../action/mail/delete.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            // console.log(data)
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });
   

   
    //province delete 
  $(document).on("click", ".delete-province", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/places/delete_pr.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            // console.log(data)
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });
  //city delete 
  $(document).on("click", ".delete-city", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/places/delete_ct.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            // console.log(data)
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });
  //district delete 
  $(document).on("click", ".delete-district", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/places/delete_ds.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            // console.log(data)
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });
  
  //test-prep delete 
  $(document).on("click", ".delete-test", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/test-preparation/delete.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            // console.log(data)
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });


  

  //Page type delete 
  $(document).on("click", ".delete-pagetype", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/pagetype/delete.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            // console.log(data)
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });

  // Event  delete 
  $(document).on("click", ".delete-events", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      
      $.ajax({
        url: "../action/events/delete.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            // console.log(data)
            $(elem).closest("tr").fadeOut();
            
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });
  
 
  //Page delete 
  $(document).on("click", ".delete-page", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/pages/delete.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            // console.log(data)
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });
  //Consultancy delete 
  $(document).on("click", ".delete-cons", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
       alert(did);
      $.ajax({
        url: "./database/actions/consultancy/delete.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            console.log(data)
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });
  //News delete 
  $(document).on("click", ".delete-news", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/news/delete.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            // console.log(data)
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });
  //testiminial delete 
  $(document).on("click", ".delete_te", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/testimonial/delete.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            // console.log(data)
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });
  //about delete 
  $(document).on("click", ".delete_about", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/aboutus/delete.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            // console.log(data)
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });
  //about delete 
  $(document).on("click", ".del-faq", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/faqs/delete.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            // console.log(data)
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });
  //Country Content delete 
  $(document).on("click", ".delete-cc", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/country/delete_cc.php",
        type: "POST",
        data: {
          id: did,
        },
        success: function (data) {
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            // console.log(data)
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });
  //faq c delete 
  $(document).on("click", ".del-cfaq", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/faqs/delete_cfaq.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            // console.log(data)
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });
  //Consultancy delete 
  $(document).on("click", ".delete-consultancy", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
       alert(did);
      $.ajax({
        url: "./database/actions/faqs/delete_cfaq.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            console.log(data)
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });
    


  //dependent search province district
  $(document).on("change", "#province", function () {
    console.log('hello');
    // if (confirm("Do you really want to delete this record?")) {
      var value = $(this).val();
      // var elem = this;
      console.log(value)
      // alert(did);
      $.ajax({
        url: "../action/loader/load_district.php",
        type: "POST",
        data: {
          pid: value,
        },
        success: function (data) {
            console.log(data)
            $("#district").html(data);
            $("#city").html("");
        },
      });
    // }
  });
  
  //dependent search city district
  $(document).on("change", "#district", function () {
    console.log('hello');
    // if (confirm("Do you really want to delete this record?")) {
      var value = $(this).val();
      // var elem = this;
      console.log(value)
      // alert(did);
      $.ajax({
        //   www.demo3.consultancynepal.com/cnbackend/database/actions/loader/load_city.php
        url: "../action/loader/load_city.php",
        type: "POST",
        data: {
          did: value,
        },
        success: function (data) {
            console.log(data)
            $("#city").html(data)
        },
      });
    // }
  });

  //dependent search area district
    $(document).on("change", "#city", function () {
    console.log('hello');
    // if (confirm("Do you really want to delete this record?")) {
      var value = $(this).val();
      // var elem = this;
      console.log(value)
      // alert(did);
     
      $.ajax({
        //   www.demo3.consultancynepal.com/cnbackend/database/actions/loader/load_city.php
        url: "../action/loader/load_area.php",
        type: "POST",
        data: {
          id: value,
        },
        success: function (data) {
            console.log(data)
            $("#area").html(data)
        },
      });
    // }
  });
  

 });
 </script>

  <script src="<?=base_url("assets/js/data-table.js")?>"></script>
  <script src="<?=base_url("assets/vendors/js/vendor.bundle.base.js")?>"></script>
  <script src="<?=base_url("assets/vendors/js/vendor.bundle.addons.js")?>"></script>
  <script src="<?=base_url("assets/js/data-table.js")?>"></script>
  <script src="<?=base_url("assets/js/off-canvas.js")?>"></script>
  <script src="<?=base_url("assets/js/hoverable-collapse.js")?>"></script>
  <script src="<?=base_url("assets/js/misc.js")?>"></script>
  <script src="<?=base_url("assets/js/settings.js")?>"></script>
  <script src="<?=base_url("assets/js/todolist.js")?>"></script>
  <script src="<?=base_url("assets/js/dashboard.js")?>"></script>
  <script src="<?=base_url("assets/js/formpickers.js")?>"></script>
  <script src="<?=base_url("assets/js/form-addons.js")?>"></script>
  <script src="<?=base_url("assets/js/x-editable.js")?>"></script>
  <script src="<?=base_url("assets/js/dropify.js")?>"></script>
  <script src="<?=base_url("assets/js/dropzone.js")?>"></script>
  <script src="<?=base_url("assets/js/jquery-file-upload.js")?>"></script>
  <script src="<?=base_url("assets/js/formpickers.js")?>"></script>
  <script src="<?=base_url("assets/js/form-repeater.js")?>"></script>
   
  <!-- End custom js for this page-->
   <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
</body>


</html>
