<div class="form-group {{ $errors->has('commentaire') ? 'has-error' : ''}}">
    <label for="commentaire" class="control-label">{{ 'Commentaire' }}</label>
    <textarea class="form-control" rows="5" name="commentaire" type="textarea" id="commentaire" >{{ isset($commentaire->commentaire) ? $commentaire->commentaire : ''}}</textarea>
    {!! $errors->first('commentaire', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('phase_id') ? 'has-error' : ''}}">
    <label for="phase_id" class="control-label">{{ 'Phase Id' }}</label>

    <select class="form-control" name="phase_id" id="phase_id" required>
        <option value="" disabled selected>Selectionner une phase</option>
        @foreach($phase as $item)
        <option

        @if(isset($commentaire->phase_id) && $commentaire->phase_id == $item->id)
            selected
        @endif value=" {{ $item->id }}">{{$item->titre}}</option>
        @endforeach
    </select>
    {!! $errors->first('phase_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}" hidden>
    <label for="user_id" class="control-label">{{ 'User Id' }}</label>
    <input class="form-control" name="user_id" type="number" id="user_id" readonly value="{{ Auth::user()->id }}" >
    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
