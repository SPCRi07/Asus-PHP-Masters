<?php
class DBController{

    private $con;

     function __construct() {

        try{
            $dsn = "mongodb://localhost:27017";
            $this->con = new MongoDB\Driver\Manager($dsn);
        }

        catch(PDOException $e)
        {
                echo $e->getMessage();
        }
        if($this->con){
              //  echo "Connection Established";
        }
        else{
            echo "Connection not Established";
        }
    }
    function getdatabyid($id)
    {
        $filter = ['uniqueid' => $id]; 
        $options = ['limit'=>10];
        $query = new MongoDB\Driver\Query($filter,$options);
        $rows = $this->con->executeQuery('asusdb.products', $query);
        return $rows;
    
    }

    function getdatabydep($query){

        $filter = ['type' => $query]; 
        $options = ['limit'=>10];
        $query = new MongoDB\Driver\Query($filter,$options);
        $rows = $this->con->executeQuery('asusdb.products', $query);
        return $rows;
    }

    function insertrawdata()
{

$data=array(
 array(1, 'ASUS Z370', '1234', 'image/m1.jpg', 23000.00, '5X Protection III: Multiple hardware safeguards for all-round protection\r\nLED illumination: Lighting control for audio trace paths\r\nNative M.2: Lightning-fast storage speeds\r\nOne-stop controls: Media-acclaimed UEFI BIOS with EZ Flash 3', 'motherboard'),
 array(2, 'ASUS x560', '2234', 'image/m2.jpg', 27000.00, '5X Protection II – Advanced hardware safeguards for all-round protection\r\nDDR4 memory,NVMe support', 'motherboard'),
 array(3, 'ASUS ATX Z220', '3456', 'image/m3.jpg', 13000.00, 'AMD AM4 mATX motherboard with Aura Sync RGB header, DDR4 3200MHz, M.2, HDMI 2.0b, SATA 6Gbps and USB 3.1 Gen 2', 'motherboard'),
 array(4, 'ASUS H110', '2387', 'image/m4.jpg', 23000.00, 'AMD AM4 ATX motherboard with M.2 heatsink, DDR4 3600MHz, dual M.2, HDMI, SATA 6Gbps and USB 3.1 Gen 2 front-panel connector', 'motherboard'),
 array(5, 'ASUS PRIME X470', '9765', 'image/m5.jpg', 40000.00, 'Intel LGA 1151 ATX motherboard with OptiMem II, DDR4 4266 MHz, Dual M.2, HDMI, Intel Optane memory ready, SATA 6Gb/s, USB 3.1 Gen 2', 'motherboard'),
 array(6, 'ASUS ROG FX505DY', '7743', 'image/l1.jpg', 47000.00, '8gb RAM,Intel i7 7500k,gtx 1050', 'laptop'),
 array(7, 'ASUS S650', '8865', 'image/l2.jpg', 30000.00, '8gb RAM,Intel i5 7500k,AMD m4', 'laptop'),
 array(8, 'ASUS ROG', '86745', 'image/l3.jpg', 70000.00, '8gb RAM,Intel i5 8130,GTX 1060', 'laptop'),
 array(9, 'ASUS FX505DT', '3342', 'image/l4.jpg', 56900.00, '8gb RAM,Intel i7 7500k,GTX 1050', 'laptop'),
 array(10, 'ASUS FX570', '8650', 'image/l5.jpg', 67000.00, '8gb RAM,AMD RYZEN 5,gtx 1050', 'laptop'),
 array(11, 'ASUS GTX 1650', '54558', 'image/g1.jpg', 17000.00, '', 'graphics'),
 array(12, 'ASUS GTX 1050', '99558', 'image/g2.jpg', 13000.00, '', 'graphics'),
 array(13, 'ASUS GTX 1070', '59900', 'image/g3.jpg', 45000.00, '', 'graphics'),
 array(14, 'ASUS RTX 2080ti', '1', 'image/g4.jpg', 156000.00, '', 'graphics'),
 array(15, 'ASUS GTX 2060', '88976', 'image/g5.jpg', 23000.00, '', 'graphics'),
 array(16, 'ASUS MAX PRO M1', '77656', 'image/p1.jpg', 11000.00, '3GB RAM,16GB ROM,PROCESSOR SD 610', 'smartphone'),
 array(17, 'ASUS zENFONE 5Z', '87657', 'image/p2.jpg', 25000.00, '6GB RAM,64GB ROM,PROCESSOR SD 845', 'smartphone'),
 array(18, 'ASUS ZENFONE 6Z', '55463', 'image/p3.jpg', 33000.00, '8GB RAM,64GB ROM,PROCESSOR SD 855', 'smartphone'),
 array(19, 'ASUS ZENFONE MAX', '99085', 'image/p4.jpg', 17000.00, '3GB RAM,16GB ROM,PROCESSOR SD 610', 'smartphone'),
 array(20, 'ASUS ROG PHONE 2', '77896', 'image/p5.jpg', 56000.00, '8GB RAM,64GB ROM,PROCESSOR SD 855', 'smartphone'),
 array(21, 'ASUSVP228', '55674', 'image/monitor1.jpg', 28790.00, '21.5” Full HD monitor with 1ms (GTG) quick response time.\r\nASUS-exclusive GamePlus provides Crosshair and Timer function for better gaming experience\r\nNumber of Colors: 16.7M ; Response Time: 1ms ; Power Consumption: 100-240V, 50/60Hz', 'monitor')
);

    $bulk = new MongoDB\Driver\BulkWrite(); 
  
//$bulk->insert(['_id' => , 'name' => ],); 
$key=array(
    '_id',
    'name',
    'uniqueid',
    'image',
    'price',
    'specification',
    'type'
);
for ($row = 0; $row < 21; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
   
     // echo "<li>".$data[$row][$col]."</li>";
     //   echo "<li>".$key[$col]."=>".$data[$row][$col]."</li>";
                            $d=array( 
                            "_id" => $data[$row][0],
                            "name" => $data[$row][1],
                            "uniqueid" => $data[$row][2],
                            "image" => $data[$row][3],
                            "price" => $data[$row][4],
                            "specification" => $data[$row][5],
                            "type" => $data[$row][6]);
                        

$bulk->insert($d);
//echo $d;
    echo "</ul>";
  }

    $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
    

    try {
        $result = $this->con->executeBulkWrite('asusdb.products', $bulk, $writeConcern);
        if($result)
        {
            echo "success";
        }
    } catch (MongoDB\Driver\Exception\BulkWriteException $e) {
        $result = $e->getWriteResult();
    
        // Check if the write concern could not be fulfilled
        if ($writeConcernError = $result->getWriteConcernError()) {
            printf("%s (%d): %s\n",
                $writeConcernError->getMessage(),
                $writeConcernError->getCode(),
                var_export($writeConcernError->getInfo(), true)
            );
  }

}
}







}
?>

