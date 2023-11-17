<?php
namespace Test\Components;

use Bitrix\Main\Loader;
use Bitrix\Main\SystemException;

require_once(__DIR__ . '/Categories.php');
require_once(__DIR__ . '/Applications.php');
require_once(__DIR__ . '/Warehouses.php');
require_once(__DIR__ . '/Brands.php');

/**
 * Вспомогательный класс для работы с инфоблоками.
 */
class IblockHelper
{
    /**
     * Подключает модуль "iblock". Если модуль не установлен, выбрасывает исключение.
     *
     * @throws SystemException
     */
    private static function includeModule()
    {
        if (!Loader::includeModule('iblock')) {
            throw new SystemException("Module 'iblock' is not installed.");
        }
    }

    /**
     * Получает данные из инфоблока в зависимости от типа данных.
     *
     * @param int
     * @param string
     * @return array
     * @throws SystemException
     */
    public static function getIblockData($iblockId, $type)
    {
        self::includeModule();

        switch ($type) {
            case 'categories':
                return Categories::getCategories($iblockId);
            case 'applications':
                return Applications::getApplications($iblockId);
            case 'warehouses':
                return Warehouses::getWarehouses($iblockId);
            case 'brands':
                return Brands::getBrands($iblockId);
            default:
                throw new SystemException("Invalid type specified.");
        }
    }
}
?>