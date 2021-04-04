<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Nástroj pro tvorbu XFN 1.1</title>
<link href="creator" rel="alternate" hreflang="en" title="XFN Creator in English" />
<link href="creator-es" rel="alternate" hreflang="es" title="XFN Creator en Espa&ntilde;ol" />
<link href="creator-fr" rel="alternate" hreflang="fr" title="Cr&eacute;ateur XFN 1.1" />
<link href="creator-it" rel="alternate" hreflang="it" title="Creatore XFN 1.1" />
<link href="creator-ja" rel="alternate" hreflang="ja" title="XFN 1.1 生成ツール" />
<link href="creator-nl" rel="alternate" hreflang="nl" title="XFN 1.1 Maker" />
<link rel="contents" href="." hreflang="en" title="XFN - XHTML Friends Network" />
<link rel="start" href="intro" hreflang="en" title="XFN: Introduction and Examples" />
<link rel="glossary" href="11" hreflang="en" title="XFN profile" />
<link rel="help" href="faq" hreflang="en" title="XFN: FAQ" />
<link rel="copyright" href="#copyright" title="Copyright" />
<style type="text/css">
    /*<![CDATA[*/
		@import url(default.css);
		table {border-top: 1px solid silver;}
		th, td {padding: 0.2em; border-bottom: 1px solid silver;}
		th {vertical-align: middle; text-align: right;}
		button {padding: 0; margin: 0;}
		#xfnResult {padding: 0.5em 1em; font: 0.9em "Courier New", Courier, monospace; border: 1px solid gray; background: #EEC;}
		label {cursor: pointer;}
		label.disabled { color:gray; }
		table p {padding: 0.25em 0; border-left: 3px solid silver;}
		form {margin-top: 2.5em;}
    /*]]>*/
</style>
<script type="text/javascript">
    //<![CDATA[
		function GetElementsWithClassName(elementName, className) {
		   var allElements = document.getElementsByTagName(elementName);
		   var elemColl = new Array();
		   for (i = 0; i < allElements.length; i++) {
		       if (allElements[i].className == className) {
		           elemColl[elemColl.length] = allElements[i];
		       }
		   }
		   return elemColl;
		}
		
		function meChecked()
		{
		  var undefined;
		  var eMe = document.getElementById('me');
		  if (eMe == undefined) return false;
		  else return eMe.checked;
		}
		
		function upit() {
		   var isMe = meChecked(); //document.getElementById('me').checked;
		   var inputColl = GetElementsWithClassName('input', 'valinp');
		   var results = document.getElementById('xfnResult');
		   var linkText, linkUrl, inputs = '';
		   linkText = document.getElementById('linkText').value;
		   linkUrl = document.getElementById('linkUrl').value;
		   for (i = 0; i < inputColl.length; i++) {
		       inputColl[i].disabled = isMe;
		       inputColl[i].parentNode.className = isMe ? 'disabled' : '';
		       if (!isMe && inputColl[i].checked && inputColl[i].value != '') {
					inputs += inputColl[i].value + ' ';
		            }
		       }
		   inputs = inputs.substr(0,inputs.length - 1);
		   if (isMe) inputs='me';
		   results.childNodes[0].nodeValue = '<a href="' + linkUrl + '" rel="' + inputs + '">' + linkText + '<\/a>';
		   }
		
		function blurry() {
		   if (!document.getElementById) return;
		
		   var aInputs = document.getElementsByTagName('input');
		
		   for (var i = 0; i < aInputs.length; i++) {		
		       aInputs[i].onclick = aInputs[i].onkeyup = upit;
		   }
		}
		
		function resetstuff() {
		 if (meChecked()) document.getElementById('me').checked=''; 
		 upit();
		 document.getElementById('xfnResult').childNodes[0].nodeValue = '<a href="" rel=""><\/a>';
		}
		
		window.onload = blurry;
    //]]>
    </script>
  </head>
  <body>
  
<h1>Nástroj pro tvorbu <abbr title="XHTML Friends Network" xml:lang="em">XFN</abbr> 1.1</h1>

