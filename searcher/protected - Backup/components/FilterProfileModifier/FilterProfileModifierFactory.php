<?php

/**
 * Factory for filter search modifiers
 *
 * @author Smirnov Egor <egorsmir@gmail.com>
 * @link http://lastdayz.ru
 * @copyright Copyright &copy; 2011 Smirnov Egor aka LastDay
 */

Yii::import('application.components.FilterProfileModifier.AbstractModifier');

class FilterProfileModifierFactory
{
    public static function init($object, $type, $key)
    {
        Yii::import('application.components.FilterProfileModifier.' . $type);
        return new $type($object, $key);
    }
}

?>