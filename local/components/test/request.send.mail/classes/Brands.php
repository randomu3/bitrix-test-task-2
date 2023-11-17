<?php
namespace Test\Components;

use Bitrix\Main\Loader;

/**
 * Класс для работы с элементами инфоблока "Состав заявки".
 */
class Brands
{
    /**
     * Получает список брендов из инфоблока.
     *
     * @param int
     * @return array
     */
    public static function getBrands($iblockId)
    {
        if (!Loader::includeModule("iblock")) {
            return array();
        }

        $brands = array();
        $res = \CIBlockElement::GetList(
            array("SORT" => "ASC"),
            array("IBLOCK_ID" => $iblockId, "ACTIVE" => "Y"),
            false,
            false,
            array("ID", "NAME", "CODE")
        );

        while ($ob = $res->Fetch()) {
            $brands[] = array(
                'ID' => $ob['ID'],
                'NAME' => $ob['NAME'],
                'CODE' => $ob['CODE']
            );
        }

        return $brands;
    }
}
?>