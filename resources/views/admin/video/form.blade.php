<div class="form-group {{ $errors->has('nom') ? 'has-error' : ''}}">
    <label for="nom" class="control-label">{{ 'Nom' }}</label>
    <input class="form-control" name="nom" type="text" id="nom" value="{{ isset($video->nom) ? $video->nom : ''}}">
    {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea"
        id="description">{{ isset($video->description) ? $video->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('video') ? 'has-error' : ''}}">
    <label for="video" class="control-label">{{ 'video' }}</label>
    <input class="form-control" name="video" type="file" id="video" accept="video/*"
        value="{{ isset($video->video) ? $video->video : ''}}">
    {!! $errors->first('video', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('minute') ? 'has-error' : ''}}">
    <label for="minute" class="control-label">{{ 'Minute' }}</label>
    <input class="form-control" name="minute" type="number" id="minute"
        value="{{ isset($video->minute) ? $video->minute : ''}}">
    {!! $errors->first('minute', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('categorie_id') ? 'has-error' : ''}}">
    <label for="categorie_id" class="control-label">{{ 'Category Id' }}</label>

    <select class="form-control" name="categorie_id" id="categorie_id" required>
        <option value="" disabled selected>Selectionner une categorie</option>
        @foreach($categories as $item)
        <option @if(isset($video->categorie_id) && $video->categorie_id == $item->id)
            selected
            @endif value=" {{ $item->id }}">{{$item->nom}}</option>
        @endforeach
    </select>
    {!! $errors->first('categorie_id', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>