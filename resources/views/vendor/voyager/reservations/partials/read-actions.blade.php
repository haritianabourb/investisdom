@if (!ends_with($action, ['ViewAction', 'EditAction', 'DeleteAction']))
  @php $action = new $action($dataType, $dataTypeContent); @endphp

  @if ($action->shouldActionDisplayOnDataType())
    @can($action->getPolicy(), $dataTypeContent)
      <a href="{{ $action->getRoute($dataType->name) }}" title="{{ $action->getTitle() }}" {!! $action->convertAttributesToHtml() !!}>
        <i class="{{ $action->getIcon() }}"></i> <span class="hidden-xs hidden-sm">{{ $action->getTitle() }}</span>
      </a>
    @endcan
  @endif
@endif
