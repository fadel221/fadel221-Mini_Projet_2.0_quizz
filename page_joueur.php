<?php 
echo "Bienvenue dans la page Joueur";

 ?>

 /*----------------------------- Page Inscription-----------------------------------------*/


/*----------------------------- Page Admin-----------------------------------------------*/

#content-menu
{
	width:25%;
	height: 70%;
	position: absolute;
	margin-top: 8%;
	left:0%;
	background: #DDE3E9;
}

#content-avatar-menu
{
	width:100%;
	height:25%;
	background:#56CCF2;
}

#elipse-avatar-menu
{
position: absolute;
width:40%;
height: 25%;
border-radius: 1300px;
display: inline-block;

}

#name-avatar-menu
{
	position:absolute;
	display: inline-block;
	width:56%;
	height:25%;
	border:2px solid blue;
	color:white;
	font-family: Roboto;
	font-style: normal;
	font-weight: bold;
	font-size: 41.06px;
	line-height: 48px;
	left: 45%;
}

#content-option-menu
{
	width: 100%;
	height: 75%;
	position: absolute;
	box-shadow: 0px 4px 25px rgba(0, 0, 0, 0.2);
}

.option
{
display: inline-block;
width:100%;
height: 15%;
left: 0px;
margin-top:6%;
background: #20C5E9;
border-radius: 18px;
cursor: pointer;
}

#text-option
{
width:55%;
height:100%;
font-family:Roboto;
font-weight: bold;
font-size: 25.06px;
line-height: 48px;
color: #000000;
display: inline;
text-align: center;
left:6%; 
position:relative;
bottom: 14%;
}

.icone-option-list1
{
	width:30%;
	height: 80%;
	display: inline-block;
	left:25%; 
	top: 15%;
	position:relative;
	background-size:40%;
	background-image: url("Images Desktop/liste.png");
	background-repeat:no-repeat;
}

.icone-option-list2
{
	width:30%;
	height: 80%;
	display: inline-block;
	left:33%; 
	top: 16%;
	position:relative;
	background-size:40%;
	background-image: url("Images Desktop/liste.png");
	background-repeat:no-repeat;
}

.icone-option-creation1
{
	width:30%;
	height: 80%;
	display: inline-block;
	left:32%; 
	top: 30%;
	position:relative;
	background-size:40%;
	background-image:url("Images Desktop/creation.png");
	background-repeat:no-repeat;  
}

.icone-option-creation2
{
	width:30%;
	height: 80%;
	display: inline-block;
	left:22%; 
	top: 30%;
	position:relative;
	background-size:40%;
	background-image:url("Images Desktop/creation.png");
	background-repeat:no-repeat;  
}

#content-page
{
	width:72%;
	height: 70%;
	display: inline-block;
	position: absolute;
	left:26%;
	top:14%;
	background:#FDFBFC;
	box-shadow: 0px 4px 25px rgba(0, 0, 0, 0.2);
}


/*----------------------------  Page Admin ----------------------------------------------*/

 

/*------------------------------ Page Creer Admin ------------------------------------*/

#content-creer-admin
{
	position:absolute;
	width:85%;
	margin-left:8%;
	display: inline-block;
	height:100%;
}

#form-creer-admin
{
	width:60%;
	height: 100%;
	position: absolute;
	display: inline-block;
	background: #FFFFFF;
	mix-blend-mode: normal;
	box-shadow: inset 0px 4px 30px rgba(0, 0, 0, 0.12);
}

#creer-admin-avatar
{
	
	width: 40%;
	background: #20C5E9;
	height:100%;
	position:absolute;
	left: 60%;
	display: inline-block;
}

#deco-elipse-admin
{
width:90%;
height: 68%;
border-radius: 1200px;
bottom: 25%;
margin: auto;
background-color:#56CCF2;
margin-top:20%; 
background-size:100%;
background-repeat: no-repeat;
}

#input-file
{
	width:100%;
	height: 10%;
	position: relative;
	top:20%;
}

/*------------------------------ Page Creer Admin ------------------------------------*/


@media screen and (max-width: 780px)
{
	body
	{
		background: red;
	}
}