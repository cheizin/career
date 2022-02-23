var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });


  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })

//global variables
var spinner = ` <div class="clearfix">
                        <div class="spinner-border float-right text-info" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
              </div>`;

var dynamic_navbar_url = 'views/layouts/navbar.php';

var blockui_spinner = `<div class="d-flex align-items-center text-primary">
  <strong>Processing...</strong>
  <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
</div>`;

//fetch dynamic navbar TO fetch recent notifications
$.ajax({
  url: dynamic_navbar_url,
  method:"POST",
  success: function(returned_navbar_data){
    $('#dynamic-navbar').html(returned_navbar_data);
  },
  error: function(){
    $('#dynamic-navbar').html('please reload page');
  }
});

function LoadDynamicNavbar()
{
  $.ajax({
    url: dynamic_navbar_url,
    method:"POST",
    success: function(returned_navbar_data){
      $('#dynamic-navbar').html(returned_navbar_data);
    },
    error: function(){
      $('#dynamic-navbar').html('please reload page');
    }
  });
}

/* $(document).on("mouseenter","form", function(){
    $('form').sisyphus({

    });
});
*/




// start add play station games

    // add ps collection games_no


      $(document).on("submit","#add-ps-game-form", function(e){
        e.preventDefault();

        var form_data = $(this).serializeArray();
      var form_url = 'controllers/ps-management/process-add-game-management-form.php';
        var form_method = 'POST';
        var loader =`<div class="loader text-center"></div>`;
        var risk_opportunity = $('#risk_opportunity').val();
        $('#loader').html(loader);

        $.ajax({
            data : form_data,
            url  : form_url,
            method : form_method,
            beforeSend:function()
            {
              $.blockUI({ message: blockui_spinner });
            },
            success:function(data){
                $.unblockUI();
                if(data == 'success')
                {
                  $('body').removeClass('modal-open');
                  $('.modal-backdrop').remove();

                      Toast.fire({
                          type: 'success',
                          title: 'Ps Records Successfully Recorded'
                        });
                        LoadDynamicNavbar();

                }
                else if(data == 'failed')
                {
                  Toast.fire({
                      type: 'error',
                      title: 'Failed. Please Try Again'
                    });
                }
                else
                {
                  Toast.fire({
                      type: 'error',
                      title: 'Could not Submit. Please Contact System Administrator'
                    });
                }
                console.log(data);
            },
            error: function(xhr)
            {
              $.unblockUI();
              Toast.fire({
                        type: 'error',
                        title: 'Your request could not be completed. Please try again: '+xhr.status
                });
            }


        });
    });


      // add dstv records

      $(document).on("submit","#add-dstv-game-form", function(e){
        e.preventDefault();

        var form_data = $(this).serializeArray();
       var form_url = 'controllers/game-management/process-add-dstv-game-form.php';
        var form_method = 'POST';
        var loader =`<div class="loader text-center"></div>`;
        var risk_opportunity = $('#risk_opportunity').val();
        $('#loader').html(loader);

        $.ajax({
            data : form_data,
            url  : form_url,
            method : form_method,
            beforeSend:function()
            {
              $.blockUI({ message: blockui_spinner });
            },
            success:function(data){
                $.unblockUI();
                if(data == 'success')
                {
                  $('body').removeClass('modal-open');
                  $('.modal-backdrop').remove();

                      Toast.fire({
                          type: 'success',
                          title: 'DSTV Records Successfully Recorded'
                        });
                        LoadDynamicNavbar();

                }
                else if(data == 'failed')
                {
                  Toast.fire({
                      type: 'error',
                      title: 'Failed. Please Try Again'
                    });
                }
                else
                {
                  Toast.fire({
                      type: 'error',
                      title: 'Could not Submit. Please Contact System Administrator'
                    });
                }
                console.log(data);
            },
            error: function(xhr)
            {
              $.unblockUI();
              Toast.fire({
                        type: 'error',
                        title: 'Your request could not be completed. Please try again: '+xhr.status
                });
            }


        });
    });
