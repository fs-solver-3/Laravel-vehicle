 <div class="modal inmodal settings-column" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <div class="pull-left">
                    <h4 class="modal-title">@lang('global.app_column_setting')</h4>
                </div>
                <div class="pull-right d-flex">
                    <button type="button" class="section-button--yellow mr-1" id="select_all_column">@lang('global.app_select_all')</button>
                    <button type="button" class="section-button--gray " id="remove_all_column">@lang('global.app_deselect_all')</button>
                </div>
                {{-- <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small> --}}
            </div>
            <div class="modal-body clearfix" id="controls-dropdown-menu">
            </div>
            <div class="modal-footer">
                <div class="pull-left d-flex">
                    <button class="section-button--yellow w-100px mr-3" data-dismiss="modal" id="apply_columns">@lang('global.app_apply')</button>
                    <button class="section-button--gray w-100px mr-3" data-dismiss="modal">@lang('global.app_cancel')</button>
                </div>
            </div>
        </div>
    </div>
</div>