var form = document.getElementsByTagName("form")[0];
var user = form.getElementsByTagName("input")[0];
var pwd = form.getElementsByTagName("input")[1];

user.required = true;
pwd.required = true;
