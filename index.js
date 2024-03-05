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
