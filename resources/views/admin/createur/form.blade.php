<div class="form-group {{ $errors->has('spetiality') ? 'has-error' : ''}}">
    <label for="spetiality" class="control-label">{{ 'spetiality' }}</label>
    <input class="form-control" name="spetiality" type="text" id="spetiality"
        value="{{ isset($createur->spetiality) ? $createur->spetiality : ''}}">
    {!! $errors->first('spetiality', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('etape') ? 'has-error' : ''}}">
    <label for="etape" class="control-label">{{ 'etape' }}</label>
    <input class="form-control" name="etape" type="number" id="etape"
        value="{{ isset($createur->etape) ? $createur->etape : ''}}">
    {!! $errors->first('etape', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea"
        id="description">{{ isset($createur->description) ? $createur->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('video') ? 'has-error' : ''}}">
    <label for="video" class="control-label">{{ 'video' }}</label>
    <input class="form-control" name="video" type="file" id="video" accept="video/*"
        value="{{ isset($createur->video) ? $createur->video : ''}}">
    {!! $errors->first('video', '<p class="help-block">:message</p>') !!}
</div>




<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>