//START LOGIN FORM
$(document).on("submit", "#login-form", function(e){
    e.preventDefault();

    var process_url = 'controllers/auth/LoginController.php';
    var form_data = $('#login-form').serializeArray();
    var form_method = 'POST';
    var invalid_server = 'Unable to bind to server: Invalid credentials';
    var disconnected_server = "Can't contact LDAP server";
    var could_not_bind = "Could not bind to Authentication Server";


    $.ajax({
        url:process_url,
        data:form_data,
        method:form_method,
        beforeSend:function(){
            $.blockUI({ message: blockui_spinner });
        },
        success: function(data){
            $.unblockUI();
            if(data == "success")
            {
              location.reload();
                //fetch dynamic navbar
                $.ajax({
                  url: dynamic_navbar_url,
                  method:"POST",
                  success: function(returned_navbar_data){
                    $('#dynamic-navbar').html(returned_navbar_data);
                    console.log(returned_navbar_data);
                  },
                  error: function(){
                    $('#dynamic-navbar').html('please reload page');
                  }
                });
            }
            else if(data == 'invalid')
             {
               console.log(data);
               Toast.fire({
                   type: 'error',
                   title: 'Invalid Credentials'
                 })
             }
             else if(data.indexOf(invalid_server) != -1)
             {
               console.log(data);
               Toast.fire({
                   type: 'error',
                   title: 'Invalid Credentials'
                 })
             }
             else if(data.indexOf(could_not_bind) != -1)
             {
               console.log(data);
               Toast.fire({
                   type: 'error',
                   title: 'Invalid Credentials'
                 })
             }
             else if(data.indexOf(disconnected_server) != -1)
             {
               console.log(data);
               Toast.fire({
                   type: 'error',
                   title: 'Not Connected to Domain'
                 })
             }
             else
            {
                console.log(data);
                Toast.fire({
                    type: 'error',
                    title: 'An error occured. Please try again'
                  });
            }

        },
        error: function(xhr)
        {
          $.unblockUI();
          Toast.fire({
                    type: 'error',
                    title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }

    });
});
// add dstv payments from modal form_method

$(document).on("submit","#add-ds-payment", function(e){
    e.preventDefault();

    var form_data = $(this).serializeArray();
    var form_url = 'controllers/admin-portal/process-add-ds-payment.php';
    var form_method = 'POST';
    var loader =`<div class="loader text-center"></div>`;

    $('#loader').html(loader);

    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        beforeSend:function()
        {
          $.blockUI({ message: blockui_spinner });
        },
        success:function(data){
            $.unblockUI();
            if(data == 'success')
            {

                  Toast.fire({
                      type: 'success',
                      title: 'DSTV Payment Successfully Recorded'
                    });
                    LoadDynamicNavbar();
                    LoadDsPayment();
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();

                  //   location.reload();

            }
            else if(data == 'failed')
            {
              Toast.fire({
                  type: 'error',
                  title: 'Failed. Please Try Again'
                });
            }
            else
            {
              Toast.fire({
                  type: 'error',
                  title: 'Could not Submit. Please Contact System Administrator'
                });
            }
            console.log(data);
        },
        error: function(xhr)
        {
          $.unblockUI();
          Toast.fire({
                    type: 'error',
                    title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }


    });
});

// add course registration registration

$(document).on("submit","#register-course-form", function(e){
    e.preventDefault();

    var staff_users_id = $('#staff_users_id').val();

    var form_data = $(this).serializeArray();
    var form_url = 'controllers/class_management/process-register-course-form.php';
    var form_method = 'POST';
    var loader =`<div class="loader text-center"></div>`;

    $('#loader').html(loader);

    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        beforeSend:function()
        {
          $.blockUI({ message: blockui_spinner });
        },
        success:function(data){
            $.unblockUI();
            if(data == 'success')
            {
              $('body').removeClass('modal-open');
              $('.modal-backdrop').remove();
              RefreshviewStudent(12379);
                  Toast.fire({
                      type: 'success',
                      title: 'Course Successfully Registered'
                    });
                    LoadDynamicNavbar();

                  //   location.reload();

            }
            else if(data == 'failed')
            {
              Toast.fire({
                  type: 'error',
                  title: 'Failed. Please Try Again'
                });
            }
            else
            {
              Toast.fire({
                  type: 'error',
                  title: 'Could not Submit. Please Contact System Administrator'
                });
            }
            console.log(data);
        },
        error: function(xhr)
        {
          $.unblockUI();
          Toast.fire({
                    type: 'error',
                    title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }


    });
});


//payment tab for finance department

$(document).on("submit","#paymemt-course-form", function(e){
  e.preventDefault();

  var staff_users_id = $('#staff_users_id').val();

  var form_data = $(this).serializeArray();
  var form_url = 'controllers/class_management/process-add-fees-form.php';
  var form_method = 'POST';
  var loader =`<div class="loader text-center"></div>`;

  $('#loader').html(loader);

  $.ajax({
      data : form_data,
      url  : form_url,
      method : form_method,
      beforeSend:function()
      {
        $.blockUI({ message: blockui_spinner });
      },
      success:function(data){
          $.unblockUI();
          if(data == 'success')
          {
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            RefreshviewStudent(12378);
                Toast.fire({
                    type: 'success',
                    title: 'Fees Successfully Registered'
                  });
                  LoadDynamicNavbar();

                //   location.reload();

          }
          else if(data == 'failed')
          {
            Toast.fire({
                type: 'error',
                title: 'Failed. Please Try Again'
              });
          }
          else
          {
            Toast.fire({
                type: 'error',
                title: 'Could not Submit. Please Contact System Administrator'
              });
          }
          console.log(data);
      },
      error: function(xhr)
      {
        $.unblockUI();
        Toast.fire({
                  type: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
          });
      }


  });
});

// add wifi Payments
$(document).on("submit","#add-wifi-payment", function(e){
    e.preventDefault();

    var form_data = $(this).serializeArray();
    var form_url = 'controllers/admin-portal/process-add-wifi-payment.php';
    var form_method = 'POST';
    var loader =`<div class="loader text-center"></div>`;

    $('#loader').html(loader);

    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        beforeSend:function()
        {
          $.blockUI({ message: blockui_spinner });
        },
        success:function(data){
            $.unblockUI();
            if(data == 'success')
            {

                  Toast.fire({
                      type: 'success',
                      title: 'WIFI Payment Successfully Recorded'
                    });
                    LoadDynamicNavbar();
                    LoadDsPayment();
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();

                  //   location.reload();

            }
            else if(data == 'failed')
            {
              Toast.fire({
                  type: 'error',
                  title: 'Failed. Please Try Again'
                });
            }
            else
            {
              Toast.fire({
                  type: 'error',
                  title: 'Could not Submit. Please Contact System Administrator'
                });
            }
            console.log(data);
        },
        error: function(xhr)
        {
          $.unblockUI();
          Toast.fire({
                    type: 'error',
                    title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }


    });
});

// add dstv games records

$(document).on("submit","#add-risk-management-form", function(e){
    e.preventDefault();

    var form_data = $(this).serializeArray();
    var form_url = 'controllers/game-management/process-add-game-management-form.php';
    var form_method = 'POST';
    var loader =`<div class="loader text-center"></div>`;

    $('#loader').html(loader);

    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        beforeSend:function()
        {
          $.blockUI({ message: blockui_spinner });
        },
        success:function(data){
            $.unblockUI();
            if(data == 'success')
            {

                  Toast.fire({
                      type: 'success',
                      title: 'Game Successfully Added'
                    });
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    LoadDynamicNavbar();
                    LoadPsGames();


                  //   location.reload();

            }
            else if(data == 'failed')
            {
              Toast.fire({
                  type: 'error',
                  title: 'Failed. Please Try Again'
                });
            }
            else
            {
              Toast.fire({
                  type: 'error',
                  title: 'Could not Submit. Please Contact System Administrator'
                });
            }
            console.log(data);
        },
        error: function(xhr)
        {
          $.unblockUI();
          Toast.fire({
                    type: 'error',
                    title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }


    });
});


// Ajax calculation

    //END on change event to select risk type
    //start of calculation of risk scores
    $('#games_no').change(function(){
            var likelihood_score = $('#likelihood_score').val();
            var games_no = $('#games_no').val();

            var overall_score = likelihood_score * games_no ;
            $('#overall_score').val(overall_score);


             var likelihood_score3 =parseInt($('#overall_score').val());
            var games_no3 = parseInt($('#overall_score2').val());



            var overall_score3 = parseInt(likelihood_score3 + games_no3) ;
            $('#overall_score3').val(overall_score3);

    });

    // calculation for wifi cost

        $('#ndevices').change(function(){
            var days = $('#deviceNo').val();
            var cost = $('#ndevices').val();

            if(days == 1 || days ==2)
            {
                var bill = 1 * cost;
            $('#tcost').val(bill);


             var total_cost =parseInt($('#tcost').val());
            }
            else
            {
                var bill = 30 * cost ;
            $('#tcost').val(bill);


             var total_cost =parseInt($('#tcost').val());

            }




    });

          $('#tcost').change(function(){
           var days = $('#deviceNo').val();
            var cost = $('#ndevices').val();

                  if(days == 1 || days == 2)
            {
                var bill = 1 * cost;
            $('#tcost').val(bill);


             var total_cost =parseInt($('#tcost').val());
            }
            else
            {
                var bill = 30 * cost ;
            $('#tcost').val(bill);


             var total_cost =parseInt($('#tcost').val());

            }

    });

      // calculation for date difference

        $('#sub_end_date').change(function(){

            var start_date = $('#sub_start_date').val();
            var end_date = $('#sub_end_date').val();

           var date_difference = parseInt(end_date - start_date);


            $('#view_diff').val(date_difference);




    });


      $('#sub_start_date').change(function(){

            var start_date = $('#sub_start_date').val();
            var end_date = $('#sub_end_date').val();

           var date_difference = date_diff(end_date,start_date);


            $('#view_diff').val(date_difference);




    });

   //calculation for play station ps game


                 $('#ps_games_no').change(function(){

              var ps_games_no = parseInt($('#ps_games_no').val());

               var unit_cost = parseInt($('#unit_cost').val());


           var tot_collection = parseInt(ps_games_no * unit_cost);



            $('#ps_total_cost').val(tot_collection);




    });
              $('#game_name').change(function(){
        var ps_games_no = parseInt($('#ps_games_no').val());

               var unit_cost = parseInt($('#unit_cost').val());


           var tot_collection = parseInt(ps_games_no * unit_cost);


            $('#ps_total_cost').val(tot_collection);


    });



      $('#ps_total_cost').change(function(){
        var ps_games_no = parseInt($('#ps_games_no').val());

               var unit_cost = parseInt($('#unit_cost').val());


           var tot_collection = parseInt(ps_games_no * unit_cost);


            $('#ps_total_cost').val(tot_collection);


    });


          $('#record_game').change(function(){

              var ps_games_no = parseInt($('#ps_games_no').val());


           var tot_collection = parseInt(ps_games_no * 20);



            $('#ps_total_cost').val(tot_collection);


    });





      // calculation for half time cost

        $('#ht_score').change(function(){

              var ft_score = parseInt($('#ft_score').val());
            var ft_people = parseInt($('#ft_people').val());


            var ht_score = parseInt($('#ht_score').val());
            var ht_people = parseInt($('#ht_people').val());

            var ht_total = parseInt($('#ht_total').val());

            var ft_total = parseInt($('#ft_total').val());


           var total_cost2 = parseInt(ft_score * ft_people);


           var total_cost1 = parseInt(ht_score * ht_people);


           var tot_collection = parseInt(total_cost1 + total_cost2);


            $('#ht_total').val(total_cost1);
            $('#tot_collection').val(tot_collection);




    });


      $('#ht_people').change(function(){

          var ft_score = parseInt($('#ft_score').val());
            var ft_people = parseInt($('#ft_people').val());


            var ht_score = parseInt($('#ht_score').val());
            var ht_people = parseInt($('#ht_people').val());

            var ht_total = parseInt($('#ht_total').val());

            var ft_total = parseInt($('#ft_total').val());


           var total_cost2 = parseInt(ft_score * ft_people);


           var total_cost1 = parseInt(ht_score * ht_people);


           var tot_collection = parseInt(total_cost1 + total_cost2);
            $('#ht_total').val(total_cost1);
              $('#tot_collection').val(tot_collection);



    });

      $('#ht_people').change(function(){

          var ft_score = parseInt($('#ft_score').val());
            var ft_people = parseInt($('#ft_people').val());


            var ht_score = parseInt($('#ht_score').val());
            var ht_people = parseInt($('#ht_people').val());

            var ht_total = parseInt($('#ht_total').val());

            var ft_total = parseInt($('#ft_total').val());


           var total_cost2 = parseInt(ft_score * ft_people);


           var total_cost1 = parseInt(ht_score * ht_people);


           var tot_collection = parseInt(total_cost1 + total_cost2);
            $('#ht_total').val(total_cost1);
              $('#tot_collection').val(tot_collection);



    });


          // calculation for full time cost

        $('#ft_score').change(function(){


          var ft_score = parseInt($('#ft_score').val());
            var ft_people = parseInt($('#ft_people').val());


            var ht_score = parseInt($('#ht_score').val());
            var ht_people = parseInt($('#ht_people').val());

            var ht_total = parseInt($('#ht_total').val());

            var ft_total = parseInt($('#ft_total').val());


           var total_cost2 = parseInt(ft_score * ft_people);


           var total_cost1 = parseInt(ht_score * ht_people);


           var tot_collection = parseInt(total_cost1 + total_cost2);



            $('#ft_total').val(total_cost2);
            $('#tot_collection').val(tot_collection);

    });


      $('#ft_people').change(function(){

          var ft_score = parseInt($('#ft_score').val());
            var ft_people = parseInt($('#ft_people').val());


            var ht_score = parseInt($('#ht_score').val());
            var ht_people = parseInt($('#ht_people').val());

            var ht_total = parseInt($('#ht_total').val());

            var ft_total = parseInt($('#ft_total').val());


           var total_cost2 = parseInt(ft_score * ft_people);


           var total_cost1 = parseInt(ht_score * ht_people);


           var tot_collection = parseInt(total_cost1 + total_cost2);



            $('#ft_total').val(total_cost2);
            $('#tot_collection').val(tot_collection);



    });


      $('#tot_collection').change(function(){
           var ft_score = parseInt($('#ft_score').val());
            var ft_people = parseInt($('#ft_people').val());


            var ht_score = parseInt($('#ht_score').val());
            var ht_people = parseInt($('#ht_people').val());

            var ht_total = parseInt($('#ht_total').val());

            var ft_total = parseInt($('#ft_total').val());


           var total_cost2 = parseInt(ft_score * ft_people);


           var total_cost1 = parseInt(ht_score * ht_people);


           var tot_collection = parseInt(total_cost1 + total_cost2);



            $('#ft_total').val(total_cost2);
            $('#tot_collection').val(tot_collection);

    });

          $('#bill').change(function(){
            var days = $('#days').val();
            var cost = 30;

            var bill = days * cost ;
            $('#bill').val(bill);


             var total_cost =parseInt($('#bill').val());


    });

    // calculation for fees balance

    $('#amt_cost').change(function(){

 var total_amount = parseInt($('#total_amount').val());

  var amt_cost = parseInt($('#amt_cost').val());


var tot_fee_bal = parseInt(total_amount - amt_cost);

$('#fees_bal').val(tot_fee_bal);

});

     $('#games_no2').change(function(){
            var likelihood_score = $('#likelihood_score2').val();
            var games_no = $('#games_no2').val();

            var overall_score = likelihood_score * games_no ;
            $('#overall_score2').val(overall_score);


             var likelihood_score3 =parseInt($('#overall_score').val());
            var games_no3 = parseInt($('#overall_score2').val());



            var overall_score3 = parseInt(likelihood_score3 + games_no3) ;
            $('#overall_score3').val(overall_score3);



    });


$(document).on("submit", "#test-login-form", function(e){
    e.preventDefault();

    var process_url = 'controllers/auth/TestLoginController.php';
    var form_data = $('#test-login-form').serializeArray();
    var form_method = 'POST';


    $.ajax({
        url:process_url,
        data:form_data,
        method:form_method,
        beforeSend:function(){
            $.blockUI({ message: blockui_spinner });
        },
        success: function(data){
            $.unblockUI();
            if(data == "success")
            {
              location.reload();
                //fetch dynamic navbar
                $.ajax({
                  url: dynamic_navbar_url,
                  method:"POST",
                  success: function(returned_navbar_data){
                    $('#dynamic-navbar').html(returned_navbar_data);
                    console.log(returned_navbar_data);
                  },
                  error: function(){
                    $('#dynamic-navbar').html('please reload page');
                  }
                });
            }
            else if(data == "invalid")
            {
            console.log(data);
            Toast.fire({
                type: 'error',
                title: 'Invalid Credentials'
              });
            }
            else
            {
                console.log(data);
                Toast.fire({
                    type: 'error',
                    title: 'An error occured. Please try again'
                  });
            }

        },
        error: function(xhr)
        {
          $.unblockUI();
          Toast.fire({
                    type: 'error',
                    title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }

    });
});

//END LOGIN FORM

//START RISK MANAGEMENT


//START ADD opportunity management form
$(document).on("submit","#add-opportunity-management-form", function(e){
    e.preventDefault();

    var dep_code = $('#department_code_opp').val();

    var form_data = $(this).serializeArray();
    var form_url = 'controllers/risk-management/process-add-risk-management-form.php';
    var form_method = 'POST';
    var loader =`<div class="loader text-center"></div>`;
    var risk_opportunity = $('#risk_opportunity_opp').val();
    $('#loader').html(loader);

    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        beforeSend:function()
        {
          $.blockUI({ message: blockui_spinner });
        },
        success:function(data){
            $.unblockUI();
            if(data == 'success')
            {
              $('body').removeClass('modal-open');
              $('.modal-backdrop').remove();
              SelectDepartmentRisk(dep_code);
                  Toast.fire({
                      type: 'success',
                      title: 'Opportunity Successfully Added'
                    });
                    LoadDynamicNavbar();

                    $.ajax({
                          data : $('#add-opportunity-management-form').serializeArray(),
                          type: "post",
                          url: "controllers/risk-management/process-send-mail-add-risk-management.php",
                          success: function (mail_data) {
                              console.log(mail_data);
                          }
                      });

            }
            else if(data == 'failed')
            {
              Toast.fire({
                  type: 'error',
                  title: 'Failed. Please Try Again'
                });
            }
            else
            {
              Toast.fire({
                  type: 'error',
                  title: 'Could not Submit. Please Contact System Administrator'
                });
            }
            console.log(data);
        },
        error: function(xhr)
        {
          $.unblockUI();
          Toast.fire({
                    type: 'error',
                    title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }


    });
});

//END ADD opportunity management form


//start update quarterly risk form
$(document).on("submit","#update-status-risk-management-form", function(e){
    e.preventDefault();

    var form_data =  $(this).serializeArray();
    var form_url = 'controllers/risk-management/process-update-risk-risk-management-form.php';
    var form_method = 'POST';
    var dep_code = $('#dep_code').val();

    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        beforeSend: function()
        {
            $.blockUI({ message: blockui_spinner });
        },
        success:function(data){
          $.unblockUI();
            if(data == 'success')
            {
              $('body').removeClass('modal-open');
              $('.modal-backdrop').remove();
              SelectDepartmentRisk(dep_code);
                  Toast.fire({
                      type: 'success',
                      title: 'Updated Successfully'
                    });
                    LoadDynamicNavbar();

                  $.ajax({
                     data: $('#update-status-risk-management-form').serializeArray(),
                      type: "post",
                      url: "controllers/risk-management/process-send-mail-update-risk-management.php",
                      success: function (data) {
                          console.log(data);
                      }
                  });
            }
            else if(data == 'failed')
            {
              Toast.fire({
                  type: 'error',
                  title: 'Failed to Update. Please Try Again'
                });
            }
            else if(data == 'duplicate')
            {

              swalWithBootstrapButtons.fire({
                title: 'This Quarterly Update for this period has already been submitted',
                text: "Is this a re-submission?",
                type: 'question',
                showCancelButton: true,
                confirmButtonText: 'YES, CONTINUE',
                cancelButtonText: 'NO, CANCEL!',
                reverseButtons: true
              }).then((result) => {
                if (result.value) {

                  $.ajax({
                      data : form_data,
                      url  : "controllers/risk-management/process-edit-update-risk-risk-management-form.php",
                      method : form_method,
                      success:function(data)
                      {
                        if(data == "success")
                        {
                          SelectDepartmentRisk(dep_code);
                          swalWithBootstrapButtons.fire(
                            'RESUBMITTED',
                            'This Quarterly Update has successfully been resubmitted',
                            'success'
                          );
                          LoadDynamicNavbar();

                            $.ajax({
                                data: $('#update-status-risk-management-form').serializeArray(),
                                type: "post",
                                url: "controllers/risk-management/process-send-mail-update-risk-management.php",
                                success: function (mail_data) {
                                           console.log(mail_data);
                                       }
                                   });
                           }
                           else
                           {
                             swalWithBootstrapButtons.fire(
                               'FAILED',
                               'Failed to resubmit. Please Try again',
                               'success'
                             );

                           }
                        }

                    });
                } else if (
                  /* Read more about handling dismissals below */
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'The resubmission has been cancelled :)',
                    'error'
                  );
                }
              });

            }
            else
            {
              swalWithBootstrapButtons.fire(
                'FAILED',
                'Failed to update. Please Try again',
                'error'
              );
            }
            console.log(data);
        },
        error: function(xhr)
        {
          $.unblockUI();
          Toast.fire({
                    type: 'error',
                    title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }

    });
});

//end update quarterly form


//start edit risk management form
$(document).on("submit","#edit-risk-management-form", function(e){
    e.preventDefault();

    var form_data = $(this).serializeArray();
    var form_url = 'controllers/risk-management/process-edit-risk-management-form.php';
    var form_method = 'POST';
    var dep_code = $('#department_code').val();

    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        beforeSend: function()
        {
          $.blockUI({ message: blockui_spinner });
        },
        success:function(data){
            $.unblockUI();
            if(data == 'success')
            {
              $('body').removeClass('modal-open');
              $('.modal-backdrop').remove();
              SelectDepartmentRisk(dep_code);

              Toast.fire({
                  type: 'success',
                  title: 'Successfully Modified'
                });
                LoadDynamicNavbar();

                  $.ajax({
                      data: $('#edit-risk-management-form').serializeArray(),
                      type: "post",
                      url: "controllers/risk-management/process-send-mail-edit-risk-management.php",
                      success: function (data) {
                          console.log(data);
                      }
                  });
            }
            else if(data == 'failed')
            {
              Toast.fire({
                  type: 'error',
                  title: 'Failed. Please Try Again'
                });
            }
            else
            {
              Toast.fire({
                  type: 'error',
                  title: 'Failed. An Error occured.Please contact System Administrator'
                });
            }
            console.log(data);
        },
        error: function(xhr)
        {
          $.unblockUI();
          Toast.fire({
                    type: 'error',
                    title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }

    });
});

//END EDIT risk management form

//start copy risk to other department
$(document).on("submit","#copy-risk-form", function(e){
  e.preventDefault();

  var form_data = $(this).serializeArray();
  var form_url = 'controllers/risk-management/copy-to-other-departments.php';
  var form_method = 'POST';



  $.ajax({
      data : form_data,
      url  : form_url,
      method : form_method,
      beforeSend: function()
      {
        $.blockUI({ message: blockui_spinner });
      },
      success:function(data){
        $.unblockUI();
          if(data == 'success')
          {
            Toast.fire({
                type: 'success',
                title: 'Successfully Copied!'
              });

              $.ajax({
                  data : $('#copy-risk-form').serializeArray(),
                  type: "post",
                  url: "controllers/risk-management/process-send-mail-copy.php",
                  success: function (data) {
                      console.log(data);
                  }
              });
          }
          else if(data == 'duplicate')
          {
            Toast.fire({
                type: 'warning',
                title: 'Not Copied, This risk already exists in the department you are copying to!'
              });
          }
          else
          {
            Toast.fire({
                type: 'error',
                title: 'Not Copied. An error occured. Please try again!'
              });
          }
      },
        error: function(xhr)
        {
          $.unblockUI();
          Toast.fire({
                    type: 'error',
                    title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }

  });
});

//end copy risk to other department

//start close risk
$(document).on("submit","#close-risk-form", function(e){
    e.preventDefault();

    Swal.fire({
        title: 'Retire Risk?',
        text: "Once you confirm, this risk will no longer appear on the risk register. Are you sure to proceed?",
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'YES, RETIRE',
        cancelButtonText: 'NO, KEEP!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {

          var form_data = $('#close-risk-form').serializeArray();
          var form_url = 'controllers/risk-management/process-delete-risk-management.php';
          var form_method = 'POST';
          var dep_code = $('#dep').val();

          $.ajax({
              data : form_data,
              url  : form_url,
              method : form_method,
              beforeSend:function()
              {
                $.blockUI({ message: blockui_spinner });
              },
              success:function(data){
                {
                  $.unblockUI();
                }
                if(data == "success")
                {
                  Swal.fire(
                    'RETIRED',
                    'Successfully Retired',
                    'success'
                  );
                  SelectDepartmentRisk(dep_code);

                  $.ajax({
                      data : $('#close-risk-form').serializeArray(),
                      type: "post",
                      url: "controllers/risk-management/process-send-mail-close-open-risk.php",
                      success: function (data) {
                          console.log(data);
                      }
                  });
                }
                else
                {
                  Swal.fire(
                    'NOT RETIRED',
                    'Failed to Close. Please try again',
                    'error'
                  );
                }
              },
              error: function(xhr)
              {
                $.unblockUI();
                Toast.fire({
                          type: 'error',
                          title: 'Your request could not be completed. Please try again: '+xhr.status
                  });
              }

          });

        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          Swal.fire(
            'Cancelled',
            'Not Retired',
            'error'
          );
        }
      });

});
//end of close risk

//start of open risk form]
$(document).on("submit","#open-risk-form", function(e){
    e.preventDefault();

    swalWithBootstrapButtons.fire({
        title: 'Open Risk?',
        text: "Once you confirm, this risk will appear on the risk register. Are you sure to proceed?",
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'YES, OPEN',
        cancelButtonText: 'NO, KEEP!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {

          var form_data = $('#open-risk-form').serializeArray();
          var form_url = 'controllers/risk-management/process-delete-risk-management.php';
          var form_method = 'POST';
          var dep_code = $('#dep').val();

          $.ajax({
              data : form_data,
              url  : form_url,
              method : form_method,
              beforeSend:function()
              {
                $.blockUI({ message: blockui_spinner });
              },
              success:function(data){
                {
                  $.unblockUI();
                }
                if(data == "success")
                {
                  swalWithBootstrapButtons.fire(
                    'OPENED',
                    'Successfully Opened',
                    'success'
                  );
                  SelectDepartmentRisk(dep_code);

                  $.ajax({
                      data : $('#open-risk-form').serializeArray(),
                      type: "post",
                      url: "controllers/risk-management/process-send-mail-close-open-risk.php",
                      success: function (data) {
                          console.log(data);
                      }
                  });
                }
                else
                {
                  swalWithBootstrapButtons.fire(
                    'NOT OPENED',
                    'Failed to Open. Please try again',
                    'error'
                  );
                }
              },
              error: function(xhr)
              {
                $.unblockUI();
                Toast.fire({
                          type: 'error',
                          title: 'Your request could not be completed. Please try again: '+xhr.status
                  });
              }

          });

        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Not Opened',
            'error'
          );
        }
      });

});

//end of open risk

//start approvals and rejection for quarterly update
//start approve risk
function approveRisk(str){
      var id = str;
      var quarterly_person_responsible = $('#quarterly_person_responsible-'+str).val();
      var quarterly_approval_value = $('#quarterly_approval_value-'+str).val();
      var risk_description =$('#risk_description-'+str).val();
      var reference_no =$('#reference_no-'+str).val();
      var risk_or_opportunity_notification = $('#risk_or_opportunity_notification-'+str).val();
      var approve_quarterly_button = $('#approve-quarterly-button-'+str);
      var row = $('#row-'+str);

      var form_data = {
        quarterly_approval_value: quarterly_approval_value,
        id:id,
        risk_description: risk_description,
        reference_no: reference_no,
        risk_or_opportunity_notification:risk_or_opportunity_notification,
        quarterly_person_responsible: quarterly_person_responsible
      };

      var newForm = $('#approve-quarterly-update-form-'+str);

      $(newForm).submit(function(e){
         e.preventDefault();
      });
      $.ajax({
         type: "POST",
         url :"controllers/risk-management/process-approve-quarterly-update-form.php",
         data: form_data,
         beforeSend:function()
         {
           $.blockUI({ message: blockui_spinner });
         },
         success:function(data)
         {
           $.unblockUI();
           if(data == 'success')
           {
             Toast.fire({
                 type: 'success',
                 title: 'Approved Successfully'
               });
             $('.pending_approval_quarterly_updates_tab').click();
             LoadDynamicNavbar();


             $.ajax({
                 data: form_data,
                 type: "post",
                 url: "controllers/risk-management/process-send-mail-approve-update-risk-management.php",
                 success: function (data) {
                     console.log(data);
                 }
             });
           }
           else
           {
             Toast.fire({
                 type: 'error',
                 title: 'Failed. Please try again'
               });
           }
         },
          error: function(xhr)
          {
            $.unblockUI();
            Toast.fire({
                      type: 'error',
                      title: 'Your request could not be completed. Please try again: '+xhr.status
              });
          }

      });
}

//end approve risk

//start reject risk
function rejectRisk(str){
      var id = str;
      var quarterly_person_responsible = $('#quarterly_person_responsible-reject-'+str).val();
      var quarterly_approval_value = $('#quarterly_approval_value_reject-'+str).val();
      var risk_description =$('#risk_description_reject-'+str).val();
      var reference_no =$('#reference_no_reject-'+str).val();
      var risk_or_opportunity_notification = $('#risk_or_opportunity_notification_reject-'+str).val();
      var reject_quarterly_button = $('#reject-quarterly-button-'+str);
      var row = $('#row-'+str);
      var newForm = $('#reject-quarterly-update-form-'+str);

      var form_data = {
        quarterly_approval_value: quarterly_approval_value,
        id:id,
        risk_description: risk_description,
        reference_no: reference_no,
        risk_or_opportunity_notification:risk_or_opportunity_notification,
        quarterly_person_responsible: quarterly_person_responsible
      };

      $(newForm).submit(function(e){
         e.preventDefault();
      });
      $.ajax({
         type: "POST",
         url :"controllers/risk-management/process-approve-quarterly-update-form.php",
         data: form_data,
         beforeSend:function()
         {
           $.blockUI({ message: blockui_spinner });
         },
         success:function(data)
         {
           $.unblockUI();
           if(data == 'success')
           {

             Toast.fire({
                 type: 'success',
                 title: 'Rejected Successfully'
               });
               $('.pending_approval_quarterly_updates_tab').click();
               LoadDynamicNavbar();

             $.ajax({
                 data: form_data,
                 type: "post",
                 url: "controllers/risk-management/process-send-mail-approve-update-risk-management.php",
                 success: function (data) {
                     console.log(data);
                 }
             });
           }
           else
           {
             Toast.fire({
                 type: 'error',
                 title: 'Failed. Please try again'
               });
           }
         },
          error: function(xhr)
          {
            $.unblockUI();
            Toast.fire({
                      type: 'error',
                      title: 'Your request could not be completed. Please try again: '+xhr.status
              });
          }
      });
}

//end reject risk
//end approvals and rejection for quarterly update

//start approvals and rejection for new/edited risk
//start new / edited risk from register
function approveNewRisk(str){
      var id = str;
      var new_person_responsible = $('#new_person_responsible-'+str).val();
      var new_approval_value = $('#new_approval_value-'+str).val();
      var new_risk_description =$('#new_risk_description-'+str).val();
      var new_reference_no =$('#new_reference_no-'+str).val();
      var new_risk_or_opportunity_notification = $('#new_risk_or_opportunity_notification-'+str).val();
      var approve_new_risk_button = $('#approve-new-risk-button-'+str);
      var row = $('#new_row-'+str);

      var newForm = $('#approve-new-risk-form-'+str);

      var form_data = {
        new_approval_value:new_approval_value,
        id:id,
        new_risk_description:new_risk_description,
        new_reference_no:new_reference_no,
        new_risk_or_opportunity_notification:new_risk_or_opportunity_notification,
        new_person_responsible:new_person_responsible
      };

      $(newForm).submit(function(e){
         e.preventDefault();
      });
      $.ajax({
         type: "POST",
         url :"controllers/risk-management/process-approve-new-risk-form.php",
         data: form_data,
         beforeSend:function()
         {
           $.blockUI({ message: blockui_spinner });
         },
         success:function(data)
         {
           $.unblockUI();
           if(data == 'success')
           {
             Toast.fire({
                 type: 'success',
                 title: 'Approved Successfully'
               });
               $('.pending_approval_new_edited_tab').click();
               LoadDynamicNavbar();
             //send mail
             $.ajax({
                 data :form_data,
                 type: "post",
                 url: "controllers/risk-management/process-send-mail-approve-new-edited-risk.php",
                 success: function (data) {
                     console.log(data);
                 }
             });
           }
           else
           {
             Toast.fire({
                 type: 'error',
                 title: 'Failed. Please try again'
               });
           }
           console.log(data);
         },
          error: function(xhr)
          {
            $.unblockUI();
            Toast.fire({
                      type: 'error',
                      title: 'Your request could not be completed. Please try again: '+xhr.status
              });
          }
      });
}

function rejectNewRisk(str){
      var id = str;
      var new_person_responsible = $('#new_person_responsible-reject-'+str).val();
      var new_approval_value = $('#new_approval_value_reject-'+str).val();
      var new_risk_description =$('#new_risk_description_reject-'+str).val();
      var new_reference_no =$('#new_reference_no_reject-'+str).val();
      var new_risk_or_opportunity_notification = $('#new_risk_or_opportunity_notification_reject-'+str).val();
      var reject_new_risk_button = $('#reject-new-risk-button-'+str);
      var row = $('#new_row-'+str);

      var newForm = $('#reject-new-risk-form-'+str);

      var form_data = {
        new_approval_value:new_approval_value,
        id:id,
        new_risk_description:new_risk_description,
        new_reference_no:new_reference_no,
        new_risk_or_opportunity_notification:new_risk_or_opportunity_notification,
        new_person_responsible:new_person_responsible
      };

      $(newForm).submit(function(e){
         e.preventDefault();
      });
      $.ajax({
         type: "POST",
         url :"controllers/risk-management/process-approve-new-risk-form.php",
         data: form_data,
         beforeSend:function()
         {
           $.blockUI({ message: blockui_spinner });
         },
         success:function(data)
         {
           $.unblockUI();
           if(data == 'success')
           {
             Toast.fire({
                 type: 'success',
                 title: 'Rejected Successfully'
               });
               $('.pending_approval_new_edited_tab').click();
               LoadDynamicNavbar();
             //send mail
             $.ajax({
                 data: form_data,
                 type: "post",
                 url: "controllers/risk-management/process-send-mail-approve-new-edited-risk.php",
                 success: function (data) {
                     console.log(data);
                 }
             });
           }
           else
           {
             Toast.fire({
                 type: 'error',
                 title: 'Failed. Please try again'
               });
           }
         },
          error: function(xhr)
          {
            $.unblockUI();
            Toast.fire({
                      type: 'error',
                      title: 'Your request could not be completed. Please try again: '+xhr.status
              });
          }
      });
}

//end approvals and rejection for new/edited risk

//start hod approval amendments
$(document).on("blur","td[contenteditable=true]", function(e){
  var message_status = $(".status");
  var field_userid = $(this).attr("id") ;
  var value = $(this).text() ;
  $.post('controllers/risk-management/ajax.php' , field_userid + "=" + value, function(data){
      if(data != '')
      {
          message_status.show();
          message_status.text(data);
          //hide the message
          //setTimeout(function(){message_status.hide()},3000);
          console.log(data);
      }
  });
});
// start update likelihood score
function updateLikelihoodscore(str){
      var id = str;
      var likelihood_score = $('#likelihood_score-'+str).val();
      var score_id = $('#score_id-'+str).val();
      var newForm = $('#update-scores-form-'+str);

      $(newForm).submit(function(e){
         e.preventDefault();
      });
      $.ajax({
         type: "POST",
         url :"controllers/risk-management/update-scores.php",
         data: "likelihood_score="+likelihood_score+"&id="+id+"&score_id="+score_id,
         //success: alert("hey"),
         success:function(data){
        if(data == 'success')
           {
             $('#feedback').html("updated");
           }
         if(data == 'failed')
         {
             $('#feedback').html('please try again');
         }
         else
         {
             $('#loader').html('');
             $('#feedback').html(data);
         }
         console.log(data);
         },
          error: function(xhr)
          {
            $.unblockUI();
            Toast.fire({
                      type: 'error',
                      title: 'Your request could not be completed. Please try again: '+xhr.status
              });
          }



      });
}
//end update likelihood score

// start update impact score
function updateImpactscore(str){
      var id = str;
      var impact_score = $('#impact_score-'+str).val();
      var newForm = $('#update-scores-form-impact-'+str);

      $(newForm).submit(function(e){
         e.preventDefault();
      });
      $.ajax({
         type: "POST",
         url :"controllers/risk-management/update-scores-impact.php",
         data: "impact_score="+impact_score+"&id="+id,
         //success: alert("hey"),
         success:function(data){
        if(data == 'success')
           {
             $('.feedback').html("updated");
           }
         if(data == 'failed')
         {
             $('.feedback').html('please try again');
         }
         else
         {
             $('#loader').html('');
             $('.feedback').html(data);
         }
         console.log(data);
         },
          error: function(xhr)
          {
            $.unblockUI();
            Toast.fire({
                      type: 'error',
                      title: 'Your request could not be completed. Please try again: '+xhr.status
              });
          }
      });
}
//end update impact score

// start submit new edited approval comments
function submitNewEditedApprovalComments(str){
      var id = str;
      var comments = $('#comments-'+str).val();
      var reference_no_for_risk = $('#reference_no_for_risk-'+str).val();
      var submit_new_comments_button = $('#submit-new-comments-button-'+str);
      var newForm = $('#approve-quarterly-updates-form-'+str);

      $(newForm).submit(function(e){
         e.preventDefault();
      });
      $.ajax({
         type: "POST",
         url :"controllers/risk-management/process-submit-new-edited-approvals.php",
         data: "comments="+comments+"&id="+id+"&reference_no_for_risk="+reference_no_for_risk,
         beforeSend:function()
         {
           $(submit_new_comments_button).prop("disabled",true);
           $(submit_new_comments_button).html(" <i class='fa fa-spinner fa-spin'></i> sending...");
         },
         success:function(data){
        if(data == 'success')
           {
             $(submit_new_comments_button).prop("disabled",false);
             $(submit_new_comments_button).html("Sent");
           }
         if(data == 'failed')
         {
           $(submit_new_comments_button).prop("disabled",false);
           $(submit_new_comments_button).html("Try again");
         }
         else
         {
           $(submit_new_comments_button).prop("disabled",false);
           $(submit_new_comments_button).html("Sent.");
         }
         console.log(data);
         },
          error: function(xhr)
          {
            $.unblockUI();
            Toast.fire({
                      type: 'error',
                      title: 'Your request could not be completed. Please try again: '+xhr.status
              });
          }
      });
}
//end submit new edited approval comments

// start submit quarterly approval comments
function submitQuarterlyApprovalComments(str){
      var id = str;
      var comments = $('#comments-quarterly-'+str).val();
      var reference_no_for_risk = $('#reference_no_for_risk-quarterly-'+str).val();
      var submit_quarterly_comments_button = $('#submit-quarterly-comments-button-'+str);
      var newForm = $('#approve-quarterly-updates-form-quarterly-'+str);

      $(newForm).submit(function(e){
         e.preventDefault();
      });
      $.ajax({
         type: "POST",
         url :"controllers/risk-management/process-submit-quarterly-approvals.php",
         data: "comments="+comments+"&id="+id+"&reference_no_for_risk="+reference_no_for_risk,
         beforeSend:function()
         {
           $(submit_quarterly_comments_button).prop("disabled",true);
           $(submit_quarterly_comments_button).html(" <i class='fa fa-spinner fa-spin'></i> sending...");
         },
         success:function(data){
        if(data == 'success')
           {
             $(submit_quarterly_comments_button).prop("disabled",false);
             $(submit_quarterly_comments_button).html("Sent");
             LoadDynamicNavbar();
           }
         if(data == 'failed')
         {
           $(submit_quarterly_comments_button).prop("disabled",false);
           $(submit_quarterly_comments_button).html("Try again");
         }
         else
         {
           $(submit_quarterly_comments_button).prop("disabled",false);
           $(submit_quarterly_comments_button).html("Sent.");
         }
         console.log(data);
         },
          error: function(xhr)
          {
            $.unblockUI();
            Toast.fire({
                      type: 'error',
                      title: 'Your request could not be completed. Please try again: '+xhr.status
              });
          }
      });
}
//end submit quarterly approval comments

// start update likelihood score for quarterly
function updateLikelihoodscoreQuarterly(str){
      var id = str;
      var likelihood_score = $('#likelihood_score_quarterly-'+str).val();
      var newForm = $('#update-scores-form-likelihood-quarterly-'+str);
      var feedback_id = $('#feedback-likelihood-quarterly-'+str);

      $(newForm).submit(function(e){
         e.preventDefault();
      });
      $.ajax({
         type: "POST",
         url :"controllers/risk-management/update-scores-likelihood-quarterly.php",
         data: "likelihood_score_quarterly="+likelihood_score+"&id="+id,
         //success: alert("hey"),
         success:function(data){
        if(data == 'success')
           {
             $(feedback_id).html("updated");
           }
         if(data == 'failed')
         {
             $(feedback_id).html('please try again');
         }
         else
         {
             $(feedback_id).html(data);
         }
         console.log(data);
         },
          error: function(xhr)
          {
            $.unblockUI();
            Toast.fire({
                      type: 'error',
                      title: 'Your request could not be completed. Please try again: '+xhr.status
              });
          }



      });
}
//end update likelihood score for quarterly

// start update impact score for quarterly
function updateImpactscoreQuarterly(str){
      var id = str;
      var likelihood_score = $('#impact_score_quarterly-'+str).val();
      var newForm = $('#update-scores-form-impact-quarterly-'+str);
      var feedback_id = $('#feedback-impact-quarterly-'+str);

      $(newForm).submit(function(e){
         e.preventDefault();
      });
      $.ajax({
         type: "POST",
         url :"controllers/risk-management/update-scores-impact-quarterly.php",
         data: "impact_score_quarterly="+likelihood_score+"&id="+id,
         //success: alert("hey"),
         success:function(data){
        if(data == 'success')
           {
             $(feedback_id).html("updated");
           }
         if(data == 'failed')
         {
             $(feedback_id).html('please try again');
         }
         else
         {
             $(feedback_id).html(data);
         }
         console.log(data);
         },
          error: function(xhr)
          {
            $.unblockUI();
            Toast.fire({
                      type: 'error',
                      title: 'Your request could not be completed. Please try again: '+xhr.status
              });
          }



      });
}
//end update impact score for quarterly
//end hod approval ammendsmens

//start delegation
$(document).on("submit","#add-delegation-form", function(e){
    e.preventDefault();

    var form_data = $(this).serializeArray();
    var form_url = 'controllers/risk-management/process-add-delegation.php';
    var form_method = 'POST';

    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        beforeSend:function()
        {
        $.blockUI({ message: blockui_spinner });
        },
        success:function(data){
          $.unblockUI();
            if(data == 'success')
            {
              Toast.fire({
                  type: 'success',
                  title: 'Delegation Successfully Made'
                });
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                $('.delegate-approvals-link').click();

                $.ajax({
                    data: form_data,
                    type: "post",
                    url: "controllers/risk-management/process-send-add-delegation.php",
                    success: function (data) {
                        console.log(data);
                    }
                });
            }
            else if(data == 'failed')
            {
              Toast.fire({
                  type: 'error',
                  title: 'Failed. Please try again'
                });
            }
            else
            {
              Toast.fire({
                  type: 'error',
                  title: 'Failed. Please contact System Administrator'
                });
            }
            console.log(data);
        },
          error: function(xhr)
          {
            $.unblockUI();
            Toast.fire({
                      type: 'error',
                      title: 'Your request could not be completed. Please try again: '+xhr.status
              });
          }

    });
});

