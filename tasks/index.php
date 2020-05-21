<?php

require_once __DIR__ . '/../html/header.php';

use helpers\Html;
use lib\items\Equipment;
use lib\items\Users;

$GLOBALS['html-code']['js'][] = <<<JS
$(document).ready(function(){
    $('.combobox').combobox();
    
    /* TODO: не работает почему-то - видимо, combobox переделывает структуру
    $('.combobox').each(function() {
      var placeholder = $(this).attr('placeholder');
      if (placeholder) {
        console.log("placeholder: " + placeholder);
        $(this).attr('placeholder', placeholder)
      }
    });*/

    // bonus: add a placeholder
    $('.filter-equipment-type').attr('placeholder', 'Тип оборудования');
    $('.filter-city-type').attr('placeholder', 'Город');
    $('.filter-outlet-type').attr('placeholder', 'Торговая точка');
    $('.filter-creator-type').attr('placeholder', 'Создатель');
    $('.filter-executor-type').attr('placeholder', 'Исполнитель');
    $('.filter-status-type').attr('placeholder', 'Статус');
    
    
    $('#sel-statuses').multiSelect();
});
JS;
?>

    <form autocomplete="off" class="task-filters ng-untouched ng-pristine ng-invalid">
        <div class="row">
            <div class="col-xl-2 col-lg-3 col-sm-12 col-6">
                <h1 class="page-title">Все задачи (<span class="task-amount"></span>)</h1>
            </div>
            <div class="col-xl-2 col-lg-3 col-sm-4 col-6 mt-lg-0 mt-sm-2">
                <button class="btn app-btn btn-primary-dark" type="button">Добавить задачу</button>
            </div>
            <div class="col-xl-2 col-lg-3 col-sm-4 col-6 mt-lg-0 mt-2 offset-0 offset-xl-4">
                <button class="btn app-btn btn-secondary" type="reset">Сбросить фильтры</button>
            </div>
            <div class="col-xl-2 col-lg-3 col-sm-4 col-6 mt-lg-0 mt-2">
                <button class="btn app-btn btn-primary" type="submit">Применить фильтры</button>
            </div>
        </div>
        <div class="row fields-row mt-3">
            <div class="col-lg col-md-4 col-sm-6 order-lg-1 mt-sm-0">
                <select class="filter-equipment-type combobox form-control" placeholder="Тип оборудования">
                    <option></option>
                    <?php foreach ((new Equipment())->getItems() as $key => $item): ?>
                        <option value="<?= $key ?>"><?= Html::encode($item) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-lg col-md-4 col-sm-6 order-lg-2 mt-sm-0 mt-2">
                <select class="filter-city-type combobox form-control" placeholder="Город">
                    <option></option>
                </select>
            </div>
            <div class="col-lg col-md-4 col-sm-12 order-lg-3 mt-md-0 mt-sm-3 mt-2">
                <select class="filter-outlet-type combobox form-control" placeholder="Торговая точка">
                    <option></option>
                </select>
            </div>
            <div class="col-lg col-sm-4 order-lg-4 mt-lg-0 mt-sm-3 mt-2">
                <select id="filter-creator" class="filter-creator-type combobox form-control " placeholder="Создатель">
                    <option></option>
                    <?php
                    foreach ((new Users())->getItems() as $item):
                        if (!$uName = trim($item['name'])) {
                            if (!$uName = trim($item['phone_number'])) {
                                if (!$uName = trim($item['email'])) {
                                    $uName = '- нет данных -';
                                }
                            }
                        }
                        ?>
                        <option value="<?= $item['id'] ?>"><?= Html::encode($uName) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-lg col-sm-4 order-lg-5 mt-lg-0 mt-sm-3 mt-2">
                <select id="filter-creator" class="filter-executor-type combobox form-control "
                        placeholder="Исполнитель">
                    <option></option>
                    <?php
                    foreach ((new Users())->getItems() as $item):
                        if (!$uName = trim($item['name'])) {
                            if (!$uName = trim($item['phone_number'])) {
                                if (!$uName = trim($item['email'])) {
                                    $uName = '- нет данных -';
                                }
                            }
                        }
                        ?>
                        <option value="<?= $item['id'] ?>"><?= Html::encode($uName) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-lg col-sm-4 order-lg-6 order-7 mt-sm-3 mt-2"><label
                        class="col-label">Поиск по дате</label></div>
            <div class="col-lg col-sm-4 order-lg-7 order-8 mt-sm-3 mt-0"><span class="datepicker-label">с</span>
                <input type="text" class="form-control">
            </div>
            <div class="col-lg col-sm-4 order-lg-8 order-9 mt-sm-3 mt-2"><span class="datepicker-label">по</span>
                <input type="text" class="form-control">
            </div>
            <div class="col-lg col-sm-4 order-lg-9 order-6 mt-sm-3 mt-2">
                <select id="sel-statuses" class="filter-status-type form-control" placeholder="Статус" multiple>
                    <option value="1">Создано</option>
                    <option value="2">Выполняется</option>
                    <option value="3">Завершено</option>
                    <option value="4">Удалено</option>
                </select>
            </div>
        </div>
    </form>

<?php

require_once __DIR__ . '/../html/footer.php';
