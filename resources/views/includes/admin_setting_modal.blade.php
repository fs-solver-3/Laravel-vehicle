 <div class="modal settings-filter-column fade" id="settingModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn popup-content">
            <div class="modal-header">
                <div class="pull-left">
                    <h4 class="modal-title">@lang('global.app_column_setting')</h4>
                </div>
                <div class="pull-right d-flex">
                    <button type="button" class="section-button--yellow mr-3" id="select_all_filters">@lang('global.app_select_all')</button>
                    <button type="button" class="section-button--gray" id="remove_all_filters">@lang('global.app_deselect_all')</button>
                </div>
                {{-- <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small> --}}
            </div>
            <div class="modal-body clearfix" id="settings-dropdown-menu">
            </div>
            <div class="modal-footer">
                <div class="pull-left d-flex">
                    <button class="section-button--yellow mr-3" id="apply_filters" data-dismiss="modal">@lang('global.app_apply')</button>
                    <button class="section-button--gray " id="close_modal" data-dismiss="modal">@lang('global.app_cancel')</button>
                </div>
            </div>
        </div>
    </div>
</div>