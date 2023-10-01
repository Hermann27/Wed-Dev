
<div id="menu_wrapper">   
    
    <div id="menu">
        <ul>
            <li><a href="<?php echo $domaine;?>/admin/private/?pos=1" <?php if(!isset($_GET['pos']) || $_GET['pos']==1) echo "class=\"current\""; ?>>Administartion</a></li>
             <li><a href="<?php echo $domaine;?>/admin/private/actualite/?pos=2" <?php if(isset($_GET['pos']) && $_GET['pos']==2) echo "class=\"current\""; ?>>Actualité</a></li> 
              <li><a href="<?php echo $domaine;?>/admin/private/annonce/?pos=3" <?php if(isset($_GET['pos']) && $_GET['pos']==3) echo "class=\"current\""; ?>>Annonce</a></li> 
               <li><a href="<?php echo $domaine;?>/admin/private/journal/?pos=4" <?php if(isset($_GET['pos']) && $_GET['pos']==4) echo "class=\"current\""; ?>>Journal</a></li> 
               <!--<li><a href="<?php echo $domaine;?>/admin/private/newsletter/?pos=5" <?php if(isset($_GET['pos']) && $_GET['pos']==5) echo "class=\"current\""; ?>>Newsletter</a></li> -->
            <?php $currentUser = unserialize($_SESSION['currentUser']); 
		  if($currentUser->getIsAdmin()) {?>
           <li><a href="<?php echo $domaine;?>/admin/private/utilisateur/?pos=13" <?php if(isset($_GET['pos']) && $_GET['pos']==13) echo "class=\"current\""; ?>>Utilisateur</a></li> 
           <?php 
		   
		   $_SESSION['currentUser']=serialize($currentUser);}?>
         <li><a href="<?php echo $domaine;?>/admin/private/compte/?pos=14" <?php if(isset($_GET['pos']) && $_GET['pos']==14) echo "class=\"current\""; ?>>Votre Compte</a></li> 
          <li><a href="<?php echo $domaine;?>/admin/public/?pos=100"  <?php if(isset($_GET['pos']) && $_GET['pos']==100) echo "class=\"current\""; ?> class="last">Aide</a></li>
          <li><a href="<?php echo $domaine;?>/admin/private/logout" style="color:#900">Déconnexion</a></li>                     
            
             
         </ul>    	
    </div> <!-- end of menu -->
</div>