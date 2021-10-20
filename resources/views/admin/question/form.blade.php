<div class="form-group {{ $errors->has('question') ? 'has-error' : ''}}">
    <label for="question" class="control-label">{{ 'Question' }}</label>
    <textarea class="form-control" rows="5" name="question" type="textarea" id="question" >{{ isset($question->question) ? $question->question : ''}}</textarea>
    {!! $errors->first('question', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nbre_point') ? 'has-error' : ''}}">
    <label for="nbre_point" class="control-label">{{ 'Nbre Point' }}</label>
    <input class="form-control" name="nbre_point" type="number" id="nbre_point" max="20" value="{{ isset($question->nbre_point) ? $question->nbre_point : ''}}" >
    {!! $errors->first('nbre_point', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('cours_id') ? 'has-error' : ''}}">
    <label for="cours_id" class="control-label">{{ 'Cours Concerné' }}</label>
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
    <input class="form-control" name="created_id" type="number" id="created_id" value="{{ Auth::user()->id }}" readonly>
    {!! $errors->first('created_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
