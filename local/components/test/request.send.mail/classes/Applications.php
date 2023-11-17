<?php
namespace Test\Components;

use Bitrix\Main\Loader;

/**
 * Класс для работы с элементами инфоблока "Виды заявок".
 */
class Applications
{
    /**
     * Получает список заявок из инфоблока.
     *
     * @param int
     * @return array
     */
    public static function getApplications($iblockId)
    {
        if (!Loader::includeModule("iblock")) {
            return array();
        }

        $applications = array();
        $res = \CIBlockElement::GetList(
            array("SORT" => "ASC"),
            array("IBLOCK_ID" => $iblockId, "ACTIVE" => "Y"),
            false,
            false,
            array("ID", "NAME", "CODE")
        );

        while ($ob = $res->Fetch()) {
            $applications[] = array(
                'ID' => $ob['ID'],
                'NAME' => $ob['NAME'],
                'CODE' => $ob['CODE']
            );
        }

        return $applications;
    }
}
?>