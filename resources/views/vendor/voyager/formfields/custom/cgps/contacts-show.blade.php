@if(empty($selected_values))
    <p>No results</p>
@else
    <div class="row">
        @foreach($selected_values as $selected_value)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                @include('voyager::partials.contact', ['contact' => $selected_value])
            </div>
        @endforeach
    </div>
@endif