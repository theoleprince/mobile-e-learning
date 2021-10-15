<div class="form-group {{ $errors->has('Reponse') ? 'has-error' : ''}}">
    <label for="Reponse" class="control-label">{{ 'Reponse' }}</label>
    <textarea class="form-control" rows="5" name="Reponse" type="textarea" id="Reponse" >{{ isset($reponseq->Reponse) ? $reponseq->Reponse : ''}}</textarea>
    {!! $errors->first('Reponse', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('note') ? 'has-error' : ''}}">
    <label for="note" class="control-label">{{ 'Note' }}</label>
    <input class="form-control" name="note" type="number" id="note" value="{{ isset($reponseq->note) ? $reponseq->note : ''}}" >
    {!! $errors->first('note', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('statut') ? 'has-error' : ''}}">
    <label for="statut" class="control-label">{{ 'Statut' }}</label>
    <select name="statut" class="form-control" id="statut" >
    @foreach (json_decode('{"Accept\u00e9":"Accept\u00e9","Rejet\u00e9":"Rejet\u00e9","En Attente":"En Attente"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($reponseq->statut) && $reponseq->statut == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('statut', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('finish') ? 'has-error' : ''}}">
    <label for="finish" class="control-label">{{ 'Finish' }}</label>
    <div class="radio">
    <label><input name="finish" type="radio" value="1" {{ (isset($reponseq) && 1 == $reponseq->finish) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="finish" type="radio" value="0" @if (isset($reponseq)) {{ (0 == $reponseq->finish) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('finish', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('question_id') ? 'has-error' : ''}}">
    <label for="question_id" class="control-label">{{ 'Question Id' }}</label>
    <input class="form-control" name="question_id" type="number" id="question_id" value="{{ isset($reponseq->question_id) ? $reponseq->question_id : ''}}" >
    {!! $errors->first('question_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has(' created_id') ? 'has-error' : ''}}">
    <label for=" created_id" class="control-label">{{ 'Ceated Id' }}</label>
    <input class="form-control" name=" created_id" type="number" id=" created_id" value="{{ isset($reponseq-> created_id) ? $reponseq-> created_id : ''}}" >
    {!! $errors->first(' created_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
