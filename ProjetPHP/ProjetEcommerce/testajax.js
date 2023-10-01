
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
	typeRech=document.form.typeRech.value;
	termeRech=document.form.termeRech.value;
	chaine="typeRech=" + typeRech + "&termeRech=" + termeRech;
	xhr.open("POST","results.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(chaine);
	

}

function mafonctionAjax3(){
	Ajax();
	
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

			alert("patientez STP...");
		}
		

	}
	//communication avec le serveur
	typeRech=document.form.typeRech.value;
	termeRech=document.form.termeRech.value;
	chaine="typeRech=" + typeRech + "&termeRech=" + termeRech;
	xhr.open("POST","results2.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(chaine);
	

}


function mafonctionAjax2(){
	Ajax();
	
	xhr.onreadystatechange=function(){
	if(xhr.readyState==4){
			if(xhr.status==200)
			{
				//afficher reponse :succe
                                
                           
				
				document.getElementById("form").innerHTML=xhr.responseText;
				

				  				
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
	typeRech="";//document.form.typeRech.value;
	termeRech="";//document.form.termeRech.value;
	chaine="typeRech=" + typeRech + "&termeRech=" + termeRech;
	xhr.open("POST","results.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(chaine);
	

}


function bonjour(){
	Ajax();
	
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
	
	xhr.open("GET","boutique2.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(null);
	

}



function commande(){
	Ajax();
	
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
	
	xhr.open("GET","voir_caddie.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(null);
}

function membre(){
	Ajax();
	
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
	
	xhr.open("GET","members_only.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(null);
}

function Ecommande(){
	Ajax();

        if(document.form.nom.value=='' || document.form.adresse.value=='')
         {

              
              document.getElementById("form").innerHTML+="<br/><br/><center><font color='red'><blink>" +"erreur:il y a des champs vides !" +"</blink></font></center><br/><br/><center><input type='button' value='Retour' onClick='commande();'/></center>";

	  }else{

	xhr.onreadystatechange=function(){
	if(xhr.readyState==4){
			if(xhr.status==200)
			{
				//afficher reponse :succe

			

                                document.getElementById("form").innerHTML="<center><font color='blue'>"+ xhr.responseText + "</font><br/><br/><input type='button' value='Retour' onClick='bonjour();'/></center>";

			
				//alert(xhr.responseText);				
			}else
				{
					//echec 
					
				}
	}else
		{

                        //alert(document.form.nom.value);
			//alert("veuillez patienter");
		}
		

	}
	//communication avec le serveur
         nom=document.form.nom.value;
         
         adresse=document.form.adresse.value;
         ch="nom=" + nom + "&adresse=" + adresse;

	
	xhr.open("POST","enreg_cde.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(ch);
}
}


function connexion(){
	Ajax();
	
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
	login=document.f.Login.value;
	password=document.f.pass.value;
        btc=document.f.connect.value;
	chaine="Login=" + login + "&pass=" + password + "&connect=" + btc;
	xhr.open("POST","connexion.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(chaine);
	

}

function direction(){
	Ajax();
	
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
	
	
	xhr.open("GET","connexion.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(null);
	

}

function boutique(){
	Ajax();
	
	xhr.onreadystatechange=function(){
	if(xhr.readyState==4){
			if(xhr.status==200)
			{
				//afficher reponse :succe

                                  //alert(xhr.responseText);

				if(xhr.responseText=="true"){


                                      bonjour();
				}else{
                                     alert("veuillez vous connecter !");
				     
                                      mafonctionAjax();
				}
				
				
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
	
	
	xhr.open("GET","verifier.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(null);
	

}


function deconnexion(){
	Ajax();
	


xhr.onreadystatechange=function(){
	if(xhr.readyState==4){
			if(xhr.status==200)
			{
				//afficher reponse :succes

                                  
				document.getElementById("form").innerHTML=xhr.responseText;

				
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
	
	
	xhr.open("GET","logout.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(null);
	

}




function confirm(){
	

                                  
document.getElementById("form").innerHTML='<form name="f"><font color="#FFFFFF"> Login</font>&nbsp;&nbsp;&nbsp;&nbsp;:<input type="text" name="Login" id="log1"  /></br></br><font color="#FFFFFF">Password</font>:<input type="password" id="pass1"  name="pass"></br></br><input type="button"  value="Inscrire" onClick="verifion();" name="connect"/>';

}

function insertion(){
	Ajax();
	
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
	login=document.getElementById('log1').value;
	password=document.getElementById('pass1').value;
	chaine="log=" + login + "&ps=" + password;
	xhr.open("POST","authen.php",true);
	xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	xhr.send(chaine);
	

}

function verifion(){
  
	
   if(document.getElementById('log1').value=='' || document.getElementById('pass1').value==''){

           alert('vous avez un champs vide !');

   }else{
          
          insertion();
         
   }
                                  
}





                        
                        
                        
                        
                        
                        