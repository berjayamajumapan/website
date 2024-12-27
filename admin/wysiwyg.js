//
// TextAreaPro v1.0 - Copyright (c) 2004 akwebtools.com
// This copyright notice MUST stay intact for use (see license.txt).
//
	var mode = "WYSIWYG";
	var subdirectory = "ak_images/";
	var txtareaname = null;
	var buttonlist = Array(	'FontName',
							'FontSize',
							'SelectAll',
							'Delete',
							'Cut',
							'Copy',
							'Paste',
							'SaveAs',
							'Print',
							'Separator',
							'Bold',
							'Italic',
							'Underline',
							'Strikethrough',
							'Separator',
							'JustifyLeft',
							'JustifyCenter',
							'JustifyRight',
							'JustifyFull',
							'Separator',
							'InsertOrderedList',
							'InsertUnorderedList',
							'Outdent',
							'Indent',
							'Separator',
							'SuperScript',
							'SubScript',
							'Separator',
							'InsertHorizontalRule',
							'CreateLink',
							'Unlink',
							'Image',
							'Table',
							'SpecialChars',
							'Separator',
							'Forecolor',
							'Backcolor',
							'Separator',
							'Date',
							'ChangeMode',
							'Separator',							
							'Help'
					);	
					
	var menuButtons = {
						//	 button id					     	images								help text			  click&hold  statuscheck Disable(html mode)						          
						"SelectAll": 						['mn_selectall.gif', 					'Select All', 				'0',	'0',		'0'],
						"Delete":							['mn_delete.gif', 						'Delete', 					'0',	'0',		'0'],
						"Cut":								['mn_cut.gif',							'Cut', 						'0',	'0',		'0'],
						"Copy":								['mn_copy.gif',							'Copy', 					'0',	'0',		'0'],
						"Paste":							['mn_paste.gif',						'Paste', 					'0',	'0',		'0'],
						"SaveAs":							['mn_saveas.gif',						'Save As', 					'0',	'0',		'0'],
						"Print":							['mn_print.gif',						'Print', 					'0',	'0',		'0'],
						"Bold":								['mn_bold.gif',							'Bold', 					'1',	'1',		'1'],
						"Italic":							['mn_italic.gif',						'Italic', 					'1',	'1',		'1'],
						"Underline":						['mn_underline.gif',					'Underline', 				'1',	'1',		'1'],
						"Strikethrough":					['mn_strikethrough.gif',				'Strikethrough', 			'1',	'1',		'1'],
						"JustifyLeft":						['mn_justifyleft.gif',					'Justify Left', 			'1',	'1',		'1'],
						"JustifyCenter":					['mn_justifycenter.gif',				'Justify Center', 			'1',	'1',		'1'],
						"JustifyRight":						['mn_justifyright.gif',					'Justify Right', 			'1',	'1',		'1'],
						"JustifyFull":						['mn_justifyfull.gif',					'Justify Full', 			'1',	'1',		'1'],
						"InsertOrderedList":				['mn_insertorderedlist.gif',			'Insert Ordered List', 		'1',	'1',		'1'],
						"InsertUnorderedList":				['mn_insertunorderedlist.gif',			'Insert Unordered List', 	'1',	'1',		'1'],
						"Outdent":							['mn_outindent.gif',					'Outdent',	 				'0',	'0',		'1'],
						"Indent":							['mn_indent.gif',						'Indent', 					'0',	'0',		'1'],
						"SuperScript":						['mn_superscript.gif',					'Superscript', 				'0',	'1',		'1'],
						"SubScript":						['mn_subscript.gif',					'Subscript', 				'0',	'1',		'1'],
						"InsertHorizontalRule":				['mn_inserthorizontalrule.gif',			'Insert Horizontal Rule', 	'0',	'0',		'1'],
						"CreateLink":						['mn_createlink.gif',					'Create Link', 				'0',	'0',		'1'],
						"Unlink":							['mn_unlink.gif',						'Remove Link', 				'0',	'0',		'1'],
						"Image":							['mn_image.gif',						'Insert Image', 			'0',	'0',		'1'],
						"Table":							['mn_table.gif',						'Insert Table', 			'0',	'0',		'1'],
						"SpecialChars":						['mn_specialchars.gif',					'Special Characters', 		'0',	'0',		'1'],
						"Forecolor":						['mn_forecolor.gif',					'Forecolor', 				'0',	'0',		'1'],
						"Backcolor":						['mn_backcolor.gif',					'Backcolor', 				'0',	'0',		'1'],
						"Date":								['mn_date.gif',							'Insert Date',				'0',	'0',		'1'],
						"ChangeMode":						['mn_changemode.gif',					'Change Mode', 				'1',	'0',		'0'],
						"Help":								['mn_help.gif',							'Help', 					'0',	'0',		'0']
						};
	
	document.writeln('<style type="text/css">');
	document.writeln('.btn     		{ width: 22px; height: 22px; border: 1px solid buttonface; margin: 0; padding: 0; };');
	document.writeln('.btnOver 		{ width: 22px; height: 22px; border: 1px outset; };');
	document.writeln('.btnDown 		{ width: 22px; height: 22px; border: 1px inset; background-color: buttonhighlight};');
	document.writeln('.btnDisabled  { width: 22px; height: 22px; border: 1px solid buttonface; filter: alpha(opacity=30)};');
	document.writeln('.tablebg 		{ background-color: buttonface};');
	document.writeln('.optfont		{font-family: MS Sans Serif; font-size: 9pt;};');
	document.writeln('</style>');


	function ak_wysiwyg_generator(width, height, txtarea_name, bnconfig) 
	{ 
		if (!width) {width = 400;};
		if (!height) {height = 300;};
		var iebrowser_version = parseFloat(navigator.appVersion.split("MSIE")[1]);
		if (navigator.userAgent.indexOf('Mac')>=0 || navigator.userAgent.indexOf('Windows CE')>=0 || navigator.userAgent.indexOf('Opera')>=0) { iebrowser_version = 0;}
		if (iebrowser_version >= 5.5) {
			//Begin of WYSIWYG editor
			if (txtarea_name) {
				document.getElementById(txtarea_name).style.display="none";
				txtareaname = txtarea_name; 
			}
			if (bnconfig) {buttonlist = bnconfig;}
			if (AK_editor_url) {subdirectory = AK_editor_url + subdirectory}		
			
			document.writeln('<table border="0" width="' + width + '" class="tablebg"><tr><td width=' + width + ' valign="top">');			
			for (var j=0; j<buttonlist.length;j++) {
				if (buttonlist[j] == 'Separator'){
					document.writeln('<span style="border: 1px inset; width: 1px; font-size: 16px; height: 16px; margin: 0 3 0 3"></span>');
				} else if (buttonlist[j] == 'FontName') {					
					document.writeln(' <select id="bn_ak_fontname" class="optfont" onchange="ak_fontname();">');
					document.writeln(' 	<option value="Arial">Arial</option>');
					document.writeln('	<option value="Courier New">Courier New</option>');
					document.writeln('	<option value="Georgia">Georgian</option>');
					document.writeln('	<option value="Tahoma">Tahoma</option>');
					document.writeln('	<option value="Times New Roman">Times New Roman</option>');
					document.writeln('	<option value="Verdana" selected>Verdana</option>');
					document.writeln('	<option value="impact">Impact</option>');
					document.writeln('</select>');
				} else if (buttonlist[j] == 'FontSize') {
					document.writeln('<select id="bn_ak_fontsize" class="optfont" onchange="ak_fontsize();">');
					document.writeln(' 	<option value="1"> 8pt </option>');
					document.writeln('	<option value="2"> 10pt </option>');
					document.writeln('	<option value="3" selected> 12pt </option>');
					document.writeln(' 	<option value="4"> 14pt </option>');
					document.writeln('	<option value="5"> 18pt </option>');
					document.writeln('	<option value="6"> 24pt </option>');
					document.writeln('	<option value="7"> 36pt </option>');
					document.writeln('</select>');
				} else {
					if (menuButtons[buttonlist[j]][2]=='1') {
						document.writeln('<button id=\"bn_ak_' + buttonlist[j].toLowerCase()+ '\" onclick=\"m_click(this);ak_' +buttonlist[j].toLowerCase()+ '();" 	class="btn" onmouseover="m_over(this);" onmouseout="m_out(this);"><img src="' + subdirectory + menuButtons[buttonlist[j]][0] + '" alt="' + menuButtons[buttonlist[j]][1] + '" border="0"></button>');
					} else {
						document.writeln('<button id=\"bn_ak_' + buttonlist[j].toLowerCase()+ '\" onclick=\"ak_' +buttonlist[j].toLowerCase()+ '();" 	class="btn" onmouseover="m_over(this);" onmouseout="m_out(this);"><img src="' + subdirectory + menuButtons[buttonlist[j]][0] + '" alt="' + menuButtons[buttonlist[j]][1] + '" border="0"></button>');
					}
				}
			}
			document.writeln('<button id="bn_ak_info" 			onclick="ak_info();" 										class="btn" onmouseover="m_over(this);" onmouseout="m_out(this);"><img src="'+subdirectory+'mn_info.gif" alt="About Us" border="0"></button>&nbsp;');
			document.writeln('</td></tr></table>');
			document.writeln('<iframe id="myEditor" width="' + width + '" height="' + height + '" src="'+subdirectory+'/blank.html"></iframe>');
			
			myEditor.document.designMode = 'On';
			
			if (txtareaname) {
				var command = "myEditor.document.body.innerHTML = document.getElementById(txtareaname).value;"
        		setTimeout(command,500);	
			}		
			
			frames['myEditor'].document.onkeyup = keyHandler;
			frames['myEditor'].document.onmouseup = keyHandler;
			document.keydown = externalkeyHandler;
			document.onmousedown = externalkeyHandler;
			
			//End of WYSIWYG editor
		} else if (!txtarea_name) {
			document.writeln('<textarea id="myEditor" cols="' + parseInt(width/8) + '" rows="' + parseInt(height/15) + '">*** Your browser must be IE5.0 or above to display the editor\'s controls ***</textarea>');		
		}		
	}
	 
	function ak_fontname() 
	{ 
		myEditor.focus();	
		var name = document.getElementById('bn_ak_fontname').value;
		myEditor.document.execCommand('FontName', false, name); 
	}
	
	function ak_fontsize() 
	{ 
		myEditor.focus();	
		var size = document.getElementById('bn_ak_fontsize').value;
		myEditor.document.execCommand('FontSize', false, size); 
	}
	
	function ak_bold() 
	{ 
		myEditor.focus();	
		myEditor.document.execCommand('Bold', false, null); 
	}
	
	function ak_italic() 
	{ 
		myEditor.focus();
		myEditor.document.execCommand('Italic', false, null); 
	}
	
	function ak_underline() 
	{ 
		myEditor.focus();
		myEditor.document.execCommand('Underline', false, null); 
	}
	function ak_strikethrough() 
	{ 
		myEditor.focus();
		myEditor.document.execCommand('StrikeThrough', false, null); 
	}

	function ak_createlink()
	{
		myEditor.focus();
		myEditor.document.execCommand('CreateLink', true, null); 
	}
	
	function ak_unlink()
	{
		myEditor.focus();
		myEditor.document.execCommand('Unlink', false, null); 
	}
		function ak_print()
	{
		myEditor.focus();
		myEditor.document.execCommand('Print', false, null); 
	}
	function ak_selectall()
	{
		myEditor.focus();
		myEditor.document.execCommand('SelectAll', false, null); 
	}
	
	function ak_delete()
	{
		myEditor.focus();
		myEditor.document.execCommand('Delete', false, null); 
	}	
	function ak_copy()
	{
		myEditor.focus();
		myEditor.document.execCommand('Copy', false, null); 
	}
	function ak_paste()
	{
		myEditor.focus();
		myEditor.document.execCommand('Paste', false, null); 
	}
	function ak_cut()
	{
		myEditor.focus();
		myEditor.document.execCommand('Cut', false, null); 
	}
	function ak_inserthorizontalrule()
	{
		myEditor.focus();
		myEditor.document.execCommand('InsertHorizontalRule', false, null); 
	}
	function ak_saveas()
	{
		myEditor.focus();
		myEditor.document.execCommand('SaveAs', true, "Untitled"); 
	}
	function ak_indent()
	{
		myEditor.focus();
		myEditor.document.execCommand('Indent', false, null); 
	}
	function ak_outdent()
	{
		myEditor.focus();
		myEditor.document.execCommand('Outdent', false, null); 
	}
	
	function ak_insertunorderedlist()
	{
		myEditor.focus();
		document.getElementById('bn_ak_insertorderedlist').className='btn';
		myEditor.document.execCommand('insertUnorderedList', false, null); 
	}
	
	function ak_insertorderedlist()
	{
		myEditor.focus();
		document.getElementById('bn_ak_insertunorderedlist').className='btn';
		myEditor.document.execCommand('insertOrderedList', false, null); 
	}
	
	function ak_justifyleft()
	{
		myEditor.focus();
		document.getElementById('bn_ak_justifyright').className='btn';
		document.getElementById('bn_ak_justifycenter').className='btn';
		document.getElementById('bn_ak_justifyfull').className='btn';
		document.getElementById('bn_ak_justifyfull').disabled=false;
		document.getElementById('bn_ak_justifyright').disabled=false;
		document.getElementById('bn_ak_justifycenter').disabled=false;
		document.getElementById('bn_ak_justifyleft').disabled=true;
		myEditor.document.execCommand('justifyLeft', false, null); 
	}
	
	function ak_justifycenter()
	{
		myEditor.focus();
		document.getElementById('bn_ak_justifyright').className='btn';
		document.getElementById('bn_ak_justifyleft').className='btn';
		document.getElementById('bn_ak_justifyfull').className='btn';
		document.getElementById('bn_ak_justifyfull').disabled=false;
		document.getElementById('bn_ak_justifyright').disabled=false;
		document.getElementById('bn_ak_justifycenter').disabled=true;
		document.getElementById('bn_ak_justifyleft').disabled=false;
		myEditor.document.execCommand('justifyCenter', false, null); 
	}
	
	function ak_justifyright()
	{
		myEditor.focus();
		document.getElementById('bn_ak_justifyleft').className='btn';
		document.getElementById('bn_ak_justifycenter').className='btn';
		document.getElementById('bn_ak_justifyfull').className='btn';
		document.getElementById('bn_ak_justifyfull').disabled=false;
		document.getElementById('bn_ak_justifyright').disabled=true;
		document.getElementById('bn_ak_justifycenter').disabled=false;
		document.getElementById('bn_ak_justifyleft').disabled=false;
		myEditor.document.execCommand('justifyRight', false, null); 
	}
	
	function ak_justifyfull()
	{
		myEditor.focus();
		document.getElementById('bn_ak_justifyleft').className='btn';
		document.getElementById('bn_ak_justifycenter').className='btn';
		document.getElementById('bn_ak_justifyright').className='btn';
		document.getElementById('bn_ak_justifyfull').disabled=true;
		document.getElementById('bn_ak_justifyright').disabled=false;
		document.getElementById('bn_ak_justifycenter').disabled=false;
		document.getElementById('bn_ak_justifyleft').disabled=false;
		myEditor.document.execCommand('JustifyFull', false, null); 
	}
	

	function ak_superscript()
	{
		myEditor.focus();
		if (myEditor.document.queryCommandValue('SuperScript')) {
			myEditor.document.execCommand('RemoveFormat');
		} else {
			myEditor.document.execCommand('SuperScript');
		}
		updatetoolbar();
	}
	
	function ak_subscript()
	{
		myEditor.focus();
		if (myEditor.document.queryCommandValue('SubScript')) {
			myEditor.document.execCommand('RemoveFormat');
		} else {
			myEditor.document.execCommand('SubScript');
		}
		updatetoolbar();
	}
	
	function ak_backcolor()
	{
		var mycolor = showModalDialog(subdirectory + "insertcolors.html", "", "dialogHeight:230px; dialogWidth: 250px; scroll: no; status: no; help: no;");
		myEditor.focus();
		myEditor.document.execCommand('BackColor', true, mycolor); 
	}
	
	function ak_forecolor()
	{
		var mycolor = showModalDialog(subdirectory + "insertcolors.html", "", "dialogHeight:230px; dialogWidth: 250px; scroll: no; status: no; help: no;");
		myEditor.focus();
		myEditor.document.execCommand('ForeColor', true, mycolor); 
	}
	
	function ak_image()
	{
		var myimage = showModalDialog(subdirectory + "insertimage.html", "", "dialogHeight:230px; dialogWidth: 420px; scroll: no; status: no; help: no;");
		if (myimage){		
			ak_inserttags(myimage, "");
		}
	}
	
	function ak_table()
	{
		var mytable = showModalDialog(subdirectory + "inserttable.html", "", "dialogHeight:160px; dialogWidth: 325px; scroll: no; status: no; help: no;");
		if (mytable){	
			ak_inserttags(mytable, "");
		}
	}
	
	function ak_date()
	{
		var myday = showModalDialog(subdirectory + "insertdate.html", "", "dialogHeight:190px; dialogWidth: 215px; scroll: no; status: no; help: no;");
		if (myday){	
			ak_inserttags(myday, "");
		}
	}
	
	function ak_specialchars()
	{
		var mychar = showModalDialog(subdirectory + "insertcharacters.html", "", "dialogHeight:400px; dialogWidth: 340px; scroll: no; status: no; help: no;");
		if (mychar && mychar != ""){		
			ak_inserttags(mychar, "");
		}
	}
	function ak_help()
	{
		showModalDialog(subdirectory + "help.html", "", "dialogHeight:300px; dialogWidth: 400px; scroll: no; status: no; help: no;");
	}
	function ak_info()
	{
		showModalDialog(subdirectory + "aboutus.html", "", "dialogHeight:210px; dialogWidth: 360px; scroll: no; status: no; help: no;");
	}
	
	function ak_inserttags(str1, str2) {
	  	myEditor.focus();
	  	var tr = myEditor.document.selection.createRange();
		if (str2 != ""){tr.pasteHTML(str1 + tr.text + str2);}
		else {tr.pasteHTML(str1);}
		
	  	tr.select();
	  	myEditor.focus();
	}
	
	function ak_changemode()
	{
	 	if (mode == 'html') 
	 	{
	   		innerTmp = myEditor.document.body.innerText;
	   		myEditor.document.body.innerHTML = innerTmp;
	   		mode = 'WYSIWYG' ;
			enablebuttons();
	 	}else{
	   		innerTmp = myEditor.document.body.innerHTML;
	   		myEditor.document.body.innerText = innerTmp;
	   		mode = 'html' ;
			disablebuttons();
	 	}
		var s = myEditor.document.body.createTextRange();
		s.collapse(false);
		s.select();
	}
	
	function m_over(obj){
		if(obj.className=='btn'){obj.className='btnOver'};
	}
	function m_out(obj){
		if(obj.className=='btnOver'){obj.className='btn'};
	}
	function m_click(obj){
		if(obj.className !='btnDown'){obj.className='btnDown';}
		else {obj.className='btn'};
	}
	
	function copycontents() {
		if (txtareaname) {
			document.getElementById(txtareaname).value = myEditor.document.body.innerHTML;
		}
  	}

	function keyHandler() 
	{
		updatetoolbar();
	}
	function externalkeyHandler() 
	{
		copycontents();
	}
	
	function updatetoolbar()
	{
		myEditor.focus();
		//check current text with button's state.
		for (var i=0; i<buttonlist.length; i++) {
			
			if (buttonlist[i] == 'FontSize') {
				if (myEditor.document.queryCommandValue("FontSize")) {
					for (var j = 0; j < document.getElementById('bn_ak_fontsize').options.length; j++ )
					{
						if (document.getElementById('bn_ak_fontsize').options[j].value == ""+myEditor.document.queryCommandValue("FontSize"))
						{
					  		document.getElementById('bn_ak_fontsize').options.selectedIndex = j;
						}
					}
				} else {
					document.getElementById('bn_ak_fontsize').options.selectedIndex = -1;
				}			
			} else if (buttonlist[i] == 'FontName') {
				if (myEditor.document.queryCommandValue("FontName")) {		
					for (var j = 0; j < document.getElementById('bn_ak_fontname').options.length; j++ )
					{
						if (document.getElementById('bn_ak_fontname').options[j].value == ""+myEditor.document.queryCommandValue("FontName"))
						{
					  		document.getElementById('bn_ak_fontname').options.selectedIndex = j;
						}
					}
				} else {
					document.getElementById('bn_ak_fontname').options.selectedIndex = -1;
				}
			} else {
				if (buttonlist[i] != 'Separator' && menuButtons[buttonlist[i]][3]=='1') {
					if (myEditor.document.queryCommandValue(buttonlist[i])) {document.getElementById('bn_ak_'+buttonlist[i].toLowerCase()).className = 'btnDown';}
					else if (document.getElementById('bn_ak_'+buttonlist[i].toLowerCase()).className != 'btnDisabled') {document.getElementById('bn_ak_'+buttonlist[i].toLowerCase()).className = 'btn';}
				}					
			}
		}		
	}
	
	function disablebuttons()
	{
		for (var i=0; i<buttonlist.length;i++){
			if (buttonlist[i] == 'FontName'){
				document.getElementById('bn_ak_fontname').disabled=true;	
			} else if (buttonlist[i] == 'FontSize') {
				document.getElementById('bn_ak_fontsize').disabled=true;
			}else {
				if (buttonlist[i] != 'Separator' && menuButtons[buttonlist[i]][4]=='1') {
					document.getElementById('bn_ak_'+ buttonlist[i].toLowerCase()).className='btnDisabled';
					document.getElementById('bn_ak_'+ buttonlist[i].toLowerCase()).disabled=true;
				}
			}
		}	
	}
	function enablebuttons()
	{			
		for (var i=0; i<buttonlist.length;i++){
			if (buttonlist[i] == 'FontName'){
				document.getElementById('bn_ak_fontname').disabled=false;	
			} else if (buttonlist[i] == 'FontSize') {
				document.getElementById('bn_ak_fontsize').disabled=false;
			}else {
				if (buttonlist[i] != 'Separator' && menuButtons[buttonlist[i]][4]=='1') {
					document.getElementById('bn_ak_'+ buttonlist[i].toLowerCase()).className='btn';
					document.getElementById('bn_ak_'+ buttonlist[i].toLowerCase()).disabled=false;
				}
			}
		}	
		updatetoolbar();
	}