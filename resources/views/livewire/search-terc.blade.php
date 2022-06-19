<div class="form-group row">
        <label class="col-form-label col-lg-3">Obszar alarmowy:</label>
        <div class="col-lg-8">
            <select class="form-control @error('terc') is-invalid @enderror form-control-sm" id="terc" name="terc">
                <option value="">Wybierz Miasto</option>
                @foreach($terc as $item)
                @php 
                        if($provider){
                            if($provider->WOJ.'|'.$provider->POW.'|'.$provider->GMI.'|'.$provider->RODZ == $item->WOJ.'|'.$item->POW.'|'.$item->GMI.'|'.$item->RODZ ){
                                $selected = 'selected';
                            }
                            else{
                                $selected = '';
                            }
                        }else {
                            if(old('terc') == $item->WOJ.'|'.$item->POW.'|'.$item->GMI.'|'.$item->RODZ ){
                                $selected = 'selected';
                            }
                            else {
                                {
                                    $selected = '';   
                                }
                            }
                        }

                @endphp
                <option value="{{ $item->WOJ }}|{{ $item->POW }}|{{ $item->GMI }}|{{ $item->RODZ }}"  {{$selected}}>{{ $item->NAZWA }} ({{ $item->NAZDOD }}) woj. {{ $item->wojewodztwo }}</option>
                @endforeach
            </select>
            @error('terc') <span class="invalid-feedback">{{ $message }}</span>@enderror
        </div>
       
</div>



<script>
    $(document).ready(function () {
        $('#terc').select2();
    });
</script>


