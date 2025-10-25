function btnVerificationClick() {
  let mobileInput = $('#mobileInput').val();
  const mobileRegex = /^09\d{9}$/g;
  if (mobileInput.match(mobileRegex)) {
    let url = "https://frooshbama.ir/verifycode.php";
    let method = "POST";
    $.ajax({
      url: url,
      method: method,
      data: {
        mobile: mobileInput,
        apiKey: "asghar",
      },
      success: function (result) {
        result = JSON.parse(result);
        if (result.status == 200) {
          mobileInput.prop('readonly', true)
          showAlert(result.msg, "sucess");
          $('#btn-verification-code').prop('disabled' , true);
          
          setTimeout(function(){
              $('#btn-verification-code').prop('disabled' , false);
          } , 120000)
        } else {
          showAlert(result.msg, "error");
        }
        /*
            {
                status : 200,
                message : 'با موفقیت انجام شد'
            } 
            OR 
            {
                status : 101,
                message : 'شماره موبایل نامعتبر است'
            }
        
        */
      },
      error: function () {
        showAlert("خطایی در ارسال کد رخ داده است", "sucess");
      },
    });
  } else {
    showAlert("شماره موبایل نامعتبر است", "error");
  }
}

function showAlert(msg, type) {
  let alertF = document.querySelector(".alert-section");
  alertF.innerHTML = msg;
  alertF.classList.toggle("d-none");
  let typeClass = "";
  switch (type) {
    case "sucess":
      typeClass = "alert-success";
      break;
    case "error":
      typeClass = "alert-danger";
  }
  alertF.classList.add(typeClass);
  $('#btn-verification-code').prop('disabled' , true);
  setTimeout(function () {
    alertF.classList.toggle("d-none");
    alertF.classList.remove(typeClass);
    $('#btn-verification-code').prop('disabled' , false);
  }, 4000);
}

function verification_input_code_change(element){
  let value = element.value;
  let btnSubmit = $('#btn-submit');
  if(!value.match(/\d/g)){
      element.value = '';
  }
  let checkBox = document.getElementById("checkBox").checked;
  if(value.length == 4 && checkBox == true){
      btnSubmit.prop('disabled' , false);
  }else{
      btnSubmit.prop('disabled' , true);
  }
}

function check_box_change(element){
  checkboxvalue = element.checked;
  input = document.getElementById("verificationInput").value;
  if (checkboxvalue == true && input.length == 4){
    $('#btn-submit').prop('disabled' , false);
  }else{
    $('#btn-submit').prop('disabled' , true);
  }
}