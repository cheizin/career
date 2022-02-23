
$(document).ready(function () {
  /*var xhr = new XMLHttpRequest();
  xhr.open("GET", "../../functions/get-strategic-objective-id.php", true);
  xhr.onreadystatechange = function receiveUpdate(e) {
      $("#strategic_objective_id").val("SOB"+this.responseText);
  }
  xhr.send();
  */
/*
  $.ajax({
    type:'POST',
    url:'../../functions/get-strategic-objective-id.php',
    success:function(data){
        $("#strategic_objective_id").val("SOB"+data);
    }
});
$.ajax({
  type:'POST',
  url:'../../functions/get-strategic-outcome-id.php',
  success:function(data){
      $("#strategic_outcome_id").val("SOT"+data);
      console.log(data);
  }
});
*/
  var navListItems = $('div.setup-panel div a'),
          allWells = $('.setup-content'),
          allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function (e) {
      e.preventDefault();
      var $target = $($(this).attr('href')),
              $item = $(this);

      if (!$item.hasClass('disabled')) {
          navListItems.removeClass('btn-primary').addClass('btn-default');
          $item.addClass('btn-primary');
          allWells.hide();
          $target.show();
          $target.find('input:eq(0)').focus();
      }
  });


  $('div.setup-panel div a.btn-primary').trigger('click');



  //START ADD strategic objective form
  $('#add-strategic-objective-form').submit(function(f){
     f.preventDefault();

     var form_data = $(this).serialize();
     var form_url = '../../functions/process-add-strategic-objective-form.php';
     var form_method = 'POST';
     var curStep = $(this).closest(".setup-content"),
         curStepBtn = curStep.attr("id"),
         nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
         curInputs = curStep.find("input[type='text'],input[type='url']"),
         isValid = true;

     $.ajax({
         data : form_data,
         url  : form_url,
         method : form_method,
         beforeSend: function()
         {
           $("#add-strategic-objective-button").prop('disabled',true);
           $("#add-strategic-objective-button").html('<i class="fa fa-spinner fa-spin"></i>  saving...');
         },

         success:function(data){
            //enable the button and clear the saving message
            $("#add-strategic-objective-button").prop('disabled',false);
            $("#add-strategic-objective-button").html('Save & Continue');
             if(data == 'success')
             {

              $('#strategic_objective_feedback_message').html("<div class='alert alert-success text-center alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Saved!</div>");

                setTimeout(function(){
                  nextStepWizard.removeAttr('disabled').delay(5000).trigger('click');
                  $('#strategic_objective_feedback_message').html('');
                }, 2000);
             }
             else if(data == 'failed')
             {
                var failed_message =  "<div class='alert alert-danger text-center alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Failed!</div>";
                 $('#strategic_objective_feedback_message').html(failed_message.data);
             }
             else
             {
                 $('#strategic_objective_feedback_message').html("<div class='alert alert-danger text-center alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Failed. Please try again!</div>");
             }
             console.log(data);
         }

     });

  });

  //END ADD strategic objective form



  //START ADD strategic outcome form
  $('#add-strategic-outcome-form').submit(function(f){
     f.preventDefault();

     var form_data = $(this).serialize();
     var form_url = '../../functions/process-add-strategic-outcome-form.php';
     var form_method = 'POST';
     var curStep = $(this).closest(".setup-content"),
         curStepBtn = curStep.attr("id"),
         nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
         curInputs = curStep.find("input[type='text'],input[type='url']"),
         isValid = true;

     $.ajax({
         data : form_data,
         url  : form_url,
         method : form_method,
         beforeSend: function()
         {
           $("#add-strategic-outcome-button").prop('disabled',true);
           $("#add-strategic-outcome-button").html('<i class="fa fa-spinner fa-spin"></i>  saving...');
         },

         success:function(data){
            //enable the button and clear the saving message
            $("#add-strategic-outcome-button").prop('disabled',false);
            $("#add-strategic-outcome-button").html('Save & Continue');
             if(data == 'success')
             {

              $('#strategic_outcome_feedback_message').html("<div class='alert alert-success text-center alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Saved!</div>");

                setTimeout(function(){
                  nextStepWizard.removeAttr('disabled').delay(5000).trigger('click');
                  $('#strategic_outcome_feedback_message').html('');
                }, 2000);
             }
             else if(data == 'failed')
             {
                var failed_message =  "<div class='alert alert-danger text-center alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Failed!</div>";
                 $('#strategic_outcome_feedback_message').html(failed_message.data);
             }
             else
             {
                 $('#strategic_outcome_feedback_message').html("<div class='alert alert-danger text-center alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Failed. Please try again!</div>");
             }
             console.log(data);
         }

     });

  });

  //END ADD strategic outcome form



  //START ADD strategic kpi form
  $('#add-strategic-kpi-form').submit(function(f){
     f.preventDefault();

     var form_data = $(this).serialize();
     var form_url = '../../functions/process-add-strategic-kpi-form.php';
     var form_method = 'POST';
     var curStep = $(this).closest(".setup-content"),
         curStepBtn = curStep.attr("id"),
         nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
         curInputs = curStep.find("input[type='text'],input[type='url']"),
         isValid = true;

     $.ajax({
         data : form_data,
         url  : form_url,
         method : form_method,
         beforeSend: function()
         {
           $("#add-strategic-kpi-button").prop('disabled',true);
           $("#add-strategic-kpi-button").html('<i class="fa fa-spinner fa-spin"></i>  saving...');
         },

         success:function(data){
            //enable the button and clear the saving message
            $("#add-strategic-kpi-button").prop('disabled',false);
            $("#add-strategic-kpi-button").html('Save & Continue');
             if(data == 'success')
             {

              $('#strategic_kpi_feedback_message').html("<div class='alert alert-success text-center alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Saved & Submitted!</div>");

                setTimeout(function(){
                  location.reload();
                  $('#strategic_kpi_feedback_message').html('');
                }, 2000);
             }
             else if(data == 'failed')
             {
                var failed_message =  "<div class='alert alert-danger text-center alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Failed!</div>";
                 $('#strategic_kpi_feedback_message').html(failed_message.data);
             }
             else
             {
                 $('#strategic_kpi_feedback_message').html("<div class='alert alert-danger text-center alert-dismissible'> <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Failed. Please try again!</div>");
             }
             console.log(data);
         }

     });

  });

  //END ADD strategic kpi form
});
