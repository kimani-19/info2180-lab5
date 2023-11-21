document.getElementById("lookup").addEventListener("click", myFunction);
document.getElementById("lookupcities").addEventListener("click", lookupcities);

function myFunction() {
    var hr = new XMLHttpRequest();
    var url = 'world.php?country=' + document.getElementById('country').value;
    // var data = "searchtext=GGG123";


    hr.open('GET', url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
        if (hr.readyState == 4 && hr.status == 200) {
            var returndata = hr.responseText;
            document.getElementById('result').innerHTML = returndata;
        }
    };
    hr.send(null);

}
//lookupcities
function lookupcities() {
    var hr = new XMLHttpRequest();
    var url = 'world.php?country=' + document.getElementById('country').value + '&context=cities';



    hr.open('GET', url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
        if (hr.readyState == 4 && hr.status == 200) {
            var returndata = hr.responseText;
            document.getElementById('result').innerHTML = returndata;
        }
    };
    hr.send(null);

}