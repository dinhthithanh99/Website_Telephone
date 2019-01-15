 // Xử lý form nhập trên index
 function check() {
   var a = document.getElementById('cf-name').value;
   var b = document.getElementById('cf-email').value;
   var c = document.getElementById('cf-subject').value;
   var d = document.getElementById('cf-message').value;

   if (a == "" || b == "" || c == "" || d == "") {
     alert("Data empty. Please check again!");
   } else {
     alert("Successfully!");
     top.location = "index.html"
   }
 }

// Xử lí login
var arr = [
{name: "a@gmail.com",pass: "12345"}

];

function submit() {
  var count=0;
  var a= document.getElementById('user').value;
  var b= document.getElementById('pass').value;

  for (var i=0; i<arr.length; i++){
    if (a==arr[i].name && b==arr[i].pass) {
      top.location = "cart.html";
      count++;
    }

  }
  if (count == 0) {
    alert("Data not validate! Please check your user and password. ");
  }
}

// process add to cart
function deletes () {
  document.getElementById('quantity').value = 0;
  document.getElementById('pay').value = 0;
}

function updates () {
  var a = document.getElementById('quantity').value;
  var cost = document.getElementById('cost').value;
  document.getElementById('pay').value = a * cost;
}

// Xử lí login để được dùng chức năng cart 
function checklogin() {
 var tam = 0;
 if (tam == 0) {
   top.location = "login.html";
   tam++;
 }
}


 //payment trên modal của bánh xèo
 function pay1() {
  var a = document.getElementById('pay').value;
  document.getElementById('nd').innerHTML = a;
  var b = document.getElementById('quantity').value;
  document.getElementById('quant').innerHTML = b;
}


 // Check logout trên index
 
 function logout () {
  alert("You not yet login user");
}


// //Function save data
// function saving(text1, text2, text3){
//   count+=1;
//   var table = document.getElementById("myTable");
//   var row = table.insertRow(table.length);
//   var cell1 = row.insertCell(0);
//   var cell2 = row.insertCell(1);
//   var cell3 = row.insertCell(2);
//   var cell4 = row.insertCell(3);
//   cell1.innerHTML = count;
//   cell2.innerHTML = text1;
//   cell3.innerHTML = text2;
//   cell4.innerHTML = text3;
// }