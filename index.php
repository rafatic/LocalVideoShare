<!DOCTYPE html>

<?php 
    include 'includes/manager.php';
    $movies = getMovies();
    $series = getSeries();

    if(isset($_FILES["fileToUpload"]))
    {
        uploadFile($_FILES["fileToUpload"], $_POST["type"]);
    }
 ?>
<html lang="en">
<head>

    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Partage de films - séries</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">

    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
 


    

    <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

    <!-- Primary Page Layout
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <div class="container">
        <div class="row">
            <div class="one-half column" style="margin-top: 10%">
                <h3>Partage de films et de séries</h3>
                <p>Ici vous pouvez télécharger les films/séries mis à disposition par les colocataires.</p>
            </div>
        </div>

        <div class="row">
            <div class="five columns">
                <form action="index.php" method="POST" enctype="multipart/form-data">
                    Selectionner un fichier à mettre en ligne :
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <br>

                    <input type="radio" name="type" value="movie"> Film
                    <input type="radio" name="type" value="series"> Série<br>

                    <input type="submit" value="Mettre en ligne" name="submit">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="ten columns">
                <h4>Films</h4>
                <table id="filmsTab" class="display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Taille</th>
                            <th>Télecharger</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        <?php
                            foreach($movies as $movie)
                            {
                                echo "<tr>";
                                echo "<td>". $movie[0] ."</td>";
                                echo "<td>". $movie[1] ."</td>";
                                //echo "<td><a href='download.php?fileName=movies\\".$movie[0]."'>download</a></td> ";
                                echo "<td>
                                        <a href='download.php?fileName=movies\\".$movie[0]."'>
                                        <img src='images/downloadIcon.png' alt='Download' style='width:16px;height:16px;'>
                                        </a>
                                    </td> ";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <br>
        <hr>
        <br>

        <div class="row">
            <div class="ten columns">
                <h4>Séries</h4>
                <table id="seriesTab" class="display" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Taille</th>
                            <th>Télecharger</th>
                        </tr>
                    </thead>
                   
                    <tbody>
                        <?php
                            foreach($series as $s)
                            {
                                echo "<tr>";
                                echo "<td>". $s[0] ."</td>";
                                echo "<td>". $s[1] ."</td>";
                                //echo "<td><a href='download.php?fileName=series\\".$movie[0]."'>download</a></td> ";
                                echo "<td>
                                        <a href='download.php?fileName=series\\".$s[0]."'>
                                        <img src='images/downloadIcon.png' alt='Download' style='width:16px;height:16px;'>
                                        </a>
                                    </td> ";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
<!-- End Document
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>

<!-- JavaScript
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<script type="text/javascript" src="js/jQuery/jquery.js"></script>
<script type="text/javascript" src="js/datatables.min.js"></script>


<script type="text/javascript">
    $(document).ready(function(){
        $('#filmsTab').DataTable({
            language: {
                processing:     "Traitement en cours...",
                search:         "Rechercher&nbsp;:",
                lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
                info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix:    "",
                loadingRecords: "Chargement en cours...",
                zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable:     "Aucune donnée disponible dans le tableau",
                paginate: {
                    first:      "Premier",
                    previous:   "Pr&eacute;c&eacute;dent",
                    next:       "Suivant",
                    last:       "Dernier"
                },
                aria: {
                    sortAscending:  ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            }
        });
        $('#seriesTab').DataTable({
            language: {
                processing:     "Traitement en cours...",
                search:         "Rechercher&nbsp;:",
                lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
                info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                infoPostFix:    "",
                loadingRecords: "Chargement en cours...",
                zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                emptyTable:     "Aucune donnée disponible dans le tableau",
                paginate: {
                    first:      "Premier",
                    previous:   "Pr&eacute;c&eacute;dent",
                    next:       "Suivant",
                    last:       "Dernier"
                },
                aria: {
                    sortAscending:  ": activer pour trier la colonne par ordre croissant",
                    sortDescending: ": activer pour trier la colonne par ordre décroissant"
                }
            }
        });
    })
</script>

