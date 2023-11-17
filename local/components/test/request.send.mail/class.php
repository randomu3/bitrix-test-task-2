<?php
namespace Test\Components;

use Bitrix\Main\Mail\Event;
use Bitrix\Main\Diag;
use CBitrixComponent;

require_once(__DIR__ . '/classes/IblockHelper.php');

/**
 * Компонент для отправки данных формы по электронной почте.
 */
class EmailFormComponent extends CBitrixComponent
{
    /**
     * Отправляет электронное письмо с данными формы.
     *
     * @param array
     * @return \Bitrix\Main\Result
     */
    protected function sendEmail($data)
    {
        $result = new \Bitrix\Main\Result();

        $fields = [
            "TITLE" => $data['title'],
            "CATEGORY" => $data['category'],
            "REQUEST_TYPE" => $data['requestType'],
            "WAREHOUSE" => $data['warehouse'],
            "BRAND" => $data['brand'],
            "NAME" => $data['name'],
            "QUANTITY" => $data['quantity'],
            "PACKING" => $data['packing'],
            "CLIENT" => $data['client'],
            "COMMENT" => $data['comment'],
        ];

        $logMessage = "Отправлено письмо по шаблону: " . $this->arParams['MAIL_TEMPLATE'];
        Diag\Debug::writeToFile($logMessage);

        $event = new \CEvent;
        $sendResult = $event->Send($this->arParams['MAIL_TEMPLATE'], 's1', $fields);

        if (!$sendResult) {
            $result->addError(new \Bitrix\Main\Error("Не удалось отправить письмо."));
        }

        return $result;
    }

    /**
     * Выполняет основную логику компонента.
     */
    public function executeComponent()
    {
        // Если не POST-запрос или не прошла проверка сессии, отображаем форму
        if ($_SERVER["REQUEST_METHOD"] !== "POST" || !check_bitrix_sessid()) {
            $this->arResult = [
                'CATEGORIES' => IblockHelper::getIblockData($this->arParams['CATEGORIES_IBLOCK_ID'], 'categories'),
                'APPLICATIONS' => IblockHelper::getIblockData($this->arParams['APPLICATIONS_IBLOCK_ID'], 'applications'),
                'WAREHOUSES' => IblockHelper::getIblockData($this->arParams['WAREHOUSES_IBLOCK_ID'], 'warehouses'),
                'BRANDS' => IblockHelper::getIblockData($this->arParams['BRANDS_IBLOCK_ID'], 'brands'),
            ];

            $this->includeComponentTemplate();
            return;
        }

        // Обработка POST-запроса и отправка электронного письма
        $result = $this->sendEmail($_POST);
        $response = $this->prepareResponse($result);
        $this->sendJsonResponse($response);
    }

    /**
     * Подготавливает массив с данными для JSON-ответа.
     *
     * @param bool
     * @return array
     */
    protected function prepareResponse(\Bitrix\Main\Result $result)
    {
        if ($result->isSuccess()) {
            return ['status' => 'success', 'message' => 'Ваша заявка успешно отправлена.'];
        } else {
            $errorMessages = $result->getErrorMessages();
            return ['status' => 'error', 'message' => implode(". ", $errorMessages)];
        }
    }

    /**
     * Отправляет JSON-ответ и завершает выполнение скрипта.
     *
     * @param array
     */
    protected function sendJsonResponse($response)
    {
        global $APPLICATION;
        $APPLICATION->RestartBuffer();
        header('Content-Type: application/json');
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        $APPLICATION->FinalActions();
        die();
    }
}
?>