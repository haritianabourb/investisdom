@if(empty($selected_values))
    <p>No results</p>
@else
    <ul>
        @foreach($selected_values as $selected_value)
            <li>{{ $selected_value }}</li>
        @endforeach
    </ul>
@endif