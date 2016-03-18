<?php


    header("content-type: text/xml");
    echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";



    date_default_timezone_set('Europe/Copenhagen');

    class makePerson {
        public $number;
        public $name;
        public $languages;
        public $days;

        public function __construct($number, $name, $languages, $days) {
            $this->number = $number;
            $this->name = $name;
            $this->languages = $languages;
            $this->days = $days;
        }

        public function checkAvailability($days) {
            if (array_key_exists(date("D"), $days)) {
                foreach($this->days as $day => $day_value) {
                    if (date("D") == $day) {
                        foreach ($day_value as $day_val) {
                            if (date("G") == $day_val) {
                                return true;
                            }
                        }
                    }
                }
            }
            else {
                return true;
            }
        }
    }


    $Hussain = new makePerson(
        "31582555",
        "Hussain Alamood",
        array("Arabic", "Farsi", "Danish", "English"),
        array(
            "Mon"=>array("15", "16", "17", "18", "19", "20", "21", "22", "23", "24"),
            "Tue"=>array("16", "17", "18", "19", "20", "21", "22", "23", "24"),
            "Wed"=>array("16", "17", "18", "19", "20", "21", "22", "23", "24"),
            "Thu"=>array("16", "17", "18", "19", "20", "21", "22", "23", "24"),
            "Fri"=>array("12","14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24"),
            "Sat"=>array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24"),
            "Sun"=>array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24")
        )
    );

    $JohnDoe = new makePerson(
        "89898989",
        "John Doe",
        array("Arabic", "Dank", "Danish", "English"),
        array(
            "Mon"=>array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24"),
            "Tue"=>array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24"),
            "Wed"=>array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24"),
            "Thu"=>array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24"),
            "Fri"=>array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24"),
            "Sat"=>array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24"),
            "Sun"=>array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24")
        )
    );

    $HussainCheck = $Hussain->checkAvailability($Hussain->days);
    $JohnDoeCheck = $JohnDoe->checkAvailability($JohnDoe->days);

    $peeps = array(
        $JohnDoeCheck=>$JohnDoe,
        $HussainCheck=>$Hussain
    );

    function makeLanguageString($thePerson) {
        $language = "";

        foreach ($thePerson->languages as $i) {
            $language = $language . " " . $i;
        }
        return $language;
    }

    


    function mkStr($people) {
        foreach ($people as $gg_check => $gg) {
            if ($gg_check == true) {
                print("call " . $gg->number . " for " . makeLanguageString($gg));
            }
        }
        return "--------------- there is no one else avalible at the moment ------------------";
    }
    
?>
<Response>
    <Message>

        <?php
            echo mkStr($peeps);
        ?>

    </Message>
</Response>
