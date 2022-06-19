@extends('layouts.app')

@section('title', 'Page Title')



@section('content')



<div class="col-lg-12">
    <div class="mb-3">
        <p><span class="font-weight-semibold">Informacje o systemie</span></p>
        <pre id="html_editor" data-fouc>
            @php echo $systeminfo @endphp
        </pre>
    </div>

</div>



@endsection
