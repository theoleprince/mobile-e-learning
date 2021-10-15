<div class="form-group {{ $errors->has('reponse') ? 'has-error' : ''}}">
    <label for="reponse" class="control-label">{{ 'Reponse' }}</label>
    <textarea class="form-control" rows="5" name="reponse" type="textarea" id="reponse" >{{ isset($reponsec->reponse) ? $reponsec->reponse : ''}}</textarea>
    {!! $errors->first('reponse', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('commentaire_id') ? 'has-error' : ''}}">
    <label for="commentaire_id" class="control-label">{{ 'Commentaire Id' }}</label>
    <input class="form-control" name="commentaire_id" type="number" id="commentaire_id" value="{{ isset($reponsec->commentaire_id) ? $reponsec->commentaire_id : ''}}" >
    {!! $errors->first('commentaire_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has(' created_id') ? 'has-error' : ''}}">
    <label for=" created_id" class="control-label">{{ 'Ceated Id' }}</label>
    <input class="form-control" name=" created_id" type="number" id=" created_id" value="{{ isset($reponsec-> created_id) ? $reponsec-> created_id : ''}}" >
    {!! $errors->first(' created_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
