@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{url('/images/artroot-logo.png')}}" height="35px" alt="{{config('app.name')}}">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