//UPDATE DELEGATION STATUS
function deactivateDelegation(id) {

  var form_data = {
    sid:id
  };

  var form_url = 'controllers/risk-management/process-change-delegation-status.php';
  var form_method = 'POST';

  $.ajax({
      data : form_data,
      url  : form_url,
      method : form_method,
      beforeSend:function()
      {
      $.blockUI({ message: blockui_spinner });
      },
      success:function(data){
        $.unblockUI();
          if(data == 'success')
          {
            Toast.fire({
                type: 'success',
                title: 'Delegation Successfully Deactivated'
              });
              $('.delegate-approvals-link').click();
          }
          else if(data == 'failed')
          {
            Toast.fire({
                type: 'error',
                title: 'Failed. Please try again'
              });
          }
          else
          {
            Toast.fire({
                type: 'error',
                title: 'Failed. Please contact System Administrator'
              });
          }
          console.log(data);
      },
      error: function(xhr)
      {
        $.unblockUI();
          Toast.fire({
            type: 'error',
            title: 'Your request could not be completed. Please try again: '+xhr.status
          });
      }

  });
}
//end delegation

//start add emerging trends
$(document).on("submit","#add-emerging-trends-form", function(e){
    e.preventDefault();

    var form_data = $(this).serializeArray();
    var form_url = 'controllers/risk-management/process-add-emerging-trends-form.php';
    var form_method = 'POST';

    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        beforeSend: function(){
          $.blockUI({ message: blockui_spinner });
        },

        success:function(data){
          $.unblockUI();
            if(data == 'success')
            {
              Toast.fire({
                  type: 'success',
                  title: 'Emerging Trend Successfully Added'
                });
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                $('.emerging-trends-link').click();
            }
            else if(data == 'failed')
            {
              Toast.fire({
                  type: 'error',
                  title: 'Failed. An please try again'
                });
            }
            else
            {
              Toast.fire({
                  type: 'error',
                  title: 'Failed. Please contact System Administrator'
                });
            }
            console.log(data);
        },
        error: function(xhr)
        {
          $.unblockUI();
            Toast.fire({
              type: 'error',
              title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }

    });
});
//end add emerging trends

