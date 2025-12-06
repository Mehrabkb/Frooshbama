$("#btn-verification-code").click(function(){
    let that = $(this);
    let url = that.attr('data-url');
    let mobile = $("#mobileInput").val();
    $.ajax({
        url : url,
        method : "POST",
        data : {
            "mobile" : mobile
        },
        success:function(res){
            // res = JSON.parse(res);
            if(res.status == 200){
                showAlert("لطفا کد فعالسازی را وارد کنید" , "sucess");
            }else{
                showAlert("خطایی رخ داده است" , "error");
            }

        }
    })
})

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
