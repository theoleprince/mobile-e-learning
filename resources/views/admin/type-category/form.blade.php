<div class="form-group {{ $errors->has('nom') ? 'has-error' : ''}}">
    <label for="nom" class="control-label">{{ 'Nom' }} <span class="text-red">*</span></label>
    <input class="form-control" name="nom" type="text" id="nom"
        value="{{ isset($type_categorie->nom) ? $type_categorie->nom : ''}}">
    {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }} <span class="text-red">*</span></label>
    <textarea class="form-control" rows="5" name="description" type="textarea"
        id="description">{{ isset($type_categorie->description) ? $type_categorie->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