//start edit emerging trends
function updateEmergingtrends(str){
      var id = str;
      var period = $('#edit_period-'+str).val();
      var quarter = $('#edit_quarter-'+str).val();
      var factor = $('#edit_factor-'+str).val();
      var external_internal = $('#edit_external_internal-'+str).val();
      var related_risk_event = $('#edit_related_risk_event-'+str).val();
      var changes_in_risk_profile = $('#edit_changes_in_risk_profile-'+str).val();
      var newForm = $('#edit-emerging-trends-form-'+str);

      $(newForm).submit(function(e){
         e.preventDefault();
      });
      $.ajax({
         type: "POST",
         url :"controllers/risk-management/process-edit-emerging-trends.php",
         data: "edit_period="+period+"&id="+id+"&edit_quarter="+quarter+"&edit_factor="+factor+"&edit_external_internal="+external_internal+"&edit_related_risk_event="+related_risk_event+"&edit_changes_in_risk_profile="+changes_in_risk_profile,
         beforeSend: function()
         {
           $.blockUI({ message: blockui_spinner });
         },
         success:function(data)
         {
           $.unblockUI();
           if(data == 'success')
           {
             Toast.fire({
                 type: 'success',
                 title: 'Emerging Trend Successfully Modified'
               });
               $('body').removeClass('modal-open');
               $('.modal-backdrop').remove();
               $('.emerging-trends-link').click();
           }
           else
           {
             Toast.fire({
                 type: 'error',
                 title: 'Failed. Please try again'
               });
           }
         },
          error: function(xhr)
          {
            $.unblockUI();
              Toast.fire({
                type: 'error',
                title: 'Your request could not be completed. Please try again: '+xhr.status
              });
          }



      });
}

