<div class="form-group {{ $errors->has('nom') ? 'has-error' : ''}}">
    <label for="nom" class="control-label">{{ 'Nom' }}</label>
    <input class="form-control" name="nom" type="text" id="nom"
        value="{{ isset($categorie->nom) ? $categorie->nom : ''}}">
    {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <textarea class="form-control" rows="5" name="description" type="textarea"
        id="description">{{ isset($categorie->description) ? $categorie->description : ''}}</textarea>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Image' }}</label>
    <input class="form-control" name="image" type="file" id="image" accept="image/*"
        value="{{ isset($categorie->image) ? $categorie->image : ''}}">
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('type_category_id') ? 'has-error' : ''}}">
    <label for="type_category_id" class="control-label">{{ 'Type Id' }}</label>

    <select class="form-control" name="type_category_id" id="type_category_id" required>
        <option value="" disabled selected>Selectionner un type categorie</option>
        @foreach($type_categories as $item)
        <option @if(isset($categorie->type_category_id) && $categorie->type_category_id == $item->id)
            selected
            @endif value=" {{ $item->id }}">{{$item->nom}}</option>
        @endforeach
    </select>
    {!! $errors->first('type_category_id', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>