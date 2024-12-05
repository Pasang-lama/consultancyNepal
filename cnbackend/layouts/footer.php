     <?php
     unset($_SESSION["errors"]);
     unset($_SESSION["old"]);
     ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  <!-- plugins:js -->
  <!--This is demo-->
  
  <!--<script src="https://cdn.ckeditor.com/4.20.1/standard/ckeditor.js"></script>  -->
  <!--<script src="ckeditor/ckeditor.js"></script>-->
   <script src="//cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
  <script>
          CKEDITOR.replace( 'introtextckediter' );
          CKEDITOR.replace( 'detailckediter' );
          CKEDITOR.replace( 'metadiscriptionckediter' );
 </script>      
 <script src="https://code.jquery.com/jquery-3.6.2.slim.min.js" integrity="sha256-E3P3OaTZH+HlEM7f1gdAT3lHAn4nWBZXuYe89DFg2d0=" crossorigin="anonymous"></script> 
 
   
   
                                            
 <script>
 
//  function validateForm(){
    
//      var input=document.getElementsByTagName("input");
//                 //  get all value from input filed
//                 for(var i=0;i<input.length;i++)
//                 {
                    
//                     if(input[i].id=="username")
//                     {
//                         if(!/^[a-zA-Z ]*$/.test(input[i].value))
//                         {
                             
//                             document.getElementById("errormessage").innerHTML=" * username only contain letter and white space";
//                             return false;
//                         }
//                     }
//                     if(input[i].id=="slug")
//                     {
//                         if(!/^[a-zA-Z-]*$/.test(input[i].value))
//                         {
//                             document.getElementById("errormessage").innerHTML="* slug only contain letter and -";
//                             return false;
//                         }
//                     }
//                     if(input[i].id=="number")
//                     {
//                         if(!/^[0-9]*$/.test(input[i].value))
//                         {
//                             document.getElementById("errormessage").innerHTML="number only contain number";
//                             return false;
//                         }
//                     }
                    
//                     if(input[i].id=="url")
//                     {
//                         if(!/^(http|https):\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/.test(input[i].value))
//                         {
//                             document.getElementById("errormessage").innerHTML="url is not valid";
//                             return false;
//                         }
//                     }
                     
                    
                    
                    
                    
//                 }

     
     
