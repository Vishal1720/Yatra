let nav=document.getElementById("navbar");
let eyeicon=document.querySelector("#logshowpass");

window.addEventListener('wheel', function(event) {
    if (event.deltaY > 0) {
      // Scrolling down
nav.style.top="-18rem";
    } else {
      // Scrolling up
    nav.style.top="0px";
    }
  });
  
  //function  to show password in login form
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
<<<<<<< HEAD



  
  /*const displayRazorpay = (amount)=>{
    if(amount === ""){
    alert("please enter amount");
    }else{
      var options = {
        key: "rzp_test_YCsMZnFVUYsSjM",
        key_secret:"6InftqEninCAQt8ZzAsdGs5B",
        amount: amount *100,
        currency:"INR",
        name:"My Space",
        description:"for testing purpose",
        handler: function(response){
          alert(response.razorpay_payment_id);
        },
        prefill: {
          name:"Aneesh",
          email:"abcd@gmail.com",
          contact:"234567890",
        },
        notes:{
          address:"Razorpay Corporate office"
        },
        theme: {
          color:" #ff5e00"
        }
      };
      const paymentObject = new window.Razorpay(options);
        paymentObject.open();
    }
  }*/

  
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
  pin.addEventListener("wheel",(e)=>{e.preventDefault()});

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

//limiting pin to 6 digits
pin.addEventListener('input',()=>{
  if(pin.value.length >6)
  {
    pin.value=pin.value.slice(0,6);
  }
});

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
passfield2.type="text"}
else
{
  eyesignicon.src="eye-icon.png";
  passfield1.type="password";
passfield2.type="password";
}
  }
  
  
>>>>>>> a5cf7e04b0117304a2c5cfe02bff9fa52d304841
