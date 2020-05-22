<?php

require_once __DIR__ . '/../html/header.php';

use lib\items\Tasks;

?>

    <div class="py-4">

        <?php require '_filter.php'; ?>

        <ul class="list-group app-list-group mt-4 mb-5 ng-star-inserted">
            <?php foreach ((new Tasks())->getItems() as $item): ?>
                <li class="list-group-item ng-star-inserted">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-12 order-first">
                            <div class="machine-state ic_pause ng-star-inserted"
                                 ng-reflect-ng-class="machine-state,ic_pause" title="Простой"></div>
                            <div class="ng-star-inserted">
                                <div class="text-warning text-bold fsz-14">ИП Кудрин А.В.</div>
                                <div class="text-dark fsz-14">(ул. Ленина, 26, г. Оренбург)</div>
                                <div class="fsz-12">NESCAFÉ ALEGRIA 1060</div>
                            </div>
                        </div>
                        <div class="col-xl col-md-3 col-6 order-xl-2 order-md-4">
                            <div class="item-heading fsz-9 text-nowrap">Дата</div>
                            <div class="text-dark fsz-12"> 20.05.2020<br>
                                19:58:57
                            </div>
                        </div>
                        <div class="col-xl col-md-3 col-6 order-xl-3 order-md-5">
                            <div class="item-heading fsz-9 text-nowrap">Создатель</div>
                            <div class="fsz-12">
                                <span class="text-dark ng-star-inserted">Рустам Орск</span></div>
                        </div>
                        <div class="col-xl col-md-3 col-6 order-xl-4 order-md-6">
                            <div class="item-heading fsz-9 text-nowrap">Исполнитель</div>
                            <div class="fsz-12">
                                <span class="text-dark ng-star-inserted">Рустам Орск</span></div>
                        </div>
                        <div class="col-xl col-md-3 col-6 order-xl-5 order-md-2">
                            <div class="item-heading fsz-9 text-nowrap">Статус</div>
                            <div class="text-dark fsz-12">Удалено</div>
                        </div>
                        <div class="col-xl col-md-3 col-6 order-xl-6 order-md-7">
                            <div class="item-heading fsz-9 text-nowrap">&nbsp;</div>
                            <div class="text-dark fsz-12">ТО-0, ТО-2</div>
                        </div>
                        <div class="col-xl col-md-3 col-6 order-xl-7 order-md-3">
                            <div class="app-list-item-actions">
                                <button class="mx-2 mat-icon-button" mat-icon-button=""><span
                                            class="mat-button-wrapper"><app-icon class="app-icon"
                                                                                 name="ic_edit" _nghost-hvh-c1=""
                                                                                 ng-reflect-size="32"
                                                                                 ng-reflect-name="ic_edit"
                                                                                 style="background-image: url(&quot;ic_edit.png&quot;); min-height: 32px; min-width: 32px; height: 32px; width: 32px;"></app-icon></span>
                                    <div class="mat-button-ripple mat-ripple mat-button-ripple-round" matripple=""
                                         ng-reflect-centered="true" ng-reflect-disabled="false"
                                         ng-reflect-trigger="[object HTMLButtonElement]"></div>
                                    <div class="mat-button-focus-overlay"></div>
                                </button>
                                <button class="mx-2 mat-icon-button" mat-icon-button=""><span
                                            class="mat-button-wrapper"><app-icon class="app-icon"
                                                                                 name="ic_delete" _nghost-hvh-c1=""
                                                                                 ng-reflect-size="32"
                                                                                 ng-reflect-name="ic_delete"
                                                                                 style="background-image: url(&quot;ic_delete.png&quot;); min-height: 32px; min-width: 32px; height: 32px; width: 32px;"></app-icon></span>
                                    <div class="mat-button-ripple mat-ripple mat-button-ripple-round" matripple=""
                                         ng-reflect-centered="true" ng-reflect-disabled="false"
                                         ng-reflect-trigger="[object HTMLButtonElement]"></div>
                                    <div class="mat-button-focus-overlay"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

    </div>

<?php

require_once __DIR__ . '/../html/footer.php';
