$(document).ready(function () {
  //==========================================================================inserting the program======   ===========================================================================================================

  // $("#save-program").on("click", function (e) {
  //   e.preventDefault();
  //   var program = $("#programs").val();
  // //   console.log(program)

  //   if (program == "" ) {
  //     $("#error-msg").html("All fields are required.").slideDown();
  //     $("#success-msg").slideUp();
  //   } else {
  // //   console.log(program)

  //     $.ajax({
  //       url: "insert_program.php", //sql file to insert into the database
  //       type: "POST", // method
  //       data: {
  //         //type of the data that should be posted
  //         program_name: program,
  //       },
  //       success: function (data) {
  //         if (data) {
  //           //if data inderted load the data table
  //           $("#add-form").trigger("reset"); //if submitted perform the reset
  //           $("#success-msg").html("Data inserted successfully").slideDown(); //if data inserted show the message
  //           $("#error-msg").slideUp();
  //         } else {
  //           $("#error-msg").html("cant save records.").slideDown();
  //           $("#success-msg").slideUp();
  //         }
  //       },
  //     });
  //   }
  // });

  mytable_datas = $("#myTable").DataTable({
    // "pageLength": 100,
    // "aoColumnDefs": [{
    //     'bSortable': false,
    //     'aTargets': [0],
    // }],
  });
  var rows = $("#myTable").dataTable();

  //program loading in selection
  // function loadProgram() {
  //   $.ajax({
  //     url: "program_selection.php",
  //     type: "POST",
  //     success: function (data) {
  //       $("#program").append(data);
  //       // console.log(data)
  //     },
  //   });
  // }

  // //subject loading in selection
  // function loadSubject() {
  //   $.ajax({
  //     url: "subject_selection.php",
  //     type: "POST",
  //     success: function (data) {
  //       $("#subject").append(data);
  //       // console.log(data)
  //     },
  //   });
  // }

  // //author loading in selection

  // function loadAuthor() {
  //   $.ajax({
  //     url: "author_selection.php",
  //     type: "POST",
  //     success: function (data) {
  //       $("#author").append(data);
  //       // console.log(data)
  //     },
  //   });
  // }
  // //publication loading in selection

  // function loadPublication() {
  //   $.ajax({
  //     url: "publication_selection.php",
  //     type: "POST",
  //     success: function (data) {
  //       $("#publication").append(data);
  //       // console.log(data)
  //     },
  //   });
  // }
  // //textbook loading in selection

  // function loadTextbooks() {
  //   $.ajax({
  //     url: "textbook_selection.php",
  //     type: "POST",
  //     success: function (data) {
  //       $("#textbooks").append(data);
  //       // console.log(data)
  //     },
  //   });
  // }

  //--------------------------------------------------------------------------------------------------------Inserting  the student Details - - - - - -- - -  --------------------------------------------------------------------------------

  // $("#save-student").on("click",function(e){
  // e.preventDefault();
  // var fname = $("#fname").val();
  // var mname = $("#mname").val();
  // var lname = $("#lname").val();
  // var dob = $("#dob").val();
  // var reg_no = $("#reg-no").val();
  // var batch = $("#batch").val();
  // var level = $("#level").val();
  // var program_id = $("#program").val();

  // console.log(fname)
  // console.log(mname)
  // console.log(lname)
  // console.log(dob)
  // console.log(reg_no)
  // console.log(batch)
  // console.log(level)
  // console.log(program_id)

  //   //   console.log(program)

  //     if (fname == "" || lname=="" || dob=="" || reg_no=="" || batch== "" || level =="" || program_id =="" ) {
  //       $("#error-msg").html("All fields are required.").slideDown();
  //       $("#success-msg").slideUp();
  //       // window.location.reload();
  //     } else {
  //   //   console.log(program)

  //       $.ajax({
  //         url: "insert_student.php", //sql file to insert into the database
  //         type: "POST", // method
  //         data: {
  //           //type of the data that should be posted
  //           fname: fname,
  //           mname: mname,
  //           lname: lname,
  //           program_id: program_id,
  //           reg_no: reg_no,
  //           batch: batch,
  //           level: level,
  //           dob:dob
  //         },
  //         success: function (data) {
  //           if (data) {
  //             //if data inderted load the data table
  //             $("#add-form").trigger("reset"); //if submitted perform the reset
  //             $("#success-msg").html("Data inserted successfully").slideDown(); //if data inserted show the message
  //             $("#error-msg").slideUp();
  //             window.location.reload();
  //           } else {
  //             window.location.reload();
  //             $("#error-msg").html("cant save records.").slideDown();
  //             $("#success-msg").slideUp();
  //           }
  //         },
  //       });
  //     }
  //   });
  // loadProgram();
  // loadSubject();
  // loadPublication();
  // loadTextbooks();
  // loadAuthor();

  //------------------------------------------------------------------------add subject ----------------------------------------------------------------------------------------------------------

  // $("#save-subject").on("click", function (e) {
  //   e.preventDefault();
  //   var subject = $("#subject").val();
  // //   console.log(program)

  //   if (subject == "" ) {
  //     $("#error-msg").html("All fields are required.").slideDown();
  //     $("#success-msg").slideUp();
  //   } else {
  // //   console.log(program)

  //     $.ajax({
  //       url: "insert_subject.php", //sql file to insert into the database
  //       type: "POST", // method
  //       data: {
  //         //type of the data that should be posted
  //         subject_name: subject,
  //       },
  //       success: function (data) {
  //         if (data) {
  //           //if data inderted load the data table
  //           $("#add-form").trigger("reset"); //if submitted perform the reset
  //           $("#success-msg").html("Data inserted successfully").slideDown(); //if data inserted show the message
  //           $("#error-msg").slideUp();
  //         } else {
  //           $("#error-msg").html("cant save records.").slideDown();
  //           $("#success-msg").slideUp();
  //         }
  //       },
  //     });
  //   }
  // });
  //------------------------------------------------------------------------add author ----------------------------------------------------------------------------------------------------------

  // $("#save-author").on("click", function (e) {
  //   e.preventDefault();
  //   var author = $("#author").val();
  // //   console.log(program)

  //   if (author == "" ) {
  //     $("#error-msg").html("All fields are required.").slideDown();
  //     $("#success-msg").slideUp();
  //   } else {
  // //   console.log(program)

  //     $.ajax({
  //       url: "insert_author.php", //sql file to insert into the database
  //       type: "POST", // method
  //       data: {
  //         //type of the data that should be posted
  //         author_name: author,
  //       },
  //       success: function (data) {
  //         if (data) {
  //           //if data inderted load the data table
  //           $("#add-form").trigger("reset"); //if submitted perform the reset
  //           $("#success-msg").html("Data inserted successfully").slideDown(); //if data inserted show the message
  //           $("#error-msg").slideUp();
  //         } else {
  //           $("#error-msg").html("cant save records.").slideDown();
  //           $("#success-msg").slideUp();
  //         }
  //       },
  //     });
  //   }
  // });
  // //------------------------------------------------------------------------add publication ----------------------------------------------------------------------------------------------------------

  // $("#save-publication").on("click", function (e) {
  //   e.preventDefault();
  //   var publication = $("#publication").val();
  // //   console.log(program)

  //   if (publication == "" ) {
  //     $("#error-msg").html("All fields are required.").slideDown();
  //     $("#success-msg").slideUp();
  //   } else {
  // //   console.log(program)

  //     $.ajax({
  //       url: "insert_publication.php", //sql file to insert into the database
  //       type: "POST", // method
  //       data: {
  //         //type of the data that should be posted
  //         publication_name: publication,
  //       },
  //       success: function (data) {
  //         if (data) {
  //           //if data inderted load the data table
  //           $("#add-form").trigger("reset"); //if submitted perform the reset
  //           $("#success-msg").html("Data inserted successfully").slideDown(); //if data inserted show the message
  //           $("#error-msg").slideUp();
  //         } else {
  //           $("#error-msg").html("cant save records.").slideDown();
  //           $("#success-msg").slideUp();
  //         }
  //       },
  //     });
  //   }
  // });

  //--------------------------------------------------------------------------------------------------------Inserting  the Textbook Details - - - - - -- - -  --------------------------------------------------------------------------------

  //  $("#save-textbook").on("click",function(e){
  //   e.preventDefault();
  //   var text_book = $("#textbook_name").val();
  //   var subject = $("#subject").val();
  //   var author = $("#author").val();
  //   var publication = $("#publication").val();
  //   var quantity = $("#quantity").val();
  //   var price = $("#price").val();

  //   // console.log(text_book)
  //   // console.log(subject)
  //   // console.log(author)
  //   // console.log(quantity)
  //   // console.log(publication)
  //   // console.log(price)

  //     //   console.log(program)

  //       if (text_book == "" || subject=="" || author=="" || quantity=="" || publication== "" || price=="" ) {
  //         $("#error-msg").html("All fields are required.").slideDown();
  //         $("#success-msg").slideUp();
  //       } else {
  //     //   console.log(program)

  //         $.ajax({
  //           url: "insert_textbook.php", //sql file to insert into the database
  //           type: "POST", // method
  //           data: {
  //             //type of the data that should be posted
  //             text_book: text_book,
  //             sid: subject,
  //             aid: author,
  //             price: price,
  //             pub_id: publication,
  //             quantity: quantity
  //           },
  //           success: function (data) {
  //             if (data) {
  //               //if data inderted load the data table
  //               $("#add-form").trigger("reset"); //if submitted perform the reset
  //               $("#success-msg").html("Data inserted successfully").slideDown(); //if data inserted show the message
  //               $("#error-msg").slideUp();
  //             } else {
  //               $("#error-msg").html("cant save records.").slideDown();
  //               $("#success-msg").slideUp();
  //             }
  //           },
  //         });
  //       }
  //     });

  //--------------------------------------------------------------------------------------------------------Inserting  the Textbook Details - - - - - -- - -  --------------------------------------------------------------------------------

  //  $("#save-books").on("click",function(e){
  //   e.preventDefault();
  //   var textbook_id = $("#textbooks-1").val();
  //   var subject = $("#subject").val();
  //   var author = $("#author-1").val();
  //   var quantity = $("#quantity").val();

  //   console.log(textbook_id)
  //   console.log(subject)
  //   console.log(author)
  //   // console.log(quantity)
  //   // console.log(publication)

  //     //   console.log(program)

  //       if (textbook_id == "" || subject=="" || author=="" || quantity=="" ) {
  //         $("#error-msg").html("All fields are required.").slideDown();
  //         $("#success-msg").slideUp();
  //       } else {
  //     //   console.log(program)

  //         $.ajax({
  //           url: "insert_books.php", //sql file to insert into the database
  //           type: "POST", // method
  //           data: {
  //             //type of the data that should be posted
  //             textbook_id: textbook_id,
  //             subject: subject,
  //             author: author,
  //             quantity: quantity
  //           },
  //           success: function (data) {
  //             if (data) {
  //               //if data inderted load the data table
  //               $("#add-form").trigger("reset"); //if submitted perform the reset
  //               $("#success-msg").html("Data inserted successfully").slideDown(); //if data inserted show the message
  //               $("#error-msg").slideUp();
  //             } else {
  //               $("#error-msg").html("cant save records.").slideDown();
  //               $("#success-msg").slideUp();
  //             }
  //           },
  //         });
  //       }
  //     });

  // $("#subject").on("change", function () {
  //   var subject = $("#subject").val();
  //   // console.log(subject)
  //   $.ajax({
  //     url: "get_authors.php", //sql file to insert into the database
  //     type: "POST", // method
  //     data: {
  //       //type of the data that should be posted
  //       sub_id: subject,
  //     },
  //     success: function (datas) {
  //       if (datas != null) {
  //         $("#author-1").empty().append(datas);
  //       } else {
  //       }
  //     },
  //   });
  // });
  // $("#author-1").on("change", function () {
  //   var author = $("#author-1").val();
  //   var subject = $("#subject").val();
  //   // console.log(author)
  //   // console.log(subject)
  //   $.ajax({
  //     url: "get_textbooks.php", //sql file to insert into the database
  //     type: "POST", // method
  //     data: {
  //       //type of the data that should be posted
  //       subject: subject,
  //       author: author,
  //     },
  //     success: function (datas) {
  //       // console.log('hello')
  //       if (datas != null) {
  //         $("#textbooks-1").empty().append(datas);
  //       } else {
  //         // $("#textbooks-1").empty().append(datas);
  //       }
  //     },
  //   });
  // });
  // $("#textbooks-1").on("change", function () {
  //   var author = $("#author-1").val();
  //   var subject = $("#subject").val();
  //   var textbook = $("#textbooks-1").val();
  //   console.log(author);
  //   console.log(subject);
  //   console.log(textbook);
  //   $.ajax({
  //     url: "get_books.php", //sql file to insert into the database
  //     type: "POST", // method
  //     data: {
  //       //type of the data that should be posted
  //       // subject: subject,
  //       author: author,
  //       textbook: textbook,
  //     },
  //     success: function (datas) {
  //       // console.log('hello')
  //       if (datas != null) {
  //         $("#books-1").empty().append(datas);
  //       } else {
  //         // $("#textbooks-1").empty().append(datas);
  //       }
  //     },
  //   });
  // });

  // $("#save-issues").on("click", function (e) {
  //   e.preventDefault();
  //   var textbook_id = $("#textbooks-1").val();
  //   // var subject = $("#subject").val();
  //   var author = $("#author-1").val();
  //   var bn = $("#books-1").val();
  //   var sid = $("#sts_id").val();

  // console.log(textbook_id)
  // console.log(subject)
  // console.log(bn)

  // console.log(quantity)
  // console.log(publication)

  //   console.log(program)

  //   if (textbook_id == "" || bn == "" || author == "" || sid == "") {
  //     $("#error-msg").html("All fields are required.").slideDown();
  //     $("#success-msg").slideUp();
  //   } else {
  //     //   console.log(program)

  //     $.ajax({
  //       url: "insert_issues.php", //sql file to insert into the database
  //       type: "POST", // method
  //       data: {
  //         //type of the data that should be posted
  //         // textbook_id: textbook_id,
  //         book: bn,
  //         sid: sid,
  //         tid: textbook_id,
  //         // subject: subject,
  //         // author: author,
  //         // quantity: quantity
  //       },
  //       success: function (data) {
  //         if (data) {
  //           //if data inderted load the data table
  //           $("#add-form").trigger("reset"); //if submitted perform the reset
  //           $("#success-msg").html("Data inserted successfully").slideDown(); //if data inserted show the message
  //           $("#error-msg").slideUp();
  //           // location.reload();
  //         } else {
  //           $("#error-msg").html("cant save records.").slideDown();
  //           $("#success-msg").slideUp();
  //         }
  //       },
  //     });
  //   }
  // });

  // function load_sts_issues(){
  //   $.ajax({
  //     url:'load_sts_issues.php',
  //    type:'POST',
  //    success:function (data) {
  //     if(data !=null){
  //       $('#table-load').html(data);
  //     }
  //     else{
  //       console.log("No data is fetched");
  //     }

  //    }
  //   })

  // }
  // load_sts_issues();

  //show modal box
  $(document).on("click", ".ret-btn", function () {
    $("#modal").show();
    var ib_id = $(this).data("ib_id");
    //    alert(cid);
    $.ajax({
      url: "load-modal.php",
      type: "POST",
      data: {
        ib_id: ib_id,
      },
      success: function (data) {
        $("#modal-form table").html(data);
      },
    });
  });
  //hide modal box
  $("#close-btn").on("click", function () {
    $("#modal").hide();
  });

  // function load_books() {
  //   $.ajax({
  //     url: "load-books.php",
  //     type: "POST",
  //     success: function (data) {
  //       if (data != null) {
  //         $("#book-load").html(data);
  //       } else {
  //         console.log("No data is fetched");
  //       }
  //     },
  //   });
  // }
  // load_books();

  //author delete
  $(document).on("click", ".delete-author", function () {
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(cid);
      $.ajax({
        url: "delete-author.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          if (data == 1) {
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });

  //program delete
  $(document).on("click", ".delete-program", function () {
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(cid);
      $.ajax({
        url: "delete-program.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          if (data == 1) {
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });

  //batch delete
  $(document).on("click", ".delete_batch", function () {
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(cid);
      $.ajax({
        url: "delete-batch.php",
        type: "POST",
        data: {
          batch_id: did,
        },
        success: function (data) {
          if (data == 1) {
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });

  //publication delete
  $(document).on("click", ".delete-publication", function () {
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(cid);
      $.ajax({
        url: "delete-publication.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          if (data == 1) {
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });

  //student delete
  $(document).on("click", ".delete-student", function () {
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(cid);
      $.ajax({
        url: "delete-student.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          if (data == 1) {
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });

  //subject delete
  $(document).on("click", ".delete-subject", function () {
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(cid);
      $.ajax({
        url: "delete-subject.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          if (data == 1) {
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg").html("cant delete records.").slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });

  //textbook delete
  $(document).on("click", ".delete-textbook", function () {
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      // alert(cid);
      $.ajax({
        url: "delete-textbook.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          if (data == 1) {
            $(elem).closest("tr").fadeOut();
          } else {
            $("#error-msg")
              .html("Book On issue Cant delete Records.")
              .slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });

  //return delete
  $(document).on("click", ".delete-ret", function () {
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("did");
      var elem = this;
      console.log(did);
      // alert(cid);
      $.ajax({
        url: "delete-return.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          console.log(data);
          var datas = data.trim();
          console.log(datas);
          if (datas === "true") {
            console.log(datas);
            $(elem).closest("tr").fadeOut();
          } else {
            console.log(datas);
            $("#error-msg")
              .html("Book Fine On Pending  Cant delete Records.")
              .slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });

  //return mistake
  $(document).on("click", ".mis-ret", function () {
    if (confirm("Do you really want to move it in issued book?")) {
      var did = $(this).data("did");
      var elem = this;
      // console.log(did);
      // alert(cid);
      $.ajax({
        url: "mis_return.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (data) {
          // console.log(data)
          var datas = data.trim();
          console.log(datas);
          if (datas === "true") {
            // console.log(datas)
            $(elem).closest("tr").fadeOut();
            $("#success-msg")
              .html("Book added on the issued Records.")
              .slideDown()
              .delay(3000)
              .fadeOut();
          } else {
            // console.log(datas)
            $("#error-msg")
              .html("Book Fine On Pending  Cant delete Records.")
              .slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });

  //program-load-update

  $("#edit-program").on("click", function () {
    console.log("clicked");
    var cid = $(this).data("eid");
    $("#mb").html(cid);
  });

  //program-load-update
  $("#myTable").on("click", ".edit-program", function () {
    console.log("clicked");
    var cid = $(this).data("eid");
    $.ajax({
      url: "program-load-update.php",
      type: "POST",
      data: {
        pid: cid,
      },
      success: function (details) {
        if (details) {
          $("#mb").html(details);
        } else {
        }
      },
    });
  });

  //author-load-update
  $("#myTable").on("click", ".edit-author", function () {
    console.log("clicked");
    var cid = $(this).data("eid");
    $.ajax({
      url: "author-load-update.php",
      type: "POST",
      data: {
        aid: cid,
      },
      success: function (details) {
        if (details) {
          $("#mb").html(details);
        } else {
        }
      },
    });
  });

  //subject-load-update
  $("#myTable").on("click", ".edit-subject", function () {
    console.log("clicked");
    var cid = $(this).data("eid");
    $.ajax({
      url: "subject-load-update.php",
      type: "POST",
      data: {
        sub_id: cid,
      },
      success: function (details) {
        if (details) {
          $("#mb").html(details);
        } else {
        }
      },
    });
  });

  //student-load-update
  $("#myTable").on("click", ".edit-student", function () {
    console.log("clicked");
    var cid = $(this).data("eid");
    console.log(cid);
    $.ajax({
      url: "student-load-update.php",
      type: "POST",
      data: {
        sid: cid,
      },
      success: function (details) {
        if (details) {
          $("#mb").html(details);
        } else {
        }
      },
    });
  });

  //batch-load-update
  $("#myTable").on("click", ".edit-batch", function () {
    console.log("clicked");
    var cid = $(this).data("eid");
    console.log(cid);
    $.ajax({
      url: "batch_load_update.php",
      type: "POST",
      data: {
        batch_id: cid,
      },
      success: function (details) {
        if (details) {
          $("#mbb").html(details);
        } else {
        }
      },
    });
  });

  //publication-load-update
  $("#myTable").on("click", ".edit-publication", function () {
    console.log("clicked");
    var cid = $(this).data("eid");
    console.log(cid);
    $.ajax({
      url: "publication-load-update.php",
      type: "POST",
      data: {
        pub_id: cid,
      },
      success: function (details) {
        if (details) {
          $("#mb").html(details);
        } else {
        }
      },
    });
  });

  //textbook-load-update
  $("#myTable").on("click", ".edit-textbook", function () {
    console.log("clicked");
    var cid = $(this).data("eid");
    console.log(cid);
    $.ajax({
      url: "textbook-load-update.php",
      type: "POST",
      data: {
        tb_id: cid,
      },
      success: function (details) {
        if (details) {
          $("#mb").html(details);
        } else {
        }
      },
    });
  });

  //live search book
  $("#bn").keyup(function () {
    var tb_id = $(this).data("tb_id");
    var key = $(this).val();

    console.log(tb_id);
    console.log(key);
    $.ajax({
      type: "POST",
      url: "get_books.php",
      data: {
        key: key,
        tb_id: tb_id,
      },
      beforeSend: function () {
        $("#bn").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
      },
      success: function (data) {
        $("#suggesstion-box").show();
        $("#suggesstion-box").html(data);
        $("#bn").css("background", "#FFF");
      },
    });
  });

  //live search book
  $("#bnp").keyup(function () {
    var tb_id = $(this).data("tb_id");
    var key = $(this).val();

    console.log(tb_id);
    console.log(key);
    $.ajax({
      type: "POST",
      url: "get_books.php",
      data: {
        key: key,
        tb_id: tb_id,
      },
      beforeSend: function () {
        $("#bnp").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
      },
      success: function (data) {
        $("#suggesstion-boxes").show();
        $("#suggesstion-boxes").html(data);
        $("#bnp").css("background", "#FFF");
      },
    });
  });

  //live search student
  $("#bns").keyup(function () {
    var tb_id = $(this).data("tb_id");
    var key = $(this).val();

    // console.log(tb_id)
    // console.log(key)
    $.ajax({
      type: "POST",
      url: "get_students.php",
      data: {
        key: key,
        tb_id: tb_id,
      },
      beforeSend: function () {
        $("#bns").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
      },
      success: function (data) {
        $("#suggesstion-boxe").show();
        $("#suggesstion-boxe").html(data);
        $("#bns").css("background", "#FFF");
      },
    });
  });

  //textbook-damaged-update
  $("#myTable").on("click", ".damaged-textbook", function () {
    console.log("clicked");
    var cid = $(this).data("ib_id");
    $.ajax({
      url: "damaged_show.php",
      type: "POST",
      data: {
        ib_id: cid,
      },
      success: function (details) {
        if (details) {
          $("#mb").html(details);
        } else {
        }
      },
    });
  });

  //textbook-returned-update
  $("#myTable").on("click", ".returned-textbook", function () {
    console.log("clicked");
    var cid = $(this).data("ib_id");
    $.ajax({
      url: "return_show.php",
      type: "POST",
      data: {
        ib_id: cid,
      },
      success: function (details) {
        if (details) {
          $("#is").html(details);
        } else {
        }
      },
    });
  });

  //textbook-issued-edit
  $("#myTable").on("click", ".Edit-issued-textbook", function () {
    console.log("clicked");
    var cid = $(this).data("tb_id");
    console.log(cid);
    $.ajax({
      url: "issue_edit_load.php",
      type: "POST",
      data: {
        tb_id: cid,
      },
      success: function (details) {
        if (details) {
          $("#ie").html(details);
        } else {
        }
      },
    });
  });

  //delete-activities-update
  $(document).on("click", ".delete-acts", function () {
    if (confirm("Do you really want to delete this record?")) {
      var did = $(this).data("sts_act_id");
      var elem = this;
      // alert(cid);
      $.ajax({
        url: "delete-acts.php",
        type: "POST",
        data: {
          did: did,
        },
        success: function (datas) {
          var n = datas.trim();
          if (n === "true") {
            // console.log(datas);
            $(elem).closest("tr").fadeOut();
            $("#success-msg")
              .html("Delete Success.")
              .slideDown()
              .delay(3000)
              .fadeOut();
          } else if (n === "false") {
            // console.log(datas);
            $("#error-msg")
              .html("Book Fine On Pending !!cant delete records.!!")
              .slideDown();
            $("#success-msg").slideUp();
          }
        },
      });
    }
  });

  //fine-payment-update
  $("#myTable").on("click", ".fine_payment", function () {
    console.log("clicked");
    var cid = $(this).data("sts_act_id");
    var did = $(this).data("rb_id");
    $.ajax({
      url: "fine_rem_pay.php",
      type: "POST",
      data: {
        sts_act_id: cid,
        rbi: did,
      },
      success: function (details) {
        if (details) {
          $("#see").html(details);
        } else {
        }
      },
    });
  });

  //fine-payment-update
  $("#myTable").on("click", ".fine_payment_ret", function () {
    console.log("clicked");
    var cid = $(this).data("rb_id");
    var did = $(this).data("sts_act_id");
    $.ajax({
      url: "fine_rem_pay.php",
      type: "POST",
      data: {
        rb_id: cid,
        sai: did,
      },
      success: function (details) {
        if (details) {
          $("#seeF").html(details);
        } else {
        }
      },
    });
  });

  //deleting the selected array of  the data of the student
  $("#del_sel").on("click", function () {
    var id = [];
    var elem = [];

    // $(":checkbox:checked", rows.fnGetNodes()).each(function (key) {
    $(
      ":checkbox:checked",
      mytable_datas.rows({ filter: "applied" }).nodes()
    ).each(function (key) {
      id[key] = $(this).val();
      elem[key] = this;
    });
    // console.log(id)
    // console.log(elem)
    if (id.length === 0) {
      alert("Select at least one value to delete.");
    } else {
      if (confirm("Do you really want to delete these records?")) {
        // console.log(id)
        $.ajax({
          url: "delete-student.php",
          type: "POST",
          data: {
            id: id,
          },
          success: function (data) {
            if (data) {
              // alert("deleted");
              $(elem).closest("tr").fadeOut();
              $("#success-msg")
                .html("Delete Success.")
                .slideDown()
                .delay(3000)
                .fadeOut();

              //   window.location.reload();
            } else {
              $("#error-msg").html("cant delete records.").slideDown();
              $("#success-msg").slideUp();
            }
          },
        });
      }
    }
  });

  //updating  the semenster of the  selected array of  the data of the student
  $("#up_sem_st").on("click", function () {
    var id = [];
    var elem = [];
    // console.log(table.rows( { filter : 'applied'} ).nodes().length);
    //filtered rows data as arrays
    // console.log(.each(function (key));
    $(
      ":checkbox:checked",
      mytable_datas.rows({ filter: "applied" }).nodes()
    ).each(function (key) {
      // $(":checkbox:checked", rows.fnGetNodes()).each(function (key) {
      id[key] = $(this).val();
      elem[key] = this;
      console.log(id);
      console.log(key);
    });

    // console.log(id)
    // console.log(elem)
    if (id.length === 0) {
      alert("Select at least one value to delete.");
    } else {
      if (confirm("Do you really want to Update the semenster?")) {
        // console.log(id)
        $.ajax({
          url: "update_student_sem.php",
          type: "POST",
          data: {
            id: id,
          },
          success: function (data) {
            if (data) {
              console.log("hi");
              $("#success-msg")
                .html("Semenster Updated Successfully.")
                .slideDown()
                .delay(3000)
                .fadeOut();

              // $(elem).closest("tr").fadeOut();
              //   window.location.reload();
            } else {
              $("#error-msg").html("cant delete records.").slideDown();
              $("#success-msg").slideUp();
            }
          },
        });
      }
    }
  });

  //deleting the selected array of  the data of the author
  $("#del_aut").on("click", function () {
    var id = [];
    var elem = [];

    // $(":checkbox:checked", rows.fnGetNodes()).each(function (key) {
    $(
      ":checkbox:checked",
      mytable_datas.rows({ filter: "applied" }).nodes()
    ).each(function (key) {
      id[key] = $(this).val();
      elem[key] = this;
    });
    // console.log(id)
    // console.log(elem)
    if (id.length === 0) {
      alert("Select at least one value to delete.");
    } else {
      if (confirm("Do you really want to delete these records?")) {
        // console.log(id)
        $.ajax({
          url: "delete-author.php",
          type: "POST",
          data: {
            id: id,
          },
          success: function (data) {
            if (data) {
              // alert("deleted");
              $(elem).closest("tr").fadeOut();
              $("#success-msg")
                .html("Delete Successfull.")
                .slideDown()
                .delay(3000)
                .fadeOut();

              //   window.location.reload();
            } else {
              $("#error-msg").html("cant delete records.").slideDown();
              $("#success-msg").slideUp();
            }
          },
        });
      }
    }
  });

  //deleting the selected array of  the data of the program
  $("#del_prog").on("click", function () {
    var id = [];
    var elem = [];

    // $(":checkbox:checked", rows.fnGetNodes()).each(function (key) {
    $(
      ":checkbox:checked",
      mytable_datas.rows({ filter: "applied" }).nodes()
    ).each(function (key) {
      id[key] = $(this).val();
      elem[key] = this;
    });
    // console.log(id)
    // console.log(elem)
    if (id.length === 0) {
      alert("Select at least one value to delete.");
    } else {
      if (confirm("Do you really want to delete these records?")) {
        // console.log(id)
        $.ajax({
          url: "delete-program.php",
          type: "POST",
          data: {
            id: id,
          },
          success: function (data) {
            if (data) {
              // alert("deleted");
              $(elem).closest("tr").fadeOut();
              $("#success-msg")
                .html("Delete Success.")
                .slideDown()
                .delay(3000)
                .fadeOut();

              //   window.location.reload();
            } else {
              $("#error-msg").html("cant delete records.").slideDown();
              $("#success-msg").slideUp();
            }
          },
        });
      }
    }
  });

  //deleting the selected array of  the data of the subjects
  $("#del_sub").on("click", function () {
    var id = [];
    var elem = [];

    // $(":checkbox:checked", rows.fnGetNodes()).each(function (key) {
    $(
      ":checkbox:checked",
      mytable_datas.rows({ filter: "applied" }).nodes()
    ).each(function (key) {
      id[key] = $(this).val();
      elem[key] = this;
    });
    // console.log(id)
    // console.log(elem)
    if (id.length === 0) {
      alert("Select at least one value to delete.");
    } else {
      if (confirm("Do you really want to delete these records?")) {
        // console.log(id)
        $.ajax({
          url: "delete-subject.php",
          type: "POST",
          data: {
            id: id,
          },
          success: function (data) {
            if (data) {
              // alert("deleted");
              $(elem).closest("tr").fadeOut();
              $("#success-msg")
                .html("Delete Success.")
                .slideDown()
                .delay(3000)
                .fadeOut();

              //   window.location.reload();
            } else {
              $("#error-msg").html("cant delete records.").slideDown();
              $("#success-msg").slideUp();
            }
          },
        });
      }
    }
  });

  //deleting the selected array of  the data of the Publication
  $("#del_pub").on("click", function () {
    var id = [];
    var elem = [];

    // $(":checkbox:checked", rows.fnGetNodes()).each(function (key) {
    $(
      ":checkbox:checked",
      mytable_datas.rows({ filter: "applied" }).nodes()
    ).each(function (key) {
      id[key] = $(this).val();
      elem[key] = this;
    });
    // console.log(id)
    // console.log(elem)
    if (id.length === 0) {
      alert("Select at least one value to delete.");
    } else {
      if (confirm("Do you really want to delete these records?")) {
        // console.log(id)
        $.ajax({
          url: "delete-publication.php",
          type: "POST",
          data: {
            id: id,
          },
          success: function (data) {
            if (data) {
              // alert("deleted");
              $(elem).closest("tr").fadeOut();
              $("#success-msg")
                .html("Delete Success.")
                .slideDown()
                .delay(3000)
                .fadeOut();

              //   window.location.reload();
            } else {
              $("#error-msg").html("cant delete records.").slideDown();
              $("#success-msg").slideUp();
            }
          },
        });
      }
    }
  });

  //deleting the selected array of  the data of the batch
  $("#del_batch").on("click", function () {
    var id = [];
    var elem = [];

    // $(":checkbox:checked", rows.fnGetNodes()).each(function (key) {
    $(
      ":checkbox:checked",
      mytable_datas.rows({ filter: "applied" }).nodes()
    ).each(function (key) {
      id[key] = $(this).val();
      elem[key] = this;
    });
    // console.log(id)
    // console.log(elem)
    if (id.length === 0) {
      alert("Select at least one value to delete.");
    } else {
      if (confirm("Do you really want to delete these records?")) {
        // console.log(id)
        $.ajax({
          url: "delete-batch.php",
          type: "POST",
          data: {
            id: id,
          },
          success: function (data) {
            if (data) {
              // alert("deleted");
              $(elem).closest("tr").fadeOut();
              $("#success-msg")
                .html("Delete Success.")
                .slideDown()
                .delay(3000)
                .fadeOut();

              //   window.location.reload();
            } else {
              $("#error-msg").html("cant delete records.").slideDown();
              $("#success-msg").slideUp();
            }
          },
        });
      }
    }
  });

  //deleting the selected array of  the data of the textbook
  $("#del_txt").on("click", function () {
    var id = [];
    var elem = [];

    // $(":checkbox:checked", rows.fnGetNodes()).each(function (key) {
    $(
      ":checkbox:checked",
      mytable_datas.rows({ filter: "applied" }).nodes()
    ).each(function (key) {
      id[key] = $(this).val();
      elem[key] = this;
    });
    // console.log(id)
    // console.log(elem)
    if (id.length === 0) {
      alert("Select at least one value to delete.");
    } else {
      if (confirm("Do you really want to delete these records?")) {
        // console.log(id)
        $.ajax({
          url: "delete-textbook.php",
          type: "POST",
          data: {
            id: id,
          },
          success: function (data) {
            if (data) {
              // alert("deleted");
              $(elem).closest("tr").fadeOut();
              $("#success-msg")
                .html("Delete Success.")
                .slideDown()
                .delay(3000)
                .fadeOut();

              //   window.location.reload();
            } else {
              $("#error-msg")
                .html("Book on issue !!cant delete records.!!")
                .slideDown();
              $("#success-msg").slideUp();
            }
          },
        });
      }
    }
  });

  //deleting the selected array of  the data of the returned book
  $("#del_ret").on("click", function () {
    var id = [];
    var elem = [];

    // $(":checkbox:checked", rows.fnGetNodes()).each(function (key) {
    $(
      ":checkbox:checked",
      mytable_datas.rows({ filter: "applied" }).nodes()
    ).each(function (key) {
      id[key] = $(this).val();
      elem[key] = this;
    });
    // console.log(id)
    // console.log(elem)
    if (id.length === 0) {
      alert("Select at least one value to delete.");
    } else {
      if (confirm("Do you really want to delete these records?")) {
        // console.log(id)
        $.ajax({
          url: "delete-return.php",
          type: "POST",
          data: {
            id: id,
          },
          success: function (datas) {
            var n = datas.trim();
            if (n === "true") {
              // console.log(datas);
              $(elem).closest("tr").fadeOut();
              $("#success-msg")
                .html("Delete Success.")
                .slideDown()
                .delay(3000)
                .fadeOut();
            } else if (n === "false") {
              // console.log(datas);
              $("#error-msg")
                .html("Book Fine on Pending  !!cant delete records.!!")
                .slideDown();
              $("#success-msg").slideUp();
            }
          },
        });
      }
    }
  });

  //deleting the selected array of  the data of the studet_acts
  $("#del_act").on("click", function () {
    var id = [];
    var elem = [];

    // $(":checkbox:checked", rows.fnGetNodes()).each(function (key) {
    $(
      ":checkbox:checked",
      mytable_datas.rows({ filter: "applied" }).nodes()
    ).each(function (key) {
      id[key] = $(this).val();
      elem[key] = this;
    });
    // console.log(id)
    // console.log(elem)
    if (id.length === 0) {
      alert("Select at least one value to delete.");
    } else {
      if (confirm("Do you really want to delete these records?")) {
        // console.log(id)
        $.ajax({
          url: "delete-acts.php",
          type: "POST",
          data: {
            id: id,
          },
          success: function (datas) {
            // console.log(datas)
            var n = datas.trim();
            console.log(n);
            if (n == "true") {
              console.log(datas);

              $(elem).closest("tr").fadeOut();
              $("#success-msg")
                .html("Delete Success.")
                .slideDown()
                .delay(3000)
                .fadeOut();
            } else if (n == "false") {
              console.log(n);
              $("#error-msg")
                .html(
                  "Book Fine is Still On pending Pay Fine to delete the data.!!"
                )
                .slideDown();
              $("#success-msg").slideUp();
            }
          },
        });
      }
    }
  });

  //returning the  the selected array of  the data of the issued books
  $("#ret_iss").on("click", function () {
    var id = [];
    var elem = [];

    // $(":checkbox:checked", rows.fnGetNodes()).each(function (key) {
    $(
      ":checkbox:checked",
      mytable_datas.rows({ filter: "applied" }).nodes()
    ).each(function (key) {
      id[key] = $(this).val();
      elem[key] = this;
    });
    console.log(id);
    console.log(elem);
    if (id.length === 0) {
      alert("Select at least one value to delete.");
    } else {
      if (confirm("Do you really want to Return these books?")) {
        // console.log(id)
        $.ajax({
          url: "return_sel.php",
          type: "POST",
          data: {
            id: id,
          },
          success: function (datas) {
            // console.log(datas)
            var n = datas.trim();
            console.log(n);
            if (n == "true") {
              console.log(datas);
              $("#success-msg")
                .html("Book in the bulk return succssfull")
                .slideDown()
                .delay(3000)
                .fadeOut();

              $(elem).closest("tr").fadeOut();
            } else if (n == "false") {
              console.log(n);
              $("#error-msg")
                .html(
                  "Book Fine is Still On pending Pay Fine to delete the data.!!"
                )
                .slideDown();
              $("#success-msg").slideUp();
            }
          },
        });
      }
    }
  });

  // selecting all the data in the chexkbox
  // $('#myTable').on('click', '#select-all', function(event) {
  //     if (this.checked) {
  //         // Iterate each checkbox
  //         $(':checkbox').each(function() {
  //             this.checked = true;
  //         });
  //     } else {
  //         $(':checkbox').each(function() {
  //             this.checked = false;
  //         });
  //     }
  // });

  $("#myTable").on("click", "#select-all", function () {
    //$('#flow-table tbody input[type="checkbox"]').prop('checked', this.checked);
    var cols = mytable_datas.column(0).nodes(),
      state = this.checked;

    for (var i = 0; i < cols.length; i += 1) {
      cols[i].querySelector("input[type='checkbox']").checked = state;
    }
  });


});
