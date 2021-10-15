<div class="form-group {{ $errors->has('commentaire') ? 'has-error' : ''}}">
    <label for="commentaire" class="control-label">{{ 'Commentaire' }}</label>
    <textarea class="form-control" rows="5" name="commentaire" type="textarea" id="commentaire" >{{ isset($commentaire->commentaire) ? $commentaire->commentaire : ''}}</textarea>
    {!! $errors->first('commentaire', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phase_id') ? 'has-error' : ''}}">
    <label for="phase_id" class="control-label">{{ 'Phase Id' }}</label>
    <input class="form-control" name="phase_id" type="number" id="phase_id" value="{{ isset($commentaire->phase_id) ? $commentaire->phase_id : ''}}" >
    {!! $errors->first('phase_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" value="{{ isset($commentaire->user_id) ? $commentaire->user_id : ''}}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
