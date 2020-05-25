<?php

require_once __DIR__ . '/../html/header.php';

use lib\items\Tasks;
use lib\items\Machine;
use lib\items\Cities;
use lib\items\Users;
use lib\items\Divisions;
use lib\items\Status;
use helpers\Html;


if (($_POST['action'] ?? '') == 'filter') {
    $query = $_GET;

    unset($_POST['action']);
    unset($query['action']);

    Html::uriPost2Query($query);

    $url = $_SERVER['PHP_SELF'] . '?' . http_build_query($query);
    header('Location: //' . $_SERVER['SERVER_NAME'] . $url);
    exit;
}

$htmlTasks = new Tasks();

$htmlMachine = new Machine();
$htmlCities = new Cities();
$htmlUsers = new Users();
$htmlDivisions = new Divisions();
$htmlStatus = new Status();

$paginator = new \helpers\Paginator($htmlTasks->getItemCount());

?>
    <div class="py-4">

        <?php require '_filter.php'; ?>

        <ul class="list-group app-list-group mt-4 mb-5 ng-star-inserted">
            <?php
            $filteredItems = $htmlTasks->getFilteredItems();
            if ($filteredItems):
                foreach ($filteredItems as $item):
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
            <?php else:
                include '_nothing-found.php';
            endif; ?>
        </ul>

        <?php if ($filteredItems): ?>
            <div class="_ngcontent-svo">
                <nav class="ng-star-inserted">
                    <ul class="pagination ng-star-inserted">
                        <?php
                        foreach ($paginator->traverse() as $pgElemName => $pgElemData) {
                            switch ($pgElemName) {
                                case 'prev':
                                {
                                    $hDisabled = $pgElemData['active'] ? '' : 'disabled';
                                    $hLink = Html::encode($pgElemData['link']);
                                    echo '<li class="page-item ' . $hDisabled . '"><a class="page-link" href="' . $hLink . '"> &lt;&lt; </a></li>';
                                    break;
                                }
                                case 'next':
                                {
                                    $hDisabled = $pgElemData['active'] ? '' : 'disabled';
                                    $hLink = Html::encode($pgElemData['link']);
                                    echo '<li class="page-item ' . $hDisabled . '"><a class="page-link" href="' . $hLink . '"> &gt;&gt; </a></li>';
                                    break;
                                }
                                case 'button':
                                {
                                    $hDisabled = $pgElemData['active'] ? '' : 'disabled active';
                                    $hLink = Html::encode($pgElemData['link']);
                                    echo '<li class="page-item ng-star-inserted ' . $hDisabled . '"><a class="page-link" href="' . $hLink . '">' . $pgElemData['number'] . '</a></li>';
                                    break;
                                }
                                default:
                                {
                                    break;
                                }
                            }
                        }
                        ?>
                    </ul>

                    <div class="btn-group page-size-list order-first order-sm-last ng-star-inserted">
                        <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Выводить по
                            <strong><?= $_GET['p_size'] ?? 10 ?></strong> <span class="caret"></span></a>
                        <ul class="dropdown-menu" id="menu">
                            <li class="dropdown-item px-2"><a href="<?= Html::setGetValue('p_size', 10) ?>">Выводить по
                                    10</a></li>
                            <li class="dropdown-item px-2"><a href="<?= Html::setGetValue('p_size', 20) ?>">Выводить по
                                    20</a></li>
                            <li class="dropdown-item px-2"><a href="<?= Html::setGetValue('p_size', 50) ?>">Выводить по
                                    50</a></li>
                            <li class="dropdown-item px-2"><a href="<?= Html::setGetValue('p_size', 100) ?>">Выводить по
                                    100</a></li>
                            <li class="dropdown-item px-2"><a href="<?= Html::setGetValue('p_size', 200) ?>">Выводить по
                                    200</a></li>
                        </ul>
                    </div>

                </nav>
            </div>
        <?php endif; ?>

    </div>

<?php

include '_modal-add-task.php';

require_once __DIR__ . '/../html/footer.php';
