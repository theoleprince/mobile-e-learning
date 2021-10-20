<div class="form-group {{ $errors->has('titre') ? 'has-error' : ''}}">
    <label for="titre" class="control-label">{{ 'Titre' }}</label>
    <input class="form-control" name="titre" type="text" id="titre" value="{{ isset($phase->titre) ? $phase->titre : ''}}" >
    {!! $errors->first('titre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('video') ? 'has-error' : ''}}">
    <label for="video" class="control-label">{{ 'Video' }}</label>
    <input class="form-control" name="video" type="file" accept="video/*" id="video" value="{{ isset($phase->video) ? $phase->video : ''}}" >
    {!! $errors->first('video', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('numero') ? 'has-error' : ''}}">
    <label for="numero" class="control-label">{{ 'Numero' }}</label>
    <input class="form-control" name="numero" type="number" id="numero" value="{{ isset($phase->numero) ? $phase->numero : ''}}" >
    {!! $errors->first('numero', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('temps') ? 'has-error' : ''}}">
    <label for="temps" class="control-label">{{ 'Temps' }}</label>
    <input class="form-control" name="temps" type="number" id="temps" value="{{ isset($phase->temps) ? $phase->temps : ''}}" >
    {!! $errors->first('temps', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('activated') ? 'has-error' : ''}}">
    <label for="activated" class="control-label">{{ 'Activated' }}</label>
    <div class="radio">
    <label style='visibility:hidden;display:none'><input name="activated" type="radio" value="1" {{ (isset($phase) && 1 == $phase->activated) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="activated" type="radio" value="0" @if (isset($phase)) {{ (0 == $phase->activated) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('activated', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('finish') ? 'has-error' : ''}}">
    <label for="finish" class="control-label">{{ 'Finish' }}</label>
    <div class="radio">
    <label style='visibility:hidden;display:none'><input name="finish" type="radio" value="1" {{ (isset($phase) && 1 == $phase->finish) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="finish" type="radio" value="0" @if (isset($phase)) {{ (0 == $phase->finish) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('finish', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cours_id') ? 'has-error' : ''}}">
    <label for="cours_id" class="control-label">{{ 'Cours' }}</label>
    <select class="form-control" name="cours_id" id="cours_id" required>
        <option value="" disabled selected>Selectionner un cours</option>
        @foreach($cour as $item)
        <option

        @if(isset($cour->cours_id) && $cour->cours_id == $item->id)
            selected
        @endif value=" {{ $item->id }}">{{$item->nom}}</option>
        @endforeach
    </select>
    {!! $errors->first('cours_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('created_id') ? 'has-error' : ''}}" hidden>
    <label for="created_id" class="control-label">{{ 'Created Id' }}</label>
    <input class="form-control" readonly name="created_id" type="number" id="created_id" value="{{ Auth::user()->id }}" >
    {!! $errors->first('created_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
