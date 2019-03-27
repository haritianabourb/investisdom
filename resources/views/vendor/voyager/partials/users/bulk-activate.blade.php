<a class="btn btn-info" id="bulk_activate_btn" style="margin-top: 2px;"><i class="voyager-people"></i> <span>{{ __('generic.bulk_activate') }}</span></a>

{{-- Bulk Activate modal --}}
<div class="modal modal-info fade" tabindex="-1" id="bulk_activate_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">
                    <i class="voyager-info"></i> {{ __('generic.are_you_sure_activate') }} <span id="bulk_activate_count"></span> <span id="bulk_activate_display_name"></span>?
                </h4>
            </div>
            <div class="modal-body" id="bulk_activate_modal_body">
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.'.$dataType->slug.'.activate', ["id" => 0])}}" id="bulk_activate_form" method="POST">
                    {{ method_field("PUT") }}
                    {{ csrf_field() }}
                    <input type="hidden" name="ids" id="bulk_activate_input" value="">
                    <input type="hidden" name="activate" id="bulk_activate_input" value="activate">
                    <input type="submit" class="btn btn-info pull-right activate-confirm"
                             value="{{ __('generic.bulk_activate_confirm') }} {{ strtolower($dataType->display_name_plural) }}">
                </form>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">
                    {{ __('generic.cancel') }}
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
window.addEventListener('load' ,  function () {
    // Bulk Activate selectors
    var $bulkActivateBtn = $('#bulk_activate_btn');
    var $bulkActivateModal = $('#bulk_activate_modal');
    var $bulkActivateCount = $('#bulk_activate_count');
    var $bulkActivateDisplayName = $('#bulk_activate_display_name');
    var $bulkActivateInput = $('#bulk_activate_input');
    // Reposition modal to prevent z-index issues
    $bulkActivateModal.appendTo('body');
    // Bulk Activate listener
    $bulkActivateBtn.click(function () {
        var ids = [];
        var $checkedBoxes = $('#dataTable input[type=checkbox]:checked').not('.select_all');
        var count = $checkedBoxes.length;
        if (count) {
            // Reset input value
            $bulkActivateInput.val('');
            // Activation info
            var displayName = count > 1 ? '{{ $dataType->display_name_plural }}' : '{{ $dataType->display_name_singular }}';
            displayName = displayName.toLowerCase();
            $bulkActivateCount.html(count);
            $bulkActivateDisplayName.html(displayName);
            // Gather IDs
            $.each($checkedBoxes, function () {
                var value = $(this).val();
                ids.push(value);
            })
            // Set input value
            $bulkActivateInput.val(ids);
            // Show modal
            $bulkActivateModal.modal('show');
        } else {
            // No row selected
            toastr.warning('{{ __('generic.bulk_activate_nothing') }}');
        }
    });
});
</script>