//end edit emerging trends

//start delete emerging strend
function deleteEmergingtrends(id) {

  Swal.fire({
      title: 'DELETE ?',
      text: "This action is irriversible. Are you sure to proceed?",
      type: 'question',
      showCancelButton: true,
      confirmButtonText: 'YES, DELETE',
      cancelButtonText: 'NO, KEEP!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {

        var form_data = {
          sid:id
        };
        var form_url = 'controllers/risk-management/process-delete-emerging-trends.php';
        var form_method = 'POST';

        $.ajax({
            data : form_data,
            url  : form_url,
            method : form_method,
            beforeSend:function()
            {
              $.blockUI({ message: blockui_spinner });
            },
            success:function(data){
              {
                $.unblockUI();
              }
              if(data == "success")
              {
                Swal.fire(
                  'DELETED',
                  'Emerging Trend Deleted Successfully',
                  'success'
                );
                $('.emerging-trends-link').click();

              }
              else
              {
                Swal.fire(
                  'NOT DELETED',
                  'Failed to Delete. Please try again',
                  'error'
                );
              }
            },
            error: function(xhr)
            {
              $.unblockUI();
                Toast.fire({
                  type: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
                });
            }

        });

      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        Swal.fire(
          'Cancelled',
          'Not Deleted',
          'error'
        );
      }
  });
}

//end delete merging trend

//start lessons learnt
//start strategies that worked well
$(document).on("submit","#add-strategies-that-worked-well-form", function(e){
    e.preventDefault();

    var form_data = $(this).serializeArray();
    var form_url = 'controllers/risk-management/process-add-lessons-learnt-form.php';
    var form_method = 'POST';

    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        beforeSend: function()
        {
          $.blockUI({ message: blockui_spinner });
        },
        success:function(data){
          $.unblockUI();
            if(data == 'success')
            {
              Toast.fire({
                 type: 'success',
                 title: 'Added Successfully'
               });
               $('body').removeClass('modal-open');
               $('.modal-backdrop').remove();
               $('.strategies_that_worked_well_tab').click();
            }
            else
            {
              Toast.fire({
                 type: 'error',
                 title: 'Failed. Please try again'
               });
            }
            console.log(data);
        },
        error: function(xhr)
        {
          $.unblockUI();
            Toast.fire({
              type: 'error',
              title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }

    });
});
//end strategies that did not work well
$(document).on("submit","#add-strategies-that-did-not-work-form", function(e){
    e.preventDefault();

    var form_data = $(this).serializeArray();
    var form_url = 'controllers/risk-management/process-add-lessons-learnt-form.php';
    var form_method = 'POST';
    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        beforeSend: function()
        {
          $.blockUI({ message: blockui_spinner });
        },
        success:function(data){
          $.unblockUI();
            if(data == 'success')
            {
              Toast.fire({
                 type: 'success',
                 title: 'Added Successfully'
               });
               $('body').removeClass('modal-open');
               $('.modal-backdrop').remove();
               $('.strategies_that_did_not_work_tab').click();
            }
            else
            {
              Toast.fire({
                 type: 'error',
                 title: 'Failed. Please try again'
               });
            }
            console.log(data);
        },
        error: function(xhr)
        {
          $.unblockUI();
            Toast.fire({
              type: 'error',
              title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }

    });
});
$(document).on("submit","#add-near-misses-form", function(e){
    e.preventDefault();

    var form_data = $(this).serializeArray();
    var form_url = 'controllers/risk-management/process-add-lessons-learnt-form.php';
    var form_method = 'POST';
    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        beforeSend: function()
        {
          $.blockUI({ message: blockui_spinner });
        },
        success:function(data){
          $.unblockUI();
            if(data == 'success')
            {
              Toast.fire({
                 type: 'success',
                 title: 'Added Successfully'
               });
               $('body').removeClass('modal-open');
               $('.modal-backdrop').remove();
               $('.near_misses_tab').click();
            }
            else
            {
              Toast.fire({
                 type: 'error',
                 title: 'Failed. Please try again'
               });
            }
            console.log(data);
        },
        error: function(xhr)
        {
          $.unblockUI();
            Toast.fire({
              type: 'error',
              title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }

    });
});

function updateLessonslearntStrategiesThatWorked(str){
      var id = str;
      var period = $('#edit_period_strategies_that_worked-'+str).val();
      var quarter = $('#edit_quarter_strategies_that_worked-'+str).val();
      var strategies_that_worked_well = $('#edit_strategies_that_worked_well-'+str).val();
      var newForm = $('#edit-strategies-that-worked-form-'+str);

      $(newForm).submit(function(f){
         f.preventDefault();
      });
      $.ajax({
         type: "POST",
         url :"controllers/risk-management/process-edit-lessons-learnt.php",
         data: "edit_period="+period+"&id="+id+"&edit_quarter="+quarter+"&edit_strategies_that_worked_well="+strategies_that_worked_well,
         beforeSend:function()
         {
           $.blockUI({ message: blockui_spinner });
         },
         success:function(data)
         {
           if(data == 'success')
           {
             Toast.fire({
                type: 'success',
                title: 'Updated Successfully'
              });
              $('body').removeClass('modal-open');
              $('.modal-backdrop').remove();
              $('.strategies_that_worked_well_tab').click();

           }
           else
           {
             Toast.fire({
                type: 'error',
                title: 'Failed. Please try again'
              });
           }
         },
          error: function(xhr)
          {
            $.unblockUI();
              Toast.fire({
                type: 'error',
                title: 'Your request could not be completed. Please try again: '+xhr.status
              });
          }
      });
}



