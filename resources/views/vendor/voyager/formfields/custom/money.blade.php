<div class="input-group">
	<input type="number"
		   lang="en-150"
	       class="form-control"
	       name="{{ $row->field }}"
	       data-name="{{ $row->display_name }}"
	       type="number"
	       step="0.01"
	       @if($row->required == 1) required @endif
	             step="any"
	       placeholder="{{ isset($options->placeholder)? old($row->field, $options->placeholder): $row->display_name }}"
	       value="@if(isset($dataTypeContent->{$row->field})){{ old($row->field, $dataTypeContent->{$row->field}) }}@else{{old($row->field)}}@endif">
  <span class="input-group-addon">€</span>
</div>