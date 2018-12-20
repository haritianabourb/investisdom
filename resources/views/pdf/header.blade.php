@push('css')
<style>
    @page {
        header: page-header;
    }
    @page {
        margin-top: 120px;
    }
</style>
@endpush
<htmlpageheader name="page-header">
    <img src="{{ asset('images/logo2.jpg') }}" style="height: 80px" alt="logo">
</htmlpageheader>