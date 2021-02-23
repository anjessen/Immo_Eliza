<?php
    namespace ImmoEliza;
    require './assets/php/classes.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImmoEliza</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>
        $("#form_estimate").submit(function(event) {
                event.preventDefault();

                var formData = new FormData($("#form_estimate"));

                $.ajax({
                    type: "POST",
                    url: "./assets/php/form.php",
                    data: formData
                });
            });
    </script>
</head>

<body>

    <section class="container-fluid" id="container">
    
        <div class="row">
            <div class="col-md-5">
            
                <form action="" method="post" class="form p-5" id="form_estimate">
                    <div class="form-row">
                        <div class="Form-group offset-md-5 col-md-2">
                        <img src="./assets/img/Logo.svg" alt="Logo" class="logo">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" id="inputAddress" name="inputAddress" placeholder="Rue Covid">
                        </div>
                        <div class="form-group  col-md-4">
                            <label for="inputAddress2">Number</label>
                            <input type="number" min="0" class="form-control" id="inputAddress2" name="inputAddress2" placeholder="19">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCity">Code postal</label>
                            <input type="number" class="form-control" id="inputCityPC" name="inputCityPC" placeholder="2020">
                        </div>
                        <div class="form-group col-md-8">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" id="inputCity" name="inputCity" placeholder="Corona">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="Type_of_property">Type de logement</label>
                            <select id="Type_of_property" class="form-control" name="Type_of_property">
                                <option id="house" value="house" selected>Maison</option>
                                <option id="appartement" value="appartement" checked="checked">
                                    Appartement</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="State_of_the_building">State of building</label>
                            <select id="State_of_the_building" name="State_of_the_building" class="form-control">
                                <option selected value="to be done up"> To be done up </option>
                                <option value="as new"> As new </option>
                                <option value="good"> Good </option>
                                <option value="to restore"> To restore </option>
                                <option value="just renovated"> Just renovated </option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Construction_year">Année de construction</label>
                            <input type="number" min="0" class="form-control" id="construction_year" name="construction_year"
                                placeholder="1930">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="rooms">Nombre de chambres</label>
                            <input type="number" min="0" class="form-control" id="rooms" placeholder="159" name="rooms">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="facades">Nombre de façades</label>
                            <input type="number" min="0" class="form-control" id="facades" name="facades" placeholder="2">
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="House_area">Surface Habitable (m²)</label>
                            <input type="number" min="0" class="form-control" id="House_area" name="House_area" placeholder="15 025">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="surface">Surface du terrain (m²)</label>
                            <input type="number" min="0" class="form-control" id="surface" name="surface" placeholder="24 917" name="surface">
                        </div>
                    </div>
                    <div class="form-row">
                        <fieldset class="form-group col-md-6">
                            <div class="row">
                                <legend class="col-form-label col-md-4 pt-0">Jardin ?</legend>
                                <div class="col-md-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="garden_yes" name="garden"
                                            value="yes">
                                        <label class="form-check-label" for="garden_yes">
                                            Oui
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="garden_no" name="garden"
                                            value="no" checked="checked">
                                        <label class="form-check-label" for="garden_no">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group col-md-6">
                            <div class="row">
                                <legend class="col-form-label col-md-4 pt-0">Terrasse ?</legend>
                                <div class="col-md-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="terrace_yes" name="terrace"
                                            value="yes">
                                        <label class="form-check-label" for="terrace_yes">
                                            Oui
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="terrace_no" name="terrace"
                                            value="no" checked="checked">
                                        <label class="form-check-label" for="terrace_no">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6 display">
                            <label for="garden-area">Surface du jardin (m²)</label>
                            <input type="number" min="0" class="form-control" id="garden-area" placeholder="23 920"
                                name="garden-area">
                        </div>
                        <div class="form-group col-md-6 display">
                            <label for="terrace-area">Surface du terrasse (m²)</label>
                            <input type="number" min="0" class="form-control" id="terrace-area" placeholder="24 917"
                                name="terrace-area">
                        </div>
                    </div>
                    <div class="form-row">
                        <fieldset class="form-group col-md-6">
                            <div class="row">
                                <legend class="col-form-label col-md-4 pt-0">Open fire ?</legend>
                                <div class="col-md-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="open-fire_yes" name="open-fire"
                                            value="yes">
                                        <label class="form-check-label" for="open-fire_yes">
                                            Oui
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="open-fire_no" name="open-fire"
                                            value="no" checked="checked">
                                        <label class="form-check-label" for="open-fire_no">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group col-md-6">
                            <div class="row">
                                <legend class="col-form-label col-md-4 pt-0">Piscine ?</legend>
                                <div class="col-md-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="swimming-pool_yes"
                                            name="swimming-pool" value="yes">
                                        <label class="form-check-label" for="swimming-pool_yes">
                                            Oui
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="swimming-pool_no"
                                            name="swimming-pool" value="no" checked="checked">
                                        <label class="form-check-label" for="swimming-pool_no">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="form-row">
                        <fieldset class="form-group col-md-6">
                            <div class="row">
                                <legend class="col-form-label col-md-4 pt-0">Cuisine equipé ?</legend>
                                <div class="col-md-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="equiped-kitchen" value="yes"
                                            id="equiped-kitchen_yes">
                                        <label class="form-check-label" for="equiped-kitchen_yes">
                                            Oui
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="equiped-kitchen" value="no"
                                            checked="checked" id="equiped-kitchen_no">
                                        <label class="form-check-label" for="equiped-kitchen_no">
                                            Non
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                    <button type="submit" class="button" value="OK">Estimer</button>
                    <div class="erreur">
                    </div>
                </form>
            </div>
            <canvas id="c" style="z-index: 0;" class="col-7">
            
            </canvas>
            <?php
                require './assets/php/form.php';
            ?>
        </div>
        
    </section>
    <script src="./assets/js/index.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>