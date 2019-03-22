@if (!ends_with($action, ['ViewAction', 'EditAction', 'DeleteAction']))
    @php $action = new $action($dataType, $dataTypeContent); @endphp
    @if ($action->shouldActionDisplayOnDataType())
        @can($action->getPolicy(), $dataTypeContent)
            <a href="{{ $action->getRoute($dataType->name) }}"
               title="{{ $action->getTitle() }}" {!! $action->convertAttributesToHtml() !!}>
                <i class="{{ $action->getIcon() }}"></i> <span
                        class="hidden-xs hidden-sm">{!! $action->getTitle() !!}</span>
            </a>
        @endcan
    @endif
    @if(ends_with(get_class($action), ['YousignAction']) && $action->getYousignValidation() !== true)
        <br>
        @if($action->getYousignValidation() === false)
            <span class="text-danger"><i class="icon voyager-warning"></i>
              @lang("error.yousign.missing_big_problem")
            </span>
        @else
            <span class="text-warning"><i class="icon voyager-warning"></i>
                @lang("error.yousign.missing_fields") -
                @php($messages = $action->getYousignValidation())
                @foreach($messages as $key => $values)
                    @php($dataType = \TCG\Voyager\Models\DataType::where('name', $key)->first())
                    {{$dataType->display_name_singular}} :
                    @foreach($values as $k => $v)
                        {{$dataType->rows->pluck('display_name', 'field')->get($k)}}
                        @if(!$loop->last),@endif
                    @endforeach
                    @if($loop->last) . @else ; @endif
                @endforeach
            </span>
        @endif
        <br/>
    @endif
@endif
