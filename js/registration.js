function checkForm() {
  let userName = document.getElementById("username").value;

  let phone = document.getElementById("phone").value;

  let phoneCanSubmit, nameCanSubmit = false;

  function checkUserName() {
    if (userName == "" || !isNaN(userName) || !userName.match(/^[A-Za-z]*\s{1}[A-Za-z]*$/)) {
      nameCanSubmit = false;
      console.log("Put a username");
    } else {
      nameCanSubmit = true;
      console.log("Thank You");
    }

  };

  checkUserName();

  function checkPhoneNumber() {
    if (!phone.match(/^[0-9]*\s{1}[0-9]*\s{1}[0-9]*$/)) {
      phoneCanSubmit = false;
      console.log("Please Put in a proper phone number");
    } else {
      phoneCanSubmit = true;
      console.log("Thank you");
      cansubmit = true;
    }
  };
  
  checkPhoneNumber();
  if (nameCanSubmit && phoneCanSubmit) {
    document.getElementById("myButton").disabled = false;
  } else {
    document.getElementById("myButton").disabled = true;
  }
};

window.addEventListener("load", function(){
    /* target elements */
    const form = document.querySelector("form");

    /* listeners */
    if (form != null){
        form.addEventListener("submit", checkForm);
        console.log("form loaded");
    }
})