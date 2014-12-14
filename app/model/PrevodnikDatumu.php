<?php

class PrevodnikDatumu {
    static function prevestCeskeDatumNaAnglicke($datum)
    {
      dd($datum, 'datum');

        $date =DateTime::createFromFormat('j.m.Y', $datum);
        dd($date,'date');
        return $date->format('Y-m-d');
    }
}
