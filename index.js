let nav=document.getElementById("navbar");
let eyeicon=document.querySelector("#logshowpass");

window.addEventListener('wheel', function(event) {
    if (event.deltaY > 0) {
      // Scrolling down
      console.log('Scrolling down');
    //   nav.style.visibility="hidden"
nav.style.top="-18rem";
    } else {
      // Scrolling up
      console.log('Scrolling up');
    //   nav.style.visibility="visible"
    nav.style.top="0px";
    }
  });
  const showpassword=()=>{
    let logpassfield=document.getElementById("logpassfield");
    if(logpassfield.type === "password"){
eyeicon.src="noeye-icon.png";
logpassfield.type="text";}
else{
  eyeicon.src="eye-icon.png";
  logpassfield.type="password";
}
  }
  
  //login
  let emailtxtbox=document.getElementById("email");
let passtxtbox=document.getElementById("logpassfield");
  

  function changefocus(firstbox,secondbox){
    firstbox.addEventListener('keydown',(e)=>{
    
      if(e.key == "Enter" || e.key == 'ArrowDown')
      {
        e.preventDefault();
        console.log("Working");
  secondbox.focus();
      }
    })
  }

  changefocus(emailtxtbox,passtxtbox);

  //signup
 
  var username=document.querySelector("#username");
  var lname=document.querySelector('#lname');
  var email=document.querySelector("#email");
  var telnumber=document.querySelector("#telnumber");
   var rad=document.querySelector('#radio');
  var pass=document.querySelector("#initpass");
  var repass=document.querySelector("#confirmpass");
  var  address=document.querySelector("#address");
  var pin=document.querySelector("#pin");
  var district=document.querySelector("#district");
  changefocus(username,lname);
  changefocus(lname,email);
  changefocus(email,telnumber);
  changefocus(telnumber,rad);
  changefocus(rad,pass);
  changefocus(pass,repass);
  changefocus(repass,address);
  changefocus(address,district);
  changefocus(district,pin);

telnumber.addEventListener('input',()=>{
  if(telnumber.value.length > 10)
  {
    telnumber.value=telnumber.value.slice(0,10);
  }
});

pin.addEventListener('input',()=>{
  if(pin.value.length >6)
  {
    pin.value=pin.value.slice(0,6);
  }
})
  //this function does required validation  for sign up form for on submit
  function  validatesignup(){
    if(pass.value !== repass.value)
    {
alert("Passwords do not match");
return false;
    }
    if(telnumber.value.length<10)
    {
      alert("Please enter a valid phone number");
      return false;
    }
    if(pin.value.length<6)
    {
      alert('Please enter a valid 6 digit pincode');
    return false;
    
    }
    return true;
  }

  function eyeswitchsign(){
    let passfield1=document.getElementById("initpass");
    
    let passfield2=document.getElementById("confirmpass");
    let eyesignicon=document.getElementById('eyesignup');
    if(passfield1.type == "password" ){
eyesignicon.src="noeye-icon.png";
passfield1.type="text";
passfield2.type="text"}else{
  eyesignicon.src="eye-icon.png";
  passfield1.type="password";
passfield2.type="password";
}
  }
  
  
