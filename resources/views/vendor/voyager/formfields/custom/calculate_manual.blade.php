<div class="input-group">
    <span class="input-group-addon">
      <input type="checkbox" id="manual_{{$row->field}}" name="manual_{{$row->field}}" aria-label="Manual">
    </span>
    <input @if($row->required == 1) required @endif disabled type="text" class="form-control disabled" name="{{ $row->field }}"
      placeholder="{{ isset($options->placeholder)? old($row->field, $options->placeholder): $row->display_name }}"
      {!! isBreadSlugAutoGenerator($options) !!}
      value="@if(isset($dataTypeContent->{$row->field})){{ old($row->field, $dataTypeContent->{$row->field}) }}@elseif(isset($options->default)){{ old($row->field, $options->default) }}@else{{ old($row->field) }}@endif">
</div>


@isset($options->calculate)
  @if($options->calculate)
    @php($service = config("calculate.{$dataType->slug}.services.{$row->field}"))
    @php($fields = (new $service)->validationsFields())
    @php($queueFields = config("calculate.{$dataType->slug}.queues.{$row->field}"))
    @push('javascript')
      <script>
        @php($var_js = "")
        @foreach ($fields as $field_name)
          @php($var_js .= "[name=$field_name]".(!$loop->last?",":""))
        @endforeach
        $('{{$var_js}}').on("change", function(event){
          if($('#manual_{{$row->field}}').prop("checked")){
            event.preventDefault();
            return false;
          }
          $.getJSON("{{route("admin.mandat.".(!is_null($dataTypeContent->getKey()) ? 'edit' : 'api').".calculate", ["mandat" => $dataTypeContent->id, "field" => $row->field])}}",
            {
              @foreach ($fields as $field_name)
              "{{$field_name}}" : $('[name={{$field_name}}]').val() @if(!$loop->last || (!is_null($queueFields) && count($queueFields))),@endif
              @endforeach
              @if(!is_null($queueFields))
                @foreach ($queueFields as $field_name)
                "{{$field_name}}" : $('[name=manual_{{$field_name}}]').prop('checked')? $('[name={{$field_name}}]').val() : '',
                "manual_{{$field_name}}" : $('[name=manual_{{$field_name}}]').prop('checked') @if(!$loop->last),@endif
                @endforeach
              @endif
            },
            function(data) {
              if(typeof data.results.{{$row->field}} === 'object'){
                $("[name={{$row->field}}]").attr("value", 0);
                for(error_field in data.results.{{$row->field}}){
                  var errorMsg = "<span><strong>{{$row->display_name}}:</strong> "+error_field+"</span>";
                  errorMsg += "<ul>";
                  for(error_msg of data.results.{{$row->field}}[error_field]){
                    errorMsg += "<li>"+error_msg+"</li>";
                  }
                  errorMsg += "</ul>";
                }
                toastr.error(errorMsg);
              }else{
                toastr.info("{{$row->field}} = "+data.results.{{$row->field}});
                $("[name={{$row->field}}]").attr("value", data.results.{{$row->field}});
                $("[name={{$row->field}}]").text(data.results.{{$row->field}});
              }
            }
          );
        });
      </script>
    @endpush
  @endif
  @isset($options->manual)
    @if($options->manual)
      @push('javascript')
      <script>
        $('#manual_{{$row->field}}').on("change", function(){
          $("[name={{$row->field}}").attr('disabled', !this.checked);
        })
      </script>
      @endpush
    @endif
  @endisset
@endisset
