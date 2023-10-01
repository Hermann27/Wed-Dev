// JavaScript Document
var thenext=null;
function ajx(module, action, valeur, div, component){ 
	if(module=="null" || action=="null"  || div=="null") return;
	var xhr;	
	try {  
		xhr = new ActiveXObject('Msxml2.XMLHTTP');   
	}catch (e){
		try {  
			 xhr = new ActiveXObject('Microsoft.XMLHTTP');    
		    }catch (e2){
			  try {  
				xhr = new XMLHttpRequest();     
				}catch (e3) {  
					xhr = false;   
				}
			}
	}
    xhr.onreadystatechange  = function(){ 
		if(xhr.readyState  == 4){
			component.disabled=false;
		  if(xhr.status  == 200){
		  var rep = xhr.responseText;
		  var tab = rep.split('#');
			if(tab.length==1){
				document.getElementById(div).innerHTML="<span class=\"ko\">"+tab[0]+"</span>";		
			}else{
				if(tab[0] == 1)
					document.getElementById(div).innerHTML="<span class=\"ok\">"+tab[1]+"</span>";	
				else
					document.getElementById(div).innerHTML = tab[1];			
			}
			if(tab.length>2){
				thenext=tab[2];
				setTimeout("go()",2000);				
			}
		  }else{  
			document.getElementById(div).innerHTML="<span class= \"ok\">Error code " + xhr.status + "</span>";
		  }
     	}else{
			component.disabled=true;
     		document.getElementById(div).innerHTML="<img src='../images/chargement.gif' align='absmiddle'><i>Chargement...</i>";
     	}
	}; 
	//alert('module='+module+'&action='+action+'&'+valeur);
    xhr.open("POST", "../pages/routeur.php",  true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send('module='+module+'&action='+action+'&'+valeur);
}

function ajx2(module, action, valeur, component){ 

	if(module=="null" || action=="null") return;
	var xhr;	
	try {  
		xhr = new ActiveXObject('Msxml2.XMLHTTP');   
	}catch (e){
		try {  
			 xhr = new ActiveXObject('Microsoft.XMLHTTP');    
		    }catch (e2){
			  try {  
				xhr = new XMLHttpRequest();     
				}catch (e3) {  
					xhr = false;   
				}
			}
	}
    xhr.onreadystatechange  = function(){ 
		if(xhr.readyState  == 4){
		  if(xhr.status  == 200){
		  var rep = xhr.responseText;
		 	try{
				component.value = rep;
				component.innerHTML = rep;
		}catch (e){
			}
		  }else{  
			try{
				component.value = 'Error code '+ xhr.status;
				component.innerHTML = 'Error code '+ xhr.status;
		}catch (e){
			}
		  }
     	}else{
			try{
     			component.value = 'Chargement...';
				component.innerHTML = 'Chargement...';
			}catch (e){
			}
     	}
	}; 
	//alert('module='+module+'&action='+action+'&'+valeur);

    xhr.open("POST", "../pages/routeur.php",  true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send('module='+module+'&action='+action+'&'+valeur);
	
	return true;
}

function go(){
	window.open(thenext,'_top');
}