<?php
namespace Test\Components;

use Bitrix\Main\Loader;

/**
 * Класс для работы с элементами инфоблока "Категории товаров".
 */
class Categories
{
    /**
     * Получает список категорий из инфоблока.
     *
     * @param int
     * @return array
     */
    public static function getCategories($iblockId)
    {
        if (!Loader::includeModule("iblock")) {
            return array();
        }

        $categories = array();
        $res = \CIBlockElement::GetList(
            array("SORT" => "ASC"),
            array("IBLOCK_ID" => $iblockId, "ACTIVE" => "Y"),
            false,
            false,
            array("ID", "NAME", "CODE")
        );

        while ($ob = $res->Fetch()) {
            $categories[] = array(
                'ID' => $ob['ID'],
                'NAME' => $ob['NAME'],
                'CODE' => $ob['CODE']
            );
        }

        return $categories;
    }
}
?>