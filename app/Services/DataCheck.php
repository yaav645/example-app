<?php

namespace App\Services;

class DataCheck
{
    public function isValid($strDate, $strFormat = "d/m/Y")
    {
        $date = \DateTime::createFromFormat($strFormat, $strDate);
        dump($date->format('Y'));
        if ($date && ((int)$date->format('Y') < 1900)) {
            return false;
        }
        dump(\DateTime::getLastErrors());

        return $date && (\DateTime::getLastErrors()['warning_count'] == 0) && (\DateTime::getLastErrors()['error_count'] == 0);
    }

}
