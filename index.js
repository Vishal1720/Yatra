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
