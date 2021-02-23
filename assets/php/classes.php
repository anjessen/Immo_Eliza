<?php
    namespace ImmoEliza;
//Classes

class Request{
    private $address;
    private $property;

    /**
     * Expected parameters
     * @param Address $address object build with class Address
     * @param Property $property object build with class Property
     */
    public function __construct(
        Address $address,
        Property $property
        ){
        try{
            $this->address = $address;
            $this->property = $property;
        }catch(Exception $err){
            throw $err;
        }   
    }
    public function get3dObject(){
        ;
    }
    public function getPrediction(){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api-immoeliza.herokuapp.com/predict',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'{
                "num":'.$this->address->getNum().',
                "road":"'.$this->address->getRoad().'",
                "pc":'.$this->address->getPC().',
                "locality":"'.$this->address->getLocality().'",
                "type_of_property":"'.$this->property->getType().'",
                "number_of_rooms":'.$this->property->getNbRooms().',
                "house_area":'.$this->property->getHouseArea().',
                "garden":'.$this->property->getGarden().',
                "garden_area":'.$this->property->getGardenArea().',
                "terrace":'.$this->property->getTerrace().',
                "terrace_area":'.$this->property->getTerraceArea().',
                "open_fire":'.$this->property->getOpenFire().',
                "surface_of_the_land":'.$this->property->getLandSurface().',
                "number_of_facades":'.$this->property->getNbFacades().',
                "swimming_pool":'.$this->property->getSwimmingPool().',
                "state_of_the_building":"'.$this->property->getStateOfBuilding().'",
                "construction_year":'.$this->property->getConstructYear().',
                "fully_equiped_kitchen":'.$this->property->getFullyEquipedKitchen().'
                }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response,true);
    }
}

class Address{
    private
    $num,
    $road,
    $pc,
    $locality;

    /**
     * Expected parameters
     * @param mixed $num of the house, is a int in int/string format
     * @param string $road is a string (road name only)
     * @param mixed $pc (postal code) is a int in int/string format
     * @param string $locality (city) is a string
     */
    public function __construct(
        $num,
        string $road,
        $pc,
        string $locality
        ){
        try{
            $this->num = intval($num);
            $this->road = trim(strtolower($road));
            $this->pc = intval($pc);
            $this->locality = trim(strtolower($locality));

        }catch(Exception $err){
            throw $err;
        }
    }
    public function getNum(){
        return $this->num;
    }
    public function getRoad(){
        return $this->road;
    }
    public function getPC(){
        return $this->pc;
    }
    public function getLocality(){
        return $this->locality;
    }
}

class Property{
    private
    // enum
    $type_of_property = ["House","Appartement"],
    $type_of_state_of_building = ["to be done up" , "as new" , "good" , "to restore" , "just renovated"],

    // data
    $type,
    $number_of_rooms,
    $house_area,
    $garden,
    $garden_area,
    $terrace,
    $terrace_area,
    $open_fire,
    $land_surface,
    $number_of_facades,
    $swimming_pool,
    $state_of_the_building,
    $construct_year,
    $fully_equiped_kitchen;


    /**
     * Expected parameters
     * @param string $type is string: "House" or "Appartement"
     * @param mixed $numberOfRooms is numerical in string/int format
     * @param mixed $houseArea is a float in string/int/float format
     * @param mixed $garden (OPTIONAL) is a bool 1/0
     * @param mixed $gardenArea (OPTIONAL) is a float in string/int/float format
     * @param mixed $terrace (OPTIONAL) is a bool in 1/0 format
     * @param mixed $terraceArea (OPTIONAL) is a float in string/int/float format
     * @param mixed $openFire (OPTIONAL) is a bool in 1/0 format
     * @param mixed $landSurface (OPTIONAL) is a float in string/int/float format
     * @param mixed $numberOfFacades (OPTIONAL) is a int in string/int format
     * @param mixed $swimmingPool (OPTIONAL) is a bool in 1/0 format
     * @param string $stateOfBuilding (OPTIONAL) is string: "to be done up" , "as new" , "good" , "to restore" , "just renovated"
     * @param mixed $constructionYear (OPTIONAL) is a int in string/int format
     * @param mixed $fullyEquipedKitchen (OPTIONAL) is a bool 1/0 format
     */
    public function __construct(
        string $type,
        $numberOfRooms,
        $houseArea,
        $garden = null,
        $gardenArea = null,
        $terrace = null,
        $terraceArea = null,
        $openFire = null,
        $landSurface = null,
        $numberOfFacades = null,
        $swimmingPool = null,
        ?string $stateOfBuilding = null,
        $constructionYear = null,
        $fullyEquipedKitchen = null
        ){
            try{
                $type = trim(ucfirst(strtolower($type)));
                $stateOfBuilding = trim(strtolower($stateOfBuilding));

                $this->type = $this->type_of_property[array_search($type,$this->type_of_property)];
                $this->number_of_rooms = intval($numberOfRooms);
                $this->house_area = floatval($houseArea);
                $this->garden = $garden;
                $this->garden_area = floatval($gardenArea);
                $this->terrace = $terrace;
                $this->terrace_area = floatval($terraceArea);
                $this->open_fire = $openFire;
                $this->land_surface = floatval($landSurface);
                $this->number_of_facades = intval($numberOfFacades);
                $this->swimming_pool = $swimmingPool;
                $this->state_of_the_building = $this->type_of_state_of_building[array_search($stateOfBuilding,$this->type_of_state_of_building)];
                $this->construct_year = intval($constructionYear);
                $this->fully_equiped_kitchen = $fullyEquipedKitchen;

            }catch(Exception $err){
                throw $err;
            }
        }

        public function getType(){
            return $this->type;
        }
        public function getNbRooms(){
            return $this->number_of_rooms;
        }
        public function getHouseArea(){
            return $this->house_area;
        }
        public function getGarden(){
            return $this->garden;
        }
        public function getGardenArea(){
            return $this->garden_area;
        }
        public function getTerrace(){
            return $this->terrace;
        }
        public function getTerraceArea(){
            return $this->terrace_area;
        }
        public function getOpenFire(){
            return $this->open_fire;
        }
        public function getLandSurface(){
            return $this->land_surface;
        }
        public function getNbFacades(){
            return $this->number_of_facades;
        }
        public function getSwimmingPool(){
            return $this->swimming_pool;
        }
        public function getStateOfBuilding(){
            return $this->state_of_the_building;
        }
        public function getConstructYear(){
            return $this->construct_year;
        }
        public function getFullyEquipedKitchen(){
            return $this->fully_equiped_kitchen;
        }
}


/* //Tests
try{
    $prop = new Property("house", 6, "120.5");
}catch(Exception $err){
    error_log($err, 0);
}

try{
    $address = new Address(10,'rue de louvain',1420,'Trou perdu');
}catch(Exception $err){
    error_log($err, 0);
}

try{
    $req = new Request($address,$prop);
}catch(Exception $err){
    error_log($err, 0);
} */


?>