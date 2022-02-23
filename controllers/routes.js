

//this file listens to onclick events and responds to the necessary view
var static_page_title = " | HRMIS ";

var error_response = `<div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Failed!</strong> Sorry, your request could not be not completed. Please try again.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>`;

var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});

var blockui_spinner = `<div class="d-flex align-items-center text-primary">
  <strong>Loading...</strong>
  <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
</div>`;


/*var blockui_spinner = `<div class="d-flex align-items-center text-primary">
  <strong>Processing... Please wait</strong>
  <div class="spinner-border ml-auto" role="status" aria-hidden="true"></div>
</div>`;
*/
function CallSmartWizard()
{
  // Toolbar extra buttons
 var btnFinish = $('<button></button>').text('SUBMIT')
                                  .addClass('btn btn-info sw-btn-group-extra d-none')
                                  .on('click', function(){  });

  // SmartWizard initialize
  var wizard = $('#smartwizard-add-job-seeker-form').smartWizard({
    selected: 0, // Initial selected step, 0 = first step
    theme: 'arrows', // theme for the wizard, related css need to include for other than default theme
    justified: true, // Nav menu justification. true/false
    darkMode:false, // Enable/disable Dark Mode if the theme supports. true/false
    autoAdjustHeight: true, // Automatically adjust content height
    cycleSteps: false, // Allows to cycle the navigation of steps
    backButtonSupport: true, // Enable the back button support
    enableURLhash: false, // Enable selection of the step based on url hash
    transition: {
        animation: 'none', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
        speed: '400', // Transion animation speed
        easing:'' // Transition animation easing. Not supported without a jQuery easing plugin
    },
    toolbarSettings: {
        toolbarPosition: 'bottom', // none, top, bottom, both
        toolbarButtonPosition: 'right', // left, right, center
        showNextButton: true, // show/hide a Next button
        showPreviousButton: true, // show/hide a Previous button
        toolbarExtraButtons: [btnFinish] // Extra buttons to show on toolbar, array of jQuery input/buttons elements

    },
    anchorSettings: {
        anchorClickable: true, // Enable/Disable anchor navigation
        enableAllAnchors: false, // Activates all anchors clickable all times
        markDoneStep: true, // Add done state on navigation
        markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
        removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
        enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
    },
    keyboardSettings: {
        keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
        keyLeft: [37], // Left key code
        keyRight: [39] // Right key code
    },
    lang: { // Language variables for button
        next: 'Next',
        previous: 'Previous'
    },
    disabledSteps: [], // Array Steps disabled
    errorSteps: [], // Highlight step with errors
    hiddenSteps: [], // Hidden steps

  });


  $(wizard).on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
      if(stepNumber == "0")
      {
        var validator = $("#add-job-seeker-form").validate({
          rules: {
            strategic_objective: {
              required: true
            },
            project_name: {
              required: true,
              maxlength: 20
            },
            project_description: {
              required: true,
              maxlength: 100
            }
          }
        });
      }

      else if (stepNumber == "1")
      {
        var validator = $("#add-job-seeker-form").validate({
          rules: {
            project_start_date: {
              required: true,
              date:false
            },
            project_end_date: {
              required: true,
              date:false
            },
            duration: {
              required: true
            },
            project_phase: {
              required: true
            }
          }
        });
      }
      else if (stepNumber == "2")
      {
        var validator = $("#add-job-seeker-form").validate({
          rules: {
            funding_agency: {
              required: true
            }
          }
        });
      }

      else
      {
        var validator = $("#add-job-seeker-form").validate({
          rules: {
            project_owner: {
              required: true
            },
            senior_user: {
              required: true
            },
            senior_contractor: {
              required: true
            },
            project_advisor: {
              required: true
            }
          }
        });
      }

      if ($("#add-job-seeker-form").valid())
              {
                 return true;
              }
              else
              {
                 return false;
              }
  });

}
// view applicant Details
function viewJobApplicants(str)
{

  //var form_url = 'views/appliedCandidates.php';
    window.location.href = "job-detail.php";
    var form_method = 'POST';
    var id = str;
    var form_data = {
      id : id
    };


    $.ajax({
        data: form_data,
        url: form_url,
        method: form_method,

        beforeSend: function()
        {
            $.blockUI({ message: blockui_spinner });
        },
        success: function(data)
        {
  window.location.href = "job-detail.php";
            LoadDatatables();

        },
        error: function(xhr)
        {
          $.unblockUI();
          Toast.fire({
                    icon: 'error',
                    title: 'Your request could not be completed. Please try again: '+xhr.status
            });
        }
    });
}


