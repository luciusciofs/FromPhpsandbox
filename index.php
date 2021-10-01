<?php
$messages = [
    'Welcome to PHPSandbox',
    'Добро пожаловать в PHPSandbox',
    'Bienvenue sur PHPSandbox',
    'Bienvenido a PHPSandbox',
];

shuffle($messages);
?>
<html>
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script>
	function openForm() {
	document.getElementById("myForm").style.display = "block";
	}
	
	function closeForm() {
	document.getElementById("myForm").style.display = "none";
	}
	
	function openFormIscr(){
	 closeForm();	
	document.getElementById("myFormIscr").style.display = "block";	
	}
	
	function closeFormIscr() {
	document.getElementById("myFormIscr").style.display = "none";
	}	
	
	function Iscr(){
	var logiscr=1;
	var xnome = document.getElementsByName("nome")[0].value;
	var xcognome=document.getElementsByName("cognome")[0].value;
	var xcittà = document.getElementsByName("città")[0].value;
	var xetà=document.getElementsByName("età")[0].value;
	xetà=parseInt(xetà);
	var xlavoro = document.getElementsByName("lavoro")[0].value;
	var xmailiscr = document.getElementsByName("emailiscr")[0].value;
	var xpwdiscr=document.getElementsByName("pswiscr")[0].value;
	
	var nometostr=xnome.toString();
	var cognometostr=xcognome.toString();
	var cittàtostr=xcittà.toString();
	var lavorotostr=xlavoro.toString();
	var mailtostr=xmailiscr.toString();
	var pwdtostr=xpwdiscr.toString();

	if (xetà !== parseInt(xetà, 10) || xetà == 0)
	{
		alert("l'età deve essere un numero diverso da zero");
		return;
	}
	if(mailtostr.includes("@")==false || mailtostr.includes(".")==false)
	{
		
		alert("Il campo mail deve avere una @ e un punto");
		return;
	}
    
		var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
	if (this.readyState==4 && this.status==200) {
	
	document.getElementById("txtHint").innerHTML=this.responseText;
	
	}
	};
	
	xmlhttp.open("GET","getuser.php?q=" + mailtostr+"&w="+pwdtostr+"&e="+logiscr+"&r="+nometostr+"&t="+cognometostr+"&y="+xetà+"&u="+cittàtostr+"&i="+lavorotostr, true);
	xmlhttp.send();
		
	

	}
	
	function showUser(str) {
	var logiscr=0;
	if (str=="") {
	document.getElementById("txtHint").innerHTML="";
	return;
	}
	var xmail = document.getElementsByName("email")[0].value;
	var xpwd=document.getElementsByName("psw")[0].value;
	var mailtostr=xmail.toString();
	var pwdtostr=xpwd.toString();
	
	if(mailtostr=="" || pwdtostr=="")
	{
	alert("Devi inserire sia mail che password");
	}
	else
	{
	
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
	if (this.readyState==4 && this.status==200) {
	
	document.getElementById("txtHint").innerHTML=this.responseText;
	
	}
	};
	
	xmlhttp.open("GET","getuser.php?q=" + mailtostr+"&w="+pwdtostr+"&e="+logiscr, true);
	xmlhttp.send();
	
	
	}
	
	}
	</script>
	
    <link href="/css/prova.css" rel="stylesheet">
<title>IndexAjax</title>
	</head>
<body>
	
	<div style="height:50px;width:100%;background-color:#fabe0e"></div>
	<div style="height:60px;width:100%;background-color:#fff;text-align:center;">
	<img src="logo.jpg" alt="Ciofs" width="163" height="50">
	</div>
	<div style="height:50px;width:100%;background-color:#0d4169"></div>
	<div id="txtHint" style="padding-top:20px"><b>Person info will be listed here.</b></div>
	
	<button class="open-button" onclick="openForm()">Open Form</button>
	
	<div class="form-popup" id="myForm">
	<div class="form-container">
	<h1>Login</h1>
	
	<label for="email"><b>Email</b></label>
	<input type="text" placeholder="Enter Email" name="email" required>
	
	<label for="psw"><b>Password</b></label>
	<input type="password" placeholder="Enter Password" name="psw" required>
	
	<button class="btn" name="login" onclick="showUser(this.name)">Login</button>
	<button class="btn" name="iscr" onclick="openFormIscr()">Iscrizione</button>
	<button type="button" class="btn cancel" onclick="closeForm()">Close</button>
	</div>
	</div>
	
	<div class="form-popup" id="myFormIscr">
	<div class="form-container">
	<h1>Iscrizione</h1>
	
	<label for="nome"><b>Nome</b></label>
	<input type="text" placeholder="Nome" name="nome" required>
	
	<label for="cognome"><b>Cognome</b></label>
	<input type="text" placeholder="Cognome" name="cognome" required>
	
	<label for="email"><b>Email</b></label>
	<input type="email" placeholder="Enter Email" name="emailiscr" required>
	
	<label for="città"><b>Città di residenza</b></label>
	<input type="text" placeholder="Città" name="città" required>
	
	<label for="età"><b>Età</b></label>
	<input type="number" placeholder="Età" name="età" required>
	
	<label for="lavoro"><b>Lavoro</b></label>
	<input type="text" placeholder="Lavoro" name="lavoro" required>
	
	<label for="psw"><b>Password</b></label>
	<input type="password" placeholder="Enter Password" name="pswiscr" required>
	
	
	<button class="btn" name="iscr" onclick="Iscr()">Iscriviti</button>
	<button type="button" class="btn cancel" onclick="closeFormIscr()">Close</button>
	</div>
	</div>
	
	</body>
	</html