function UpdateLessonsLearntStrategiesDidNotWork(str){
      var id = str;
      var period = $('#edit_period_strategies_did_not_work-'+str).val();
      var quarter = $('#edit_quarter_strategies_did_not_work-'+str).val();
      var strategies_that_did_not_work  = $('#edit_strategies_that_did_not_work-'+str).val();
      var newForm = $('#edit-strategies-that-did-not-work-form-'+str);

      $(newForm).submit(function(f){
         f.preventDefault();
      });
      $.ajax({
         type: "POST",
         url :"controllers/risk-management/process-edit-lessons-learnt.php",
         data: "edit_period="+period+"&id="+id+"&edit_quarter="+quarter+"&edit_strategies_that_did_not_work="+strategies_that_did_not_work,
         beforeSend:function()
         {
           $.blockUI({ message: blockui_spinner });
         },
         success:function(data)
         {
           if(data == 'success')
           {
             Toast.fire({
                type: 'success',
                title: 'Updated Successfully'
              });
              $('body').removeClass('modal-open');
              $('.modal-backdrop').remove();
              $('.strategies_that_did_not_work_tab').click();

           }
           else
           {
             Toast.fire({
                type: 'error',
                title: 'Failed. Please try again'
              });
           }
         },
        error: function(xhr)
        {
          $.unblockUI();
            Toast.fire({
              type: 'error',
              title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }
      });
}


function updateLessonslearntNearMisses(str){
      var id = str;
      var period = $('#edit_period_near_misses-'+str).val();
      var quarter = $('#edit_quarter_near_misses-'+str).val();
      var near_misses  = $('#edit_near_misses-'+str).val();
      var newForm = $('#edit-near-misses-form-'+str);

      $(newForm).submit(function(f){
         f.preventDefault();
      });
      $.ajax({
         type: "POST",
         url :"controllers/risk-management/process-edit-lessons-learnt.php",
         data: "edit_period="+period+"&id="+id+"&edit_quarter="+quarter+"&edit_near_misses="+near_misses,
         beforeSend:function()
         {
           $.blockUI({ message: blockui_spinner });
         },
         success:function(data)
         {
           if(data == 'success')
           {
             Toast.fire({
                type: 'success',
                title: 'Updated Successfully'
              });
              $('body').removeClass('modal-open');
              $('.modal-backdrop').remove();
              $('.near_misses_tab').click();

           }
           else
           {
             Toast.fire({
                type: 'error',
                title: 'Failed. Please try again'
              });
           }
         },
        error: function(xhr)
        {
          $.unblockUI();
            Toast.fire({
              type: 'error',
              title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }
      });
}


function deleteStrategiesThatWorkedWell(id) {
  Swal.fire({
      title: 'DELETE ?',
      text: "This action is irriversible. Are you sure to proceed?",
      type: 'question',
      showCancelButton: true,
      confirmButtonText: 'YES, DELETE',
      cancelButtonText: 'NO, KEEP!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {

        var form_data = {
          sid:id
        };
        var form_url = 'controllers/risk-management/process-delete-strategies-that-worked-well.php';
        var form_method = 'POST';

        $.ajax({
            data : form_data,
            url  : form_url,
            method : form_method,
            beforeSend:function()
            {
              $.blockUI({ message: blockui_spinner });
            },
            success:function(data){
              {
                $.unblockUI();
              }
              if(data == "success")
              {
                Swal.fire(
                  'DELETED',
                  'Deleted Successfully',
                  'success'
                );
                $('.strategies_that_worked_well_tab').click();

              }
              else
              {
                Swal.fire(
                  'NOT DELETED',
                  'Failed to Delete. Please try again',
                  'error'
                );
              }
            },
            error: function(xhr)
            {
              $.unblockUI();
                Toast.fire({
                  type: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
                });
            }

        });

      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        Swal.fire(
          'Cancelled',
          'Not Deleted',
          'error'
        );
      }
  });
}

function deleteStrategiesThatDidNotWork(id) {

  Swal.fire({
      title: 'DELETE ?',
      text: "This action is irriversible. Are you sure to proceed?",
      type: 'question',
      showCancelButton: true,
      confirmButtonText: 'YES, DELETE',
      cancelButtonText: 'NO, KEEP!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {

        var form_data = {
          sid:id
        };
        var form_url = 'controllers/risk-management/process-delete-strategies-that-did-not-work.php';
        var form_method = 'POST';

        $.ajax({
            data : form_data,
            url  : form_url,
            method : form_method,
            beforeSend:function()
            {
              $.blockUI({ message: blockui_spinner });
            },
            success:function(data){
              {
                $.unblockUI();
              }
              if(data == "success")
              {
                Swal.fire(
                  'DELETED',
                  'Deleted Successfully',
                  'success'
                );
                $('.strategies_that_did_not_work_tab').click();

              }
              else
              {
                Swal.fire(
                  'NOT DELETED',
                  'Failed to Delete. Please try again',
                  'error'
                );
              }
            },
            error: function(xhr)
            {
              $.unblockUI();
                Toast.fire({
                  type: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
                });
            }

        });

      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        Swal.fire(
          'Cancelled',
          'Not Deleted',
          'error'
        );
      }
  });
}

function deleteNearMisses(id) {

  Swal.fire({
      title: 'DELETE ?',
      text: "This action is irriversible. Are you sure to proceed?",
      type: 'question',
      showCancelButton: true,
      confirmButtonText: 'YES, DELETE',
      cancelButtonText: 'NO, KEEP!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {

        var form_data = {
          sid:id
        };
        var form_url = 'controllers/risk-management/process-delete-near-misses.php';
        var form_method = 'POST';

        $.ajax({
            data : form_data,
            url  : form_url,
            method : form_method,
            beforeSend:function()
            {
              $.blockUI({ message: blockui_spinner });
            },
            success:function(data){
              {
                $.unblockUI();
              }
              if(data == "success")
              {
                Swal.fire(
                  'DELETED',
                  'Deleted Successfully',
                  'success'
                );
                $('.near_misses_tab').click();

              }
              else
              {
                Swal.fire(
                  'NOT DELETED',
                  'Failed to Delete. Please try again',
                  'error'
                );
              }
            },
            error: function(xhr)
            {
              $.unblockUI();
                Toast.fire({
                  type: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
                });
            }

        });

      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        Swal.fire(
          'Cancelled',
          'Not Deleted',
          'error'
        );
      }
  });
}
//end lessons learnt

//start incident report
//START ADD incident report form
$(document).on("submit","#add-incident-report-form", function(e){
   e.preventDefault();

   var form_data = $(this).serializeArray();
   var form_url = 'controllers/risk-management/process-add-incident-report-form.php';
   var form_method = 'POST';

   $.ajax({
       data : form_data,
       url  : form_url,
       method : form_method,
       beforeSend: function()
       {
         $.blockUI({ message: blockui_spinner });
       },
       success:function(data){
           $.unblockUI();
           if(data == 'success')
           {
             Toast.fire({
               type: 'success',
               title: 'Incident Added Successfully'
             });
             $('body').removeClass('modal-open');
             $('.modal-backdrop').remove();
             $('.incident-reporting-link').click();
           }
           else if(data == 'failed')
           {
             Toast.fire({
               type: 'error',
               title: 'Failed. Please try again'
             });
           }
           else
           {
             Toast.fire({
               type: 'error',
               title: 'Failed. Please contact System Administrator'
             });
           }
           console.log(data);
       },
        error: function(xhr)
        {
          $.unblockUI();
            Toast.fire({
              type: 'error',
              title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }

   });
});

function updateIncident(str){
      var id = str;
      var period_from = $('#period_from-'+str).val();
      var quarter = $('#quarter-'+str).val();
      var the_event = $('#the_event-'+str).val();
      var impact = $('#impact-'+str).val();
      var root_causes = $('#root_causes-'+str).val();
      var corrective_action_plans = $('#corrective_action_plans-'+str).val();
      var lessons_learnt = $('#lessons_learnt-'+str).val();
      var newForm = $('#edit-incident-report-form-'+str);

      $(newForm).submit(function(e){
         e.preventDefault();
      });
      $.ajax({
         type: "POST",
         url :"controllers/risk-management/update-incident-reports.php",
         data: "period_from="+period_from+"&quarter="+quarter+"&the_event="+the_event+"&id="+id+"&impact="+impact+"&root_causes="+root_causes+"&corrective_action_plans="+corrective_action_plans+"&lessons_learnt="+lessons_learnt,
         beforeSend:function()
        {
          $.blockUI({ message: blockui_spinner });
        },
         success:function(data)
         {
           if(data == 'success')
           {
             Toast.fire({
                 type: 'success',
                 title: 'Incident Updated Successfully'
               });
               $('body').removeClass('modal-open');
               $('.modal-backdrop').remove();
               $('.incident-reporting-link').click();
           }
           else
           {
             Toast.fire({
                 type: 'error',
                 title: 'Failed. Please try again'
               });
           }
         },
          error: function(xhr)
          {
            $.unblockUI();
              Toast.fire({
                type: 'error',
                title: 'Your request could not be completed. Please try again: '+xhr.status
              });
          }



      });
}

function deleteIncident(id) {

  Swal.fire({
      title: 'DELETE ?',
      text: "This action is irriversible. Are you sure to proceed?",
      type: 'question',
      showCancelButton: true,
      confirmButtonText: 'YES, DELETE',
      cancelButtonText: 'NO, KEEP!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {

        var form_data = {
          sid:id
        };
        var form_url = 'controllers/risk-management/process-delete-incident.php';
        var form_method = 'POST';

        $.ajax({
            data : form_data,
            url  : form_url,
            method : form_method,
            beforeSend:function()
            {
              $.blockUI({ message: blockui_spinner });
            },
            success:function(data){
              {
                $.unblockUI();
              }
              if(data == "success")
              {
                Swal.fire(
                  'DELETED',
                  'Deleted Successfully',
                  'success'
                );
                $('.incident-reporting-link').click();

              }
              else
              {
                Swal.fire(
                  'NOT DELETED',
                  'Failed to Delete. Please try again',
                  'error'
                );
              }
            },
            error: function(xhr)
            {
              $.unblockUI();
                Toast.fire({
                  type: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
                });
            }

        });

      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        Swal.fire(
          'Cancelled',
          'Not Deleted',
          'error'
        );
      }
  });
}

//end incident report
//END RISK MANAGEMENT

//start objectives
//START ADD departmental objective form
$(document).on("submit","#add-departmental-objective-form", function(e){
   e.preventDefault();

   var form_data = $(this).serializeArray();
   var form_url = 'controllers/objectives/process-add-departmental-objective-form.php';
   var form_method = 'POST';

   $.ajax({
       data : form_data,
       url  : form_url,
       method : form_method,
       beforeSend: function()
       {
         $.blockUI({ message: blockui_spinner });
       },
       success:function(data){
         $.unblockUI();
           if(data == 'success')
           {
             Toast.fire({
               type: 'success',
               title: 'Objective Added Successfully'
             });
             $('body').removeClass('modal-open');
             $('.modal-backdrop').remove();
             $('.departmental-objectives-link').click();
           }
           else if(data == 'failed')
           {
             Toast.fire({
               type: 'error',
               title: 'Failed. Please try again'
             });
           }
           else
           {
             Toast.fire({
               type: 'error',
               title: 'Failed. Please contact System Administrator'
             });
           }
           console.log(data);
       },
        error: function(xhr)
        {
          $.unblockUI();
            Toast.fire({
              type: 'error',
              title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }

   });
});
//END ADD departmental objective form

//start modify objectives
$(document).on("submit","#edit-departmental-objectives-form", function(e){
    e.preventDefault();

    var form_data = $(this).serializeArray();
    var form_url = 'controllers/objectives/update-objectives.php';
    var form_method = 'POST';

    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        beforeSend:function()
        {
          $.blockUI({ message: blockui_spinner });
        },
        success:function(data){
          $.unblockUI();
            if(data == 'success')
            {
              Toast.fire({
               type: 'success',
               title: 'Objective Modified Successfully'
             });
             $('.departmental-objectives-link').click();

            }
            else
            {
              Toast.fire({
               type: 'error',
               title: 'Failed. Please try again'
             });
            }
            console.log(data);
        },
        error: function(xhr)
        {
          $.unblockUI();
            Toast.fire({
              type: 'error',
              title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }


    });
});
//end modify objectives

//start delete objectives
function deleteObjective(id) {

  Swal.fire({
      title: 'DELETE PERMENENTLY?',
      text: "This action is irriversible. The underlying Sub Objective/s attached to this objective will be removed too. Are you sure to proceed?",
      type: 'question',
      showCancelButton: true,
      confirmButtonText: 'YES, DELETE',
      cancelButtonText: 'NO, KEEP!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {

        var form_data = {
          sid:id
        };
        var form_url = 'controllers/objectives/process-delete-objective.php';
        var form_method = 'POST';

        $.ajax({
            data : form_data,
            url  : form_url,
            method : form_method,
            beforeSend:function()
            {
              $.blockUI({ message: blockui_spinner });
            },
            success:function(data){
              {
                $.unblockUI();
              }
              if(data == "success")
              {
                Swal.fire(
                  'DELETED',
                  'Deleted Successfully',
                  'success'
                );
                $('.departmental-objectives-link').click();

              }
              else
              {
                Swal.fire(
                  'NOT DELETED',
                  'Failed to Delete. Please try again',
                  'error'
                );
              }
            },
              error: function(xhr)
              {
                $.unblockUI();
                  Toast.fire({
                    type: 'error',
                    title: 'Your request could not be completed. Please try again: '+xhr.status
                  });
              }

        });

      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        Swal.fire(
          'Cancelled',
          'Not Deleted',
          'error'
        );
      }
  });
}



function removeObjective(id) {

  Swal.fire({
      title: 'REMOVE OBJECTIVE?',
      text: "This action will remove the objective from the list. Are you sure to proceed?",
      type: 'question',
      showCancelButton: true,
      confirmButtonText: 'YES, DELETE',
      cancelButtonText: 'NO, KEEP!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {

        var form_data = {
          sid:id
        };
        var form_url = 'controllers/objectives/process-delete-keep-objective.php';
        var form_method = 'POST';

        $.ajax({
            data : form_data,
            url  : form_url,
            method : form_method,
            beforeSend:function()
            {
              $.blockUI({ message: blockui_spinner });
            },
            success:function(data){
              {
                $.unblockUI();
              }
              if(data == "success")
              {
                Swal.fire(
                  'REMOVED',
                  'Removed Successfully',
                  'success'
                );
                $('.departmental-objectives-link').click();

              }
              else
              {
                Swal.fire(
                  'NOT REMOVED',
                  'Failed to Remove. Please try again',
                  'error'
                );
              }
            },
            error: function(xhr)
            {
              $.unblockUI();
                Toast.fire({
                  type: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
                });
            }

        });

      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        Swal.fire(
          'Cancelled',
          'Not Removed',
          'error'
        );
      }
  });
}
//end delete objectives
//end objectives



//START PERFORMANCE MANAGEMENT
$(document).on("submit","#add-departmental-workplan-form", function(e){
    e.preventDefault();

    var form_data = $(this).serializeArray();
    var form_url = 'controllers/performance-management/process-add-departmental-workplan.php';
    var form_method = 'POST';
    var fin_year = $('#fin_year').val();
    var selected_department = $('#selected_department').val();
    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        beforeSend:function()
        {
          $.blockUI({ message: blockui_spinner });
        },
        success:function(data){
            $.unblockUI();
            if(data == 'success')
            {
              Toast.fire({
                type: 'success',
                title: 'Activity Added Successfully'
              });

            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            fetchWorkplan(fin_year,selected_department);

                  $.ajax({
                      data : $('#add-departmental-workplan-form').serializeArray(),
                      type: "post",
                      url: "controllers/performance-management/process-send-mail-add-activity.php",
                      success: function (data) {
                          console.log(data);
                      }
                  });
            }
            else if(data == 'failed')
              {
                Toast.fire({
                  type: 'error',
                  title: 'Failed. Please try again'
                });
              }
            else
            {
              Toast.fire({
                type: 'error',
                title: 'Failed. Please contact System Administrator'
              });
            }
            console.log(data);
        },
        error: function(xhr)
        {
          $.unblockUI();
            Toast.fire({
              type: 'error',
              title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }

    });
});
//end departmental workplan form

//start monitor deartmental workplan
$(document).on("submit","#update-activity-form", function(e){
    e.preventDefault();

    var form_data = $(this).serializeArray();
    var form_url = 'controllers/performance-management/process-update-activity.php';
    var form_method = 'POST';
    var fin_year = $('#fin_year_update').val();
    var selected_department = $('#selected_department_update').val();

    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        beforeSend:function()
        {
            $.blockUI({ message: blockui_spinner });
        },
        success:function(data){
            $.unblockUI();
            if(data == 'success')
            {
              Toast.fire({
                 type: 'success',
                 title: 'Updated Successfully'
                });
                fetchWorkplan(fin_year,selected_department);
            }

            else if(data == 'failed')
              {
                Toast.fire({
                   type: 'error',
                   title: 'Failed. Please try again'
                  });
              }
              else
              {
                Toast.fire({
                   type: 'error',
                   title: 'Failed. Please contact System Administrator'
                  });
              }
              console.log(data);
        },
        error: function(xhr)
        {
          $.unblockUI();
            Toast.fire({
              type: 'error',
              title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }

    });
});

//end monitor departmental workplan

//start edit workplan
$(document).on("submit","#edit-departmental-workplan-form", function(e){
    e.preventDefault();

    var form_data = $(this).serializeArray();
    var form_url = 'controllers/performance-management/process-edit-activity.php';
    var form_method = 'POST';
    var fin_year = $('#fin_year_edit').val();
    var selected_department = $('#selected_department_edit').val();

    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        beforeSend:function()
        {
          $.blockUI({ message: blockui_spinner });
        },

        success:function(data){
            $.unblockUI();
            if(data == 'success')
            {
              Toast.fire({
                 type: 'success',
                 title: 'Modified Successfully'
                });
                fetchWorkplan(fin_year,selected_department);
            }

            else if(data == 'failed')
              {
                Toast.fire({
                   type: 'error',
                   title: 'Failed. Please try again'
                  });
              }
              else
              {
                Toast.fire({
                   type: 'error',
                   title: 'Failed. Please contact System Administrator'
                  });
              }
              console.log(data);
          },
          error: function(xhr)
          {
            $.unblockUI();
              Toast.fire({
                type: 'error',
                title: 'Your request could not be completed. Please try again: '+xhr.status
              });
          }
    });
});

