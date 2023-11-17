<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$arComponentDescription = array(
    "NAME" => GetMessage("FORM_COMPONENT_NAME"),
    "DESCRIPTION" => GetMessage("FORM_COMPONENT_DESC"),
    "PATH" => array(
        "ID" => "custom_forms",
        "CHILD" => array(
            "ID" => "request_send_mail",
            "NAME" => GetMessage("REQUEST_FORM_NAME")
        )
    ),
);
?>