function SelectProjectModule(str)
{
  var project_module = project_module;
//  var id= $('.select-project').val();
  //var applicant_email = $('.select-project').val();

var form_url = 'views/appliedCandidates.php';

  var form_method = 'POST';
  var id = str;
  var form_data = {
    id : id
  };


  $.ajax({
      data: form_data,
      url: form_url,
      method: form_method,

      beforeSend: function()
      {
          $.blockUI({ message: blockui_spinner });
      },
      success: function(data)
      {
        $('.project-module-data').removeClass('d-none')
          //place the response data in the response data id
          $.unblockUI();
          $('.project-module-data').html(data);
          LoadDatatables();

      },
      error: function(xhr)
      {
        $.unblockUI();
        Toast.fire({
                  icon: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
          });
      }
  });

}


// JOB Test
function SelectProjectModule2(str)
{
  var project_module = project_module;
//  var id= $('.select-project').val();
  //var applicant_email = $('.select-project').val();

var form_url = 'view-test.php';

  var form_method = 'POST';
  var id = str;
  var form_data = {
    id: id
  };


  $.ajax({
      data: form_data,
      url: form_url,
      method: form_method,

      beforeSend: function()
      {
          $.blockUI({ message: blockui_spinner });
      },
      success: function(data)
      {
        $('.project-module-data').removeClass('d-none')
          //place the response data in the response data id
          $.unblockUI();
          $('.project-module-data').html(data);
          LoadDatatables();

      },
      error: function(xhr)
      {
        $.unblockUI();
        Toast.fire({
                  icon: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
          });
      }
  });

}
// Answer tabb
$(document).on("click",".job-details-tab", function(){
  //destrory any active tooltips

  $('[data-toggle="tooltip"]').tooltip("dispose");
  var form_url = 'testDetails.php';
  var form_method = 'POST';
  var form_data = {
    id : $('.id').val()
  };
  $('a').removeClass('active');
  $('.stock-management-link').addClass('active');
  $(this).addClass('active');
  var link_title = $(this).text();
  var page_title =  link_title + static_page_title;

  $.ajax({
      data: form_data,
      url: form_url,
      method: form_method,

      beforeSend: function()
      {
          $.blockUI({ message: blockui_spinner });
      },
      success: function(data)
      {
          //place the response data in the response data id
          $.unblockUI();
          $('#current-title').html(page_title);
          $('#job-details-tab').html(data);
          LoadDatatables();

          //log page request
        var page_data = {
               page_id: 'job-details-tab',
               page_name: link_title

                };

        $.ajax({
            url:"controllers/data/PageController.php",
            method:"POST",
            data: page_data,
            success: function(data)
            {
                console.log(data);
            },
            error: function(xhr)
            {
                console.log(xhr);
            }
        });


      },
      error: function(xhr)
      {
        $.unblockUI();
        Toast.fire({
                  icon: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
          });
      }
  });
});

$(document).on("click",".title-details-tab", function(){
  //destrory any active tooltips

  $('[data-toggle="tooltip"]').tooltip("dispose");
  var form_url = 'titleDetails.php';
  var form_method = 'POST';
  var form_data = {
    id : $('.id').val()
  };
  $('a').removeClass('active');
  $('.stock-management-link').addClass('active');
  $(this).addClass('active');
  var link_title = $(this).text();
  var page_title =  link_title + static_page_title;

  $.ajax({
      data: form_data,
      url: form_url,
      method: form_method,

      beforeSend: function()
      {
          $.blockUI({ message: blockui_spinner });
      },
      success: function(data)
      {
          //place the response data in the response data id
          $.unblockUI();
          $('#current-title').html(page_title);
          $('#title-details-tab').html(data);
          LoadDatatables();

          //log page request
        var page_data = {
               page_id: 'title-details-tab',
               page_name: link_title

                };

        $.ajax({
            url:"controllers/data/PageController.php",
            method:"POST",
            data: page_data,
            success: function(data)
            {
                console.log(data);
            },
            error: function(xhr)
            {
                console.log(xhr);
            }
        });


      },
      error: function(xhr)
      {
        $.unblockUI();
        Toast.fire({
                  icon: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
          });
      }
  });
});