//end edit workplan


//start of close activity form
$(document).on("submit","#close-activity-form", function(e){
    e.preventDefault();

    Swal.fire({
        title: 'CLOSE ACTIVITY ? ',
        text: "Once you confirm, this activity will no longer appear on the workplan. Are you sure to proceed?",
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'YES, CLOSE ACTIVITY',
        cancelButtonText: 'NO, KEEP!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {

          var form_data = $('#close-activity-form').serializeArray();
          var form_url = 'controllers/performance-management/process-close-activity.php';
          var form_method = 'POST';
          var fin_year = $('#fin_year_close_open').val();
          var selected_department = $('#selected_department_close_open').val();

          $.ajax({
              data : form_data,
              url  : form_url,
              method : form_method,
              beforeSend:function()
              {
                $.blockUI({ message: blockui_spinner });
              },
              success:function(data){
                $.unblockUI();
                if(data == "success")
                {
                  Swal.fire(
                    'CLOSED',
                    'Activity Closed Successfully',
                    'success'
                  );
                  fetchWorkplan(fin_year,selected_department);
                  $.ajax({
                      data : $('#close-activity-form').serializeArray(),
                      type: "post",
                      url: "controllers/performance-management/process-send-mail-close-open-activity.php",
                      success: function (data) {
                          console.log(data);
                      }
                  });

                }
                else
                {
                  Swal.fire(
                    'NOT CLOSED',
                    'Failed to Close. Please try again',
                    'error'
                  );
                }
              },
              error: function(xhr)
              {
                $.unblockUI();
                  Toast.fire({
                    type: 'error',
                    title: 'Your request could not be completed. Please try again: '+xhr.status
                  });
              }

          });

        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          Swal.fire(
            'Cancelled',
            'Not Removed',
            'error'
          );
        }
    });
});
//end of close activity form

//start of open activity form
$(document).on("submit","#open-activity-form", function(e){
    e.preventDefault();

    Swal.fire({
        title: 'OPEN ACTIVITY ? ',
        text: "Once you confirm, this activity will longer appear on the workplan. Are you sure to proceed?",
        type: 'question',
        showCancelButton: true,
        confirmButtonText: 'YES, OPEN ACTIVITY',
        cancelButtonText: 'NO, KEEP!',
        reverseButtons: true
      }).then((result) => {
        if (result.value) {

          var form_data = $('#open-activity-form').serializeArray();
          var form_url = 'controllers/performance-management/process-close-activity.php';
          var form_method = 'POST';
          var fin_year = $('#fin_year_close_open').val();
          var selected_department = $('#selected_department_close_open').val();

          $.ajax({
              data : form_data,
              url  : form_url,
              method : form_method,
              beforeSend:function()
              {
                $.blockUI({ message: blockui_spinner });
              },
              success:function(data){
                $.unblockUI();
                if(data == "success")
                {
                  Swal.fire(
                    'OPENED',
                    'Activity Opened Successfully',
                    'success'
                  );
                  fetchWorkplan(fin_year,selected_department);
                  $.ajax({
                      data : $('#open-activity-form').serializeArray(),
                      type: "post",
                      url: "controllers/performance-management/process-send-mail-close-open-activity.php",
                      success: function (data) {
                          console.log(data);
                      }
                  });

                }
                else
                {
                  Swal.fire(
                    'NOT OPENED',
                    'Failed to Open. Please try again',
                    'error'
                  );
                }
              },
              error: function(xhr)
              {
                $.unblockUI();
                  Toast.fire({
                    type: 'error',
                    title: 'Your request could not be completed. Please try again: '+xhr.status
                  });
              }

          });

        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          Swal.fire(
            'Cancelled',
            'Not Opened',
            'error'
          );
        }
    });
});
//end of open activity form


//END PERFORMANCE MANAGEMENT

//start ldap users
$(document).on("submit","#submit-password-form", function(e){
    e.preventDefault();

    var form_data = $(this).serializeArray();
    var form_url = 'views/admin-portal/fetch_ldap_users.php';
    var form_method = 'POST';

    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        beforeSend:function()
        {
          $.blockUI({ message: blockui_spinner });
        },
        success:function(data){
          $.unblockUI();
            if(data.indexOf("Couldn't connect to AD!") != -1)
            {
              Toast.fire({
                    type: 'error',
                    title: 'Failed to connect to Active Directory'
                  });
            }
            else if(data.indexOf("Couldn't bind to AD!") != -1)
            {
              Toast.fire({
                    type: 'error',
                    title: 'Invalid Credentials'
                  });
            }
            else
            {
              $('#ldap_users_tab').html(data);
              $('#database_users_tab').removeClass('show active');
              $('.database_users_tab').removeClass('active');
              $('#ldap_users_tab').addClass('show active');
              $('.ldap_users_tab').addClass('active');
              $('#user-password-modal').modal('hide');
              LoadDatatables();
            }
        },
        error: function(xhr)
        {
          $.unblockUI();
            Toast.fire({
              type: 'error',
              title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }

    });
});

//end ldap users

//set current period and quarter
$(document).on("submit","#add-current-period-form", function(e){
    e.preventDefault();

    var form_data = new FormData($(this)[0]);//$(this).serializeArray();
    var form_url = 'controllers/admin-portal/process-add-current-quarter.php';
    var form_method = 'POST';

    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        contentType : false,
        processData:false,
        async:false,
        beforeSend:function()
        {
          $.blockUI({ message: blockui_spinner });
        },
        success:function(data){
          $.unblockUI();
            if(data == 'success')
            {
               Toast.fire({
                type: 'success',
                title: 'Current Period Set Successfully'
              });
            }
            else if(data == 'failed')
            {
               Toast.fire({
                type: 'error',
                title: 'Failed. Please try again'
              });
            }
            else
            {
              Toast.fire({
                type: 'error',
                title: 'Failed. Please contact System Administrator'
              });
            }
            console.log(data);
        },
        error: function(xhr)
        {
          $.unblockUI();
            Toast.fire({
              type: 'error',
              title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }

    });
});
//end set current period and quarter

//start set deadline
$(document).on("submit","#set-deadline-form", function(e){
    e.preventDefault();
    var form_data = $(this).serializeArray();
    var form_url = 'controllers/admin-portal/process-set-deadline.php';
    var form_method = 'POST';

    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        beforeSend: function()
        {
           $.blockUI({ message: blockui_spinner });
        },
        success:function(data){
          $.unblockUI();
            if(data == 'success')
            {
              Toast.fire({
                type: 'success',
                title: 'Deadline Set Successfully'
              });
            }
            else
            {
              Toast.fire({
                type: 'error',
                title: 'Failed. Please Try Again'
              });
            }
            console.log(data);
            $('#set-deadline-form').trigger("reset");
        },
        error: function(xhr)
        {
          $.unblockUI();
            Toast.fire({
              type: 'error',
              title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }

    });
});

//end set deadline

  // create backup form
  $(document).on("submit","#create-backups-form", function(e){
      e.preventDefault();

      var form_data = $(this).serializeArray();
      var form_url = 'controllers/admin-portal/db-backup.php';
      var form_method = 'POST';
      $.ajax({
          data : form_data,
          url  : form_url,
          method : form_method,
          beforeSend:function()
          {
            $.blockUI({ message: blockui_spinner });
          },
          success:function(data){
             $.unblockUI();
              if(data == 'success')
              {
                  Toast.fire({
                  type: 'success',
                  title: 'Backup Created Successfully'
                });

              }
              else if (data == "Notposted") {
                Toast.fire({
                type: 'error',
                title: 'Failed. Not Posted'
                });

              }

              else
              {
                Toast.fire({
                type: 'error',
                title: 'Failed. Please try again'
                });
              }
              console.log(data);
          },
          error: function(xhr)
          {
            $.unblockUI();
              Toast.fire({
                type: 'error',
                title: 'Your request could not be completed. Please try again: '+xhr.status
              });
          }

      });
  });
  //end create backup form


//END DSTV management form



  //start add user form
   $(document).on("submit","#add-new-user-form", function(e){
        e.preventDefault();

        var form_data = new FormData($(this)[0]);//$(this).serializeArray();
        var form_url = 'controllers/admin-portal/process-add-user-form.php';
        var form_method = 'POST';

        $.ajax({
            data : form_data,
            url  : form_url,
            method : form_method,
            contentType : false,
            processData:false,
            async:false,
            beforeSend:function()
            {
              $.blockUI({ message: blockui_spinner });
            },
            success:function(data){
               $.unblockUI();
                if(data == 'success')
                {
                    Toast.fire({
                    type: 'success',
                    title: 'User Added Successfully'
                  });
                  $('body').removeClass('modal-open');
                  $('.modal-backdrop').remove();
                  $('.admin-user-management-link').click();

                }
                else if(data == 'failed')
                {
                   Toast.fire({
                    type: 'error',
                    title: 'Failed. Please try again'
                  });
                }
                else if(data =='duplicate')
                {
                   Toast.fire({
                    type: 'error',
                    title: 'Failed. Duplicate Email/Employee Number'
                  });
                }
                else
                {
                   Toast.fire({
                    type: 'error',
                    title: 'Failed. Please contact System Administrator'
                  });
                }
                console.log(data);
            },
            error: function(xhr)
            {
              $.unblockUI();
                Toast.fire({
                  type: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
                });
            }

        });
    });

  //end add user form


  // Admin add user Settings
