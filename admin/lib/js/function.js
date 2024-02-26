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
$(document).on('click', '.delete_blog_btn', function (e) {
  e.preventDefault();
  var id = $(this).val();
  // alert(id);
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
          blog_table: id,
          delete_blog_btn: true,
        },
        success: function (response) {
          if (response == 200) {
            swal('Success!', 'News & Blog Deleted Successfully!', 'success');
            $('#blog_table').load(location.href + ' #blog_table');
          } else if (response == 500) {
            swal('Error!', 'Something went Wrong', 'error');
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
      success: function (response) {
        $('#feedback_form')[0].reset();
        alertify.success('Feedback submitted successfully!');
        setTimeout(function () {
          location.reload();
        }, 100000);
      },
      error: function (xhr, status, error) {
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
  function isAppointmentValid(appointmentDate) {
    const appointmentDay = appointmentDate.getDay(); // 0: Sunday, 1: Monday, ..., 6: Saturday
    const appointmentHour = appointmentDate.getHours();
    const appointmentMinute = appointmentDate.getMinutes();

    const clinicHours = {
      0: { start: 9, end: 13 }, // Sunday
      1: { start: 10, end: 18 }, // Monday
      2: { start: 10, end: 18 }, // Tuesday
      3: { start: null, end: null }, // Wednesday (CLOSED)
      4: { start: 10, end: 18 }, // Thursday
      5: { start: 10, end: 18 }, // Friday
      6: { start: 9, end: 18 }, // Saturday
    };

    if (
      clinicHours[appointmentDay].start === null ||
      clinicHours[appointmentDay].end === null
    ) {
      return false;
    }

    const openHour = clinicHours[appointmentDay].start;
    const closeHour = clinicHours[appointmentDay].end;

    if (
      (appointmentHour > openHour ||
        (appointmentHour === openHour && appointmentMinute >= 0)) &&
      (appointmentHour < closeHour ||
        (appointmentHour === closeHour && appointmentMinute === 0))
    ) {
      return true;
    } else {
      return false;
    }
  }

  $('#service').change(function () {
    var service = $(this).val();
    $('#price').val(getPriceForService(service));
  });

  $('#appointmentForm').submit(function (event) {
    event.preventDefault();
    var appointmentDate = new Date($('#appointment_date').val());

    // Check if the appointment is valid
    if (!isAppointmentValid(appointmentDate)) {
      alertify.error(
        'Please select a valid appointment date and time within the clinic hours.'
      );
      return;
    }

    var formData = $(this).serialize();
    $.ajax({
      type: 'POST',
      url: 'functions/process_sched.php',
      data: formData,
      dataType: 'json',
      success: function (response) {
        if (response.success) {
          alertify.success(response.message);
          $('#appointmentForm')[0].reset();
        } else {
          alertify.error(response.message);
        }
      },
      error: function (xhr) {
        console.error(xhr.responseText);
        alertify.error('Failed to schedule appointment. Please try again.');
      },
    });
  });
});
function getPriceForService(service) {
  switch (service) {
    case 'cleaning':
      return '4000.00';
    case 'deep_scaling':
      return '5000.00';
    case 'tooth_filling':
      return '5100.00';
    case 'fluoride_treatment':
      return '8060.00';
    case 'pit_fissure_sealant':
      return '4925.00';
    case 'braces':
      return '6000.00';
    case 'oral_surgery':
      return '50000.00';
    case 'cosmetic_dentistry':
      return '4805.00';
    case 'endodontics':
      return '8620.00';
    case 'pediatric_dentistry':
      return '5660.00';
    case 'dentures':
      return '6081.00';
    case 'crown_bridges':
      return '6990.00';
    case 'vaneers_laminates':
      return '80.00';
    case 'dental_implants':
      return '5200.00';
    default:
      return '';
  }
}