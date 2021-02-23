<?php
    namespace ImmoEliza;
?>

        document.getElementByClass("error").innerHTML = `<p class="error">Vous n'avez pas remplie tous les champs!</p>`
<?php
    if(isset($_POST['inputAddress'],$_POST['inputAddress2'],$_POST['inputCityPC'],$_POST['inputCity'],$_POST['Type_of_property'],$_POST['rooms'],$_POST['House_area'])){
       if(!empty($_POST['inputAddress']) && !empty($_POST['inputAddress2']) && !empty($_POST['inputCityPC']) && !empty($_POST['inputCity']) && !empty($_POST['Type_of_property']) && !empty($_POST['rooms']) && !empty($_POST['House_area'])){
            $address_road = $_POST['inputAddress'];
            $address_number = $_POST['inputAddress2'];
            $address_city_pc = $_POST['inputCityPC'];
            $address_city = $_POST['inputCity'];
            $type_of_property = $_POST['Type_of_property'];
            $number_of_rooms = $_POST['rooms'];
            $garden = ($_POST['garden'] == 'yes')? 1:0;
            $garden_area = $_POST['garden-area'];
            $open_fire = ($_POST['open-fire'] == 'yes')? 1:0;
            $house_area = $_POST['House_area'];
            $land_area = $_POST['surface'];
            $facades = ($_POST['facades'] == "1")? 0 : $_POST['facades'];
            $terrace = ($_POST['terrace'] == 'yes')? 1:0;
            $terrace_area = $_POST['terrace-area'];
            $state_of_the_building = $_POST['State_of_the_building'];
            $construction_year = $_POST['construction_year'];
            $swimming_pool = ($_POST['swimming-pool'] == 'yes')? 1:0;
            $equiped_kitchen = ($_POST['equiped-kitchen'] == 'yes')? 1:0;

            // ---> Sanitization here <---
            forEach($_POST as $key => $value){
                $value = filter_var($value, FILTER_SANITIZE_STRING);
                $value = filter_var($value, FILTER_SANITIZE_ADD_SLASHES);
            }

            try{
                $address = new Address($address_number,$address_road,$address_city_pc,$address_city);
                $property = new Property($type_of_property,$number_of_rooms,$house_area,$garden,$garden_area,$terrace,$terrace_area,$open_fire,$land_area,$facades,$swimming_pool,$state_of_the_building,$construction_year,$equiped_kitchen);
                $req = new Request($address,$property);
            }catch(Exception $err){
                echo 'Une erreur est survenue: '.$err;
            }
            

            $tmp = $req->getPrediction();
            echo '<p class="col-12 text-center" id="priceEstimate" style="background-color: red; font-size: 24px;">Estimate price is '.$tmp['price_of_the_estate'].'€</p>';

            if(true /* temporaire */){echo '<script type="module" src="./assets/js/objLoad.js"></script>';}
        } 
    }
?>