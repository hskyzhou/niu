    <option value=""> 请选择 </option>
@foreach($options as $key => $option)
	<option @if($selected == $key) selected @endif value="{{ $key }}">{{ $option }}</option>
@endforeach