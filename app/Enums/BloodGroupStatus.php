<?php 

namespace App\Enums;

enum BloodGroupStatus:String
{
    case AVAILABLE ='Available';

    case NOT_AVAILABLE ='Not Available';



    public static function getValues(): array
    {
        return array_column(BloodGroupStatus::cases(), 'value');
    }

    public static function getKeyValues():array
    {
        return array_column(BloodGroupStatus::cases(), 'value','key');
    }
}