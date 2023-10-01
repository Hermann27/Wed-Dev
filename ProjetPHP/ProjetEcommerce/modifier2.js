
 var xhr;
function Ajax3(){
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
function hermann(){
	Ajax3();
	
	xhr.onreadystatechange=function(){
	if(xhr.readyState==4){
			if(xhr.status==200)
			{
				//afficher reponse :succe
				
				alert("Modification Effectuée avec succès !");				
			}else
				{
					//echec 
					
				}
	}else
		{
			//alert("veuillez patienter");
		}
		

	}
	//communication avec le serveur
	code=document.getElementById("id").value;
	nom=document.getElementById("nom").value;
	titre=document.getElementById("forme").value;
	prix=document.getElementById("pu").value;
	chaine1="id=" + code + "&nom=" + nom + "&forme=" + forme + "&pu=" + prix;
	xhr.open("POST","modification3.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(chaine1);
	

}


function supprim(){
	Ajax3();
	
	xhr.onreadystatechange=function(){
	if(xhr.readyState==4){
			if(xhr.status==200)
			{
				//afficher reponse :succe
				
				alert(xhr.responseText);				
			}else
				{
					//echec 
					
				}
	}else
		{
			//alert("veuillez patienter");
		}
		

	}
	//communication avec le serveur
	code=document.getElementById("id").value;
	
	chaine5="id=" + code;
	xhr.open("POST","suppression3.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(chaine5);
	

}

function ajout(){
	Ajax3();
	
	xhr.onreadystatechange=function(){
	if(xhr.readyState==4){
			if(xhr.status==200)
			{
				//afficher reponse :succe
				
				//alert(xhr.responseText);				
			}else
				{
					//echec 
					
				}
	}else
		{
			//alert("veuillez patienter");
		}
		

	}
	//communication avec le serveur
    nom=document.getElementById("nom").value;
	forme=document.getElementById("forme").value;
	prix=document.getElementById("prix").value;
	chaine7="nom=" + nom +"&forme=" + forme + "&prix=" + prix ;
	xhr.open("POST","ajout3.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(chaine7);
	

}
