<div class="row">
    <div class="col-md-6 form-group {{ $errors->has('created_id') ? 'has-error' : ''}}" hidden>
        <label for="created_id" class="control-label">{{ 'Created Id' }}</label>
        <input class="form-control" name="created_id" type="number" id="created_id" readonly value="{{ Auth::user()->id }}" >
        {!! $errors->first('created_id', '<p class="help-block">:message</p>') !!}
    </div>
    @if (isset($id))
            <div class="col-md-6 form-group {{ $errors->has('formation_id') ? 'has-error' : ''}}" hidden>
                <label for="formation_id" class="control-label">{{ 'Formation' }}</label>
                <input readonly class="form-control" name="formation_id" type="text" id="formation_id" value="{{ $id }}" >
                {!! $errors->first('formation_id', '<p class="help-block">:message</p>') !!}
            </div>
        @else
            <div class="col-md-6 form-group {{ $errors->has('formation_id') ? 'has-error' : ''}}">
                <label for="formation_id" class="control-label">{{ 'Formation' }}</label>
                <select class="form-control" name="formation_id" id="formation_id" required>
                    <option value="" disabled selected>Selectionner une formation</option>
                    @foreach($formation as $item)
                    <option

                    @if(isset($cour->formation_id) && $cour->formation_id == $item->id)
                        selected
                    @endif value=" {{ $item->id }}">{{$item->nom}}</option>
                    @endforeach
                </select>
                {!! $errors->first('formation_id', '<p class="help-block">:message</p>') !!}
            </div>
        @endif
    <div class="col-md-6 form-group {{ $errors->has('nom') ? 'has-error' : ''}}">
        <label for="nom" class="control-label">{{ 'Nom' }}</label>
        <input class="form-control" name="nom" type="text" id="nom" value="{{ isset($cour->nom) ? $cour->nom : ''}}" >
        {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6 form-group {{ $errors->has('temps') ? 'has-error' : ''}}">
        <label for="temps" class="control-label">{{ 'Temps' }} <i>(minutes)</i></label>
        <input class="form-control" name="temps" type="number" id="temps" value="{{ isset($cour->temps) ? $cour->temps : ''}}" >
        {!! $errors->first('temps', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="col-md-6 form-group {{ $errors->has('numero') ? 'has-error' : ''}}">
        <label for="numero" class="control-label">{{ 'Numero' }}</label>
        <input class="form-control" name="numero" type="number" id="numero" value="{{ isset($cour->numero) ? $cour->numero : ''}}" >
        {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
    </div>

    <div class="col-md-6 form-group {{ $errors->has('activated') ? 'has-error' : ''}}">
        <label for="activated" class="control-label">{{ 'Activated' }}</label>
        <div class="row col-3 ">
            <div class="radio col-6">
                <label><input name="activated" type="radio" value="1"
                        {{ (isset($cour) && 1 == $cour->activated) ? 'checked' : '' }}> Yes</label>
            </div>
            <div class="radio col-6">
                <label><input name="activated" type="radio" value="0" @if (isset($cour))
                        {{ (0 == $cour->activated) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
            </div>
        </div>
        <div>
            {!! $errors->first('activated', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="col-md-6 form-group">
        <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
    </div>

</div>
