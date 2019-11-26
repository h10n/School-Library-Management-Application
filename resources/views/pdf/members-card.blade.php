
<!doctype html>
<head>
	<meta charset="utf-8">
<style media="screen">
#card{
	   float:left;
	   width:360px;
	   height:230px;
	   margin:5px;
	   border:1px solid black;
	   background-image: url("img/members_photo/{{$members->photo}}");
	   background-repeat: no-repeat;
	   background-size: 360px 230px;
	   -webkit-print-color-adjust: exact;
   }
@font-face {
font-family: "metawebprobold";
src: url("../../fonts/MetaWebPro-Bold.ttf");
}

@font-face {
font-family: "metawebpromedium";
src: url("../../fonts/MetaWebPro-Medium.ttf");
}

@font-face {
font-family: "opensans";
src: url("../../fonts/OpenSans_Regular.ttf");
}

@font-face {
font-family: "opensanslight";
src: url("../../fonts/OpenSans_Light.ttf");
}

@font-face {
font-family: "Font Awesome";
src: url("../../fonts/fontawesome.ttf");
}

body {
margin: 0px;
padding: 0px;
background: #ffffff;
}

.fontawesome {
font-family: "Font Awesome";
font-size: 24px;
color: #404747;
}

.txt {
color: #9CA8A5;
font-size: 11.6px;
font-family: "opensans";
}

.highlight {
color: #A92D27;
}

.volunteer {
color: #fff;
position: absolute;
left: 21.9832px;
top: 222.716px;
font-size: 16.0843px;
font-family: "opensanslight";
}

.footer {
background-color: #A92D27;
}

.twitter {
position: absolute;
left: 21.9837px;
top: 155.203px;
line-height: 1;
font-family: "opensans";
}

.irc {
position: absolute;
left: 21.9837px;
top: 171.24px;
line-height: 1;
font-family: "opensans";
}

.logo {
width: 128px;
height: 128px;
position: absolute;
left: 20px;
top: 20px;
display: block;
}

.avatar {
width: 128px;
height: 128px;
position: absolute;
left: 20px;
top: 20px;
display: block;
}

.footer-logo {
width: 128px;
position: absolute;
left: 293px;
top: 222px;
display: block;
}


.twitter,
.irc {
font-size: 11.6px;
}

.name {
position: absolute;
font-size: 17.5px;
left: 165px;
top: 22px;
width: 265px;
font-family: "opensanslight";
line-height: 1;
}

.position {
font-size: 14.6px;
position: absolute;
left: 165px;
top: 39.2898px;
width: 265px;
color: #9CA8A5;
font-family: "opensans";
}

.contact-ico,
.skill-ico,
.lang-ico {
position: absolute;
left: 165px;
}

.contact,
.skill,
.lang {
position: absolute;
left: 165px;
width: 230px;
}

.skill {
top: 99.9221px;
}

.skill-ico {
top: 101px;
}

.contact-ico {
top: 142.867px;
}

.contact {
top: 140.867px;
}

.lang-ico {
top: 65px;
}

.lang {
top: 70.4591px;
}

.footer {
position: absolute;
top: 210px;
width: 100%;
left: 0;
height: 49px;
}


.mozilla {
font-family: "metawebprobold";
color: #fff;
position: absolute;
left: 281px;
top: 216px;
font-size: 28px;
letter-spacing: -0.5px;
}

.reps {
font-family: "metawebpromedium";
color: #fff;
position: absolute;
left: 368px;
top: 216px;
font-size: 28px;
letter-spacing: -0.5px;
}
</style>
</head>
<body>
  	 <div id="card">
	<div class="logo"><img src="img/members_photo/{{$members->photo}}" width="128" height="128" /></div>
	<div class="avatar"><img src="img/avatar.png" width="128" height="128" /></div>


	<div class="twitter"><span class="txt" contenteditable>twitter</span>&nbsp;<span class="highlight" contenteditable>@LindaECastaldo</span></div>
	<div class="irc"><span class="txt" contenteditable>irc.mozilla.org</span>&nbsp;<span class="highlight" contenteditable>LindaECastaldo</span></div>

	<div class="name highlight" contenteditable> {{ $members->name }}</div>
	<div class="position" contenteditable>{{ $members->nis }}</div>




	<div class="lang txt" contenteditable>{{ $members->kelas }}</div>
	<div class="skill txt" contenteditable>community building, visual design, l10n, public relations, evangelism, firefoxos</div>
	<div class="contact">

		<div class="txt" contenteditable>601-945-6595</div>
		<div class="txt" contenteditable>LindaECastaldo@inbound.plus</div>
		<div class="txt" contenteditable>www.mozillians.org/u/LindaECastaldo</div>

	</div>
	<div class="footer"></div>
	<div class="volunteer">Volunteer</div>
	<div class="mozilla">mozilla</div>
	<div class="reps">reps</div>
</div>
</body>
</html>
