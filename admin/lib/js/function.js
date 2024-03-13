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

/*==================== FUNC FOR NOTIF USERS ====================*/
$(document).ready(function () {
  function fetchAppointmentNotifications() {
    $.ajax({
      url: 'functions/fetch_app_notif.php',
      method: 'GET',
      success: function (response) {
        $('#notificationBadge').text(response);
      },
    });
  }
  fetchAppointmentNotifications();
});

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

  $('#service, #service_modal').change(function () {
    var service = $(this).val();
    $('#price, #price_modal').val(getPriceForService(service));
  });

  $('#appointmentForm').submit(function (event) {
    event.preventDefault();
    var appointmentDate = new Date($('#appointment_date').val());

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
      error: function () {
        alertify.error('Failed to schedule appointment. Please try again.');
      },
    });
  });
});
function getPriceForService(service) {
  switch (service) {
    case 'Cleaning & polishing':
      return '4000.00';
    case 'Deep scaling':
      return '5000.00';
    case 'Tooth filling':
      return '5100.00';
    case 'Fluoride treatment':
      return '8060.00';
    case 'Pit & fissure sealant':
      return '4925.00';
    case 'Orthodontic braces':
      return '6000.00';
    case 'Oral Surgery':
      return '50000.00';
    case 'Cosmetic Dentistry':
      return '4805.00';
    case 'Endodontics':
      return '8620.00';
    case 'Pediatric Dentistry':
      return '5660.00';
    case 'Dentures':
      return '6081.00';
    case 'Crowns & bridges':
      return '6990.00';
    case 'Veneers/Laminates':
      return '80.00';
    case 'Dental Implants':
      return '5200.00';
    default:
      return '';
  }
}
