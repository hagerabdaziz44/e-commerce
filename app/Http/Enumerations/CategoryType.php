<?php


namespace App\Http\Enumerations;

use Spatie\Enum\Enum;

final class CategoryType extends Enum
{
    const mainCategory = 1;
    const subCategory = 2;

}
// abstract class Enum {
//     static function getKeys(){
//         $class = new ReflectionClass(get_called_class());
//         return array_keys($class->getConstants());
//     }
// }
