
 var xhr;
function Ajax2(){
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
function mafonction(chaine){
	Ajax2();

	
	xhr.onreadystatechange=function(){
	if(xhr.readyState==4){
			if(xhr.status==200)
			{
				//afficher reponse :succe
				
				document.getElementById("form").innerHTML=xhr.responseText;
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
	
	chain="CodeLivre=" + chaine;
	xhr.open("POST","modification2.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(chain);
	

}


function travail(chaine){
	Ajax2();

	
	xhr.onreadystatechange=function(){
	if(xhr.readyState==4){
			if(xhr.status==200)
			{
				//afficher reponse :succe

				if(xhr.responseText=="true"){

                                       alert("vous n etes pas connecte !");
                                       mafonctionAjax2();
				}else if(xhr.responseText=="false"){

                                       alert("vous n avez pas les droits requis !");
                                       mafonctionAjax2();
				}else{

                                    mafonction(chaine);
				}
				
				document.getElementById("form").innerHTML=xhr.responseText;
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
	
	
	xhr.open("GET","droit.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(null);
	

}


function travail1(chaine){
	Ajax2();

	
	xhr.onreadystatechange=function(){
	if(xhr.readyState==4){
			if(xhr.status==200)
			{
				//afficher reponse :succe

				if(xhr.responseText=="true"){

                                       alert("vous n'etes pas connecté !");

				}else if(xhr.responseText=="false"){

                                       alert("vous n'avez pas les droits requis !");
                                       mafonctionAjax2();
				}else{

                                    ajouter();
				}
				
				//document.getElementById("form").innerHTML=xhr.responseText;
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
	
	
	xhr.open("GET","droit.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(null);
	

}




function envoyer(chaine){
	Ajax2();
	
	xhr.onreadystatechange=function(){
	if(xhr.readyState==4){
			if(xhr.status==200)
			{
				//afficher reponse :succe
				
				document.getElementById("form").innerHTML=xhr.responseText;
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
	
	chain="id=" + chaine;
	xhr.open("POST","boutique2.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(chain);
	

}


function Ajoutc(chaine){
	Ajax2();
	
	xhr.onreadystatechange=function(){
	if(xhr.readyState==4){
			if(xhr.status==200)
			{
				//afficher reponse :succe
				
				document.getElementById("form").innerHTML=xhr.responseText;
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
	
	chain="id=" + chaine;
	xhr.open("POST","Ajout_caddie.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(chain);
	

}