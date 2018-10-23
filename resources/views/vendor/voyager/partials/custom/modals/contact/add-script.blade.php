<!-- DataTables -->
<script>
    $(document).on('click', '.add', function (e) {
  // $('#add_form').action = '{{ route('voyager.contacts.create') }}';
  $('#add_form')[0].reset();
        $('#add_contact_modal').modal('show');
});

$('#add_form').submit(function(e) {
  e.preventDefault();
  var formdata = $(this).serializeArray();
  var data = {};
  $(formdata).each(function(index, obj){
    data[obj.name] = obj.value;
  });
  console.log(data);

  $.ajax({
    type: "POST",
    url: "/admin/contacts",
    data: data,
    success: function (response) {
      console.log(response);
      $('[name={{$row->field}}] @if(array_has($options, "relationship"))optgroup[label=Relationship]@endif')
        .append($("<option></option>")
        .attr("value",response.data.id)
        .text(response.data.fistname)
        .prop('selected', true) );

      $('[name={{$row->field}}]').select2("destroy");
      $('[name={{$row->field}}]').select2();
      $('#add_contact_modal').modal('hide');
    },

    error: function() {
      alert("Une erreur est survenue. Veuillez vérifier vos données et réessayer.");
    }

    });
});

    $(document).on('click', '.add-confirm', function(e){
      // console.log($('#add_form'));
      // $('#add_contact_modal').modal('hide');
      if (!$('#add_form')[0].checkValidity()) {
          console.log("FORM HAS NOT BEEN VALIDATED");
          $('#add_form').find(':submit').click();
      }

      else {
        $('#add_form').find(':submit').click();
      }

    });
</script>
