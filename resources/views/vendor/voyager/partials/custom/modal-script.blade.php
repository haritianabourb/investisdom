{{-- {{dd($row, $dataTypeContent, $relationshipDataType, $dataTypeContent->{$row->field})}} --}}
<!-- DataTables -->
<script>
    $(document).on('click', '#modal_{{$relationshipDataType->name}}', function (e) {
  // $('#add_form').action = '{{ route('voyager.contacts.create') }}';
  $('#add_form_{{$relationshipDataType->name}}')[0].reset();
        $('#add_{{$relationshipDataType->name}}_modal').modal('show');
});

$('#add_form_{{$relationshipDataType->name}}').submit(function(e) {
  e.preventDefault();
  var formdata = $(this).serializeArray();
  var data = {};
  $(formdata).each(function(index, obj){
    data[obj.name] = obj.value;
  });
  console.log(data);

  $.ajax({
    type: "POST",
    url: "/admin/{{$relationshipDataType->slug}}",
    data: data,
    success: function (response) {
      if(response.success){
        // ok is success
        // create the new options
        var newOption = new Option(response.data.{{$options->relationship->label}}, response.data.{{$options->relationship->key}}, true, true);

        $('[name="{{$row->field}}@if(str_is("select_multiple", $row->type))[]@endif"]').append(newOption).trigger('change');

        $('#add_{{$relationshipDataType->name}}_modal').modal('hide');
      }
    },

    error: function(response) {
      console.log(response);
    }

    });
});

    $(document).on('click', '.add-confirm', function(e){
        $(this).parents('form').find(':submit').click();
    });
</script>
