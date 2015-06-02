<html>
	<head>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<link rel="icon" type="image/png" href="logo.png" />
		

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/presentcity.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	</head>
	<body>
	<div class="row bar">
		<div class="col-lg-12 resizea">
		<h1 class="titre">SnapCity</h1>
		</div>
		<div class="col-lg-12 resizeb">
		<form method="post" action="connexion.php">
		<input type="text" name="seconnecter_email" placeholder="Adresse email"></input>
		<input type="password" name="seconnecter_password" placeholder="Mot de Passe"></input>
		<input type="submit" name="seconnecter" value="Connexion"></input>
		</form>
		</div>
		
		<div class="row principal">
		<div class="row resize">
		<div class="col-lg-12">
		<form class="form-horizontal"method="post" action="inscription.php">
					<h2><label class="col-lg-12 control-label "id="titreC">Inscription</label></h2> <br/><br/>
							<div class="form-group form-group-lg">
									<br/>
									<div class="col-xs-2 res">
									<input type="text" class="form-control contactf"name="pseudo" id="pseudo" placeholder="Entrez un Pseudo">
								  </div>
								</div>
								  <div class="form-group form-group-lg">
									
									<div class="col-xs-2 res">
									<input type="email" class="form-control contactf" name="email" placeholder="Entrez votre email">
									</div>
								  </div>
								  <div class="form-group form-group-lg">
								
									<div class="col-xs-2 res">
									<input type="password" class="form-control contactf" name="Password" placeholder="Mot de Passe">
									</div>
								  </div>
								   <div class="form-group form-group-lg">
								
									<div class="col-xs-2 res">
									<input type="password" class="form-control contactf" name="Password_confirm" placeholder="Confirmez votre Mot de Passe">
									</div>
								  </div>
								  <div class="form-group form-group-lg">
								<label class="radio-inline">
									  <input type="radio" name="inlineRadioOptions" id="homme" value="option1"> Homme
									</label>
									<label class="radio-inline">
									  <input type="radio" name="inlineRadioOptions" id="femme" value="option2"> Femme
									</label>
								  </div>
				
								  <button type="submit" id="btnEnvoi" class="btn btn-primary"name="envoyer">Inscription</button>
								</form>	
																														<h4 id="titreE"><?php
								if(isset($_POST['envoyer'])){
									//On vérifie si tout les champs sont remplis 
									if(empty($_POST['pseudo'])){
										echo "Le champs pseudo est vide";
										}else{
											if(empty($_POST['email'])){
												echo "le champs email est vide";
											}else{
												if(empty($_POST['Password'])){
													echo 'Le champs Mot de Passe est vide';
													}else{
														if(empty($_POST['Password_confirm'])){
													echo "Le Mot de Passe de confirmation est vide";
														}else{
															if(strlen($_POST['Password'])<6 || strlen($_POST['Password'])>20){
																echo "Le mot de passe est trop court ou trop long";
																sleep(5);
																header('Location:inscription.php');
																	}else{
																	if(strlen($_POST['pseudo'])>20){
																echo "Le pseudo est trop long";
																sleep(5);
																header('Location:inscription.php');
																}else{
																
																	$mysqli = mysqli_connect("localhost", "root", "", "presentcity");
																	$reqPseudo = mysqli_query($mysqli,"SELECT pseudo FROM membres WHERE pseudo = '".$_POST['pseudo']."'");
																	
																	if($reqPseudo->num_rows==1){
																			echo "Le Pseudo est déja utilisé";
																			}else{
																				$reqEmail = mysqli_query($mysqli,"SELECT email FROM membres WHERE email = '".$_POST['email']."'");
																				if($reqEmail->num_rows==1){
																					echo "Adresse email est déja utilisé";
																					}else{
																						
																	
																						if($_POST['Password']!=$_POST['Password_confirm']){
																							echo "Le mot de passe de confirmation est incorrect";
																							}else{
																						$reqI="INSERT INTO membres(pseudo,email,motdepasse) VALUES('".$_POST['pseudo']."','".$_POST['email']."','".$_POST['Password']."')";
																						mysqli_query($mysqli,$reqI);
												
																						echo "Vous êtes maintenant enregistré,vous allez être redirigé vers la page de connexion ";
																						/*
																						sleep(10);
																						
																						?>
																						<script> location.replace("index.php"); </script>;
																						<?php
																						*/
																						
																					}
																			}
																	}	
															}	}				
														}
													}
												}
											}
										}
										
							
								
								 
								?></h4>

		</div>
		</div>
		</div>
	</div>
	
	</body>
</html>