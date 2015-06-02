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
	<?php
	// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
			if (isset($_FILES['posterImage']) AND $_FILES['posterImage']['error'] == 0)
			{
        		// Testons si le fichier n'est pas trop gros
        		if ($_FILES['posterImage']['size'] <= 10000000)
        		{
                	// Testons si l'extension est autorisée
                	$infosfichier = pathinfo($_FILES['posterImage']['name']);
                	$extension_upload = $infosfichier['extension'];
                	$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
               		if (in_array($extension_upload, $extensions_autorisees))
            		{
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['posterImage']['tmp_name'], 'img/' . basename($_FILES['posterImage']['name']));
						
						 
                	}
        		}
			}
		?>

	<div class="row bar">
		<h1 class="titre">Nom du site</h1>
		<div class="row principal">
			
		<form method="post" action="index.php" enctype="multipart/form-data">
		<button class="btn default-primary">Poster</button><br/>
		<!--<img src="<?php echo 'img/' . basename($_FILES['posterImage']['name']); ?>" alt="mahmoud" />-->
		<input type="file"id="inputT" value="image" name="posterImage"></input>
		</form>
			<div class="row adapt">
			<section class="no-padding" id="portfolio">
			<div class="container-fluid">
				<div class="row no-gutter">
				<?php
				$adresse="img/";
				$dossier=Opendir($adresse);
					
					while($fichier=readdir($dossier))
					{
						if($fichier !="."&& $fichier!="..")
						{
							//echo ''.$fichier.'<br>';
							//echo '<img src="'.$adresse.$fichier.'" WIDTH=100 HEIGHT=100 BORDER=1/>';
							 ?>
							<div class="col-lg-4 col-sm-6 tailleD">
						<a href="<?php echo $adresse.$fichier?>" class="portfolio-box twpop"name="$fichier" >
							<img src="<?php echo $adresse.$fichier?>"name="$fichier" class="img-responsive tailleD" alt="">
							<!--<div class="portfolio-box-caption" >
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded"data-toggle="modal" data-target="#myModal">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>-->
						</a>
					</div>
					<?php
							
						}
					}
					closedir($dossier);
				?>
				<!--
					
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/1.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/2.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/3.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/4.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/5.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/6.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/7.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/8.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/1.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/1.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/1.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/1.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/1.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/1.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/1.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/1.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/1.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/1.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								</div>
							</div>
						</a>
					</div>
					<div class="col-lg-4 col-sm-6">
						<a href="#" class="portfolio-box">
							<img src="img/portfolio/9.jpg" class="img-responsive" alt="">
							<div class="portfolio-box-caption">
								<div class="portfolio-box-caption-content">
									<!--
									<div class="project-category text-faded">
										Category
									</div>
									<div class="project-name">
										Project Name
									</div>
								
								</div>
							</div>
						</a>
					</div>
					-->
				</div>
			</div>
		</div>
		</div>
		</section>
		</div>
		
<script>
function twPopConstructeur(){
    var anchors = document.getElementsByTagName("a");
    for (var i=0; i<anchors.length; i++){
        var anchor = anchors[i];
        var relAttribute = String(anchor.getAttribute("class"));
        if (anchor.getAttribute("href") && (relAttribute.toLowerCase().match("twpop"))){
            var oParent = anchor.parentNode;
            var oImage=document.createElement("img");
            oImage.src = anchor.getAttribute("href");
            oImage.alt = anchor.getAttribute("title")
             
            var oLien=document.createElement("a");
            oLien.href = "#ferme";
            oLien.title = anchor.getAttribute("title");
            oLien.onclick = "return false;";
            oLien.appendChild(oImage);
             
            var sNumero = "id"+i;
             
            var node=document.createElement("div");
            node.id = sNumero;
            node.className = "twAudessus";
            node.appendChild(oLien);
            anchor.setAttribute("href","#"+sNumero);
      oParent.appendChild(node);
        }
    }
}
</script>
 
 
 
<script>document.onLoad = twPopConstructeur();</script>

	</body>
	<footer>
	</footer>
	
	
	
</html>
	