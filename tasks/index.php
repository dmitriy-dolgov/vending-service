<?php

require_once __DIR__ . '/../html/header.php';
?>

    <form autocomplete="off" class="task-filters ng-untouched ng-pristine ng-invalid">
        <div class="row">
            <div class="col-xl-2 col-lg-3 col-sm-12 col-6">
                <h1 class="page-title">Все задачи (485)</h1>
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
                <input type="text" placeholder="Тип оборудования" class="form-control">
            </div>
            <div class="col-lg col-md-4 col-sm-6 order-lg-2 mt-sm-0 mt-2">
                <input type="text" placeholder="Город" class="form-control">
            </div>
            <div class="col-lg col-md-4 col-sm-12 order-lg-3 mt-md-0 mt-sm-3 mt-2">
                <input type="text" placeholder="Торговая точка" class="form-control">
            </div>
            <div class="col-lg col-sm-4 order-lg-4 mt-lg-0 mt-sm-3 mt-2">
                <input type="text" placeholder="Создатель" class="form-control">
            </div>
            <div class="col-lg col-sm-4 order-lg-5 mt-lg-0 mt-sm-3 mt-2">
                <input type="text" placeholder="Исполнитель" class="form-control">
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
                <input type="text" class="form-control" placeholder="Статус">
            </div>
        </div>
    </form>

<?php

require_once __DIR__ . '/../html/footer.php';
