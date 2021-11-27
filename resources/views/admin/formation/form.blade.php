<div class="form-group {{ $errors->has('nom') ? 'has-error' : ''}}">
    <label for="nom" class="control-label">{{ 'Nom' }}</label>
    <input class="form-control" name="nom" type="text" id="nom"
        value="{{ isset($formation->nom) ? $formation->nom : ''}}">
    {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea"
        id="description">{{ isset($formation->description) ? $formation->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
@if(Auth::user()->hasRole(['administrator','superadministrator']))
<div class="form-group {{ $errors->has('activated') ? 'has-error' : ''}}">
    <label for="activated" class="control-label">{{ 'Activated' }}</label>
    <div class="row col-3 ">
        <div class="radio col-6">
            <label><input name="activated" type="radio" value="1"
                    {{ (isset($formation) && 1 == $formation->activated) ? 'checked' : '' }}> Yes</label>
        </div>
        <div class="radio col-6">
            <label><input name="activated" type="radio" value="0" @if (isset($formation))
                    {{ (0 == $formation->activated) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
        </div>
    </div>
    <div>
        {!! $errors->first('activated', '<p class="help-block">:message</p>') !!}
    </div>
</div>
@endif


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
