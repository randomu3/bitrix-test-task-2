<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Заголовок задания");
?>

<?$APPLICATION->IncludeComponent(
	"test:request.send.mail",
	"",
	Array(
		"CATEGORIES_IBLOCK_ID" => "7",
		"APPLICATIONS_IBLOCK_ID" => "5",
		"WAREHOUSES_IBLOCK_ID" => "8",
		"BRANDS_IBLOCK_ID" => "6",
		"MAIL_TEMPLATE" => "FORM_REQUEST"
	)
);?>

<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>