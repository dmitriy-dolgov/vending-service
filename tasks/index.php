<?php

require_once __DIR__ . '/../html/header.php';

use lib\items\Tasks;
use lib\items\Machine;
use lib\items\Cities;
use lib\items\Users;
use lib\items\Divisions;
use lib\items\Status;


$htmlTasks = new Tasks();

$htmlMachine = new Machine();
$htmlCities = new Cities();
$htmlUsers = new Users();
$htmlDivisions = new Divisions();
$htmlStatus = new Status();

?>

    <div class="py-4">

        <?php require '_filter.php'; ?>

        <ul class="list-group app-list-group mt-4 mb-5 ng-star-inserted">
            <?php
            foreach ($htmlTasks->getItems() as $item):
                $divisionId = $htmlMachine->getFullInfo($item['machine_id'])['division_id'] ?? false;
                ?>
                <li class="list-group-item ng-star-inserted">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12 order-first">
                            <div class="machine-state ic_pause ng-star-inserted"
                                 title="Простой"></div>
                            <div class="ng-star-inserted">
                                <div class="text-warning text-bold fsz-14"><?= $divisionId ? $htmlDivisions->getItemsKeyMapped()[$divisionId]['description'] : '&nbsp;' ?></div>
                                <div class="text-dark fsz-14"><?= $divisionId ? ('(' . $htmlDivisions->getItemsKeyMapped()[$divisionId]['address'] . ')') : '&nbsp;' ?></div>
                                <div class="fsz-12"><?= $htmlMachine->getItemsKeyMapped()[$item['machine_id']]['model'] ?? '&nbsp;' ?></div>
                            </div>
                        </div>
                        <div class="col-xl col-md-3 col-6 order-xl-2 order-md-4">
                            <div class="item-heading fsz-9 text-nowrap">Дата</div>
                            <?php //TODO: оптимизировать strtotime()
                            ?>
                            <div class="text-dark fsz-12"><?= date('d.m.Y', strtotime($item['time_created'])) ?><br>
                                <?= date('H:i:s', strtotime($item['time_created'])) ?>
                            </div>
                        </div>
                        <div class="col-xl col-md-3 col-6 order-xl-3 order-md-5">
                            <div class="item-heading fsz-9 text-nowrap">Создатель</div>
                            <div class="fsz-12">
                                <span class="text-dark ng-star-inserted"><?php
                                    //TODO: вынести функционал в отдельный класс
                                    $uName = '';
                                    if (!empty($htmlUsers->getItemsKeyMapped()[$item['author_user_id']])) {
                                        $uName = trim($htmlUsers->getItemsKeyMapped()[$item['author_user_id']]['name'] ?? '');
                                        $uName = trim($uName ?: $htmlUsers->getItemsKeyMapped()[$item['author_user_id']]['phone_number']);
                                        $uName = trim($uName ?: $htmlUsers->getItemsKeyMapped()[$item['author_user_id']]['email']);
                                    }
                                    echo $uName ?: '&nbsp;';
                                    ?></span></div>
                        </div>
                        <div class="col-xl col-md-3 col-6 order-xl-4 order-md-6">
                            <div class="item-heading fsz-9 text-nowrap">Исполнитель</div>
                            <div class="fsz-12">
                                <span class="text-dark ng-star-inserted"><?php
                                    //TODO: вынести функционал в отдельный класс
                                    $uName = '';
                                    if (!empty($htmlUsers->getItemsKeyMapped()[$item['worker_user_id']])) {
                                        $uName = trim($htmlUsers->getItemsKeyMapped()[$item['worker_user_id']]['name'] ?? '');
                                        $uName = trim($uName ?: $htmlUsers->getItemsKeyMapped()[$item['worker_user_id']]['phone_number']);
                                        $uName = trim($uName ?: $htmlUsers->getItemsKeyMapped()[$item['worker_user_id']]['email']);
                                    }
                                    echo $uName ?: '&nbsp;';
                                    ?></span></div>
                        </div>
                        <div class="col-xl col-md-3 col-6 order-xl-5 order-md-2">
                            <div class="item-heading fsz-9 text-nowrap">Статус</div>
                            <div class="text-dark fsz-12"><?= $htmlStatus->getItemsKeyMapped()[$item['state']]['name'] ?></div>
                        </div>
                        <div class="col-xl col-md-3 col-6 order-xl-6 order-md-7">
                            <div class="item-heading fsz-9 text-nowrap">&nbsp;</div>
                            <div class="text-dark fsz-12"></div>
                        </div>
                        <div class="col-xl col-md-3 col-6 order-xl-7 order-md-3">
                            <div class="app-list-item-actions">
                                <button class="mx-2 mat-icon-button"><span
                                            class="mat-button-wrapper"><div class="app-icon"
                                                                            name="ic_edit"
                                                                            style="display: block; background-image: url(/img/ic_edit.png); min-height: 32px; min-width: 32px; height: 32px; width: 32px;"></div></span>
                                </button>
                                <button class="mx-2 mat-icon-button"><span
                                            class="mat-button-wrapper"><div class="app-icon"
                                                                            style="display: block; background-image: url(/img/ic_delete.png); min-height: 32px; min-width: 32px; height: 32px; width: 32px;"></div></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

    </div>

<?php

include '_modal-add-task.php';

require_once __DIR__ . '/../html/footer.php';
