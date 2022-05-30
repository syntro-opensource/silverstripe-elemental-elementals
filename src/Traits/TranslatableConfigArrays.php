<?php

namespace Syntro\SilverstripeElementalElementals\Traits;

use SilverStripe\Core\Config\Config;

/**
 * Allows an object to read an array with options that point to
 * contain an option and a title to translate said title.
 *
 * @author Matthias Leutenegger <hello@syntro.ch>
 */
trait TranslatableConfigArrays
{
    /**
     * getTranslatedConfigArray - returns the desired config array,
     * bnut with the options passed through a translation
     *
     * @param  string $configName the name of the config value to get
     * @return array
     */
    public static function getTranslatedConfigArray(string $configName)
    {
        $values = Config::inst()->get(static::class, $configName);
        if (!is_array($values)) {
            throw new \Exception("Config value '$configName' on " . static::class . "} is not an array.", 1);
        }
        $translatedValues = [];
        foreach ($values as $key => $value) {
            $translatedValues[$key] = _t(static::class . '.' . $configName . ':' . $key, $value);
        }

        return $translatedValues;
    }

    /**
     * getTranslatedConfigArrayOption - gets the translated value for a specific option
     *
     * @param  string $configName the name of the config value to get
     * @param  string $optionName the name of the option to get
     * @return null|string
     */
    public static function getTranslatedConfigArrayOption(string $configName, $optionName)
    {
        $array = static::getTranslatedConfigArray($configName);
        if (!isset($array[$optionName])) {
            return null;
        }
        return _t(static::class . '.' . $configName . ':' . $optionName, $array[$optionName]);
    }
}
