<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portal za pse</title>
    <link href="style.css" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</head>
<?php
?>

<body>
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="azili-tab" data-toggle="tab" href="#azili" role="tab" aria-controls="azili" aria-selected="true">Azili za pse</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="vetstanice-tab" data-toggle="tab" href="#vetstanice" role="tab" aria-controls="vetstanice" aria-selected="false">Veterinarske stanice</a>
            </li>
            <li class="nav-item">
                <!--<a class="nav-link" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="false">Dodavanje novih korisnika</a>-->
            </li>
        </ul>
        <div class="tab-content" id="tabovi">
            <div class="tab-pane fade show active" id="azili" role="tabpanel" aria-labelledby="azili-tab">
                <div class="row">
                    <!--Dodavanje azila-->
                    <div class="col-md-12 border ml-3 mr-3 mt-5 border-primary rounded">
                        <h5 class="mt-3">Dodaj azil</h5>
                        <div class="input-group input-group-sm m-4 mt-1">
                            <form action="php/action.php" method="post" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <span>
                                        <input type="text" name="naziv" placeholder="Naziv azila" class="input-group-text mb-3" required>
                                    </span>
                                    <span>
                                        <input type="text" name="mesto" placeholder="Mesto" class="input-group-text mb-3" required>
                                    </span>
                                    <span>
                                        <input type="text" name="adresa" placeholder="Adresa" class="input-group-text mb-3" required>
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <span>
                                        <input type="tel" name="telefon" placeholder="Kontakt telefon" class="input-group-text mb-3" required>
                                    </span>
                                    <span>
                                        <input type="email" name="email" placeholder="Email adresa" class="input-group-text mb-3" required>
                                    </span>
                                    <span>
                                        <input type="file" name="image" class="input-group-text p-0 btn-file mb-3" placeholder="Logo">
                                    </span>

                                    <textarea cols="30" rows="10" type="text" name="opis" placeholder="Kratak opis" class="mb-3control-group ">
                                    </textarea>
                                    <input type="submit" name="submit" value="submit" class="form-control btn btn-primary mt-2">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--dodavanje veterinarske stanice-->
            <div class="tab-pane fade" id="vetstanice" role="tabpanel" aria-labelledby="vetstanice-tab">
                <div class="row">
                <div class="col-md-12 border ml-3 mr-3 mt-5 border-primary rounded">
                        <h5 class="mt-3">Dodaj veterinarsku stanicu</h5>
                        <div class="input-group input-group-sm m-4 mt-1">
                            <form action="php/action_vet.php" method="post" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <span>
                                        <input type="text" name="naziv" placeholder="Naziv veterinarske stanice" class="input-group-text mb-3" required>
                                    </span>
                                    <span>
                                        <input type="text" name="mesto" placeholder="Mesto" class="input-group-text mb-3" required>
                                    </span>
                                    <span>
                                        <input type="text" name="adresa" placeholder="Adresa" class="input-group-text mb-3" required>
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <span>
                                        <input type="tel" name="telefon" placeholder="Kontakt telefon" class="input-group-text mb-3" required>
                                    </span>
                                    <span>
                                        <input type="email" name="email" placeholder="Email adresa" class="input-group-text mb-3" required>
                                    </span>
                                    <span>
                                        <input type="file" name="image" class="input-group-text p-0 btn-file mb-3" placeholder="Logo">
                                    </span>

                                    <textarea cols="30" rows="10" type="text" name="opis" placeholder="Kratak opis" class="mb-3control-group ">
                                    </textarea>
                                    <input type="submit" name="submit" value="submit" class="form-control btn btn-primary mt-2">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>