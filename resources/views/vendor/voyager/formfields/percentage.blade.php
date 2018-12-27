<div class="input-group">
	<input type="hidden" 
		   name="{{ $row->field }}"
	       data-name="{{ $row->display_name }}"
	       
	       value="@if(isset($dataTypeContent->{$row->field})){{ old($row->field, $dataTypeContent->{$row->field}) }}@else{{old($row->field)}}@endif">	

	<input type="number"
		   lang="en-150"
	       class="form-control"
	       data-for="{{ $row->field }}" 
	       type="number"
	       step="0.01"
	       min="0"
	       max="100"
	       @if($row->required == 1) required @endif
	       placeholder="{{ isset($options->placeholder)? old($row->field, $options->placeholder): $row->display_name }}"

	       value="@if(isset($dataTypeContent->{$row->field})){{ 100*old($row->field, $dataTypeContent->{$row->field}) }}@else{{old($row->field)}}@endif"


	       >


  <span class="input-group-addon">&#37;</span>
</div>

<script>
	window.onload = function () {
		$('[data-for="{{ $row->field }}"]').change(function() {
			$('[name="{{ $row->field }}"]').val($(this).val()/100);
		});
	}
</script>