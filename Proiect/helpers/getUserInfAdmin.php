<?php
function getUser($response, $index)
{
    foreach ($response as $key => $value) {
        if ($index == 0) {
            return $value;
        }
        $index = $index - 1;
    }
}
