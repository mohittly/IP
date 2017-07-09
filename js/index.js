var first_name = document.getElementById('first_name');
var last_name = document.getElementById('last_name');
var email = document.getElementById('email');
var contact = document.getElementById('contact');
var age = document.getElementById('age');
var gender = document.getElementById('gender');
var test5 = document.getElementById('test5');
var test6 = document.getElementById('test6');
var test7 = document.getElementById('test7');
var textarea1 = document.getElementById('textarea1');
var submit = document.getElementById('submit');
var x;
var firebaseStudRef = firebase.database().ref().child("i");

firebaseStudRef.on('value',function(datasnapshot){
	stud.innerText = datasnapshot.val();
	x = stud.innerText;
});

function submitClick() {
x++;
var firebaseRef = firebase.database().ref();
var fname = first_name.value;
var lname = last_name.value;
var tel = contact.value;
var em = email.value;
var ag = age.value;var t5,t6,t7;
if(test5.checked)
{ t5="Yes"; }
else {t5="No";}
if(test6.checked)
{ t6="Yes"; }
else {t6="No";}
if(test7.checked)
{ t7="Yes"; }
else {t7="No";}
var t = textarea1.value;
var g = gender.value;
alert("Thank you for applying. We will reach out to you soon");
location.reload();
firebaseRef.child("i").set(x);
firebaseRef.child("user "+x).child("first name").set(fname);
firebaseRef.child("user "+x).child("last name").set(lname);
firebaseRef.child("user "+x).child("contact").set(tel);
firebaseRef.child("user "+x).child("age").set(ag);
firebaseRef.child("user "+x).child("email").set(em);
firebaseRef.child("user "+x).child("Wedding").set(t5);
firebaseRef.child("user "+x).child("Competition").set(t6);
firebaseRef.child("user "+x).child("Learning").set(t7);
firebaseRef.child("user "+x).child("Message").set(t);
firebaseRef.child("user "+x).child("gender").set(g);



}