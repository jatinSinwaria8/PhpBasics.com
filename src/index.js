$(document).ready(function () {
  $("#submit").prop("disabled", true);
  let name_regex = /[^A-Za-z]/g;

  $("#firstname").keyup(function () {
    $("#submit").prop("disabled", true);
    let first_name_error = true;
    let firstname = $(this).val();
    let clean_firstname = firstname.replace(name_regex, "");

    if (firstname.length > 10) {
      $("#first-name-err").html("Max Length 10 Characters");
      $(this).val(firstname.slice(0, 10));
    } else if (firstname.length <= 0) {
      $("#first-name-err").html("First name cannot be empty");
    } else if (firstname !== clean_firstname) {
      $("#first-name-err").html("Only Alpabets allowed");
      $(this).val(clean_firstname);
    } else {
      first_name_error = false;
      $("#submit").prop("disabled", false);
    }

    if (first_name_error) {
      $("#first-name-err").show();
      $("#submit").prop("disabled", true);
    } else {
      $("#first-name-err").hide();
    }
  });

  $("#lastname").keyup(function () {
    $("#submit").prop("disabled", true);
    let lastname = $(this).val();
    let last_name_error = true;
    let clean_lastname = lastname.replace(name_regex, "");
    if (lastname.length > 10) {
      $("#last-name-err").html("Max Length 10 Characters");
      $(this).val(lastname.slice(0, 10));
    } else if (lastname.length <= 0) {
      $("#last-name-err").html("Last name cannot be empty");
    } else if (lastname !== clean_lastname) {
      $("#last-name-err").html("Only Alpabets allowed");
      $(this).val(clean_lastname);
    } else {
      last_name_error = false;
      $("#submit").prop("disabled", false);
    }

    if (last_name_error) {
      $("#last-name-err").show();
      $("#submit").prop("disabled", true);
    } else {
      $("#last-name-err").hide();
    }
  });

  let phone_regex = /^\+91[1-9][0-9]{9}$/;
  $("#phone").keyup(function () {
    $("#submit").prop("disabled", true);
    let phone = $(this).val();
    let phone_error = true;
    if (phone.length <= 0) {
      $("#phone-err").html("Phone number cannot be empty");
    } else if (!phone_regex.test(phone)) {
      $("#phone-err").html(
        "Phone number should start with +91 and 10 digits after"
      );
    } else if (phone.length != 13) {
      $(this).val(phone.slice(0, 13));
      $("#phone-err").html("Phone number must contain 10 digits after +91");
    } else {
      phone_error = false;
      $("#submit").prop("disabled", false);
    }
    if (phone_error) {
      $("#phone-err").show();
      $("#submit").prop("disabled", true);
    } else {
      $("#phone-err").hide();
    }
  });

  $("#textarea").keyup(function () {
    let subject = [
      "English",
      "Maths",
      "Science",
      "Hindi",
      "Physics",
      "Chemistry",
      "History",
      "Geography",
    ];
    $("#submit").prop("disabled", true);
    let textarea = $(this).val();
    let marks_error = false;
    let marks_arr = textarea.split("\n");

    function marks_check(sub) {
      for (i = 0; i < subject.length; i++) {
        if (subject[i] == sub) {
          return true;
        }
      }
      return false;
    }

    for (i = 0; i < marks_arr.length; i++) {
      let marks = marks_arr[i].split("|");
      if (
        !marks_check(marks[0]) ||
        !(parseInt(marks[1]) >= 0 && parseInt(marks[1]) <= 100)
      ) {
        marks_error = true;
        break;
      } else {
        marks_error = false;
      }
    }

    if (marks_error) {
      $("#submit").prop("disabled", true);
      $("#marks-err").show();
      $("#marks-err").html("Marks should be like SUBJECT|MARKS");
    } else {
      $("#marks-err").hide();
      $("#submit").prop("disabled", false);
    }
  });

  let email_regex = /^[^\s@]+@[^\s@\d]+\.[^\s@\d]+$/;
  $("#email").keyup(function () {
    $("#submit").prop("disabled", true);
    let email = $(this).val();
    let email_error = true;
    if (!email_regex.test(email)) {
      $("#email-err").html("Wrong email syntax example@email.com");
    } else {
      email_error = false;
      $("#submit").prop("disabled", false);
    }
    if (email_error) {
      $("#email-err").show();
      $("#submit").prop("disabled", true);
    } else if (email.length <= 0) {
      $("#email-err").html("Email number cannot be empty");
    } else {
      $("#email-err").hide();
    }
  });

  // fullname live update logic with keyup() function
  $("#firstname, #lastname").keyup(function () {
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var fullname = firstname + " " + lastname;
    // final fullname string display
    $("#fullname").val(fullname);
  });
});
