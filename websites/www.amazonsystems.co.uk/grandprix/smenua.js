<!-- Begin
// Original:  Angus Turnbull
// Web Site:  http://gusnz.cjb.net
// from: The JavaScript Source!! http://javascript.internet.com
var isDOM = (document.getElementById ? true : false); 
var isIE4 = ((document.all && !isDOM) ? true : false);
var isNS4 = (document.layers ? true : false);
function getRef(id) {
if (isDOM) return document.getElementById(id);
if (isIE4) return document.all[id];
if (isNS4) return document.layers[id];
}
function getSty(id) {
return (isNS4 ? getRef(id) : getRef(id).style);
} 
// Hide timeout.
var popTimer = 0;
// Array showing highlighted menu items.
var litNow = new Array();
function popOver(menuNum, itemNum) {
clearTimeout(popTimer);
hideAllBut(menuNum);
litNow = getTree(menuNum, itemNum);
changeCol(litNow, true);
targetNum = menu[menuNum][itemNum].target;
if (targetNum > 0) {
thisX = parseInt(menu[menuNum][0].ref.left) + parseInt(menu[menuNum][itemNum].ref.left);
thisY = parseInt(menu[menuNum][0].ref.top) + parseInt(menu[menuNum][itemNum].ref.top);
with (menu[targetNum][0].ref) {
left = parseInt(thisX + menu[targetNum][0].x);
top = parseInt(thisY + menu[targetNum][0].y);
visibility = 'visible';
      }
   }
}
function popOut(menuNum, itemNum) {
if ((menuNum == 0) && !menu[menuNum][itemNum].target)
hideAllBut(0)
else
popTimer = setTimeout('hideAllBut(0)', 500);
}
function getTree(menuNum, itemNum) {

itemArray = new Array(menu.length);

while(1) {
itemArray[menuNum] = itemNum;
// If we've reached the top of the hierarchy, return.
if (menuNum == 0) return itemArray;
itemNum = menu[menuNum][0].parentItem;
menuNum = menu[menuNum][0].parentMenu;
   }
}

function changeCol(changeArray, isOver) {
for (menuCount = 0; menuCount < changeArray.length; menuCount++) {
if (changeArray[menuCount]) {
newCol = isOver ? menu[menuCount][0].overCol : menu[menuCount][0].backCol;
// Change the colours of the div/layer background.
with (menu[menuCount][changeArray[menuCount]].ref) {
if (isNS4) bgColor = newCol;
else backgroundColor = newCol;
         }
      }
   }
}
function hideAllBut(menuNum) {
var keepMenus = getTree(menuNum, 1);
for (count = 0; count < menu.length; count++)
if (!keepMenus[count])
menu[count][0].ref.visibility = 'hidden';
changeCol(litNow, false);
}


function Menu(isVert, popInd, x, y, width, overCol, backCol, borderClass, textClass) {
this.isVert = isVert;
this.popInd = popInd
this.x = x;
this.y = y;
this.width = width;
this.overCol = overCol;
this.backCol = backCol;
this.borderClass = borderClass;
this.textClass = textClass;
this.parentMenu = null;
this.parentItem = null;
this.ref = null;
}

function Item(text, href, frame, length, spacing, target) {
this.text = text;
this.href = href;
this.frame = frame;
this.length = length;
this.spacing = spacing;
this.target = target;
this.ref = null;
}

function writeMenus() {
if (!isDOM && !isIE4 && !isNS4) return;

for (currMenu = 0; currMenu < menu.length; currMenu++) with (menu[currMenu][0]) {
var str = '', itemX = 0, itemY = 0;

for (currItem = 1; currItem < menu[currMenu].length; currItem++) with (menu[currMenu][currItem]) {
var itemID = 'menu' + currMenu + 'item' + currItem;

var w = (isVert ? width : length);
var h = (isVert ? length : width);

if (isDOM || isIE4) {
str += '<div id="' + itemID + '" style="position: absolute; left: ' + itemX + '; top: ' + itemY + '; width: ' + w + '; height: ' + h + '; visibility: inherit; ';
if (backCol) str += 'background: ' + backCol + '; ';
str += '" ';
}
if (isNS4) {
str += '<layer id="' + itemID + '" left="' + itemX + '" top="' + itemY + '" width="' +  w + '" height="' + h + '" visibility="inherit" ';
if (backCol) str += 'bgcolor="' + backCol + '" ';
}
if (borderClass) str += 'class="' + borderClass + '" ';

str += 'onMouseOver="popOver(' + currMenu + ',' + currItem + ')" onMouseOut="popOut(' + currMenu + ',' + currItem + ')">';

str += '<table width="' + (w - 8) + '" border="0" cellspacing="0" cellpadding="' + (!isNS4 && borderClass ? 3 : 0) + '"><tr><td align="left" height="' + (h - 7) + '">' + '<a class="' + textClass + '" href="' + href + '"' + (frame ? ' target="' + frame + '">' : '>') + text + '</a></td>';
if (target > 0) {

menu[target][0].parentMenu = currMenu;
menu[target][0].parentItem = currItem;

if (popInd) str += '<td class="' + textClass + '" align="right">' + popInd + '</td>';
}
str += '</tr></table>' + (isNS4 ? '</layer>' : '</div>');
if (isVert) itemY += length + spacing;
else itemX += length + spacing;
}
if (isDOM) {
var newDiv = document.createElement('div');
document.getElementsByTagName('body').item(0).appendChild(newDiv);
newDiv.innerHTML = str;
ref = newDiv.style;
ref.position = 'absolute';
ref.visibility = 'hidden';
}

if (isIE4) {
document.body.insertAdjacentHTML('beforeEnd', '<div id="menu' + currMenu + 'div" ' + 'style="position: absolute; visibility: hidden">' + str + '</div>');
ref = getSty('menu' + currMenu + 'div');
}

if (isNS4) {
ref = new Layer(0);
ref.document.write(str);
ref.document.close();
}

for (currItem = 1; currItem < menu[currMenu].length; currItem++) {
itemName = 'menu' + currMenu + 'item' + currItem;
if (isDOM || isIE4) menu[currMenu][currItem].ref = getSty(itemName);
if (isNS4) menu[currMenu][currItem].ref = ref.document[itemName];
   }
}
with(menu[0][0]) {
ref.left = x;
ref.top = y;
ref.visibility = 'visible';
   }
}

