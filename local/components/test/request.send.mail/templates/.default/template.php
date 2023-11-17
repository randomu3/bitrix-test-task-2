<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

// IncludeTemplateLangFile(__FILE__);

CJSCore::Init(array('jquery'));
?>

<form action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data" class="form-horizontal border p-4">
    <input type="hidden" name="sessid" value="<?=bitrix_sessid()?>">

    <!-- Заголовок заявки -->
    <div class="col-sm-12">
        <label for="title" class="control-label h2 mb-3">Новая заявка</label>
    </div>

    <div class="form-group">
        <label for="title" class="col-sm-6 control-label">Заголовок заявки</label>
        <div class="col-sm-3">
            <input type="text" class="form-control" id="title" name="title" placeholder="Введите заголовок заявки">
        </div>
    </div>
    
    <!-- Категория -->
    <div class="form-group">
        <div class="col-sm-12">
            <label class="control-label h2 mb-3">Категория</label>
            <?php foreach ($arResult['CATEGORIES'] as $category): ?>
                <div class="radio">
                    <label>
                        <input type="radio" name="category" value="<?= $category['CODE'] ?>">
                        <?= $category['NAME'] ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Вид заявки -->
    <div class="form-group">
        <div class="col-sm-12">
            <label class="control-label h2 mb-3">Вид заявки</label>
            <?php foreach ($arResult['APPLICATIONS'] as $requestType): ?>
                <div class="radio">
                    <label>
                        <input type="radio" name="requestType" value="<?= $requestType['CODE'] ?>">
                        <?= $requestType['NAME'] ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <!-- Склад поставки -->
    <div class="form-group">
        <label for="warehouse" class="col-sm-3 col-md-5 control-label h2 mb-3">Склад поставки</label>
        <div class="col-sm-6 col-md-5 col-lg-3">
            <select class="form-control" id="warehouse" name="warehouse">
                <option value="">Выберите склад поставки</option>
                <?php foreach ($arResult['WAREHOUSES'] as $warehouse): ?>
                    <option value="<?= $warehouse['CODE'] ?>"><?= $warehouse['NAME'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <!-- Состав заявки -->
    <div class="form-group">
        <div class="col-lg-10 col-xl-10">
            <label for="brand" class="form-label control-label h2 mb-3">Состав заявки</label>
            <div class="form-group row align-items-center orderItems">
                <div class="orderItem col-sm-12 row d-flex justify-content-center flex-grow-1">
                    <div class="mb-3 col-xl-2 col-lg-6 col-md-6 col-sm-12 text-center">
                        <label for="brand" class="form-label text-danger font-weight-bold">Бренд</label>
                        <select class="form-control" id="brand" name="brand">
                            <option value="">Выберите бренд</option>
                            <?php foreach ($arResult['BRANDS'] as $brand): ?>
                                <option value="<?= $brand['CODE'] ?>"><?= $brand['NAME'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-xl-2 col-lg-6 col-md-6 col-sm-12 text-center">
                        <label for="name" class="form-label text-danger font-weight-bold">Наименование</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="">
                    </div>
                    <div class="form-group mb-3 col-xl-2 col-lg-6 col-md-6 col-sm-12 text-center">
                        <label for="quantity" class="form-label text-danger font-weight-bold">Количество</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="">
                    </div>
                    <div class="form-group mb-3 col-xl-2 col-lg-6 col-md-6 col-sm-12 text-center">
                        <label for="packing" class="form-label text-danger font-weight-bold">Фасовка</label>
                        <input type="text" class="form-control" id="packing" name="packing" placeholder="">
                    </div>
                    <div class="form-group mb-4 col-xl-2 col-lg-6 col-md-6 col-sm-12 text-center">
                        <label for="client" class="form-label text-danger font-weight-bold">Клиент</label>
                        <input type="text" class="form-control" id="client" name="client" placeholder="">
                    </div>
                    <div class="form-group col-sm-12 col-xl-2">
                        <button type="button" class="btn btn-primary addItem mx-auto col-sm-12 btn-block col-xl-3">+</button>
                        <button type="button" class="btn btn-danger removeItem mx-auto col-sm-12 btn-block col-xl-3">-</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Выбор файла -->
    <div class="form-group">
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-3">
            <input type="file" class="form-control-file" id="file" name="file">
        </div>
    </div>

    <!-- Комментарий -->
    <div class="form-group">
        <label for="comment" class="col-sm-3 control-label">Комментарий</label>
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-5">
            <textarea class="form-control" rows="5" id="comment" name="comment" rows="3" placeholder="Комментарий"></textarea>
        </div>
    </div>

    <!-- Кнопка отправки формы -->
    <div class="form-group">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-success">Отправить</button>
        </div>
    </div>

    <!-- Модальное окно успешной отправки -->
    <div class="modal fade pr-17" id="formSuccessModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Статус отправки формы</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="successMessage">Форма успешно отправлена!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
</form>