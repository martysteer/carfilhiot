<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>

<title>Cr&eacute;ateur XFN 1.1</title>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<link href="creator" rel="alternate" hreflang="en" title="XFN Creator in English" />

<link href="creator-cs" rel="alternate" hreflang="cs" title="Nástroj pro tvorbu XFN 1.1" />

<link href="creator-es" rel="alternate" hreflang="es" title="XFN Creator en Espa&ntilde;ol" />

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

<h1>Cr&eacute;ateur <abbr title="XHTML Friends Network">XFN</abbr> 1.1</h1>

<form action="" onreset="resetstuff();">

  <table cellspacing="0">

    <tbody>

      <tr>

        <th scope="row">Nom</th>

        <td> <input id="linkText" type="text" /> </td>

      </tr>

      <tr>

        <th scope="row">URL</th>

        <td> <input id="linkUrl" type="text" /> <label for="me"><input

 name="identity" value="me" id="me" type="checkbox" />&nbsp;autre

adresse web m'appartenant</label> </td>

      </tr>

      <tr>

        <th scope="row"> amiti&eacute; </th>

        <td> <label for="friendship-contact"><input class="valinp"

 name="friendship" value="contact" id="friendship-contact" type="radio" />&nbsp;contact

        </label><label for="friendship-aquaintance"><input

 class="valinp" name="friendship" value="acquaintance"

 id="friendship-aquaintance" type="radio" />&nbsp;connaissance </label> <label

 for="friendship-friend"><input class="valinp" name="friendship"

 value="friend" id="friendship-friend" type="radio" />&nbsp;ami(e) </label>

        <label for="friendship-none"><input class="valinp"

 name="friendship" value="" id="friendship-none" type="radio" />&nbsp;aucun</label>

        </td>

      </tr>

      <tr>

        <th scope="row"> physique </th>

        <td> <label for="met"><input class="valinp" name="physical"

 value="met" id="met" type="checkbox" />&nbsp;rencontr&eacute;(e)</label>

        </td>

      </tr>

      <tr>

        <th scope="row"> professionel </th>

        <td> <label for="co-worker"><input class="valinp"

 name="professional" value="co-worker" id="co-worker" type="checkbox" />&nbsp;camarade

de travail </label> <label for="colleague"><input class="valinp"

 name="professional" value="colleague" id="colleague" type="checkbox" />&nbsp;coll&egrave;gue</label>

        </td>

      </tr>

      <tr>

        <th scope="row"> g&eacute;ographique </th>

        <td> <label for="co-resident"><input class="valinp"

 name="geographical" value="co-resident" id="co-resident" type="radio" />&nbsp;co-r&eacute;sident(e)

        </label> <label for="neighbor"><input class="valinp"

 name="geographical" value="neighbor" id="neighbor" type="radio" />&nbsp;voisin(e)

        </label> <label for="geographical-none"><input class="valinp"

 name="geographical" value="" id="geographical-none" type="radio" />&nbsp;aucun</label>

        </td>

      </tr>

      <tr>

        <th scope="row"> famille </th>

        <td> <label for="family-child"><input class="valinp"

 name="family" value="child" id="family-child" type="radio" />&nbsp;enfant

        </label> <label for="family-parent"><input class="valinp"

 name="family" value="parent" id="family-parent" type="radio" />&nbsp;parent

        </label> <label for="family-sibling"><input class="valinp"

 name="family" value="sibling" id="family-sibling" type="radio" />&nbsp;fr&egrave;re/soeur

        </label> <label for="family-spouse"><input class="valinp"

 name="family" value="spouse" id="family-spouse" type="radio" />&nbsp;&eacute;poux/&eacute;pouse

        </label> <label for="family-kin"><input class="valinp"

 name="family" value="kin" id="family-kin" type="radio" />&nbsp;famille </label>

        <label for="family-none"><input class="valinp" name="family"

 value="" id="family-none" type="radio" />&nbsp;aucun</label> </td>

      </tr>

      <tr>

        <th scope="row"> romantique </th>

        <td> <label for="muse"><input class="valinp" name="romantic"

 value="muse" id="muse" type="checkbox" />&nbsp;muse </label> <label

 for="crush"><input class="valinp" name="romantic" value="crush"

 id="crush" type="checkbox" />&nbsp;bluette </label> <label for="date"><input

 class="valinp" name="romantic" value="date" id="date" type="checkbox" />&nbsp;ami(e)

        </label> <label for="sweetheart"><input class="valinp"

 name="romantic" value="sweetheart" id="sweetheart" type="checkbox" />&nbsp;aim&eacute;(e)</label></td>

      </tr>

    </tbody>

  </table>

  <p> <button onclick="upit(); return false;">Construire le lien</button>

  <input value="Annuler" type="reset" /> </p>

</form>

<div id="xfnResult"> &lt;a href="" rel=""&gt;&lt;/a&gt; </div>

<p style="margin-top: 3em;">Cette interface utilisateur et son code

sont pr&eacute;sent&eacute;s ici en guise d'exemple pour les

d&eacute;veloppeurs XFN, ainsi

que pour d&eacute;montrer la relation existant entre les valeurs

XFN et

le code employ&eacute; pour les repr&eacute;senter. Cr&eacute;ateur XFN

1.0 par <a href="http://photomatt.net/">Matt

Mullenweg</a>.

Mise &agrave; jour du Cr&eacute;ateur XFN 1.1 par <a

 href="http://tantek.com/" lang="tr">Tantek

&Ccedil;elik</a>.

</p>

<p style="margin-top: 3em;">Traduction fran&ccedil;aise par <a

 href="http://www.almaren.ch/">Serge K. Keller</a>. Merci &agrave; <a

 href="http://www.caeciliana.ch/">C&eacute;cile Matthey</a> pour ses

conseils. </p>

<div id="trail"><a href="http://gmpg.org/xfn/">XFN</a> [<a

 href="http://gmpg.org/">GMPG</a>]

</div>

<div id="footer">

<p id="copyright">Copyright &copy; 2003&#8211;2004 GMPG. <a rel="license"

 href="http://creativecommons.org/licenses/by/2.0/">Some rights reserved</a>.</p>

</div>

</body>

</html>

