
<style type="text/css">

}
.credits {
	margin-bottom: 80px;
	padding-bottom: 30px;
	border-bottom: solid 1px #ccc;
}

/* search form 
-------------------------------------- */
.searchform {
	display: inline-block;
	zoom: 1; /* ie7 hack for display:inline-block */
	*display: inline;
	border: solid 1px #d2d2d2;
	padding: 3px 5px;
	
	-webkit-border-radius: 2em;
	-moz-border-radius: 2em;
	border-radius: 2em;

	-webkit-box-shadow: 0 1px 0px rgba(0,0,0,.1);
	-moz-box-shadow: 0 1px 0px rgba(0,0,0,.1);
	box-shadow: 0 1px 0px rgba(0,0,0,.1);

	background: #f1f1f1;
	background: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#ededed));
	background: -moz-linear-gradient(top,  #fff,  #ededed);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed'); /* ie7 */
	-ms-filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#ededed'); /* ie8 */
}
.searchform input {
	font: normal 12px/100% Arial, Helvetica, sans-serif;
}
.searchform .searchfield {
	background: #fff;
	padding: 6px 6px 6px 8px;
	width: 202px;
	border: solid 1px #bcbbbb;
	outline: none;

	-webkit-border-radius: 2em;
	-moz-border-radius: 2em;
	border-radius: 2em;

	-moz-box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
	-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
	box-shadow: inset 0 1px 2px rgba(0,0,0,.2);
}
.searchform .searchbutton {
	color: #fff;
	border: solid 1px #494949;
	font-size: 11px;
	height: 27px;
	width: 27px;
	text-shadow: 0 1px 1px rgba(0,0,0,.6);

	-webkit-border-radius: 2em;
	-moz-border-radius: 2em;
	border-radius: 2em;

	background: #5f5f5f;
	background: -webkit-gradient(linear, left top, left bottom, from(#9e9e9e), to(#454545));
	background: -moz-linear-gradient(top,  #9e9e9e,  #454545);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#9e9e9e', endColorstr='#454545'); /* ie7 */
	-ms-filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#9e9e9e', endColorstr='#454545'); /* ie8 */
}
.searchselect {
	color: #fff;
	border: solid 1px #494949;
	font-size: 11px;
	height: 27px;
	width: 65px;
	text-shadow: 0 1px 1px rgba(0,0,0,.6);

	-webkit-border-radius: 4em;
	-moz-border-radius: 4em;
	border-radius: 4em;

	background: #5f5f5f;
	background: -webkit-gradient(linear, left top, left bottom, from(#9e9e9e), to(#454545));
	background: -moz-linear-gradient(top,  #9e9e9e,  #454545);
	filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#9e9e9e', endColorstr='#454545'); /* ie7 */
	-ms-filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#9e9e9e', endColorstr='#454545'); /* ie8 */
}
</style>

<form class="searchform"action="allsearch.php"method="post">
<select class="searchselect"name="types"><option>All</option><option>Study</option><option>Video</option><option>Songs</option><option>Rockstar</option></select>
	<input class="searchfield" type="text" value="Search..."name="std"id="srch" list="datalist1" onfocus="if (this.value == 'Search...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search...';}" />
	<input class="searchbutton" type="submit" value="Go"name="searchstd" />
	<datalist id="datalist1">
	       <option value="Aditya Snehi">
		
            </datalist>
		   </form>
		  
</form>