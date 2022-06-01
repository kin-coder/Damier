<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOLAR TEST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js">
    </script>
</head>

<style>
    .noir {
        width: 30px;
        height: 30px;
        background-color: black;
        display: inline-block;
    }

    .blanc {
        width: 30px;
        height: 30px;
        background-color: red;
        border-color: black;
        display: inline-block;
    }

    .bouton {
        display: inline-block;
    }
</style>

<body>

    <div class="container">
        <h1>DAMIER</h1>
        <form action="" method="post">

            <div>
                <label for="ligne">Ligne</label>
                <input type="text" name="ligne" class="input-group-text"> <br>
            </div>

            <div>
                <label for="ligne">Colonne</label>
                <input type="text" name="colonne" class="input-group-text">
            </div>
            <br>
            <input type="submit" class="btn btn-primary bouton" value="Valider">
        </form>

    </div>


    <br>
    <?php
    $l = $_POST['ligne'];
    $c = $_POST['colonne'];
    ?>
    <?php if (!empty($l) && !empty($c)) : ?>
        <div class="container">
            <h4>Resultat:</h4>

            <div class="createImg">

                <?php for ($i = 1; $i <= $l; $i++) : ?>

                    <?php for ($j = 1; $j <= $c; $j++) : ?>

                        <?php if (($i % 2 !== 0)) : ?>

                            <?php if (($j % 2 !== 0)) : ?>
                                <div class="noir"></div>
                            <?php else : ?>
                                <div class="blanc"></div>
                            <?php endif; ?>

                        <?php else : ?>

                            <?php if (($j % 2 !== 0)) : ?>
                                <div class="blanc"></div>
                            <?php else : ?>
                                <div class="noir"></div>
                            <?php endif; ?>

                        <?php endif; ?>

                    <?php endfor; ?>
                    <?= "</br>" ?>

                <?php endfor; ?>
            </div>

            <input type="button" class="btn btn-success bouton" id="geeks" value=" Créer Image">
        </div>
    <?php endif; ?>
    <br>

    <div class="container">
      
            <div id="img" style="display:none;">
            <h5>image:</h5>
                <img src="" id="newimg" class="top" />
            </div>
        
    </div>
    </div>
    <script>
        $(function() {
            $("#geeks").click(function() {
                html2canvas($(".createImg"), {
                    onrendered: function(canvas) {
                        var imgsrc = canvas.toDataURL("image/png");
                        console.log(imgsrc);
                        $("#newimg").attr('src', imgsrc);
                        $("#img").show();
                        var dataURL = canvas.toDataURL();
                        $.ajax({
                            type: "POST",
                            url: "",
                            data: {
                                imgBase64: dataURL
                            }
                        }).done(function(o) {
                            console.log('saved');
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>