<form action="" onreset="resetstuff();">
<table cellspacing="0">
<tr>
<th scope="row">Jméno</th>
<td><input type="text" id="linkText" /></td>
</tr>
<tr>
<th scope="row"><abbr title="Uniform Resource Locator" xml:lang="en">URL</abbr></th>
<td><input type="text" id="linkUrl" /> <label for="me"><input type="checkbox" name="identity" value="me" id="me" />&nbsp;moje další webová stránka</label></td>
</tr>
<tr>
<th scope="row">přátelství</th>
<td><label for="friendship-contact"><input class="valinp" type="radio" name="friendship" value="contact" id="friendship-contact" />&nbsp;kontakt </label><label for="friendship-aquaintance"><input class="valinp" type="radio" name="friendship" value="acquaintance" id="friendship-aquaintance" />&nbsp;známý </label> <label for="friendship-friend"><input class="valinp" type="radio" name="friendship" value="friend" id="friendship-friend" />&nbsp;přítel </label> <label for="friendship-none"><input class="valinp" type="radio" name="friendship" value="" id="friendship-none" />&nbsp;nic </label></td>
</tr>
<tr>
<th scope="row">fyzicky</th>
<td><label for="met"><input class="valinp" type="checkbox" name="physical" value="met" id="met" />&nbsp;setkal </label></td>
</tr>
<tr>
<th scope="row">profesně</th>
<td><label for="co-worker"><input class="valinp" type="checkbox" name="professional" value="co-worker" id="co-worker" />&nbsp;spolupracovník </label> <label for="colleague"><input class="valinp" type="checkbox" name="professional" value="colleague" id="colleague" />&nbsp;kolega</label>
</td>
</tr>
<tr>
<th scope="row">geograficky</th>
<td>
<label for="co-resident"><input class="valinp" type="radio" name="geographical" value="co-resident" id="co-resident" />&nbsp;ze sousedství </label> <label for="neighbor"><input class="valinp" type="radio" name="geographical" value="neighbor" id="neighbor" />&nbsp;soused </label> <label for="geographical-none"><input class="valinp" type="radio" name="geographical" value="" id="geographical-none" />&nbsp;nic</label></td>
</tr>
<tr>
<th scope="row">rodina</th>
<td><label for="family-child"><input class="valinp" type="radio" name="family" value="child" id="family-child" />&nbsp;dítě </label> <label for="family-parent"><input class="valinp" type="radio" name="family" value="parent" id="family-parent" />&nbsp;rodič </label> <label for="family-sibling"><input class="valinp" type="radio" name="family" value="sibling" id="family-sibling" />&nbsp;sourozenec </label> <label for="family-spouse"><input class="valinp" type="radio" name="family" value="spouse" id="family-spouse" />&nbsp;partner </label> <label for="family-kin"><input class="valinp" type="radio" name="family" value="kin" id="family-kin" />&nbsp;příbuzný </label> <label for="family-none"><input class="valinp" type="radio" name="family" value="" id="family-none" />&nbsp;nic</label></td>
</tr>
<tr>
<th scope="row">romantika</th>
<td><label for="muse"><input class="valinp" type="checkbox" name="romantic" value="muse" id="muse" />&nbsp;múza </label> <label for="crush"><input class="valinp" type="checkbox" name="romantic" value="crush" id="crush" />&nbsp;touha </label> <label for="date"><input class="valinp" type="checkbox" name="romantic" value="date" id="date" />&nbsp;randí </label> <label for="sweetheart"><input class="valinp" type="checkbox" name="romantic" value="sweetheart" id="sweetheart" />&nbsp;zamilovaný</label></td>
</tr>
</table>
<p><button onclick="upit(); return false;">Vytvořit odkaz</button> <input type="reset" value="Zrušit" /></p>
</form>

<div id="xfnResult">&lt;a href="" rel=""&gt;&lt;/a&gt;</div>

<p style="margin-top:3em">Toto uživatelské rozhraní a kód pod ním je poskytnut jako příklad pro účely tvůrců XFN a pro demonstraci hodnot vztahu XFN a kódu, který může být použit k reprezentování těchto hodnot. Původní <cite xml:lang="en">XFN Creator 1.0</cite> vytvořil <a href="http://photomatt.net">Matt Mullenweg</a>. Na verzi <cite xml:lang="en">XFN Creator 1.1</cite> jej upravil <a href="http://tantek.com" lang="tr">Tantek &Ccedil;elik</a>.  XFN Creatoru vytvořil <a href="http://www.zapisky.info/">Josef Petrák</a>.</p>
     
<div id="trail">
<a href="/xfn/">XFN</a> [<a href="/">GMPG</a>]
</div>

<div id="footer"><p id="copyright">
Copyright &copy; 2003&#8211;2004  GMPG.  <a rel="license" href="http://creativecommons.org/licenses/by/2.0/">Some rights reserved</a>.</p></div>

</body>
</html>
