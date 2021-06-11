<?php
function getHeroImageUrl($hero_id)
{
    $hero_inf = [];
    switch ($hero_id) {
        case 1:
            $src="../public/css/media/aquamanDC.png";
            $hero_name = "Aquaman";
            break;
        case 2:
            $src="../public/css/media/batmanDC.png";
            $hero_name = "Batman";
            break;
        case 3:
            $src="../public/css/media/CaptainAmericaMarvel.png";
            $hero_name = "Captain America";
            break;
        case 4:
            $src="../public/css/media/spidermanMarvel.png";
            $hero_name = "Spiderman";
            break;
        case 5:
            $src="../public/css/media/supermanDC.png";
            $hero_name = "Superman";
            break;
        case 6:
            $src="../public/css/media/thorMarvel.png";
            $hero_name = "Thor";
            break;
        case 7:
            $src="../public/css/media/thorMarTimothyDrakeDCvel.png";
            $hero_name = "Timothy Drake";
            break;
        case 8:
            $src="../public/css/media/wolverineMarvel.png";
            $hero_name = "Wolverine";
            break;
        }
  array_push($hero_inf,$src);
  array_push($hero_inf,$hero_name);
  return $hero_inf;
}
?>