// Answer tabb
$(document).on("click",".resume", function(){
  //destrory any active tooltips

  $('[data-toggle="tooltip"]').tooltip("dispose");
  var form_url = 'views/profDetails/resume.php';
  var form_method = 'POST';
  var form_data = {
    email : $('.email').val()
  };

  $('a').removeClass('active');
  $('.stock-management-link').addClass('active');
  $(this).addClass('active');
  var link_title = $(this).text();
  var page_title =  link_title + static_page_title;

  $.ajax({
      data: form_data,
      url: form_url,
      method: form_method,

      beforeSend: function()
      {
          $.blockUI({ message: blockui_spinner });
      },
      success: function(data)
      {
          //place the response data in the response data id
          $.unblockUI();
          $('#current-title').html(page_title);
          $('#resume').html(data);
          LoadDatatables();

          //log page request
        var page_data = {
               page_id: 'resume',
               page_name: link_title

                };

        $.ajax({
            url:"controllers/data/PageController.php",
            method:"POST",
            data: page_data,
            success: function(data)
            {
                console.log(data);
            },
            error: function(xhr)
            {
                console.log(xhr);
            }
        });


      },
      error: function(xhr)
      {
        $.unblockUI();
        Toast.fire({
                  icon: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
          });
      }
  });
});




$(document).on("click",".test-details-tab", function(){
  //destrory any active tooltips

  $('[data-toggle="tooltip"]').tooltip("dispose");
  var form_url = 'underTake.php';
  var form_method = 'POST';
  var form_data = {
    job_title : $('.job_title').val()
  };

  $('a').removeClass('active');
  $('.stock-management-link').addClass('active');
  $(this).addClass('active');
  var link_title = $(this).text();
  var page_title =  link_title + static_page_title;

  $.ajax({
      data: form_data,
      url: form_url,
      method: form_method,

      beforeSend: function()
      {
          $.blockUI({ message: blockui_spinner });
      },
      success: function(data)
      {
          //place the response data in the response data id
          $.unblockUI();
          $('#current-title').html(page_title);
          $('#test-details-tab').html(data);
          LoadDatatables();

          //log page request
        var page_data = {
               page_id: 'job-details-tab',
               page_name: link_title

                };

        $.ajax({
            url:"controllers/data/PageController.php",
            method:"POST",
            data: page_data,
            success: function(data)
            {
                console.log(data);
            },
            error: function(xhr)
            {
                console.log(xhr);
            }
        });


      },
      error: function(xhr)
      {
        $.unblockUI();
        Toast.fire({
                  icon: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
          });
      }
  });
});


$(document).on("click",".test-timer-tab", function(){
  //destrory any active tooltips

  $('[data-toggle="tooltip"]').tooltip("dispose");
  var form_url = 'timerset.php';
  var form_method = 'POST';
  var form_data = {
    job_title : $('.job_title').val()
  };

  $('a').removeClass('active');
  $('.stock-management-link').addClass('active');
  $(this).addClass('active');
  var link_title = $(this).text();
  var page_title =  link_title + static_page_title;

  $.ajax({
      data: form_data,
      url: form_url,
      method: form_method,

      beforeSend: function()
      {
          $.blockUI({ message: blockui_spinner });
      },
      success: function(data)
      {
          //place the response data in the response data id
          $.unblockUI();
          $('#current-title').html(page_title);
          $('#test-timer-tab').html(data);
          LoadDatatables();

          //log page request
        var page_data = {
               page_id: 'test-timer-tab',
               page_name: link_title

                };

        $.ajax({
            url:"controllers/data/PageController.php",
            method:"POST",
            data: page_data,
            success: function(data)
            {
                console.log(data);
            },
            error: function(xhr)
            {
                console.log(xhr);
            }
        });


      },
      error: function(xhr)
      {
        $.unblockUI();
        Toast.fire({
                  icon: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
          });
      }
  });
});


