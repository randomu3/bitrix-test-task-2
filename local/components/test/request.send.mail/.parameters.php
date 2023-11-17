<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Iblock;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        "CATEGORIES_IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("CATEGORIES_IBLOCK_ID"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "APPLICATIONS_IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("APPLICATIONS_IBLOCK_ID"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "WAREHOUSES_IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("WAREHOUSES_IBLOCK_ID"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "BRANDS_IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("BRANDS_IBLOCK_ID"),
            "TYPE" => "STRING",
            "DEFAULT" => "",
        ),
        "MAIL_TEMPLATE" => array(
            "PARENT" => "BASE",
            "NAME" => GetMessage("MAIL_TEMPLATE"),
            "TYPE" => "STRING",
            "DEFAULT" => "NEW_REQUEST",
        ),
    ),
);
?>