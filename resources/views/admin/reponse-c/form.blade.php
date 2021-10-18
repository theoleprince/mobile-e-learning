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
<div class="form-group {{ $errors->has('created_id') ? 'has-error' : ''}}" hidden>
    <label for="created_id" class="control-label">{{ 'Created Id' }}</label>
    <input class="form-control" name="created_id" readonly type="number" id="created_id" value="{{ Auth::user()->id }}" >
    {!! $errors->first('created_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
