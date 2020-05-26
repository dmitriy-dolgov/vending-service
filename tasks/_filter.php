<?php

use helpers\Html;

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
    $('.filter-machine-type').attr('placeholder', 'Тип оборудования');
    $('.filter-city-type').attr('placeholder', 'Город');
    $('.filter-outlet-type').attr('placeholder', 'Торговая точка');
    $('.filter-creator-type').attr('placeholder', 'Создатель');
    $('.filter-executor-type').attr('placeholder', 'Исполнитель');
    $('.filter-status-type').attr('placeholder', 'Статус');
    
    //$('.filter-assign-executor-type').attr('placeholder', 'Назначить исполнителя');
    
    
    $('#sel-statuses').multiSelect({
        'noneText': 'Статус',
        'buttonHTML': '<span class="multi-select-button form-control">',
    });
    
    $('.filter-calendar-type').datepicker({
        todayBtn: 'linked',
        clearBtn: true,
        language: 'ru'
    });
    
    var sels = {
        '.task-filters': $('.task-filters')
    };
    
    $('.btn-filter-task-reset').click(function(e) {
        e.preventDefault();
        sels['.task-filters'].find('.combobox-selected').removeClass('combobox-selected');
        sels['.task-filters'].find('.combobox').val('');
        sels['.task-filters'].find('.filter-calendar-type input').val('');
        sels['.task-filters'].find('#sel-statuses option').removeAttr('selected');
        sels['.task-filters'].find('.status-element input').prop('checked', false);
        //TODO: неправильно работает
        sels['.task-filters'].find('.status-element .multi-select-button').text('Статус');
        return false;
    });
});
JS;
?>
<form autocomplete="off" class="task-filters ng-untouched ng-pristine ng-invalid" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
    <input type="hidden" name="action" value="filter">
    <div class="row">
        <div class="col-xl-2 col-lg-3 col-sm-12 col-6">
            <h1 class="page-title">Задачи (<span class="task-amount"><?= $htmlTasks->getItemCount() ?></span>)</h1>
        </div>
        <div class="col-xl-2 col-lg-3 col-sm-4 col-6 mt-lg-0 mt-sm-2">
            <button class="btn app-btn btn-primary-dark btn-add-task" type="button" data-toggle="modal"
                    data-target="#modal-add-task">Добавить задачу
            </button>
        </div>
        <div class="col-xl-2 col-lg-3 col-sm-4 col-6 mt-lg-0 mt-2 offset-0 offset-xl-4">
            <button class="btn app-btn btn-secondary btn-filter-task-reset" type="reset">Сбросить фильтры</button>
        </div>
        <div class="col-xl-2 col-lg-3 col-sm-4 col-6 mt-lg-0 mt-2">
            <button class="btn app-btn btn-primary" type="submit">Применить фильтры</button>
        </div>
    </div>
    <div class="row fields-row mt-3">
        <div class="col-lg col-md-4 col-sm-6 order-lg-1 mt-sm-0">
            <select name="f-machine_id" class="filter-machine-type combobox form-control" placeholder="Тип оборудования">
                <option></option>
                <?php foreach ($htmlMachines->getUnifiedItems() as $key => $item): ?>
                    <option value="<?= $key ?>" <?= ($_GET['f-machine_id'] ?? '') == $key ? 'selected="selected"' : '' ?>><?= Html::encode($item) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-lg col-md-4 col-sm-6 order-lg-2 mt-sm-0 mt-2">
            <select name="f-city_id" class="filter-city-type combobox form-control" placeholder="Город">
                <option></option>
                <?php foreach ($htmlCities->getItems() as $item): ?>
                    <option value="<?= $item['id'] ?>" <?= ($_GET['f-city_id'] ?? '') == $item['id'] ? 'selected="selected"' : '' ?>><?= Html::encode($item['description']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-lg col-md-4 col-sm-12 order-lg-3 mt-md-0 mt-sm-3 mt-2">
            <select name="f-division_id" class="filter-outlet-type combobox form-control" placeholder="Торговая точка">
                <option></option>
                <?php foreach ($htmlDivisions->getItems() as $item): ?>
                    <option value="<?= $item['id'] ?>" <?= ($_GET['f-division_id'] ?? '') == $item['id'] ? 'selected="selected"' : '' ?>><?= Html::encode($item['description'] . ' (' . $item['address'] . ')') ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-lg col-sm-4 order-lg-4 mt-lg-0 mt-sm-3 mt-2">
            <select name="f-author_user_id" id="filter-creator" class="filter-creator-type combobox form-control" placeholder="Создатель">
                <option></option>
                <?php
                foreach ($htmlUsers->getItems() as $item):
                    if (!$uName = trim($item['name'])) {
                        if (!$uName = trim($item['phone_number'])) {
                            if (!$uName = trim($item['email'])) {
                                $uName = '- нет данных -';
                            }
                        }
                    }
                    ?>
                    <option value="<?= $item['id'] ?>" <?= ($_GET['f-author_user_id'] ?? '') == $item['id'] ? 'selected="selected"' : '' ?>><?= Html::encode($uName) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-lg col-sm-4 order-lg-5 mt-lg-0 mt-sm-3 mt-2">
            <select name="f-worker_user_id" id="filter-creator" class="filter-executor-type combobox form-control" placeholder="Исполнитель">
                <option></option>
                <?php
                foreach ($htmlUsers->getItems() as $item):
                    if (!$uName = trim($item['name'])) {
                        if (!$uName = trim($item['phone_number'])) {
                            if (!$uName = trim($item['email'])) {
                                $uName = '- нет данных -';
                            }
                        }
                    }
                    ?>
                    <option value="<?= $item['id'] ?>" <?= ($_GET['f-worker_user_id'] ?? '') == $item['id'] ? 'selected="selected"' : '' ?>><?= Html::encode($uName) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-lg col-sm-4 order-lg-6 order-7 mt-sm-3 mt-2"><label
                    class="col-label">Поиск по дате</label></div>
        <div class="col-lg col-sm-4 order-lg-7 order-8 mt-sm-3 mt-0"><span class="datepicker-label">с</span>
            <div class="filter-calendar-type date input-group">
                <input name="f-date_start" type="text" class="form-control" value="<?= $_GET['f-date_start'] ?? '' ?>">
                <div class="input-group-append"><span class="input-group-text"><i
                                class="fa fa-calendar"></i></span></div>
            </div>
        </div>
        <div class="col-lg col-sm-4 order-lg-8 order-9 mt-sm-3 mt-2"><span class="datepicker-label">по</span>
            <div class="filter-calendar-type date input-group">
                <input name="f-date_end" type="text" class="form-control" value="<?= $_GET['f-date_end'] ?? '' ?>">
                <div class="input-group-append"><span class="input-group-text"><i
                                class="fa fa-calendar"></i></span></div>
            </div>
        </div>
        <div class="col-lg col-sm-4 order-lg-9 order-6 mt-sm-3 mt-2 status-element">
            <select name="f-status_id[]" id="sel-statuses" class="filter-status-type form-control" placeholder="Статус" multiple>
                <?php foreach ($htmlStatuses->getItems() as $key => $item): ?>
                    <option value="<?= $item['id'] ?>" <?= in_array($item['id'], ($_GET['f-status_id'] ?? [])) ? 'selected="selected"' : '' ?>><?= Html::encode($item['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
</form>
