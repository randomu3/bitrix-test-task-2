<?php
namespace Test\Components;

use Bitrix\Main\Loader;

/**
 * Класс для работы с элементами инфоблока "Склад поставки".
 */
class Warehouses
{
    /**
     * Получает список складов из инфоблока.
     *
     * @param int
     * @return array
     */
    public static function getWarehouses($iblockId)
    {
        if (!Loader::includeModule("iblock")) {
            return array();
        }

        $warehouses = array();
        $res = \CIBlockElement::GetList(
            array("SORT" => "ASC"),
            array("IBLOCK_ID" => $iblockId, "ACTIVE" => "Y"),
            false,
            false,
            array("ID", "NAME", "CODE")
        );

        while ($ob = $res->Fetch()) {
            $warehouses[] = array(
                'ID' => $ob['ID'],
                'NAME' => $ob['NAME'],
                'CODE' => $ob['CODE']
            );
        }

        return $warehouses;
    }
}
?>