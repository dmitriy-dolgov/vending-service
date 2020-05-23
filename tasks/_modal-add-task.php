<?php

use helpers\Html;

$GLOBALS['html-code']['js'][] = <<<JS
$(document).ready(function(){
    $('.filter-assign-executor-type').attr('placeholder', 'Назначить исполнителя');

    $('.filter-calendar-type-today').datepicker({
        todayBtn: 'linked',
        language: 'ru'
    }).datepicker('setDate', 'now');
});
JS;
?>
<div id="modal-add-task" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="dialog-header">
                    <h4 class="heading color-gray">Новая задача</h4>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>

                <form class="ng-pristine ng-invalid ng-untouched">
                    <div class="mat-dialog-content">
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <select class="filter-machine-type combobox form-control"
                                        placeholder="Тип оборудования">
                                    <option></option>
                                    <?php foreach ($htmlMachine->getItems() as $key => $item): ?>
                                        <option value="<?= $key ?>"><?= Html::encode($item) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <select class="filter-city-type combobox form-control" placeholder="Город">
                                    <option></option>
                                    <?php foreach ($htmlCities->getItems() as $item): ?>
                                        <option value="<?= $item['id'] ?>"><?= Html::encode($item['name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <select id="filter-creator" class="filter-assign-executor-type combobox form-control"
                                        placeholder="Назначить исполнителя">
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
                                        <option value="<?= $item['id'] ?>"><?= Html::encode($uName) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="filter-calendar-type-today date input-group">
                                    <input type="text" class="form-control">
                                    <div class="input-group-append"><span class="input-group-text"><i
                                                    class="fa fa-calendar"></i></span></div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <select class="filter-outlet-type combobox form-control" placeholder="Торговая точка">
                                    <option></option>
                                    <?php foreach ($htmlDivisions->getItems() as $item): ?>
                                        <option value="<?= $item['id'] ?>"><?= Html::encode($item['description'] . ' (' . $item['address'] . ')') ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <select class="filter-outlet-type combobox form-control" placeholder="Торговая точка">
                                    <option></option>
                                    <?php foreach ($htmlDivisions->getItems() as $item): ?>
                                        <option value="<?= $item['id'] ?>"><?= Html::encode($item['address'] . ' (' . $htmlMachine->getItemsKeyMapped()[$item['id']]['serial_number'] . ')') ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mat-dialog-actions">
                        <button class="btn app-btn btn-secondary" type="button">Сбросить</button>
                        <button class="btn app-btn btn-primary disabled" type="submit" disabled="disabled">Создать задачу
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
