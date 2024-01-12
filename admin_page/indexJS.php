<script>
    var ln = document.getElementById("last_name");
    var fn = document.getElementById("first_name");
    // var empl_name = document.getElementById("empl_name");
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
        xhttp.send("fn="+fn.value+"&ln="+ln.value+"&id="+id.value);
    }

      function view_empl(tr){
        console.log(tr);
        var last = tr.children[0].children[1].value;
        console.log(last);
        var first = tr.children[0].children[0].value;
        var position = tr.children[1].children[0].value;
        var tier = tr.children[2].children[0].value;
        var employ_id = tr.children[3].children[0].value;

        var xhr = new XMLHttpRequest();
 


        xhr.onreadystatechange = function(){
            console.log("Ready State: " + xhr.readyState);
    console.log("Status: " + xhr.status);

            if(xhr.readyState == 4 && xhr.status == 200){
               // window.location.href = "admin_view_user.php"; ///user profile
               document.getElementsByTagName("body")[0].innerHTML = xhr.responseText;
                console.log(xhr.responseText);
            }
        }

        xhr.open("POST","admin_view_user.php",false);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.send("first=" + encodeURIComponent(first) + 
        "&last=" + encodeURIComponent(last)+
        "&position=" + encodeURIComponent(position) +
        "&tier=" + encodeURIComponent(tier) +
        "&employ_id=" + encodeURIComponent(employ_id));
       // console.log(id);
        //get data from dom 
        // var last = document.getElementById("lname").value;
        // var first = document.getElementById("fname").value;
        // var position = document.getElementById("position").value;
        // var tier = document.getElementById("tier").value;
        // var employ_id = document.getElementById("employ_id").value;

        //create a formdata object
        //const formData = new FormData();

        //pass data from dom
        // const data = {"last": last,
        // "first": first,
        // "position": position,
        // "tier": tier,
        // "employ_id": employ_id};
        //pass data from dom
        // formData.append("last", last);
        // formData.append("first", first);
        // formData.append("position", position);
        // formData.append("tier", tier);
        // formData.append("employ_id", employ_id);
        // for (const pair of formData.entries()) {
        //     console.log(pair[0] + ': ' + pair[1]);
        // }

        //create a post request using fetch api
        // fetch("admin_view_user.php",{
        //     method: "POST",
        //     body: formData
        // })
        // .then(response => response.text())
        // .then(data => {
        //     console.log(data);
        // })
        // .catch(error =>{
        //     console.log("Error:",error);
        // });
        // fetch('admin_view_user.php', {
        //     method:"POST",
        //     body: JSON.stringify(data),
        //     headers:{
        //         'Content-Type': 'application/json; charset=UTF-8'
        //     }
        // })
        // .then(response => {
        //         if(!response.ok){
        //             throw new Error(`HTTP error! Status ${response.status}`);
        //         }
        //         return response.blob();
        // })
        // .then((response)=>{
        //     window.location.href = 'admin_view_user.php?' + response.text();
        // })
        // .then(data => {
        //     console.log(data);
        // })
        // .catch(error => {
        //     console.log('Error:',error);
        // });
        // //window.location.href = "admin_view_user.php"; ///user profile

    }
</script>