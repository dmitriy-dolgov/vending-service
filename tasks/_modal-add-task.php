<div id="modal-add-task" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="dialog-header">
                    <h4 class="heading color-gray">Новая задача</h4>
                    <button type="button" class="close" data-dismiss="modal"></button>
                </div>
            </div>

            <mat-dialog-content class="mat-dialog-content">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group">
                            <div class="app-autocomplete"><input class="form-control ng-untouched ng-pristine ng-valid"
                                                                 formcontrolname="machineType"
                                                                 placeholder="Тип оборудования" spellcheck="false"
                                                                 type="text" ng-reflect-autocomplete="[object Object]"
                                                                 ng-reflect-name="machineType" autocomplete="off"
                                                                 role="combobox" aria-autocomplete="list"
                                                                 aria-expanded="false" aria-haspopup="true">
                                <button class=" btn btn-control-reset" tabindex="-1" type="button"></button>
                                <button class="btn btn-show-autocomplete-panel" tabindex="-1" type="button"><i
                                        class="form-control-arrow"></i></button>
                                <mat-autocomplete class="mat-autocomplete"><!----></mat-autocomplete>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group">
                            <div class="app-autocomplete"><input autocomplete="off"
                                                                 class="form-control ng-untouched ng-pristine ng-valid"
                                                                 formcontrolname="city" placeholder="Город"
                                                                 spellcheck="false" type="text"
                                                                 ng-reflect-autocomplete="[object Object]"
                                                                 ng-reflect-autocomplete-attribute="off"
                                                                 ng-reflect-name="city" role="combobox"
                                                                 aria-autocomplete="list" aria-expanded="false"
                                                                 aria-haspopup="true">
                                <button class=" btn btn-control-reset" tabindex="-1" type="button"></button>
                                <button class="btn btn-show-autocomplete-panel" tabindex="-1" type="button"><i
                                        class="form-control-arrow"></i></button>
                                <mat-autocomplete class="mat-autocomplete"><!----></mat-autocomplete>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group">
                            <div class="app-autocomplete"><input
                                    class="form-control ng-untouched ng-pristine ng-invalid"
                                    formcontrolname="worker" placeholder="Назначить исполнителя" spellcheck="false"
                                    type="text" ng-reflect-autocomplete="[object Object]" ng-reflect-name="worker"
                                    autocomplete="off" role="combobox" aria-autocomplete="list"
                                    aria-expanded="false" aria-haspopup="true">
                                <button class=" btn btn-control-reset" tabindex="-1" type="button"></button>
                                <button class="btn btn-show-autocomplete-panel" tabindex="-1" type="button"><i
                                        class="form-control-arrow"></i></button>
                                <mat-autocomplete class="mat-autocomplete"><!----></mat-autocomplete>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="form-group">
                            <mat-form-field
                                class="mat-form-field-datepicker mat-form-field ng-tns-c16-9 mat-primary mat-form-field-type-mat-input mat-form-field-appearance-legacy mat-form-field-can-float mat-form-field-should-float mat-form-field-hide-placeholder ng-untouched ng-pristine ng-valid">
                                <div class="mat-form-field-wrapper">
                                    <div class="mat-form-field-flex">
                                        <div class="mat-form-field-infix"><input
                                                class="form-control datepicker-form-control mat-input-element mat-form-field-autofill-control cdk-text-field-autofill-monitored ng-untouched ng-pristine ng-valid"
                                                matinput="" ng-reflect-mat-datepicker="[object Object]"
                                                ng-reflect-form="[object Object]" ng-reflect-readonly="true"
                                                aria-haspopup="true" id="mat-input-5" readonly="true"
                                                aria-invalid="false" aria-required="false">
                                            <mat-datepicker _ngcontent-ijq-c21=""></mat-datepicker>
                                            <i class="form-control-arrow"></i><input formcontrolname="datetime"
                                                                                     type="hidden" value=""
                                                                                     ng-reflect-name="datetime"
                                                                                     class="ng-untouched ng-pristine ng-valid"><span
                                                class="mat-form-field-label-wrapper"></span></div>
                                    </div><div class="mat-form-field-underline ng-tns-c16-9 ng-star-inserted" style=""><span
                                            class="mat-form-field-ripple"></span></div>
                                    <div class="mat-form-field-subscript-wrapper" ng-reflect-ng-switch="hint"><div class="mat-form-field-hint-wrapper ng-tns-c16-9 ng-trigger ng-trigger-transitionMessages ng-star-inserted"
                                                                                                                   style="opacity: 1; transform: translateY(0%);"><div class="mat-form-field-hint-spacer"></div>
                                        </div>
                                    </div>
                                </div>
                            </mat-form-field>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <div class="app-autocomplete"><input class="form-control ng-untouched ng-pristine"
                                                                 formcontrolname="division" placeholder="Торговая точка"
                                                                 spellcheck="false" type="text"
                                                                 ng-reflect-autocomplete="[object Object]" disabled=""
                                                                 ng-reflect-name="division" autocomplete="off"
                                                                 role="combobox" aria-autocomplete="list"
                                                                 aria-expanded="false" aria-haspopup="true">
                                <button class="btn btn-control-reset" tabindex="-1" type="button"></button>
                                <button class="btn btn-show-autocomplete-panel" tabindex="-1" type="button" disabled="">
                                    <i class="form-control-arrow"></i></button>
                                <mat-autocomplete class="mat-autocomplete"
                                                  ng-reflect-display-with="autocompleteDisplayWithDivisio">
                                </mat-autocomplete>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="form-group">
                            <div class="app-autocomplete"><input
                                    class="form-control ng-untouched ng-pristine ng-invalid"
                                    formcontrolname="machine" placeholder="Добавить оборудование" spellcheck="false"
                                    type="text" ng-reflect-autocomplete="[object Object]" ng-reflect-name="machine"
                                    autocomplete="off" role="combobox" aria-autocomplete="list"
                                    aria-expanded="false" aria-haspopup="true">
                                <button class=" btn btn-control-reset" tabindex="-1" type="button"></button>
                                <button class="btn btn-show-autocomplete-panel" tabindex="-1" type="button"><i
                                        class="form-control-arrow"></i></button>
                                <mat-autocomplete class="mat-autocomplete"
                                                  ng-reflect-display-with="autocompleteDisplayWithMachine">
                                </mat-autocomplete>
                            </div>
                        </div>
                    </div>
                </div>
            </mat-dialog-content>
        </div>
    </div>
</div>
