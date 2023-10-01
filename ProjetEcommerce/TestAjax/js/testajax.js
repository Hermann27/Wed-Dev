 var xhr;
function Ajax(){
//instanciation de l'objet XmlHttprequest ou activeXobject
if(window.XMLHttpRequest){
	xhr=new XMLHttpRequest();
	}else if(window.ActiveXObject){
		try{
		xhr=new ActiveXObject("Msxml2.XMLHTTP");
		} catch(e){
						try{		
						xhr=new ActiveXObject("Microsoft.XMLHTTP");
					}catch(e){
					xhr=false;
				}
		}	
	}
}
//fonction---------------
function mafonctionAjax(){
	Ajax();
	xhr.onreadystatechange=function(){
	if(xhr.readyState==4){
	alert("hermann");
			if(xhr.status==200)
			{
				//afficher reponse :succe
				
				document.getElementById("ici").innerHTML=xhr.responseText;				
			}else
				{
					//echec 
					
				}
	}else
		{
			alert("veuillez patienter");
		}
		

	}
	//communication avec le serveur
	xhr.open("POST","Traitement/traitement.php",true);
	//xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send();

}