function EditUser(str)
{
    var form_id = $('#update-user-settings2-form-'+str);

    var form_data = new FormData(form_id[0]);
    var form_url = 'controllers/admin-portal/process-edit-user-settings2-form.php';
    var form_method = 'POST';


    $.ajax({
        data : form_data,
        url  : form_url,
        method : form_method,
        contentType : false,
        processData:false,
        async:false,
        beforeSend:function()
        {
          $.blockUI({ message: blockui_spinner });
        },
        success:function(data){
            $.unblockUI();
            if(data == 'success')
            {
               Toast.fire({
                    type: 'success',
                    title: 'User Data Updated Successfully'
                  });
            }
            else if(data == 'failed')
            {
             Toast.fire({
                    type: 'error',
                    title: 'Failed. Please try again'
                  });
            }
            else
            {
                 Toast.fire({
                    type: 'error',
                    title: 'Failed. Please contact System Administrator'
                  });
            }
            console.log(data);
        },
        error: function(xhr)
        {
          $.unblockUI();
            Toast.fire({
              type: 'error',
              title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }

    });
}

//end edit user settings

//start directors report
function sendtoDirectorsreport(str){
      var id = str;
      var activity_id = $('#activity_id-'+str).val();
      var risk_ref = $('#risk_ref-'+str).val();
      var directorate_id = $('#directorate_id-'+str).val();
      var year_id =$('#year_id-'+str).val();
      var quarter_id =$('#quarter_id-'+str).val();
      var send_to_directorate_button = $('#send-to-directorate-button-'+str);

      var row = $('#row-'+str);

      var newForm = $('#send-to-directorate-form-'+str);

      $(newForm).submit(function(e){
         e.preventDefault();
      });
      $.ajax({
         type: "POST",
         url :"controllers/reports/process-send-to-directorate.php",
         data: "activity_id="+activity_id+"&risk_ref="+risk_ref+"&directorate_id="+directorate_id+"&year_id="+year_id+"&quarter_id="+quarter_id,
         beforeSend:function()
         {
           $(send_to_directorate_button).prop("disabled",true);
           $(send_to_directorate_button).html("<i class='fa fa-spinner fa-spin'></i>Sending...");
         },
         success:function(data)
         {
           if(data == 'success')
           {
             //alert(reference_no);
             $(send_to_directorate_button).prop("disabled",true);
             $(send_to_directorate_button).html("<i class='fa fa-check'></i>Sent!");
             //$(row).hide();
             $(row).delay(3000).fadeOut('slow');

           }
           else
           {
             $(send_to_directorate_button).prop("disabled",false);
             $(send_to_directorate_button).html("Please Try Again");
           }
           console.log(data);
         },
         error: function(xhr)
         {
           $.unblockUI();
             Toast.fire({
               type: 'error',
               title: 'Your request could not be completed. Please try again: '+xhr.status
             });
         }
      });
}

//remove from directorate

function removeFromDirectorsreport(str){
      var id = str;
      var directors_risk_id = $('#directors_risk_id-'+str).val();
      var activity_id = $('#activity_id-'+str).val();
      var risk_ref = $('#risk_ref-'+str).val();
      var directorate_id = $('#directorate_id-'+str).val();
      var year_id =$('#year_id-'+str).val();
      var quarter_id =$('#quarter_id-'+str).val();
      var remove_from_directorate_button = $('#remove-from-directorate-button-'+str);

      var row = $('#row-'+str);

      var newForm = $('#remove-from-directorate-form-'+str);

      $(newForm).submit(function(e){
         e.preventDefault();
      });
      $.ajax({
         type: "POST",
         url :"controllers/reports/process-remove-from-directorate.php",
         data: "activity_id="+activity_id+"&risk_ref="+risk_ref+"&directorate_id="+directorate_id+"&directors_risk_id="+directors_risk_id,
         beforeSend:function()
         {
           $(remove_from_directorate_button).prop("disabled",true);
           $(remove_from_directorate_button).html("<i class='fa fa-spinner fa-spin'></i>Removing...");
         },
         success:function(data)
         {
           if(data == 'success')
           {
             //alert(reference_no);
             $(remove_from_directorate_button).prop("disabled",true);
             $(remove_from_directorate_button).html("<i class='fa fa-check'></i>Removed!");
             //$(row).hide();
             $(row).delay(3000).fadeOut('slow');
             var loader =`<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>`;
             var year_id = $('#select_period').val();
             var quarter_id = $('#select_quarter').val();
             var directorate_id = $('#directorates').val();
             $('#directorate_risks_with_activities_generated').html(loader);
             $.post("controllers/reports/fetch-directorate-risks.php",
             {
               year_id: year_id,
               quarter_id: quarter_id,
               directorate_id: directorate_id
             },
             function(data_fetch,status){
               $('#loader_directorate_risks').html('');
               $('#directorate_risks_with_activities_generated').html(data_fetch);
               console.log(data_fetch);
             });


           }
           else
           {
             $(remove_from_directorate_button).prop("disabled",false);
             $(remove_from_directorate_button).html("Please Try Again");
           }
           console.log(data);
         },
         error: function(xhr)
         {
           $.unblockUI();
             Toast.fire({
               type: 'error',
               title: 'Your request could not be completed. Please try again: '+xhr.status
             });
         }
      });
}

function removeFromDirectorscumulativereport(str){
      var id = str;
      var directors_risk_id = $('#directors_risk_id-'+str).val();
      var activity_id = $('#activity_id-'+str).val();
      var risk_ref = $('#risk_ref-'+str).val();
      var directorate_id = $('#directorate_id-'+str).val();
      var year_id =$('#year_id-'+str).val();
      var quarter_id =$('#quarter_id-'+str).val();
      var remove_from_directorate_button = $('#remove-from-directorate-button-'+str);

      var row = $('#row-'+str);

      var newForm = $('#remove-from-directorate-form-'+str);

      $(newForm).submit(function(e){
         e.preventDefault();
      });
      $.ajax({
         type: "POST",
         url :"controllers/reports/process-remove-from-directorate-cumulative-risk.php",
         data: "activity_id="+activity_id+"&risk_ref="+risk_ref+"&directorate_id="+directorate_id+"&directors_risk_id="+directors_risk_id,
         beforeSend:function()
         {
           $(remove_from_directorate_button).prop("disabled",true);
           $(remove_from_directorate_button).html("<i class='fa fa-spinner fa-spin'></i>Removing...");
         },
         success:function(data)
         {
           if(data == 'success')
           {
             //alert(reference_no);
             $(remove_from_directorate_button).prop("disabled",true);
             $(remove_from_directorate_button).html("<i class='fa fa-check'></i>Removed!");
             //$(row).hide();
             $(row).delay(3000).fadeOut('slow');
             var loader =`<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>`;
             var year_id = $('#select_period').val();
             var quarter_id = $('#select_quarter').val();
             var directorate_id = $('#directorates').val();
             $('#directorate_risks_with_activities_generated').html(loader);
             $.post("views/reports/fetch-directorate-risks.php",
             {
               year_id: year_id,
               quarter_id: quarter_id,
               directorate_id: directorate_id
             },
             function(data_fetch,status){
               $('#loader_directorate_risks').html('');
               $('#directorate_risks_with_activities_generated').html(data_fetch);
               console.log(data_fetch);
             });


           }
           else
           {
             $(remove_from_directorate_button).prop("disabled",false);
             $(remove_from_directorate_button).html("Please Try Again");
           }
           console.log(data);
         },
         error: function(xhr)
         {
           $.unblockUI();
             Toast.fire({
               type: 'error',
               title: 'Your request could not be completed. Please try again: '+xhr.status
             });
         }
      });
}

//end directors report

$(document).on("submit","#cumulative-risks-directorate-form", function(e){
  e.preventDefault();

  var form_data = $(this).serializeArray();
  var form_url = 'controllers/reports/add-cumulative-risks-directorate.php';
  var form_method = 'POST';
  var loader =`<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>`;
  $('#loader_submit_cumulative_risks').html(loader);

  $.ajax({
      data : form_data,
      url  : form_url,
      method : form_method,
      beforeSend:function()
      {
        $('#cumulative-risks-directorate-button').prop("disabled",true);
        $('#cumulative-risks-directorate-button').html("submitting...");
      },
      success:function(data){
          $('#cumulative-risks-directorate-button').prop("disabled",false);
          $('#cumulative-risks-directorate-button').html("SUBMIT");
          $('#loader_submit_cumulative_risks').html('');
          if(data == 'success')
          {
            Toast.fire({
                      type: 'success',
                      title: 'Successfully Created'
              });
              var year_id = $('#select_period').val();
              var quarter_id = $('#select_quarter').val();
              var directorate_id = $('#directorates').val();
              $('#directorate_risks_with_activities_generated').html(loader);
              $.post("views/reports/fetch-directorate-risks.php",
              {
                year_id: year_id,
                quarter_id: quarter_id,
                directorate_id: directorate_id
              },
              function(data,status){
                $('#loader_directorate_risks').html('');
                $('#directorate_risks_with_activities_generated').html(data);
                console.log(data);
              });

          }
         else  if(data == 'failed')
          {
            Toast.fire({
                      type: 'error',
                      title: 'Failed. Please try again'
              });
          }
          else
          {
              //$('#feedback_message').html("<span class='alert alert-danger text-center'>System Error. Try Again</span>");
              Toast.fire({
                        type: 'error',
                        title: 'Failed. Please contact System Administrator'
                });
          }
          console.log(data);
      },
      error: function(xhr)
      {
        $.unblockUI();
          Toast.fire({
            type: 'error',
            title: 'Your request could not be completed. Please try again: '+xhr.status
          });
      }

  });

});

  //edit cumulative risk
$(document).on("submit","#edit-cumulative-risk-form", function(e){
  e.preventDefault();

  var form_data = $(this).serializeArray();
  var form_url = 'controllers/reports/edit-cumulative-risks-directorate.php';
  var form_method = 'POST';

  $.ajax({
      data : form_data,
      url  : form_url,
      method : form_method,
      beforeSend:function()
      {
        $.blockUI({ message: blockui_spinner });
      },
      success:function(data){
          $.unblockUI();
          if(data == 'success')
          {
            Toast.fire({
                      type: 'success',
                      title: 'Successfully Modified'
              });
              ReportType('detailed_activities_related_risks_directorate');
          }
          else
          {
            Toast.fire({
                      type: 'error',
                      title: 'Failed. Please try again'
              });
          }
          console.log(data);
      },
      error: function(xhr)
      {
        $.unblockUI();
          Toast.fire({
            type: 'error',
            title: 'Your request could not be completed. Please try again: '+xhr.status
          });
      }

  });

});


function deleteCumulativeRisk(id) {

  Swal.fire({
      title: 'This Cumulative Risk will be deleted permanently!',
      text: "Are you sure to proceed?",
      type: 'question',
      showCancelButton: true,
      confirmButtonText: 'YES, DELETE',
      cancelButtonText: 'NO, KEEP!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {

        var form_data = {
          sid:id
        };
        var form_url = 'controllers/reports/process-delete-cumulative-risk.php';
        var form_method = 'POST';

        $.ajax({
            data : form_data,
            url  : form_url,
            method : form_method,
            beforeSend:function()
            {
              $.blockUI({ message: blockui_spinner });
            },
            success:function(data){
              $.unblockUI();
              if(data == "success")
              {
                Swal.fire(
                  'DELETED',
                  'Deleted Successfully',
                  'success'
                );
                var loader =`<div class="lds-spinner"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>`;
                var year_id = $('#select_period').val();
                var quarter_id = $('#select_quarter').val();
                var directorate_id = $('#directorates').val();
                $('#cumulative_risks_tab_generated').html(loader);
                $.post("views/reports/fetch-directorate-cumulative-risks.php",
                {
                  select_period: year_id,
                  select_quarter: quarter_id,
                  directorates: directorate_id
                },
                function(data,status){
                  $('#cumulative_risks_tab_generated').html(data);
                  console.log(data);
                });

              }
              else
              {
                Swal.fire(
                  'NOT DELETED',
                  'Failed to Delete. Please try again',
                  'error'
                );
              }
            },
            error: function(xhr)
            {
              $.unblockUI();
                Toast.fire({
                  type: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
                });
            }

        });

      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        Swal.fire(
          'Cancelled',
          'Not Deleted',
          'error'
        );
      }
  });
}