function viewTestDetails(str)
{
  $('#response-data').html('');
  //destrory any active tooltips
  $('[data-toggle="tooltip"]').tooltip("dispose");

  var form_url = 'test_management.php';
  var form_method = 'POST';
  var id = str;

  var form_data = {
    id: id
  };

  $('a').removeClass('active');
  $('.create-test-link').addClass('active');
  var link_title = $('.all-post-vaccancy-link').text();
  var page_title =  $('.all-post-vaccancy-link').text() + id + static_page_title;

  $.ajax({
      data: form_data,
      url: form_url,
      method: form_method,

      beforeSend: function()
      {
          $.blockUI({ message: blockui_spinner });
      },
      success: function(data)
      {

          //place the response data in the response data id
          $.unblockUI();
          $('textarea').autosize();
          $('#current-title').html(page_title);
          $('#response-data').html(data);
          $('.performance-management-navbar').addClass('d-none');
          $('.risk-management-navbar').addClass('d-none');
          $('.switch-to-module-standard-risks').addClass('d-none');
          $('.switch-to-module-standard-performance').removeClass('d-none');
          $('.job-details-tab').click();
            LoadDatatables();



          //log page request
        var page_data = {
               page_id: 'all-post-vaccancy-link',
               page_name: page_title

                };

        $.ajax({
            url:"controllers/data/PageController.php",
            method:"POST",
            data: page_data,
            success: function(data)
            {
                console.log(data);
            },
            error: function(xhr)
            {
                console.log(xhr);
            }
        });

      },
      error: function(xhr)
      {
        $.unblockUI();
        Toast.fire({
                  icon: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
          });
      }
  });
}

// select candidate Details
function SelectCandidateModule(str)
{
  var project_module = project_module;
//  var id= $('.select-project').val();
  //var applicant_email = $('.select-project').val();

var form_url = 'views/allCandidates.php';

  var form_method = 'POST';
  var id = str;
  var form_data = {
    id : id
  };


  $.ajax({
      data: form_data,
      url: form_url,
      method: form_method,

      beforeSend: function()
      {
          $.blockUI({ message: blockui_spinner });
      },
      success: function(data)
      {
        $('.project-module-data').removeClass('d-none')
          //place the response data in the response data id
          $.unblockUI();
          $('.project-module-data').html(data);
          LoadDatatables();

      },
      error: function(xhr)
      {
        $.unblockUI();
        Toast.fire({
                  icon: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
          });
      }
  });

}

function SelectResponse(str)
{
  var project_module = project_module;
//  var id= $('.select-project').val();
  //var applicant_email = $('.select-project').val();

var form_url = 'testResponses.php';

  var form_method = 'POST';
  var id = str;
  var form_data = {
    id : id
  };


  $.ajax({
      data: form_data,
      url: form_url,
      method: form_method,

      beforeSend: function()
      {
          $.blockUI({ message: blockui_spinner });
      },
      success: function(data)
      {
        $('.project-module-data').removeClass('d-none')
          //place the response data in the response data id
          $.unblockUI();
          $('.project-module-data').html(data);
          LoadDatatables();

      },
      error: function(xhr)
      {
        $.unblockUI();
        Toast.fire({
                  icon: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
          });
      }
  });

}


//end of smart wizard

$(document).on("click",".user-selection-link", function(){
  //destrory any active tooltips

  $('[data-toggle="tooltip"]').tooltip("dispose");
  var form_url = 'views/user/user.php';
  var form_method = 'POST';
  var form_data = {
  };

  var link_title = $(this).text();
  var page_title =  link_title + static_page_title;

  $.ajax({
      data: form_data,
      url: form_url,
      method: form_method,

      beforeSend: function()
      {
          $.blockUI({ message: blockui_spinner });
      },
      success: function(data)
      {
          //place the response data in the response data id
          $.unblockUI();
          $('#current-title').html(page_title);
          $('#response-data').html(data);
          $('.current-breadcrumb').html(link_title);
          $('#password').focus();


      },
      error: function(xhr)
      {
        $.unblockUI();
        Toast.fire({
                  icon: 'error',
                  title: 'Your request could not be completed. Please try again: '+xhr.status
          });
      }
  });
});
// recruitment MANAGEMENT
