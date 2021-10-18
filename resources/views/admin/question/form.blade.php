<div class="form-group {{ $errors->has('question') ? 'has-error' : ''}}">
    <label for="question" class="control-label">{{ 'Question' }}</label>
    <textarea class="form-control" rows="5" name="question" type="textarea" id="question" >{{ isset($question->question) ? $question->question : ''}}</textarea>
    {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nbre_point') ? 'has-error' : ''}}">
    <label for="nbre_point" class="control-label">{{ 'Nbre Point' }}</label>
    <input class="form-control" name="nbre_point" type="number" id="nbre_point" value="{{ isset($question->nbre_point) ? $question->nbre_point : ''}}" >
    {!! $errors->first('nbre_point', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cours_id') ? 'has-error' : ''}}">
    <label for="cours_id" class="control-label">{{ 'Cours Id' }}</label>
    <input class="form-control" name="cours_id" type="number" id="cours_id" value="{{ isset($question->cours_id) ? $question->cours_id : ''}}" >
    {!! $errors->first('cours_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('created_id') ? 'has-error' : ''}}">
    <label for="created_id" class="control-label">{{ 'Created Id' }}</label>
    <input class="form-control" name="created_id" type="number" id="created_id" value="{{ isset($question->created_id) ? $question->created_id : ''}}" >
    {!! $errors->first('created_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
