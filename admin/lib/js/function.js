/*==================== ALERT FOR DELETE USER ====================*/
$(document).on('click', '.delete_user_btn', function (e) {
  e.preventDefault();
  var id = $(this).val();
  swal({
    title: 'Are you sure?',
    text: 'Once deleted, you will not be able to recover',
    icon: 'warning',
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.ajax({
        method: 'POST',
        url: 'code.php',
        data: {
          user_table: id,
          delete_user_btn: true,
        },
        success: function (response) {
          if (response == 200) {
            swal('Success!', 'User Deleted Successfully!', 'success');
            $('#user_table').load(location.href + ' #user_table');
          } else if (response == 500) {
            swal('Error!', 'Something went Wrong', 'error');
          }
        },
      });
    }
  });
});

/*==================== ALERT FOR DELETE NEWS & BLOG ====================*/
$(document).on('click', '.delete_blog_btn', function () {
  var blogId = $(this).val();
  swal({
    title: 'Are you sure?',
    text: 'Once deleted, you will not be able to recover',
    icon: 'warning',
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.ajax({
        type: 'POST',
        url: 'code.php',
        data: {
          delete_blog_btn: true,
          all_blog_table: blogId,
        },
        success: function (response) {
          if (response == 200) {
            swal('Success!', 'Appointment Deleted Successfully!', 'success');
            $('#all_blog_table').load(location.href + ' #all_blog_table');
          } else if (response == 404) {
            swal('Error!', 'News & Blog not found', 'error');
          } else {
            swal('Error!', 'Something went wrong', 'error');
          }
        },
      });
    }
  });
});

/*==================== ALERT FOR DELETE USER APPOINTMENT ====================*/
$(document).on('click', '.delete_appointment_btn', function () {
  var appointmentId = $(this).val();
  swal({
    title: 'Are you sure?',
    text: 'Once deleted, you will not be able to recover',
    icon: 'warning',
    buttons: true,
    dangerMode: true,
  }).then((willDelete) => {
    if (willDelete) {
      $.ajax({
        type: 'POST',
        url: 'admin/code.php',
        data: {
          delete_appointment_btn: true,
          appointment_history_table: appointmentId,
        },
        success: function (response) {
          if (response == 200) {
            swal('Success!', 'Appointment Deleted Successfully!', 'success');
            $('#appointment_history_table').load(
              location.href + ' #appointment_history_table'
            );
          } else if (response == 404) {
            swal('Error!', 'Appointment not found', 'error');
          } else {
            swal('Error!', 'Something went wrong', 'error');
          }
        },
      });
    }
  });
});

/*==================== FUNC FOR FEEDBACK PROCESS ====================*/
$(document).ready(function () {
  $('#feedback_form').submit(function (e) {
    e.preventDefault();
    var email = $('#email').val();
    if (!isValidEmail(email)) {
      alertify.error('Please enter a valid email address.');
      return false;
    }
    $.ajax({
      type: 'POST',
      url: 'functions/process_feedback.php',
      data: $(this).serialize(),
      success: function () {
        $('#feedback_form')[0].reset();
        alertify.success('Feedback submitted successfully!');
        setTimeout(function () {
          location.reload();
        }, 100000);
      },
      error: function () {
        alertify.error('Error submitting feedback.');
      },
    });
  });
});
function isValidEmail(email) {
  var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return pattern.test(email);
}

/*==================== FUNC FOR APPOINTMENT PROCESS ====================*/
$(document).ready(function () {
  $('#service').change(function () {
    var service = $(this).val();
    $('#price').val(getPriceForService(service));
    $(this).removeClass('is-invalid');
  });

  $('#dentist').change(function () {
    if ($(this).val() !== 'Choose Dentist') {
      $(this).removeClass('is-invalid');
    }
  });

  function showNextForm(currentFormId, nextFormId) {
    $(currentFormId).hide();
    $(nextFormId).show();
  }

  function showPreviousForm(currentFormId, previousFormId) {
    $(currentFormId).hide();
    $(previousFormId).show();
  }

  function validateForm(formId) {
    var isValid = true;
    var isEmailValid = true;
    var hasEmptyField = false;
    $(
      formId +
        ' input[required]:visible, ' +
        formId +
        ' select[required]:visible'
    ).each(function () {
      if ($(this).val() === '') {
        isValid = false;
        hasEmptyField = true;
        $(this).addClass('is-invalid');
        return false; // Exit the loop
      }
      if ($(this).attr('type') === 'email') {
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test($(this).val())) {
          isEmailValid = false;
          $(this).addClass('is-invalid');
        }
      }
    });

    if (!isValid && hasEmptyField) {
      alertify.error('All fields are required.');
    } else if (!isEmailValid) {
      alertify.error('Please use a valid email.');
    }

    // Check dentist and service
    if (formId === '#appointmentForm') {
      if ($('#dentist').val() === 'Choose Dentist') {
        alertify.error('Please select a dentist.');
        $('#dentist').addClass('is-invalid');
        isValid = false;
      }
      if ($('#service').val() === 'Dental services offered:') {
        alertify.error('Please select a service.');
        $('#service').addClass('is-invalid');
        isValid = false;
      }
    }

    return isValid && isEmailValid && !hasEmptyField;
  }

  $('#nextButton').click(function () {
    if (!validateForm('#appointmentForm')) {
      return;
    }
    showNextForm('#appointmentForm', '#personalInfoForm');
  });

  $('#nextButton2').click(function () {
    if (!validateForm('#personalInfoForm')) {
      return;
    }
    showNextForm('#personalInfoForm', '#contactInfoForm');
  });

  $('#prevButton').click(function () {
    showPreviousForm('#personalInfoForm', '#appointmentForm');
  });

  $('#prevButton2').click(function () {
    showPreviousForm('#contactInfoForm', '#personalInfoForm');
  });

  $('#submitButton').click(function () {
    if (!validateForm('#contactInfoForm')) {
      return;
    }
    var formData = $('#appointmentForm').serialize();
    $.ajax({
      type: 'POST',
      url: 'functions/process_sched.php',
      data: formData,
      dataType: 'json',
      success: function (response) {
        alertify.success(response.message);
        $('#appointmentForm')[0].reset();
      },
      error: function (error) {
        alertify.error('Error occurred while scheduling appointment.');
      },
    });
  });
});
function getPriceForService(service) {
  switch (service) {
    case 'Cleaning & polishing':
      return '4000.00 to 5000.00';
    case 'Deep scaling':
      return '5000.00 to 6000.00';
    case 'Tooth filling':
      return '5100.00 to 5000.00';
    case 'Fluoride treatment':
      return '8060.00 to 5000.00';
    case 'Pit & fissure sealant':
      return '4925.00 to 5000.00';
    case 'Orthodontic braces':
      return '6000.00 to 5000.00';
    case 'Oral Surgery':
      return '50000.00 to 5000.00';
    case 'Cosmetic Dentistry':
      return '4805.00 to 5000.00';
    case 'Endodontics':
      return '8620.00  to 5000.00';
    case 'Pediatric Dentistry':
      return '5660.00 to 5000.00';
    case 'Dentures':
      return '6081.00 to 5000.00';
    case 'Crowns & bridges':
      return '6990.00 to 5000.00';
    case 'Veneers/Laminates':
      return '80.00';
    case 'Dental Implants':
      return '5200.00 to 5000.00';
    default:
      return '';
  }
}