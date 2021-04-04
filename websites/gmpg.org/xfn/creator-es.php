<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<title>Creador de XFN 1.1</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link href="creator" rel="alternate" hreflang="en" title="XFN Creator in English" />
<link href="creator-cs" rel="alternate" hreflang="cs" title="Nástroj pro tvorbu XFN 1.1" />
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
<h1>Creador de <abbr title="XHTML Friends Network" lang="en" xml:lang="en">XFN</abbr> 1.1</h1>
<form action="" onreset="resetstuff();">
	<table cellspacing="0">
		<tr>
			<th scope="row">Nombre</th>
			<td><input type="text" id="linkText" />
			</td>
		</tr>
		<tr>
			<th scope="row"> URL</th>
			<td><input type="text" id="linkUrl" />
				<label for="me">
				<input type="checkbox" name="identity" value="me" id="me" />
				&nbsp;otra direcci&oacute;n web que me pertenece</label>
			</td>
		</tr>
		<tr>
			<th scope="row"> amistad</th>
			<td><label for="friendship-contact">
				<input class="valinp" type="radio" name="friendship" value="contact" id="friendship-contact" />
				&nbsp;contacto</label>
				<label for="friendship-aquaintance">
				<input class="valinp" type="radio" name="friendship" value="acquaintance" id="friendship-aquaintance" />
				&nbsp;conocido</label>
				<label for="friendship-friend">
				<input class="valinp" type="radio" name="friendship" value="friend" id="friendship-friend" />
				&nbsp;amigo</label>
				<label for="friendship-none">
				<input class="valinp" type="radio" name="friendship" value="" id="friendship-none" />
				&nbsp;ninguno</label>
			</td>
		</tr>
		<tr>
			<th scope="row"> f&iacute;sico</th>
			<td><label for="met">
				<input class="valinp" type="checkbox" name="physical" value="met" id="met" />
				&nbsp;conocido en persona</label>
			</td>
		</tr>
		<tr>
			<th scope="row"> profesional </th>
			<td><label for="co-worker">
				<input class="valinp" type="checkbox" name="professional" value="co-worker" id="co-worker" />
				&nbsp;compa&ntilde;ero de trabajo</label>
				<label for="colleague">
				<input class="valinp" type="checkbox" name="professional" value="colleague" id="colleague" />
				&nbsp;colega</label>
			</td>
		</tr>
		<tr>
			<th scope="row"> geogr&aacute;fico</th>
			<td><label for="co-resident">
				<input class="valinp" type="radio" name="geographical" value="co-resident" id="co-resident" />
				&nbsp;compa&ntilde;ero de vivienda</label>
				<label for="neighbor">
				<input class="valinp" type="radio" name="geographical" value="neighbor" id="neighbor" />
				&nbsp;vecino</label>
				<label for="geographical-none">
				<input class="valinp" type="radio" name="geographical" value="" id="geographical-none" />
				&nbsp;ninguno</label>
			</td>
		</tr>
		<tr>
			<th scope="row"> familiar</th>
			<td><label for="family-child">
				<input class="valinp" type="radio" name="family" value="child" id="family-child" />
				&nbsp;hijo</label>
				<label for="family-parent">
				<input class="valinp" type="radio" name="family" value="parent" id="family-parent" />
				&nbsp;padre</label>
				<label for="family-sibling">
				<input class="valinp" type="radio" name="family" value="sibling" id="family-sibling" />
				&nbsp;hermano</label>
				<label for="family-spouse">
				<input class="valinp" type="radio" name="family" value="spouse" id="family-spouse" />
				&nbsp;matrimonio</label>
				<label for="family-kin">
				<input class="valinp" type="radio" name="family" value="kin" id="family-kin" />
				&nbsp;familiar </label>				
				<label for="family-none">
				<input class="valinp" type="radio" name="family" value="" id="family-none" />
				&nbsp;ninguno</label>
			</td>
		</tr>
		<tr>
			<th scope="row"> rom&aacute;ntico</th>
			<td><label for="muse">
				<input class="valinp" type="checkbox" name="romantic" value="muse" id="muse" />
				&nbsp;musa</label>
				<label for="crush">
				<input class="valinp" type="checkbox" name="romantic" value="crush" id="crush" />
				&nbsp;atracci&oacute;n</label>
				<label for="date">
				<input class="valinp" type="checkbox" name="romantic" value="date" id="date" />
				&nbsp;cita</label>
				<label for="sweetheart">
				<input class="valinp" type="checkbox" name="romantic" value="sweetheart" id="sweetheart" />
				&nbsp;amor</label>
			</td>
		</tr>
	</table>
	<p>
		<button onclick="upit(); return false;">Construir Link</button>
		<input type="reset" />
	</p>
</form>
<div id="xfnResult"> &lt;a href="" rel=""&gt;&lt;/a&gt; </div>
<p style="margin-top:3em">Esta interfaz de usuario, y el c&oacute;digo que la soporta, se proveen como ejemplo para beneficio de los desarrolladores que usen XFN, y para demostrar la clara correspondencia uno a uno entre los valores XFN y el c&oacute;digo para representar estos valores. Por <a href="http://photomatt.net">Matt Mullenweg</a>. Actualizaci&oacute;n Creador de XFN 1.1 por <a href="http://tantek.com" lang="tr" xml:lang="tr">Tantek &Ccedil;elik</a></p>
<p> (Pueden hacerse comentarios sobre la traducci&oacute;n a <a href="mailto:manuel@cyberjunkie.com" lang="es" xml:lang="es">Manuel Razzari</a> para ajustar los t&eacute;rminos a un espa&ntilde;ol neutro).</p>
<div id="trail"> <a href="http://gmpg.org/xfn">XFN</a> [<a href="http://gmpg.org/">GMPG</a>] </div>
<div id="footer">
	<p id="copyright"> Copyright &copy; 2003 &#8211;2004 GMPG. <a rel="license" href="http://creativecommons.org/licenses/by/2.0/">Some rights reserved</a>.</p>
</div>
</body>
</html>
