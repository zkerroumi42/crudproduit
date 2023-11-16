function showmodepass(){
    var a=document.getElementById("modepass");
    var b=document.getElementById("confirmemodepass");
   if (a.type === "password" && b.type==="password"){
       a.type = "text";
       b.type = "text";
   }
   else{
       a.type = "password";
       b.type = "password";
   }
}
function showmodpassuser(){

    var u=document.getElementById("modepassuser");
   if (u.type === "password"){
       u.type = "text";
   }
   else{
       u.type = "password";
   }
}

function f() {
alert("mode pass non confendu !");
}