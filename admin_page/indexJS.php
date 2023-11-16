<script>
    var ln = document.getElementById("last_name");
    var fn = document.getElementById("first_name");
    var id = document.getElementById("county_id");

    function searchUser(elemID){
        const xhttp = new XMLHttpRequest();
        if(!xhttp){
            //error occurred in creating a xmlhttprequest
            return false;
        }
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var empl = document.getElementById("emp_info");
                empl.innerHTML = this.responseText;
            }
        }
        xhttp.open("POST","indexSearch.php",true);
        xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhttp.send("ln="+ln.value+"&fn="+fn.value+"&id="+id.value);
    }
</script>