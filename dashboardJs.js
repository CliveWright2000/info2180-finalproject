const errorMsg = "Error. There was a problem with the request";

window.onload = () => {
    allBtn = document.getElementById("allBtn");
    salesLeadBtn = document.getElementById("salesLeadBtn");
    supportBtn = document.getElementById("supportBtn");
    assignedToMeBtn = document.getElementById("assignedToMeBtn");

    allBtn.addEventListener("click", (e) => {
        e.preventDefault();
        allBtn.classList.add("active");
        salesLeadBtn.classList.remove("active");
        supportBtn.classList.remove("active");
        assignedToMeBtn.classList.remove("active");

        let url = "dashboardContent.php";
        document.cookie="lookup=all";
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () => {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    document.getElementById('result').innerHTML = xhr.responseText;
                }
                else {
                    alert(errorMsg);
                }
            }
        };
        xhr.open("GET",url,true);
        xhr.send();
    });

    salesLeadBtn.addEventListener("click", (e) => {
        e.preventDefault();
        allBtn.classList.remove("active");
        salesLeadBtn.classList.add("active");
        supportBtn.classList.remove("active");
        assignedToMeBtn.classList.remove("active");
        
        let url = "dashboardContent.php";
        document.cookie="lookup=salesLeads";
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () => {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    document.getElementById('result').innerHTML = xhr.responseText;
                }
                else {
                    alert(errorMsg);
                }
            }
        };
        xhr.open("GET",url,true);
        xhr.send();
    });

    supportBtn.addEventListener("click", (e) => {
        e.preventDefault();
        allBtn.classList.remove("active");
        salesLeadBtn.classList.remove("active");
        supportBtn.classList.add("active");
        assignedToMeBtn.classList.remove("active");
        
        let url = "dashboardContent.php";
        document.cookie="lookup=support";
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () => {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    document.getElementById('result').innerHTML = xhr.responseText;
                }
                else {
                    alert(errorMsg);
                }
            }
        };
        xhr.open("GET",url,true);
        xhr.send();
    });

    assignedToMeBtn.addEventListener("click", (e) => {
        e.preventDefault();
        allBtn.classList.remove("active");
        salesLeadBtn.classList.remove("active");
        supportBtn.classList.remove("active");
        assignedToMeBtn.classList.add("active");

        let url = "dashboardContent.php";
        document.cookie="lookup=assignedToMe";
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () => {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    document.getElementById('result').innerHTML = xhr.responseText;
                }
                else {
                    alert(errorMsg);
                }
            }
        };
        xhr.open("GET",url,true);
        xhr.send();
    });

    allBtn.click();
}