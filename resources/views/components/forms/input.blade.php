<div class="form-group row">
    <label class="col-form-label col-lg-3">{{$label}}:</label>
    <div class="col-lg-8">
    <input type="text" class="form-control @error($type) is-invalid @enderror form-control-sm" 
        placeholder="{{$placeholder ?? ''}}" 
        name="{{$type}}" 
        value="{{ old("$type", $value ?? '' ) }}" {{$readonly ?? ''}}>
    @error($type)         
        <span class="invalid-feedback">
            {{ $message }}  
        </span>
    @enderror
    </div>
</div> 