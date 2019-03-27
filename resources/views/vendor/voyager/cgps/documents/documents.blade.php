@extends('voyager::master')

@section('page_title', __('voyager::generic.view').' '.$dataType->display_name_singular.": Documents")

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ __('voyager::generic.viewing') }} {{ ucfirst($dataType->display_name_singular)}} &nbsp;: Documents

    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered" style="padding-bottom:5px;">
                    <div class="panel-body" style="padding-top:10px;">
                        <!-- form start -->
                        @php($rows = $dataType->readRows->where('type', 'file'))
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Fichiers</th>
                                    </tr>

                                </thead>
                            @foreach($rows as $row)

                                <tr>
                                    <th>{{ $row->display_name  }}</th>
                                    <td>
                                    @if(json_decode($dataTypeContent->{$row->field}))
                                        @foreach(json_decode($dataTypeContent->{$row->field}) as $file)
                                            <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}">
                                                {{ $file->original_name ?: '' }}
                                            </a>
                                            <br/>
                                        @endforeach
                                    @else
                                            <form role="form"
                                                  class="form-edit-add"
                                                  id="{{$dataType->name}}_edit_add"
                                                  action="{{ route('admin.documents.cgp.store')}}"
                                                  method="POST" enctype="multipart/form-data">
                                            <input @if($row->required == 1 && !isset($dataTypeContent->{$row->field})) required @endif type="file" name="{{ $row->field }}[]" multiple="multiple">
                                        {{--<a href="{{ Storage::disk(config('voyager.storage.disk'))->url($row->field) ?: '' }}">--}}
                                            {{--{{ __('voyager::generic.download') }}--}}
                                        {{--</a>--}}
                                                <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                                                {{ csrf_field() }}
                                            </form>

                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