var menu = new Array();

var defOver = '#336699', defBack = '#003366';

var defLength = 30;

menu[0] = new Array();
menu[0][0] = new Menu(false, '', 65, 145, 20, '#669999', '#006666', '', 'itemText');
menu[0][1] = new Item('&nbsp; Home<BR>&nbsp;', './index.htm', '', 65, 0, 0);
menu[0][2] = new Item('About Us<BR>&nbsp;', './intro.htm', '', 65, 0, 1);
menu[0][3] = new Item('&nbsp; News<BR>&nbsp;', '#', '', 65, 0, 2);
menu[0][4] = new Item('&nbsp; Events<BR>&nbsp;', './events.htm', '', 65, 0, 3);
menu[0][5] = new Item('Useful Tips', './tips.htm', '', 65, 0, 4);
menu[0][6] = new Item('Future &nbsp; Champs', './juniors.htm', '', 65, 0, 0);
menu[0][7] = new Item('&nbsp; Jobs<BR>&nbsp;', './jobs.htm', '', 65, 0, 0);
menu[0][8] = new Item('&nbsp; Links<BR>&nbsp;', './links.htm', '', 65, 0, 0);
menu[0][9] = new Item('Fun Stuff<BR>&nbsp;', '#', '', 65, 0, 5);

menu[1] = new Array();
menu[1][0] = new Menu(true, '&gt;', 0, 32, 80, defOver, defBack, 'itemBorder', 'itemText');
menu[1][1] = new Item('Contact Us', './intro.htm', '', defLength, 0, 0);
menu[1][2] = new Item('History', './intro.htm#history', '', defLength, 0, 0);
menu[1][3] = new Item('People', './intro.htm#people', '', defLength, 0, 0);
menu[1][4] = new Item('Map', './map.htm', '', defLength, 0, 0);

menu[2] = new Array();
menu[2][0] = new Menu(true, '&gt;', 0, 32, 80, defOver, defBack, 'itemBorder', 'itemText');
menu[2][1] = new Item('Track News', './stock.htm', '', defLength, 0, 0);
menu[2][2] = new Item('Offers', './stocka.htm', '', defLength, 0, 0);

menu[3] = new Array();
menu[3][0] = new Menu(true, '&lt;', 0, 32, 100, defOver, defBack, 'itemBorder', 'itemText');
menu[3][1] = new Item('Arrive &amp; Drive', './events.htm', '', defLength, 0, 0);
menu[3][2] = new Item('Grand Prix', './events.htm#grandprix', '', defLength, 0, 0);
menu[3][3] = new Item('Enduro', './events.htm#enduro', '', defLength, 0, 0);
menu[3][4] = new Item('Multi-Activity', './events.htm#multi', '', defLength, 0, 0);
menu[3][5] = new Item('Parties', './juniors.htm#parties', '', defLength, 0, 0);
menu[3][6] = new Item('Corporate', './events.htm#corporate', '', defLength, 0, 0);

menu[4] = new Array();
menu[4][0] = new Menu(true, '&gt;', 0, 32, 100, defOver, defBack, 'itemBorder', 'itemText');
menu[4][1] = new Item('Attire', './tips.htm', '', defLength, 0, 0);
menu[4][2] = new Item('Flags &amp; Rules', './tips.htm#flags', '', defLength, 0, 0);
menu[4][3] = new Item('Driving Hints', 
'http://www.amazonsystems.co.uk/data/drivhint.htm', '_blank', defLength, 0, 0);

menu[5] = new Array();
menu[5][0] = new Menu(true, '&gt;', 0, 32, 80, defOver, defBack, 'itemBorder', 'itemText');
menu[5][1] = new Item('KartCam', './kartcam.htm', '_blank', defLength, 0, 0);




var popOldWidth = window.innerWidth;
nsResizeHandler = new Function('if (popOldWidth != window.innerWidth) location.reload()');


if (isNS4) document.captureEvents(Event.CLICK);
document.onclick = clickHandle;

function clickHandle(evt)
{
 if (isNS4) document.routeEvent(evt);
 hideAllBut(0);
}
function moveRoot()
{
 with(menu[0][0].ref) left = ((parseInt(left) < 300) ? 300 : 5);
}
// Popup Windows
function telepop()
{
	var popurl = "http://www.amazonsystems.co.uk/grandprix/telemess.htm"
	winpops = window.open(popurl, "", "width=550, height = 550, scrollbars, resizable,")
}
function quotepop()
{
	var popurl = "http://www.amazonsystems.co.uk/grandprix/quote.htm"
	winpops = window.open(popurl, "", "width=600, height = 550, scrollbars, resizable,")
}
//  End -->
