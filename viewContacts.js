window.onload = () => {
    const errorMsg = "Error. There was a problem with the request";

    $switchBtn = document.getElementById('Switch');
    $assignBtn = document.getElementById('assignBtn');
    $addHereBtn = document.getElementById('Addhere');
    $comment = document.getElementById('comments');

    $switchBtn.addEventListener('click', (e)=>{
        e.preventDefault();
        let url= "viewContactBtns.php";
        document.cookie="button=switch";
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () => {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    document.querySelector('#Switch h5').innerHTML = xhr.responseText;
                }
                else {
                    alert(errorMsg);
                }
            }
        };
        xhr.open("GET",url,true);
        xhr.send();
    });

    $assignBtn.addEventListener('click', (e)=>{
        e.preventDefault();
        let url= "viewContactBtns.php";
        document.cookie="button=assign";
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () => {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    document.querySelector('.Assigned p').innerHTML = xhr.responseText;
                }
                else {
                    alert(errorMsg);
                }
            }
        };
        xhr.open("GET",url,true);
        xhr.send();
    });

    $addHereBtn.addEventListener('click', (e)=>{
        e.preventDefault();
        let url= "viewContactBtns.php?comment="+$comment.value;
        document.cookie="button=add";
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = () => {
            if (xhr.readyState == XMLHttpRequest.DONE) {
                if (xhr.status == 200) {
                    document.querySelector('.noteInfo').innerHTML += xhr.responseText;
                    $comment.value = "";
                }
                else {
                    alert(errorMsg);
                }
            }
        };
        xhr.open("GET",url,true);
        xhr.send();
    });
}