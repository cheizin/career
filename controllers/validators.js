function CallSmartWizard()
{
  // Toolbar extra buttons
 var btnFinish = $('<button></button>').text('SUBMIT')
                                  .addClass('btn btn-info sw-btn-group-extra')
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
            fName: {
              required: true
            },
            lName: {
              required: true,
              maxlength: 20
            },
            dob: {
              required: true,
              maxlength: 20
            }
          }
        });
      }

      else if (stepNumber == "1")
      {
        var validator = $("#add-job-seeker-form").validate({
          rules: {
            Email: {
              required: true,

            },
            location: {
              required: true,

            },
            contact: {
              required: true
            },
            nationality: {
              required: true
            }
          }
        });
      }
      else if (stepNumber == "2")
      {
        var validator = $("#add-job-seeker-form").validate({
          rules: {
            highestQualification: {
              required: true
            },
            currentPosition: {
              required: true,

            },
            companyName: {
              required: true
            },
            experience: {
              required: true
            }
          }
        });
      }

      else
      {
        var validator = $("#add-job-seeker-form").validate({
          rules: {
            password: {
              required: true
            },
            confirm: {
              required: true
            },

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

//end of smart wizard
//call smart wizard 2
function CallSmartWizard2()
{
  // Toolbar extra buttons
 var btnFinish = $('<button></button>').text('SUBMIT')
                                  .addClass('btn btn-info sw-btn-group-extra')
                                  .on('click', function(){  });

  // SmartWizard initialize
  var wizard = $('#smartwizard-add-recruiter-form').smartWizard({
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
        var validator = $("#add-recruiter-form").validate({
          rules: {
            fName: {
              required: true
            },
            lName: {
              required: true,
              maxlength: 20
            },
            industry_name: {
              required: true,
              maxlength: 100
            }
          }
        });
      }

      else if (stepNumber == "1")
      {
        var validator = $("#add-recruiter-form").validate({
          rules: {
            Email: {
              required: true,
              date:false
            },
            location: {
              required: true,
              date:false
            },
            contact: {
              required: true
            },
            nationality: {
              required: true
            }
          }
        });
      }
      else if (stepNumber == "2")
      {
        var validator = $("#add-recruiter-form").validate({
          rules: {
            highestQualification: {
              required: true
            }
          }
        });
      }

      else
      {
        var validator = $("#add-recruiter-form").validate({
          rules: {
            password: {
              required: true
            },
            confirm: {
              required: true
            },

          }
        });
      }

      if ($("#add-recruiter-form").valid())
              {
                 return true;
              }
              else
              {
                 return false;
              }
  });

}

function CallSmartWizard3()
{
  // Toolbar extra buttons
 var btnFinish = $('<button></button>').text('SUBMIT')
                                  .addClass('btn btn-info sw-btn-group-extra')
                                  .on('click', function(){  });

  // SmartWizard initialize
  var wizard = $('#smartwizard-add-job-vaccancy-form').smartWizard({
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
        var validator = $("#add-job-vaccancy-form").validate({
          rules: {
            fName: {
              required: true
            },
            lName: {
              required: true,
              maxlength: 20
            },
            industry_name: {
              required: true,
              maxlength: 100
            }
          }
        });
      }

      else if (stepNumber == "1")
      {
        var validator = $("#add-job-vaccancy-form").validate({
          rules: {
            Email: {
              required: true,
              date:false
            },
            location: {
              required: true,
              date:false
            },
            contact: {
              required: true
            },
            nationality: {
              required: true
            }
          }
        });
      }
      else if (stepNumber == "2")
      {
        var validator = $("#add-job-vaccancy-form").validate({
          rules: {
            highestQualification: {
              required: true
            }
          }
        });
      }

      else
      {
        var validator = $("#add-job-vaccancy-form").validate({
          rules: {
            password: {
              required: true
            },
            confirm: {
              required: true
            },

          }
        });
      }

      if ($("#add-job-vaccancy-form").valid())
              {
                 return true;
              }
              else
              {
                 return false;
              }
  });

}

//end of smart wizard
$(document.body).on("change",".select2",function(){
      $(this).valid();
});
$(document.body).on("change",".project_start_date",function(){
      $(this).valid();
});
$(document.body).on("change",".project_end_date",function(){
      $(this).valid();
});
$(document.body).on("change",".project_duration_in_days",function(){
      $(this).valid();
});
$(document.body).on("change",".project_duration",function(){
      $(this).valid();
});

$(document.body).on("change",".date-field",function(){
      $(this).valid();
});

//bootstrap styling for errors
jQuery.validator.setDefaults({
    onfocusout: function (e) {
        this.element(e);
    },
    onkeyup: false,

    highlight: function (element) {
        jQuery(element).closest('.form-control').addClass('is-invalid');
    },
    unhighlight: function (element) {
        jQuery(element).closest('.form-control').removeClass('is-invalid');
        jQuery(element).closest('.form-control').addClass('is-valid');
    },

    errorElement: 'div',
    errorClass: 'invalid-feedback',
    errorPlacement: function (error, element) {
        if (element.parent('.input-group-prepend').length) {
            $(element).siblings(".invalid-feedback").append(error);
            //error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    },
});
