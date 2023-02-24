<?php
$salt = 'aiudhfuehy,rgjcizjtgoijiojiuhgyvfcdrxxdcfvgbhjnk,;lkojihugbvftrdsxedrctfvgybhunjkggvtiygvbhnjbhturderDRUTFRGBUYHTRFDERYDRFTGVBH';
$hashed_password = hash('sha256', $salt . $password);