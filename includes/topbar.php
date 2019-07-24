<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<script type="text/javascript">
// (c) 2000-2014 ricocheting.com
dg = new Array();
dg[0]=new Image();dg[0].src="clock/dg0.gif";
dg[1]=new Image();dg[1].src="clock/dg1.gif";
dg[2]=new Image();dg[2].src="clock/dg2.gif";
dg[3]=new Image();dg[3].src="clock/dg3.gif";
dg[4]=new Image();dg[4].src="clock/dg4.gif";
dg[5]=new Image();dg[5].src="clock/dg5.gif";
dg[6]=new Image();dg[6].src="clock/dg6.gif";
dg[7]=new Image();dg[7].src="clock/dg7.gif";
dg[8]=new Image();dg[8].src="clock/dg8.gif";
dg[9]=new Image();dg[9].src="clock/dg9.gif";
dgam=new Image();dgam.src="clock/dgam.gif";
dgpm=new Image();dgpm.src="clock/dgpm.gif";

function dotime(){ 
	var d=new Date();
	var hr=d.getHours(),mn=d.getMinutes(),se=d.getSeconds();

	// set AM or PM
	document.ampm.src=((hr<12)?dgam.src:dgpm.src);

	// adjust from 24hr clock
	if(hr==0){hr=12;}
	else if(hr>12){hr-=12;}

	document.hr1.src = getSrc(hr,10);
	document.hr2.src = getSrc(hr,1);
	document.mn1.src = getSrc(mn,10);
	document.mn2.src = getSrc(mn,1);
	document.se1.src = getSrc(se,10);
	document.se2.src = getSrc(se,1);
}

function getSrc(digit,index){
	return dg[(Math.floor(digit/index)%10)].src;
}

window.onload=function(){
	dotime();
	setInterval(dotime,1000);
}

</script>



</head>

<body>

<div id="top">
<P style="float:left; font-family:'Arial Black', Gadget, sans-serif;"><font color="#FFCC00">&nbsp;<?php echo date("jS, F Y");?></font></p>
<p style="float:right;  padding-right:3%;" >
<img src="clock/clodg8.gif" name="hr1"><img
src="clock/dg8.gif" name="hr2"><img 
src="clock/dgc.gif"><img 
src="clock/dg8.gif" name="mn1"><img 
src="clock/dg8.gif" name="mn2"><img 
src="clock/dgc.gif"><img 
src="clock/dg8.gif" name="se1"><img 
src="clock/dg8.gif" name="se2"><img 
src="clock/dgam.gif" name="ampm"></div>

</body>
</html> 