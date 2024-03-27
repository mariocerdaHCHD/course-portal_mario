//function to open file with a onclick
function findFile(name){
    if(name == "null"){
        console.log("error");
    }else{
        window.open(name,'_blank','fullscreen=yes');
    }
}

//btn to download all pdf
// var dApdf = document.getElementById("allpdf");
// console.log("hello");
// dApdf.addEventListener("click",function(){
//     console.log("hi");
//     var xreq = new XMLHttpRequest();
//     xreq.onreadystatechange = function(){
//         if(this.readyState == 4 && this.status == 200){
//             //open tab with new merged pdf files
            
//             //console.log((this.responseText));
//             findFile(this.responseText);
//         }
//     };
//     xreq.open("GET","/course_portal/app/Views/transcript/combine_pdf.php",true);
//     xreq.send();
// });
//trying to connect this addEventListener to button on transcript
//to execute combine_pdf.php
//which should have one pdf as output/ or path to new pdf 