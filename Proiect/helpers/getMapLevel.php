<?php
function getMapLevel($level)
{
    $src="";
    switch ($level) {
        case 0:
            $src="../public/css/media/map2L1.jpg";
            break;
        case 1:
            $src="../public/css/media/map2L1.jpg";
            break;
        case 2:
            $src="../public/css/media/map2L2.jpg";

            break;
        case 3:
            $src="../public/css/media/map2L3.jpg";

            break;
        case 4:
            $src="../public/css/media/map2L4.jpg";

            break;
        case 5:
            $src="../public/css/media/map2L5.jpg";

            break;
        case 6:
            $src="../public/css/media/map2L6.jpg";

            break;
        case 7:
            $src="../public/css/media/map2L7.jpg";

            break;
        case 8:
            $src="../public/css/media/map2L8.jpg";

            break;
            default:
            $src="../public/css/media/map2L8.jpg";

            break;
        }
return $src;
}
?>