<div class="form-group row">
    <label class="col-form-label col-lg-3">{{$label}}:</label>
    <div class="col-lg-8">

      <select class="custom-select" placeholder="" name="{{$type}}">                                                                                                  

        
        @forelse($options as $key => $option)
        <option value="{{ $key }}" @if($key == $selected) selected="selected" @endif>
            {{ $option }}
        </option>

    

    @empty
        {!! $slot !!}
    @endforelse
</select>

    </div>
</div>    
