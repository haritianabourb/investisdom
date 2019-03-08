@extends('voyager::master')
@php($contact = \App\Contact::ofUser(Auth::user())->first())

@section('css')
    <style>
        .user-email {
            font-size: .85rem;
            margin-bottom: 1.5em;
        }
    </style>
@stop

@section('content')
    <section>
        <div style="background-size:cover; background-image: url({{ Voyager::image( Voyager::setting('admin.bg_image'), config('voyager.assets_path') . '/images/bg.jpg') }}); background-position: center center;position:absolute; top:0; left:0; width:100%; height:300px;"></div>
        <div style="height:160px; display:block; width:100%"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="position:relative; z-index:9; text-align:center;">
                    <div class="media">
                        <div class="media-left media-middle">
                            <div class="panel">
                                <div class="panel-body">
                                <a href="#">
                                    <img src="@if( !filter_var(Auth::user()->avatar, FILTER_VALIDATE_URL)){{ Voyager::image( Auth::user()->avatar ) }}@else{{ Auth::user()->avatar }}@endif"
                                         class="media-object avatar"
                                         style="border-radius:50%; width:150px; height:150px; border:5px solid #fff;"
                                         alt="{{ Auth::user()->name }} avatar">
                                </a>
                                <p>{{ Auth::user()->bio }}</p>
                                <div class="user-email text-muted">{{ Auth::user()->email }}</div>
                                <a href="{{ route('voyager.users.edit', Auth::user()->id) }}" class="btn btn-primary">{{ __('voyager::profile.edit') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="media-body">
                            @isset($contact)
                            <h3 class="media-heading text-center">{{ ucwords($contact->full_name_civ) }}</h3>
                            <table class="table table-striped table-hover text-left">
                                <tbody>
                                <tr>
                                    <td>{{ucfirst(__('profile.contact.function'))}}</td>
                                    <td>{{$contact->function}}</td>
                                </tr>
                                <tr>
                                    <td>{{ucfirst(__('profile.contact.phone'))}}</td>
                                    <td>{{$contact->tel_fixe}}</td>
                                </tr>
                                <tr>
                                    <td>{{ucfirst(__('profile.contact.mobile_phone'))}}</td>
                                    <td>{{$contact->gsm}}</td>
                                </tr>
                                <tr>
                                    <td>{{ucfirst(__('profile.contact.fax'))}}</td>
                                    <td>{{$contact->fax}}</td>
                                </tr>
                                <tr>
                                    <td>{{ucfirst(__('profile.contact.email'))}}</td>
                                    <td><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></td>
                                </tr>
                                </tbody>
                            </table>
                            @endisset
                        </div>
                    </div>
                </div>
                <div class="col-md-8">

                </div>
            </div>
        </div>
    </section>
    <section>
        @foreach(Auth::user()->roles_all() as $role)
            @include("voyager::partials.profiles.{$role->name}")
        @endforeach
    </section>
@stop