//  }
 
   
   
  
 $(document).ready(function () {
     
    //  Check Feature
         $(document).on("click", ".checkfeatured", function () {
    console.log('hello');
    
      var did = $(this).data("did");
      var tab=$(this).data("table");
      var sta=$(this).data("status");
      var elem = this;
      $.ajax({
        url: "./database/actions/consultancy/featureornot.php",
        type: "POST",
        data: {
          did: did,
          tablename:tab,
          status:sta,
        },
        success: function (data) {
            //  var n = data.trim();
          window.location.reload();
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            console.log(data)
             
          } else {
            $("#error-msg").html("cant  change records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    
  });
  
//   check feature for all 
 $(document).on("click", ".checkfeaturedall", function () {
      var did = $(this).data("id");
      var tab=$(this).data("tablename");
      var featured=$(this).data("featured");
      var criteria=$(this).data("criteria");
      
     
      var elem = this;
      $.ajax({
        url: "./database/actions/check_featured/check_featured.php",
        type: "POST",
        data: {
          did: did,
          tablename:tab,
          featured:featured,
          criteria:criteria
          
        },
        success: function (data) {
            //  var n = data.trim();
          window.location.reload();
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            console.log(data)
             
          } else {
            $("#error-msg").html("cant  change records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    
  });
  
//   university_status
  //  Check Feature
         $(document).on("click", ".unicheckstatus", function () {

     
      var did = $(this).data("id");
      var tab=$(this).data("tablename");
      var sta=$(this).data("status");
      var elem = this;
      $.ajax({
        url: "./database/actions/checkstatus/uni_check.php",
        type: "POST",
        data: {
          did: did,
          tablename:tab,
          status:sta,
        },
        success: function (data) {
          window.location.reload();
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            console.log(data)
             
          } else {
            $("#error-msg").html("cant  change records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    
  });
 
 
    //  check status 
    //  Check Feature
         $(document).on("click", ".checkstatus", function () {

     
      var did = $(this).data("id");
      var tab=$(this).data("tablename");
      var sta=$(this).data("status");
      var elem = this;
      $.ajax({
        url: "./database/actions/checkstatus/check_status.php",
        type: "POST",
        data: {
          did: did,
          tablename:tab,
          status:sta,
        },
        success: function (data) {
          window.location.reload();
          var n = data.trim();
          console.log(n
          )
          if (n==='1') {
            console.log(data)
             
          } else {
            $("#error-msg").html("cant  change records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    
  });
 
     
//   delete course
        
          $(document).on("click", ".delete-course", function () {
            
            if (confirm("Do you really want to delete this record?")) {
              var did = $(this).data("did");
              var elem = this;
              // alert(did);
              $.ajax({
                url: "./database/actions/course/delete.php",
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
  

  ///admin delete ajax
  $(document).on("click", ".delete-admin", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/superadmin/delete-admin.php",
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
  
//   university Delete
 $(document).on("click", ".delete-university", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
    //   alert(did);
      $.ajax({
        url: "./database/actions/universities/delete.php",
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
  
    //banner delete 
  $(document).on("click", ".delete-banner", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/banner/delete.php",
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
  
    //class delete 
  $(document).on("click", ".delete-class", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/consultancy/deletec.php",
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
  ///Country delete ajax
  $(document).on("click", ".delete-country", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/country/delete-country.php",
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

  //content delete 
  $(document).on("click", ".delete-content", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/content/delete.php",
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
      alert(did);
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
    //   alert(did);
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


  //mail delete 
  $(document).on("click", ".delete-mail", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/mail/delete.php",
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
    $(document).on("click", ".delete-sides", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/sides/delete.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          var n = data.trim();
          console.log(n)
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
      // alert(did);
      $.ajax({
        url: "./database/actions/events/delete.php",
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
      var table = $(this).data("table");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/pages/delete.php",
        type: "POST",
        data: {
          did: did,table:table
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
  $(document).on("click", ".delete-consulta", function () {
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
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
  
  ///area delete 
  $(document).on("click", ".delete-area", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
    //   alert(did);
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
    $(document).on("click", ".delete-ads", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/ads/delete_ads.php",
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
      $(document).on("click", ".delete-memb", function () {
    console.log('hello');
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(did);
      $.ajax({
        url: "./database/actions/member/delete_memb.php",
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
//   $(document).on("click", ".delete-consulta", function () {
//     console.log('hello');
//     if (confirm("Do you really want to delete this record?")) {
//       var did = $(this).data("did");
//       var elem = this;
//       $.ajax({
//         url: "./database/actions/consultancy/delete.php",
//         type: "POST",
//         data: {
//           did: did,
//         },
//         success: function (data) {
//           var n = data.trim();
//           console.log(n
//           )
//           if (n==='1') {
//             console.log(data)
//             $(elem).closest("tr").fadeOut();
//           } else {
//             $("#error-msg").html("cant delete records.").slideDown();
//             $("#success-msg").slideUp();
//           }
//         },
//       });
//     }
//   });
    


  //dependent search province district
  $(document).on("change", "#province", function () {
    console.log('hello');
    // if (confirm("Do you really want to delete this record?")) {
      var value = $(this).val();
      // var elem = this;
    //   console.log(value)
    //   alert(did);
      $.ajax({
        url: "./database/actions/loader/load_district.php",
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
    //   alert(did);
      $.ajax({
        //   www.demo3.consultancynepal.com/cnbackend/database/actions/loader/load_city.php
        url: "./database/actions/loader/load_city.php",
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
    //   alert(did);
     
      $.ajax({
        //   www.demo3.consultancynepal.com/cnbackend/database/actions/loader/load_city.php
        url: "./database/actions/loader/load_area.php",
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
  
  
  //all content title check duplication
    $(document).on("keyup", ".titl", function () {
        console.log("hii")
        
      var table = $(this).data("tb");
      var value = $(this).val();
      
      $.ajax({
        url: "./database/check_title.php",
        type: "POST",
        data: {
          table:table,
          key:value
        },
        success: function (data) {
            $("#content-title-check"). css({ display: "block" });
              $("#content-title-check").html(data);
            console.log(data)
        //   if (n==='1') {
        //   
        //   }
        },
      });
      
      
    
  });
 $(document).on("blur", ".titl", function () {
      $("#content-title-check"). css({ display: "none" });
      console.log("Hello")
     
 });
 

 });
 </script>

  <script src="assets/js/data-table.js"></script>
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="assets/vendors/js/vendor.bundle.addons.js"></script>
  <script src="assets/js/data-table.js"></script>
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <script src="assets/js/dashboard.js"></script>
  <script src="assets/js/formpickers.js"></script>
  <script src="assets/js/form-addons.js"></script>
  <script src="assets/js/x-editable.js"></script>
  <script src="assets/js/dropify.js"></script>
  <script src="assets/js/dropzone.js"></script>
  <script src="assets/js/jquery-file-upload.js"></script>
  <script src="assets/js/formpickers.js"></script>
  <script src="assets/js/form-repeater.js"></script>
  
  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#sortable" ).sortable();
  } );

  $("#savebtn").click(function(){
      var array = [];
      $.each($("#sortable").find('tr'),function(){
          array.push($(this).data("id"));
      });
        $("#item_id").val(array.toString());
        $("#form").submit();
  });
  </script>  
 
</body>


</html>
