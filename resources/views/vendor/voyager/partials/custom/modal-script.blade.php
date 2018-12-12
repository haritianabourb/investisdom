<!-- Modal {{$relationshipDataType->name}} Scripting-->
<script>
  $(document).on('click', '#modal_{{$relationshipDataType->name}}', function (e) {
    $('#add_form_{{$relationshipDataType->name}}')[0].reset();
    $('#{{$relationshipDataType->name}}_edit_add').modal('show');
  });

  $('#add_form_{{$relationshipDataType->name}}').submit(function(e) {
    e.preventDefault();
    var $elem = $('#{{$dataType->name}}_edit_add');
    var formdata = $(this).serializeArray();
    var data = {};
    $(formdata).each(function(index, obj){
      data[obj.name] = obj.value;
    });

    $.ajax({
      type: "POST",
      url: "/admin/{{$relationshipDataType->slug}}",
      data: data,
      success: function (response) {
        if(response.success){
          var newOption = new Option(response.data.{{$options->relationship->label}}, response.data.{{$options->relationship->key}}, true, true);
          $('#'+$elem.prop('id')+' [name="{{$row->field}}@if(str_is("select_multiple", $row->type))[]@endif"]').append(newOption).trigger('change');
          $('#{{$relationshipDataType->name}}_edit_add').modal('hide');
        }else{
          toastr.error("error on form creation, we're on!");
          console.log(response);
        }
      },

      error: function(response) {
        toastr.error("error on serve, we're on!");
        console.log(response);
      }
    });
  });

</script>
<!-- End Modal {{$relationshipDataType->name}} Scripting-->
