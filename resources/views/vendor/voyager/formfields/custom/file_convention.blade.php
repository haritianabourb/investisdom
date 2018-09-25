@include('voyager::formfields.file')
@isset($dataTypeRows)
<a type="button" href="{{ route('admin.cgps.generate-convention', ['cgp' => $dataTypeContent]) }}" class="btn btn-default generate-pdf-convention col-md-4"><i class="voyager-documentation"></i> generer la convention</a>
@endisset

{{-- @dd($row, $options, $dataType, $dataTypeContent) --}}
